<?php
/*

Template Name: Blog

*/
get_header();
?>
            
<div class="top-content-title">
        <div class="wrap">
            <h2><?php echo the_title();?></h2>
            <div class="tk-search">
                <div class="search-left"></div>
                <div class="search-center"><?php get_search_form();?></div>
                <div class="search-right"></div>
            </div><!--search-->
        </div><!--wrap-->
    </div>
<div class="wrap sidebar-border">

                <?php
	$data = get_post_meta( $post->ID, GD_THEME, true );
if(isset($data)){
			$data = get_post_meta( $post->ID, GD_THEME, true );
                    }
			if(!empty($data['page_headline'])){
				$headline = $data['page_headline'];}
				if(!empty($data['page_headline_link'])){
					$headline_link = $data['page_headline_link'];
				}
			if(!empty($headline)){ ?>
                <div class="menu-tape">
                    <div class="menu-tape-left"></div>
                    <div class="menu-tape-center">
                            <?php if(isset($headline_link)){ ?>
						<a href="<?php echo $headline_link;?>" class="learn_more">
						<?php } ?>
						<?php echo string_limit_words($headline, 26)?>
						<?php if(isset($headline_link)){?>
						</a>
						<?php } ?></div>
                    <div class="menu-tape-right"></div>
                </div><!--menu-tape-->
			<?php } ?>
            <div class="content-left">


		<?php


					$current_page_id = get_ID_by_slug($post->post_name);
					$page = get_page_by_title($post->post_name);
					$meta = (get_post_meta($current_page_id,'',true));

					?>
			<!--	<div class="categories">
					<h2>CATEGORIES</h2>
					<?php
					$blog_category = get_option(THEME_NAME.'_blog_include_category');
							$categories = get_categories('orderby=name');
							$include_category = null;
							$slug = get_page_link();

							foreach ($categories as $category_list) {
								if(!empty($blog_category[0][$category_list->cat_ID])) {
									$cat = 	$category_list->cat_ID.",";

									$include_category = $include_category.$cat;
									echo '<div class="cat_cell" rev="'.$category_list->cat_ID.'">'.$category_list->cat_name.'</div>';
								}

							}?>


				</div>		-->
				<script type="text/javascript">
				jQuery('.cat_cell').live('click',
					function () {
						var id = jQuery(this).attr('rev');

						jQuery('#front_left_cell').empty();

				  	var randomnumber=Math.floor(Math.random()*100000000);


				  	var postAjaxURL = "<?php get_template_directory_uri(); ?>/blogajax.php?id="+id;

				    jQuery('#front_left_cell').load(postAjaxURL, {rand: randomnumber});
				     return false;
					}
				);

				</script>


					<?php

							$paged = (get_query_var('paged')) ? get_query_var('paged') : 0;
							$args=array('cat'=>$include_category, 'post_status' => 'publish','paged' => $paged,'posts_per_page' => get_option('posts_per_page'),'ignore_sticky_posts'=> 1);

							//The Query
							query_posts($args);

								//The Loop
								if ( have_posts() ) : while ( have_posts() ) : the_post();
								 $post_img = "";
									if (has_post_thumbnail()){
										      $imagedata = simplexml_load_string(get_the_post_thumbnail());
										      if(!empty($imagedata)){
										      	$post_img = $imagedata->attributes()->src;
										      }
										   	}
								 	 $title = the_title('','',FALSE);


									if ($title<>substr($title,0,60)){ $dots = "...";}else{$dots = "";}?>


										<?php
										$comments = get_comments("post_id=$post->ID");

											$num_of_comments = 0;
											foreach((get_the_category()) as $category) {
											    $post_category = $category->cat_name;
											}

											foreach($comments as $comm) :
												$num_of_comments++;
											endforeach;
										$authorid = $post->post_author;
										$author = get_userdata($authorid);
										$written = $author->user_login;
										?>
									<?php if($post_img !== "") { ?>
                <div class="content-one">
                    <div class="title-blog"><a href="<?php the_permalink(); ?>"><?php echo substr($title,0,60).$dots; ?></a></div><!--/title-blog-->
                    <div class="images">
                        <a href="<?php print $post_img;?>" class="pirobox " title="<?php the_title(); ?>" rel="single"><img src="<?php echo get_template_directory_uri();?>/script/timthumb.php?src=<?php print $post_img;?>&w=680&h=203&zc=1&q=100" alt="_" title="<?php the_title();?>" /></a>
                        <div class="blog-meta-border"></div>
                        <div class="post">
                            <div class="blog-written">
                                <div class="icon-written"></div>
                                <div class="written-content"><a href="<?php echo get_site_url().'/author/'.$written;  ?>"><?php echo $written; ?></a></div>
                            </div>

                            <div class="blog-date">
                                <div class="icon-date"></div>
                                <div class="date-content"><?php the_time('F');?> <?php the_time('d');?>, <?php the_time('Y');?></div>
                            </div>

                            <div class="blog-cat">
                                <div class="icon-cat"></div>
                                <div class="cat-content"><a href="<?php echo get_site_url().'/category/'.$post_category; ?>"><?php echo $post_category; ?></a></div>
                            </div>

                            <div class="blog-comm">
                                <div class="icon-comm"></div>
                                <div class="comm-content"><a href="<?php the_permalink(); ?>"><?php if ($num_of_comments == 0){echo 'No Comments yet';}else {echo $num_of_comments;} ?></a></div>
                            </div>
                        </div><!--/post-->
                    </div><!--/images-->

                    <div class="text">
                        <p><?php truncate_post(400);?></p>
                    </div><!--/text-->
                    <div class="riding">
                        <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri();?>/images/riding.png" alt="images" title="images"  />CONTINUE READING</a>
                    </div>
                </div><!--/content-one-->




				
									<?php }else{
										?>
            <div class="content-one">
                    <div class="title-blog"><a href="<?php the_permalink(); ?>"><?php echo substr($title,0,60).$dots; ?></a></div><!--/title-blog-->
                    
                  <div class="blog-meta-border no-img-border"></div>
                        <div class="post no-img-bg">
                            <div class="blog-written">
                                <div class="icon-written"></div>
                                <div class="written-content"><a href="<?php echo get_site_url().'/author/'.$written;  ?>"><?php echo $written; ?></a></div>
                            </div>

                            <div class="blog-date">
                                <div class="icon-date"></div>
                                <div class="date-content"><?php the_time('F');?> <?php the_time('d');?>, <?php the_time('Y');?></div>
                            </div>

                            <div class="blog-cat">
                                <div class="icon-cat"></div>
                                <div class="cat-content"><a href="<?php echo get_site_url().'/category/'.$post_category; ?>"><?php echo $post_category; ?></a></div>
                            </div>

                            <div class="blog-comm">
                                <div class="icon-comm"></div>
                                <div class="comm-content"><a href="<?php the_permalink(); ?>"><?php if ($num_of_comments == 0){echo 'No Comments yet';}else {echo $num_of_comments;} ?></a></div>
                            </div>
                        </div><!--/post-->
                    <div class="text">
                        <p><?php truncate_post(400);?></p>
                    </div><!--/text-->
                    <div class="riding">
                        <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri();?>/images/riding.png" alt="images" title="images"  />CONTINUE READING</a>
                    </div>
                </div><!--/content-one-->
										<?php
									}?>







								<?php endwhile;?>
									<?php
										//activate pagination
										tk_pagination(1,5,5,$slug); ?>
								<?php else: ?>
								<?php endif; ?>

								<?php comments_template(); // Get wp-comments.php template ?>
				</div> <!--close left_content -->

                                    <div id="sidebar">
                                        <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar')) : ?>
                                        <?php endif; ?>
                                    </div>
                                                                <div class="clear-both"></div>
				</div> <!---->
                                <div class="clear-both"></div>

<?php get_footer(); ?>



