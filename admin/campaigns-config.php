<?php
if ( !defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly.
class DT_Campaigns_Config {
    public function __construct(){
//        add_action( "dt_post_created", [ $this, "dt_post_created" ], 10, 3 );
        add_filter( 'wp_mail_from_name', [ $this, "wp_mail_from_name" ] );
        add_filter( 'wp_mail_from', [ $this, "wp_mail_from" ] );
        add_filter( 'dt_campaign_reminder_prayer_content', [ $this, 'dt_campaign_reminder_prayer_content' ] );
        add_filter( 'prayer_campaign_info_response', [ $this, 'prayer_campaign_info_response' ] );
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
            if ( (int) $lang['count'] > 5 ){
                $languages[] = $lang['meta_value'];
            }
        }
        $data['prayer_fuel_languages'] = $languages;
        return $data;
    }
}

new DT_Campaigns_Config();
