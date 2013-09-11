<?php
/*---------------------------------------------------------------------------------*/
/* testimonials */
/*---------------------------------------------------------------------------------*/

/* db instalation */

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
global  $newsletter_db_version;
$newsletter_db_version = "1.0";

function install_testimonials () {
   global $wpdb;
   global $testimonials_db_version;

   $table_name = $wpdb->prefix . THEME_NAME."_testimonials";
   if($wpdb->get_var("show tables like '$table_name'") != $table_name) {

      $sql = "CREATE TABLE " . $table_name . " (
	  id mediumint(9) NOT NULL AUTO_INCREMENT,
	  content text NOT NULL,
	  name text NOT NULL,
	  title text NOT NULL,
	  UNIQUE KEY id (id)
	);";

      get_template_part(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($sql);


      add_option(THEME_NAME."_db_version",  $testimonials_db_version);

   }
}
if (is_admin()) :
	install_testimonials();
	update_option('installed_testimonials','yes');
endif;



/* Widget */
class App_Testimonials extends WP_Widget {

   function App_Testimonials() {
	   $widget_ops = array('description' => 'Testimonials Widget shows the testimonials from section "Testimonials"' );
	   parent::WP_Widget(false, __('*'.THEME_NAME.' - Testimonials', THEME_NAME),$widget_ops);
   }

   function widget($args, $instance) {
		extract( $args );


		$title = $instance['title'];
		$under_title = $instance['under_title'];
		?>

		<?php echo $before_widget; ?>
		<?php if ($title) { echo $before_title . $title . $after_title; }else{
			echo $before_title . 'testimonials' . $after_title;
		}

		if(isset($before_undertitle)){
				echo $before_undertitle;
			}
			if(isset($instance['under_title'])){
				$undertitle = $instance['under_title'];
			}else{
				$undertitle = "Under Title";
			}
			if ($undertitle != ''){echo "<p style='display:block;clear:both;' class='undertitle'></p>";}
			if(isset($after_undertitle)){
				echo $after_undertitle;
			}
		$testimonials = get_option(THEME_NAME.'_testimonial');
		$testimonials = unserialize($testimonials);
		echo "<div class='testimonials_bg'>";
		$i = 1;
		echo "<div class='testimonials-holder'><p style='display:block;clear:both;' class='undertitle'></p>";
		if(!empty($testimonials)){
		foreach ($testimonials as $x => $y){
			echo "<div class='testimonial-all testimonial-".$i."'>";
			echo $y['testimonial_text'];
			echo "</div>";
			$i++;
		}
		}
		$i = 1;
		echo "</div>";
		echo "<div class='testimonials_navigation' rev='1'><div class='testimonials-left'></div><div class='testimonials-right'></div></div>";
		echo "</div><div class='testimonials_right'>";
		if(!empty($testimonials)){
		foreach ($testimonials as $x => $y){
			echo "<div class='testimonial-all testimonial-".$i."'>";
			echo "<div class='testimonial-name'>".$y['testimonial_name']."</div>";
			echo "<div class='testimonial-under'>".$y['testimonial_under']."</div>";
			echo "</div>";

			$i++;
		}}
		echo "</div>";
		$i--;
		echo "<div class='max-navigation' rev='".$i."'></div>";
		?>


      <?php
               global $wpdb;
               $testimonialsdb = $wpdb->get_results( 'SELECT * from '.$table_name);
               $testimonials = $testimonialsdb;
               if (!empty($testimonials)) {

               ?>


		<script type="text/javascript">
			$(document).ready(function(){
				jQuery('.group1').show();
				jQuery('#testimonials-holder').cycle({
					fx:     'fade',
					speed:   1000,
					timeout: 5000,
					next:   '#testimonials-holder',
					pause:   1
				});

                                jQuery('.footer_widget_holder #testimonials-holder').cycle({
					fx:     'fade',
					speed:   1000,
					timeout: 5000,
					next:   '.footer_widget_holder #testimonials-holder',
					pause:   1
				});
			});
		</script>


		<div id="testimonials-holder">

             <?php
               $i = 1;

               if(!empty($testimonials)){
               foreach ($testimonials as $testimonial){

                   echo '<div id="testimonials-holder'.$i.'"><div class="testemonial-title">';
                   echo substr($testimonial->name,0,20);
                   echo "</div>";
                   echo '<div class="testemonial-from">';
                   echo substr($testimonial->title,0,20);
                   echo '</div><div class="testemonial-bubble">
									<div class="testemonial-bubble-top"></div>
									<div class="testemonial-bubble-center">
										<div class="testimonial-content">'.string_limit_words($testimonial->content,40).'</div>
									</div>
									<div class="testemonial-bubble-bottom"></div>
								</div>
                   ';

                   echo "</div>";
                   ?>
                   <?php
                   $i++;

               } }

               ?>
           		<div class="clear-both"></div>
               </div><!-- TEXTIMONIALS --><?php } ?>

<div class="clear-both"></div>
		<?php echo $after_widget; ?>
    <?php

   }

   function update($new_instance, $old_instance) {
	   return $new_instance;
   }

   function form($instance) {
   	if(isset($instance['title'])){
		$title = esc_attr($instance['title']);
   	}else{
   		$title = "";
   	}
   	if(isset($instance['under_title'])){
		$under_title = esc_attr($instance['under_title']);
   	}else{
   		$under_title = "";
   	}

		?>
		<p>
		   <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:',THEME_NAME); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
		</p>

		<?php
	}
}

register_widget('App_testimonials');

?>