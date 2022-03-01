<?php
$lang = dt_ramadan_get_current_lang();
$porch_fields = p4r_porch_fields();
if ( isset( $this->parts['post_id'] ) && ! empty( $this->parts['post_id'] ) ) {
    $my_postid = $this->parts['post_id'];//This is page id or post id
    global $wpdb;
    $post_id = $wpdb->get_var( $wpdb->prepare("
        SELECT p.ID
        FROM $wpdb->posts p
        JOIN $wpdb->postmeta pm ON ( p.ID = pm.post_ID AND pm.meta_key = 'prayer_fuel_magic_key' AND pm.meta_value = %s )
        JOIN $wpdb->postmeta lang ON ( p.ID = lang.post_ID AND lang.meta_key = 'post_language' AND lang.meta_value = %s )
        WHERE post_type = %s
        AND post_status = 'publish'
    ", $this->parts['public_key'], $lang, PORCH_LANDING_POST_TYPE ) );

    if ( empty( $post_id ) ){
        $post_id = $wpdb->get_var( $wpdb->prepare("
            SELECT p.ID
            FROM $wpdb->posts p
            JOIN $wpdb->postmeta pm ON ( p.ID = pm.post_ID AND pm.meta_key = 'prayer_fuel_magic_key' AND pm.meta_value = %s )
            LEFT JOIN $wpdb->postmeta lang ON ( p.ID = lang.post_ID AND lang.meta_key = 'post_language' )
            WHERE post_type = %s
            AND post_status = 'publish'
            AND ( lang.meta_value = 'en_US' OR lang.meta_value IS NULL )
        ", $this->parts['public_key'], PORCH_LANDING_POST_TYPE ) );
    }

    if ( !empty( $post_id ) ){
        $my_postid = $post_id;
    }


    $post_status = get_post_status( $my_postid );
    $content_post = get_post( $my_postid );
    $content = $content_post->post_content;
    $content = apply_filters( 'the_content', $content );
    $content = str_replace( ']]>', ']]&gt;', $content );
}
else {
    $content = 'No post found';
}

$args = array(
    'post_type' => PORCH_LANDING_POST_TYPE,
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'post_date',
    'order' => 'DESC'
);
$list = new WP_Query( $args );
?>


<!-- Contact Section Start -->
<section id="contact" class="section">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">
                <div class="fuel-block">
                    <div class="section-header">
                        <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Prayer <span>Fuel</span></h2>
                        <hr class="lines wow zoomIn" data-wow-delay="0.3s">
                    </div>
                    <div class="">
                        <?php echo wp_kses_post( $content ) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->


<!-- TOOLS SECTION -->
<section id="download" class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">Prayer Tools</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="download-area text-center wow fadeInUp" data-wow-delay="0.3s">
                    <a href="https://www.youversion.com/the-bible-app/" class="btn btn-border">Download Bible App</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Download Section End -->


<!-- LIST OF POSTS Section -->
<section id="blog" class="section">
    <!-- Container Starts -->
    <div class="container">
        <div class="section-header">
            <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">All <span>Days</span></h2>
            <hr class="lines wow zoomIn" data-wow-delay="0.3s">
            <p class="section-subtitle wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s"><?php esc_html_e( 'Use these resources to help pray specifically each day for the month of Ramadan.', 'pray4ramadan-porch' ); ?></p>
        </div>
        <div class="row">
            <?php foreach ($list->posts as $item ) : ?>
                <?php $public_key = get_post_meta( $item->ID, PORCH_LANDING_META_KEY, true ); ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 blog-item">
                    <!-- Blog Item Starts -->
                    <div class="blog-item-wrapper wow fadeInUp" data-wow-delay="0.3s">
                        <div class="blog-item-img">
                            <a href="/prayer/fuel/<?php echo esc_attr( $public_key ) ?>">
                                <img src="<?php echo esc_url( trailingslashit( plugin_dir_url( __DIR__ ) ) ) ?>landing-pages/img/300x1.png" alt="">
                            </a>
                        </div>
                        <div class="blog-item-text">
                            <h3>
                                <a href="#"><?php echo esc_html( $item->post_title ) ?></a>
                            </h3>
                            <div class="meta-tags">
                                <span class="date"><i class="lnr lnr-calendar-full"></i>on <?php echo esc_html( $item->post_date ) ?></span>
                            </div>
                            <p>
                                <?php echo wp_kses_post( $item->post_excerpt ) ?>
                            </p>
                            <a href="/prayer/fuel/<?php echo esc_attr( $public_key ) ?>" class="btn btn-common btn-rm">Read</a>
                        </div>
                    </div>
                    <!-- Blog Item Wrapper Ends-->
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- blog Section End -->


<!-- COUNTER ROW -->
<div class="counters section" data-stellar-background-ratio="0.5" >
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="wow fadeInUp" data-wow-delay=".2s">
                    <div class="facts-item">
                        <div class="icon">
                            <i class="lnr lnr-calendar-full"></i>
                        </div>
                        <div class="fact-count">
                            <h3><span class="counter">30</span></h3>
                            <h4>Days</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="wow fadeInUp" data-wow-delay=".6s">
                    <div class="facts-item">
                        <div class="icon">
                            <i class="lnr lnr-user"></i>
                        </div>
                        <div class="fact-count">
                            <h3>720</h3>
                            <h4>Hours of Prayer</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="wow fadeInUp" data-wow-delay=".8s">
                    <div class="facts-item">
                        <div class="icon">
                            <i class="lnr lnr-heart"></i>
                        </div>
                        <div class="fact-count">
                            <h3>2880</h3>
                            <h4>Prayer Commitments Needed</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counter Section End -->


<!-- Footer Section Start -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="social-icons wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">
                    <ul>
                        <!-- facebook -->
                        <?php if ( isset( $porch_fields['facebook']["value"] ) && !empty( $porch_fields['facebook']["value"] ) ) : ?>
                            <li class="facebook"><a href="<?php echo esc_url( $porch_fields['facebook']["value"] ) ?>"><i class="fa fa-facebook"></i></a></li>
                        <?php endif; ?>

                        <!-- instagram -->
                        <?php if ( isset( $porch_fields['instagram']["value"] ) && !empty( $porch_fields['instagram']["value"] ) ) : ?>
                            <li class="instagram"><a href="<?php echo esc_url( $porch_fields['instagram']["value"] ) ?>"><i class="fa fa-instagram"></i></a></li>
                        <?php endif; ?>

                        <!-- twitter -->
                        <?php if ( isset( $porch_fields['twitter']["value"] ) && !empty( $porch_fields['twitter']["value"] ) ) : ?>
                            <li class="twitter"><a href="<?php echo esc_url( $porch_fields['twitter']["value"] ) ?>"><i class="fa fa-twitter"></i></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="site-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.3s">
                    <p>
                        Made with &#10084;&#65039; by <a href="https://pray4movement.org">Pray4Movments.org</a><br>
                        Powered by <a href="https://disciple.tools">Disciple.Tools</a><br>
                        &copy;   <?php echo esc_html ( date("Y") ); ?>
                    </p>
                </div>
                <div class="site-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.3s">
                    <p><a href="<?php echo esc_html( site_url( '/contacts' ) ); ?>">Login</a> | <a href="<?php echo esc_html( admin_url( 'edit.php?post_type=landing&page=dt_porch_template' ) ); ?>">Page Settings</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Go To Top Link -->
<a href="#" class="back-to-top" aria-label="back to top">
    <i class="lnr lnr-arrow-up"></i>
</a>

<div id="loader">
    <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
    </div>
</div>



