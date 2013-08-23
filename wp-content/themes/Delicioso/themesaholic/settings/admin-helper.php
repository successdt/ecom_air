<?php

//Add admin styles/scripts:
add_action('admin_head', 'gd_admin_head');

function gd_admin_head(){
?>
<link rel='stylesheet' id='rm-admin-css' href='<?php echo GD_THEME_DIR; ?>/themesaholic/style/admin.css' type='text/css' media='all' />
<link rel='stylesheet' id='rm-admin-css' href='<?php echo GD_THEME_DIR; ?>/themesaholic/style/checkbox.css' type='text/css' media='all' />
<link rel='stylesheet' id='rm-admin-css' href='<?php echo GD_THEME_DIR; ?>/themesaholic/style/styling.css' type='text/css' media='all' />
<link rel='stylesheet' id='rm-admin-css' href='<?php echo GD_THEME_DIR; ?>/themesaholic/script/colorpicker/colorpicker.css' type='text/css' media='all' />


<script type="text/javascript" src="<?php echo GD_THEME_DIR; ?>/themesaholic/script/jquery.checkbox.min.js"></script>
<script type="text/javascript" src="<?php echo GD_THEME_DIR; ?>/themesaholic/script/ajaxupload.js"></script>
<script type="text/javascript" src="<?php echo GD_THEME_DIR; ?>/themesaholic/script/jquery.blockUI.js"></script>
<script type="text/javascript" src="<?php echo GD_THEME_DIR; ?>/themesaholic/script/colorpicker/colorpicker.js"></script>

<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery.fn.start = function() {
		  jQuery('.gd_super_check').checkbox({empty:'<?php echo GD_THEME_DIR; ?>/themesaholic/style/empty.png'});
				
			//Check if element exists
				jQuery.fn.exists = function(){return jQuery(this).length;}
		  
		  
		  //AJAX upload
			jQuery('.gd_upload').each(function(){
				
				var the_button=jQuery(this);
				var image_input=jQuery(this).prev();
				var image_id=jQuery(this).attr('id');
				
				new AjaxUpload(image_id, {
					  action: ajaxurl,
					  name: image_id,
					  
					  // Additional data
					  data: {
						action: 'gd_ajax_upload',
						data: image_id
					  },
					  autoSubmit: true,
					  responseType: false,
					  onChange: function(file, extension){},
					  onSubmit: function(file, extension) {
							the_button.html("Uploading...");				  
						},
					  onComplete: function(file, response) {	
							the_button.html("Upload Image");
							
							if(response.search("Error") > -1){
								alert("There was an error uploading:\n"+response);
							}
							
							else{							
								image_input.val(response);
								var image_preview='<img src="' + response + '" class="gd_image_preview" />';							
								the_button.parent('.left_content').children('.gd_image_preview_holder').html(image_preview);
								jQuery('.image-div-preview').css('background','url('+image_preview+')');
								var remove_button_id='remove_'+image_id;
									var rem_id="#"+remove_button_id;
								if(!(jQuery(rem_id).exists())){
									the_button.after('<span class="button gd_remove" id="'+remove_button_id+'">Remove Image</span>');
								}
								
									
									
								}
							
						}
				});
			});
			
			
                         //AJAX upload
			jQuery('.gd_upload_bg').each(function(){
				
				var the_button=jQuery(this);
				var image_input=jQuery(this).prev();
				var image_id=jQuery(this).attr('id');
				
				new AjaxUpload(image_id, {
					  action: ajaxurl,
					  name: image_id,
					  
					  // Additional data
					  data: {
						action: 'gd_ajax_upload',
						data: image_id
					  },
					  autoSubmit: true,
					  responseType: false,
					  onChange: function(file, extension){},
					  onSubmit: function(file, extension) {
							the_button.html("Uploading...");				  
						},
					  onComplete: function(file, response) {	
							the_button.html("Upload Image");
							
							if(response.search("Error") > -1){
								alert("There was an error uploading:\n"+response);
							}
							
							else{							
								image_input.val(response);
								var image_preview='<img src="' + response + '" class="gd_image_preview" />';
                                                                window.location.replace("<?php echo get_site_url(); ?>/wp-admin/themes.php?page=tk-Vario-style#yourimages");

                                                                location.reload(false)
                                                               
                                                                

								the_button.parent('.left_content').children('.image-div-preview').attr('style','background:url('+response+')');
								
								var remove_button_id='remove_'+image_id;
									var rem_id="#"+remove_button_id;
								if(!(jQuery(rem_id).exists())){
									the_button.after('<span class="button gd_remove" id="'+remove_button_id+'">Remove Image</span>');
								}
								
									
									
								}
							
						}
				});
			});
                        
                        
			//AJAX image remove
			jQuery('.gd_remove').live('click', function(){
				var remove_button=jQuery(this);
				var image_remove_id=jQuery(this).prev().attr('id');
				remove_button.html('Removing...');
				
				var data = {
					action: 'gd_ajax_remove',
					data: image_remove_id
				};
				
				jQuery.post(ajaxurl, data, function(response) {
					remove_button.parent('.left_content').children('.gd_image_preview_holder').html('');
					remove_button.prev().prev().val('');
					remove_button.next().html('');
					remove_button.remove();
				});
				
			});
                        //AJAX image remove
			jQuery('.gd_remove_bg').live('click', function(){
				var remove_button=jQuery(this);
				var image_remove_id=jQuery(this).prev().attr('id');
				remove_button.html('Removing...');
				
				var data = {
					action: 'gd_ajax_remove',
					data: image_remove_id
				};
				jQuery('.'+image_remove_id).remove();
				jQuery.post(ajaxurl, data, function(response) {
					remove_button.parent('.left_content').children('.gd_image_preview_holder').html('');
					remove_button.prev().prev().val('');
					remove_button.next().html('');
					remove_button.remove();
				});
				
			});
                        
             }           

	
	jQuery(document).start();
	});	
	
</script>
<?php
}
?>