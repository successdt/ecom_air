<?php 

	$key = GD_THEME;


	$meta_boxes_page = array(
			
	
			
		
            
	   		
		"title" => array(
		"name" => "seo_title",
		"title" => "SEO title?",
		"type" => "text",
		"description" => "Page title"),
	
		"description" => array(
		"name" => "seo_description",
		"title" => "Page description",
		"type" => "text",
		"description" => "Set page description"),
		
		"keywords" => array(
		"name" => "seo_keywords",
		"title" => "Page keywords",
		"type" => "text",
		"description" => "Set page keywords"),
		
		"headline" => array(
		"name" => "page_headline",
		"title" => "Page headline",
		"type" => "text",
		"description" => "Set page headline"),

		"headline_link" => array(
		"name" => "page_headline_link",
		"title" => "Page headline link",
		"type" => "text",
		"description" => "Set link for page headline"),
		
	);
	
	
	
	$meta_boxes_post = array(
	
            
		"title" => array(
		"name" => "seo_title",
		"title" => "SEO title?",
		"type" => "text",
		"description" => "Page title"),
	
		"description" => array(
		"name" => "seo_description",
		"title" => "Page description",
		"type" => "text",
		"description" => "Set page description"),
		
		"keywords" => array(
		"name" => "seo_keywords",
		"title" => "Page keywords",
		"type" => "text",
		"description" => "Set page keywords"),

                "price" => array(
		"name" => "item_price",
		"title" => "Item price",
		"type" => "text",
		"description" => "Set price for this item"),

		"headline" => array(
		"name" => "post_headline",
		"title" => "Post headline",
		"type" => "text",
		"description" => "Set post headline"),

		"headline_link" => array(
		"name" => "post_headline_link",
		"title" => "Post headline link",
		"type" => "text",
		"description" => "Set link for post headline"),


	);




	//add meta box
	function create_meta_box() {
		global $key;
	
		if( function_exists( 'add_meta_box' ) ) {
			add_meta_box( 'meta-boxes-post', ucfirst( $key ) . ' Options', 'display_meta_box_post', 'post', 'normal', 'high' );
			
			add_meta_box( 'meta-boxes-page', ucfirst( $key ) . ' Options', 'display_meta_box_page', 'page', 'normal', 'high' ); 
		}
	
	}
	 
	 

	function display_meta_box_post(){
		global $meta_boxes_post;
		display_meta_box($meta_boxes_post);
	}
	
	
	function display_meta_box_page(){
		global $meta_boxes_page;
		display_meta_box($meta_boxes_page);
	}
	

	
	
	function display_meta_box($meta_boxes) {
		global $post, $key; ?>
	
		<div class="form-wrap">
	
			<?php wp_nonce_field( plugin_basename( __FILE__ ), $key . '_wpnonce', false, true );
		
				foreach($meta_boxes as $meta_box) {
				
					$data = get_post_meta($post->ID, $key, true); ?>
			
					<div class="form-field form-required">
					<label for="<?php echo $meta_box[ 'name' ]; ?>"><strong><?php echo $meta_box[ 'title' ]; ?></strong></label>
					
					
					<?php if($meta_box['type']=='category'):?>
						<?php if(isset($data[$meta_box['name']])){ $val = $data[$meta_box['name']];}else{$val = "";} ?>
						<br/>
						Use this Category<input style="float:left;width:10px;position: relative;top: -2px;" type="checkbox" name="<?php echo $meta_box[ 'name' ].'_use'; ?>" value="1" <?php if(isset($data[$meta_box['name'].'_use'])){if ($data[$meta_box['name'].'_use'] == 1){ echo ' checked="checked" ';} }?> >
						<br/>
					<?php	
						
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
				    'selected'           => $val,
				    'hierarchical'       => 0, 
				    'name'               => $meta_box['name'],
				    'id'                 => '',
				    'class'              => 'postform',
				    'depth'              => 0,
				    'tab_index'          => 0,
				    'taxonomy'           => 'category',
				    'hide_if_empty'      => false );  
				    
				     wp_dropdown_categories( $args );  
				     ?>
					<?php endif; ?>
					
					<?php if($meta_box['type']=="theme") :?>
						<?php if(isset($data[$meta_box['name']])){ $val = $data[$meta_box['name']];}else{$val = "";} ?>
						<?php 
							
							if(!empty($setupnames) && !is_array()){
								$setupnames = unserialize($setupnames);
							}
							?>
						<br/>
						Use This Setup<input style="float:left;width:10px;position: relative;top: -2px;" type="checkbox" name="<?php echo $meta_box[ 'name' ].'_use'; ?>" value="1" <?php if(isset($data[$meta_box['name'].'_use'])){if ($data[$meta_box['name'].'_use'] == 1){ echo ' checked="checked" ';} }?> >
						<br/>
					<select name="<?php echo $meta_box['name']; ?>" id="<?php echo $meta_box['name']; ?>" >  
						<option>Default</option>
					   <?php
						$setupnames = get_option(THEME_NAME."-setup-names");
						$setupnames = unserialize($setupnames);
					   foreach ($setupnames as $option) {  
					        echo'<option';  
					      if(isset($data[$meta_box['name']])){
					       if ( $data[$meta_box['name']] == $option) {  
					           echo ' selected="selected"';  
					        } }
					     
					       echo '>'.$option.'</option>';  
					   }  
					   echo '</select>'; 
						?>
						
					<?php endif; ?>
					<?php if($meta_box['type']=="mainslider") :?>
						<?php if(isset($data[$meta_box['name']])){ $val = $data[$meta_box['name'].'_category'];}else{$val = "";} ?>
						
						<br/>
						Show Slider on this page<input style="float:left;width:10px;position: relative;top: -2px;" type="checkbox" name="<?php echo $meta_box[ 'name' ].'_use'; ?>" value="1" <?php if(isset($data[$meta_box['name'].'_use'])){if ($data[$meta_box['name'].'_use'] == 1){ echo ' checked="checked" ';} }?> >
						<br/><br/>
						Slider:
					<select name="<?php echo $meta_box['name'].'_type_of_slider'; ?>" id="<?php echo $meta_box['name'].'_type_of_slider'; ?>" >  
					    <option value="tkboubles" <?php  if(isset($data[$meta_box['name'].'_type_of_slider'])){
					       if ( $data[$meta_box['name'].'_type_of_slider'] == 'tkboubles') {  
					           echo ' selected="selected"';  
					        } } ?>>Themesaholic Shapes Slider
					  	<option value="NivoSlider" <?php  if(isset($data[$meta_box['name'].'_type_of_slider'])){
					       if ( $data[$meta_box['name'].'_type_of_slider'] == 'NivoSlider') {  
					           echo ' selected="selected"';  
					        } } ?>>Nivo Slider
						
					</select>
					<br/>
					Category:
						<?php	
						
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
				    'selected'           => $val,
				    'hierarchical'       => 0, 
				    'name'               => $meta_box['name'].'_category',
				    'id'                 => '',
				    'class'              => 'postform',
				    'depth'              => 0,
				    'tab_index'          => 0,
				    'taxonomy'           => 'category',
				    'hide_if_empty'      => false );  
				    
				     wp_dropdown_categories( $args );  
				     ?>
						
				     <br/>
				     <div class="hider">
					Shape:
					<select name="<?php echo $meta_box['name']; ?>" id="<?php echo $meta_box['name']; ?>" >  
										
						<option value="circles" <?php  if(isset($data[$meta_box['name']])){
					       if ( $data[$meta_box['name']] == 'circles') {  
					           echo ' selected="selected"';  
					        } } ?>>Circles
					     <option value="rhomboids" <?php  if(isset($data[$meta_box['name']])){
					       if ( $data[$meta_box['name']] == 'rhomboids') {  
					           echo ' selected="selected"';  
					        } } ?>>Rhomboids
					     <option value="squares" <?php  if(isset($data[$meta_box['name']])){
					       if ( $data[$meta_box['name']] == 'squares') {  
					           echo ' selected="selected"';  
					        } } ?>>Squares
					     <option value="hexagons" <?php  if(isset($data[$meta_box['name']])){
					       if ( $data[$meta_box['name']] == 'hexagons') {  
					           echo ' selected="selected"';  
					        } } ?>>Hexagons
						
					</select>
					</div>
					<?php
					if(isset( $data[$meta_box['name'].'_type_of_slider'])){
                                            if ( $data[$meta_box['name'].'_type_of_slider'] == 'NivoSlider') {
                                                ?>
                                                <script type="text/javascript">
                                                    jQuery('.hider').hide();
                                                </script>
                                             <?php
                                            }
                                        
                                        }
					?>
                                        <script type="text/javascript">
                                                jQuery('#<?php echo $meta_box['name'].'_type_of_slider'; ?>').change(function(){
                                                        var type = jQuery(this).val();

                                                        if(type == "NivoSlider"){
                                                                jQuery('.hider').hide();
                                                        }else{
                                                                jQuery('.hider').show();	
                                                        }
                                                });
                                        </script>
					
					    
						
					<?php endif; ?>
					
					<?php if($meta_box['type']=="text") :?>
						<?php if(isset($data[$meta_box['name']])){ $val = $data[$meta_box['name']];}else{$val = "";} ?>
						<input type="text" name="<?php echo $meta_box[ 'name' ]; ?>" value="<?php echo htmlspecialchars( $val ); ?>" />
					<?php endif; ?>
					
					<?php if($meta_box['type']=="textarea") :?>
					<?php if(isset($data[$meta_box['name']])){ $val = $data[$meta_box['name']];}else{$val = "";} ?>
						<textarea name="<?php echo $meta_box[ 'name' ]; ?>" ><?php echo htmlspecialchars( $val ); ?></textarea>
					<?php endif; ?>
					
					<?php if($meta_box['type']=="checkbox") :?>
					
						<br/>
						Show<input style="float:left;width:10px;" type="checkbox" name="<?php echo $meta_box[ 'name' ]; ?>" value="1" <?php if(isset($data[$meta_box['name']])){if ($data[$meta_box['name']] == 1){ echo ' checked="checked" ';} }?> >
					<?php endif; ?>
					
					<?php if($meta_box['type'] == "select") : ?>
					   	
						<select name="<?php echo $meta_box['name']; ?>" id="<?php echo $meta_box['name']; ?>" >  
						<option>Sidebar</option>
					   <?php
						$opt = get_option(THEME_NAME.'_sidebar');
						$opt = unserialize($opt);
					   foreach ($opt as $option) {  
					        echo'<option';  
					      if(isset($data[$meta_box['name']])){
					       if ( $data[$meta_box['name']] == $option) {  
					           echo ' selected="selected"';  
					        } }
					     
					       echo '>'.$option.'</option>';  
					   }  
					   echo '</select>';  
					   
					 endif; ?>
				
			<p><?php echo $meta_box[ 'description' ]; ?></p>
		</div>
		
		
		<?php } ?>
		
		</div>
	<?php
	}





	//save postmeta
	function save_meta_box( $post_id ) {
		
		global $post, $meta_boxes_post, $meta_boxes_post_images, $meta_boxes_post_room, $meta_boxes_page, $key;
		
			foreach( $meta_boxes_post as $meta_box ) {
				if(isset($_POST[ $meta_box[ 'name' ]])){
					$data[ $meta_box[ 'name' ] ] = $_POST[ $meta_box[ 'name' ] ];
				}
			}
			
							
			foreach($meta_boxes_page as $meta_box) {
				if(isset($_POST[ $meta_box[ 'name' ]])){
				$data[ $meta_box[ 'name' ] ] = $_POST[ $meta_box[ 'name' ] ];
				}
				if($meta_box['type'] == 'category' || $meta_box['type'] == 'theme' || $meta_box['type'] == 'mainslider'){
					if(isset($_POST[ $meta_box[ 'name' ].'_use' ])){
					$data[ $meta_box[ 'name' ].'_use' ] = $_POST[ $meta_box[ 'name' ].'_use' ];
					}
				}
				if($meta_box['type'] == 'mainslider'){
					if(isset($_POST[ $meta_box[ 'name' ].'_category' ])){
						$data[ $meta_box[ 'name' ].'_category' ] = $_POST[ $meta_box[ 'name' ].'_category' ];
					}
					if(isset($_POST[ $meta_box[ 'name' ].'_type_of_slider' ])){
						$data[ $meta_box[ 'name' ].'_type_of_slider' ] = $_POST[ $meta_box[ 'name' ].'_type_of_slider' ];
					}
				}
			}
			if(isset($_POST[ $key . '_wpnonce' ])){$wpnonce = $_POST[ $key . '_wpnonce' ];}else{$wpnonce="";}
			if ( !wp_verify_nonce( $wpnonce, plugin_basename(__FILE__) ) )
			return $post_id;
		
			if ( !current_user_can( 'edit_post', $post_id ))
			return $post_id;
		
			update_post_meta( $post_id, $key, $data );
			
		}
		
		
		add_action('admin_menu', 'create_meta_box');
		add_action('save_post', 'save_meta_box');
?>