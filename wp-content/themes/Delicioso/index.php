<?php

get_header(); ?>
<div class="content">
					
		
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
					
		
				
		 </div><!--/content-->

        <div class="container-bottom"></div>
<?php
posts_nav_link();
paginate_comments_links();
wp_link_pages();
post_class();
language_attributes();
?>

<?php get_footer(); ?>