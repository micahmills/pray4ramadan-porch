<?php
/**
 * Post Type Template
 */

if ( !defined( 'ABSPATH' )) {
    exit;
} // Exit if accessed directly.


/**
 * DT_Porch_Template_Landing_Post_Type Class
 * All functionality pertaining to project update post types in DT_Porch_Template_Landing_Post_Type.
 *
 * @package  Disciple_Tools
 * @since    0.1.0
 */
class DT_Porch_Template_Landing_Post_Type
{

    public $post_type;
    public $singular;
    public $plural;
    public $args;
    public $taxonomies;
    private static $_instance = null;
    public static function instance() {
        if (is_null( self::$_instance )) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Disciple_Tools_Prayer_Post_Type constructor.
     *
     * @param array $args
     * @param array $taxonomies
     */
    public function __construct( $args = [], $taxonomies = []) {
        $this->post_type = PORCH_LANDING_POST_TYPE;
        $this->singular = PORCH_LANDING_POST_TYPE_SINGLE;
        $this->plural = PORCH_LANDING_POST_TYPE_PLURAL;
        $this->args = $args;
        $this->taxonomies = $taxonomies;

        add_action( 'init', [ $this, 'register_post_type' ] );
        add_action( 'transition_post_status', [ $this, 'transition_post' ], 10, 3 );
        add_filter( 'allowed_wp_v2_paths', [ $this, 'dt_porch_template_allowed_wp_v2_paths'], 10, 1 );


        if ( is_admin() ){
            add_filter( 'manage_'.$this->post_type.'_posts_columns', [ $this, 'set_custom_edit_columns' ] );
            add_action( 'manage_'.$this->post_type.'_posts_custom_column', [ $this, 'custom_column' ], 10, 2 );
        }

    } // End __construct()

    public function dt_porch_template_allowed_wp_v2_paths( $allowed_wp_v2_paths ) {
          if ( user_can( get_current_user_id(), 'wp_api_allowed_user') ) {
                $allowed_wp_v2_paths[] = '/wp/v2/'.PORCH_LANDING_POST_TYPE;
                $allowed_wp_v2_paths[] = '/wp/v2/'.PORCH_LANDING_POST_TYPE.'/(?P<id>[\d]+)';
                $allowed_wp_v2_paths[] = '/wp/v2/'.PORCH_LANDING_POST_TYPE.'/(?P<parent>[\d]+)/revisions';
                $allowed_wp_v2_paths[] = '/wp/v2/'.PORCH_LANDING_POST_TYPE.'/(?P<parent>[\d]+)/revisions/(?P<id>[\d]+)';
                $allowed_wp_v2_paths[] = '/wp/v2/'.PORCH_LANDING_POST_TYPE.'/(?P<id>[\d]+)/autosaves';
                $allowed_wp_v2_paths[] = '/wp/v2/'.PORCH_LANDING_POST_TYPE.'/(?P<parent>[\d]+)/autosaves/(?P<id>[\d]+)';

                $allowed_wp_v2_paths[] = '/wp/v2/types';
                $allowed_wp_v2_paths[] = '/wp/v2/types/(?P<type>[\w-]+)';

                $allowed_wp_v2_paths[] = '/wp/v2/blocks';
                $allowed_wp_v2_paths[] = '/wp/v2/blocks/(?P<id>[\d]+)';
                $allowed_wp_v2_paths[] = '/wp/v2/blocks/(?P<parent>[\d]+)/revisions';
                $allowed_wp_v2_paths[] = '/wp/v2/blocks/(?P<parent>[\d]+)/revisions/(?P<id>[\d]+)';
                $allowed_wp_v2_paths[] = '/wp/v2/blocks/(?P<id>[\d]+)/autosaves';
                $allowed_wp_v2_paths[] = '/wp/v2/blocks/(?P<parent>[\d]+)/autosaves/(?P<id>[\d]+)';
                $allowed_wp_v2_paths[] = '/wp/v2/block-directory/search';

                $allowed_wp_v2_paths[] = '/wp/v2/media/(?P<id>[\d]+)';
                $allowed_wp_v2_paths[] = '/wp/v2/media/(?P<id>[\d]+)/post-process';
                $allowed_wp_v2_paths[] = '/wp/v2/media/(?P<id>[\d]+)/edit';

                $allowed_wp_v2_paths[] = '/wp/v2/taxonomies';
                $allowed_wp_v2_paths[] = '/wp/v2/taxonomies/(?P<taxonomy>[\w-]+)';

                $allowed_wp_v2_paths[] = '/wp/v2/themes';
                $allowed_wp_v2_paths[] = '/wp/v2/themes/(?P<stylesheet>[\w-]+)';

                $allowed_wp_v2_paths[] = '/wp/v2/templates';
                $allowed_wp_v2_paths[] = '/wp/v2/templates/(?P<id>[\/\w-]+)';
                $allowed_wp_v2_paths[] = '/wp/v2/templates/(?P<parent>[\d]+)/revisions';
                $allowed_wp_v2_paths[] = '/wp/v2/templates/(?P<parent>[\d]+)/revisions/(?P<id>[\d]+)';
                $allowed_wp_v2_paths[] = '/wp/v2/templates/(?P<id>[\d]+)/autosaves';
                $allowed_wp_v2_paths[] = '/wp/v2/templates/(?P<parent>[\d]+)/autosaves/(?P<id>[\d]+)';

                $allowed_wp_v2_paths[] = '/wp/v2/users/me';
                $allowed_wp_v2_paths[] = '/wp/v2/users/me?_locale=user';
                $allowed_wp_v2_paths[] = '/wp/v2/users';

          }
        return $allowed_wp_v2_paths;
    }

    /**
     * Register the post type.
     *
     * @access public
     * @return void
     */
    public function register_post_type() {
        register_post_type($this->post_type, /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
            // let's now add all the options for this post type
            array(
                'labels' => array(
                    'name' => $this->plural, /* This is the Title of the Group */
                    'singular_name' => $this->singular, /* This is the individual type */
                    'all_items' => 'All '.$this->plural, /* the all items menu item */
                    'add_new' => 'Add New', /* The add new menu item */
                    'add_new_item' => 'Add New '.$this->singular, /* Add New Display Title */
                    'edit' => 'Edit', /* Edit Dialog */
                    'edit_item' => 'Edit '.$this->singular, /* Edit Display Title */
                    'new_item' => 'New '.$this->singular, /* New Display Title */
                    'view_item' => 'View '.$this->singular, /* View Display Title */
                    'search_items' => 'Search '.$this->plural, /* Search Custom Type Title */
                    'not_found' => 'Nothing found in the Database.', /* This displays if there are no entries yet */
                    'not_found_in_trash' => 'Nothing found in Trash', /* This displays if there is nothing in the trash */
                    'parent_item_colon' => ''
                ), /* end of arrays */
                'description' => $this->singular, /* Custom Type Description */
                'public' => true,
                'publicly_queryable' => false,
                'exclude_from_search' => true,
                'show_ui' => true,
                'query_var' => false,
                'show_in_nav_menus' => true,
                'menu_position' => 5, /* this is what order you want it to appear in on the left hand side menu */
                'menu_icon' => 'dashicons-book', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
                'rewrite' => false, /* you can specify its url slug */
                'has_archive' => false, /* you can rename the slug here */
                'capabilities' => [
                    'create_posts'        => 'create_'.$this->post_type,
                    'edit_post'           => 'edit_'.$this->post_type, // needed for bulk edit
                    'read_post'           => 'read_'.$this->post_type,
                    'delete_post'         => 'delete_'.$this->post_type, // delete individual post
                    'delete_others_posts' => 'delete_others_'.$this->post_type.'s',
                    'delete_posts'        => 'delete_'.$this->post_type.'s', // bulk delete posts
                    'edit_posts'          => 'edit'.$this->post_type.'s', //menu link in WP Admin
                    'edit_others_posts'   => 'edit_others_'.$this->post_type.'s',
                    'publish_posts'       => 'publish_'.$this->post_type.'s',
                    'read_private_posts'  => 'read_private_'.$this->post_type.'s',
                ],
                'capability_type' => $this->post_type,
                'hierarchical' => true,
                'show_in_rest' => true,
                'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' )
            ) /* end of options */
        ); /* end of register post type */
    } // End register_post_type()


    public function transition_post( $new_status, $old_status, $post ) {
        if ( 'publish' == $new_status && $post->post_type == 'landing' ) {

            $post_id = $post->ID;
            $slug = trim( strtolower( $post->post_title ) );
            $slug = str_replace( ' ', '-', $slug );
            $slug = str_replace( '"', '', $slug );
            $slug = str_replace( '&', '', $slug );
            $slug = str_replace( "'", '', $slug );
            $slug = str_replace( ",", '', $slug );
            $slug = str_replace( ":", '', $slug );
            $slug = str_replace( ";", '', $slug );
            $slug = str_replace( ".", '', $slug );
            $slug = str_replace( "/", '', $slug );
            $slug = urlencode( $slug );

            $current_public_key = get_post_meta( $post_id, PORCH_LANDING_META_KEY, true );
            if ( $slug !== $current_public_key ) {
                update_post_meta( $post_id, PORCH_LANDING_META_KEY, $slug );
                global $wpdb;
                $wpdb->query( $wpdb->prepare( "UPDATE $wpdb->posts SET guid = %s WHERE ID = %s;", trailingslashit( site_url() ) . PORCH_LANDING_ROOT . '/' . PORCH_LANDING_TYPE . '/' . $slug, $post_id ) );
            }
        }
    }

    // Add the custom columns to the book post type:

    function set_custom_edit_columns( $columns) {
        unset( $columns['author'] );
        $columns['url'] = 'URL';

        return $columns;
    }

// Add the data to the custom columns for the book post type:

    function custom_column( $column, $post_id ) {
        switch ( $column ) {
            case 'url' :
                $public_key = get_post_meta( $post_id, PORCH_LANDING_META_KEY, true );
                echo '<a href="' . trailingslashit( site_url() ) . PORCH_LANDING_ROOT . '/' . PORCH_LANDING_TYPE . '/' . $public_key . '">'. trailingslashit( site_url() ) . PORCH_LANDING_ROOT . '/' . PORCH_LANDING_TYPE . '/' . $public_key .'</a>';
                break;

        }
    }
} // End Class
DT_Porch_Template_Landing_Post_Type::instance();
