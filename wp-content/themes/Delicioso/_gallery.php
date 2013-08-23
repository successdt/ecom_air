<?php
/*

Template Name: Gallery

*/
get_header(); ?>
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


    <div class="wrap">
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
                <div class="clear-both"></div>

				
				<script type="text/javascript">



				jQuery(document).ready(function($){

					var $data = $("#portfolio-holder").clone();

					$('#filter li').click(function(e) {
						$('#portfolio-holder').css('height','800px');

						var filterClass=$(this).attr('data-filter');

						if (filterClass == 'all') {
							var $filteredData = $data.find('.portfolio_box');
						} else {
							var $filteredData = $data.find('.portfolio_box[data-type=' + filterClass + ']');
						}
						$("#portfolio-holder").quicksand($filteredData, {
							duration: 800,
							easing: 'swing',
							adjustHeight: 'false'
						},function(){
							$('#portfolio-holder').css('height','auto');

							$('.fancybox-overlay,.fancybox-wrap,.fancybox-loading,.fancybox-tmp').remove();

							jQuery('.fancybox').fancybox();
						});

							jQuery('img','.pirobox').live({
						        mouseenter:
						           function()
						           {
									jQuery(this).stop().animate({opacity:0.4},500);
						           },
						        mouseleave:
						           function()
						           {
									jQuery(this).stop().animate({opacity:1},300);
						           }
						       }
						    );





						return false;
					});
				});





				</script>

					<div id="portfolio-holder-relative" >
					<div id="portfolio-holder" class="post-home">
					<?php
                                        $portfolio_category = get_option(THEME_NAME.'__gallery_include_category');
	
					$url = get_page_url();


					if(!isset($showall) || $showall !== 1){
						$args=array('cat'=>$portfolio_category, 'post_status' => 'publish','posts_per_page' => 20000,'meta_key' => '_thumbnail_id');
						query_posts($args);
					}


					$i=0;	if ( have_posts() ) : while ( have_posts() ) : the_post();
					if (has_post_thumbnail()){
						$imagedata = simplexml_load_string(get_the_post_thumbnail());
						$post_img = $imagedata->attributes()->src;
					}else{$post_img = "";}
					$i++;

                                        $title = the_title('','',FALSE);
                                        if ($title<>substr($title,0,20)){ $dots = "...";}else{$dots = "";}

					foreach((get_the_category()) as $category) {
					    $cat = $category->cat_ID." ";
					}


					$trimmed = trim($cat);
					?>

                                                                                <div class="portfolio_box portfolio_box-4col portfolio_box-4colSimple <?php echo $cat;?>"  data-type="<?php echo $trimmed; ?>" data-id="box-<?php echo $i; ?>">

											 	<?php if((!empty($post_img) || $post_img !== "")) { ?>
                                                                                <div class="post-home-all"  <?php if($i%4==0) {echo ('style="margin-right:0;"'); } ?>>
												<div class="portfolio_image_bg portfolio_box_categories">
												<div class="img-post">
                                                                                                    <a href="<?php print $post_img;?>" class="fancybox" title="<?php the_title(); ?>" rel="single"><img class="transparent" src="<?php echo get_template_directory_uri();?>/script/timthumb.php?src=<?php print $post_img;?>&w=202&h=146&zc=1&q=100" alt="_" title="<?php the_title();?>" /></a>
                                                                                                </div><!--img-post-->
												<div class="portfolio-loader3"></div>
												</div><!-- close image_bg -->

											 	<?php }else{
											 		echo "<br/><br/>";
											 	} ?>
											 	<h2 class="portfolio-h2"> <?php echo substr($title,0,20).$dots; ?></h2>
                                                                                </div>
                                                                                                        </div><!--/post-home-all-->
                                                                                <?php if($i%4==0) {echo ('<div class="clear-both"></div>'); } ?>
										<?php

										endwhile; ?>


										<?php else: ?>
										<?php endif; ?>



										<?php

										?>

		</div>
		</div>
		</div>


<?php get_footer(); ?>



