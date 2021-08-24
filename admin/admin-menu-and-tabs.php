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
                <a href="<?php echo esc_attr( $link ) . 'second' ?>" class="nav-tab <?php echo esc_html( ( $tab == 'second' || !isset( $tab ) ) ? 'nav-tab-active' : '' ); ?>">Second</a>
            </h2>

            <?php
            switch ($tab) {
                case "general":
                    $object = new P4_Ramadan_Porch_Landing_Tab_General();
                    $object->content();
                    break;
                case "second":
                    $object = new P4_Ramadan_Porch_Landing_Tab_Second();
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


/**
 * Class P4_Ramadan_Porch_Tab_Second
 */
class P4_Ramadan_Porch_Landing_Tab_Second {
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

                        <?php $this->right_column() ?>

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
        ?>
        <!-- Box -->
        <table class="widefat striped">
            <thead>
                <tr>
                    <th>Header</th>
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

