<?php session_start();
// Hook for adding admin menus
	add_action('admin_menu', 'tk_add_pages');
	//$setupnames = update_option(THEME_NAME.'-setup-names','');
	// action function for above hook
	function tk_add_pages() {
		add_theme_page(__(THEME_NAME.' Panel',THEME_NAME),THEME_NAME.' Panel','edit_theme_options','tk-'.THEME_NAME.'-theme','tk_theme_panel');
	}

	//Adding Icon to wordpress menu	
	function insert_jquery(){ ?>
		<div id="panel-widget">
			<script type="text/javascript">
				jQuery(document).ready(function(){
				jQuery('#menu-appearance .wp-submenu ul li a').each(function(){
					var href = (jQuery(this).attr('href'));
					if(href == 'themes.php?page=tk-<?php echo THEME_NAME;?>-theme'){
						var old = jQuery(this).html();
						jQuery(this).html('<img src="<?php echo get_template_directory_uri(); ?>/images/favicon.png" style="position:relative;top:4px;left:0px">'+old);
					}

					if(href == 'themes.php?page=tk-<?php echo THEME_NAME;?>-style'){
						var old = jQuery(this).html();
						jQuery(this).html('<img src="<?php echo get_template_directory_uri(); ?>/images/favicon.png" style="position:relative;top:4px;left:0px">'+old);
					}
                                        if(href == 'themes.php?page=theme-update-notifier'){
                                                var old = jQuery(this).html();
						jQuery(this).html('<img src="<?php echo get_template_directory_uri(); ?>/images/favicon.png" style="position:relative;top:4px;left:0px">'+old);
                                        }
				});
				});
			</script>
		</div>
	   <script type="text/javascript">
	  var shortcode = document.getElementById("panel-widget");
	</script>
		<?php
	}
	add_action('admin_footer','insert_jquery');




function tk_theme_panel() { 
	?>
	
	<?php
	$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		//delete_option(THEME_NAME."_sidebar");
		if(isset($_POST['save_testimonial'])) {
			global $wpdb;
                        $table_name = $wpdb->prefix . THEME_NAME."_testimonials";
                        if (!empty ($_POST['newtestimonial']) && !empty ($_POST['newtestimonial_undertext']) && !empty ($_POST['newtestimonial_text'])){
			$wpdb->insert( $table_name, array( 'name' => $_POST['newtestimonial'], 'title' => $_POST['newtestimonial_undertext'],'content' => $_POST['newtestimonial_text']), array( '%s', '%s', '%s' ) );
                        }

			?>
			<script type="text/javascript">
			jQuery(document).ready(function() {

			 jQuery('#container span').hide();
				jQuery('#site-title').show();
				jQuery('.button').show();
				jQuery('.show').show();
				jQuery('.testimonial').show();
				jQuery('.mainmenu').show();
				jQuery('.mainshow').css('border-bottom','1px solid #888888');
				jQuery(document).start();


			});
			</script>
			<?php

		}
			
		
		

                
		if(isset($_POST['save'])) {	
			$search  = array('\"', "\'" );
			$replace = array('"', "'"); 
			$copyright = str_replace($search ,$replace ,$_POST['footer_copyright']);

			$footer_facebook = $_POST['footer_facebook'];
			$footer_twitter = $_POST['footer_twitter'];

                        if(isset($_POST[THEME_NAME.'_slider_category'])){
                            update_option(THEME_NAME.'_slider_category',$_POST[THEME_NAME.'_slider_category']);
                        }
		

		
			if(isset($_POST[THEME_NAME.'_show_footer'])){
				update_option(THEME_NAME.'_show_footer',$_POST[THEME_NAME.'_show_footer']);
			}else{
				update_option(THEME_NAME.'_show_footer',0);
			}
			if(isset($_POST[THEME_NAME.'_show_twitter'])){
				update_option(THEME_NAME.'_show_twitter',$_POST[THEME_NAME.'_show_twitter']);
			}else{
				update_option(THEME_NAME.'_show_twitter',0);
			}
                        update_option(THEME_NAME."_themecolor",$_POST[THEME_NAME."_themecolor"]);
			update_option(THEME_NAME.'_footer_copyright', $copyright);
			update_option(THEME_NAME.'_footer_twitter', $footer_twitter);
			update_option(THEME_NAME.'_footer_facebook', $footer_facebook);
			update_option(THEME_NAME.'_email_subject',$_POST['email_subject']);
			
			?>
			<script type="text/javascript">
			jQuery(document).ready(function() {
				
			 jQuery('#container span').hide();
				jQuery('#site-title').show();
				jQuery('.button').show();
				jQuery('.show').show();
				jQuery('.main').show();
				jQuery('.mainmenu').show();
				jQuery('.mainshow').css('border-bottom','1px solid #888888');
				jQuery(document).start();
			
			 
			});
			</script>
			<?php
		} 
		if(isset($_POST['save_advert'])){
			
			
			
				update_option(THEME_NAME.'_adv_banner_img_1',  $_POST[THEME_NAME.'_adv_banner_img_1']);
				update_option(THEME_NAME.'_adv_banner_link_1', $_POST[THEME_NAME.'_adv_banner_link_1']);
				
				update_option(THEME_NAME.'_adv_banner_img_2',  $_POST[THEME_NAME.'_adv_banner_img_2']);
				update_option(THEME_NAME.'_adv_banner_link_2', $_POST[THEME_NAME.'_adv_banner_link_2']);
				
				update_option(THEME_NAME.'_adv_banner_img_3',  $_POST[THEME_NAME.'_adv_banner_img_3']);
				update_option(THEME_NAME.'_adv_banner_link_3', $_POST[THEME_NAME.'_adv_banner_link_3']);
				
				update_option(THEME_NAME.'_adv_banner_img_4',  $_POST[THEME_NAME.'_adv_banner_img_4']);
				update_option(THEME_NAME.'_adv_banner_link_4', $_POST[THEME_NAME.'_adv_banner_link_4']);

					?>
			<script type="text/javascript">
			jQuery(document).ready(function() {
			 jQuery('#container span').hide();
				jQuery('#site-title').show();
				jQuery('.button').show();
				jQuery('.show').show();
				jQuery('.advertising').show();
				jQuery('.mainmenu').show();
				jQuery('.advertshow').css('border-bottom','1px solid #888888');
				jQuery(document).start();
			});
			</script>
			<?php
			
		}
		if(isset($_POST['save_blog'])) {



                        update_option(THEME_NAME.'_blog_include_category',  array($_POST['categories_id_blog']));

			
			?>
			<script type="text/javascript">
			jQuery(document).ready(function() {
			 jQuery('#container span').hide();
				jQuery('#site-title').show();
				jQuery('.button').show();
				jQuery('.show').show();
				jQuery('.blog').show();
				jQuery('.mainmenu').show();
				jQuery('.blogshow').css('border-bottom','1px solid #888888');
				jQuery(document).start();
			});
			</script>
			<?php
		
		}
		if(isset($_POST['save_portfolio'])) {
                    if(!isset($_POST['categories_id_portfolio'])){
                        update_option(THEME_NAME.'_portfolio_include_category', '');
                    };
			if(isset($_POST['categories_id_portfolio'])){
				update_option(THEME_NAME.'_portfolio_include_category',  array($_POST['categories_id_portfolio']));
			}
			if(isset($_POST[THEME_NAME.'_show_without_images_portfolio'])){
				update_option(THEME_NAME.'_show_without_images_portfolio', $_POST[THEME_NAME.'_show_without_images_portfolio']);
			}else{
                            update_option(THEME_NAME.'_show_without_images_portfolio', '');
                        }
			if(isset($_POST[THEME_NAME.'_number_of_images_portfolio'])){
				update_option(THEME_NAME.'_number_of_images_portfolio', $_POST[THEME_NAME.'_number_of_images_portfolio']);
			}
			if(isset($_POST[THEME_NAME.'_number_of_images_gallery'])){
				update_option(THEME_NAME.'_number_of_images_gallery', $_POST[THEME_NAME.'_number_of_images_gallery']);
			}
			if(isset($_POST[THEME_NAME.'__gallery_include_category'])){
				update_option(THEME_NAME.'__gallery_include_category', $_POST[THEME_NAME.'__gallery_include_category']);
			}
			?>
			<script type="text/javascript">
			jQuery(document).ready(function() {
			 jQuery('#container span').hide();
				jQuery('#site-title').show();
				jQuery('.button').show();
				jQuery('.show').show();
				jQuery('.portfolio').show();
				jQuery('.mainmenu').show();
				jQuery('.portfolioshow').css('border-bottom','1px solid #888888');
				jQuery(document).start();
			});
			</script>
			<?php
		}
		
		

	if(isset($_POST['save_front'])) {
		
		if(isset($_POST[THEME_NAME.'_slider_showonfront'])){
			update_option(THEME_NAME.'_slider_showonfront',$_POST[THEME_NAME.'_slider_showonfront']);
		}else{
			update_option(THEME_NAME.'_slider_showonfront','0');		
		}
                if(isset($_POST[THEME_NAME.'_slider_category'])) {
                    update_option(THEME_NAME.'_slider_category',$_POST[THEME_NAME.'_slider_category']);
                }else {
                    update_option(THEME_NAME.'_slider_category','0');
                }
		update_option(THEME_NAME.'_custom_menu_button', $_POST[THEME_NAME.'_custom_menu_button']);
		update_option(THEME_NAME.'_custom_menu_button_url', $_POST[THEME_NAME.'_custom_menu_button_url']);
		update_option(THEME_NAME.'_custom_menu_button_text', $_POST[THEME_NAME.'_custom_menu_button_text']);

                    update_option(THEME_NAME.'_fp_content_category', array($_POST['categories_id_front']));


		
		?>
		<script type="text/javascript">
		jQuery(document).ready(function() {
			 jQuery('#container span').hide();
				jQuery('#site-title').show();
				jQuery('.button').show();
				jQuery('.show').show();
				jQuery('.front').show();
				jQuery('.mainmenu').show();
				jQuery('.frontshow').css('border-bottom','1px solid #888888');
				jQuery(document).start();
		});
		</script>
		<?php
	}
	
		if(!$_POST){?>
		<script type="text/javascript">
		jQuery(document).ready(function() {
			 jQuery('#container span').hide();
				jQuery('#site-title').show();
				jQuery('.button').show();
				jQuery('.show').show();
				jQuery('.main').show();
				jQuery('.mainmenu').show();
				jQuery('.menu').hide();
				jQuery('.mainshow').css('border-bottom','1px solid #888888');
				jQuery(document).start();
		});
		</script>
		<?php } ?>
		
		
	


<form method="POST" action="">
	
		<div id="header">

			<div class="theme"><?php echo THEME_NAME; ?> theme</div>
			<div class="theme-adminitration">Theme Administration</div>
			<div class="theme-version">Theme Version 1.00</div>
		<ul id="mainmenu" class="mainmenu">
		 <li class="mainshow normal"><?php echo THEME_NAME; ?></li>
		 <li class="frontshow normal">Frontpage</li>
		 <li class="blogshow normal">Blog</li>
		 <li class="portfolioshow normal">Menus and Gallery</li>
		 <li class="advertshow normal">Advertising</li>
		 <li class="testimonialshow normal">Testimonials</li>
		
		</ul>
		
		</div> <!--close header-->
		<div id="container">
		
		
		<script type="text/javascript">
		jQuery('.normal').click(
			function(){
				jQuery('.normal').css('border','none');
			}
		);
		
		
		
		
		
		jQuery('.frontshow').click(
			function(){
			 jQuery('#container span').hide();
				jQuery('#site-title').show();
				jQuery('.button').show();
				jQuery('.show').show();
				jQuery('.front').show();
				jQuery('.frontshow').css('border-bottom','1px solid #888888');
				jQuery(document).start();
			}
		)
		jQuery('.sidebarshow').click(
			function(){
			 jQuery('#container span').hide();
				jQuery('#site-title').show();
				jQuery('.button').show();
				jQuery('.show').show();
				jQuery('.sidebar').show();
				jQuery('.sidebarshow').css('border-bottom','1px solid #888888');
				jQuery(document).start();
			}
		)
	jQuery('.testimonialshow').click(
			function(){
			 jQuery('#container span').hide();
				jQuery('#site-title').show();
				jQuery('.button').show();
				jQuery('.show').show();
				jQuery('.testimonial').show();
				jQuery('.testimonialshow').css('border-bottom','1px solid #888888');
				jQuery(document).start();
			}
		)
		jQuery('.mainshow').click(
			function(){
			 jQuery('#container span').hide();
				jQuery('#site-title').show();
				jQuery('.button').show();
				jQuery('.show').show();
				jQuery('.mainshow').css('border-bottom','1px solid #888888');
				jQuery('.main').show();
				jQuery(document).start();
			}
		)
		jQuery('.blogshow').click(
			function(){
			 jQuery('#container span').hide();
				jQuery('#site-title').show();
				jQuery('.button').show();
				jQuery('.show').show();
				jQuery('.blogshow').css('border-bottom','1px solid #888888');
				jQuery('.blog').show();
				jQuery(document).start();
			}
		)
		jQuery('.portfolioshow').click(
			function(){
			 jQuery('#container span').hide();
				jQuery('#site-title').show();
				jQuery('.button').show();
				jQuery('.show').show();
				jQuery('.portfolioshow').css('border-bottom','1px solid #888888');
				jQuery('.portfolio').show();
				jQuery(document).start();
			}
		)
		
		jQuery('.advertshow').click(
			function(){
			 jQuery('#container span').hide();
				jQuery('#site-title').show();
				jQuery('.button').show();
				jQuery('.show').show();
				jQuery('.advertshow').css('border-bottom','1px solid #888888');
				jQuery('.advertising').show();
				jQuery(document).start();
			}
		)
		jQuery(document).ready(function() {
		jQuery('#site-title').show();
		jQuery('.button').show();
		jQuery('.show').show();
		
		});
		</script>
		
		
<span class="main">
		<div id="app_title_save"><input type="submit" name="save" id="save" value="Save" class="button" ></div><!--close app_title_save-->
                <div id="app_title">Theme Color</div> <!--close app_title-->
		<div id="content">
			<div class="left_content" style="width:97%;padding:20px 0 20px 10px">
			<?php
				$selected = get_option(THEME_NAME."_themecolor");

				$array = array('dark' => 'dark.png', 'red'=> 'red.png','orange' => 'orange.png','lightblue' => 'light_blue.png','green'=>'green.png','brown'=>'brown.png');

				foreach ($array as $x => $a){

					echo "<div class='themecolor'><input type='radio' name='".THEME_NAME."_themecolor' value='".$x."'";
					if($selected == $x){ echo ' checked="checked" ';}
					echo "><div class='screen-".$x."'></div></div>";

				}


			?>

			</div> <!--close content-->
                </div> <!--close content-->

		
                
		
		<div id="app_title">Logo</div> <!--close app_title-->
		<div id="content">
			<div class="left_content">
			
					<?php
						$logo = get_option(THEME_NAME.'_logo'); if(empty($logo)) {$logo = GD_THEME_DIR."/images/logo.png";}
					?>
					
					<input type="text" value="<?php echo $logo;?>" name="<?php echo THEME_NAME.'_logo';?>"  style="width:100px;"  class="postbox small"/>
	
					<span id="<?php echo THEME_NAME.'_logo';?>" class="button upload gd_upload logoupload show">Upload Image</span>
					<span class="button gd_remove" id="remove_<?php echo THEME_NAME.'_logo';?>">Remove Image</span>							
					<div class="gd_image_preview_holder">
						<img src="<?php echo $logo;?>"/>
					</div>
			</div> <!--close content-->
			<div class="right_content"> Upload Your logo or paste logo url</div><!-- close right_content-->
		</div> <!--close content-->
	
		
		<div id="app_title">Favicon</div><!--close app_title-->
		<div id="content">
			<div class="left_content">
				<?php $favicon = get_option(THEME_NAME.'_favicon'); if(empty($favicon)) {$favicon = GD_THEME_DIR."/images/favicon.png";}?>
				<input type="text" value="<?php echo $favicon;?>" name="<?php echo THEME_NAME ?>_favicon" style="width:100px;" class="postbox small"/>
				<span id="<?php echo THEME_NAME ?>_favicon" class="button upload gd_upload faviconupload show ">Upload Image</span>
				<?php 
				$check = get_option(THEME_NAME.'_favicon');
				?>
				<span class="button gd_remove" id="remove_<?php echo THEME_NAME ?>_favicon">Remove Image</span>									
				
			
			<div class="gd_image_preview_holder">
					<img src="<?php echo $favicon;?>"/>
				</div>		
			</div>
			<div class="right_content"> Upload Your favicon or paste favicon url (16x16px)</div>
		</div>
		<div id="app_subtitle">Email Subject</div>
		<div id="content">
			<div class="left_content">
				<div>Name of email you will get trought your contact form:</div>
				<?php $email_subject = get_option(THEME_NAME.'_email_subject');
				if(empty($email_subject)){
					$email_subject = 'Contact from '.THEME_NAME.' theme';
					update_option(THEME_NAME.'_email_subject',$email_subject);
				}
				?>
				<input type="text" id="" name="email_subject" class="postbox" value="<?php echo $email_subject;?>" />
				
			</div>
			<div class="right_content">This is Email Subject for sending email trought your Contact form to your admin email</div>
		</div>
			
		<div id="app_title">Footer</div>
		
		<div id="content">
			<div class="left_content">
			
				<?php 
				$copyright = get_option(THEME_NAME.'_footer_copyright');
				
				
				$search  = array('\"', "\'" ,'<','>','"');
			$replace = array('"', "'",'&lt;','&gt;',"'"); 
			$copyright = str_replace($search ,$replace ,$copyright);
		
				if(empty($copyright)) { $copyright = "<h3>WordPress theme by <a href='http://www.themesaholic.com'>Themesaholic/a>.</h3><p>&#169; 2011 Delicioso. All Rights Reserved.</p>";}?>
				<input type="text" id="" name="footer_copyright" class="postbox" value="<?php echo $copyright;?>" />
				
			</div>
			<div class="right_content">Insert Your Copyright text</div>
		</div>
		<div id="app_subtitle">Twitter</div>
		<div id="content">
			<div class="left_content">
			
				<div>Your Twitter account name:</div>
				<?php $twitter = get_option(THEME_NAME.'_footer_twitter');?>
				<input type="text" id="" name="footer_twitter" class="postbox" value="<?php echo $twitter;?>" />
				
			</div>
			<div class="right_content">Insert account name. <b>Example: "themesaholic"</b> (If you leave field empty the twitter icon will be removed from footer)</div>
		</div>
		<div id="app_subtitle">Facebook</div>
		<div id="content">
			<div class="left_content">
				<div>Link to your Facebook page:</div>
				<?php $facebook = get_option(THEME_NAME.'_footer_facebook');?>
				<input type="text" id="" name="footer_facebook" class="postbox" value="<?php echo $facebook;?>" />
				
			</div>
			<div class="right_content">Insert link to your Facebook page. <b>Example: "http://www.facebook.com/themesaholic"</b> (If you leave field empty the facebook icon will be removed from footer)</div>
		</div>
		<div id="adminfooter">
			<div id="content">

						<input type="submit" name="save" id="save" value="Save" class="button">

				<div id="right_content">
				</div>
			</div>
		</div>

</span>
                    		</form>
<span class="loader" style="display:none;"></span>
<span class="front">
			
	   		<div id="app_title_save"><input type="submit" name="save_front" id="save" value="Save" class="button" ></div><!--close app_title_save-->
	   		
                      <div id="app_title">Slideshow options</div>
			<div id="content">
			<div class="left_content">

				<div>Category</div>
				<?php


				$cat = get_option(THEME_NAME.'_slider_category');
 				$selected_category = $cat;

				$args = array(
				    'show_option_all'    => '',
				    'show_option_none'   => '',
				    'orderby'            => 'ID',
				    'order'              => 'ASC',
				    'show_last_update'   => 0,
				    'show_count'         => 0,
				    'hide_empty'         => 1,
				    'child_of'           => 0,
				    'exclude'            => '',
				    'echo'               => 1,
				    'selected'           => $selected_category,
				    'hierarchical'       => 0,
				    'name'               => THEME_NAME.'_slider_category',
				    'id'                 => '',
				    'class'              => 'postform',
				    'depth'              => 0,
				    'tab_index'          => 0,
				    'taxonomy'           => 'category',
				    'hide_if_empty'      => false );

				     wp_dropdown_categories( $args );

				?>

				</div>
			<div class="right_content">Edit Your homepage slideshow options</div>

		</div>
				
			<div id="app_title">Front page posts</div>
					<div id="content">
						<div class="left_content">	
							<?php $categories = get_categories('orderby=name');
									$cheked_category = get_option(THEME_NAME.'_fp_content_category');
										foreach ($categories as $category_list ) { ?>																
											<p><input class="gd_super_check" type="checkbox" value="<?php echo $category_list->cat_ID;?>" name="categories_id_front[<?php echo $category_list->cat_ID;?>]" <?php if(!empty($cheked_category[0][$category_list->cat_ID])) { echo "checked";}?> > <?php echo $category_list->cat_name;?></p>
							<?php } ?>
						</div>
					<div class="right_content">You can select which categories to display as posts on front page (home)</div>
					
		</div>

                        		<div id="app_title">More info area</div>
			<div class="left_content">
				<?php
				$menubutton = get_option(THEME_NAME."_custom_menu_button");
				$menubuttonurl = get_option(THEME_NAME."_custom_menu_button_url");
				$menubuttontext= get_option(THEME_NAME."_custom_menu_button_text");
				?>

				<label style="width:70px;text-align:right;float:left;clear:both;margin: 20px 5px 0 0;cursor: auto;">Text:</label>
				<textarea style="float:left;margin: 20px 0;width: 400px;height: 120px;" name="<?php echo THEME_NAME; ?>_custom_menu_button_text"><?php echo $menubuttontext;?></textarea>

				<label style="width:70px;text-align:right;float:left;clear:both;margin: 20px 5px 0 0;cursor: auto;">Name for button:</label>
				<textarea style="float:left;margin: 20px 0;width: 400px;height: 30px;" name="<?php echo THEME_NAME; ?>_custom_menu_button"><?php echo $menubutton;?></textarea>

				<label style="width:70px;text-align:right;float:left;clear:both;margin: 20px 5px 0 0;cursor: auto;">Url for button:</label>
				<textarea style="float:left;margin: 20px 0;width: 400px;height: 30px;" name="<?php echo THEME_NAME; ?>_custom_menu_button_url"><?php echo $menubuttonurl;?></textarea>


			</div>

		<div class="right_content">Edit text and button for more info area.</div>	
		<div id="adminfooter">
			<div id="content">


					<input type="submit" name="save_front" id="save" value="Save" class="button">

				<div id="right_content">
				</div>
			</div>
		</div>						
		</form>
</span>
<div class="spanloader">
</div>


<span class="blog">
	   		<div id="app_title_save"><input type="submit" name="save_blog" id="save" value="Save" class="button" ></div><!--close app_title_save-->
				<div id="app_title">Blog Categories</div>
					<div id="content">
						<div class="left_content">	
							<?php $categories = get_categories('orderby=name');
									$cheked_category = get_option(THEME_NAME.'_blog_include_category');
										foreach ($categories as $category_list ) { ?>																
											<p><input class="gd_super_check" type="checkbox" value="<?php echo $category_list->cat_ID;?>" name="categories_id_blog[<?php echo $category_list->cat_ID;?>]" <?php if(!empty($cheked_category[0][$category_list->cat_ID])) { echo "checked";}?> > <?php echo $category_list->cat_name;?></p>
							<?php } ?>
						</div>
					<div class="right_content">You can select which categories to display on blog page</div>
					</div>
		<div id="adminfooter">
			<div id="content">


					<input type="submit" name="save_blog" id="save" value="Save" class="button">

				<div id="right_content">
				</div>
			</div>
		</div>						
		</form>
</span>

<span class="portfolio">
	   		<div id="app_title_save"><input type="submit" name="save_portfolio" id="save" value="Save" class="button" ></div><!--close app_title_save-->
				<div id="app_title">Menus Categories</div>
					<div id="content">
						<div class="left_content">	
							<?php $categories = get_categories('orderby=name');
									$cheked_category = get_option(THEME_NAME.'_portfolio_include_category');
										foreach ($categories as $category_list ) { ?>																
											<p><input class="gd_super_check" type="checkbox" value="<?php echo $category_list->cat_ID;?>" name="categories_id_portfolio[<?php echo $category_list->cat_ID;?>]" <?php if(!empty($cheked_category[0][$category_list->cat_ID])) { echo "checked";}?> > <?php echo $category_list->cat_name;?></p>
							<?php } ?>
						</div>
					<div class="right_content">You can select which categories to display on Portfolio page</div>
				</div>

                        <div id="app_title">Gallery Category</div>
                                <div id="content">
			<div class="left_content">
				<div>Category</div>
				<?php
				$cat1= get_option(THEME_NAME.'__gallery_include_category');
 				$selected_category1 = $cat1;

				$args1 = array(
				    'show_option_all'    => '',
				    'show_option_none'   => '',
				    'orderby'            => 'ID',
				    'order'              => 'ASC',
				    'show_last_update'   => 0,
				    'show_count'         => 0,
				    'hide_empty'         => 1,
				    'child_of'           => 0,
				    'exclude'            => '',
				    'echo'               => 1,
				    'selected'           => $selected_category1,
				    'hierarchical'       => 0,
				    'name'               =>THEME_NAME.'__gallery_include_category',
				    'id'                 => '',
				    'class'              => 'postform',
				    'depth'              => 0,
				    'tab_index'          => 0,
				    'taxonomy'           => 'category',
				    'hide_if_empty'      => false );

				     wp_dropdown_categories( $args1 );

				?>


			</div>
			<div class="right_content">Chose a category for your gallery</div>
		</div>

		<div id="adminfooter">
			<div id="content">


					<input type="submit" name="save_portfolio" id="save" value="Save" class="button">

				<div id="right_content">
				</div>
			</div>
		</div>						
		</form>
</span>
<span class="advertising">
	   		<div id="app_title_save"><input type="submit" name="save_advert" id="save" value="Save" class="button" ></div><!--close app_title_save-->
			<div id="app_title">Advertising banners</div>
			<div id="content">		
					<?php $def_img = get_template_directory_uri()."/images/adv_105x105.gif" ; $def_link = home_url();;?>
			<div id="app_title">Banner 1</div>
			
				<div class="left_content">	
				
					<?php $banner_1_img = get_option(THEME_NAME.'_adv_banner_img_1'); if(empty($banner_1_img)) {$banner_1_img=$def_img;}?>
					<div>Banner link</div>
					<input type="text" id="<?php echo THEME_NAME; ?>_adv_banner_img_1" name="<?php echo THEME_NAME; ?>_adv_banner_img_1" class="postbox" value="<?php echo $banner_1_img;?>" />
					
					<?php $banner_1_link = get_option(THEME_NAME.'_adv_banner_link_1'); if(empty($banner_1_link)) {$banner_1_link=$def_link;}?>
					<div>Link</div>
					<input type="text" id="<?php echo THEME_NAME; ?>_adv_banner_link_1" name="<?php echo THEME_NAME; ?>_adv_banner_link_1" class="postbox" value="<?php echo $banner_1_link;?>" />
					
				</div>
				<div class="right_content">
					Insert Your image URL #1
					<br />	<br />	<br />	<br />
					Insert Your target URL #1
				</div>
			
			<div id="app_title">Banner 2</div>
				<div class="left_content">	
						
					<?php $banner_2_img = get_option(THEME_NAME.'_adv_banner_img_2'); if(empty($banner_2_img)) {$banner_2_img=$def_img;}?>
					<div>Banner link</div>
					<input type="text" id="<?php echo THEME_NAME; ?>_adv_banner_img_2" name="<?php echo THEME_NAME; ?>_adv_banner_img_2" class="postbox" value="<?php echo $banner_2_img;?>" />
					
					<?php $banner_2_link = get_option(THEME_NAME.'_adv_banner_link_2'); if(empty($banner_2_link)) {$banner_2_link=$def_link;}?>
					<div>Link</div>
					<input type="text" id="<?php echo THEME_NAME; ?>_adv_banner_link_2" name="<?php echo THEME_NAME; ?>_adv_banner_link_2" class="postbox" value="<?php echo $banner_2_link;?>" />
					
				</div>
				<div class="right_content">
					Insert Your image URL #2
					<br />	<br />	<br />	<br />
					Insert Your target URL #2
				</div>
			<div id="app_title">Banner 3</div>
			<div id="content">
				<div class="left_content">	
					<?php $banner_3_img = get_option(THEME_NAME.'_adv_banner_img_3'); if(empty($banner_3_img)) {$banner_3_img=$def_img;}?>
					<div>Banner link</div>
					<input type="text" id="<?php echo THEME_NAME; ?>_adv_banner_img_3" name="<?php echo THEME_NAME; ?>_adv_banner_img_3" class="postbox" value="<?php echo $banner_3_img;?>" />
					
					<?php $banner_3_link = get_option(THEME_NAME.'_adv_banner_link_3'); if(empty($banner_3_link)) {$banner_3_link=$def_link;}?>
					<div>Link</div>
					<input type="text" id="<?php echo THEME_NAME; ?>_adv_banner_link_3" name="<?php echo THEME_NAME; ?>_adv_banner_link_3" class="postbox" value="<?php echo $banner_3_link;?>" />
				</div>
				<div class="right_content">
						Insert Your image URL #3
						<br />	<br />	<br />	<br />
						Insert Your target URL #3
					</div>
			</div> <!--close content-->
			
			<div id="app_title">Banner 4</div>
				<div class="left_content">	
					<?php $banner_4_img = get_option(THEME_NAME.'_adv_banner_img_4'); if(empty($banner_4_img)) {$banner_4_img=$def_img;}?>
					<div>Banner link</div>
					<input type="text" id="<?php echo THEME_NAME; ?>_adv_banner_img_4" name="<?php echo THEME_NAME; ?>_adv_banner_img_4" class="postbox" value="<?php echo $banner_4_img;?>" />
					
					<?php $banner_4_link = get_option(THEME_NAME.'_adv_banner_link_4'); if(empty($banner_4_link)) {$banner_4_link=$def_link;}?>
					<div>Link</div>
					<input type="text" id="<?php echo THEME_NAME; ?>_adv_banner_link_4" name="<?php echo THEME_NAME; ?>_adv_banner_link_4" class="postbox" value="<?php echo $banner_4_link;?>" />
				</div>
				<div class="right_content">
					Insert Your image URL #4
					<br />	<br />	<br />	<br />
					Insert Your target URL #4
				</div>
			</div>
		<div id="adminfooter">
			<div id="content">


					<input type="submit" name="save_advert" id="save" value="Save" class="button">

				<div id="right_content">
				</div>
			</div>
		</div>						
	
</span>


<span class="testimonial">
	   		<div id="app_title_save"><input type="submit" name="save_testimonial" id="save" value="Add" class="button" ></div><!--close app_title_save-->
			<div id="app_title">Testimonials</div>
			<div id="content">



				<div class="left_content">

					New testimonial:<br/>
					<label style="width:70px;text-align:right;float:left;clear:both">Name:</label><input type="text" style="float:left;" name='newtestimonial'><br/><br/>
					<label style="width:70px;text-align:right;float:left;clear:both">Position:</label><input type="text" style="float:left;" name='newtestimonial_undertext'><br/><br/>
					<label style="width:70px;text-align:right;float:left;clear:both">Text:</label><textarea style="float:left;" name="newtestimonial_text"></textarea>


<?php

$testimonialimg = get_option(THEME_NAME.'_testimonialimg'); if(empty($testimonialimg)) {$testimonialimg = GD_THEME_DIR."";}else{
?>
<script type="text/javascript">
jQuery(document).ready(function() {
		jQuery('.logoupload').hide();
});
</script>
<?php
}?>
<br/><br/>


					<?php
					//if testimonial input then not show default value

							global $wpdb;
                                                        $table_name = $wpdb->prefix . THEME_NAME."_testimonials";

							$testimonialsdb = $wpdb->get_results( 'SELECT * from '.$table_name);

							$current_testimonial = $testimonialsdb;


							if(!empty($current_testimonial))
							{
						?>
							<ul id="current_testimonial" class="rm_list" style="clear:both;margin:40px 0 0 0;">

						<?php


							foreach($current_testimonial as $x => $testimonial)
							{

						?>

								<li id="hide_<?php echo $testimonial->id?>"><?php echo $testimonial->name?> ( <a class="testimonial_del" rel="<?php echo $testimonial->id?>">Delete</a> )</li>

						<?php
							}
						?>

							</ul>

						<?php
							}

						?>

				</div>
				<div class="ajaxcallx" ></div>
				<script type="text/javascript">
				jQuery(document).ready(function() {
					jQuery('.testimonial_del').live('click',function(){
						var x = jQuery(this).attr('rel');
						jQuery('#hide_'+x).hide();

						jQuery.post('<?php echo get_template_directory_uri().'/themesaholic/del-testimonial.php?deltestimonial='; ?>'+x,function(){

						});

					});
				});
				</script>
				<div class="right_content">

				</div>

			</div>
		<div id="adminfooter">
			<div id="content">


					<input type="submit" name="save_testimonial" id="save" value="Add" class="button">

				<div id="right_content">
				</div>
			</div>
		</div>

</span>


						
	</form>

   
  
   
 
    
   
<?php }

 
 ?>