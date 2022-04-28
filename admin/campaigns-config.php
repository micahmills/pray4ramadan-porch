<?php
if ( !defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly.
class DT_Campaigns_Config {
    public function __construct(){
//        add_action( "dt_post_created", [ $this, "dt_post_created" ], 10, 3 );
        add_filter( 'wp_mail_from_name', [ $this, "wp_mail_from_name" ] );
        add_filter( 'wp_mail_from', [ $this, "wp_mail_from" ] );
        add_filter( 'dt_campaign_reminder_prayer_content', [ $this, 'dt_campaign_reminder_prayer_content' ] );
        add_filter( 'prayer_campaign_info_response', [ $this, 'prayer_campaign_info_response' ] );

        if ( !wp_next_scheduled( 'dt_ramadan_prayer_campaign_daily' ) ) {
            wp_schedule_event( time(), 'daily', 'dt_ramadan_prayer_campaign_daily' );
        }
        add_action( 'dt_ramadan_prayer_campaign_daily', 'dt_end_of_prayer_campaign_email' );
    }

    //Set ramadan prayer fuel content url
    public function dt_post_created( $post_type, $post_id, $initial_fields ){
        if ( $post_type === "campaigns" ){
            $post = DT_Posts::get_post( $post_type, $post_id );
            if ( !isset( $post["campaign_strings"] ) ){
                $link = site_url() . '/prayer/list';
                $content = 'Click here to see the prayer prompts for today: <a href="' . $link . '">' . $link . '</a>';
                $campaign_strings = [
                    "en_US" => [
                        "reminder_content" => $content,
                    ]
                ];
                update_post_meta( $post_id, 'campaign_strings', $campaign_strings );
            }
        }
    }

    public function wp_mail_from_name( $name ){
        $porch_fields = p4r_porch_fields();
        if ( isset( $porch_fields['title']['value'] ) && !empty( $porch_fields['title']['value'] ) ){
            $name = $porch_fields['title']['value'];
        }
        return $name;
    }

    //From email to set on emails
    public function wp_mail_from( $email ){
        $porch_fields = p4r_porch_fields();
        if ( isset( $porch_fields['email']['value'] ) && !empty( $porch_fields['email']['value'] ) ){
            $email = $porch_fields['email']['value'];
        } else if ( strpos( $email, "wordpress" ) !== false ){
            $domain = parse_url( home_url() )["host"];
            $email = "no-reply@" . $domain;
        }
        return $email;
    }

    public function dt_campaign_reminder_prayer_content( $dt_campaign_reminder_prayer_content ){
        if ( empty( $dt_campaign_reminder_prayer_content ) ){
            $url = site_url() . '/prayer/list';
            $link = '<a href="' . $url . '">' . $url . '</a>';
            $dt_campaign_reminder_prayer_content = sprintf( __( 'Click here to see the prayer prompts for today: %s', 'pray4ramadan-porch' ), $link );
        }
        return $dt_campaign_reminder_prayer_content;
    }


    public function prayer_campaign_info_response( $data ){
        global $wpdb;
        $language_counts = $wpdb->get_results( "
            SELECT pm.meta_value, count(pm.meta_value) as count
            FROM $wpdb->posts p
            LEFT JOIN $wpdb->postmeta pm ON (pm.post_ID = p.ID and pm.meta_key = 'post_language' )
            WHERE p.post_type = 'landing'
            AND ( p.post_status = 'publish' OR p.post_status = 'future' )
            GROUP BY pm.meta_value
        ", ARRAY_A );
        $languages = [];
        foreach ( $language_counts as $lang ){
            if ( $lang["meta_value"] === null ){
                $lang["meta_value"] = "en_US";
            }
            if ( !in_array( $lang["meta_value"], $languages, true ) ){
                $languages[] = $lang['meta_value'];
            }
        }
        $data['prayer_fuel_languages'] = $languages;
        return $data;
    }

    public function dt_end_of_prayer_campaign_email(){
        global $wpdb;
        //get all the campaigns that are after the end date and that are still active.
        $active_ended_campaigns = $wpdb->get_results( $wpdb->prepare( "
        SELECT p.ID
        FROM $wpdb->postmeta pm
        INNER JOIN $wpdb->posts p ON ( p.ID = pm.post_ID AND p.post_type = 'campaigns' )
        INNER JOIN $wpdb->postmeta active_campaign_meta on ( active_campaign_meta.post_ID = p.ID AND active_campaign_meta.meta_key = 'status' AND active_campaign_meta.meta_value = 'active' )
        WHERE pm.meta_key = 'end_date' AND pm.meta_value < %s
    ", time() ), ARRAY_A );

        foreach ( $active_ended_campaigns as $campaign ){
            //find subscribers and send emails
            $campaign_post = DT_Posts::get_post( "campaigns", $campaign["ID"], true, false );
            if ( !in_array( "end-of-campaign-email-sent", $campaign_post['tags'], true ) ){
                $subscribers = $campaign_post["subscriptions"] ?? [];
                foreach ( $subscribers as $sub ){
                    $this::end_of_campaign_email( $sub["ID"], $campaign["ID"] );
                }
            }
            //close campaign
            DT_Posts::update_post( "campaigns", $campaign["ID"], [ "status" => "inactive", "tags" => [ "values" => [ [ "value" => "end-of-campaign-email-sent" ] ] ] ], true, false );
        }

    }
    public static function switch_email_locale( $subscriber_locale = null ){
        $lang_code = "en_US";
        if ( !empty( $subscriber_locale ) ){
            $lang_code = $subscriber_locale;
        }
        add_filter( 'determine_locale', function ( $locale ) use ( $lang_code ){
            if ( !empty( $lang_code ) ){
                return $lang_code;
            }
            return $locale;
        } );
        unload_textdomain( "pray4ramadan-porch" );
        load_plugin_textdomain( 'pray4ramadan-porch', false, trailingslashit( dirname( plugin_basename( __FILE__ ), 2 ) ). 'support/languages' );
    }
    public static function end_of_campaign_email( $subscriber_id, $campaign_id ){
        $record = DT_Posts::get_post( 'subscriptions', $subscriber_id, true, false );
        $porch_fields = p4r_porch_fields();
        if ( is_wp_error( $record ) ){
            dt_write_log( 'failed to record' );
            return;
        }
        if ( !isset( $record['contact_email'] ) || empty( $record['contact_email'] ) ){
            return;
        }
        if ( !isset( $porch_fields["title"]["value"] ) ){
            return;
        }

        self::switch_email_locale( $record["lang"] ?? null );
        DT_Prayer_Campaigns_Send_Email::switch_email_locale( $record["lang"] ?? null );

        $to = [];
        foreach ( $record['contact_email'] as $value ){
            $to[] = $value['value'];
        }
        $to = implode( ',', $to );

        $subject = __( 'Thank you for praying with us!', 'pray4ramadan-porch' );

        if ( !empty( $porch_fields["country_name"]["value"] ) ){
            $tag = sprintf( __( 'Strategic prayer for a disciple making movement in %s', 'pray4ramadan-porch' ), get_field_translation( $porch_fields["country_name"], $record["lang"] ?? 'en_US' ) );
        } else {
            $tag = __( 'Strategic prayer for a disciple making movement', 'pray4ramadan-porch' );
        }

        $url = trailingslashit( site_url() ) . 'prayer/stats';

        $message = '
            <h3>' . sprintf( __( 'Hello %s,', 'pray4ramadan-porch' ), esc_html( $record["name"] ) ) . '</h3>
            <p>' . sprintf( __( 'Thank you for joining %1$s in %2$s. You are a part of something extraordinary!', 'pray4ramadan-porch' ), esc_html( $porch_fields["title"]["value"] ), lcfirst( $tag ) ) . '</p>
            <p>' . __( 'Click the link to see the bigger picture:', 'pray4ramadan-porch' ) . '</p>
            <p><a href="' . $url . '">' . $url . '</a></p>';
        if ( isset( $porch_fields["stats-p4m"]["value"] ) && $porch_fields["stats-p4m"]["value"] === "yes" ){
            $message .= '<p>' . __( 'While there, make sure to sign-up to receive notifications of future prayer opportunities.', 'pray4ramadan-porch' ) . '</p>';
        }
        $message .= '<p>' . __( 'Blessings,', 'pray4ramadan-porch' ) . '<br>
            ' . $porch_fields["title"]["value"] . '</p>
        ';

        $sent = DT_Prayer_Campaigns_Send_Email::send_prayer_campaign_email( $to, $subject, $message );
        if ( ! $sent ){
            dt_write_log( __METHOD__ . ': Unable to send email. ' . $to );
        } else {
            DT_Posts::add_post_comment( "subscribers", $subscriber_id, "Send end of campaign email" );
        }
    }
}

new DT_Campaigns_Config();
