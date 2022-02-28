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
        add_action( 'admin_enqueue_scripts', [ $this, 'scripts' ] );

    } // End __construct()

    /**
     * Loads the subnav page
     * @since 0.1
     */
    public function register_menu() {
        if ( current_user_can( 'wp_api_allowed_user' ) ) {
            add_submenu_page( 'edit.php?post_type=' . PORCH_LANDING_POST_TYPE, $this->title, $this->title, "edit_" . PORCH_LANDING_POST_TYPE, $this->token, [ $this, 'content' ] );
        }
    }

    public function scripts(){
        wp_enqueue_script( 'dt_ramadan_script', plugin_dir_url( __FILE__ ) . '/admin.js', [
            'jquery',
        ], filemtime( plugin_dir_path( __FILE__ ) . '/admin.js' ), true );
    }

    /**
     * Menu stub. Replaced when Disciple.Tools Theme fully loads.
     */
    public function extensions_menu() {}

    /**
     * Builds page contents
     * @since 0.1
     */
    public function content() {

        if ( !current_user_can( 'wp_api_allowed_user' ) ) { // manage dt is a permission that is specific to Disciple.Tools and allows admins, strategists and dispatchers into the wp-admin
            wp_die( 'You do not have sufficient permissions to access this page.' );
        }

        if ( isset( $_GET["tab"] ) ) {
            $tab = sanitize_key( wp_unslash( $_GET["tab"] ) );
        } else {
            $tab = 'home';
        }

        $link = 'admin.php?page='.$this->token.'&tab=';

        ?>
        <div class="wrap">
            <h2><?php echo esc_html( PORCH_LANDING_POST_TYPE_SINGLE ) ?></h2>
            <h2 class="nav-tab-wrapper">
                <a href="<?php echo esc_attr( $link ) . 'home' ?>" class="nav-tab <?php echo esc_html( ( $tab == 'home' || !isset( $tab ) ) ? 'nav-tab-active' : '' ); ?>">Home Page</a>
                <a href="<?php echo esc_attr( $link ) . 'content' ?>" class="nav-tab <?php echo esc_html( ( $tab == 'content' ) ? 'nav-tab-active' : '' ); ?>">Starter Content</a>
            </h2>

            <?php
            switch ($tab) {
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

class P4_Ramadan_Porch_Landing_Tab_Home {
    public function content() {
        ?>
        <style>
            .metabox-table input {
                width: 100%;
            }
            .metabox-table select {
                width: 100%;
            }
            .metabox-table textarea {
                width: 100%;
                height: 100px;
            }
        </style>
        <div class="wrap">
            <div id="poststuff">
                <div id="post-body" class="metabox-holder columns-1">
                    <div id="post-body-content">
                        <!-- Main Column -->

                        <?php $this->box_campaign() ?>

                        <?php $this->main_column() ?>

                        <!-- End Main Column -->
                    </div><!-- end post-body-content -->
                </div><!-- post-body meta box container -->
            </div><!--poststuff end -->
        </div><!-- wrap end -->
        <?php
    }

    public function box_campaign() {

        if ( isset( $_POST['install_campaign_nonce'] )
            && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['install_campaign_nonce'] ) ), 'install_campaign_nonce' )
            && isset( $_POST['selected_campaign'] )
        ) {
            $campaign_id = sanitize_text_field( wp_unslash( $_POST['selected_campaign'] ) );
            update_option( 'pray4ramadan_selected_campaign', $campaign_id );
        }
        $fields = p4r_get_campaign();
        if ( empty( $fields ) ) {
            $fields = [ 'ID' => 0 ];
        }

        $campaigns = DT_Posts::list_posts( "campaigns", [ "status" => [ "active", "pre_signup", "inactive" ] ] );
        if ( is_wp_error( $campaigns ) ){
            $campaigns = [ "posts" => [] ];
        }

        ?>
        <style>
            .metabox-table select {
                width: 100%;
            }
        </style>
        <form method="post" class="metabox-table">
            <?php wp_nonce_field( 'install_campaign_nonce', 'install_campaign_nonce' ) ?>
            <!-- Box -->
            <table class="widefat striped">
                <thead>
                <tr>
                    <th style="width:20%">Link Campaign</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            Select Campaign
                        </td>
                        <td>
                            <select name="selected_campaign">
                                <option value="none"></option>
                                <?php foreach ( $campaigns["posts"] as $campaign ) :?>
                                    <option value="<?php echo esc_html( $campaign["ID"] ) ?>"
                                        <?php selected( (int) $campaign["ID"] === (int) $fields['ID'] ) ?>
                                    >
                                        <?php echo esc_html( $campaign["name"] ) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <button class="button" type="submit">Update</button>
                        </td>
                    </tr>
                    <?php if ( ! empty( $fields['ID'] ) ) : ?>
                        <?php foreach ( $fields as $key => $value ) :
                            if ( in_array( $key, [ 'start_date', 'end_date', 'status' ] )) :
                                ?>
                                <tr>
                                    <td><?php echo esc_attr( ucwords( str_replace( '_', ' ', $key ) ) ) ?></td>
                                    <td><?php echo esc_html( ( is_array( $value ) ) ? $value['formatted'] ?? $value['label'] : $value ); ?></td>
                                </tr>
                            <?php endif;
                        endforeach; ?>
                    <?php endif; ?>
                    <?php if ( isset( $fields['ID'] ) ) : ?>
                    <tr>
                        <td>Edit Campaign Details</td>
                        <td>
                            <a href="<?php echo esc_html( site_url() . "/campaigns/" . $fields['ID'] ); ?>" target="_blank">Edit Campaign</a>
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

    private function translation_cell( $langs, $key, $field ){
        ?>
        <button class="button small expand_translations">
            <?php
            $number_of_translations = 0;
            foreach ( $langs as $lang => $val ){
                if ( !empty( $field["translations"][$val['language']] ) ){
                    $number_of_translations++;
                }
            }
            ?>
            <img style="height: 15px; vertical-align: middle" src="<?php echo esc_html( get_template_directory_uri() . "/dt-assets/images/languages.svg" ); ?>">
            (<?php echo esc_html( $number_of_translations ); ?>)
        </button>
        <div class="translation_container hide">
            <table style="width:100%">
                <?php foreach ( $langs as $lang => $val ) : ?>
                    <tr>
                        <td><label for="field_key_<?php echo esc_html( $key )?>_translation-<?php echo esc_html( $val['language'] )?>"><?php echo esc_html( $val['native_name'] )?></label></td>
                        <?php if ( $field["type"] === "textarea" ) :?>
                            <td><textarea name="field_key_<?php echo esc_html( $key )?>_translation-<?php echo esc_html( $val['language'] )?>"><?php echo wp_kses_post( $field["translations"][$val['language']] ?? "" );?></textarea></td>
                        <?php else: ?>
                            <td><input name="field_key_<?php echo esc_html( $key )?>_translation-<?php echo esc_html( $val['language'] )?>" type="text" value="<?php echo esc_html( $field["translations"][$val['language']] ?? "" );?>"/></td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php
    }

    public function main_column() {
        global $allowed_tags;
        $allowed_tags['script'] =  array(
            'async' => array(),
            'src' => array()
        );
        $fields = p4r_porch_fields();
        $langs = dt_ramadan_list_languages();
        $dir = scandir( plugin_dir_path( __DIR__ ) . 'site/css/colors' );
        $list = [];
        foreach ( $dir as $file ) {
            if ( substr( $file, -4, 4 ) === '.css' ){
                $f = explode( '.', $file );
                $l_key = $f[0];
                $label = ucwords( $l_key );
                $list[$l_key] = $label;
            }
        }

        if ( isset( $_POST['install_ramadan_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['install_ramadan_nonce'] ) ), 'install_ramadan_nonce' ) ) {

            if ( isset( $_POST['list'] ) ) {
                $saved_fields = $fields;

                $post_fields = dt_recursive_sanitize_array( $_POST );
                $post_list = dt_recursive_sanitize_array( $_POST['list'] );
                foreach ( $post_list as $field_key => $value ){
                    if ( isset( $saved_fields[$field_key]["type"], $_POST['list'][$field_key] ) && $saved_fields[$field_key]["type"] === "textarea" ){ // if textarea
                        $post_list[$field_key] = wp_kses( wp_unslash( $_POST['list'][$field_key] ), $allowed_tags );
                    }
                }

                foreach ( $post_list as $key => $value ) {
                    if ( ! isset( $saved_fields[$key] ) ) {
                        $saved_fields[$key] = [];
                    }
                    $saved_fields[$key]['value'] = $value;
                }

                foreach ( $fields as $field_key => $field ){
                    if ( isset( $field["translations"] ) ){
                        foreach ( $langs as $lang_code => $lang_values ){
                            if ( isset ( $post_fields["field_key_" . $field_key . "_translation-" . $lang_code] ) ){
                                $saved_fields[$field_key]["translations"][$lang_code] = $post_fields["field_key_" . $field_key . "_translation-" . $lang_code];
                            }
                        }
                    }
                }

                $fields = p4r_recursive_parse_args( $saved_fields, $fields );

                update_option( 'p4r_porch_fields', $fields );
            }

            if ( isset( $_POST['reset_values'] ) ) {
                update_option( 'p4r_porch_fields', [] );
                $fields = p4r_porch_fields();
            }
        }
        ?>
        <form method="post" class="metabox-table">
            <?php wp_nonce_field( 'install_ramadan_nonce', 'install_ramadan_nonce' ) ?>
            <!-- Box -->
            <table class="widefat striped">
                <thead>
                <tr>
                    <th style="width:20%">Home Page Details</th>
                    <th style="width:50%"></th>
                    <th ><span style="float:right;"><button type="submit" name="reset_values" value='delete'>Reset all to default</button></span></th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ( $fields as $key => $field ) : ?>
                        <?php if ( !isset( $field['type'] ) || 'text' === $field['type'] ) : ?>
                            <tr>
                                <td>
                                    <?php echo esc_html( $field['label'] ); ?>
                                </td>
                                <td>
                                    <?php if ( !empty( $field["default"] ) && isset( $field["translations"] ) ) {
                                        echo '<h3>Default translated text:</h3>';
                                        echo nl2br( esc_html( $field["default"] ) );
                                        echo '<br><br>';
                                    }
                                    if ( isset( $field["translations"] ) ){
                                        echo '<p>Custom text for all languages. Click the <img style="height: 15px; vertical-align: middle" src="' . esc_html( get_template_directory_uri() . "/dt-assets/images/languages.svg" ) . '"> button to set a value for each language</p>';
                                    }
                                    ?>
                                    <input type="text" name="list[<?php echo esc_html( $key ); ?>]" id="<?php echo esc_html( $key ); ?>" value="<?php echo esc_html( $field['value'] ); ?>"
                                        placeholder="<?php echo esc_html( $field["default"] ?? "" ); ?>"
                                    />
                                </td>
                                <td style="vertical-align: middle;">
                                    <?php if ( isset( $field["translations"] ) ){
                                        self::translation_cell( $langs, $key, $field );
                                    } ?>
                                </td>
                            </tr>
                        <?php elseif ( 'textarea' === $field['type'] ) : ?>
                            <tr>
                                <td>
                                    <?php echo esc_html( $field['label'] ); ?>
                                </td>
                                <td>
                                    <?php if ( !empty( $field["default"] ) && isset( $field["translations"] ) ) {
                                        echo '<h3>Default translated text:</h3>';
                                        echo nl2br( esc_html( $field["default"] ) );
                                        echo '<br> <br> <p>Custom text for all languages. For each language click the <img style="height: 15px; vertical-align: middle" src="' . esc_html( get_template_directory_uri() . "/dt-assets/images/languages.svg" ) . '"> button</p>';
                                    } ?>
                                    <textarea name="list[<?php echo esc_html( $key ); ?>]" id="<?php echo esc_html( $key ); ?>" placeholder=""><?php echo wp_kses( $field['value'], $allowed_tags ); ?></textarea>
                                </td>
                                <td style="vertical-align: middle;">
                                    <?php if ( isset( $field["translations"] ) ){
                                        self::translation_cell( $langs, $key, $field );
                                    } ?>
                                </td>
                            </tr>
                        <?php elseif ( 'theme_select' === $field['type'] ) : ?>
                            <tr>
                                <td>
                                    <?php echo esc_html( $field['label'] ); ?>
                                </td>
                                <td>
                                    <select name="list[<?php echo esc_html( $key ); ?>]">
                                        <?php
                                        if ( isset( $field['value'] ) && ! empty( $field['value'] ) ) {
                                            ?>
                                            <option value="<?php echo esc_attr( $field['value'] ) ?>"><?php echo esc_html( $list[$field['value']] ) ?? ''?></option>
                                            <option disabled>-----</option>
                                            <?php
                                        }
                                        foreach ( $list as $list_key => $list_label ) {
                                            ?>
                                            <option value="<?php echo esc_attr( $list_key ) ?>"><?php echo esc_attr( $list_label ) ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="2">
                            <button class="button" type="submit">Update</button>
                        </td>
                        <td></td>
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
                <div id="post-body" class="metabox-holder columns-1">
                    <div id="post-body-content">
                        <!-- Main Column -->

                        <?php
                        $object = new P4_Ramadan_Porch_Landing_Tab_Home();
                        $object->box_campaign();

                        $fields = p4r_get_campaign();
                        if ( ! empty( $fields ) ) {
                            $this->main_column();
                        }

                        ?>

                        <!-- End Main Column -->
                    </div><!-- end post-body-content -->
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
}



