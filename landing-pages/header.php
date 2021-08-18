<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo esc_url( trailingslashit( plugin_dir_url( __DIR__ ) ) ) ?>home-5/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo esc_url( trailingslashit( plugin_dir_url( __DIR__ ) ) ) ?>home-5/css/line-icons.css">
<link rel="stylesheet" href="<?php echo esc_url( trailingslashit( plugin_dir_url( __DIR__ ) ) ) ?>home-5/css/owl.carousel.css">
<link rel="stylesheet" href="<?php echo esc_url( trailingslashit( plugin_dir_url( __DIR__ ) ) ) ?>home-5/css/owl.theme.css">
<link rel="stylesheet" href="<?php echo esc_url( trailingslashit( plugin_dir_url( __DIR__ ) ) ) ?>home-5/css/nivo-lightbox.css">
<link rel="stylesheet" href="<?php echo esc_url( trailingslashit( plugin_dir_url( __DIR__ ) ) ) ?>home-5/css/magnific-popup.css">
<link rel="stylesheet" href="<?php echo esc_url( trailingslashit( plugin_dir_url( __DIR__ ) ) ) ?>home-5/css/animate.css">
<link rel="stylesheet" href="<?php echo esc_url( trailingslashit( plugin_dir_url( __DIR__ ) ) ) ?>home-5/css/menu_sideslide.css">
<link rel="stylesheet" href="<?php echo esc_url( trailingslashit( plugin_dir_url( __DIR__ ) ) ) ?>home-5/css/main.css?ver=<?php echo filemtime( trailingslashit( plugin_dir_path( __DIR__ ) ) . 'home-5/css/main.css' )  ?>">
<link rel="stylesheet" href="<?php echo esc_url( trailingslashit( plugin_dir_url( __DIR__ ) ) ) ?>home-5/css/responsive.css">
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
            'add' => __( 'Add Magic', 'pray4ramadan-porch' ),
        ],
    ]) ?>][0]
</script>

<link rel="stylesheet" id="colors" href="<?php echo esc_url( trailingslashit( plugin_dir_url( __DIR__ ) ) ) ?>home-5/css/colors/<?php echo esc_attr( PORCH_COLOR_SCHEME ) ?>.css?ver=<?php echo filemtime( trailingslashit( plugin_dir_path( __DIR__ ) ) . 'home-5/css/colors/'. esc_attr( PORCH_COLOR_SCHEME ) .'.css' ) ?>" type="text/css" />
