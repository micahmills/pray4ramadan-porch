<?php
$porch_fields = p4r_porch_fields();
$campaign_fields = p4r_get_campaign();
$dt_ramadan_selected_campaign_magic_link_settings = get_option( 'dt_ramadan_selected_campaign_magic_link_settings' );
$dt_ramadan_selected_campaign_magic_link_settings["color"] = $porch_fields["theme_color"]["value"];
?>

<!-- FAQ -->
<section id="services" class="section">
    <div class="container">
        <div class="section-header row">
            <div class="col-sm-12 col-md-6">
                <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Our <span>Vision</span></h2>
                <hr class="lines wow zoomIn" data-wow-delay="0.3s">
                <p class="section-subtitle wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">
                    We want to cover the country of <?php echo esc_html( $porch_fields['country_name']['value'] ?? '' ) ?> with continuous 24/7 prayer during the entire 30 days of Ramadan.
                </p>
            </div>
            <div class="col-sm-12 col-md-6">
                <?php
                $dt_ramadan_selected_campaign_magic_link_settings["section"] = "percentage";
                dt_24hour_campaign_shortcode(
                    $dt_ramadan_selected_campaign_magic_link_settings
                );
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="item-boxes wow fadeInDown" data-wow-delay="0.2s">
                    <div class="icon">
                        <i class="lnr lnr-pencil"></i>
                    </div>
                    <h4>Extraordinary Prayer</h4>
                    <p>Every disciple making movement in history has happened in the context of extraordinary prayer.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="item-boxes wow fadeInDown" data-wow-delay="0.4s">
                    <div class="icon">
                        <i class="lnr lnr-cog"></i>
                    </div>
                    <h4>Movement Focused</h4>
                    <p>Join us in asking, seeking, and knocking for streams of disciples and churches to be made.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="item-boxes wow fadeInDown" data-wow-delay="0.6s">
                    <div class="icon">
                        <i class="lnr lnr-chart-bars"></i>
                    </div>
                    <h4>24/7 for 30 Days</h4>
                    <p>Choose a 15-minute (or more!) time slot that you can pray during each day. Invite someone else to sign up too.</p>
                </div>
            </div>
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
                    <p>
                        Ramadan is one of the five requirements (or pillars) of Islam. During each of its 30 days, Muslims are obligated to fast from dawn until sunset. During this time they are supposed to abstain from food, drinking liquids, smoking, and sexual relations.
                    </p>
                    <p>
                        In Tunisia, women typically spend the afternoons preparing a big meal. At sunset, families often gather to break the fast. Traditionally the families break the fast with a drink of water, then three dried date fruits, and a multi-course meal. After watching the new Ramadan TV series, men (and some women) go out to coffee shops where they drink coffee, and smoke with friends until late into the night.
                    </p>
                    <p>
                        Though many Tunisians have stopped fasting in recent years, and lots of Tunisians are turned off by the hypocrisy, increased crime rates, and rudeness that is pervasive through the month, lots of Tunisians become more serious about religion during this time. Many attend the evening prayer services and do the other ritual prayers. Some even read the entire Quran (about a tenth the length of the Bible). This sincere seeking makes it a strategic time for us to pray for them.
                    </p>
                </div>
                <div class="col-sm-12 col-md-4">
                    <?php
                    $dt_ramadan_selected_campaign_magic_link_settings["section"] = "calendar";
                    dt_24hour_campaign_shortcode(
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
            var countDownDate = new Date("<?php echo esc_html( $campaign_fields['start_date']['formatted'] ) ?> 00:00:00").getTime();
            var endCountDownDate = new Date("<?php echo esc_html( $campaign_fields['end_date']['formatted'] ) ?> 00:00:00").getTime();

            var now = new Date().getTime();
            var timeleft = countDownDate - now;
            var endtimeleft = endCountDownDate - now;

            var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
            var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);

            if ( endtimeleft < 0 ) {
                clearInterval(myfunc);
                document.getElementById("counter_title").innerHTML = "Ramadan is Finished"
                document.getElementById("days").innerHTML = ""
                document.getElementById("hours").innerHTML = ""
                document.getElementById("mins").innerHTML = ""
                document.getElementById("secs").innerHTML = ""
            }
            else if (timeleft < 0) {

                days = Math.floor(endtimeleft / (1000 * 60 * 60 * 24));
                hours = Math.floor((endtimeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                minutes = Math.floor((endtimeleft % (1000 * 60 * 60)) / (1000 * 60));
                seconds = Math.floor((endtimeleft % (1000 * 60)) / 1000);

                document.getElementById("counter_title").innerHTML = "Ramadan Ends ..."
                document.getElementById("days").innerHTML = days + " days, "
                document.getElementById("hours").innerHTML = hours + " hours, "
                document.getElementById("mins").innerHTML = minutes + " minutes, "
                document.getElementById("secs").innerHTML = seconds + " seconds"

            } else {
                document.getElementById("counter_title").innerHTML = "Ramadan Begins ..."
                document.getElementById("days").innerHTML = days + " days, "
                document.getElementById("hours").innerHTML = hours + " hours, "
                document.getElementById("mins").innerHTML = minutes + " minutes, "
                document.getElementById("secs").innerHTML = seconds + " seconds"
            }

        }, 1000)
    </script>

    <!-- SIGN UP TO PRAY -->
    <section id="features" class="section" data-stellar-background-ratio="0.2">
        <div id="sign-up" name="sign-up" class="container">
            <div class="section-header">
                <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Sign Up to <span>Pray</span></h2>
                <hr class="lines wow zoomIn" data-wow-delay="0.3s">
            </div>
            <div class="row">
                <?php
                if ( empty( $dt_ramadan_selected_campaign_magic_link_settings ) ) :?>
                    <p style="margin:auto">Choose campaign in settings <a href="<?php echo esc_html( admin_url( 'admin.php?page=dt_porch_template&tab=general' ) );?>">here</a></p>
                <?php else :

                    $dt_ramadan_selected_campaign_magic_link_settings["section"] = "sign_up";
                    dt_24hour_campaign_shortcode(
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

<!-- Blog Section -->
<section id="blog" class="section">
    <!-- Container Starts -->
    <div class="container">
        <div class="section-header">
            <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">15-Minute <span>Prayer Fuel</span></h2>
            <hr class="lines wow zoomIn" data-wow-delay="0.3s">
            <p class="section-subtitle wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">Use these resources to help pray specifically each day for the month of Ramadan</p>
            <p class="section-subtitle wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s"><a href="/prayer/list" class="btn btn-common btn-rm">View All</a></p>
        </div>
    </div>
</section>
<!-- blog Section End -->

<!-- WHAT IS RAMADAN -->
<!--<section id="description" class="section gray-background">-->
<!--    <div class="container">-->
<!--        <div class="section-header">-->
<!--            <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">What is <span>Ramadan</span>?</h2>-->
<!--            <hr class="lines wow zoomIn" data-wow-delay="0.3s">-->
<!--        </div>-->
<!--        <div class="row">-->
<!--            <div class="col-md-6 col-sm-6">-->
<!--                <div class="wow fadeInDown" data-wow-delay="0.2s">-->
<!--                    --><?php //echo wp_kses_post( nl2br( $porch_fields['what_content']['value'] ) ) ?>
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-6 col-sm-6">-->
<!--                <div class="item-boxes wow fadeInDown" data-wow-delay="0.4s">-->
<!--                    <div class="shot-item">-->
<!--                        <img src="--><?php //echo esc_url( trailingslashit( plugin_dir_url( __FILE__ ) ) ) ?><!--img/portfolio/img1.jpg" alt="" />-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- Services Section End -->

<!-- Footer Section Start -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="social-icons wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">
                    <ul>
                        <!-- facebook -->
                        <?php if ( isset( $porch_fields['facebook']["url"] ) && !empty( $porch_fields['facebook']["url"] ) ) : ?>
                        <li class="facebook"><a href="<?php echo esc_url( $porch_fields['facebook']["url"] ) ?>"><i class="fa fa-facebook"></i></a></li>
                        <?php endif; ?>

                        <!-- instagram -->
                        <?php if ( isset( $porch_fields['instagram']["url"] ) && !empty( $porch_fields['instagram']["url"] ) ) : ?>
                        <li class="instagram"><a href="<?php echo esc_url( $porch_fields['instagram']["url"] ) ?>"><i class="fa fa-instagram"></i></a></li>
                        <?php endif; ?>

                        <!-- twitter -->
                        <?php if ( isset( $porch_fields['twitter']["url"] ) && !empty( $porch_fields['twitter']["url"] ) ) : ?>
                        <li class="twitter"><a href="<?php echo esc_url( $porch_fields['twitter']["url"] ) ?>"><i class="fa fa-twitter"></i></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="site-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.3s">
                    <p>
                        Made with &#10084;&#65039; by <a href="https://pray4movement.org">Pray4Movments.org</a><br>
                        Powered by <a href="https://disciple.tools">Disciple.Tools</a><br>
                        &copy;  <script>document.write(new Date().getFullYear())</script>
                    </p>
                </div>
                <div class="site-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.3s">
                    <p><a href="/contacts">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Go To Top Link -->
<a href="#" class="back-to-top">
    <i class="lnr lnr-arrow-up"></i>
</a>

<div id="loader">
    <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
    </div>
</div>
