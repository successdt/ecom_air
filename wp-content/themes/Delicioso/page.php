<?php

get_header(); ?>

<?php
/*
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
					<?php
					/* Run the loop to output the page.
					 * If you want to overload this in a child theme then include a file
					 * called loop-page.php and that will be used instead.
					 */
					//get_template_part( 'loop', 'page' );
                                       
					//$current_page_id = get_ID_by_slug($page->post_name);
					/*
					 wp_reset_query();
						if ( have_posts() ) : while ( have_posts() ) : the_post();
                                         
					
						the_content();
						 endwhile;
						else:
						endif;
					wp_reset_query();
					?>
					
		
				
				<div class="front-bottom-separator"></div>
        <div class="clear-both"></div>
 </div>				

<?php get_footer(); ?>
*/?>


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
					/* Run the loop to output the page.
					 * If you want to overload this in a child theme then include a file
					 * called loop-page.php and that will be used instead.
					 */
					//get_template_part( 'loop', 'page' );
                                       
					//$current_page_id = get_ID_by_slug($page->post_name);

					 wp_reset_query();
						if ( have_posts() ) : while ( have_posts() ) : the_post();
                                         
					
						the_content();
						 endwhile;
						else:
						endif;
					wp_reset_query();
					?>
			</div> <!--close left_content -->

        <div id="sidebar">
            <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar')) : ?>
            <?php endif; ?>
        </div>
        <div class="clear-both"></div>
</div> <!---->
<div class="clear-both"></div>

<?php get_footer(); ?>
