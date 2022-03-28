<?php
if ( !defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly.
// Add Open Graph Protocol meta tags in header
function og_protocol() {
    $fields = p4r_porch_fields();

    $og_title = PORCH_TITLE;
    $og_description = get_field_translation( $fields['goal'], PORCH_DEFAULT_LANGUAGE );
    $og_url = get_site_url();
    ?>


    <!-- Open Graph Protocol -->
    <meta property="og:title" content="<?php echo esc_attr( $og_title ); ?> - Pray4Movement"/>
    <meta property="og:description" content="<?php echo esc_attr( $og_description ); ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo esc_attr( $og_url ); ?>"/>
    <meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo() ); ?>"/>
    <meta property="og:image" content="https://pray4movement.org/wp-content/uploads/2021/08/cropped-p4m-logo-192x192.png"/>
     <?php
}
add_action( 'wp_head', 'og_protocol' );

add_action( 'wp_enqueue_scripts', function (){
    wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css', array(), '4.5.0' );
    wp_enqueue_style( 'main-styles', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'css/main.css', array(), filemtime( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'css/main.css' ) );
    wp_enqueue_style( 'font-awesome', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'css/font-awesome.min.css', array(), filemtime( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'css/font-awesome.min.css' ) );
    wp_enqueue_style( 'line-icons', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'css/line-icons.css', array(), filemtime( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'css/line-icons.css' ) );
    wp_enqueue_style( 'animate-css', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'css/animate.css', array(), filemtime( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'css/animate.css' ) );
    wp_enqueue_style( 'menu_sideslide', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'css/menu_sideslide.css', array(), filemtime( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'css/menu_sideslide.css' ) );
    wp_enqueue_style( 'responsive', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'css/responsive.css', array(), filemtime( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'css/responsive.css' ) );
    wp_enqueue_style( 'p4m-colors', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'css/colors/' .  PORCH_COLOR_SCHEME . '.css', array(), filemtime( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'css/colors/' . PORCH_COLOR_SCHEME . '.css' ) );
});
