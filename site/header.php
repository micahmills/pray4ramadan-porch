<?php
global $allowed_tags;
$allowed_tags['script'] =  array(
    'async' => array(),
    'src' => array()
);
$porch_fields = p4r_porch_fields();
?>

<!-- Required meta tags -->
<?php echo wp_kses( $porch_fields['google_analytics']['value'] ?: $porch_fields['google_analytics']['default'], $allowed_tags ) ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
<meta name="description" content="Pray for Iran - Nowruz 1401">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo esc_url( trailingslashit( plugin_dir_url( __FILE__ ) ) ) ?>css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo esc_url( trailingslashit( plugin_dir_url( __FILE__ ) ) ) ?>css/line-icons.css">
<link rel="stylesheet" href="<?php echo esc_url( trailingslashit( plugin_dir_url( __FILE__ ) ) ) ?>css/owl.carousel.css">
<link rel="stylesheet" href="<?php echo esc_url( trailingslashit( plugin_dir_url( __FILE__ ) ) ) ?>css/owl.theme.css">
<link rel="stylesheet" href="<?php echo esc_url( trailingslashit( plugin_dir_url( __FILE__ ) ) ) ?>css/nivo-lightbox.css">
<link rel="stylesheet" href="<?php echo esc_url( trailingslashit( plugin_dir_url( __FILE__ ) ) ) ?>css/magnific-popup.css">
<link rel="stylesheet" href="<?php echo esc_url( trailingslashit( plugin_dir_url( __FILE__ ) ) ) ?>css/animate.css">
<link rel="stylesheet" href="<?php echo esc_url( trailingslashit( plugin_dir_url( __FILE__ ) ) ) ?>css/menu_sideslide.css">
<link rel="stylesheet" href="<?php echo esc_url( trailingslashit( plugin_dir_url( __FILE__ ) ) ) ?>css/main.css?ver=<?php echo esc_attr( filemtime( trailingslashit( plugin_dir_path( __FILE__ ) ) . 'css/main.css' ) ) ?>">
<link rel="stylesheet" href="<?php echo esc_url( trailingslashit( plugin_dir_url( __FILE__ ) ) ) ?>css/responsive.css">
<script>
    let jsObject = [<?php echo json_encode([
        'theme_uri' => trailingslashit( get_stylesheet_directory_uri() ),
        'root' => esc_url_raw( rest_url() ),
        'nonce' => wp_create_nonce( 'wp_rest' ),
        'parts' => [
            'root' => $this->root,
            'type' => $this->type,
        ],
        'trans' => [
            'add' => 'Add Magic'
        ],
    ]) ?>][0]
</script>

<link rel="stylesheet" id="colors" href="<?php echo esc_url( trailingslashit( plugin_dir_url( __FILE__ ) ) ) ?>css/colors/<?php echo esc_attr( PORCH_COLOR_SCHEME ) ?>.css?ver=<?php echo esc_attr( filemtime( trailingslashit( plugin_dir_path( __FILE__ ) ) ) . 'css/colors/'. esc_attr( PORCH_COLOR_SCHEME ) .'.css' )  ?>" type="text/css" />

<style>
    .stencil-background {
        background-image: url(<?php echo esc_html( trailingslashit( plugin_dir_url( __FILE__ ) ) . 'img/Pray4Iran_banner2.jpg') ?>);
        background-size: cover;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }
    .logo-background {

    }
    a.logo {
        text-shadow: none;
        color: #6CA0B3;
    }
</style>
