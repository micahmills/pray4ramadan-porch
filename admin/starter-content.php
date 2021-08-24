<?php
if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

class P4_Ramadan_Porch_Starter_Content {
    public static function load_content( $day ) {

        $days = [
            'day_1',
            'day_2',
            'day_3',
//            'day_4',
//            'day_5',
//            'day_6',
//            'day_7',
//            'day_8',
//            'day_9',
//            'day_10',
//            'day_11',
//            'day_12',
//            'day_13',
//            'day_14',
//            'day_15',
//            'day_16',
//            'day_17',
//            'day_18',
//            'day_19',
//            'day_20',
//            'day_21',
//            'day_22',
//            'day_23',
//            'day_24',
//            'day_25',
//            'day_26',
//            'day_27',
//            'day_28',
//            'day_29',
//            'day_30',
        ];

        $installed = [];
        foreach( $days as $day ) {
            // get content

            $post = self::$day();

            $content = implode( "", $post['content'] );

            // build args
            $args = [
                'post_title'    => $post['title'],
                'post_date'    => $post['post_date'],
                'post_content'  => $content,
                'post_status'   => 'publish',
                'post_author'   => get_current_user_id(),
                'meta_input' => [
                    PORCH_LANDING_META_KEY => $post['slug']
                ]
            ];

            $installed[] = wp_insert_post( $args );
        }

        return $installed;
    }

    public static function day_1(){
        return [
            'title' => 'Day 1',
            'slug' => 'day-1',
            'post_date' => '',
            'content' => [
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

    public static function day_2(){
        return [
            'title' => 'Day 1',
            'slug' => 'day-1',
            'post_date' => '',
            'content' => [
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

    public static function day_3(){
        return [
            'title' => 'Day 1',
            'slug' => 'day-1',
            'post_date' => '',
            'content' => [
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

}
