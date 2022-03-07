<?php


function dt_ramadan_list_languages(){
    $available_language_codes = get_available_languages( plugin_dir_path( __DIR__ ) .'/support/languages' );
    array_unshift( $available_language_codes, 'en_US' );

    $available_translations = [];

    //flags from https://www.alt-codes.net/flags
    $translations = [
        'en_US' => [
            'language' => 'en_US',
            'english_name' => 'English (United States)',
            'native_name' => 'English',
            'flag' => '🇺🇸',
            'prayer_fuel' => true
        ],
        'es_ES' => [
            'language' => 'es_ES',
            'english_name' => 'Spanish (Spain)',
            'native_name' => 'Español',
            'flag' => '🇪🇸',
            'prayer_fuel' => true
        ],
        'fr_FR' => [
            'language' => 'fr_FR',
            'english_name' => 'French (France)',
            'native_name' => 'Français',
            'flag' => '🇫🇷'
        ],
        'pt_PT' => [
            'language' => 'pt_PT',
            'english_name' => 'Portuguese',
            'native_name' => 'Português',
            'flag' => '🇵🇹'
        ],
    ];

    foreach ( $available_language_codes as $code ){
        $code = str_replace( "pray4ramadan-porch-", "", $code );
        if ( isset( $translations[$code] )){
            $available_translations[$code] = $translations[$code];
        }
    }
    return $available_translations;
}

function get_field_translation( $field, $code ){
    if ( empty( $field ) ){
        return "";
    }
    if ( isset( $field["translations"][$code] ) && !empty( $field["translations"][$code] ) ){
        return $field["translations"][$code];
    }
    return $field["value"] ?: ( $field["default"] ?? "" );
}

function dt_ramadan_get_current_lang(){
    $lang = "en_US";
    if ( isset( $_GET["lang"] ) && !empty( $_GET["lang"] ) ){
        $lang = sanitize_text_field( wp_unslash( $_GET["lang"] ));
    } elseif ( isset( $_COOKIE["dt-magic-link-lang"] ) && !empty( $_COOKIE["dt-magic-link-lang"] ) ){
        $lang = sanitize_text_field( wp_unslash( $_COOKIE["dt-magic-link-lang"] ) );
    }
    return $lang;
}

function dt_ramadan_set_translation( $lang ){
    if ( $lang !== "en_US" ){
        add_filter( 'determine_locale', function ( $locale ) use ( $lang ){
            if ( !empty( $lang ) ){
                return $lang;
            }
            return $locale;
        }, 1000, 1 );
        load_plugin_textdomain( 'pray4ramadan-porch', false, trailingslashit( dirname( plugin_basename( __FILE__ ), 2 ) ). 'support/languages' );
    }
}
