<?php
if ( !defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly.
class DT_Campaigns_Config {
    public function __construct(){
        add_action( "dt_post_created", [ $this, "dt_post_created" ], 10, 3 );
    }

    //Set ramadan prayer fuel content url
    public function dt_post_created( $post_type, $post_id, $initial_fields ){
        if ( $post_type === "campaigns" ){
            $post = DT_Posts::get_post( $post_type, $post_id );
            if ( !isset( $post["campaign_strings"] ) ){
                $link = site_url() . '/prayer/list';
                $content = 'Be sure to pray through today\'s prayer content: <a href="' . $link . '">' . $link . '</a>';
                $campaign_strings = [
                    "en_US" => [
                        "reminder_content" => $content,
                    ]
                ];
                update_post_meta( $post_id, 'campaign_strings', $campaign_strings );
            }
        }
    }
}

new DT_Campaigns_Config();
