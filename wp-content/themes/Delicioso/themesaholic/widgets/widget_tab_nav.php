<?php
/*---------------------------------------------------------------------------------*/
/* Tabbed navigation */
/*---------------------------------------------------------------------------------*/

class App_tab_nav extends WP_Widget {

   function App_tab_nav() {
  	   $widget_ops = array('description' => 'Widget shows Popular Posts, Recent Posts, Recent Comments.' );
       parent::WP_Widget(false, $name = __(THEME_NAME.' - Tabbed Widget', THEME_NAME), $widget_ops);    
   }


    function widget($args, $instance) {  
		extract( $args );
		$classwid = rand(1,500);
		if(isset($instance['title'])){
		$title = $instance['title'];
		}else{$title = "";}
		if(isset($instance['post_count'])){
			$post_count = $instance['post_count']; 
		}else{$post_count="";}
		
		if(isset($instance['popular'])){
		$popular = $instance['popular'];
   	}else{
   		$popular = "4";
   	}
   	if(isset($instance['recent'])){
		$recent = $instance['recent'];
   	}else{
   		$recent = "4";
   	}
   	if(isset($instance['comments'])){
		$commentsnum = $instance['comments'];
   	}else{
   		$commentsnum = "4";
   	}
		echo $before_widget; ?>
		<?php if ($title) { echo $before_title . $title . $after_title; } ?>
	
<div id="tabs_widget" class="tabs<?php echo $classwid ?>"style="display:none;"> 
	<ul> 
		<li class="popular_butt"><a href="#tabs-1">Popular</a></li> 
		<li class="recent_butt"><a href="#tabs-2">Recent</a></li> 
		<li class="comments_butt"><a href="#tabs-3">Comments</a></li> 
	</ul> 
						
					<div id="tabs-1">
					
						<?php
									$args=array( 'post_status' => 'publish', 'posts_per_page' =>$popular,'ignore_sticky_posts'=> 1,'orderby' => 'comment_count','order'    => 'DESC');	
									//The Query
									query_posts($args);  ?>	
					
									<?php
									


									
									$i = 1;
									if ( have_posts() ) : while ( have_posts() ) : the_post(); 
									$imagedata = simplexml_load_string(get_the_post_thumbnail());	
									$title = the_title('','',FALSE);
									if ($title<>substr($title,0,45)){ $dots = "...";}else{$dots = "";}
									
									
									?>

								

						<div class="widget_one_cell <?php if (!has_post_thumbnail()) { ?> widget_one_cell_no_image <?php } ?>" <?php if($i == 3){echo "style='display:inline;clear:both;'"; $i=1;} ?>>	
									<?php if (has_post_thumbnail()) { 
										
										
										?>
									
									<div class="widget_cell_image_bg">
									<div class="pirobox"></div>
         							<a class="widget_h2" href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri();?>/script/timthumb.php?src=<?php print $imagedata->attributes()->src;?>&w=63&h=46&zc=1&q=100" alt="<?php the_title(); ?>"  /></a>
									</div><!-- close image_bg -->
									
									
									
									
									
								<div class="widget_box_holder">	
								
									<?php 
									$id = get_the_ID();
									$comments = get_comments("post_id=$id");
										
										$num_of_comments = 0;
										foreach((get_the_category()) as $category) { 
										    $post_category = $category->cat_name;
										} 
				
										foreach($comments as $comm) :
											$num_of_comments++;
											
										endforeach;
									
									?>
									<a href="<?php the_permalink(); ?>">
										
									<div class="widget_cell_title"><h2 class="widget_single_h2"><a class="widget_h2" href="<?php the_permalink(); ?>"><?php echo substr($title,0,30).$dots; ?></a></h2></div>

									<div class="widget_cell_text widget_front_page_cell_text"><?php echo get_the_date();?><br></div>
									</div><!--closes box_holder-->
	

									<?php }else{ 
										
										?>

		
									
								<div class="widget_box_holder_noimage">
								
									<?php 
									$id = get_the_ID();
									$comments = get_comments("post_id=$id");
									
										$num_of_comments = 0;
										foreach((get_the_category()) as $category) { 
										    $post_category = $category->cat_name;
										} 
				
										foreach($comments as $comm) :
											$num_of_comments++;
											
											
										endforeach;
										
									
										
										
									?>
														
									<div class="widget_cell_title_noimage"><h2 class="widget_single_h2"><a class="widget_h2" href="<?php the_permalink(); ?>"><?php echo substr($title,0,42).$dots; ?></a></h2></div>

								

									<div class="widget_cell_text_noimage"><?php echo get_the_date();?><br></div>
									</div><!--closes box_holder-->	
	
									<?php } ?>			
								</div><!--closes one_cell-->
								<?php 
								if($i<4){
									echo '<div class="widget_cell_line"></div>';
								}
									
									$i++;
									endwhile;?> 
									<?php else: ?>
									
									<?php endif; 
							
			 ?>

								
						<?php	//Reset Query
									wp_reset_query(); ?>
										
				
									
									
				</div><!--close front_left_cell-->
			
	<div id="tabs-2"> 
		
		<?php
									$args=array( 'post_status' => 'publish', 'posts_per_page' =>$recent,'ignore_sticky_posts'=> 1);	
									//The Query
									query_posts($args);  ?>	
					
									<?php
									
									$i = 1;$cellnum=1;
									if ( have_posts() ) : while ( have_posts() ) : the_post(); 
									$imagedata = simplexml_load_string(get_the_post_thumbnail());	
									$title = the_title('','',FALSE);
									if ($title<>substr($title,0,32)){ $dots = "...";}else{$dots = "";}
											
									?>

								<div class="widget_one_cell <?php if (!has_post_thumbnail()) { ?> widget_one_cell_no_image <?php } ?>" <?php if($cellnum == 3){echo "style='display:inline;clear:both;'"; $cellnum=1;} ?>>

									<?php if (has_post_thumbnail()) { 
										
										
										?>
									
									<div class="widget_cell_image_bg">
									<div class="pirobox"></div>
         							<a class="widget_h2" href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri();?>/script/timthumb.php?src=<?php print $imagedata->attributes()->src;?>&w=63&h=46&zc=1&q=100" alt="<?php the_title(); ?>"  /></a>
									</div><!-- close image_bg -->
									
								<div class="widget_box_holder">	
									<?php 
									$id = get_the_ID();
									$comments = get_comments("post_id=$id");
										
										$num_of_comments = 0;
										foreach((get_the_category()) as $category) { 
										    $post_category = $category->cat_name;
										} 
				
										foreach($comments as $comm) :
											$num_of_comments++;
											
										endforeach;
										
									?>
									<a href="<?php the_permalink(); ?>">
										
									<div class="widget_cell_title"><h2 class="widget_single_h2"><a class="widget_h2" href="<?php the_permalink(); ?>"><?php echo substr($title,0,30).$dots; ?></a></h2></div>

									<div class="widget_cell_text widget_front_page_cell_text"><?php truncate_post(50);?><br></div>
									</div><!--closes box_holder-->
	

									<?php }else{ 
										
										?>
		
									
								<div class="widget_box_holder_noimage">
									<!--<div class="cell_category"><?php echo $post_category; ?></div>-->
									<?php 
									$id = get_the_ID();
									$comments = get_comments("post_id=$id");
										
										$num_of_comments = 0;
										foreach((get_the_category()) as $category) { 
										    $post_category = $category->cat_name;
										} 
				
										foreach($comments as $comm) :
											$num_of_comments++;
											
										endforeach;
									
									?>
														
									<div class="widget_cell_title_noimage"><h2 class="widget_single_h2"><a class="widget_h2" href="<?php the_permalink(); ?>"><?php echo substr($title,0,42).$dots; ?></a></h2></div>

								

									<div class="widget_cell_text_noimage"><?php truncate_post(100);?><br></div>
									</div><!--closes box_holder-->	
	
									<?php } ?>			
								</div><!--closes one_cell-->
								<?php
							if($i<4){
									echo '<div class="widget_cell_line"></div>';
								}
									
									$i++;
									$cellnum++;
									 endwhile;?> 
									<?php else: ?>
									
									<?php endif; 
							
			 ?>

								
						<?php	//Reset Query
									wp_reset_query(); ?>



	
	</div> 
	
	
	<div id="tabs-3"> 

	
	<div class="widget_one_cell">
			<?php
			
			global $wpdb;
			
			$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,
			comment_post_ID, comment_author, comment_date_gmt, comment_approved,
			comment_type,comment_author_url,
			SUBSTRING(comment_content,1,30) AS com_excerpt
			FROM $wpdb->comments
			LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =
			$wpdb->posts.ID)
			WHERE comment_approved = '1' AND comment_type = '' AND
			post_password = ''
			ORDER BY comment_date_gmt DESC
			LIMIT $commentsnum";
			
			
			$comments = $wpdb->get_results($sql);
			
			$output = "";
			
			$output .= "\n<ul class='widget_comment_holder'>";?>
			<div class="comment_holder_bg">
			<?php
			$i = 1;
			foreach ($comments as $comment) {
			
				
			$output .= "\n<li class='widget_comment'>".strip_tags($comment->comment_author)."\n"
			 .""."<br/>"
			 ."<a class='comment_href' href=\"" . get_permalink($comment->ID) 
			 . "\" title=\"on " 
			 . $comment->post_title . "\">" .$comment->post_title . "</a></li>";
			 if($i<$commentsnum){
									$output .= '<li class="widget_cell_line_hack"></li>';
								}
									
									$i++;
			}
			$output .= "\n</ul>";
			$output .= "";
			
			
			echo $output;?>
			</div>
	</div>
	</div> 
</div><!-- closes all tab divs--> 













		<?php echo $after_widget; ?>   
		<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery( ".tabs<?php echo $classwid ?>" ).tabs();
			jQuery(".tabs<?php echo $classwid ?>").animate({opacity:0},0).css('display','block').animate({opacity:1},500);
		});
		 
		</script>
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
   	if(isset($instance['popular'])){
		$popular = esc_attr($instance['popular']);
   	}else{
   		$popular = "4";
   	}
   	if(isset($instance['recent'])){
		$recent = esc_attr($instance['recent']);
   	}else{
   		$recent = "4";
   	}
   	if(isset($instance['comments'])){
		$comments = esc_attr($instance['comments']);
   	}else{
   		$comments = "4";
   	}
   	if(isset($instance['post_count'])){
		$post_count = esc_attr($instance['post_count']);
   	}else{
   		$post_count = "";
   	}
		?>
		<p>
		   <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:',THEME_NAME); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
		</p>
		<p>
		   <label for="<?php echo $this->get_field_id('popular'); ?>"><?php _e('Number of Popular posts:',THEME_NAME); ?></label>
		  <input type="text" name="<?php echo $this->get_field_name('popular');?>" value="<?php echo $popular; ?>" class="widefat" id="<?php echo $this->get_field_id('popular'); ?>" />
		</p>
		<p>
		   <label for="<?php echo $this->get_field_id('recent'); ?>"><?php _e('Number of Recent posts:',THEME_NAME); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('recent');?>" value="<?php echo $recent; ?>" class="widefat" id="<?php echo $this->get_field_id('recent'); ?>" />
		</p>
		<p>
		   <label for="<?php echo $this->get_field_id('comments'); ?>"><?php _e('Number of Comments:',THEME_NAME); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('comments');?>" value="<?php echo $comments; ?>" class="widefat" id="<?php echo $this->get_field_id('comments'); ?>" />
		</p>
			
       
		
		
       <?php 
   }
}

register_widget('App_tab_nav');
?>