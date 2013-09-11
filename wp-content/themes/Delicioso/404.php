<?php

get_header(); ?>
<div class="top-content-title">
        <div class="wrap">
            <h2>Page does not exist.</h2>
            <div class="tk-search">
                <div class="search-left"></div>
                <div class="search-center"><?php get_search_form();?></div>
                <div class="search-right"></div>
            </div><!--search-->
        </div><!--wrap-->
    </div>
<div class="wrap">

	 <div class="content-left">

                <div class="text-404">
                    <h1>404</h1>
                    <div class="border-404"></div>
                    <h2>Looks like the page you were looking for does not exist. Sorry about that.</h2>
                    <h3>Check the web address for typos, visit the <a href="<?php echo get_site_url(); ?>">home page</a> or use our site search.</h3>
                </div><!--text-404-->
			
		</div><!--close front_left_cell-->
                
            
		
		</div> <!--close left_content -->
                                    <div class="blog-center-border"><img src="<?php echo get_template_directory_uri();?>/images/content-border.png" alt="images" title="images"  /></div>
                                    <div id="sidebar">
                                        <?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar')) : ?>
                                        <?php endif; ?>
                                    </div> <!---->
                                <div class="clear-both"></div>
 			



<?php get_footer(); ?>