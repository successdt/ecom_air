<?php
/*---------------------------------------------------------------------------------*/
/* Advertising widget */
/*---------------------------------------------------------------------------------*/
class App_Advertising extends WP_Widget {

	function App_Advertising() {
		$widget_ops = array('description' => 'Advertising Widget is a simple to use widget for showing 125x125px image banners in the sidebar of the your website. You only have to define the image banners and the target links in the theme administration panel and place widget in the sidebar.' );

		parent::WP_Widget(false, __(THEME_NAME.' - Advertising', THEME_NAME),$widget_ops);      
	}

	function widget($args, $instance) {  
		extract( $args );
		$title = $instance['title'];
		$number = $instance['number'];
		
		echo $before_widget;
	 	if ($title) { echo $before_title . $title . $after_title; } else {
		echo $before_title; ?>
		<?php _e('Advertising',THEME_NAME); ?>
      <?php echo $after_title; }?>
			
 			
	        <div class="adv_wrap">		
	        		<?php for($z=1; $z<=$number; $z++) { ?>
	
	        				<?php $img = get_option(THEME_NAME."_adv_banner_img_$z"); 
	        					        				?>
	        				<?php $link = get_option(THEME_NAME."_adv_banner_link_$z");?>
	        				<a href="<?php echo $link;?>" class="<?php if($z%2==0){echo "last";} ?>"><img src="<?php echo $img;?>" alt="<?php echo 'adv_'.$z;?>" class="adv_img" /></a>
	        				
	        		<?php }
	        		
	        		?>
	        		
	        </div>
        
        
        
	   <?php			
	   echo $after_widget;
   }

   function update($new_instance, $old_instance) {                
       return $new_instance;
   }

   function form($instance) {    
   	if(isset($instance['title'])){    
		$title = esc_attr($instance['title']);
   	}else{$title = "";}
   	if(isset($instance['number'])){
		$number = esc_attr($instance['number']);
   	}else{$number = "";}
		?>
			
			<p>
		   	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:',THEME_NAME); ?></label>
		  	 <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
			</p>
			
			
       	<p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of image banners:',THEME_NAME); ?></label>
            <select name="<?php echo $this->get_field_name('number'); ?>" class="widefat" id="<?php echo $this->get_field_id('number'); ?>">
                <?php for ( $i = 1; $i <= 4; $i += 1) { ?>
                <option value="<?php echo $i; ?>" <?php if($number == $i){ echo "selected='selected'";} ?>><?php echo $i; ?></option>
                <?php } ?>
            </select>
        </p>
		
		<?php
	}
} 

register_widget('App_Advertising');
?>