<?php
/*---------------------------------------------------------------------------------*/
/* Flickr widget */
/*---------------------------------------------------------------------------------*/
class App_flickr extends WP_Widget {

	function App_flickr() {
		$widget_ops = array('description' => 'Flickr Widget is a widget that can display up to 10 of your latest Flickr photos in the sidebar. You have ability to pick photos randomly or to show your latest photos.' );

		parent::WP_Widget(false, __(THEME_NAME.' - Flickr', THEME_NAME),$widget_ops);      
	}

	function widget($args, $instance) {  
		extract( $args );
		$id = $instance['id'];
		$number = $instance['number'];
		$type = $instance['type'];
		$sorting = $instance['sorting'];
	
		echo $before_widget;
		echo $before_title; ?>
		<?php _e('Flickr',THEME_NAME); ?>
        <?php echo $after_title; ?>
            
        <div class="wrap">
            
            <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number; ?>&amp;display=<?php echo $sorting; ?>&amp;&amp;layout=x&amp;source=<?php echo $type; ?>&amp;<?php echo $type; ?>=<?php echo $id; ?>&amp;size=s"></script>        
            
        </div>

	   <?php			
	   echo $after_widget;
   }

   function update($new_instance, $old_instance) {                
       return $new_instance;
   }

   function form($instance) {  
   	if(isset($instance['id'])){      
		$id = esc_attr($instance['id']);
   	}else{$id = "";}
   	if(isset($instance['number'])){
		$number = esc_attr($instance['number']);
   	}else{$number = "";}
   	if(isset($instance['type'])){
		$type = esc_attr($instance['type']);
   	}else{$type = "";}
   	if(isset($instance['sorting'])){
		$sorting = esc_attr($instance['sorting']);
   	}else{$sorting = "";}
		?>
        <p>
            <label for="<?php echo $this->get_field_id('id'); ?>"><?php _e('Flickr ID (<a href="http://www.idgettr.com">idGettr</a>):',THEME_NAME); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('id'); ?>" value="<?php echo $id; ?>" class="widefat" id="<?php echo $this->get_field_id('id'); ?>" />
        </p>
       	<p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of photos:',THEME_NAME); ?></label>
            <select name="<?php echo $this->get_field_name('number'); ?>" class="widefat" id="<?php echo $this->get_field_id('number'); ?>">
                <?php for ( $i = 1; $i <= 10; $i += 1) { ?>
                <option value="<?php echo $i; ?>" <?php if($number == $i){ echo "selected='selected'";} ?>><?php echo $i; ?></option>
                <?php } ?>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('type'); ?>"><?php _e('Type:',THEME_NAME); ?></label>
            <select name="<?php echo $this->get_field_name('type'); ?>" class="widefat" id="<?php echo $this->get_field_id('type'); ?>">
                <option value="user" <?php if($type == "user"){ echo "selected='selected'";} ?>><?php _e('User', THEME_NAME); ?></option>
                <option value="group" <?php if($type == "group"){ echo "selected='selected'";} ?>><?php _e('Group', THEME_NAME); ?></option>            
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('sorting'); ?>"><?php _e('Sorting:',THEME_NAME); ?></label>
            <select name="<?php echo $this->get_field_name('sorting'); ?>" class="widefat" id="<?php echo $this->get_field_id('sorting'); ?>">
                <option value="latest" <?php if($sorting == "latest"){ echo "selected='selected'";} ?>><?php _e('Latest', THEME_NAME); ?></option>
                <option value="random" <?php if($sorting == "random"){ echo "selected='selected'";} ?>><?php _e('Random', THEME_NAME); ?></option>            
            </select>
        </p>
		<?php
	}
} 

register_widget('App_flickr');
?>