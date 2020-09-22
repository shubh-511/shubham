<?php
//////////////////////////////////////////////////////////////////
// Set Content Width
//////////////////////////////////////////////////////////////////
function karim_widgets_init() {
	
	
	register_sidebar( array(
		'name'          => __( 'Search', 'webmobril' ),
		'id'            => 'search',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	
	register_sidebar( array(
		'name'          => __( 'Categories', 'webmobril' ),
		'id'            => 'categories',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="footer-title"><h4>',
		'after_title'   => '</h4></div>',
	) );	

	register_sidebar( array(
		'name'          => __( 'Recent Posts', 'webmobril' ),
		'id'            => 'recent_posts',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Archive', 'webmobril' ),
		'id'            => 'archive',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
		register_sidebar( array(
		'name'          => __( 'Keywords', 'streeteagle' ),
		'id'            => 'keyword',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	
	
		/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	
}
add_action( 'widgets_init', 'karim_widgets_init' );

// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'twentyfourteen' ),
		'secondary' => __( 'Secondary menu in left sidebar', 'twentyfourteen' ),
	) );
if ( ! isset( $content_width ) )
	$content_width = 1080;

//////////////////////////////////////////////////////////////////
// Theme set up
//////////////////////////////////////////////////////////////////
add_action( 'after_setup_theme', 'solopine_theme_setup' );

if ( !function_exists('solopine_theme_setup') ) {

	function solopine_theme_setup() {
	
		// Register navigation menu
		/*register_nav_menus(
			array(
				'main-menu' => 'Primary Menu',
			)
		);*/
		
		// Localization support
		load_theme_textdomain('solopine', get_template_directory() . '/lang');
		
		 //Background
		$sp_background = array(
			'default-color' => 'f5f5f5'
		);
		add_theme_support( 'custom-background', $sp_background );
		
		// Post formats
		add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio' ) );
		
		// Feed Links
		add_theme_support( 'automatic-feed-links' );
		
		// Featured image
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'full-thumb', 1080, 0, true );
		add_image_size( 'misc-thumb', 500, 380, true );
	
	}

}


//////////////////////////////////////////////////////////////////
// Register & enqueue styles/scripts
//////////////////////////////////////////////////////////////////

add_action( 'wp_enqueue_scripts','solopine_load_scripts' );

function solopine_load_scripts() {

	
	if (is_singular() && get_option('thread_comments'))	wp_enqueue_script('comment-reply');
	
}

//////////////////////////////////////////////////////////////////
// Include files
//////////////////////////////////////////////////////////////////

// Theme Options
//include('functions/customizer/sp_custom_controller.php');
//include('functions/customizer/sp_customizer_settings.php');
//include('functions/customizer/sp_customizer_style.php');

// Widgets
//include("inc/widgets/about_widget.php");
//include("inc/widgets/social_widget.php");
//include("inc/widgets/facebook_widget.php");
//include("inc/widgets/post_widget.php");

//////////////////////////////////////////////////////////////////
// Register footer widgets
//////////////////////////////////////////////////////////////////
/*if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-heading"><span>',
		'after_title' => '</span></h4>',
	));
	register_sidebar(array(
		'name' => 'Footer Instagram',
		'before_widget' => '<div id="%1$s" class="widget-instagram %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="block-heading">',
		'after_title' => '</h4>',
		'description' => 'Use the Instagram Slider widget here. IMPORTANT: For best result select "Thumbnails" under "Images Layout" and set number of images to 8.',
	));
}*/

//////////////////////////////////////////////////////////////////
// PAGINATION
//////////////////////////////////////////////////////////////////
function solopine_pagination() {
	
	?>
	
	<div class="pagination">

		<div class="older"><?php next_posts_link(__( 'Older Posts <i class="fa fa-angle-double-right"></i>', 'solopine')); ?></div>
		<div class="newer"><?php previous_posts_link(__( '<i class="fa fa-angle-double-left"></i> Newer Posts', 'solopine')); ?></div>
		
	</div>
					
	<?php
	
}

//////////////////////////////////////////////////////////////////
// COMMENTS LAYOUT
//////////////////////////////////////////////////////////////////

	function solopine_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		
		?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
			
			<div class="thecomment">
						
				<div class="author-img">
					<?php echo get_avatar($comment,$args['avatar_size']); ?>
				</div>
				
				<div class="comment-text">
					<span class="reply">
						<?php comment_reply_link(array_merge( $args, array('reply_text' => __('Reply', 'solopine'), 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID); ?>
						<?php edit_comment_link(__('Edit', 'solopine')); ?>
					</span>
					<span class="author"><?php echo get_comment_author_link(); ?></span>
					<span class="date"><?php printf(__('%1$s at %2$s', 'solopine'), get_comment_date(),  get_comment_time()) ?></span>
					<?php if ($comment->comment_approved == '0') : ?>
						<em><i class="icon-info-sign"></i> <?php _e('Comment awaiting approval', 'solopine'); ?></em>
						<br />
					<?php endif; ?>
					<?php comment_text(); ?>
				</div>
						
			</div>
			
			
		</li>

		<?php 
	}

	

//////////////////////////////////////////////////////////////////
// PREVENT SCROLL ON READ MORE LINK
//////////////////////////////////////////////////////////////////
function remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );


/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package	   TGM-Plugin-Activation
 * @subpackage Example
 * @version	   2.3.6
 * @author	   Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @author	   Gary Jones <gamajo@gamajo.com>
 * @copyright  Copyright (c) 2012, Thomas Griffin
 * @license	   http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
//require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

//add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin pre-packaged with a theme
		array(
			'name'     				=> 'Vafpress Post Formats UI', // The plugin name
			'slug'     				=> 'vafpress-post-formats-ui-develop', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/plugins/vafpress-post-formats-ui-develop.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> 'Instagram Slider Widget', // The plugin name
			'slug'     				=> 'instagram-slider-widget', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> 'Contact Form 7', // The plugin name
			'slug'     				=> 'contact-form-7', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		)

	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'tgmpa';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}

/**
 * From Twentyfourteen
 * @return string The filtered title.
 */
function solopine_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentyfourteen' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'solopine_wp_title', 10, 2 );

/* trim excerpt to 55 words */
add_filter('the_excerpt', 'my_excerpt_filter');
function my_excerpt_filter($excerpt) {
    echo wp_trim_words( $excerpt , '35', '...' );
}

class BS3_Walker_Nav_Menu extends Walker_Nav_Menu {

	function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		$id_field = $this->db_fields['id'];
 
		if ( isset( $args[0] ) && is_object( $args[0] ) )
		{
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
 
		}
 
		return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}
 
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	function start_el( &$output, $item, $depth = 2, $args = array(), $id = 0 ) {
		if ( is_object($args) && !empty($args->has_children) )
		{
			$link_after = $args->link_after;
			$args->link_after = ' <b class="caret"></b>';
		}
 
		parent::start_el($output, $item, $depth, $args, $id);
 
		if ( is_object($args) && !empty($args->has_children) )
			$args->link_after = $link_after;
	}
 
	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	function start_lvl( &$output, $depth = 2, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"dropdown-menu list-unstyled\">\n";
	}
}
	add_filter('nav_menu_link_attributes',function($atts, $item, $args){
	if ( $args->has_children )
	{
		$atts['data-toggle'] = 'dropdown';
		$atts['class'] = 'dropdown-toggle';
	}
 	return $atts;
	}, 10, 3);


if ( is_singular() ){ wp_enqueue_script( "comment-reply" );}
#-----------------------------------------------------------------#
# Content Width
# T_add
#-----------------------------------------------------------------#
if (!isset( $content_width )) $content_width = '669px';
#-----------------------------------------------------------------#
# Load Header
# T_add
#-----------------------------------------------------------------#


function wp_nuvo_setup() {
	
	load_theme_textdomain( 'wp_nuvo', get_template_directory().'/languages');
	// Register Navigation
	register_nav_menu('main_navigation', esc_html__('Main Navigation','wp_nuvo'));
	register_nav_menu('top_navigation', esc_html__('Top Navigation','wp_nuvo'));
	register_nav_menu('left_navigation', esc_html__('Left Navigation','wp_nuvo'));
	register_nav_menu('right_navigation', esc_html__('Right Navigation','wp_nuvo'));
	register_nav_menu('404_pages', esc_html__('404 Useful Pages','wp_nuvo'));
	register_nav_menu('sticky_navigation', esc_html__('Sticky Header Navigation','wp_nuvo'));
	
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header');
	add_theme_support( 'custom-background');
	add_theme_support( 'wp_nuvo');
	// Default RSS feed links
	add_theme_support('automatic-feed-links');
	// Post Formats
	add_theme_support('post-formats', array('gallery', 'link', 'image', 'quote', 'video', 'audio', 'chat'));
	#-----------------------------------------------------------------#
	# Add post thumbnail functionality
	# T_add
	#-----------------------------------------------------------------#
	add_theme_support('post-thumbnails');
	add_image_size('related-img', 180, 138, true);
	add_image_size('portfolio-one', 540, 272, true);
	add_image_size('portfolio-two', 460, 295, true);
	add_image_size('portfolio-three', 300, 214, true);
	add_image_size('portfolio-four', 220, 161, true);
	add_image_size('portfolio-full', 940, 400, true);
	add_image_size('recent-posts', 700, 441, true);
	add_image_size('recent-works-thumbnail', 66, 66, true);
}

#-----------------------------------------------------------------#
	# Add FAQ functionality
	# T_add
	#-----------------------------------------------------------------#


function custom_excerpt($new_length = 22, $new_more = '...') {
  add_filter('excerpt_length', function () use ($new_length) {
    return $new_length;
  }, 999);
  add_filter('excerpt_more', function () use ($new_more) {
    return $new_more;
  });
  $output = get_the_excerpt();
  $output = apply_filters('wptexturize', $output);
  $output = apply_filters('convert_chars', $output);
  $output = '<p class="ab_text">' . $output . '</p>';
  echo $output;
}



function wpbeginner_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}



function theme_settings_page()
{
    ?>
	    <div class="wrap">
	    <h1>Theme Panel</h1>
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");      
	            submit_button(); 
	        ?>          
	    </form>
		</div>
	<?php
}
function add_theme_menu_item()
{
	add_menu_page("Theme Panel", "Theme Panel", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");

function display_fb_element()
{
	?>
    	<input type="text" name="fb" id="fb" value="<?php echo get_option('fb'); ?>" size="80" />
    <?php
}

function display_twitter_element()
{
	?>
    	<input type="text" name="twitter" id="twitter" value="<?php echo get_option('twitter'); ?>" size="80" />
    <?php
}

function display_linkedin_element()
{
	?>
    	<input type="text" name="linked" id="linked" value="<?php echo get_option('linked'); ?>" size="80" />
    <?php
}

function display_gplus_element()
{
	?>
    	<input type="text" name="gplus" id="gplus" value="<?php echo get_option('gplus'); ?>" size="80" />
    <?php
}

function display_tumblr_element()
{
	?>
    	<input type="text" name="tumblr" id="tumblr" value="<?php echo get_option('tumblr'); ?>" size="80" />
    <?php
}
function display_skype_element()
{
	?>
    	<input type="text" name="skype" id="skype" value="<?php echo get_option('skype'); ?>" size="80" />
    <?php
}


function display_pin_element()
{
	?>
    	<input type="text" name="pin" id="pin" value="<?php echo get_option('pin'); ?>" size="80" />
    <?php
}

function display_insta_element()
{
	?>
    	<input type="text" name="insta" id="insta" value="<?php echo get_option('insta'); ?>" size="80" />
    <?php
}


function display_top_text()
{
	?>
    	<input type="text" name="header_top_text" id="header_top_text" value="<?php echo get_option('header_top_text'); ?>" size="80" />
		
		
		<?php
}


function display_email()
{
	?>
    	<input type="email" name="email" id="email" value="<?php echo get_option('email'); ?>" size="80" />
		
		
    <?php
}

function display_home_contact()
{
	?>
    	<input type="text" name="homecontact" id="homecontact" value="<?php echo get_option('homecontact'); ?>" size="80" />
    <?php
}

function display_copyright_text()
{
	?>
    	<input type="text" name="copyright" id="copyright" value="<?php echo get_option('copyright'); ?>" size="80" />
    <?php
}



function display_theme_panel_fields()
{
	add_settings_section("section", "All Settings", null, "theme-options");

	add_settings_field("fb", "Facebook", "display_fb_element", "theme-options", "section");
	add_settings_field("twitter", "Twitter", "display_twitter_element", "theme-options", "section");
	add_settings_field("pin", " Pinterest", "display_pin_element", "theme-options", "section");
    add_settings_field("insta", " Instagram", "display_insta_element", "theme-options", "section");
	add_settings_field("linked", " Linkedin", "display_linkedin_element", "theme-options", "section");
	add_settings_field("tumblr", " Tumblr", "display_tumblr_element", "theme-options", "section");
	add_settings_field("skype", " Skype", "display_skype_element", "theme-options", "section");
	add_settings_field("gplus", " Google Plus", "display_gplus_element", "theme-options", "section");
		add_settings_field("header_top_text", " Header Top Text", "display_top_text", "theme-options", "section");
    add_settings_field("homecontact", " Home Top Contact", "display_home_contact", "theme-options", "section");

	add_settings_field("copyright", " Footer Copyright Text", "display_copyright_text", "theme-options", "section");
	
	add_settings_field("email", " Email", "display_email", "theme-options", "section");
	
    register_setting("section", "fb");
    register_setting("section", "twitter");
    register_setting("section", "pin");
    register_setting("section", "insta");
	register_setting("section", "linked");
	register_setting("section", "tumblr");
	register_setting("section", "skype");
	register_setting("section", "gplus");
    register_setting("section", "homecontact");
	register_setting("section", "header_top_text");
	register_setting("section", "copyright");
	register_setting("section", "email");
}

add_action("admin_init", "display_theme_panel_fields");

function ajay_letter_count($content, $limit) {
	$striped_content = strip_tags($content);
	$striped_content = strip_shortcodes($striped_content);
	$limit_content = mb_substr($striped_content, 0 , $limit );

	if($limit_content < $content){
		$limit_content .= "..."; 
	}
	return $limit_content;
}

function jtd_acf_auto_set_license_keys() {

  if ( !get_option('acf_pro_license') && defined('ACF_5_KEY') ) {

    $save = array(
			'key'	=> ACF_5_KEY,
			'url'	=> home_url()
		);

		$save = maybe_serialize($save);
		$save = base64_encode($save);

    update_option('acf_pro_license', $save);
  }
}
add_action('after_switch_theme', 'jtd_acf_auto_set_license_keys');
// you may want to add additional actions here.



/*========================================================================================*/

// add arrows to menu parent 
function oenology_add_menu_parent_class( $items ) {
 
 $parents = array();
 foreach ( $items as $item ) {
 if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
 $parents[] = $item->menu_item_parent;
 }
 }
 
 foreach ( $items as $item ) {
 if ( in_array( $item->ID, $parents ) ) {
 $item->classes[] = 'menu-item-has-children';
 }
 }
 
 return $items;
}
add_filter( 'wp_nav_menu_objects', 'oenology_add_menu_parent_class' );