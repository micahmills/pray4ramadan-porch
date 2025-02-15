<?php
$lang = "en_US";
if ( isset( $_GET["lang"] ) && !empty( $_GET["lang"] ) ){
    $lang = sanitize_text_field( wp_unslash( $_GET["lang"] ));
} elseif ( isset( $_COOKIE["dt-magic-link-lang"] ) && !empty( $_COOKIE["dt-magic-link-lang"] ) ){
    $lang = sanitize_text_field( wp_unslash( $_COOKIE["dt-magic-link-lang"] ) );
}

$porch_fields = p4r_porch_fields();
$campaign_fields = p4r_get_campaign();

$campaign_root = "campaign_app";
$campaign_type = $campaign_fields["type"]["key"];
$key_name = 'public_key';
$key = "";
if ( method_exists( "DT_Magic_URL", "get_public_key_meta_key" ) ){
    $key_name = DT_Magic_URL::get_public_key_meta_key( $campaign_root, $campaign_type );
}
if ( isset( $campaign_fields[$key_name] )) {
    $key = $campaign_fields[$key_name];
}
$atts = [
    "root" => $campaign_root,
    "type" => $campaign_type,
    "public_key" => $key,
    "meta_key" => $key_name,
    "post_id" => (int) $campaign_fields["ID"],
    "rest_url" => rest_url(),
    "lang" => $lang
];
$dt_ramadan_selected_campaign_magic_link_settings = $atts;
$dt_ramadan_selected_campaign_magic_link_settings["color"] = "#38515C";
if ( $dt_ramadan_selected_campaign_magic_link_settings["color"] === "preset" ){
    $dt_ramadan_selected_campaign_magic_link_settings["color"] = '#38515C';
}
?>

<!-- Vision -->
<section id="campaign-vision" class="section">
    <div class="container">
        <div class="section-header row">
            <div class="col-sm-12 col-md-8">
                <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s"><?php esc_html_e( 'Our', 'pray4ramadan-porch' ); ?> <span><?php esc_html_e( 'Vision', 'pray4ramadan-porch' ); ?></span></h2>
                <hr class="lines wow zoomIn" data-wow-delay="0.3s">
                <div style="padding: 2em">
                <p class="section-subtitle wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s" style="padding:2em">
                    <?php echo nl2br( esc_html( get_field_translation( $porch_fields["goal"], $lang ) ) ); ?>
                </p>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <?php
                $dt_ramadan_selected_campaign_magic_link_settings["section"] = "percentage";
                echo dt_24hour_campaign_shortcode( //phpcs:ignore
                    $dt_ramadan_selected_campaign_magic_link_settings
                );
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="item-boxes wow fadeInDown" data-wow-delay="0.2s">
                    <div class="icon">
                        <img class="color-img" style="height: 40px; margin-top:10px" src="<?php echo esc_html( plugin_dir_url( __File__ ) . 'img/pray.svg' ) ?>" alt="Praying hands icon"/>
                    </div>
                    <h4><?php esc_html_e( 'Extraordinary Prayer', 'pray4ramadan-porch' ); ?></h4>
                    <p><?php esc_html_e( 'Every disciple making movement in history has happened within the context of extraordinary prayer.', 'pray4ramadan-porch' ); ?></p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="item-boxes wow fadeInDown" data-wow-delay="0.4s">
                    <div class="icon">
                        <img class="color-img" style="height: 40px; margin-top:10px" src="<?php echo esc_html( plugin_dir_url( __File__ ) . 'img/movement.svg' ) ?>" alt="a network icon indicating movement"/>
                    </div>
                    <h4><?php esc_html_e( 'Church Focused', 'pray4ramadan-porch' ); ?></h4>
                    <p><?php esc_html_e( 'Join us in asking the Lord to move mightily so that disciples are made and healthy churches are planted in Iran.', 'pray4ramadan-porch' ); ?></p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="item-boxes wow fadeInDown" data-wow-delay="0.6s">
                    <div class="icon">
                        <img class="color-img" style="height: 40px; margin-top:10px" src="<?php echo esc_html( plugin_dir_url( __File__ ) . 'img/24_7.svg' ) ?>" alt="clock icon"/>
                    </div>
                    <h4><?php esc_html_e( '24/7 for 6 weeks', 'pray4ramadan-porch' ); ?></h4>
                    <p><?php esc_html_e( 'Choose a 15-minute (or more!) time slot to pray for the people of Iran. Invite someone else to sign up too.', 'pray4ramadan-porch' ); ?></p>
                </div>
            </div>
        </div>
        <div class="row" style="justify-content: center">
            <a href="<?php echo esc_url( site_url() ) ?>#sign-up" class="btn btn-common"><?php esc_html_e( 'Sign Up to Pray', 'pray4ramadan-porch' ); ?></a>
        </div>

    </div>
</section>
<!-- Services Section End -->


<?php if ( time() <= strtotime( $campaign_fields['end_date']['formatted'] ?? '' ) ) : ?>
    <!-- COUNTER ROW -->
    <div id="days_until" class="counters section" data-stellar-background-ratio="0.5" >
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="wow fadeInUp" data-wow-delay=".3s">
                        <div class="facts-item">
                            <div class="fact-count">
                                <h2 id="counter_title" style="font-size:3em;"></h2>
                                <h3><span id="days"></span><span id="hours"></span><span id="mins"></span><span id="secs"></span><span id="end"></span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 30px">
                <div class="col-sm-12 col-md-8" style="color: white">
                    <?php echo nl2br( esc_html( get_field_translation( $porch_fields["what_content"], $lang ) ) ); ?>
                </div>
                <div class="col-sm-12 col-md-4">
                    <?php
                    $dt_ramadan_selected_campaign_magic_link_settings["section"] = "calendar";
                    echo dt_24hour_campaign_shortcode( //phpcs:ignore
                        $dt_ramadan_selected_campaign_magic_link_settings
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Counter Section End -->
    <script>
        var myfunc = setInterval(function() {
            // The data/time we want to countdown to
            <?php
            $timezone = !empty( $campaign_fields["campaign_timezone"] ) ? $campaign_fields["campaign_timezone"]["key"] : 'America/Chicago';
            $tz = new DateTimeZone( $timezone );
            $begin_date = new DateTime( "@".$campaign_fields['start_date']['timestamp'] );
            $begin_date->setTimezone( $tz );
            $timezone_offset = $tz->getOffset( $begin_date );

            $timezone_adjusted_start_date = $campaign_fields['start_date']['timestamp'] - $timezone_offset;

            $timezone_adjusted_end_date = $campaign_fields['end_date']['timestamp'] - $timezone_offset;
            ?>
            var countDownDate = '<?php echo $timezone_adjusted_start_date?>'
            var endCountDownDate = '<?php echo $timezone_adjusted_end_date ?>'


            var now = moment.utc(moment.now()).unix()
            var timeleft = countDownDate - now;
            var endtimeleft = endCountDownDate - now ;

            var days = Math.floor(timeleft / (60 * 60 * 24));
            var hours = Math.floor((timeleft % (60 * 60 * 24)) / (60 * 60));
            var minutes = Math.floor((timeleft % (60 * 60)) / 60);
            var seconds = Math.floor(timeleft % 60);

            if ( endtimeleft < 0 ) {
                clearInterval(myfunc);
                document.getElementById("counter_title").innerHTML = "<?php echo esc_html__( "Ramadan is Finished", 'pray4ramadan-porch' ); ?>"
                document.getElementById("days").innerHTML = ""
                document.getElementById("hours").innerHTML = ""
                document.getElementById("mins").innerHTML = ""
                document.getElementById("secs").innerHTML = ""
            }
            else if ( timeleft < 0 ) {

                days = Math.floor(endtimeleft / (60 * 60 * 24));
                hours = Math.floor((endtimeleft % (60 * 60 * 24)) / (60 * 60));
                minutes = Math.floor((endtimeleft % (60 * 60)) / 60);
                seconds = Math.floor(endtimeleft % 60);

                document.getElementById("counter_title").innerHTML = "<?php echo esc_html__( "Ramadan Ends ...", 'pray4ramadan-porch' ); ?>"
                document.getElementById("days").innerHTML = days + " <?php echo esc_html__( "days", 'pray4ramadan-porch' ); ?>, "
                document.getElementById("hours").innerHTML = hours + " <?php echo esc_html__( "hours", 'pray4ramadan-porch' ); ?>, "
                document.getElementById("mins").innerHTML = minutes + " <?php echo esc_html__( "minutes", 'pray4ramadan-porch' ); ?>, "
                document.getElementById("secs").innerHTML = seconds + " <?php echo esc_html__( "seconds", 'pray4ramadan-porch' ); ?>"

            } else {
                document.getElementById("counter_title").innerHTML = "<?php echo esc_html__( "Noruz Begins ...", 'pray4ramadan-porch' ); ?>"
                document.getElementById("days").innerHTML = days + " <?php echo esc_html__( "days", 'pray4ramadan-porch' ); ?>, "
                document.getElementById("hours").innerHTML = hours + " <?php echo esc_html__( "hours", 'pray4ramadan-porch' ); ?>, "
                document.getElementById("mins").innerHTML = minutes + " <?php echo esc_html__( "minutes", 'pray4ramadan-porch' ); ?>, "
                document.getElementById("secs").innerHTML = seconds + " <?php echo esc_html__( "seconds", 'pray4ramadan-porch' ); ?>"
            }

        }, 1000)
    </script>

    <!-- SIGN UP TO PRAY -->
    <section id="features" class="section" data-stellar-background-ratio="0.2">
        <div id="sign-up" name="sign-up" class="container">
            <div class="section-header">
                <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s"><?php esc_html_e( 'Sign Up to', 'pray4ramadan-porch' ); ?> <span><?php esc_html_e( 'Pray', 'pray4ramadan-porch' ); ?></span></h2>
                <hr class="lines wow zoomIn" data-wow-delay="0.3s">
            </div>
            <div class="row">
                <?php
                if ( empty( $dt_ramadan_selected_campaign_magic_link_settings ) ) :?>
                    <p style="margin:auto">Choose campaign in settings <a href="<?php echo esc_html( admin_url( 'admin.php?page=dt_porch_template&tab=general' ) );?>"><?php esc_html_e( 'here', 'pray4ramadan-porch' ); ?></a></p>
                <?php else :

                    $dt_ramadan_selected_campaign_magic_link_settings["section"] = "sign_up";
                    echo dt_24hour_campaign_shortcode( //phpcs:ignore
                        $dt_ramadan_selected_campaign_magic_link_settings
                    );
                endif;
                ?>
            </div>
        </div>
    </section>
    <!-- Features Section End -->

<?php endif; ?><!-- campaign passed -->

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
                            <h3><span class="counter">45</span></h3>
                            <h4><?php esc_html_e( 'Days', 'pray4ramadan-porch' ); ?></h4>
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
                            <h3>1,080</h3>
                            <h4><?php esc_html_e( 'Hours of Prayer', 'pray4ramadan-porch' ); ?></h4>
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
                            <h3>4320</h3>
                            <h4><?php esc_html_e( 'Prayer Commitments Needed', 'pray4ramadan-porch' ); ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counter Section End -->

<!-- Blog Section -->
<section id="blog" class="section">
    <!-- Container Starts -->
     <div class="container">
        <div class="section-header">
            <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s"><?php esc_html_e( '15-Minute', 'pray4ramadan-porch' ); ?> <span><?php esc_html_e( 'Prayer Prompts', 'pray4ramadan-porch' ); ?></span></h2>
            <hr class="lines wow zoomIn" data-wow-delay="0.3s">
            <p class="section-subtitle wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s"><?php esc_html_e( 'Use these resources to help pray specifically each day during Noruz and Ramadan', 'pray4ramadan-porch' ); ?></p>
            <p class="section-subtitle wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s"><a href="/prayer/list" class="btn btn-common btn-rm"><?php esc_html_e( 'View All', 'pray4ramadan-porch' ); ?></a></p>
        </div>
    </div>
</section>
<!-- blog Section End -->

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
                        &copy;  <?php echo esc_html ( date("Y") ); ?>
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
