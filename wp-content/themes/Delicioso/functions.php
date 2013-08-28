<?php 
function my_function_admin_bar(){ return false; }
add_filter( 'show_admin_bar' , 'my_function_admin_bar');

//Define constants:
define('GD_FUNCTIONS', TEMPLATEPATH . '/themesaholic/');
define('GD_WIDGETS', TEMPLATEPATH . '/themesaholic/widgets/');
define('PATTERNS', get_template_directory_uri() . '/style/patterns/');
define('SCRIPTS', get_template_directory_uri() . '/script/');
define('IMAGES', get_template_directory_uri() . '/style/bgimages/');
define('LISTSTYLE', get_template_directory_uri() . '/style/img/styletype/');
define('LINES', get_template_directory_uri() . '/style/lines/');
define('GD_THEME_DIR', get_template_directory_uri());
define('AJAX_FUNCTIONS', get_template_directory_uri().'/lib/');
define('SCREENS', get_template_directory_uri().'/include/css/img/screens/');
define('GD_MAINMENU_NAME', 'general-options');
define('THEME_NAME','Delicioso');
define('GD_THEME', THEME_NAME);
define('GD_SHORT', THEME_NAME.'_');
define('GD_THEME_VERSION', '1.0');
define('GD_SITE_URL', get_site_url());
update_option('THEME_NAME',THEME_NAME);



	require_once (GD_FUNCTIONS . 'functions.php');
	//Load admin specific files:
	if (is_admin()) :
		require_once (GD_FUNCTIONS . 'settings/meta-functions.php');
		require_once (GD_FUNCTIONS . 'settings/ajax-image.php');
		require_once (GD_FUNCTIONS . 'settings/admin-helper.php');
		require_once (GD_FUNCTIONS . 'settings/adding_menu.php');
		require_once (GD_FUNCTIONS . 'settings/helpers.php');
		require_once (GD_FUNCTIONS . 'theme.php');
   	
        $check = get_option(THEME_NAME.'-body-bgcolor-default');
       
        if(empty($check)){
            theme_start();
        }
              
        endif;

        
        
	//Register sidebar
	require_once (GD_FUNCTIONS . 'settings/register_sidebar.php');
	
	//Load widgets:
	require_once (GD_WIDGETS . 'widget-flickr.php');
	require_once (GD_WIDGETS . 'widget-twitter.php');
	require_once (GD_WIDGETS . 'widget-recent.php');
	require_once (GD_WIDGETS . 'widget-adv.php');
	require_once (GD_WIDGETS . 'widget-testimonials.php');



	
	//Load helpers:
	require_once (GD_FUNCTIONS . 'settings/helpers.php');
	require_once (GD_FUNCTIONS . 'settings/tk-shortcodes.php');
	
	
		
	/*Add Theme support menus - Custom menu (Primary)
	add_theme_support( 'menus' );*/
	
	if ( function_exists( 'register_nav_menu' ) ) {
		register_nav_menu( 'primary-menu', 'Primary menu for your site' );
	}
	
	
	
	remove_filter( 'the_content', 'wpautop' );


	add_editor_style('editor-style.css');;

	
	
	define('HEADER_TEXTCOLOR', '');
	define('HEADER_IMAGE_WIDTH', 1024); // use width and height appropriate for your theme
	define('HEADER_IMAGE_HEIGHT', 140);// set your image size
	define('NO_HEADER_TEXT', true );	
	
        function admin_header_style() {
        ?><style type="text/css">
            #headimg {
                width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
                height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
                background: no-repeat;
            }
        </style><?php
        }
        
	
	add_custom_image_header('', 'admin_header_style');
	add_custom_background();

	
	

  
	
	add_theme_support( 'post-thumbnails', array( 'post' ) );
	add_theme_support( 'automatic-feed-links' );