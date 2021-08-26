<?php
if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

/**
 * Class P4_Ramadan_Porch_Menu
 */
class P4_Ramadan_Porch_Landing_Menu {

    public $token = 'dt_porch_template';
    public $title = 'Settings';

    private static $_instance = null;
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {
        if ( ! is_admin() ) {
            return;
        }

        add_action( "admin_menu", array( $this, "register_menu" ) );

    } // End __construct()

    /**
     * Loads the subnav page
     * @since 0.1
     */
    public function register_menu() {
        if ( current_user_can( 'wp_api_allowed_user' ) ) {
            add_submenu_page( 'edit.php?post_type='.PORCH_LANDING_POST_TYPE, $this->title, $this->title, 'manage_dt', $this->token, [ $this, 'content' ] );
        }
    }

    /**
     * Menu stub. Replaced when Disciple Tools Theme fully loads.
     */
    public function extensions_menu() {}

    /**
     * Builds page contents
     * @since 0.1
     */
    public function content() {

        if ( !current_user_can( 'wp_api_allowed_user' ) ) { // manage dt is a permission that is specific to Disciple Tools and allows admins, strategists and dispatchers into the wp-admin
            wp_die( 'You do not have sufficient permissions to access this page.' );
        }

        if ( isset( $_GET["tab"] ) ) {
            $tab = sanitize_key( wp_unslash( $_GET["tab"] ) );
        } else {
            $tab = 'general';
        }

        $link = 'admin.php?page='.$this->token.'&tab=';

        ?>
        <div class="wrap">
            <h2>Public Porch Template</h2>
            <h2 class="nav-tab-wrapper">
                <a href="<?php echo esc_attr( $link ) . 'general' ?>"
                   class="nav-tab <?php echo esc_html( ( $tab == 'general' || !isset( $tab ) ) ? 'nav-tab-active' : '' ); ?>">General</a>
                <a href="<?php echo esc_attr( $link ) . 'home' ?>" class="nav-tab <?php echo esc_html( ( $tab == 'home' ) ? 'nav-tab-active' : '' ); ?>">Home Page</a>
                <a href="<?php echo esc_attr( $link ) . 'content' ?>" class="nav-tab <?php echo esc_html( ( $tab == 'content' ) ? 'nav-tab-active' : '' ); ?>">Starter Content</a>
            </h2>

            <?php
            switch ($tab) {
                case "general":
                    $object = new P4_Ramadan_Porch_Landing_Tab_General();
                    $object->content();
                    break;
                case "home":
                    $object = new P4_Ramadan_Porch_Landing_Tab_Home();
                    $object->content();
                    break;
                case "content":
                    $object = new P4_Ramadan_Porch_Landing_Tab_Starter_Content();
                    $object->content();
                    break;
                default:
                    break;
            }
            ?>

        </div><!-- End wrap -->

        <?php
    }
}
P4_Ramadan_Porch_Landing_Menu::instance();


/**
 * Class P4_Ramadan_Porch_Tab_General
 */
class P4_Ramadan_Porch_Landing_Tab_General {
    public function content() {
        ?>
        <div class="wrap">
            <div id="poststuff">
                <div id="post-body" class="metabox-holder columns-1">
                    <div id="post-body-content">
                        <!-- Main Column -->

                        <?php $this->main_column() ?>

                        <!-- End Main Column -->
                    </div><!-- end post-body-content -->
                </div><!-- post-body meta box container -->
            </div><!--poststuff end -->
        </div><!-- wrap end -->
        <?php
    }

    public function main_column() {
        if ( isset( $_POST['home_page_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['home_page_nonce'] ) ), 'home_page_nonce' ) ) {
            if ( isset( $_POST['theme_color'] ) ) {
                $theme = sanitize_text_field( wp_unslash( $_POST['theme_color'] ) );
                update_option( PORCH_LANDING_META_KEY . '_theme_color', $theme, true );
            }

            if ( isset( $_POST["active_campaign"] ) ){
                $active_campaign_id = sanitize_text_field( wp_unslash( $_POST['active_campaign'] ) );
                $active_campaign = DT_Posts::get_post( "campaigns", $active_campaign_id );
                $campaign_root = "campaign_app";
                $campaign_type = $active_campaign["type"]["key"];
                $key_name = 'public_key';
                $key = "";
                if ( method_exists( "DT_Magic_URL", "get_public_key_meta_key" ) ){
                    $key_name = DT_Magic_URL::get_public_key_meta_key( $campaign_root, $campaign_type );
                }
                if ( isset( $active_campaign[$key_name] )) {
                    $key = $active_campaign[$key_name];
                }
                $atts = [
                    "root" => $campaign_root,
                    "type" => $campaign_type,
                    "public_key" => $key,
                    "meta_key" => $key_name,
                    "post_id" => $active_campaign_id,
                    "rest_url" => rest_url(),
                    "lang" => "en_US"
                ];
                update_option( "dt_ramadan_selected_campaign_magic_link_settings", $atts, true );

            }
        }

        $dir = scandir( plugin_dir_path( __DIR__ ) . 'site/css/colors' );
        $list = [];
        foreach ( $dir as $file ) {
            if ( substr( $file, -4, 4 ) === '.css' ){
                $f = explode( '.', $file );
                $key = $f[0];
                $label = ucwords( $key );
                $list[$key] = $label;
            }
        }
        $theme_color = get_option( PORCH_LANDING_META_KEY . '_theme_color' );
        $dt_ramadan_selected_campaign_magic_link_settings = get_option( 'dt_ramadan_selected_campaign_magic_link_settings' );

        $campaigns = DT_Posts::list_posts( "campaigns", [ "status" => [ "active" ] ] );
        if ( is_wp_error( $campaigns ) ){
            $campaigns = [];
        }
        ?>
        <!-- Box -->
        <form method="post">
            <?php wp_nonce_field( 'home_page_nonce', 'home_page_nonce' ) ?>
            <table class="widefat striped">
                <thead>
                <tr>
                    <th>Home Page</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <strong>Theme Color</strong><br>
                        <select name="theme_color">
                            <?php
                            if ( $theme_color ) {
                                ?>
                                <option value="<?php echo esc_attr( $theme_color ) ?>"><?php echo esc_html( $list[$theme_color] ) ?? ''?></option>
                                <option disabled>-----</option>
                                <?php
                            }
                            foreach ( $list as $key => $label ) {
                                ?>
                                <option value="<?php echo esc_attr( $key ) ?>"><?php echo esc_attr( $label ) ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Active Campaign</strong><br>
                        <select name="active_campaign">
                            <option value="none"></option>
                            <?php foreach ( $campaigns["posts"] as $campaign ) :?>
                                <option value="<?php echo esc_html( $campaign["ID"] ) ?>"
                                    <?php selected( $campaign["ID"] === $dt_ramadan_selected_campaign_magic_link_settings["post_id"] ?? 0 ) ?>
                                    >
                                    <?php echo esc_html( $campaign["name"] ) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" class="button">Update</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
        <br>
        <!-- End Box -->
        <?php
    }

}

class P4_Ramadan_Porch_Landing_Tab_Home {
    public function content() {
        ?>
        <div class="wrap">
            <div id="poststuff">
                <div id="post-body" class="metabox-holder columns-1">
                    <div id="post-body-content">
                        <!-- Main Column -->

                        <?php $this->main_column() ?>

                        <!-- End Main Column -->
                    </div><!-- end post-body-content -->
                </div><!-- post-body meta box container -->
            </div><!--poststuff end -->
        </div><!-- wrap end -->
        <?php
    }

    public function main_column() {
        $fields = pray4ramadan_porch_fields();

        if ( isset( $_POST['install_ramadan_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['install_ramadan_nonce'] ) ), 'install_ramadan_nonce' ) ) {

            dt_write_log('pre add');
            dt_write_log($_POST);

            if ( isset( $_POST['list'] ) ) {
                $saved_fields = $fields;

                $list = $_POST['list'];
                
                foreach( $list as $key => $value ) {
                    if ( ! isset( $saved_fields[$key] ) ) {
                        $saved_fields[$key] = [];
                    }
                    $saved_fields[$key]['value'] = $value;
                }

                $fields = p4r_recursive_parse_args($saved_fields,$fields);

                update_option('pray4ramadan_porch_fields', $fields );
            }

            if ( isset( $_POST['reset_values'] ) ) {
                update_option('pray4ramadan_porch_fields', [] );
                $fields = pray4ramadan_porch_fields();
            }

            dt_write_log('post add');
            dt_write_log($fields);

        }
        ?>
        <style>
            #home_page input {
                width: 100%;
            }
            #home_page textarea {
                width: 100%;
                height: 100px;
            }
        </style>
        <form method="post" id="home_page">
            <?php wp_nonce_field( 'install_ramadan_nonce', 'install_ramadan_nonce' ) ?>
            <!-- Box -->
            <table class="widefat striped">
                <thead>
                <tr>
                    <th style="width:20%">Home Page Details</th>
                    <th><span style="float:right;"><button type="submit" name="reset_values" value='delete'>Reset</button></span></th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach( $fields as $key => $field ) : ?>
                        <?php if ( !isset( $field['type'] ) || 'text' === $field['type'] ) : ?>
                            <tr>
                                <td>
                                    <?php echo $field['label']; ?>
                                </td>
                                <td>
                                    <input type="text" name="list[<?php echo $key; ?>]" id="<?php echo $key; ?>" value="<?php echo $field['value']; ?>" />
                                </td>
                            </tr>
                        <?php elseif ( 'textarea' === $field['type'] ) : ?>
                            <tr>
                                <td>
                                    <?php echo $field['label']; ?>
                                </td>
                                <td>
                                    <textarea name="list[<?php echo $key; ?>]" id="<?php echo $key; ?>" ><?php echo $field['value']; ?></textarea>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <tr>
                        <td>
                            <button class="button" type="submit">Update</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <!-- End Box -->
        </form>
        <?php
    }

}


/**
 * Class P4_Ramadan_Porch_Tab_Second
 */
class P4_Ramadan_Porch_Landing_Tab_Starter_Content {
    public function content() {
        ?>
        <div class="wrap">
            <div id="poststuff">
                <div id="post-body" class="metabox-holder columns-2">
                    <div id="post-body-content">
                        <!-- Main Column -->

                        <?php $this->main_column() ?>

                        <!-- End Main Column -->
                    </div><!-- end post-body-content -->
                    <div id="postbox-container-1" class="postbox-container">
                        <!-- Right Column -->


                        <!-- End Right Column -->
                    </div><!-- postbox-container 1 -->
                    <div id="postbox-container-2" class="postbox-container">
                    </div><!-- postbox-container 2 -->
                </div><!-- post-body meta box container -->
            </div><!--poststuff end -->
        </div><!-- wrap end -->
        <?php
    }

    public function main_column() {

        $result = [];
        if ( isset( $_POST['install_ramadan_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['install_ramadan_nonce'] ) ), 'install_ramadan_nonce' ) ) {
             $result = P4_Ramadan_Porch_Starter_Content::load_content();
        }

        ?>
        <form method="post">
            <?php wp_nonce_field( 'install_ramadan_nonce', 'install_ramadan_nonce' ) ?>
            <!-- Box -->
            <table class="widefat striped">
                <thead>
                <tr>
                    <th>Install Starter Ramadan Content</th>
                </tr>
                </thead>
                <tbody>

                <?php if ( $result ) : ?>
                    <tr>
                        <td>
                            <a href="<?php echo esc_url( admin_url() ); ?>edit.php?post_type=landing">List of Landing Page</a><br><hr><br>
                            <?php foreach ( $result as $item ) : ?>
                                <a href="<?php echo esc_url( admin_url() ); ?>post.php?post=<?php echo esc_attr( $item ) ?>&action=edit"><?php echo esc_html( get_the_title( $item ) ) ?></a><br>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                <?php else : ?>
                    <tr>
                        <td>
                            <button type="submit" name="install_ramadan_1" class="button" value="1">Install Ramadan Starter Content</button>
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
            <br>
            <!-- End Box -->
        </form>
        <?php
    }

    public function right_column() {
        ?>
        <!-- Box -->
        <table class="widefat striped">
            <thead>
                <tr>
                    <th>Information</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    Content
                </td>
            </tr>
            </tbody>
        </table>
        <br>
        <!-- End Box -->
        <?php
    }
}



