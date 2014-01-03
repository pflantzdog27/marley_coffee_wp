<?php
// CUSTOM LOGIN SCREEN
	function my_login_logo() { ?>
		<style type="text/css">
			body.login div#login h1 a {
				background-image: url(<?php echo get_bloginfo( 'template_directory' ) ?>/images/site-login-logo.png);
				padding-bottom: 30px;
			}
		</style>
	<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );
// ENQUEUE SCRIPTS
	add_action( 'wp_enqueue_scripts', 'load_javascript_files' );
    function load_javascript_files() {
        wp_deregister_script( 'jquery' );
        // first register
        wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-2.0.0.min.js',false, '2.0.0', null);
		wp_register_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.0', true);
		wp_register_script( 'scrollTo', get_template_directory_uri() . '/js/jquery.scrollTo.js', array('jquery'), '1.4.6', true);
		wp_register_script( 'custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true);	
		wp_register_script( 'isotope', get_template_directory_uri().'/js/jquery-isotope-min.js', array('jquery'), '1.5.25', true );
		wp_register_script( 'customIsotopes', get_template_directory_uri().'/js/custom-isotopes.js', array('jquery'), '1.0', true );
        wp_register_script( 'slidejs', get_template_directory_uri().'/js/slidejs.min.js', array('jquery'), '3.0.4', true );
        wp_register_script( 'fancybox', get_template_directory_uri().'/js/jquery.fancybox.js', array('jquery'), '2.1.5', true );
        wp_register_script( 'jfeeds', get_template_directory_uri().'/js/jquery.feeds.js', array('jquery'), '1.0',true );
        wp_register_script( 'rssFeeds', get_template_directory_uri().'/js/news_feed.js', array('jquery'), '1.0', true );
        wp_register_script( 'cookies', get_template_directory_uri().'/js/jquery.cookie.js', array('jquery'), '1.4', true );

			// then enqueue
			wp_enqueue_script( 'bootstrap' );
            wp_enqueue_script('scrollTo');
            wp_enqueue_script('jfeeds');
            wp_enqueue_script( 'rssFeeds' );
            wp_enqueue_script( 'cookies' );
            wp_enqueue_script('fancybox');
			wp_enqueue_script( 'custom' );
			//conditional script loading
			if ( is_front_page() ) {
				wp_enqueue_script('isotope');
				wp_enqueue_script('customIsotopes');
                wp_enqueue_script('slidejs');
			}
	}

//ADD SUPPORT FOR SVG FILES
function custom_mtypes( $m ){
    $m['svg'] = 'image/svg+xml';
    $m['svgz'] = 'image/svg+xml';
    return $m;
}
add_filter( 'upload_mimes', 'custom_mtypes' );

// THUMBNAIL SUPPORT
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 178, 178, true ); // default Post Thumbnail dimensions (cropped)
    add_image_size( 'left-column-image', 350, 350, true );
}

// REGISTER MENUS
if ( function_exists( 'register_nav_menus' ) ) {
    register_nav_menus( array(
        'main_nav' => 'Main Sitewide Navigation',
        'coffee_nav' => 'Coffee Page Navigation'
    ) );
}

// CUSTOM FIELD EXCERPT
function custom_field_excerpt($field) {
    global $post;
    $text = get_field($field);
    if ( '' != $text ) {
        $text = strip_shortcodes( $text );
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
        $excerpt_length = 40; // words
        $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
        $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
    }
    return apply_filters('the_excerpt', $text);
}

