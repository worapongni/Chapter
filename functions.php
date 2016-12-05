<?php

/**
 * The current version of the theme and theme slug
 */
define( 'THEME_DIR' , get_template_directory_uri() );


function chapter_scripts() {

	/*load our main stylesheet*/
	wp_enqueue_style( 'style', get_stylesheet_uri() );

}

add_action( 'wp_enqueue_scripts', 'chapter_scripts' );


// Get top ancestor
function get_top_ancestor_id() {

	global $post;

	if ( $post->post_parent ) {
		$ancestors = array_reverse(get_post_ancestors( $post->ID ));
		return $ancestors[0];
	}

	return $post->ID;

}


//Does page have children?
function has_children() {

	global $post;

	$pages = get_pages('child_of=' . $post->ID);
	return count($pages);

}


// Customize excerpt word count length 

function custom_excerpt_length() {
	return 25;
}

add_filter('excerpt_length', 'custom_excerpt_length');



function chapter_setup() {

	/* Register navigation menus */
	register_nav_menus(array(
	'primary' => __( 'Primary Menu' ),
	'footer' => __( 'Footer Menu' ),
	));

	// Add Title Tag
	add_theme_support( 'title-tag' );

	// Add Featured Image Support
	add_theme_support('post-thumbnails');
	add_image_size('tiny-thumbnail', 100, 100, array( 'center', 'center' ));
	add_image_size('small-thumbnail', 180, 120, true);
	add_image_size('banner-image', 920, 210, array( 'left', 'center' ) );

	add_theme_support('post-formats', array('aside', 'gallery', 'link') );

}

add_action( 'after_setup_theme', 'chapter_setup' );


function ourWidgetsInit() {

	register_sidebar( array(
		'name'	=> 'Sidebar',
		'id'	=> 'sidebar1',
		'before_widget'	=> '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="special-class">',
		'after_title' => '</h4>'

	));

	register_sidebar( array(
		'name'	=> 'Sidebar for Post',
		'id'	=> 'sidebar-post',
		'before_widget'	=> '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="special-class">',
		'after_title' => '</h4>'

	));

	register_sidebar( array(
		'name'	=> 'Sidebar for Page',
		'id'	=> 'sidebar-page',
		'before_widget'	=> '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="special-class">',
		'after_title' => '</h4>'

	));

	register_sidebar( array(
		'name'	=> 'Footer Area',
		'id'	=> 'footer1',
		'before_widget'	=> '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="special-class">',
		'after_title' => '</h4>'

	));

	register_sidebar( array(
		'name'	=> 'Footer Area 2',
		'id'	=> 'footer2',
		'before_widget'	=> '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="special-class">',
		'after_title' => '</h4>'

	));

	register_sidebar( array(
		'name'	=> 'Footer Area 3',
		'id'	=> 'footer3',
		'before_widget'	=> '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="special-class">',
		'after_title' => '</h4>'

	));

	register_sidebar( array(
		'name'	=> 'Footer Area 4',
		'id'	=> 'footer4',
		'before_widget'	=> '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="special-class">',
		'after_title' => '</h4>'

	));

}

add_action('widgets_init', 'ourWidgetsInit');


function chapter_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'cht_standard_colors', array(
	    'title'				=> esc_html__( 'Standard Colors', 'Chapter' ),
	    'priority'			=> 30,
	) );

    //Link
    $wp_customize->add_setting( 'cht_link_color', array(
	    'default'			=> '#006ec3',
	    'transport'			=> 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cht_link_color_control', array(
	    'label'				=> esc_html__( 'Link Color', 'Chapter' ),
	    'section'			=> 'cht_standard_colors',
	    'settings'			=> 'cht_link_color',
    ) ) );

    //Button
    $wp_customize->add_setting( 'cht_btn_color', array(
    	'default'			=> '#006ec3',
    	'transport'			=> 'refresh',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cht_btn_color_control', array(
	    'label'				=> esc_html__( 'Button Color', 'Chapter' ),
	    'section'			=> 'cht_standard_colors',
	    'settings'			=> 'cht_btn_color',
    ) ) );    

}
add_action('customize_register', 'chapter_customize_register');


function Chapter_customize_css() { ?>

	<style type="text/css">

		a:link,
		a:visited {
			color: <?php echo get_theme_mod('cht_link_color'); ?>;
		}

		.site-header nav ul li.current-menu-item a:link,
		.site-header nav ul li.current-menu-item a:visited,
		.site-header nav ul li.current-page-ancestor a:link,
		.site-header nav ul li.current-page-ancestor a:visited {
			background-color: <?php echo get_theme_mod('cht_link_color'); ?>;
		}

		.hd-search #searchsubmit,
		.btn-a:link,
		.btn-a:visited {
			background-color: <?php echo get_theme_mod('cht_btn_color'); ?>;
		}
	</style>

<?php }

add_action('wp_head', 'Chapter_customize_css');


//Add Footer callut section to admin apperance customize screen
function chapter_footer_callout($wp_customize) {

	$wp_customize->add_section('cht-footer-callout-section', array(
		'title' => 'Footer Callout'
	));

	/* Footer Callout Display */
	$wp_customize->add_setting('cht-footer-callout-display', array(
		'default' => 'No'
	));

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'cht-footer-callout-display-control', array(
		'label' => 'Display this section?',
		'section' => 'cht-footer-callout-section',
		'settings' => 'cht-footer-callout-display',
		'type'	=> 'select',
		'choices'	=> array('No' => 'No', 'Yes' => 'Yes')
	)));

	/* Footer Callout Headline */
	$wp_customize->add_setting('cht-footer-callout-headline', array(
		'default' => 'Example Headline Text!'
	));

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'cht-footer-callout-headline-control', array(
		'label' => 'Headline',
		'section' => 'cht-footer-callout-section',
		'settings' => 'cht-footer-callout-headline'
	)));

	/* Footer Callout Textarea */
	$wp_customize->add_setting('cht-footer-callout-text', array(
		'default' => 'Example paragraph text.'
	));

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'cht-footer-callout-text-control', array(
		'label' => 'Headline',
		'section' => 'cht-footer-callout-section',
		'settings' => 'cht-footer-callout-text',
		'type'	=> 'textarea'
	)));	

	/* Footer Callout Dropdown Pages */
	$wp_customize->add_setting('cht-footer-callout-link');

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'cht-footer-callout-link-control', array(
		'label' => 'Link',
		'section' => 'cht-footer-callout-section',
		'settings' => 'cht-footer-callout-link',
		'type'	=> 'dropdown-pages'
	)));

	/* Footer Callout Image */
	$wp_customize->add_setting('cht-footer-callout-image');

	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'cht-footer-callout-image-control', array(
		'label' => 'Image',
		'section' => 'cht-footer-callout-section',
		'settings' => 'cht-footer-callout-image',
		'width' => 750,
		'height' => 500
	)));


}

add_action('customize_register', 'chapter_footer_callout');