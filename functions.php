<?php 



/*
====================================================================
Add google fonts enqueue script
====================================================================
*/
function seedwise_fonts_scripts() {
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat&family=Roboto&family=Rubik:ital,wght@0,400;0,500;1,400&display=swap' );
}

add_action( 'wp_enqueue_scripts', 'seedwise_fonts_scripts' );

/* 
=====================================================================
Add style sheets support to the theme
=====================================================================
*/
function seedwise_load_scripts(){
    wp_enqueue_style( 'seedwise-style', get_stylesheet_uri(), array(), filemtime(
        get_template_directory() . '/style.css'
    ), 'all' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&family=Rubik:ital,wght@0,400;0,500;1,400&display=swap', array(), null);
    wp_enqueue_script( 'dropdown', get_template_directory_uri() . '/assets/js/dropdown.js', array(), '1.0', true );
    wp_enqueue_script( 'fontawesome', get_template_directory_uri() . '/assets/js/all.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'seedwise_load_scripts' );



/* 
=====================================================================
Add bootstrap support to the theme
=====================================================================
*/
function bootstrap_script_enqueue() {
    wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '5.0', true  );
    wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
}

add_action( 'wp_enqueue_scripts', 'bootstrap_script_enqueue' );

/*
=====================================================================
Add lightbox support to the theme
=====================================================================
*/
function enqueue_lightbox_scripts() {
    // wp_enqueue_script('lightbox', get_template_directory_uri() . '/assets/js/lightbox.js', array('jquery'), '2.11.3', true);
    wp_enqueue_script('fslightbox', get_template_directory_uri() . '/assets/js/fslightbox.js', array(), '', true);
    // wp_enqueue_style('lightbox', get_template_directory_uri() . '/assets/css/lightbox.css', array(), '2.11.3');
}
add_action('wp_enqueue_scripts', 'enqueue_lightbox_scripts');

/*
=====================================================================
Add logo to login page
=====================================================================
*/
function seedwise_filter_login_head() {

	if ( has_custom_logo() ) :

		$image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
		?>
		<style type="text/css">
			.login h1 a {
				background-image: url(<?php echo esc_url( $image[0] ); ?>);
				-webkit-background-size: <?php echo absint( $image[1] )?>px;
				background-size: <?php echo absint( $image[1] ) ?>px;
				height: <?php echo absint( $image[2] ) ?>px;
				width: <?php echo absint( $image[1] ) ?>px;
			}
		</style>
		<?php
	endif;
}

add_action( 'login_head', 'seedwise_filter_login_head', 100 );

/* 
=====================================================================
General theme configs
=====================================================================
*/
function seedwise_config(){
	// Menu register
	register_nav_menus(
		array(
			'seedwise_main_menu' => 'Main Menu',
			'seedwise_footer_menu' => 'Footer Menu',
		)
	 );
	

    add_theme_support( 'title-tag' );
	 // Add support for custom logo.
	add_theme_support( 'custom-logo' );
	// thumbnails
	add_theme_support( 'post-thumbnails' );
    // automatic feed links
    add_theme_support( 'automatic-feed-links' );
    // block styles
    add_theme_support( "wp-block-styles" );
    // responsive embeds
    add_theme_support( "responsive-embeds" );
    // html 5
    add_theme_support( 'html5', array(
        'comment-list', 
        'comment-form',
        'search-form',
        'gallery',
        'caption',
    ) );
    // custom background
    add_theme_support( "custom-background");
    // alignment
    add_theme_support( "align-wide" );

	 // array for custom header
	$defaults = array(
		'default-image'          => '',
		'random-default'         => false,
		'width'                  => 0,
		'height'                 => 0,
		'flex-height'            => false,
		'flex-width'             => false,
		'default-text-color'     => '',
		'header-text'            => true,
		'uploads'                => true,
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
		'video'                  => false,
		'video-active-callback'  => 'is_front_page',
	);
	 // Add support for custom header.
	add_theme_support( 'custom-header', $defaults );

}
add_action('after_setup_theme', 'seedwise_config', 0);

// Add sidebars
add_action( 'widgets_ini', 'seedwise_sidebars' );
function seedwise_sidebars(){
	register_sidebar( array(
		'name' => 'Blog Sidebar',
		'id' => 'sidebar-blog',
		'description'    => 'This is the Blog Sidebar. You can addd your widgets here',
		'before_widget'  => '<div class="widget-wrapper">',
		'after_widgetme' => '</div>',
		'before_title'   => '<h4 class="widget-title>"',
		'after_itle'     => '</h4>'
	)

	);
}
/*
====================================================================
TIMELINE CUSTOM POST TYPE
====================================================================
*/

// function register_custom_post_type() {
//     // Define the arguments for the custom post type
//     $args = array(
//         'labels' => array(
//             'name' => __( 'Demo Card' ),
//             'singular_name' => __( 'Demo Card' ),
//             'add_new' => __( 'Add New' ),
//             'add_new_item' => __( 'Add New Demo Card' ),
//             'edit_item' => __( 'Edit Demo Card' ),
//             'new_item' => __( 'New Demo Card' ),
//             'view_item' => __( 'View Demo Card' ),
//             'search_items' => __( 'Search Demo Cards' ),
//             'not_found' => __( 'No Demo Cards found' ),
//             'not_found_in_trash' => __( 'No Demo Cards found in Trash' )
//         ),
//         'public' => true, // Whether the post type is public
//         'hierarchical' => false, // Whether the post type is hierarchical (e.g. pages)
//         'has_archive' => true, // Whether the post type has an archive page
//         'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ) // What features are supported by the post type
//     );

//     // Register the custom post type
//     register_post_type( 'demo_card', $args );
// }
// add_action( 'init', 'register_custom_post_type' );

// Add custom meta box for the custom field
function add_demo_card_meta_box() {
    add_meta_box(
        'demo_card_meta_box', // Unique ID
        'Demo Card Meta', // Box title
        'demo_card_meta_box_callback', // Callback function
        'demo_card', // Post type
        'normal', // Context
        'default' // Priority
    );
}
add_action( 'add_meta_boxes', 'add_demo_card_meta_box' );

// Callback function to render the meta box content
function demo_card_meta_box_callback( $post ) {
    // Retrieve the existing value of the custom field
    $year = get_post_meta( $post->ID, 'year', true );

    // Output the form field for the custom field
    echo '<label for="year">Year</label>';
    echo '<input type="text" id="year" name="year" value="' . esc_attr( $year ) . '">';
}

// Save the custom field value when the post is saved or updated
function save_demo_card_meta( $post_id ) {
    if ( isset( $_POST['year'] ) ) {
        $year = sanitize_text_field( $_POST['year'] );
        update_post_meta( $post_id, 'year', $year );
    }
}
add_action( 'save_post_demo_card', 'save_demo_card_meta' );


/*
=====================================================================
Hero Section Text MOD
=====================================================================
*/
function seedwise_here_section_text_register( $wp_customize ) {
    // Add section for Photographer Options
    $wp_customize->add_section( 'photographer_options', array(
        'title'    => 'Photographer Options',
        'priority' => 120,
    ) );

    // Add Photographer Title setting
    $wp_customize->add_setting( 'photographer_title', array(
        'default'           => 'Hello! I\'m Glauco, a photographer!',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'photographer_title', array(
        'label'    => 'Photographer Title',
        'section'  => 'photographer_options',
        'type'     => 'text',
    ) );

    // Add Photographer Description setting
    $wp_customize->add_setting( 'photographer_description', array(
        'default'           => 'As a photographer, I capture moments and memories through my lens, and I am passionate about my craft. Through my work, I aim to tell stories and convey emotions, creating art that resonates with my audience.',
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'photographer_description', array(
        'label'    => 'Photographer Description',
        'section'  => 'photographer_options',
        'type'     => 'textarea',
    ) );

    // Add Photographer Image setting
    $wp_customize->add_setting( 'photographer_image', array(
        'default'           => 'https://via.placeholder.com/350x200',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'photographer_image', array(
        'label'    => 'Photographer Image',
        'section'  => 'photographer_options',
    ) ) );

    // Add Read More button text
    $wp_customize->add_setting( 'photographer_readmore_text', array(
        'default'           => 'Read More',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'photographer_readmore_text', array(
        'label'    => 'Photographer Read More Text',
        'section'  => 'photographer_options',
        'type'     => 'text',
    ) );
    // Add Read More button link
    $wp_customize->add_setting( 'photographer_readmore_link', array(
        'default'           => 'http://glauco.local/about/',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'photographer_readmore_link', array(
        'label'    => 'Photographer Read More Link',
        'section'  => 'photographer_options',
        'type'     => 'text',
    ) );
}
add_action( 'customize_register', 'seedwise_here_section_text_register' );


/*
=====================================================================
My Projects
=====================================================================
*/

function seedwise_myprojects_section_customize_register( $wp_customize ) {
    // Add section for Services Options
    $wp_customize->add_section( 'myprojects_options', array(
        'title'    => 'My Projects Options',
        'priority' => 120,
    ) );

    // Add Services Title setting
    $wp_customize->add_setting( 'myprojects_title', array(
        'default'           => 'My Projects',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'myprojects_title', array(
        'label'    => 'My Projects Title',
        'section'  => 'myprojects_options',
        'type'     => 'text',
    ) );
}
add_action( 'customize_register', 'seedwise_myprojects_section_customize_register' );


/*
====================================================================
SINGLE
====================================================================
*/


  function seedwise_portrait_author_customizer_settings($wp_customize) {
    // Add a section for copyright options
    $wp_customize->add_section('single_post_options', array(
        'title' => 'Single Post Options',
        'priority' => 120,
    ));

    // Add a setting and control for portrait by text
    $wp_customize->add_setting('portrait_by_settings', array(
        'default' => 'Portrait by: Glauco Paganotti',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('portrait_by_text', array(
        'label' => 'Custom Portrait By Text',
        'section' => 'single_post_options',
        'settings' => 'portrait_by_settings',
        'type' => 'text',
    ));
}

add_action('customize_register', 'seedwise_portrait_author_customizer_settings');



/*
=====================================================================
Add service section MOD 
=====================================================================
*/
function seedwise_service_section_customize_register( $wp_customize ) {
    // Add section for Services Options
    $wp_customize->add_section( 'services_options', array(
        'title'    => 'Services Options',
        'priority' => 120,
    ) );

    // Add Services Title setting
    $wp_customize->add_setting( 'services_title', array(
        'default'           => 'My Services',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'services_title', array(
        'label'    => 'Services Title',
        'section'  => 'services_options',
        'type'     => 'text',
    ) );

    // Add Service 1 Icon setting
    $wp_customize->add_setting( 'service_1_icon', array(
        'default'           => 'fas fa-camera',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'service_1_icon', array(
        'label'    => 'Service 1 Icon',
        'section'  => 'services_options',
        'type'     => 'text',
    ) );

    // Add Service 1 Title setting
    $wp_customize->add_setting( 'service_1_title', array(
        'default'           => 'Photography',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'service_1_title', array(
        'label'    => 'Service 1 Title',
        'section'  => 'services_options',
        'type'     => 'text',
    ) );

    // Add Service 1 Description setting
    $wp_customize->add_setting( 'service_1_description', array(
        'default'           => ' I specialize in capturing authentic moments, creating timeless images that tell your unique story.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'service_1_description', array(
        'label'    => 'Service 1 Description',
        'section'  => 'services_options',
        'type'     => 'textarea',
    ) );

	// Add Service 2 Icon setting
    $wp_customize->add_setting( 'service_2_icon', array(
        'default'           => 'fas fa-video',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'service_2_icon', array(
        'label'    => 'Service 2 Icon',
        'section'  => 'services_options',
        'type'     => 'text',
    ) );

    // Add Service 2 Title setting
    $wp_customize->add_setting( 'service_2_title', array(
        'default'           => 'Videography',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'service_2_title', array(
        'label'    => 'Service 2 Title',
        'section'  => 'services_options',
        'type'     => 'text',
    ) );

    // Add Service 2 Description setting
    $wp_customize->add_setting( 'service_2_description', array(
        'default'           => "I craft cinematic videos, bringing your vision to life with attention to detail and a creative touch.",
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'service_2_description', array(
        'label'    => 'Service 2 Description',
        'section'  => 'services_options',
        'type'     => 'textarea',
    ) );

	// Add Service 3 Icon setting
    $wp_customize->add_setting( 'service_3_icon', array(
        'default'           => 'fas fa-film',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'service_3_icon', array(
        'label'    => 'Service 3 Icon',
        'section'  => 'services_options',
        'type'     => 'text',
    ) );

    // Add Service 3 Title setting
    $wp_customize->add_setting( 'service_3_title', array(
        'default'           => 'Drone Footage',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'service_3_title', array(
        'label'    => 'Service 3 Title',
        'section'  => 'services_options',
        'type'     => 'text',
    ) );

    // Add Service 3 Description setting
    $wp_customize->add_setting( 'service_3_description', array(
        'default'           => "Elevate your visuals with breathtaking aerial perspectives, adding a dynamic and captivating element to your project.",
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'service_3_description', array(
        'label'    => 'Service 3 Description',
        'section'  => 'services_options',
        'type'     => 'textarea',
    ) );

	// Add Service 4 Icon setting
    $wp_customize->add_setting( 'service_4_icon', array(
        'default'           => 'fas fa-file-video',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'service_4_icon', array(
        'label'    => 'Service 4 Icon',
        'section'  => 'services_options',
        'type'     => 'text',
    ) );

    // Add Service 4 Title setting
    $wp_customize->add_setting( 'service_4_title', array(
        'default'           => 'Video Editing',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'service_4_title', array(
        'label'    => 'Service 4 Title',
        'section'  => 'services_options',
        'type'     => 'text',
    ) );

    // Add Service 4 Description setting
    $wp_customize->add_setting( 'service_4_description', array(
        'default'           => "I skillfully edit and enhance footage, weaving together a seamless narrative that engages and captivates your audience.",
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'service_4_description', array(
        'label'    => 'Service 4 Description',
        'section'  => 'services_options',
        'type'     => 'textarea',
    ) );

	// Add Service 5 Icon setting
    $wp_customize->add_setting( 'service_5_icon', array(
        'default'           => 'fas fa-image',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'service_5_icon', array(
        'label'    => 'Service 5 Icon',
        'section'  => 'services_options',
        'type'     => 'text',
    ) );

    // Add Service 5 Title setting
    $wp_customize->add_setting( 'service_5_title', array(
        'default'           => 'Photoshop',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'service_5_title', array(
        'label'    => 'Service 5 Title',
        'section'  => 'services_options',
        'type'     => 'text',
    ) );

    // Add Service 5 Description setting
    $wp_customize->add_setting( 'service_5_description', array(
        'default'           => " I offer professional-grade Photoshop services, ensuring your images are polished, enhanced, and visually stunning.",
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'service_5_description', array(
        'label'    => 'Service 5 Description',
        'section'  => 'services_options',
        'type'     => 'textarea',
    ) );

	// Add Service 6 Icon setting
    $wp_customize->add_setting( 'service_6_icon', array(
        'default'           => 'fas fa-file-image',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'service_6_icon', array(
        'label'    => 'Service 6 Icon',
        'section'  => 'services_options',
        'type'     => 'text',
    ) );

    // Add Service 6 Title setting
    $wp_customize->add_setting( 'service_6_title', array(
        'default'           => 'Photo Editing',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'service_6_title', array(
        'label'    => 'Service 6 Title',
        'section'  => 'services_options',
        'type'     => 'text',
    ) );

    // Add Service 6 Description setting
    $wp_customize->add_setting( 'service_6_description', array(
        'default'           => "I bring out the best in your photos, enhancing colors, retouching imperfections, and delivering high-quality, impactful images.",
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'service_6_description', array(
        'label'    => 'Service 6 Description',
        'section'  => 'services_options',
        'type'     => 'textarea',
    ) );
}
add_action( 'customize_register', 'seedwise_service_section_customize_register' );

/*
=====================================================================
CONTACT SECTION MOD
=====================================================================
*/
function seedwise_contact_section_customize_register( $wp_customize ) {
    // Add section for Contact Options
    $wp_customize->add_section( 'contact_options', array(
        'title'    => 'Contact Options',
        'priority' => 120,
    ) );

    // Add Contact Title setting
    $wp_customize->add_setting( 'contact_title', array(
        'default'           => 'Hire Me!',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'contact_title', array(
        'label'    => 'Contact Title',
        'section'  => 'contact_options',
        'type'     => 'text',
    ) );
    // Add Contact Description 1 setting
    $wp_customize->add_setting( 'contact_description_li1', array(
        'default'           => "I specialize in a variety of photography, including portraiture, landscape, and event photography.",
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'contact_description_li1', array(
        'label'    => 'Contact Description Paragrapgh 1',
        'section'  => 'contact_options',
        'type'     => 'textarea',
    ) );
    // Add Contact Description 2 setting
    $wp_customize->add_setting( 'contact_description_li2', array(
        'default'           => "I'm also proficient in Photoshop and drone footage, and I can provide professional filming services.",
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'contact_description_li2', array(
        'label'    => 'Contact Description Paragrapgh 2',
        'section'  => 'contact_options',
        'type'     => 'textarea',
    ) );
    // Add Contact Description 3 setting
    $wp_customize->add_setting( 'contact_description_li3', array(
        'default'           => "If you're looking for a photographer who can capture your memories in a beautiful and professional way, I encourage you to contact me.",
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'contact_description_li3', array(
        'label'    => 'Contact Description Paragrapgh 3',
        'section'  => 'contact_options',
        'type'     => 'textarea',
    ) );
    // Add Contact Email Icon setting
    $wp_customize->add_setting( 'contact_email_icon', array(
        'default'           => 'fas fa-envelope',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'contact_email_icon', array(
        'label'    => 'Contact Email Icon',
        'section'  => 'contact_options',
        'type'     => 'text',
    ) );
    // Add Contact Email Text setting
    $wp_customize->add_setting( 'contact_email_text', array(
        'default'           => 'contact@glaucopaganotti.com.au',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'contact_email_text', array(
        'label'    => 'Contact Email Text',
        'section'  => 'contact_options',
        'type'     => 'text',
    ) );
    // Add Contact Phone Icon setting
    $wp_customize->add_setting( 'contact_phone_icon', array(
        'default'           => 'fas fa-phone',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'contact_phone_icon', array(
        'label'    => 'Contact Phone Icon',
        'section'  => 'contact_options',
        'type'     => 'text',
    ) );
     // Add Contact Phone Text setting
     $wp_customize->add_setting( 'contact_phone_text', array(
        'default'           => '432 567 890',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'contact_phone_text', array(
        'label'    => 'Contact Phone Text',
        'section'  => 'contact_options',
        'type'     => 'text',
    ) );
}
add_action( 'customize_register', 'seedwise_contact_section_customize_register' );

/*
=====================================================================
HOME PAGE WIDGET AREA
=====================================================================
*/
function seedwise_register_widget_area() {
    register_sidebar( array(
        'name'          => __( 'Contact Form Widget Area', 'seedwise' ),
        'id'            => 'contact-form-widget-area',
        'description'   => __( 'Add widgets here to display inside the contact form.', 'seedwise' ),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'seedwise_register_widget_area' );


/*
=====================================================================
ABOUT PAGE TIMELINE REGISTER
=====================================================================
*/

function seedwise_about_timeline_customize_register( $wp_customize ) {
    //Add About Ttimeline section
    $wp_customize->add_section( 'about_timeline', array(
        'title'    => 'About Timeline Options',
        'priority' => 120,
    ) );
    // Add About Timeline Title setting
    $wp_customize->add_setting( 'about_timeline_title', array(
        'default'           => "Glauco's Photographic Journey",
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'about_timeline_title', array(
        'label'    => 'Timeline Title',
        'section'  => 'about_timeline',
        'type'     => 'text',
    ) );
    // Add About Timeline Subtitle setting
    $wp_customize->add_setting( 'about_timeline_subtitle', array(
        'default'           => "I'm a photographer with over 10 years of experience. I've worked on a variety of projects, from weddings to corporate events.",
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'about_timeline_subtitle', array(
        'label'    => 'Timeline Sub-Title',
        'section'  => 'about_timeline',
        'type'     => 'textarea',
    ) );
}
add_action('customize_register', 'seedwise_about_timeline_customize_register');



/*
=====================================================================
FOOTER COPYRIGHT
=====================================================================
*/

  function seedwise_footer_customizer_settings($wp_customize) {
    // Add a section for copyright options
    $wp_customize->add_section('copyright_section', array(
      'title' => 'Footer Copyright',
      'priority' => 130,
    ));
  
    // Add a setting and control for copyright text
    $wp_customize->add_setting('copyright_text', array(
      'default' => 'Glauco Paganotti',
      'sanitize_callback' => 'sanitize_text_field',
    ));
  
    $wp_customize->add_control('copyright_text', array(
      'label' => 'Custom Copyright Text',
      'section' => 'copyright_section',
      'type' => 'text',
    ));
  }
  
  add_action('customize_register', 'seedwise_footer_customizer_settings');

  function seedwise_footer_text_settings($wp_customize) {
    // Add a section for copyright options
    $wp_customize->add_section('footer_text_section', array(
      'title' => 'Footer Text',
      'priority' => 130,
    ));

    // Add Photographer Description setting
    $wp_customize->add_setting( 'footer_text_description', array(
        'default'           => "I've been shooting photos for over a decade, and I've worked on a bunch of different projects, from weddings to corporate events. I love capturing the beauty of the world around me, and I'm always looking for new ways to challenge myself and create something special. If you're looking for a photographer who can capture your memories in a way that's both beautiful and meaningful, I'd love to chat.",
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'footer_text_description', array(
        'label'    => 'Footer Text Description',
        'section'  => 'footer_text_section',
        'type'     => 'textarea',
    ) );

    }
    add_action('customize_register', 'seedwise_footer_text_settings');

  function dynamic_copyright_year() {
    $current_year = date('Y');
    // $custom_text = get_theme_mod('copyright_text', '');
  
    if (!empty($custom_text)) {
      return wp_kses_post($custom_text);
    }
  
    return '&copy; ' . $current_year;
    // return '&copy; ' . $current_year . $custom_text;
  }


  function seedwise_social_icons_customize_register( $wp_customize ) {
    // Add section for Services Options
    $wp_customize->add_section( 'footer_social_icons', array(
        'title'    => 'Footer Social Icons',
        'priority' => 130,
    ) );

     // Add Service 1 Icon setting
     $wp_customize->add_setting( 'social_1_icon', array(
        'default'           => 'fab fa-facebook',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'social_1_icon', array(
        'label'    => 'Social 1 Icon',
        'section'  => 'footer_social_icons',
        'type'     => 'text',
    ) );
    // Add Service 1 Icon link setting
    $wp_customize->add_setting( 'social_1_icon_link', array(
        'default'           => "https://facebook.com/",
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'social_1_icon_link', array(
        'label'    => 'Social Icon Link 1',
        'section'  => 'footer_social_icons',
        'type'     => 'text',
    ) );

     // Add Service 2 Icon setting
     $wp_customize->add_setting( 'social_2_icon', array(
        'default'           => 'fab fa-twitter',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'social_2_icon', array(
        'label'    => 'Social 2 Icon',
        'section'  => 'footer_social_icons',
        'type'     => 'text',
    ) );
    // Add Service 2 Icon link setting
    $wp_customize->add_setting( 'social_2_icon_link', array(
        'default'           => "https://twitter.com/",
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'social_2_icon_link', array(
        'label'    => 'Social Icon Link 2',
        'section'  => 'footer_social_icons',
        'type'     => 'text',
    ) );
     // Add Service 3 Icon setting
     $wp_customize->add_setting( 'social_3_icon', array(
        'default'           => 'fab fa-instagram',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'social_3_icon', array(
        'label'    => 'Social 3 Icon',
        'section'  => 'footer_social_icons',
        'type'     => 'text',
    ) );
    // Add Service 3 Icon link setting
    $wp_customize->add_setting( 'social_3_icon_link', array(
        'default'           => "https://instagram.com/",
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'social_3_icon_link', array(
        'label'    => 'Social Icon Link 3',
        'section'  => 'footer_social_icons',
        'type'     => 'text',
    ) );
     // Add Service 4 Icon setting
     $wp_customize->add_setting( 'social_4_icon', array(
        'default'           => 'fab fa-youtube',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'social_4_icon', array(
        'label'    => 'Social 4 Icon',
    'section'  => 'footer_social_icons',
    'type'     => 'text',
    ) );
    // Add Service 4 Icon link setting
    $wp_customize->add_setting( 'social_4_icon_link', array(
        'default'           => "https://youtube.com/",
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'social_4_icon_link', array(
        'label'    => 'Social Icon Link 4',
        'section'  => 'footer_social_icons',
        'type'     => 'text',
    ) );

    }
    add_action('customize_register', 'seedwise_social_icons_customize_register');
