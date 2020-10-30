<?php
/**
 * start functions and definitions
 *
 * @package reimari
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'start_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function start_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on start, use a find and replace
	 * to change 'start' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'start', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', 'Main menu' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );


	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'start_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // start_setup
add_action( 'after_setup_theme', 'start_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function start_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'start' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'start_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function start_scripts() {
	wp_enqueue_script( 'reimari', get_template_directory_uri() . '/js/reimari.js', array ( 'jquery' ), 1.1, true);

	wp_enqueue_style( 'start-style', get_stylesheet_uri() );

    wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&family=Source+Serif+Pro:wght@700&display=swap' );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');

	wp_enqueue_script( 'start-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'start-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    //wp_enqueue_script('angularjs', 'https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js' );

    //wp_enqueue_script('angularjs-route', 'https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular-route.min.js' );

    wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css');

    //wp_enqueue_script('angularjs-sanitize', 'https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular-sanitize.min.js' );

    //wp_enqueue_script( 'emoteButtonsDashboard', get_template_directory_uri() . '/js/emoteButtonsDashboard.js' );

    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
function emoteButton_scripts() {
    wp_enqueue_script(
        'emoteButton',
        get_template_directory_uri() . "/js/emoteButton.js",
        array('jquery'),
        '1.0',
        true
    );
    $translation_array = array('templateUrl' => admin_url('admin-ajax.php'));
    wp_localize_script( 'emoteButton', 'emoteButton', $translation_array );
}   
add_action( 'wp_enqueue_scripts', 'emoteButton_scripts' );
add_action( 'wp_enqueue_scripts', 'start_scripts' );
add_action( 'wp_ajax_emoteButton', 'emoteButton_handleAjax' );
add_action( 'wp_ajax_nopriv_emoteButton', 'emoteButton_handleAjax' );

function emoteButton_handleAjax() {
    $buttons = ["Joy", "Sad", "Like", "Dislike"];
    $new_num_upvotes = array();
    $post_id = intval($_GET['post_id']);
    $id = intval($_GET['button_id']);
    $num_upvotes_JSON = get_post_meta( $post_id, "emoteButton", true );
    $num_upvotes = json_decode($num_upvotes_JSON, true);
    for ($i=0; $i<count($buttons); $i++) {
        if (!isset($num_upvotes[$buttons[$i]])) {
            $num_upvotes[$buttons[$i]] = "0";
        }
    }
    $num_upvotes[$buttons[$id-1]] = (string)(intval( $num_upvotes[$buttons[$id-1]] ) + 1);
    $num_upvotes_JSON = json_encode($num_upvotes);
    $success = update_post_meta( $post_id, "emoteButton", $num_upvotes_JSON );
    if ( $success ) {
    $response = array(
      'result' => 'successful',
      'votes' => $num_upvotes[$buttons[$id-1]]
    );
  } else {
    $response = array(
      'result' => 'successful',
      'votes' => $num_upvotes[$buttons[$id-1]]-1
    );
  }
  wp_send_json( $response );
}

/**
 * Function to create custom emoteBUtton bars
 */
function createEmoteButtonBar($post_id, $metaArray, $buttonArray) {
  ?>
    <div class="emoteButtons" data-postid="<?php echo $post_id ?>" id="<?php echo $post_id ?>">
  <?php
    for ($i=0; $i<count($buttonArray); $i++) {
        $pieces = explode("/i> ", $buttonArray[$i]);
        ?>
        <div class="emoteButtons__buttonContainer">
            <button data-votes="<?php echo $metaArray[$pieces[1]]; ?>" data-id="<?php echo $i+1 ?>"><?php echo $buttonArray[$i] ?>
            <span><?php if($metaArray[$pieces[1]]) { echo $metaArray[$pieces[1]]; } else echo "0" ?></span></button>
        </div>
  <?php } ?>
    </div>
  <?php
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Filter the except length to 20 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

/* REST API */

add_filter( 'query_vars', function( $query_vars ) {
    $query_vars[] = 'post_parent';
    return $query_vars;
});


/**
 * Updating post views
 *
 */
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/**
 * Updating post views
 *
 */
function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

/**
 * Displaying post views
 *
 */
function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

/**
* Overriding search widget
*
*/
function widget_override_search(){
?>
<form id="searchform" method="get" action="<?php bloginfo('home'); ?>">
<div class="input-group">
     <input type="text" class="form-control" placeholder="Hae" name="s" id="s">
     <div class="input-group-btn">
       <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
     </div>
   </div>
</form>
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Search'), 'widget_override_search');


/**
* Form validation
*
*/
function contactform_add_scripts() {
	    // Register the style for the Contact form
		$myJSDir = get_bloginfo('url').'/wordpress/wp-content/themes/reimari/js/';  
	    wp_register_script( 'jquery-validate-script', $myJSDir . '/jquery.validate.min.js' ,array( 'jquery'));
 	    wp_enqueue_script( 'jquery-validate-script' );

	    wp_register_script( 'contactform-script', $myJSDir . '/contactform.js' ,array( 'jquery','jquery-validate-script'));
 	    wp_enqueue_script( 'contactform-script' );

	}

//Add CSS and other scripts for the Contact form.
 add_action('wp_enqueue_scripts', contactform_add_scripts);

add_filter('wp_nav_menu_items','add_search_box_to_menu', 10, 2);
function add_search_box_to_menu( $items, $args ) {
    if( $args->theme_location == 'primary' )
        return $items.get_search_form();

    return $items;
}


// Function to display top tags
function top_tags() {
        $tags = get_tags();
        if (empty($tags))
                return;
        $counts = $tag_links = array();
        foreach ( (array) $tags as $tag ) {
                $counts[$tag->name] = $tag->count;
                $tag_links[$tag->name] = get_tag_link( $tag->term_id );
                if ($tag->count > $highest_count) : 
                	$highest_count = $tag->count;
            	endif;
        }
        asort($counts);
        $counts = array_reverse( $counts, true );
        $i = 0;
        foreach ( $counts as $tag => $count ) {
                $i++;
                $tag_link = clean_url($tag_links[$tag]);
                $tag = str_replace(' ', '&nbsp;', wp_specialchars( $tag ));
                $width = ($count / $highest_count) * 100;  // bar width as a percentage of the total amount of stories per tag
                if($i <= 5){
                        print "<li>
                        <span class=\"background-bar\" style=\"width: $width%\"></span>
                        <span class=\"tag-label\"><a href=\"$tag_link\">$tag ($count)</a></span>
                        </li>";
                }
        }
}

// Localizing archive title for tags
function new_title($title) {

    if ( is_tag()  ) {
    		$title = single_tag_title( 'Avainsana: ', false );
        }

    if ( is_author()  ) {
    		$title = '<span class="vcard">' . get_the_author() . '</span>';
        }    

    return $title;
}
add_filter( 'get_the_archive_title', new_title);
function remove_api () {
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
}
add_action( 'after_setup_theme', 'remove_api' );

function exclude_category($query) {
	if ( $query->is_feed ) {
		$query->set('cat', '-234, -40, -6, -7, -8');
	}
return $query;
}
add_filter('pre_get_posts', 'exclude_category');

function remove_comment_url($arg) {
    $arg = array(
        'title_reply_before' => '',
        'url' => '',
        'email' =>
            '<p class="comment-form-email"><label for="email">' . __( 'Sähköpostiosoitettasi', 'domainreference' ) . '</label> ' .
            '<span class="required">*</span>' .
            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
            '" size="30" aria-required="true" /></p>',
        );
    return $arg;
}
add_filter('comment_form_default_fields', 'remove_comment_url');

function test_shortcodes()
{
    return 'Shortcodes are working!';
}
add_shortcode('test_shortcodes', 'test_shortcodes');
?>