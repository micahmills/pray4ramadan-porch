<?php
$porch_fields = p4r_porch_fields();
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
                <a href="/" class="logo"><?php echo esc_html(  $porch_fields['title']['value']  ) ?></a>
                <button class="menu-button" id="open-button"><i class="lnr lnr-menu"></i></button>
            </div>
        </div>
    </div>
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <div class="contents content-height text-center">
                    <?php if ( isset( $porch_fields['logo_url']['value'] ) && ! empty( $porch_fields['logo_url']['value'] ) ) : ?>
                        <img src="<?php echo esc_url( $porch_fields['logo_url']['value'] ) ?>" alt=""  />
                    <?php else : ?>
                        <h1 class="wow fadeInDown" style="font-size: 3em;" data-wow-duration="1000ms" data-wow-delay="0.3s"><?php echo esc_html( $porch_fields['title']['value'] ) ?></h1>
                    <?php endif; ?>
                    <?php
                    if ( time() <= strtotime( $porch_fields['end'] ) ) :
                        ?>
                        <p class="section-subtitle wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s"><a href="<?php echo site_url() ?>#sign-up" class="btn btn-common btn-rm">Sign Up to Pray</a></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header Section End -->
