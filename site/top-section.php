<?php
$p4r_porch_title = 'Pray4Tunisia';
$p4r_porch_logo = esc_url( plugin_dir_url( __FILE__ ) . 'img/logo.png' );

?>



<!-- Nav -->
<div class="menu-wrap">
    <nav class="menu navbar">
        <div class="icon-list navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/prayer/list">Prayer Fuel</a>
                </li>

            </ul>
        </div>
    </nav>
    <button class="close-button" id="close-button"><i class="lnr lnr-cross"></i></button>
</div>
<!-- end Nav -->

<!-- HEADER -->
<header id="hero-area" data-stellar-background-ratio="0.5" class="stencil-background">
    <div class="fixed-top">
        <div class="container">
            <div class="logo-menu">
                <a href="/" class="logo"><?php echo esc_html( $p4r_porch_title ) ?></a>
                <button class="menu-button" id="open-button"><i class="lnr lnr-menu"></i></button>
            </div>
        </div>
    </div>
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <div class="contents content-height text-center">
                    <?php if ( $p4r_porch_logo ) : ?>
                        <img src="<?php echo esc_url( $p4r_porch_logo ) ?>" alt=""  />
                    <?php else : ?>
                        <h1 class="wow fadeInDown" style="font-size: 3em;" data-wow-duration="1000ms" data-wow-delay="0.3s"><?php echo esc_html( $p4r_porch_title ) ?></h1>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header Section End -->
