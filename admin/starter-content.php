<?php
if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

class P4_Ramadan_Porch_Starter_Content {
    public static $start_of_ramadan = 'April 2, 2021';

    public static function load_content() {

        self::sample_fuel();

        $installed = [];
        $content =  self::content();
        for( $i = 0; $i <= 30; $i++ ) {

            $title = date( 'F j', strtotime( self::$start_of_ramadan . ' + ' . $i . ' day' ) );
            $date = date( 'Y-m-d', strtotime( self::$start_of_ramadan . ' + ' . $i . ' day' ) );
            $slug = str_replace( ' ', '-', strtolower( date( 'F j', strtotime( self::$start_of_ramadan . ' + ' . $i . ' day' ) ) ) ) ;
            $post_content = implode( '', wp_unslash( $content[$i]['content'] ) );

            $args = [
                'post_title'    => $title,
                'post_date'    => $date,
                'post_content'  => $post_content,
                'post_excerpt'  => $content[$i]['excerpt'],
                'post_type'  => PORCH_LANDING_POST_TYPE,
                'post_status'   => 'publish',
                'post_author'   => get_current_user_id(),
                'meta_input' => [
                    PORCH_LANDING_META_KEY => $slug,
                    'starter_1' => true
                ]
            ];

            $installed[] = wp_insert_post( $args );

        }

        dt_write_log($installed);

        return $installed;
    }

    public static function sample_fuel(){
        $data =  [
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
        $content = implode( '', wp_unslash( $data['content'] ) );

        // build args
        $args = [
            'post_title'    => 'Sample Prayer Fuel',
            'post_date'    => $data['date'],
            'post_content'  => $content,
            'post_excerpt'  => $data['excerpt'] ,
            'post_type'  => PORCH_LANDING_POST_TYPE,
            'post_status'   => 'publish',
            'post_author'   => get_current_user_id(),
            'meta_input' => [
                PORCH_LANDING_META_KEY => $data['slug'],
                'starter_1' => true
            ]
        ];

        return wp_insert_post( $args );

    }

    public static function content() {
        return [
            [
              'excerpt' => 'Focus prayer for the Amazigh of Zaghouan.',
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
                  '<p>My husband and I have been Christians for many years and we seek to serve Him faithfully. Please pray for the spiritual children God has given us. Pray they would take the things they\'ve learned from us and teach others (2 Timothy 2:2). Pray that we would have many generations of spiritual grandchildren and great-great grandchildren. </p>',
                  '<!-- /wp:paragraph -->',

                  '<!-- wp:heading {"level":3} -->',
                  '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                  '<!-- /wp:heading -->',

                  '<!-- wp:paragraph -->',
                  '<p>"And all these, though commended through their faith, did not receive what was promised, since God had provided something better for us, that apart from us they should not be made perfect." (Hebrews 11:39-40) Thank You Lord for the beautiful tapestry of faith you are weaving through believers across the centuries. We pray for many Tunisians to be brought into this promise, even during this month of Ramadan. Amen!</p>',
                  '<!-- /wp:paragraph -->',

                  '<!-- wp:heading {"level":3} -->',
                  '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                  '<!-- /wp:heading -->',

                  '<!-- wp:paragraph -->',
                  '<p>Tunisians have been raised to memorize and recite the Koran, but not necessarily to apply it to their lives. When new belivers begin reading the Bible, sometimes they find it hard to understand that God desires that His children not only read His word, but obey it. Pray that new Christians will be a light to the world around them by the way they obey the scriptures. James 2:17 says, "... faith by itself, if it is not accompanied by action, is dead."</p>',
                  '<!-- /wp:paragraph -->',

                  '<!-- wp:heading {"level":3} -->',
                  '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                  '<!-- /wp:heading -->',

                  '<!-- wp:paragraph -->',
                  '<p>"The LORD alone is worthy of all praise. All the heavens, earth, and nations will bless Your name. (Psalm 145:21) "My mouth will speak the praise of the Lord, and let all flesh bless his holy name forever and ever."</p>',
                  '<!-- /wp:paragraph -->',
              ]
            ],
            [
                'excerpt' => 'Focus prayer for the man in Ariana who is reading the Bible.',
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
                    '<p>"Now faith is the assurance of things hoped for, the conviction of things not seen. For by it the people of old received their commendation." (Hebrews 11:1-2) Give every believer in Tunisia courage to live by faith instead of by sight."</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Each morning, many Tunisians wake up and read their horoscopes in order to know how to live each day. They want to know their destinies, but don\'t entrust their futures to God. Isaiah 47:13 warns that astrologists cannot save us, but God wants us to trust in Him alone to plan our futures. Pray that Tunisians would trust God with their lives.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"The LORD alone is Creator. You made the heavens, the earth, and all the nations. (Psalm 33:6-9) "By the word of the Lord the heavens were made, and by the breath of his mouth all their host. He gathers the waters of the sea as a heap; he puts the deeps in storehouses. Let all the earth fear the Lord; let all the inhabitants of the world stand in awe of him! For he spoke, and it came to be; he commanded, and it stood firm."</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for the man in Beja who said he is reading slowly through the Bible.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Thank You for the man in Beja who said he is reading slowly through the Bible. Please open the eyes of his heart to the truth of Your word.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I am H. from Tunis. I have been a believer for 4 years. I shared with my sister and her daughters, and they also believed! However, my husband and my own daughter have refused to believe. My daughter suffers from the results of witchcraft and is possessed by evil spirits. Please pray for her. She sometimes tries to take her own life.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith we understand that the universe was created by the word of God, so that what is seen was not made out of things that are visible." (Hebrews 11:3) As Tunisians encounter the beauty of your creation through Mediterranean beaches, Saharan desert dunes, and luscious green hills may they be drawn to the Word through whom You created the world.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>When Tunisians decide to follow Christ, they often find it hard to read the Bible. There may be several reasons. In the Tunisian culture people don`t tend to enjoy reading because it is rare to find books in the heart language. As Muslims, the Koran is difficult to understand so they leave the reading to the religious leaders. Many Tunisians now prefer to watch YouTube videos rather than read. When Tunisians become Christians, if they don\'t immerse themselves in the Word, they find that they can\'t defend their faith when opposition comes. New believers don\'t continue in maturity when they don\'t read the Bible. Recently, a few groups have begun, focusing on reading the Bible in a short period of time in order to understand God\'s big picture plan. Pray for these groups to grow and continue.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>The LORD alone is Owner. The heavens, the earth, and all the nations belong to You. (Psalm 24:1). "The earth is the Lord\'s and the fullness thereof, the world and those who dwell therein..."</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for the man in Ben Arous who has been on a journey towards Christ for quite a while.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>We pray for the man in Ben Arous who has been on a journey towards Christ for quite a while. He has been reading the Bible and seems to be more open than ever. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I am S. from Bizerte. I am a Christian. I would like for you to pray for me. I suffer from severe back pain. Also pray that I will be able to share my faith with those I love.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith Abel offered to God a more acceptable sacrifice than Cain, through which he was commended as righteous..." (Hebrews 11:4a) Convict Tunisians this Ramadan, Lord, that we can only be made right before you on your terms through faith, not ours.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>For many Tunisians, money is their god. Many are poor and believe the value of a person lies in how much money he has. People marry based on the amount of money someone has. Friendships are based on money. Even in Christian families, couples find themselves still struggling to agree on how to view money. Christians sometimes struggle to break away from money as a motivator in their lives.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"The LORD alone is Ruler. You govern the heavens, the earth, and all the nations. (Psalm 33:10-11) "The Lord brings the counsel of the nations to nothing; he frustrates the plans of the peoples. The counsel of the Lord stands forever, the plans of his heart to all generations."</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for the man in Binzerte who started reading the Bible.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>We pray for the man in Binzerte who started reading the Bible after his wife left him and their children. Draw his heart to you and may he bring Good News to his whole family. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I am S. from just outside Tunis. I am learning about the Christian faith. I was severely abused as a child. I have friends like me who are now confused about the trauma of the past and about gender. Please pray for us. I want the Lord to forgive me, and I want to know His will for my life.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"...Now before he [Enoch] was taken he was commended as having pleased God." (Hebrews 11:5b) May believers in Tunisia, through faith, seek commendation from You more than man. May they live their lives in pursuit of Your approval alone.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Many young people today say that all religions are the same. When they reject Islam because of its violence or lack of love, they reject all religions as man-made. They claim to be atheists. Pray for those who reject Islam, that they would search for a true relationship with God. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"The LORD alone is Judge. You call the heavens, the earth, and all the nations to account. (Psalm 33:13-15) "The Lord looks down from heaven; he sees all the children of man; from where he sits enthroned he looks out on all the inhabitants of the earth, he who fashions the hearts of them all and observes all their deeds."</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for the man In Gabes who is reading the Bible every night.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Thank You for the man In Gabes who is reading the Bible every night. We pray for him to courageously obey Your Word and to find others who are open to reading the Bible, too.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I am N. My three daughters and I are Christians. We want to share our faith with others. My husband passed away this year and left us with many debts. Pray that I will be able to pay for my daughters’ education expenses and at the same time pay off our debts.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"And without faith it is impossible to please him, for whoever would draw near to God must believe that he exists and that he rewards those who seek him." (Hebrews 11:6) Lord, please cause multitudes of Tunisians to seek You and experience the greatest reward -- Yourself! </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Sometimes Tunisian Christians find it hard to have strong relationships with other Tunisians. Satan divides. Pray that God would unify believers in One Spirit and One Truth. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"The LORD alone is Revealer. In relation to the heavens, the earth, and all the nations, You speak the truth. (Psalm 33:4) "For the word of the Lord is upright, and all his work is done in faithfulness."</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for the woman in Gafsa who is hungry to read the Bible.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Thank You for the woman in Gafsa who is hungry to read the Bible. May she voraciously read it and share it with others.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I am from Ben Arous. I chose to follow Jesus this year. I love reading the Bible and learning more about God. Two years ago my father died. Please pray for my mother and sister. I have been sharing the gospel with them.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith Noah, being warned by God concerning events as yet unseen, in reverent fear constructed an ark for the saving of his household..." (Hebrews 11:7a) We pray for many heads of household, who like Noah, would take outrageous risks for the sake of saving their families.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Distractions can be a major obstacle to spiritual growth. Tunisians who begin a relationship with Jesus, sometimes find themselves distracted by jobs, relationships, health, and the worries of this world. Even when Christians pray, sometimes they find it hard to pray without distraction. Pray that Tunisian Christians will have clarity as they pray and grow in the Word.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"The LORD alone is Lover. You love all that You made -- the heavens, the earth, and all the nations. (Psalm 145:9) "The Lord is good to all, and his mercy is over all that he has made."</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for the man in Jendouba who is reading the Bible for the first time.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Thank you for the man in Jendouba who is reading the Bible for the first time. Lead him to faith in You and to share Your word with others. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I am S. from Tunis. I am a Christian. My husband and daughters are Christians as well. We face persecution from our extended family. Please pray for our relatives and that we will know how to love them and be a light to them.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith Abraham obeyed when he was called to go out to a place that he was to receive as an inheritance. And he went out, not knowing where he was going." (Hebrews 11:8) May both seekers and believers in Tunisia be willing to start on a journey of obedience to You despite not knowing how it may turn out in this life. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>There is long held belief that treasures are hidden in the earth and that spirits protect them. If one will give sacrifices to the spirits, they will reveal the treasure. Some have even offered their babies with a special mark as a sacrifice. Pray that this evil practice would stop. Pray that people would no longer be drawn to these earthly treasures but to God\'s heavenly treasure.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"The LORD alone is Savior. You save all who turn to You in all the earth and among the nations. (Psalm 36:6) " Your righteousness is like the mountains of God; your judgments are like the great deep; man and beast you save, O Lord."</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for the man in Kairouan who is reading the Bible and has question.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>We praise you for the man in Kairouan who is reading the Bible and has questions. May he find that all of his questions are answered in Christ\'s life, death, burial, and resurrection. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I am I. I have been a believer for 15 years. My wife and daughters are also believers. I have a dream to see all of Tunisia reached for Christ. I travel the country sharing my faith. Pray that our family will be able to minister together. Pray that we will be able to help others start house churches.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith he went to live in the land of promise as in a foreign land, living in tents with Isaac and Jacob, heirs with him of the same promise. For he was looking forward to the city that has foundations, whose designer and builder is God." (Hebrews 11:9-10) May Tunisian believers embrace their heavenly citizenship and being confirmed into heaven\'s customs, language, priorities, and values in ever-increasing measures.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Every small town has its own saint and shrines dedicated to these saints. These shrines are often found outside the town in a high place, just as the high places in the Old Testament, so that the saint can protect the area. Tunisians go to these shrines and offer animal sacrifices and vows in order to receive help in their studies, finding a mate, fertility, and money. These covenants tie them spiritually to spirits that keep them in bondage. Pray for freedom from those who have previously made covenants with these spirits.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"The LORD alone is Leader. You guide all the nations. (Psalm 67:4) "Let the nations be glad and sing for joy, for you judge the peoples with equity and guide the nations upon earth."</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for the man in Kasserine who is reading the Bible and has put his trust in Jesus.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Thank you for the man in Kasserine who is reading the Bible and has put his trust in Jesus. May he be soil that goes on to reproduce 30, 60, and 100 fold throughout this region. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I am R and am from a traditional family in the countryside. I have been a believer for 2 months. I was disillusioned with Islam and found much hope and love in Christ. I ask that you pray that I can share the gospel of Christ with my family. Pray that God will begin to work on opening their hearts.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith Sarah herself received power to conceive, even when she was past the age, since she considered him faithful who had promised." (Hebrews 11:11) Please give every believer in Tunisia spiritual children no matter how long they have in the faith. Let each one trust Your faithfulness that You will give them spiritual children as they obey You. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Before they became Christans, some Tunisians were possessed by spirits who enabled them to prophesy or speak in other languages. In Acts 16:16-24 we read the story of Paul delivering a slave girl from an evil spirit that allowed her to prophesy. In the same way, pray that seekers and Christians would be delivered from these spirits.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"The LORD alone is Creator. You made the heavens, the earth, and all the nations. (Jeremiah 10:10-12) "But the Lord is the true God; he is the living God and the everlasting King. At his wrath the earth quakes, and the nations cannot endure his indignation. Thus shall you say to them: “The gods who did not make the heavens and the earth shall perish from the earth and from under the heavens.” It is he who made the earth by his power, who established the world by his wisdom, and by his understanding stretched out the heavens."</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for the woman in Kebili who has a copy of the Bible.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Thank you for the woman in Kebili who has a copy of the Bible. We pray for a hunger for it to grow in her heart and for her to see that Jesus is the way, the truth, and the life. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I hold a doctorate in Islamic theology from the most reputable university in our country. During my studies, I became disillusioned with Islam and the varying opinions. I decided to be a Christian. Today I face threats and persecution from radical Islamists. I ask for prayer for comfort and encouragement. I want my grown children to come to Christ. Pray that I will be freed from fear, and I will boldly share.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Therefore from one man, and him as good as dead, were born descendents as many as the stars of heaven and as many as the innumerable grains of sand by the seashore." (Hebrews 11:12) Lord, you promised Abraham he would be the father of many nations. We ask for breakthrough among the 10 Unengaged, Unreached People Groups in Tunisia. May they be included in this promise in our generation.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>A young believer had a daughter. When the daughter was still a baby [she] died. Later, there was a news article in which the police found items stolen from different people. The young believer saw her daughter’s doll in the photo. Someone had stolen the item from her daughter and put a curse on her so that she would die. The police had found piles of these items in the graveyard where people did witchcraft and put curses on those they were jealous of or wanted to hurt with revenge. Pray that God’s power of love and protection would [overcome these] curses</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"The LORD alone is Owner. The heavens, the earth, and all the nations belong to You. (Psalm 89:11) "The heavens are yours; the earth also is yours; the world and all that is in it, you have founded them."</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => "Focus prayer for the woman in Mahdia who said: I've read the Injil and I like it",
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Thank You, Lord, for the woman in Mahdia who said, "I\'ve read the Injil and I like it. I want to read more in order to understand it." May she engage other friends and family with her as she is drawn to You. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>My wife and I are Tunisian believers. My father died this year with the coronavirus. I fear for my elderly mother. Though my father refused to accept Christ, I pray that God will soften my mother’s heart.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"These all died in faith, not having received the things promised, but having seen them and greeted them from afar, and having acknowledged that they were strangers and exiles on the earth. For people who speak thus make it clear that they are seeking a homeland." (Hebrews 11:14) May Tunisian believers\' honorable and pure conduct make it clear to those watching them that they are strangers and exiles on the earth for Your glory.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>A Christian recounts a time when she was young and her father wanted to build a third floor on their building. The neighbors complained, yet he got permission to build. The neighbors were furious. Later, her family found a package in the yard, thrown over by the neighbors. There was a safety pin with 7 papers folded up and attached. Each one was a specific curse for her family: sickness, accident,...Her mother burned all of these papers, fearing that her daughters would face wrath. Eventually all seven curses happened to her family. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"The LORD alone is Ruler. You govern the heavens, the earth, and all the nations. (Isaiah 40:22-24) "It is he who sits above the circle of the earth, and its inhabitants are like grasshoppers; who stretches out the heavens like a curtain, and spreads them like a tent to dwell in; who brings princes to nothing, and makes the rulers of the earth as emptiness. Scarcely are they planted, scarcely sown, scarcely has their stem taken root in the earth, when he blows on them, and they wither, and the tempest carries them off like stubble."</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for the man in Manouba who said he is slowly reading the Bible.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>We pray for the man in Manouba who said he is slowly reading the Bible. During this month of Ramadan, awaken his heart to eternal realities and stir a hunger in him for You.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I am a young woman from Jendouba. I believed when I had a vision of Jesus Christ as King. I would like to be baptized, but I live with my family and am not allowed to leave the house. Pray that I will be able to be baptized and be able to share my faith with my family.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"If they had been thinking of that land from which they had gone out, they would have had opportunity to return. But as it is, they desire a better country, that is, a heavenly one. Therefore God is not ashamed to be called their God, for he has prepared for them a city." (Hebrews 11:15-16) We cry out for You to raise up men and women from every region of Tunisia who desire a better country, a heavenly one. People who seek to store their treasure there, instead of here on earth."</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Not long ago, a local news program invited the most famous "witch doctor" in the country to be interviewed on the show. The interviewer asked, "What type of person comes to visit you? The rich? The poor? The witch doctor replied, "Everyone comes to visit me: the rich, the poor, the government ministers, the doctors, and the religious leaders." Tunisians are searching for spiritual power. Pray that they will reject the evil of these practices and come humbly to God for his guidance.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"The LORD alone is Revealer. In relation to the heavens, the earth, and all the nations, You speak the truth. (Psalm 119:160) "The sum of your word is truth, and every one of your righteous rules endures forever."</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for the woman in Medenine who wants to read the Bible.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>We pray for the woman in Medenine who wants to read the Bible. May the eyes of her heart be opened to see that Jesus is the way, the truth, and the life. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I am 14 years old. My siblings told me about Jesus, and I believed. I want to share with my friends, but I am afraid. Pray for me.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith Abraham, when he was tested, offered up Isaac, and he who had received the promises was in the act of offering up his only son, of whom it was said, “Through Isaac shall your offspring be named.” (Hebrews 11:17-18) Lord, may Tunisians be like Abraham, exhibiting radical, immediate, and costly obedience. "</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>A Christian tells the story of when his mother was trying to have a child. She was barren for many years. In Tunisian society, barreness is seen with shame. She made a vow to a dead Islamic saint that if she could have a child, then she would sacrifice an animal. She had a dream in which she was told that she would have a child and she was given a specific name for the child. She had a boy. For nine more years, she tried to have a child but couldn\'t. She went to a woman who gave her herbs and prayed to a saint. Soon after she had another child. This is a common practice in Tunisia and many children are dedicated to spirits and saints even before they are born. Pray for freedom from the spiritual bondage of these promises and convenants. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"The LORD alone is Lover. You love all that You made -- the heavens, the earth, and all the nations. (Psalm 145:13) "Your kingdom is an everlasting kingdom, and your dominion endures throughout all generations."</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for the man in Monastir who has started reading the Bible.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Thank You for the man in Monastir who has started reading the Bible. As he reads it, bring people to mind who he could share stories and passages with. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I am Libyan. I found out about Christianity from a Facebook page in Tunisia. I told my friends and my teacher about Jesus. I have shared with many and there are now 17 of us who meet together and study the Bible. Recently, I had to flee my country because of persecution. Myself and others in our group want to be baptized. We have never met other Christians.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"He considered that God was able even to raise him from the dead, from which, figuratively speaking, he did receive him back." (Hebrews 11:19) Resurrected King, You conquered death on the cross! We pray for Tunisians to believe that reality and for it to free them from any fear of death -- be that physical or symbolic death to sin or of hopes and dreams.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>The idea of a sorcerer who deals in magic is linked to Islam. These sorcerers are usually trained as religious teachers. They read Islamic books that speak of magic. They use blood sacrifices as ways of appeasing spirits. Pray that God will stop the evil practices of these sorcerers and that His Name would be glorified above all in Tunisia.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"The LORD alone is Reconciler. You will bring peace among the heavens, the earth, and all the nations. (Psalm 46:8-10) "Come, behold the works of the Lord, how he has brought desolations on the earth. He makes wars cease to the end of the earth; he breaks the bow and shatters the spear; he burns the chariots with fire. “Be still, and know that I am God. I will be exalted among the nations, I will be exalted in the earth!”"</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for the woman in Nabeul who is reading the Bible and is impressed by the holy view of marriage.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Thank You for the woman in Nabeul who is reading the Bible and is impressed by the holy view of marriage that she finds in it. We pray that as she shares what she reads with her family that their hearts would be softened to follow Christ.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I am from a town in southern Tunisia. When I was 20 years old, I left home and got involved in drugs and sex. The Messiah appeared to me in a dream and showed me that I was in sin and that he died to forgive me of my sins. I accepted the Lord, but I still struggle with addiction. Every day I pray that I will resist temptation. Pray that I will be healed and will be able to focus to finish my studies.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith Isaac invoked future blessings on Jacob and Esau." (Hebrews 11:20) Despite brokenness in their family, Isaac agreed with God\'s covenant and knew it would mean blessing for his sons. May conviction of Your desire that none would perish but all come to repentance, compel Tunisian believers to bless their family by speaking the Good News of Jesus. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>A young woman became a believer. Her mother began to listen to her message and wanted to follow Jesus as well. However, the young woman\'s father practiced evil magic. He had shelves of magic books and symbols. He put a curse on her, and she died of cancer within a short period of time. He also put a curse on his wife and she is still paralyzed today. Pray that God would bring complete physical and spiritual healing to this woman. Pray that all who practice evil magic would find their efforts in vain.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>The LORD alone is Creator. By You all things were created in heaven and earth and all things were created for You. (Colossians 1:15-17) "He is the image of the invisible God, the firstborn of all creation. For by[a] him all things were created, in heaven and on earth, visible and invisible, whether thrones or dominions or rulers or authorities—all things were created through him and for him. And he is before all things, and in him all things hold together."</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for the woman in Sfax who wants to read the Bible because she is convinced that the religion she grew up in is not the truth.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>We praise You for the woman in Sfax who wants to read the Bible because she is convinced that the religion she grew up in is not the truth. Open the eyes of her heart to understand and give her eyes of faith to obey what she reads.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I am a believer but my husband and daughter are far from Christ and refuse to follow Him. I want to help my daughter who is being physically abused by her husband and is thinking of divorcing him, but my husband disagrees with me. Right now, my daughter and I are living alone. Pray that my daughter will know Christ and accept Him as her Savior.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith Jacob, when dying, blessed each of the sons of Joseph, bowing in worship over the head of his staff." (Hebrews 11:21) May every believer in Tunisia have spiritual children that they can, by faith, impart the same blessing to -- that there may be a multitude of multiplying disciples in the land. (Genesis 49:16)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>A Tunisian business man was very wealthy. His wife feared that he would someday divorce her and so she put curses on him and went to the "witch doctors" for dark magic. However, she herself went into a sudden coma for 15 years. The man eventually remarried and had three children. However, the first wife woke up one day. When she found out that her husband had remarried, she began to put curses on him again. Pray for this woman and others who are so entranced by evil that they cannot escape withouth the grace of God.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"The LORD alone is Savior. You save all who turn to You in all the earth and among the nations. (Isaiah 45:22) "“Turn to me and be saved, all the ends of the earth! For I am God, and there is no other."</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for the man in Sidi Bou Zid who read the New Testament.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Thank You Lord for the man in Sidi Bou Zid who read the New Testament once and began reading it a second time in hopes that he would find answers to his questions. May he begin to put what he reads into practice and be led to put his allegiance in Christ.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I am a believer and led my sister and mother to the Lord. Currently, I am talking with my aunts about the Lord. I love to pray for them. One of my aunts is sick and needs an operation. Pray that she will be healed and that God will be glorified.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith Joseph, at the end of his life, made mention of the exodus of the Israelites and gave directions concerning his bones." (Hebrews 11:22) We pray for believers in Tunisia to be so certain of Your promises, that they would have foresight now to prepare for the day when there are multiplying churches in every neighborhood in the country by training and equipping all believers in scalable ways. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>A Tunisian tells the story of her family. She grew up in a wealthy family. Her father married the youngest daughter in a family. The sisters and relatives were jealous so they put curses on the mother. She eventually had four daughters who lived but four sons who all died. Everyone recognized this as a result of the curses. Pray that the evil of cursing one another would end. Pray that those who have been cursed would be free in Jesus\' name.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>The LORD alone is Owner. The heavens, the earth, and all the nations belong to You. (Deuteronomy 10:14) "Behold, to the Lord your God belong heaven and the heaven of heavens, the earth with all that is in it."</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for the man in Siliana who has the Bible and has decided to follow Christ.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>We pray for the man in Siliana who has the Bible and has decided to follow Christ. May He be transformed by reading and obeying the Bible and be led to share with other spiritually open people. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I am a believer from the South. My father was a Christian and taught me about the Messiah. I have a chronic blood disease. Please pray for the Lord to heal me.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith Moses, when he was born, was hidden for three months by his parents, because they saw that the child was beautiful, and they were not afraid of the king\'s edict." (Hebrews 11:23) Thank you Lord for the example of Moses\' parents. We pray for believers in Tunisia to fear God more than they fear anyone or anything else. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>When Tunisian children are born, they are sometimes given to a particular spirit. They are given the name of the spirit or the saint. Pray that, in the name of Jesus, Tunisian children and adults would be able to break free from the ties that hold them to these spirits.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>The LORD alone is Ruler. No other power in all the universe can separate us from Your love. (Romans 8:34-35) "Who is to condemn? Christ Jesus is the one who died—more than that, who was raised—who is at the right hand of God, who indeed is interceding for us. Who shall separate us from the love of Christ? Shall tribulation, or distress, or persecution, or famine, or nakedness, or danger, or sword?"</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for revealing yourself to a man in Sousse through a dream where Jesus clothed him in white.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Thank You for revealing yourself to a man in Sousse through a dream where Jesus clothed him in a white traditional robe and freed him from his sins. He hasn\'t put his faith in Christ yet, but is reading the Bible. Please draw him to Yourself, Lord.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I am from Bizerte. I have been a Christian for one year now. I live alone. Pray that I will grow in my faith and be bold to share with others, and even have a house church in my home someday.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p> "By faith Moses, when he was grown up, refused to be called the son of Pharaoh\'s daughter, choosing rather to be mistreated with the people of God than to enjoy the fleeting pleasures of sin." (Hebrews 11:24-25) Lord, give all believers in Tunisia an eternal perspective to find pleasure in You more than in the fleeting pleasures of sin. As they do, may it be a powerful testimony to onlooking family and friends. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Some Tunisians report feeling tormented by nightmares in which they are suffocating or even feel beaten up. Others report having dreams of Jesus. Pray for Tunisians while they sleep. Pray that, in dreams, God would reveal himself to those who have never heard the gospel.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"The LORD alone is Judge. You call the heavens, the earth, and all the nations to account. (Psalm 96:13) "...before the Lord, for he comes, for he comes to judge the earth. He will judge the world in righteousness, and the peoples in his faithfulness."</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for the man in Tataouine who is searching for the truth.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>We pray for the man in Tataouine who is searching for the truth. He owns a copy of the Bible. May he have a strong hunger to read, obey, and share it with others even today.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I am a new believer from northern Tunisia. My hobby is camping. My Christian friends shared the Gospel with me while on one of our trips. Pray that I will be able to share the Gospel with others during our camping trips and through my drawings.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"He considered the reproach of Christ greater wealth than the treasures of Egypt, for he was looking to the reward." (Hebrews 11:26) Awaken Tunisians to the greater wealth of Christ. May multitudes esteem Him more than any treasure they can have here on earth. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Tunisians are taught that God wills everything and so there is no point in trying to change it. If someone dies of lung cancer due to smoking, then it was simply God\'s will. If they don\'t have a job, it is God\'s will. Pray for new believers to reject this passivity. Pray that they will live wholeheartedly for God. Philippians 1:27-28 says "Whatever happens, conduct yourselves in a manner worthy of the gospel of Christ.... stand firm in the one Spirit,striving together as one for the faith of the gospel without being frightened in any way by those who oppose you."</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"The LORD alone is Revealer. You make known the knowledge of Yourself in all the earth. (Psalm 22:27, 30-31) "All the ends of the earth shall remember and turn to the Lord, and all the families of the nations shall worship before you...Posterity shall serve him; it shall be told of the Lord to the coming generation; they shall come and proclaim his righteousness to a people yet unborn, that he has done it."</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for the woman in Tozeur who has read a lot of the Bible.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Thank You for the woman in Tozeur who has read a lot of the Bible. We pray this Ramadan that she would be reminded of it and would see that the word is living and active. May she engage friends and family with the Bible as well.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I am a Christian. I live in a poor neighborhood in Tunis. I recently lost my job and I cannot pay my expenses. Please pray that I will be able to find a job where I can also share my faith.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith he left Egypt, not being afraid of the anger of the king, for he endured as seeing him who is invisible." (Hebrews 11:27) Fear is a powerful weapon of the enemy in Tunisia. As You draw men and women to Yourself, Lord, help them fix their eyes on You instead of on their fears. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>In nearly every Tunisian home, good luck charms are hung. Tails of fish, the "hand of Fatima", and Koranic verses are hung over the doors for protection against evil spirits and the evil eye. Students wear necklaces and have key chains with amulets because they trust these charms will help them succeed on exams. Mothers pin charms on their babies\' clothes to protect them. Brides put "henna" on their hands and feet before the wedding to protect their marriage. Pray for new Christians as they stand up to the culture that pressures them to use these charms for protection. Pray that they will put their trust in God and be free of the reliance on charms. In the Old Testament, Ezekiel wrote against false prophets who used amulets. “‘Therefore this is what the Sovereign Lord says: I am against your magic charms with which you ensnare people like birds and I will tear them from your arms; I will set free the people that you ensnare like birds. (Ezekiel 13:20) </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"The LORD alone is Savior. You are Your people\'s strength, song, and salvation. (Exodus 15:2) "The Lord is my strength and my song, and he has become my salvation; this is my God, and I will praise him, my father\'s God, and I will exalt him."</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for the man in Tunis who is reading the Bible very slowly be so impacted by the truth.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>May the man in Tunis who is reading the Bible very slowly be so impacted by the truth of it that he can\'t help sharing it with others. We pray in faith that not only would he believe, but that he would also grow to be a lay leader of a house church.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I have been a Christian for a little over a month. I shared my faith with my fiancé. We were to be married this summer. He refused to accept the Lord and we have called off the engagement. Pray for me in this difficult moment. Pray that God would comfort me and help me to be a light to my family.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith he kept the Passover and sprinkled the blood, so that the Destroyer of the firstborn might not touch them." (Hebrews 11:28) We pray for many in Tunisia to put their faith in Christ\'s blood that was poured out for them. Let the power of Your death, burial, and resurrection convince them to put their faith in You and to be freed from the Destroyer.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Traditional folk music, characterized by chanting and beating drums, is often dedicated to a particular saint. Tunisians grow up hearing the same songs at festivals and weddings. They become nostalgic when they hear certain music. Women spin their heads rapidly until they collapse. Tunisians dance and sing until they become entranced and can no longer control their movements. They dance for hours into the night, and they are encouraged to keep going in this hypnotic state without stopping. The music is like a drug that draws them into relationship with a certain saint. Even when someone becomes a Christian, they may still be drawn to the music of the past. As Christians start new lives, pray that God will show them how they can worship Him in Spirit and truth in song.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>The LORD alone is Ruler. All of heaven and earth and the nations will affirm Your universal lordship. (Ephesians 1:20-23) "that he worked in Christ when he raised him from the dead and seated him at his right hand in the heavenly places, far above all rule and authority and power and dominion, and above every name that is named, not only in this age but also in the one to come. And he put all things under his feet and gave him as head over all things to the church, which is his body, the fullness of him who fills all in all."</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for the man in Zaghouan who is reading the Bible.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Thank You for the man in Zaghouan who is reading the Bible. He has many questions. May he find all of the questions answered in Christ. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I am from Tunis and have been a Christian for six months. I have been persecuted by the people closest to me. My mother was in an accident. Please pray that God would heal her and use this miracle to bring my family to Him.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p> "By faith the people crossed the Red Sea as on dry land, but the Egyptians, when they attempted to do the same, were drowned." (Hebrews 11:29) We pray for God\'s miraculous works recorded in the Bible to stir believers in Tunisia to live by faith in ever-increasing measure.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Prostitution is a problem in Tunisia. Men and women do not realize that there bodies are temples! Before the time of Islam in Tunisia, many native Berbers did not value the sexual union between a man and wife. When Islam came, Islam allowed for temporary religious sexual contracts. Though Tunisia outlawed the Islamic practice of a man taking four wives, many men still have relationships with several women because the Koran allows for it. Pray that Tunisians would see their bodies as a living sacrifice. Pray for Christians who engaged in prostitution in the past. Pray that God will redeem them and transform their lives! Galatians 6:19-20 says, "Do you not know that your bodies are temples of the Holy Spirit, who is in you, whom you have received from God? You are not your own; you were bought at a price. Therefore honor God with your bodies."</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>The LORD alone is Revealer. You reveal your power and authority over the heavens, the earth, and all the nations. (Joshua 2:10-11) "For we have heard how the Lord dried up the water of the Red Sea before you when you came out of Egypt, and what you did to the two kings of the Amorites who were beyond the Jordan, to Sihon and Og, whom you devoted to destruction. And as soon as we heard it, our hearts melted, and there was no spirit left in any man because of you, for the Lord your God, he is God in the heavens above and on the earth beneath."</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for the Jews of Tunisia do not observe Ramadan.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Though the Jews of Tunisia do not observe Ramadan, their lives are affected by the society around them. May they be reminded of what the Scriptures say about true fasting in Isaiah 58. We pray that your promises of this chapter would be fulfilled for the Jews of Tunisia through Christ.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I have been a Christian in my heart for 4 years now. When my mother decided to follow Christ, she shared with me, and I decided to follow Him too. One day, my father found a Bible I had hidden and tore it to shreds. He blamed my mother and always threatens to divorce her. I love to read the Bible on my phone everyday. I am not allowed to go meet with other Christians. I am encouraged by talking with Christian friends on Facebook. This past month I was secretly baptized. I want my father to know about my faith, but I am afraid he will blame my mother. Pray for my father and my two sisters who still refuse to follow Christ.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith the walls of Jericho fell down after they had been encircled for seven days." (Hebrews 11:30) May every wall that separates Tunisians from Christ fall down as we faithfully pray and obey His commands. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Many Tunisian women struggle with their value. The Koran has taught them they are inferior. Many have been abused by strangers, boyfriends, relatives, and even husbands. Pray for healing for Tunisian women believers. Pray that believers will love them while they are healing and embracing a new life in Christ, and yet living in very difficult circumstances. Pray for an awakening among Tunisian women, that they would know that they are children of God and equal heirs in His kingdom. (Gal. 3:26-28)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>The LORD alone is Sovereign and loving obedience to You is the source of all human well-being and good. (Deuteronomy 4:39-40) "know therefore today, and lay it to your heart, that the Lord is God in heaven above and on the earth beneath; there is no other. Therefore you shall keep his statutes and his commandments, which I command you today, that it may go well with you and with your children after you, and that you may prolong your days in the land that the Lord your God is giving you for all time.”</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for the lady from the Amazigh of Gafsa UUPG who got to hear a Tunisian believer share her testimony.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Thank you for the lady from the Amazigh of Gafsa UUPG who got to hear a Tunisian believer share her testimony of faith in Christ. We pray she and her family\'s hearts would be softened to the Gospel.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I have been a Christian for several years now. I started my journey towards Christ when I saw major inconsistencies in Islam and what I believed to be good and right. Since coming to faith, my wife took our children and left. Please pray for me to be reconciled to my wife and for she and our children to put their faith in Christ. Pray that I would be able to lead others to find the new life I\'ve found in Christ. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith Rahab the prostitute did not perish with those who were disobedient, because she had given a friendly welcome to the spies." (Hebrews 11:31) Thank You Lord, for the reminder that no one is too far from Your saving grace. We pray for many Tunisians, no matter their background, to be given new identities in Christ through faith.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Many merchants open each day by playing a recording of verses from the Koran. They hope the readings will bring the blessings of clients. Taxi drivers play the recordings for protection as they drive. The meanings of the words are not important, but simply that the verses are present. Pray for Tunisians to have the opportunity to read the Bible. Currently, several groups of believers are focusing on trying to read the entire Bible within a few months in order to understand God\'s purpose and be able to share with others.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>The LORD alone is Savior. In You, the heavens, the earth, and all the nations put their hope of salvation. (Revelation 7:10) "...and crying out with a loud voice, “Salvation belongs to our God who sits on the throne, and to the Lamb!”</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for the Tunisian believer who expressed a desire to take the Gospel to the Amazigh.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Thank you for the Tunisian believer who expressed a desire to take the Gospel to the Amazigh of Djerba. We pray for him to clearly hear Your Spirit\'s leading and that You would raise up dozens of others like him -- willing to go to other parts of the country to share the Good News. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I have been a Christian for about six months now. I came to faith through reading the Bible. In fact, God\'s Word affected me so much, I tried to find a way to get three more copies of the Injil to give to my friends. Pray for me to grow in learning how to share my story of faith and God\'s story of salvation with others. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"And what more shall I say? For time would fail me to tell of Gideon..." (Hebrews 11:32-35a) Gideon allowed God to dwindle an army of more than 30,000 to 300 so that God would receive all of the glory for the victory. Raise up leaders like Gideon in Tunisia, men and women who will have more confidence in God than in their resources.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Each Friday, many women prepare incense, make couscous, and clean their houses. This is an effort to get rid of evil spirits, purify, and invite good spirits into their homes. In the Bible we see that the prayers of God\'s people are like incense to the Lord (Ps. 141:2). Today, this Friday, as believers we pray that our prayers will be a pleasing aroma to the Lord and that Tunisians all over the country will worship the true God with their prayers and hearts.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"The LORD alone is Judge. You call the heavens, the earth, and all the nations to account. (Romans 14:9-12) "For to this end Christ died and lived again, that he might be Lord both of the dead and of the living. Why do you pass judgment on your brother? Or you, why do you despise your brother? For we will all stand before the judgment seat of God; for it is written, “As I live, says the Lord, every knee shall bow to me, and every tongue shall confess[a] to God.” So then each of us will give an account of himself to God."</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for Libyan Christians who find themselves living in Tunisia for various reasons.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Thank You, God, for Libyan Christians who find themselves living in Tunisia for various reasons. Free them from fear and make them bold witnesses among Libyans and Tunisians they see in their neighborhoods and workplaces. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I have been a Christian for two years. Though I had been curious about Christ for a while, I made the decision to follow Him when my grandmother died and I realized I wasn\'t ready to die. Pray for my mom and siblings. I\'ve shared the Gospel with them and even read Scripture to them. Pray their hearts would be softened and that they would also put their faith in Christ. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"And what more shall I say? For time would fail me to tell of... Barak..." (Hebrews 11:32-35a) Though Barak stumbled with fear, he still led 10,000 people to victory and freedom for the people of God. We pray for godly Tunisian leaders to be used by God, despite their weaknesses, to free others from the bondage of sin.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Satan enters through many doors. Many believers report experiencing deep physical tiredness, headaches, and sleeplessness that they can\'t explain. They also speak of spiritual tiredness. Though they have stood firm through persecution, they feel stuck and unable to grow. Pray that God will help these believers step into freedom and a new life and that, just like the church in Ephesus, these believers will return to their first love. "I know your deeds, your hard work and your perseverance. I know that you cannot tolerate wicked people, that you have tested those who claim to be apostles but are not, and have found them false. You have persevered and have endured hardships for my name, and have not grown weary. Yet I hold this against you: You have forsaken the love you had at first." Revelation 2:2-4</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>The LORD alone is Ruler. All of Your enemies, including death itself, are under the feet of the reigning Christ. (1 Corinthians 15:24-28) "Then comes the end, when he delivers the kingdom to God the Father after destroying every rule and every authority and power. For he must reign until he has put all his enemies under his feet. The last enemy to be destroyed is death. For “God[a] has put all things in subjection under his feet.” But when it says, “all things are put in subjection,” it is plain that he is excepted who put all things in subjection under him. When all things are subjected to him, then the Son himself will also be subjected to him who put all things in subjection under him, that God may be all in all."</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for the love You have for the deaf in Tunisia.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>We praise You, Father, for the love You have for the deaf in Tunisia. Please speak to their hearts this Ramadan and grow a holy dissatisfaction in them that only Christ can satisfy. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I have been a Christian for a couple of years. I have been hurt very deeply in my past. Please pray that God would bring healing to my soul and that I would find my value, purpose, and belonging in Him. Pray that I would be able to help others who carry deep wounds find freedom in Christ, as I, too, find freedom in Him.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p> "And what more shall I say? For time would fail me to tell of... David..." (Hebrews 11:32-35a) Please raise up many like David in Tunisia, men and women after God\'s own heart. As they chase after God\'s heart, may they lead many others into relationship with Him.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Tunisian Muslims are taught that God is distant. They perform ritual prayer to please Him. There is no relationship. New Christians sometimes struggle with learning how to pray and hearing God\'s voice. Pray that God will show them how to grow deeper with Him in prayer.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>The LORD alone is Creator. All things were made through You and without You was not anything made that was made. (John 1:3) "All things were made through him, and without him was not any thing made that was made."</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for the man from the Amazigh of Matmata who has heard the Gospel and has a copy of the New Testament.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Lord, thank You for the man from the Amazigh of Matmata who has heard the Gospel and has a copy of the New Testament. Open his eyes to see that the answer to all of his questions are found in Christ crucified, buried, and resurrected. Please lead him to faith in you.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I am a Christian from the north. I have followed Christ for many years, but almost all of it has been by myself without any consistent Christian fellowship. Pray for God to lead me to neighbors, coworkers, or family members who are open to discovering the Bible. Pray that I could host a simple church in my home that would be a light in a dark place in my small village. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Some were tortured, refusing to accept release, so that they might rise again to a better life. Others suffered mocking and flogging, and even chains and imprisonment. They were stoned, they were sawn in two, they were killed with the sword." (Hebrews 11:35b-37) Give all believers in Tunisia perseverance in the face of persecution. Comfort them by the great cloud of witnesses that have gone before them, witnesses like those described in these verses. </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>For generations, Tunisian parents have passed down the religion of Islam and beliefs about spirits and saints to their children. The children are told that to doubt is a sin and will send them to hell. Therefore, generations are locked into a false belief system. Even the most educated, often refuse to critically think when it comes to religion. Pray that this generation will seek God and Truth and that many generations after them will continue to benefit by their decision. Deuteronomy 7:9 says, "Know therefore that the Lord your God is God; he is the faithful God, keeping his covenant of love to a thousand generations of those who love him and keep his commandments."</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"The LORD alone is Lover. You love all that You made -- the heavens, the earth, and all the nations. (Psalm 145:17) "The Lord is righteous in all his ways and kind in all his works."</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Focus prayer for the Amazigh of Tataouine.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Regions/UUPGs:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Thank You, Father, for the Amazigh of Tataouine! We pray for the Amazigh man who got a hold of two copies of the Bible -- one for himself and one for him to share. Please stir a hunger in him this Ramadan to read Your word and to talk about it with others.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition from a Tunisian Believer:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>I have been a Christian for many years and have experienced a lot of suffering in my life. Pray that I would be strengthened with power through God\'s Spirit in my inner being (Eph 3:17). Pray that I and my husband (who is also a Christian) would have the eyes of our hearts enlightened that we may know what is the hope to which he called us (Eph 1:18). </p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Pray Hebrews 11 for Tunisia:&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"They went about in skins of sheep and goats, destitute, afflicted, mistreated— of whom the world was not worthy—wandering about in deserts and mountains, and in dens and caves of the earth." (Hebrews 11:37-38) Thank you for our many brothers and sisters in Tunisia -- of whom the world is not worthy. Protect them from the evil one and preserve their faith. May every persecution only strengthen their resolve and demonstrate the treasure of Christ.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Petition Against Spiritual Barriers:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Many Tunisian Muslims believe that spirits called "jinn" live in their homes and protect them. They sometimes throw bits of meat with blood into the corners of the rooms as an offering to these jinn who live with them. Some of these practices are similar to animistic practices in Sub-saharan Africa. Pray that Tunisians will know the True God, who will be their Protector. "Trust in him at all times, you people; pour out your hearts to him, for God is our refuge." Ps. 62:8 Pray that new believers will give God their fears, and that He would give them peace."</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>Praise the One True God:</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"The LORD alone is Revealer. In relation to the heavens, the earth, and all the nations, You speak the truth. (Isaiah 45:19) "I did not speak in secret, in a land of darkness; I did not say to the offspring of Jacob, ‘Seek me in vain.‘ I the Lord speak the truth; I declare what is right."</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ]
        ];
    }
}
