<div class="twitter-holder" align="center">
	<div style="max-width: 960px; margin: 0 auto;">
	     <?php
	      if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('bottom-content') ) :
	      endif;
		  ?>	
	
	</div>
 
</div><!--twitter holder-->

<div class="footer-border-top"></div>


     <div class="footer">

         <div class="footer-up">

             <div class="wrap">


	<div class="footer_widget_box">
					<div class="footer_box">
						<?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 1')) : ?>
						<?php endif; ?>
					</div> <!--close footer_box-->

					<div class="footer_box">
						<?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 2')) : ?>
						<?php endif; ?>
					</div><!--close footer_box-->

					<div class="footer_box">
						<?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 3')) : ?>
						<?php endif; ?>
					</div><!--close footer_box-->

					<div class="footer_box last">
						<?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 4')) : ?>
						<?php endif; ?>
					</div><!--close footer_box-->
					<div class="clear-both"></div>
					
					<div style="max-width: 960px; margin: 0 auto; text-align: center;" class="big-footer">
					     <?php
					      if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('big-footer') ) :
					      endif;
						  ?>	
					
					</div>
	</div><!--close footer box-->
				</div><!--close wrap -->

	</div><!--close container-->

</div><!--close footer-->




	<?php
	$twitter = get_option(THEME_NAME.'_footer_twitter');
	$facebook = get_option(THEME_NAME.'_footer_facebook');
	if(empty($twitter) & empty($facebook)){
		$style = "display:none;";
		$styletext = "float:none;";
	}else{
		$style = "display:block;";
		$styletext = "float:right;";
	}
	?>

				<div class="clear-both"></div>

<div class="copyright-holder">
	<div id="copyright">


		<div id="copyright-wrap">
			<div id="connect" style="<?php echo $style; ?>">
				<?php

				if(!empty($twitter)){
				?>
					<a href="<?php echo "http://www.twitter.com/".$twitter; ?>" class="footer-twitter"></a>
				<?php }

				if(!empty($facebook)){
				?>
					<a href="<?php echo $facebook;?>" class="footer-facebook"></a>
				<?php
				}
				?>
			</div>
				<?php $copyright = get_option(THEME_NAME.'_footer_copyright'); if(empty($copyright)) { $copyright = "<span style='float:left;'>Copyright Information Goes Here 2010. All Rights Reserved. Designed by </span>&nbsp;<a href='http://www.themesaholic.com'>Themesaholic</a>";}?>
						<p><?php
						$search  = array("<a href=\'", "\'>" );
						$replace = array("<a href='", "'>"); echo  str_replace($search ,$replace ,$copyright);?></p>
		</div><!--close copyright-wrap-->
	</div> <!--close copyright-->

</div>



					<div class="clear-both"></div>

 <?php wp_footer(); ?>
		</body>
</html>