<?php if (!session_id())
    session_start();

/**
 * @package WordPress
 * @subpackage Delicioso
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php //SEO
if(!empty($_GET['page_id'])) {$post_id = $_GET['page_id'];}else{if(isset($post->ID)){$post_id = $post->ID;}}
if(isset($post_id)){
	$slug = get_page_slug($post_id);
}else{
	$slug = 404;
}
if(!empty($_GET['p'])) {$post_id = $_GET['p'];}else{if(isset($post->ID)){$post_id = $post->ID;}}
if(isset($post_id)){
	$data = get_post_meta( $post_id, GD_THEME, true );
}
remove_filter ('the_content', 'wpautop');
$_SESSION['slug'] = $slug;
$_SESSION['showlineforportfolio'] = 'no';
?>
<title><?php if(!empty($data['seo_title'])) { echo $data['seo_title']; } else { wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); }?></title>	
	<meta name="keywords" content="<?php if(!empty($data['seo_keywords'])) { echo $data['seo_keywords'];} ?>" />
	<meta name="description" content="<?php if(!empty($data['seo_description'])) { echo $data['seo_description']; } else { bloginfo('description'); }?>" />
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri().'/script/piroboxextend/style.css';?>" type="text/css" media="screen" />
<?php
        $browser =  $_SERVER['HTTP_USER_AGENT'];

        $theme_color = get_option(THEME_NAME."_themecolor"); if(empty($theme_color)){$theme_color = "";}
        if(!empty($theme_color) or $theme_color!=="") { ?>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri()."/style/".$theme_color."/style.css"; ?>" type="text/css" />
	<?php
	}
	if(strpos($browser,'Firefox/4')){
		?>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri().'/browsers/ff4.css';?>" type="text/css" />
		<?php
	}

        if(strpos($browser,'Safari') && strpos($browser,'Chrome') === false){ 
		?>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri().'/browsers/safari.css';?>" type="text/css" />
		<?php
	}

	if(strpos($browser,'Chrome')){
		?>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri().'/browsers/chrome.css';?>" type="text/css" />
		<?php
	}
	if(strpos($browser,'MSIE')){
		?>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri().'/browsers/ie.css';?>" type="text/css" />
		<?php
	}

	if(strpos($browser,'pera')){ ?>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri().'/browsers/opera.css';?>" type="text/css" />
		<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#wp-calendar').attr('style','height:200px!important;');
		});
		</script>
	<?php
	}
	?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri().'/script/fancybox/jquery.fancybox-1.3.4.css';?>" type="text/css" media="screen" />
<link rel="stylesheet" media="screen" href="<?php echo get_template_directory_uri() . "/script/anythingslider/anythingslider.css"; ?>" type="text/css"/>
<link rel="stylesheet" media="screen" href="<?php echo get_template_directory_uri() . "/script/superfish/superfish.css"; ?>" type="text/css"/>
<link href='http://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'/>


<?php 
   wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri().'/script/jquery/jquery-1.6.2.min.js');
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'jquery-ui', get_template_directory_uri().'/script/jquery/jquery-ui-1.8.12.custom.min.js');
    wp_enqueue_script('quicksand', get_template_directory_uri().'/script/quicksand/jquery.quicksand.js' );	
    wp_enqueue_script('fancybox', get_template_directory_uri().'/script/fancybox/jquery.fancybox-1.3.4.js' );
    wp_enqueue_script('superfish', get_template_directory_uri().'/script/superfish/superfish.js' );
    wp_enqueue_script('piroboxextend', get_template_directory_uri().'/script/piroboxextend/pirobox_extended.js' );
    wp_enqueue_script('anything', get_template_directory_uri() . '/script/anythingslider/jquery.anythingslider.js');
    wp_enqueue_script('anythingfx', get_template_directory_uri() . '/script/ewp_slider.js');    
    wp_enqueue_script('ajaxpager', get_template_directory_uri() . '/script/quickpager/quickpager.jquery.js');
    wp_enqueue_script('my-commons', get_template_directory_uri().'/script/common.js' );
    wp_enqueue_script('cycle', get_template_directory_uri().'/script/cycle/jquery.cycle.all.min.js' );
                            if (is_singular())
                            wp_enqueue_script("comment-reply");
    
    ?>

			<!-- Favicon -->
			   <?php $favicon = get_option(THEME_NAME.'_favicon'); if(empty($favicon)) { $favicon = get_template_directory_uri()."/images/favicon.png"; }?>
			   <link rel="shortcut icon" href="<?php echo $favicon;?>" />


<?php wp_head(); 

remove_filter ('the_content',  'wpautop');
remove_filter ('comment_text', 'wpautop');
remove_filter('the_content', 'wptexturize');
remove_filter('the_excerpt', 'wptexturize');
remove_filter('comment_text', 'wptexturize');
$twitter = get_option(THEME_NAME.'_footer_twitter');
?>
<script type="text/javascript">

    jQuery(document).ready(function(){

        // Otvara menu
        jQuery(".nav ul").superfish();

        //Brise zadnju liniju
        jQuery('.sf-menu li:last').attr('style', 'background:none');
        
    });

</script>

</head>
<?php  flush();
if ( ! isset( $content_width ) ) $content_width = 900;
?>
<body <?php $class='body'; body_class( $class ); ?>>
 
    <div class="header">
        <div class="wrap">
            <div class="logo left">
                        <?php $logo = get_option(THEME_NAME.'_logo'); if(empty($logo)) { $logo = get_template_directory_uri()."/images/logo.png"; }?>
					<a href="<?php echo home_url(); ?>"><img src="<?php echo $logo;?>" alt="<?php bloginfo('name');?>" /></a>
                    
                    </div><!--/logo-->

  <div class="nav right">
                        <?php $nav_menu = array('title_li'=> __(''), 'theme_location' => 'primary-menu', 'link_before'   => '', 'link_after' => '','menu_class'=>'sf-menu');?>	
                        <?php  wp_nav_menu($nav_menu);?>
                    </div><!--/nav-->
</div><!--wrap-->

        <div class="top-border"></div><!--top-border-->

    </div><!--/header-->

<div class="clear-both"></div>
    <script type="text/javascript">
    /*                    
    $(function () {
        $('.slider').anythingSlider({
            //			theme : 'metallic',
            expand              : false,
            startStopped        : false,
            buildArrows         : false,
            buildStartStop      : false,
            delay               : 4000,
            animationTime       : 1000,
            easing              : "easeInOutExpo",
            autoPlay            : true,
            onSlideComplete : function(slider){
            }
            ,onSlideBegin : function(slider) {
            $(".slide-content-holder").fadeTo( 300, 0);
            }
            ,onSlideComplete : function(slider) {
                $(".slide-content-holder").attr('style','margin-left:500px');
            $(".activePage .slide-content-holder").animate({"left": "-=500px", "opacity" : "1"}, "slow");

            }
        });
        $('.anythingControls .thumbNav').prepend('<li class="anythingControls-left"></li>');
        $('.anythingControls .thumbNav').append('<li class="anythingControls-right"></li>');

    });
    */                   
    $(document).ready(function(){
        $('.slider').ewpSlider({});  
    });
    
</script>


<?php if (is_front_page()) { ?>

<div id="slider-wrap-front" class="front">
    <div id="slider-container">

                                                <?php
                                                $cat = get_option(THEME_NAME . '_slider_category');


                                                $catslug = get_cat_name($cat);

                                                $args = array('category_name' => $catslug, 'post_status' => 'publish', 'posts_per_page' => 100);

                                                query_posts($args);


                                                $pageURL = get_page_url();
                                                $i = 1;
                                                ?>
                                            <ul class="slider" style="width: 100%; height: 625px;">
                                                <?php
                                                while (have_posts()) : the_post();
                                                    $img = "";

                                                    if (has_post_thumbnail()) {
                                                        $imagedata = simplexml_load_string(get_the_post_thumbnail());
                                                        $img = $imagedata->attributes()->src;
                                                        $data = get_post_meta( $post->ID, GD_THEME, true );
                                                        if ($post->post_content <> substr($post->post_content, 0, 240)) {
                                                            $dots2 = "...";
                                                        } else {
                                                            $dots2 = "";
                                                        }
                                                        $cont = substr($post->post_content, 0, 240);

                                                        if ($post->post_title <> substr($post->post_title, 0, 60)) {
                                                            $dots3 = "...";
                                                        } else {
                                                            $dots3 = "";
                                                        }
                                                        $title1 = substr($post->post_title, 0, 28);

                                                        $postslug = get_post_slug($post->ID);
                                                        if (!empty($img)) {
                                                            ?>
                                                            <li>
                                                                <div class="slide-holder" style="background:url(<?php echo get_template_directory_uri();?>/script/timthumb.php?src=<?php print $img;?>&w=1920&h=625&zc=1&q=100) no-repeat center center">
                                                                	<?php /*
																    <div class="slide-content-holder">
																        <div class="holder-title"  <?php if(empty($data['item_price'])) { echo 'style="width:395px;"';}?>>
																            <h2><a href="<?php echo the_permalink();?>"><?php echo $title1 . $dots3 ?></a></h2>
																        </div>
																        <div class="holder-text" <?php if(empty($data['item_price'])) { echo 'style="width:395px;"';}?>><p><?php truncate_post(185);?></p></div>
																        <?php if(!empty($data['item_price'])) { ?>
																        <div class="holder-circle">
																            <h1><?php  echo $data['item_price']; ?></h1>
																        </div><!--holder-circle-->
																        <?php }?>
																    </div>
																    */ ?>
                                                                </div>
                                                            </li>
                <?php
            }
        }
        $i++;
    endwhile;
    ?>
        </ul><div class="bottom-border"></div><!--bottom-border-->

    </div><!-- #wrapper -->
</div><!-- #slider-wrap -->
<div class="clear-both"></div>


			<?php } ?>