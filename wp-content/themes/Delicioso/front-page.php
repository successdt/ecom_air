<?php get_header();?>

<div class="content">

    <div class="wrap wrap-front">

    
        <div class="post-home">
					<?php 
					/*
					//Options

							$blog_category = get_option(THEME_NAME.'_fp_content_category');
							$categories = get_categories('orderby=name');
							$include_category = null;
							foreach ($categories as $category_list) {
								if(!empty($blog_category[0][$category_list->cat_ID])) {
									$cat = 	$category_list->cat_ID.",";
									$include_category = $include_category.$cat;
								}

							}
							$value = 4;
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 0;
							$args=array('cat'=>$include_category, 'post_status' => 'publish','paged' => $paged,'posts_per_page' => 4,'ignore_sticky_posts'=> 1);

							//The Query
							query_posts($args);
							$i=1;
								//The Loop
								if ( have_posts() ) : while ( have_posts() ) : the_post();
									$imagedata = simplexml_load_string(get_the_post_thumbnail());
									$data = get_post_meta( $post->ID, GD_THEME, true );
									$title = the_title('','',FALSE);
									$title = strtoupper($title);
										if ($title<>substr($title,0,18)){ $dots = "...";}else{$dots = "";}


							if ($i%4==0) {
								$lastclass="last-front";
							}
							else $lastclass="";

					?>

					<div class="post-home-all <?php echo $lastclass?>">
								<div class="img-post">
										<?php if (has_post_thumbnail()) {	?>
                                                                                             <a href="<?php print $imagedata->attributes()->src;?>" class="fancybox" title="<?php the_title(); ?>" rel="single"><img class="transparent" src="<?php echo get_template_directory_uri();?>/script/timthumb.php?src=<?php print $imagedata->attributes()->src;?>&w=202&h=130&zc=1&q=100" alt="_" title="<?php the_title();?>" />
										<?php }
                                                                                    else echo '<div class="front-blank-image"></div>';?>
                                                                                    <?php if(!empty($data['item_price'])) { ?>
                                                                                        <div class="img-post-red">
                                                                                            <p><?php  echo $data['item_price']; ?></p>
                                                                                        </div><!--post-home-all-->
                                                                                 <?php echo '</a>' ;} else {echo '</a>';}?>
								</div>

								<div class="post-text-all">
                                                                    <a href="<?php the_permalink(); ?>"><?php echo substr($title,0,18).$dots; ?></a>
                                                                    <p><?php truncate_post(130);?></p>
                                                                </div>


					</div><!--closes one_cell-->
						<?php $i++; ?>



						<?php endwhile;
						wp_reset_query();
						?>

						<?php else: ?>
						<?php endif; ?>
					<div class="clear-both"></div>
				</div><!--close one row-->







        <?php
                $menubutton = get_option(THEME_NAME."_custom_menu_button");
                $menubuttonurl = get_option(THEME_NAME."_custom_menu_button_url");
                $menubuttontext = get_option(THEME_NAME."_custom_menu_button_text");
                if (!empty($menubutton) && !empty($menubuttonurl)) {
        ?>

        <div class="featured-box">
            <div class="featured-box-text">
                <p><?php echo $menubuttontext ?></p>
            </div><!--featured-box-text-->

                <a href="#">
                    <div class="featured-box-button">
                        <div class="featured-box-left"></div><!--/illustration-left-->
                        <a href="<?php echo $menubuttonurl ?>"><div class="featured-box-center"><?php echo $menubutton ?></div></a><!--/illustration-center-->
                        <div class="featured-box-right"></div><!--/illustration-right-->
                    </div>
                </a><!--featured-box-button-->

        </div>

				<?php
									}
				*/ ?>
        <?php
		/* Run the loop to output the page.
		 * If you want to overload this in a child theme then include a file
		 * called loop-page.php and that will be used instead.
		 */
		//get_template_part( 'loop', 'page' );
		 wp_reset_query();
			if ( have_posts() ) : while ( have_posts() ) : the_post();
			the_content();
			 endwhile;
			else:
			endif;
		wp_reset_query();
		?>		
		
     </div><!--wrap-->

				

</div>
<div class="front-bottom-separator"></div>
	<div class="clear-both"></div>
<?php get_footer(); ?>