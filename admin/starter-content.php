<?php
if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

class P4_Ramadan_Porch_Starter_Content {
    public static function load_content() {
        $fields = p4r_get_campaign();
        if ( empty( $fields ) ) {
            dt_write_log( 'Campaign not set' );
            return false;
        }
        $start = $fields['start_date']['formatted'] ?? '';
        if ( empty( $start ) ) {
            dt_write_log( 'Start date not set' );
            return false;
        }

        self::sample_prompt();

        $installed = [];
        $content = self::content();
        for ( $i = 0; $i <= 30; $i++ ) {

            $title = gmdate( 'F j Y', strtotime( $start . ' + ' . $i . ' day' ) );
            $date = gmdate( 'Y-m-d', strtotime( $start . ' + ' . $i . ' day' ) );
            $slug = str_replace( ' ', '-', strtolower( gmdate( 'F j Y', strtotime( $start . ' + ' . $i . ' day' ) ) ) );
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

        return $installed;
    }

    public static function sample_prompt(){
        $data = [
            'title' => 'Sample Prayer prompt',
            'slug' => 'sample-prayer-prompt',
            'date' => gmdate( "Y-m-d" ),
            'excerpt' => 'On being intentional disciple making disciples.',
            'content' => [
                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>PRAISE</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>"And they sing the song of Moses, the servant of God, and the song of the Lamb, saying, ’Great and amazing are your deeds, O Lord God the Almighty! Just and true are your ways, O King of the Iranian nations!’" (Revelation 15:3)</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>"But woe to you, scribes and Pharisees, hypocrites! For you shut the kingdom of heaven in people’s faces. For you neither enter yourselves nor allow those who would enter to go in." (Matthew 23:13) In Jesus’ day there were many opposed to the Kingdom, so today is no different. We appeal to Jesus, the One who opens and no one will shut (Revelation 3:7) to open the Kingdom to many in Iran today.</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>Jesus told Paul that "I am sending you to open their eyes, so that they may turn from darkness to light and from the power of Satan to God, that they may receive forgiveness of sins and a place among those who are sanctified by faith in me." (Acts 26:18) We beseech You, Lord, to send many Iranian Pauls to do the same throughout every corner of Iran.</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p> "And what more shall I say? For time would fail me to tell of Gideon..." (Hebrews 11:32-35a) Gideon allowed God to dwindle an army of more than 30,000 to 300 so that God would receive all of the glory for the victory. Raise up leaders like Gideon in Iran, men and women who will have more confidence in God than in their resources.</p>',
                '<!-- /wp:paragraph -->',

                '<!-- wp:heading {"level":3} -->',
                '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                '<!-- /wp:heading -->',

                '<!-- wp:paragraph -->',
                '<p>Lord, we pray for believers in Iran to be intentional making disciples.</p>',
                '<!-- /wp:paragraph -->',
            ]
        ];
        $content = implode( '', wp_unslash( $data['content'] ) );

        // build args
        $args = [
            'post_title'    => 'Sample Prayer prompt',
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
              'excerpt' => 'Pray fo believers to discover the essence of being a disciple, making disciple, and what the church is.',
              'content' => [
                  '<!-- wp:heading {"level":3} -->',
                  '<h3><strong>PRAISE</strong></h3>',
                  '<!-- /wp:heading -->',

                  '<!-- wp:paragraph -->',
                  '<p>"For this I will praise you, O Lord, among the nations [in Iran], and sing to your name. (Psalm 18:49)</p>',
                  '<!-- /wp:paragraph -->',

                  '<!-- wp:heading {"level":3} -->',
                  '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                  '<!-- /wp:heading -->',

                  '<!-- wp:paragraph -->',
                  '<p>"And this gospel of the kingdom will be proclaimed throughout the whole world as a testimony to all nations, and then the end will come." (Matthew 24:14) With faith and confidence, we pray for the Gospel of the Kingdom to spread throughout the nation of Iran. We know it is not a question of ’if’, but a question of ’when’. Please Lord, let it happen in our generation.</p>',
                  '<!-- /wp:paragraph -->',

                  '<!-- wp:heading {"level":3} -->',
                  '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                  '<!-- /wp:heading -->',

                  '<!-- wp:paragraph -->',
                  '<p>"All these with one accord were devoting themselves to prayer..." (Acts 1:14) Father, in this time of social distancing we thank you for the virtual prayer groups you are raising up among Iranian believers and we pray the same abiding that happened among the early disciples would likewise result in bold proclamation and many turning to faith in Jesus in Iran.</p>',
                  '<!-- /wp:paragraph -->',

                  '<!-- wp:heading {"level":3} -->',
                  '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                  '<!-- /wp:heading -->',

                  '<!-- wp:paragraph -->',
                  '<p>"Now faith is the assurance of things hoped for, the conviction of things not seen. For by it the people of old received their commendation." (Hebrews 11:1-2) Give every believer in Iran courage to live by faith instead of by sight.</p>',
                  '<!-- /wp:paragraph -->',

                  '<!-- wp:heading {"level":3} -->',
                  '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                  '<!-- /wp:heading -->',

                  '<!-- wp:paragraph -->',
                  '<p>Lord, help the people of Iran to discover the essence of being a disciple, making disciple, and what the church is.</p>',
                  '<!-- /wp:paragraph -->',
              ]
            ],
            [
                'excerpt' => 'Pray for beleivers to be disciples who hear from God and then obey God.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"All the ends of the earth shall remember and turn to the Lord, and all the families of the Iranian nations shall worship before you." (Psalm 22:27)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Repent, for the kingdom of heaven is at hand." (Matthew 3:2) Pray for Iranian throughout the country to experience true repentance as they see the holy standard of a Righteous King and their inability to ever measure up.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"And they were selling their possessions and belongings and distributing the proceeds to all, as any had need... and the Lord added to their number day by day those who were being saved." (Acts 2:42-47). As believers in Iran seek to be living out these verses, would you, Lord, please add daily those who are being saved.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith we understand that the universe was created by the word of God, so that what is seen was not made out of things that are visible." (Hebrews 11:3) As Iranian encounter the beauty of your creation through Mediterranean beaches, Saharan desert dunes, and luscious green hills may they be drawn to the Word through whom You created the world.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>God, please help the people of Iran to be disciples who hear from you and then obey you.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray that many people study the Bible, understand it, obey it, and share it.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>For kingship belongs to the Lord, and he rules over the Iranian nations. (Psalm 22:28)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"And he went throughout all Galilee, teaching in their synagogues and proclaiming the gospel of the kingdom and healing every disease and every affliction among the people." (Matthew 4:23) Pray for the proclamation of the Gospel to be accompanied by miracles and signs and wonders throughout Iran.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"And in your offspring shall all the families of the earth be blessed." (Acts 3:25b) Lord, please fulfill your promise to Abraham among the many Iranian families spread from the north to the south.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith Abel offered to God a more acceptable sacrifice than Cain, through which he was commended as righteous..." (Hebrews 11:4a) Convict Iranian this Ramadan, Lord, that we can only be made right before you on your terms through faith, not ours.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Father, we pray that the people of Iran will learn to study the Bible, understand it, obey it, and share it.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray many people meet in groups of two or three to encourage and correct one another.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"I will cause your name to be remembered in all generations; therefore nations (including Iran) will praise you forever and ever." (Psalm 45:17)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Blessed are the poor in spirit, for theirs is the kingdom of heaven." (Matthew 5:3) May the Iranian church joyfully demonstrate the blessing that comes from being poor in spirit. Pray for them to experience fuller measures of the Kingdom through their poverty of spirit."</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"And now, Lord, look upon their threats and grant to your servants to continue to speak your word with all boldness, while you stretch out your hand to heal, and signs and wonders are performed through the name of your holy servant Jesus." (Acts 4:30-31) Do it, Lord, please!</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"...Now before he (Enoch) was taken he was commended as having pleased God." (Hebrews 11:5b) May believers in Iran, through faith, seek commendation from You more than man. May they live their lives in pursuit of Your approval alone.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>God, we pray both the men and women of Iran will find ways to meet in groups of two or three to encourage and correct one another..</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray for many people to discover the ways God that make us more like Jesus.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>“Be still, and know that I am God. I will be exalted among the Iranian nations, I will be exalted in the earth!" (Psalm 46:10)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Blessed are those who are persecuted for righteousness sake, for theirs is the kingdom of heaven." (Matthew 5:10) Father, we intercede on behalf of every Iranian brother and sister undergoing persecution for the sake of righteousness. Bless them with greater intimacy with You and give them perseverance in suffering.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"And every day, in the temple and from house to house, they did not cease teaching and preaching that the Christ is Jesus." (Acts 5:41) May believers in Iran saturate the country with the truth that Jesus is the Christ -- loaded with all the richness of that title from Scripture. May every home have an opportunity to hear this truth.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"And without faith it is impossible to please him, for whoever would draw near to God must believe that he exists and that he rewards those who seek him." (Hebrews 11:6) Lord, please cause multitudes of Iranian to seek You and experience the greatest reward -- Yourself!</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Lord, we pray for believers in Iran who will discover the ways you make us more like Jesus.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray the believers know how to spend an hour in prayer.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"God reigns over the Iranian nations; God sits on his holy throne." (Psalm 47:8)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"For I tell you, unless your righteousness exceeds that of the scribes and Pharisees, you will never enter the kingdom of heaven." (Matthew 5:20) Many think that Christians have an easier ’religion’ because of misunderstanding the Gospel of grace through Christ Jesus. We pray for every believer in Iran’s holiness to shine forth and for many to be drawn to Jesus through the authentic witness of Christ in His disciples."</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"And the word of God continued to increase, and the number of the disciples multiplied greatly in Jerusalem, and a great many of the priests became obedient to the faith." (Acts 6:7) Through prayer, ministry of the Word, service, care for the widows, and faith multiply the number of disciples in Iran, Lord.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith Noah, being warned by God concerning events as yet unseen, in reverent fear constructed an ark for the saving of his household..." (Hebrews 11:7a) We pray for many heads of household, who like Noah, would take outrageous risks for the sake of saving their families.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>God, we pray for believers in Iran who will know how easy it is to spend an hour in prayer with you, and will do it.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray believers be good stewards of their relationships.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"I will give thanks to you, O Lord, among the (Iranian) peoples; I will sing praises to you among the nations." (Psalm 57:9)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Your kingdom come, your will be done, on earth as it is in heaven." (Matthew 6:10) Your ways are not our ways. Your Kingdom is unlike every earthly kingdom. We pray for your heavenly Kingdom to come in every home, neighborhood, city, and region throughout this land."</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"But he, full of the Holy Spirit gazed into heaven and saw the glory of God, and Jesus standing at the right hand of God..." (Acts 7:56) Father, we pray for many Stephen-like believers in Iran -- men and women of good repute, full of the Spirit and of wisdom, and servants. May they be ready to do whatever you call them to at whatever cost because they are so gripped by Your glory.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith Abraham obeyed when he was called to go out to a place that he was to receive as an inheritance. And he went out, not knowing where he was going." (Hebrews 11:8) May both seekers and believers in Iran be willing to start on a journey of obedience to You despite not knowing how it may turn out in this life.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Father, we pray for believers in Iran to be good stewards of their relationships.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray for believers in to be generous with all their resources.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"May God be gracious to us and bless us and make his face to shine upon us, that your way may be known on earth, your saving power among all Iranian nations." (Psalm 67:2)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"But seek first the kingdom of God and his righteousness, and all these things will be added to you." (Matthew 6:33) We pray that Your Kingdom would be our first priority. May Your Kingdom values and purposes be the primary focus of every Christian in Iran.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"But when they believed Philip as he preached good news about the kingdom of God and the name of Jesus Christ, they were baptized, both men and women." (Acts 8:12). Empower believers in Iran to preach the good news of the Kingdom and prepare multitudes of men and women to respond and be baptized.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith he went to live in the land of promise as in a foreign land, living in tents with Isaac and Jacob, heirs with him of the same promise. For he was looking forward to the city that has foundations, whose designer and builder is God." (Hebrews 11:9-10) May Iranian believers embrace their heavenly citizenship and being confirmed into heaven’s customs, language, priorities, and values in ever-increasing measures.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>God, we pray for believers in Iran to be generous that you would desire to invest more into them.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray for believers who will not only understand the Gospel, but share it.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Let the Iranian nations be glad and sing for joy, for you judge the peoples with equity and guide the nations upon earth" (Psalm 67:4)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Not everyone who says to me, ’Lord, Lord,’ will enter the kingdom of heaven, but the one who does the will of my Father who is in heaven." (Matthew 7:21) Many God-fearing Iranian seek to obey what they’ve been taught about Him by fasting during Ramadan. Father we pray that they would have an encounter with You, their true Heavenly Father during these thirty days and enter into Your family through Christ, our older brother.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"So Ananias departed and entered the house. And laying his hands on him he said, ’Brother Saul, the Lord Jesus who appeared to you on the road by which you came has sent me so that you may regain your sight and be filled with the Holy Spirit.’" (Acts 9:17) Lord, we ask for many Saul-like hearts in Iran to be brought to repentance and faith in You. We pray for many Ananias-like believers to openly receive those who were staunchly opposed to the Gospel into fellowship.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith Sarah herself received power to conceive, even when she was past the age, since she considered him faithful who had promised." (Hebrews 11:11) Please give every believer in Iran spiritual children no matter how long they have in the faith. Let each one trust Your faithfulness that You will give them spiritual children as they obey You.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Lord, we pray for believers in Iran who will not only understand the Gospel, but know how to share it.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray for believers to be baptized and know how to baptize.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"May all kings fall down before him, all Iranian nations serve him!" (Psalm 72:11)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"I tell you, many will come from east and west and recline at table with Abraham, Isaac, and Jacob in the kingdom of heaven" (Matthew 8:11) We praise you Lord because you’ve called all nations to your table. We pray that many from the east, west, north, and south corners of Iran would join your Kingdom this month.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"So I sent for you at once, and you have been kind enough to come. Now therefore we are all here in the presence of God to hear all that you have been commanded by the Lord." (Acts 10:33) Father, please stir many hearts of heads of households in Iran, like Cornelius, to gather their family to hear the message of the Good News of Jesus.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Therefore from one man, and him as good as dead, were born descendents as many as the stars of heaven and as many as the innumerable grains of sand by the seashore." (Hebrews 11:12) Lord, you promised Abraham he would be the father of many nations. We ask for breakthrough among the 10 Unengaged, Unreached People Groups in Iran. May they be included in this promise in our generation.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Jesus, we pray for believers in Iran to be baptized and know how to baptize.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray for believers to know how to share testimonies about how Jesus impacted their lives.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"May his name endure forever, his fame continue as long as the sun! May people be blessed in him, all Iranian nations call him blessed!" (Psalm 72:17)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"From the days of John the Baptist until now the kingdom of heaven has suffered violence, and the violent take it by force." (Matthew 11:12) Today as another day of fasting and feasting passes, we take comfort in knowing nothing can hinder your Kingdom advancing among the nations. We pray for many in Iran to actively participate in bringing Your Kingdom to the peoples of [Europe].</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"And the hand of the Lord was with them, and a great number who believed turned to the Lord." (Acts 11:21) Even in the midst of persecution, you empowered your disciples to lead many to faith in you. Please do it again, Lord, in Iran.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"These all died in faith, not having received the things promised, but having seen them and greeted them from afar, and having acknowledged that they were strangers and exiles on the earth.  For people who speak thus make it clear that they are seeking a homeland." (Hebrews 11:14) May Iranian believers honorable and pure conduct make it clear to those watching them that they are strangers and exiles on the earth for Your glory.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Jesus, we pray for believers in Iran to know how to share testimonies about how you impacted their lives.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => "Pray for believers to know how to cast vision to others about forming spiritual families who multiply for generations to come.",
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Arise, O God, judge the earth; for you shall inherit all the Iranian nations!" (Psalm 82:8)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Knowing their thoughts, he said to them, ’Every kingdom divided against itself is laid waste, and no city or house divided against itself will stand.’" (Matthew 12:25) We pray for unity among your church in Iran. Though your followers in Iran may have differing strengths, gifts, and expressions of Your Spirit, may there be no division.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"But the word of God increased and multiplied." (Acts 12:24) This verse comes in the context of an evil ruler bent on persecuting the church. No matter what the circumstances may be in Iran, Lord, we pray the word of God would increase and multiply.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"If they had been thinking of that land from which they had gone out, they would have had opportunity to return. But as it is, they desire a better country, that is, a heavenly one. Therefore God is not ashamed to be called their God, for he has prepared for them a city." (Hebrews 11:15-16) We cry out for You to raise up men and women from every region of Iran who desire a better country, a heavenly one. People who seek to store their treasure there, instead of here on earth.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>God, we pray for believers in Iran to know how to cast vision to others about forming spiritual families who multiply for generations to come.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray for believers to be like ducklings in ways they make disciples.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"All the Iranian nations you have made shall come and worship before you, O Lord, and shall glorify your name." (Psalm 86:9)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"When anyone hears the word of the kingdom and does not understand it, the evil one comes and snatches away what has been sown in his heart. This is what was sown along the path." (Matthew 13:19) We pray for many hearts in Iran to be receptive to the Kingdom seed that would take root, grow, and reproduce 30, 60, and 100 fold.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"I have made you a light for the Gentiles, that you may bring salvation to the ends of the earth... and the word of the Lord was spreading throughout the whole region." (Acts 13:47,49) Thank you that Iran is a part of those ’ends of the earth’. We agree with Your word today Lord and pray that it would spread throughout the whole region of Iran and [Europe].</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith Abraham, when he was tested, offered up Isaac, and he who had received the promises was in the act of offering up his only son, of whom it was said, ’Through Isaac shall your offspring be named’." (Hebrews 11:17-18) Lord, may Iranian be like Abraham, exhibiting radical, immediate, and costly obedience.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Lord, we pray for believers in Iran to be like ducklings in ways they make disciples.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray for believers to have eyes that see where the Kingdom isn’t.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Declare his glory among the Iranian nations, his marvelous works among all the peoples!" (Psalm 96:3)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>(The Parable of the Weeds) "He put another parable before them, saying, ’The kingdom of heaven may be compared to a man who sowed good seed in his field’" (Matthew 13:24-30) May the truth of this parable free Christians in Iran from fear of insincere seekers and those with evil intentions. We pray for far more reproducing good seed than weeds in this land. Give wisdom to your church, since only You can judge men’s hearts and motives.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Paul and Barnabas returned to places they had preached "strengthening the souls of the disciples, encouraging them to continue in the faith, and saying that through many tribulations we must enter the kingdom of God." (Acts 14:22) May every believer in Iran be rooted in this truth. As they persevere through tribulations, may it powerfully proclaim the Gospel to the people around them.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"He considered that God was able even to raise him from the dead, from which, figuratively speaking, he did receive him back." (Hebrews 11:19) Resurrected King, You conquered death on the cross! We pray for Iranian to believe that reality and for it to free them from any fear of death -- be that physical or symbolic death to sin or of hopes and dreams.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Father, we pray for believers in Iran to have eyes that see where the Kingdom isn’t.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray for believers to enjoy the intimate connection with you in the Lord’s supper, and know how to lead others in celebrating it.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Say among the Iranian nations, "The Lord reigns! Yes, the world is established; it shall never be moved; he will judge the peoples with equity." (Psalm 96:10)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>(The Mustard Seed and the Leaven ) "He put another parable before them, saying, ’The kingdom of heaven is like a grain of mustard seed that a man took and sowed in his field.’" (Matthew 13:31) Lord, may mustard seed-sized faith produce a great harvest in Iran for Your glory and for the powerful advancement of your Kingdom.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"And God, who knows the heart, bore witnes to them by giving them the Holy Spirit just as he did to us..." (Acts 15:8) Thank You for the precious gift of the Holy Spirit! May every believer in Iran grow in discerning His leading and quickly obey all He tells them to do. May the Spirit give all believers in Iran grace toward one another resulting in the strengthening and multiplying of your Church in this land.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith Isaac invoked future blessings on Jacob and Esau." (Hebrews 11:20) Despite brokenness in their family, Isaac agreed with God’s covenant and knew it would mean blessing for his sons. May conviction of Your desire that none would perish but all come to repentance, compel Iranian believers to bless their family by speaking the Good News of Jesus.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Jesus, we pray for believers in Iran to enjoy the intimate connection with you in the Lord’s supper, and know how to lead others in celebrating it, too.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray for believers to know how to pray for others, even as they walk around.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"The Lord has made known his salvation; he has revealed his righteousness in the sight of the Iranian nations." (Psalm 98:2)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"He told them another parable. ’The kingdom of heaven is like leaven that a woman took and hid in three measures of flour, till it was all leavened.’" (Matthew 13:33) Thank you Lord that you delight in using simple, ordinary people to display Your glory. May this kind of yeast rapidly grow throughout every place in Iran."</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"The Lord opened her (Lydia’s) heart to pay attention to what was said by Paul. And after she was baptized, and her household as well..." (Acts 16:14-15) "And he (the Philippian jailer) took them the same hour of the night and washed their wounds; and he was baptized at once, he and all his family." (Acts 16:33). Please repeat Lydia and the Philippian jailer’s stories over and over again in every region of Iran.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith Jacob, when dying, blessed each of the sons of Joseph, bowing in worship over the head of his staff." (Hebrews 11:21) May every believer in Iran have spiritual children that they can, by faith, impart the same blessing to -- that there may be a multitude of multiplying disciples in the land. (Genesis 49:16)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>God, we pray for believers in Iran to know how to pray for others, even as they walk around.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray for believers to know what a person of peace is, and where to find one.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Iranian "Nations will fear the name of the Lord, and all the kings of the earth will fear your glory." (Psalm 102:15)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>(The Parable of the Hidden Treasure) "The kingdom of heaven is like treasure hidden in a field, which a man found and covered up. Then in his joy he goes and sells all that he has and buys that field." (Matthew 13:44) We pray for many today to see You for the treasure You are. We pray for Iranian in every segment of society to joyfully give up all they have in order to gain You.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"And he made from one man every nation of mankind to live on all the face of the earth, having determined allotted periods and their boundaries of their dwelling place, that they should seek God, and perhaps feel their way toward him and find him. Yet he is actually not far from each of us..." (Acts 17:26-27) We confess your sovereignty in the midst of the uncertainties in Iran brought on by the coronavirus. We pray, Father, that you would use these circumstances to draw many Iranian to yourself.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith Joseph, at the end of his life, made mention of the exodus of the Israelites and gave directions concerning his bones." (Hebrews 11:22) We pray for believers in Iran to be so certain of Your promises, that they would have foresight now to prepare for the day when there are multiplying churches in every neighborhood in the country by training and equipping all believers in scalable ways.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>God, we pray for believers in Iran to know what a person of peace is, and where to find one.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray for believers to know areas they can pray for others, like the BLESS Prayer Pattern.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"I will give thanks to you, O Lord, among the peoples; I will sing praises to you among the Iranian nations." (Psalm 108:3)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>(The Parable of the Pearl of Great Value) "Again, the kingdom of heaven is like a merchant in search of fine pearls, who, on finding one pearl of great value, went and sold all that he had and bought it." (Matthew 13:45-46) Thank You for every man and woman in Iran who have found You to be the pearl of great price. We pray their valuing and treasuring of You, would lead many others to enter Your Kingdom.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Crispus, the ruler of the synagogue, believed in the Lord, together with his entire household. And many of the Corinthians hearing Paul believed and were baptized." (Acts 18:8) We pray for many religious leaders in Iran to believe in You, together with their entire households, and may it lead to entire neighborhoods and cities being reached with the Gospel.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith Moses, when he was born, was hidden for three months by his parents, because they saw that the child was beautiful, and they were not afraid of the king’s edict." (Hebrews 11:23)  Thank you Lord for the example of Moses’ parents. We pray for believers in Iran to fear God more than they fear anyone or anything else.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Father, we pray for believers in Iran to know areas they can pray for others, like the BLESS Prayer Pattern.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray for believers to not only esteem knowing but also doing.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"From the rising of the sun to its setting, the name of the Lord is to be praised! The Lord is high above all Iranian nations, and his glory above the heavens!" (Psalm 113:3-4)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>(The Parable of the Net) "Again, the kingdom of heaven is like a net that was thrown into the sea and gathered fish of every kind." (Matthew 13:47-50) Many Iranian of every kind be brought in Your glorious Kingdom, even this month. We pray for wealthy and poor, educated and uneducated, religious and secular, young and old to be among the ’good fish’ at the end of the age.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Paul reasoned daily in the hall of Tyrannnus and we’re told "this continued for two years, so that all the residents of Asia heard the word of the Lord, both Jews and Greeks." (Acts 19:10) Empower believers in Iran to boldly, faithfully, and consistently proclaim the Gospel of the Kingdom so that all the residents of Iran would hear the word of the Lord and have an opportunity to respond to it.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p> "By faith Moses, when he was grown up, refused to be called the son of Pharaoh’s daughter, choosing rather to be mistreated with the people of God than to enjoy the fleeting pleasures of sin." (Hebrews 11:24-25) Lord, give all believers in Iran an eternal perspective to find pleasure in You more than in the fleeting pleasures of sin. As they do, may it be a powerful testimony to onlooking family and friends.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Lord, we pray for believers in Iran to not only esteem knowing but also doing.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray for believers to know how to meet, pray, learn, grow, fellowship, and practice obeying and sharing in simple churches.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Praise the Lord, all nations! Extol him, all peoples Iranian!" (Psalm 117:1)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"I will give you the keys of the kingdom of heaven, and whatever you bind on earth shall be bound in heaven, and whatever you loose on earth shall be loosed in heaven." (Matthew 16:19) As Your followers in Iran enter into spiritually dark places, may they exercise the Kingdom authority You have delegated to Your church through Christ Jesus.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>We pray that every believer in Iran would "remember the words of the Lord Jesus, how he himself said, "It is more blessed to give than to receive". (Acts 20:35), especially when it comes to spiritual blessings. We pray that every believer would experience the deep joy of giving the gift of Christ to others. Bonus: Check out Kingdom Economy for more on this concept.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"He considered the reproach of Christ greater wealth than the treasures of Egypt, for he was looking to the reward." (Hebrews 11:26) Awaken Iranian to the greater wealth of Christ. May multitudes esteem Him more than any treasure they can have here on earth.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Father, we pray for believers in Iran to know how to meet, pray, learn, grow, fellowship, and practice obeying and sharing in simple churches with the 3/3 Group Meeting Pattern.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray for believers to know how to apply the training cycle for maturing disciples.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Sing praises to the Lord, who sits enthroned in Zion! Tell among the Iranian peoples his deeds!" (Psalm 9:11)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Truly, I say to you, unless you turn and become like children, you will never enter the kingdom of heaven." (Matthew 18:3) Father, please continue to teach and reveal Your upside-down and inside-out Kingdom priorities to every Christian in Iran. We pray that child-like faith would be used by You to bring many Iranian into your presence.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"After greeting them, he related one by one the things that God had done among the Gentiles through his ministry. And when they heard it, they glorified God." (Acts 21:19-20) May the retelling of the stories of grace in Iranian lives result in great glory to God and spur on workers of the Gospel in neighboring lands like Libya and Algeria!</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith he left Egypt, not being afraid of the anger of the king, for he endured as seeing him who is invisible." (Hebrews 11:27) Fear is a powerful weapon of the enemy in Iran. As You draw men and women to Yourself, Lord, help them fix their eyes on You instead of on their fears.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>God, we pray for believers in Iran to know how to apply the training cycle for maturing disciples.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray for believers to know how to develop as leaders by practicing serving.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Clap your hands, all Iranian peoples! Shout to God with loud songs of joy!" (Psalm 47:1)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Whoever humbles himself like this child is the greatest in the kingdom of heaven." (Matthew 18:4) May the humility of Christians in Iran testify to the power and the truth of Your Kingdom. We pray for Christ-like humility to define Your church in this nation.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Paul was told by Ananias: "for you will be a witness for him to everyone of what you have seen and heard." (Acts 22:15) We pray for every believer in Iran to be equipped to share their story (testimony) and Your story (the Gospel). We pray that every time the Gospel is shared in Iran that it would be the overflow of the speaker’s experience with You, the living God.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith he kept the Passover and sprinkled the blood, so that the Destroyer of the firstborn might not touch them." (Hebrews 11:28) We pray for many in Iran to put their faith in Christ’s blood that was poured out for them. Let the power of Your death, burial, and resurrection convince them to put their faith in You and to be freed from the Destroyer.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Lord, we pray for believers in Iran to know how to develop as leaders by practicing serving.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray for believers to expect non-sequential growth in their disciple making.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Bless our God, O Iranian peoples; let the sound of his praise be heard," (Psalm 66:8)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Jesus said, ’Let the little children come to me and do not hinder them, for to such belongs the kingdom of heaven.’" (Matthew 19:14) We pray that nothing would hinder true seekers from entering into Your Kingdom —not gender, age, socioeconomic status, nationality, or education level.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"And looking intently at the council, Paul said, ’Brothers, I have lived my life before God in all good conscience up to this day.’" (Acts 23:1) As believers in Iran, abide in the Vine, may their lives continually grow into Christ’s until they, too, can make such a claim. May their consistency and integrity lead many Iranian to faith in Christ.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p> "By faith the people crossed the Red Sea as on dry land, but the Egyptians, when they attempted to do the same, were drowned." (Hebrews 11:29) We pray for God’s miraculous works recorded in the Bible to stir believers in Iran to live by faith in ever-increasing measure.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Father, we pray for believers in Iran to expect non-sequential growth in their disciple making.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray for believers to understand why multiplying matters, and multiplying quickly matters even more.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Let the Iranian peoples praise you, O God; let all the peoples praise you!" (Psalm 67:3)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"And Jesus said to his disciples, ’Truly, I say to you, only with difficulty will a rich person enter the kingdom of heaven.’" (Matthew 19:23) We know nothing can hinder the Lord from saving (1 Samuel 14:6), so Lord we ask You to be working in the hearts of the wealthy in Iran. Soften them and open their spiritual eyes to see the truth of Your Word.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"So I always take pains to have a clear conscience toward both God and man." (Acts 24:16) Lord, give believers in Iran perseverance in going to such pains as Paul describes here. May it result in many friends, family members, coworkers, and neighbors being drawn to a God who brings transformation from the inside out.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith the walls of Jericho fell down after they had been encircled for seven days." (Hebrews 11:30) May every wall that separates Iranian from Christ fall down as we faithfully pray and obey His commands.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Father, we pray for believers in Iran to understand why multiplying matters, and multiplying quickly matters even more.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray for believers to know how to obey your commands by going AND staying.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"You are the God who works wonders; you have made known your might among the Iranian peoples." (Psalm 77:14)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>(Laborers in the Vineyard) "For the kingdom of heaven is like a master of a house who went out early in the morning to hire laborers for his vineyard." (Matthew 20:1) Your ways are not our ways. We praise You for Your generosity and ask that many Iranian would enter Your Kingdom, even up until the last hour of the day.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"So on the next day Agrippa and Bernice came with great pomp, and they entered the audience hall with the military tribunes and the prominent men of the city. Then, at the command of Festus, Paul was brought in." (Acts 25:23) Here Paul experienced Jesus’ words in Matthew 10:18, "and you will be dragged before governors and kings for my sake, to bear witness before them and the Gentiles". In the same way, may Iranian believers, when this happens, experience Jesus’ promise as it was for Paul, "do not be anxious how you are to speak or what you are to say, for what you are to say will be given you in that hour." (Matthew 10:19)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"By faith Rahab the prostitute did not perish with those who were disobedient, because she had given a friendly welcome to the spies." (Hebrews 11:31) Thank You Lord, for the reminder that no one is too far from Your saving grace. We pray for many Iranian, no matter their background, to be given new identities in Christ through faith.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Jesus, we pray for believers in Iran to know how to obey your commands by going AND staying.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray for believers to be intentional in making disciples.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"And they sing the song of Moses, the servant of God, and the song of the Lamb, saying, ’Great and amazing are your deeds, O Lord God the Almighty! Just and true are your ways, O King of the Iranian nations!’" (Revelation 15:3)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"But woe to you, scribes and Pharisees, hypocrites! For you shut the kingdom of heaven in people’s faces. For you neither enter yourselves nor allow those who would enter to go in." (Matthew 23:13) In Jesus’ day there were many opposed to the Kingdom, so today is no different. We appeal to Jesus, the One who opens and no one will shut (Revelation 3:7) to open the Kingdom to many in Iran today.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Jesus told Paul that "I am sending you to open their eyes, so that they may turn from darkness to light and from the power of Satan to God, that they may receive forgiveness of sins and a place among those who are sanctified by faith in me." (Acts 26:18) We beseech You, Lord, to send many Iranian Pauls to do the same throughout every corner of Iran.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p> "And what more shall I say? For time would fail me to tell of Gideon..." (Hebrews 11:32-35a) Gideon allowed God to dwindle an army of more than 30,000 to 300 so that God would receive all of the glory for the victory. Raise up leaders like Gideon in Iran, men and women who will have more confidence in God than in their resources.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Lord, we pray for believers in Iran to be intentional in making disciples.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray for believers to know how to assess strengths and vulnerabilities their disciples.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Who will not fear, O Lord, and glorify your name? For you alone are holy. All Iranian nations will come and worship you, for your righteous acts have been revealed." (Revelation 15:4)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"And this gospel of the kingdom will be proclaimed throughout the whole world as a testimony to all nations, and then the end will come." (Matthew 24:14) Father we pray for the Good News of the Kingdom to be shared in a clear, understandable, and reproducible way among all of the unengaged, unreached people groups in Iran.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"And when he had said these things, he took bread, and giving thanks to God in the presence of all he broke it and began to eat." (Acts 27:35) Lord, may believers in Iran exhibit such unshakeable confidence in Your Word and Your provision, that even in the scariest of circumstances they can still give thanks to You. We pray in the midst of the coronavirus pandemic that many will be drawn to Christ in Iran through believers’ firm faith in You.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p> "And what more shall I say? For time would fail me to tell of... Barak..." (Hebrews 11:32-35a) Though Barak stumbled with fear, he still led 10,000 people to victory and freedom for the people of God. We pray for godly Iranian leaders to be used by God, despite their weaknesses, to free others from the bondage of sin.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>God, we pray for believers in Iran to know how to assess their strengths and vulnerabilities when it comes to making disciples who multiply.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray for believers to learn how multiplying churches stay connected and live life together as an extended, spiritual family.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"All the ends of the earth shall remember and turn to the Lord, and all the families of the Iranian nations shall worship before you." (Psalm 22:27)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>(The Parable of the Ten Virgins) "Then the kingdom of heaven will be like ten virgins who took their lamps and went to meet the bridegroom." (Matthew 25:1) Prepare your Bride in Iran for Your return. We pray that every believer in this nation will be pursuing Your Kingdom and seeking opportunities to prepare their friends and family for Jesus’ return.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"From morning till evening he expounded to them, testifying to the kingdom of God and trying to convince them about Jesus both from the Law of Moses and from the Prophets." (Acts 28:23) Continue to equip believers throughout Iran to testify convincingly of Your Kingdom using Moses and the Prophets as needed. Soften hearts throughout the land to believe in this glorious message!</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p> "And what more shall I say? For time would fail me to tell of... David..." (Hebrews 11:32-35a) Please raise up many like David in Iran, men and women after God’s own heart. As they chase after God’s heart, may they lead many others into relationship with Him.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Father, we pray for believers in Iran to learn how multiplying churches stay connected and live life together as an extended, spiritual family.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray for believers to discover ways to assess the spiritual health of your work among churches they are starting.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"And many Iranian nations shall join themselves to the Lord in that day, and shall be my people. And I will dwell in your midst, and you shall know that the Lord of hosts has sent me to you." (Zechariah 2:11)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Then the King will say to those on his right, ’Come, you who are blessed by my Father, inherit the kingdom prepared for you from the foundation of the world.’" (Matthew 25:34-36) Thank You Lord that you have prepared Iranian to enter your kingdom from the foundation of the world. May every believer in this nation do the good works (feeding then hungry; giving water to the thirsty; etc.) that you prepared in advance for them to do (Ephesians 2:10)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Proclaiming the kingdom of God and teaching about the Lord Jesus Christ with all boldness and without hindrance." (Acts 28:31) Just as the story of Acts ended with Paul living this verse out. We pray believers in Iran would proclaim the Kingdom of God and teach about the Lord with all boldness and without hindrance until their last breath.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Some were tortured, refusing to accept release, so that they might rise again to a better life. Others suffered mocking and flogging, and even chains and imprisonment. They were stoned, they were sawn in two, they were killed with the sword." (Hebrews 11:35b-37) Give all believers in Iran perseverance in the face of persecution. Comfort them by the great cloud of witnesses that have gone before them, witnesses like those described in these verses.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>God, we pray for believers in Iran to discover ways to assess the spiritual health of your work among churches they are starting.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray for believers to learn simple tools like Four Fields to reflect on the status of current efforts.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"For from the rising of the sun to its setting my name will be great among the Iranian nations, and in every place incense will be offered to my name, and a pure offering. For my name will be great among the Iranian nations, says the Lord of hosts." (Malachi 1:11)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"I tell you I will not drink again of this fruit of the vine until that day when I drink it new with you in my Father’s kingdom." (Matthew 26:29) Even more strongly than fasting Iranian today long for their thirst to be quenched and their bellies to be filled with extravagant food, may your Church’s anticipation be growing for the day when Jesus drinks again of the fruit of the vine that He secured through His death, burial, and resurrection. We pray that there will be many Iranian from every people group around that table.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Thank you Lord for the example of the book of Acts, continue these stories and events in Iran today. We pray for unprecedented Kingdom advance this year in Iran!</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"They went about in skins of sheep and goats, destitute, afflicted, mistreated— of whom the world was not worthy—wandering about in deserts and mountains, and in dens and caves of the earth." (Hebrews 11:37-38) Thank you for our many brothers and sisters in Iran -- of whom the world is not worthy. Protect them from the evil one and preserve their faith. May every persecution only strengthen their resolve and demonstrate the treasure of Christ.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Father, we pray for believers in Iran to learn simple tools like Four Fields to reflect on the status of current efforts and kingdom activity around them.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ],
            [
                'excerpt' => 'Pray for believers to have and use tools like Generational Maps to understand the growth of their disciples and churches.',
                'content' => [
                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAISE</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p> “O Lord, God of our fathers, are you not God in heaven? You rule over all the kingdoms of the Iranian nations. In your hand are power and might, so that none is able to withstand you. (2 Chronicles 20:6)</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>KINGDOM COME&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"And this gospel of the kingdom will be proclaimed throughout the whole world as a testimony to all nations, and then the end will come." (Matthew 24:14) Until you return, may the passion of Your church, both within Iran and beyond be the proclamation of the gospel of Your Kingdom among all nations.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE BOOK OF ACTS&nbsp;</strong></h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"Now the full number of those who believed were of one heart and soul..." (Acts 4:32a) We praise You Lord for the ways believers in Iran care for one another. We pray for your Bride in this land to continue to grow in unity and love for one another.</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAY THE HALL OF FAITH</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>"And all these, though commended through their faith, did not receive what was promised, since God had provided something better for us, that apart from us they should not be made perfect." (Hebrews 11:39-40) Thank You Lord for the beautiful tapestry of faith you are weaving through believers across the centuries. We pray for many Iranian to be brought into this promise, even during this month of Ramadan. Amen!</p>',
                    '<!-- /wp:paragraph -->',

                    '<!-- wp:heading {"level":3} -->',
                    '<h3><strong>PRAYER</strong>&nbsp;</h3>',
                    '<!-- /wp:heading -->',

                    '<!-- wp:paragraph -->',
                    '<p>Father, we pray for believers in Iran to have and use tools like Generational Maps to understand the growth of their disciples and churches.</p>',
                    '<!-- /wp:paragraph -->',
                ]
            ]
        ];
    }
}
