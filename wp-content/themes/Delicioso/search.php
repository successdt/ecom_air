<?php get_header(); ?>



<div class="top-content-title">
        <div class="wrap">
            <h2>Search result:</h2>
            <div class="tk-search">
                <div class="search-left"></div>
                <div class="search-center"><?php get_search_form();?></div>
                <div class="search-right"></div>
            </div><!--search-->
        </div><!--wrap-->
    </div>
<div class="wrap">

            <div class="content-left">

    <?php 
    wp_reset_query();
    $slug = get_page_url();
    $pageslug = explode('page/',$slug);
    $pageslug = $pageslug[0];
                    //The Loop
    $cellnum = 0;
                                            if ( have_posts() ) : while ( have_posts() ) : the_post();
                                                    $data = get_post_meta( $post->ID, GD_THEME, true );
                                                    $post_img = "";
                                                    if (has_post_thumbnail()) {
                                                        $imagedata = simplexml_load_string(get_the_post_thumbnail());
                                                        if(!empty($imagedata)) {
                                                            $post_img = $imagedata->attributes()->src;
                                                        }
                                                    }
                                                    $title = the_title('','',FALSE);
                                                    if ($title<>substr($title,0,40)) {
                                                        $dots = "...";
                                                    }else {
                                                        $dots = "";
                                                    }
                                                    $cellnum++;
                                                    ?>


                                                 <?php 
                                                            $comments = get_comments("post_id=$post->ID");
                                                            $num_of_comments = 0;
                                                            foreach((get_the_category()) as $category) { 
                                                                    $post_category = $category->cat_name;
                                                                    $post_category_id = $category->cat_ID;
                                                                    $cat_slug=get_cat_slug($post_category_id);
                                                                    } 

                                                            foreach($comments as $comm) :
                                                                    $num_of_comments++;

                                                            endforeach;
                                                            $written = $post->post_author;
                                                            $user = get_user_by('id',$written);
                                                            $written = $user->nickname;	
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




									<?php } endwhile;?>
            <?php else : ?>
                    <h2 class="center">No posts found. Try a different search?</h2>
            <?php endif; ?>
    <?php wp_reset_query(); ?>

				</div> <!--close left_content -->
                                    <div class="blog-center-border"><img src="<?php echo get_template_directory_uri();?>/images/content-border.png" alt="images" title="images"  /></div>
                                    <div id="sidebar">
                                        <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar')) : ?>
                                        <?php endif; ?>
                                    </div> <!---->
				</div> <!---->
                                <div class="clear-both"></div>


<?php get_footer(); ?>