<?php 
//loading wordpress functions
get_template_part( '../../../wp-load.php' );
?>

	<?php
	
		$value = get_option(THEME_NAME.'_portfolio_number_of_posts');
							$numportfolio = get_option(THEME_NAME.'_number_of_images_portfolio');
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$id = $_GET['id'];
//The Query
//The Loop
		echo "<ul class='pagingx'>";
			$i=0;	
				echo "<li>";
						$args=array('cat'=>$id, 'post_status' => 'publish','paged' => $paged,'posts_per_page' => $numportfolio);
						query_posts($args);

					$i=0;	if ( have_posts() ) : while ( have_posts() ) : the_post();
                                                                                 $title = the_title('','',FALSE);
                                        if ($title<>substr($title,0,60)){ $dots = "...";}else{$dots = "";}
					if (has_post_thumbnail()){
						$imagedata = simplexml_load_string(get_the_post_thumbnail());
						$post_img = $imagedata->attributes()->src;
					}else{$post_img = "";}
					$i++;
					?>

                        <div class="post-home-all"  <?php if($i%4==0) {echo ('style="margin-right:0;"'); } ?>>
                            <div class="img-post">
                                <a href="<?php print $post_img;?>" class="pirobox" title="<?php the_title(); ?>" rel="single"><img class="transparent" src="<?php echo get_template_directory_uri();?>/script/timthumb.php?src=<?php print $post_img;?>&w=284&h=179&zc=1&q=100" alt="_" title="<?php the_title();?>" /></a>
                                <div class="img-post-red">
                                    <img src="<?php echo get_template_directory_uri();?>/images/img-post-red.png" alt="images" title="images"  />
                                    <p>$35</p>
                                </div><!--post-home-all-->
                            </div><!--img-post-->
                            <div class="post-text-all">
                                <a href="<?php the_permalink(); ?>"><?php echo substr($title,0,60).$dots; ?></a>
                                <p><?php truncate_post(100);?></p>
                            </div>
                        </div><!--/post-home-all-->



<?php if($i%4==0) {echo ('<div class="clear-both"></div>'); } ?>
	<?php	echo "</li>";
		endwhile;
		echo "</ul>";
	?> 
	
	<?php 
	//activate pagination
	

	?>

	<?php else: ?>
	<?php endif; ?>
	

	
	<?php comments_template(); // Get wp-comments.php template ?>
		<script type="text/javascript">
//Ajax Pagination	
			$("ul.pagingx").quickPager(pageSize	= "<?php echo get_option(THEME_NAME.'_number_of_images_portfolio');?>");
			$(".simplePagerNav").css('margin','40px 0');	
		</script>
		
		