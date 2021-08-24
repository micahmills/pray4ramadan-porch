<?php
if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

class P4_Ramadan_Porch_Starter_Content {
    public static $target_year = '2021'; // @todo update to 2022 for release

    public static function load_content() {
        dt_write_log( __METHOD__ );
        $days = [
            'sample_fuel',
            'april_2',
            'april_3',
            'april_4',
            'april_5',
            'april_6',
            'april_7',
            'april_8',
            'april_9',
            'april_10',
            'april_11',
            'april_12',
            'april_13',
            'april_14',
            'april_15',
            'april_16',
            'april_17',
            'april_18',
            'april_19',
            'april_20',
            'april_21',
            'april_22',
            'april_23',
            'april_24',
            'april_25',
            'april_26',
            'april_27',
            'april_28',
            'april_29',
            'april_30',
        ];

        $installed = [];
        foreach ( $days as $day ) {
            // get content

            $post = self::$day();

            $content = implode( "", wp_unslash( $post['content'] ) );

            // build args
            $args = [
                'post_title'    => $post['title'],
                'post_date'    => $post['date'],
                'post_content'  => $content,
                'post_excerpt'  => $post['excerpt'] ,
                'post_type'  => PORCH_LANDING_POST_TYPE,
                'post_status'   => 'publish',
                'post_author'   => get_current_user_id(),
                'meta_input' => [
                    PORCH_LANDING_META_KEY => $post['slug'],
                    'starter_1_2022' => true
                ]
            ];

            $installed[] = wp_insert_post( $args );
        }

        dt_write_log( $installed );

        return $installed;
    }

    public static function sample_fuel(){
        return [
            'title' => 'Sample Prayer Fuel',
            'slug' => 'sample-prayer-fuel',
            'date' => gmdate( "Y-m-d" ),
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>SAMPLE OF THE DAILY PRAYER FUEL</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:separator {"className":"is-style-wide"} -->',
                '<hr class="wp-block-separator is-style-wide"/>',
                '<!-- /wp:separator -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>Thank You, Lord, for the Amazigh of Zaghouan! We praise You that they were made in Your image. We pray in faith that this month of Ramadan would be used to awaken them to eternity and prepare their hearts for the Gospel.</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>My husband and I have been Christians for many years and we seek to serve Him faithfully. Please pray for the spiritual children God has given us. Pray they would take the things they’ve learned from us and teach others (2 Timothy 2:2). Pray that we would have many generations of spiritual grandchildren and great-great-grandchildren.</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p><em>“And all these, though commended through their faith, did not receive what was promised, since God had provided something better for us, that apart from us they should not be made perfect.” (Hebrews 11:39-40)&nbsp;</em>Thank You, Lord, for the beautiful tapestry of faith you are weaving through believers across the centuries. We pray for many Tunisians to be brought into this promise, even during this month of Ramadan. Amen!</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>Tunisians have been raised to memorize and recite the Koran, but not necessarily to apply it to their lives. When new believers begin reading the Bible, sometimes they find it hard to understand that God desires that His children not only read His Word but obey it. Pray that new Christians will be a light to the world around them by the way they obey the scriptures. James 2:17 says, “.<em>.. faith by itself if it is not accompanied by action, is dead</em>.”</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>The LORD alone is worthy of all praise. All the heavens, earth, and nations will bless Your name. (Psalm 145:21) “<em>My mouth will speak the praise of the Lord,&nbsp;and let all flesh bless his holy name forever and ever.</em>“</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_2(){
        return [
            'title' => 'April 2',
            'slug' => 'april-2',
            'date' => self::$target_year . '-04-02',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>We pray for the man in Ariana who is reading the Bible because he wants to know more about Christ. Hear our prayers, Lord.</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>I am O., a young woman from Zahrouni. I became a Christian in the last year. Please pray that I will have wisdom and boldness to share with my family.</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p><em>"Now faith is the assurance of things hoped for, the conviction of things not seen. For by it the people of old received their commendation." (Hebrews 11:1-2) Give every believer in Tunisia courage to live by faith instead of by sight."</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>Each morning, many Tunisians wake up and read their horoscopes in order to know how to live each day.  They want to know their destinies, but don\'t entrust their futures to God.  Isaiah 47:13 warns that astrologists cannot save us, but God wants us to trust in Him alone to plan our futures. Pray that Tunisians would trust God with their lives.</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>"The LORD alone is Creator. You made the heavens, the earth, and all the nations. (Psalm 33:6-9) ""By the word of the Lord the heavens were made,
                        and by the breath of his mouth all their host.
                    He gathers the waters of the sea as a heap;
                        he puts the deeps in storehouses.
                    Let all the earth fear the Lord;
                        let all the inhabitants of the world stand in awe of him!
                    For he spoke, and it came to be;
                        he commanded, and it stood firm."</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_3(){
        return [
            'title' => 'April 3',
            'slug' => 'april-3',
            'date' => self::$target_year . '-04-03',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_4(){
        return [
            'title' => 'April 4',
            'slug' => 'april-4',
            'date' => self::$target_year . '-04-04',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_5(){
        return [
            'title' => 'April 5',
            'slug' => 'april-5',
            'date' => self::$target_year . '-04-05',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_6(){
        return [
            'title' => 'April 6',
            'slug' => 'april-6',
            'date' => self::$target_year . '-04-06',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_7(){
        return [
            'title' => 'April 7',
            'slug' => 'april-7',
            'date' => self::$target_year . '-04-07',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_8(){
        return [
            'title' => 'April 8',
            'slug' => 'april-8',
            'date' => self::$target_year . '-04-08',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_9(){
        return [
            'title' => 'April 9',
            'slug' => 'april-9',
            'date' => self::$target_year . '-04-09',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_10(){
        return [
            'title' => 'April 10',
            'slug' => 'april-10',
            'date' => self::$target_year . '-04-10',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_11(){
        return [
            'title' => 'April 11',
            'slug' => 'april-11',
            'date' => self::$target_year . '-04-11',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_12(){
        return [
            'title' => 'April 12',
            'slug' => 'april-12',
            'date' => self::$target_year . '-04-12',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_13(){
        return [
            'title' => 'April 13',
            'slug' => 'april-13',
            'date' => self::$target_year . '-04-13',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_14(){
        return [
            'title' => 'April 14',
            'slug' => 'april-14',
            'date' => self::$target_year . '-04-14',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_15(){
        return [
            'title' => 'April 15',
            'slug' => 'april-15',
            'date' => self::$target_year . '-04-15',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_16(){
        return [
            'title' => 'April 16',
            'slug' => 'april-16',
            'date' => self::$target_year . '-04-16',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_17(){
        return [
            'title' => 'April 17',
            'slug' => 'april-17',
            'date' => self::$target_year . '-04-17',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_18(){
        return [
            'title' => 'April 18',
            'slug' => 'april-18',
            'date' => self::$target_year . '-04-18',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_19(){
        return [
            'title' => 'April 19',
            'slug' => 'april-19',
            'date' => self::$target_year . '-04-19',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_20(){
        return [
            'title' => 'April 20',
            'slug' => 'april-20',
            'date' => self::$target_year . '-04-20',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_21(){
        return [
            'title' => 'April 21',
            'slug' => 'april-21',
            'date' => self::$target_year . '-04-21',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_22(){
        return [
            'title' => 'April 22',
            'slug' => 'april-22',
            'date' => self::$target_year . '-04-22',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_23(){
        return [
            'title' => 'April 23',
            'slug' => 'april-23',
            'date' => self::$target_year . '-04-23',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_24(){
        return [
            'title' => 'April 24',
            'slug' => 'april-24',
            'date' => self::$target_year . '-04-24',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_25(){
        return [
            'title' => 'April 25',
            'slug' => 'april-25',
            'date' => self::$target_year . '-04-25',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_26(){
        return [
            'title' => 'April 26',
            'slug' => 'april-26',
            'date' => self::$target_year . '-04-26',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_27(){
        return [
            'title' => 'April 27',
            'slug' => 'april-27',
            'date' => self::$target_year . '-04-27',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_28(){
        return [
            'title' => 'April 28',
            'slug' => 'april-28',
            'date' => self::$target_year . '-04-28',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_29(){
        return [
            'title' => 'April 29',
            'slug' => 'april-29',
            'date' => self::$target_year . '-04-29',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

    public static function april_30(){
        return [
            'title' => 'April 30',
            'slug' => 'april-30',
            'date' => self::$target_year . '-04-30',
            'excerpt' => 'Focus prayer on the Amazigh in Zaghouan, the southern region of Tunisia.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>replace</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
    }

}
