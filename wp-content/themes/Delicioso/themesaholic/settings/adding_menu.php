<?php
// Add javascript to generate a quicktag button. If the quicktag bar
// isn't available, instead put a link below the posting field entry.
function pluggy_quicktag_like_button() {
  // Only add the javascript to post.php, post-new.php, page-new.php, or
  // bookmarklet.php pages
  if (strpos($_SERVER['REQUEST_URI'], 'post.php') ||
      strpos($_SERVER['REQUEST_URI'], 'post-new.php') ||
      strpos($_SERVER['REQUEST_URI'], 'page-new.php') ||
      strpos($_SERVER['REQUEST_URI'], 'bookmarklet.php')) {
    // Print out the HTML/Javascript to add the button
?>
<style type="text/css">
#pluggy_link{margin-bottom:10px; display:none;}
</style>
<div id="pluggy_link">
[a href="#" onclick="return pluggy_open('tinymce=true')"]Pluggy![/a]
</div>
<div id="panel">
<style type="text/css">
.formlabel{
width:100px;
text-align:right;
float:left;
}
.close{cursor:pointer;padding:0 3px;width:10px!important;}
.column3action span input{float:left;}
.column4action span input{float:left;}
.column5action span input{float:left;}
.ed_div{padding:0 0 3px 0;z-index:999;}
#ed_toolbar input, #ed_reply_toolbar input{
padding-top:3px!important;
padding-bottom:3px!important;
}


</style>

<div class="formaction actionspan" style="display:none;position:absolute;top:200px;left:300px;">
<div class="actionhelper"></div>
<span style="float:left;">
<label class='formlabel'>Form position:</label><br/><input type="radio" style="width:10px!important;margin-right:3px!important;float:left;" name="formposition" checked value="formleft"><div style="float:left;">Left</div><input type="radio"  style="width:10px!important;margin-right:3px!important;float:left;" name="formposition" value="formright"><div style="float:left;">Right</div><br/>
<label class="formlabel">Text for form</label><br/><textarea class="formtext" name="formtext" style="width:500px!important;height:400px;"></textarea><br/><br/>
<label class="formlabel">Notification text:</label><br/>Your Name must be filled:<input type="text" name="namemustbefilled"><br/>Please enter valid email<input type="text" name="insertvalidemail"><br/>Please insert the message<input type="text" name="pleaseinsertmessage">Your message is sent successfully<input type="text" name="messagesent">
</span>

<div class="actionheader"><input type="button" class="close actionbutton" value=""><input type="button" class="resetbutton actionbutton" value="Reset"><input type="button" class="addformsubmit actionbutton" value="ADD"><p class="actiontitle">Add Contact Form</p></div>
</div>


<div class="h2action actionspan" style="display:none;position:absolute;top:200px;left:300px;">
<div class="actionhelper"></div>
<span style="float:left;">
<label class='formlabel'>H2 image url:</label><br/><input type="text" name="h2image"><br/>
<label class='formlabel'>H2 Title:</label><br/><input type="text" name="h2titlehere"><br/>
<label class='formlabel'>H2 SubTitle:</label><br/><input type="text" name="h2undertitlehere"><br/>

</span>
<div class="actionheader"><input type="button" class="close actionbutton" value=""><input type="button" class="resetbutton actionbutton" value="Reset"><input type="button" class="h2submit actionbutton" value="ADD"><p class="actiontitle">Add H2</p></div>

</div>

<div class="h1h2action actionspan" style="display:none;position:absolute;top:200px;left:300px;width: 600px;">
<div class="actionhelper"></div>
<span style="float:left;width:580px;">
<label class='formlabel'>Heading text:</label><br/><input type="text" name="headingtext"><br/>
<label class='formlabel'>Heading type:</label><br/><select name="headingtype"><option value="h1">H1<option value="h2">H2<option value="h3">H3<option value="h4">H4<option value="h5">H5</select><br/>


</span>
<div class="actionheader"><input type="button" class="close actionbutton" value=""><input type="button" class="resetbutton actionbutton" value="Reset"><input type="button" class="h1h2submit actionbutton" value="ADD"><p class="actiontitle">Add H1 - H2 - H3 - H4 - H5</p></div>

</div>


<div class="addbuttonaction actionspan" style="display:none;position:absolute;top:200px;left:300px;width:auto!important;">
<div class="actionhelper"></div>
<span style="float:left;width:800px!important;">
<h1>Button</h1>
<div style="float:left;width:200px!important;">
<label class='formlabel'>Button URL:</label><br/><input type="text" name="buttonurl"><br/>
<label class='formlabel'>Left Margin:</label><br/><input type="text" name="buttonleftmargin"><br/>
<label class='formlabel'>Align:</label><br/><select name="buttonalign" class="buttonalign" style="width: 200px!important;height:24px!important;"><option value="left">Left<option value="right">Right</select><br/>
</div >
<div  style="float:left;width:200px!important;margin-left:20px!important">
<label class='formlabel'>Value:</label><br/><input type="text" name="buttonvalue"><br/>
<label class='formlabel'>Color:</label><br/>
<select name="colorofbutton" class="colorofbutton" style="height: 24px;width: 200px !important;">
	<option value="white">White
	<option value="gray">Gray
	<option value="blue">Blue
	<option value="green">Green
	<option value="red">Red
	<option value="black">Black
</select>
</div >

</span>
<div class="actionheader"><input type="button" class="close actionbutton" value=""><input type="button" class="resetbutton actionbutton" value="Reset"><input type="button" class="buttonsubmit actionbutton" value="ADD"><p class="actiontitle">Add Button</p></div>
</div>

<div class="column1action actionspan" style="display:none;position:absolute;top:200px;left:300px;width: 500px;">
<div class="actionhelper"></div>
<span style="float:left;width: 480px;">
<h1>Fullwidth</h1>
<label class='formlabel'>Cell Title:</label><br/><input type="text" name="celltitlehere1two1"><br/>
<label class='formlabel'>Cell Title Link:</label><br/><input type="text" name="celltitlelinkhere1two1"><br/>
<label class='formlabel'>Cell Text:</label><br/><textarea name="celltexthere1two" class="celltexthere1two1"></textarea><br/><br/>
</span>
<div class="actionheader"><input type="button" class="close actionbutton" value=""><input type="button" class="resetbutton actionbutton" value="Reset"><input type="button" class="column1submit actionbutton" value="ADD"><p class="actiontitle">Add Fullwidth</p></div>

</div>

<div class="column2action actionspan" style="display:none;position:absolute;top:200px;left:300px;width: 500px;">
<div class="actionhelper"></div>
<span style="float:left;width: 229px;">
<h1>Left Half</h1>
<label class='formlabel'>Cell Title:</label><br/><input type="text" name="celltitlehere1two"><br/>
<label class='formlabel'>Cell Title Link:</label><br/><input type="text" name="celltitlelinkhere1two"><br/>
<label class='formlabel'>Cell Text:</label><br/><textarea name="celltexthere1two" class="celltexthere1two"></textarea><br/><br/>
</span>
<span style="float:left;width: 229px;border-right:0px;">
<h1>Right Half</h1>
<label class='formlabel'>Cell Title:</label><br/><input type="text" name="celltitlehere2two"><br/>
<label class='formlabel'>Cell Title Link:</label><br/><input type="text" name="celltitlelinkhere2two"><br/>
<label class='formlabel'>Cell Text:</label><br/><textarea name="celltexthere2two" class="celltexthere2two"></textarea><br/><br/>
</span>
<div class="actionheader"><input type="button" class="close actionbutton" value=""><input type="button" class="resetbutton actionbutton" value="Reset"><input type="button" class="column2submit actionbutton" value="ADD"><p class="actiontitle">Add 2 Columns</p></div>

</div>


<div class="imageaction actionspan" style="display:none;position:absolute;top:200px;left:300px;width:800px!important;">
<div class="actionhelper"></div>
<span style="float:left;border:0;width:290px!important;">
<h1>Insert Image</h1>
<label class='formlabel'>Image url:</label><br/><input type="text" class="imageurl" name="imageurl"><br/>
<label class='formlabel'>Title:</label><br/><input type="text" class="imagetitle" name="imagetitle"><br/>
<label class='formlabel'>Align:</label><br/><select name="imagealign" class="imagealign" style="width: 288px!important;;height:24px!important;"><option value="left">Left<option value="right">Right</select><br/>
<label class='formlabel'>Width:</label><br/><input type="text" name="imagewidth"><br/>
<label class='formlabel'>Height:</label><br/><input type="text" name="imageheight"><br/>
<label class='formlabel'>Border:</label><br/><label class='formlabel' style=" float: left;width: 30px !important;">Yes</label><input type="radio" name="imageborder" value="yes" checked style="float: left;margin: 10px 0 0 !important;width: 30px !important;"><label class='formlabel' style=" float: left;width: 30px !important;">No</label><input type="radio" name="imageborder" value="no" style="float: left;margin: 10px 0 0 !important;width: 30px !important;"><br/>
</span>
<span  style="float:left;padding:157px 0 0 0;border:0;width:10px!important;">
<br/><br/><br/><br/>px<br/><br/><br/>px
</span>
<span style="float:left;border:0;width:458px !important">
<div class="image-popup">
			
			
			<?php
			
			$min_width = 0;
			
			global $wpdb;
			$media_images = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_type = 'attachment' order by ID desc");
			
			?>
			
			<ul>
			
				<?php
				foreach($media_images as $image_post){
					
					$img_details = wp_get_attachment_image_src($image_post->ID, 'full');
					
					//If image is big enough for the slider proceed
					if($img_details[1] >= $min_width){
					
						$thumb_src = wp_get_attachment_image_src($image_post->ID, 'jw_100');
						$thumb_src = $thumb_src[0];
						
						if(!empty($active_imgs) && in_array($image_post->ID, $active_imgs)){ $class_attr .= ' class="added"'; } else { $class_attr = ''; }
						
						?>
						<li<?php echo $class_attr; ?>>
							<img src="<?php echo $thumb_src; ?>" title="<?php echo $image_post->post_title; ?>" alt="<?php echo $img_details[0] ?>"  class="small-image"/>
							<!--<span class="img-size"><?php echo $img_details[1].'x'.$img_details[2]; ?></span>
							<span class="added-notice"><?php _e('Added', $domain); ?></span>-->
						</li>
						<?php
						
					}
					
				}
				?>
				
			</ul>
			
		</div><!-- .metabox-slider-media -->
		<script type="text/javascript">
			jQuery('.small-image').live('click',function(){
				var img = jQuery(this).attr('alt');
				var title = jQuery(this).attr('title');
				jQuery('.imageurl').empty().val(img);
				jQuery('.imagetitle').empty().val(title);
			});
		</script>
</span>
<div class="actionheader"><input type="button" class="close actionbutton" value=""><input type="button" class="resetbutton actionbutton" value="Reset"><input type="button" class="imagesubmit actionbutton" value="ADD"><p class="actiontitle">Add Image</p></div>

</div>

<div class="column3action actionspan" style="display:none;position:absolute;top:200px;left:300px;">
<div class="actionhelper"></div>
<span style="float:left;">
<h1>First cell</h1>
<label class='formlabel'>Cell Title:</label><br/><input type="text" name="celltitlehere1"><br/>
<label class='formlabel'>Cell Title Link:</label><br/><input type="text" name="celltitlelinkhere1"><br/>
<label class='formlabel'>Cell Text:</label><br/><textarea name="celltexthere1" class="celltexthere1"></textarea><br/><br/>
</span>
<span style="float:left;">
<h1>Second cell</h1>
<label class='formlabel'>Cell Title:</label><br/><input type="text" name="celltitlehere2"><br/>
<label class='formlabel'>Cell Title Link:</label><br/><input type="text" name="celltitlelinkhere2"><br/>
<label class='formlabel'>Cell Text:</label><br/><textarea name="celltexthere2" class="celltexthere2"></textarea><br/><br/>
</span>
<span style="float:left;" class="last">
<h1>Third cell</h1>
<label class='formlabel'>Cell Title:</label><br/><input type="text" name="celltitlehere3"><br/>
<label class='formlabel'>Cell Title Link:</label><br/><input type="text" name="celltitlelinkhere3"><br/>
<label class='formlabel'>Cell Text:</label><br/><textarea name="celltexthere3" class="celltexthere3"></textarea><br/><br/>
</span>
<div class="actionheader"><input type="button" class="close actionbutton" value=""><input type="button" class="resetbutton actionbutton" value="Reset"><input type="button" class="column3submit actionbutton" value="ADD"><p class="actiontitle">Add 3 Columns</p></div>

</div>

<div class="column4action actionspan" style="display:none;position:absolute;top:200px;left:300px;">
<div class="actionhelper"></div>
<span style="float:left;">
<h1>First cell</h1>
<label class='formlabel'>Cell Title:</label><br/><input type="text" name="celltitlehere1four"><br/>
<label class='formlabel'>Cell Title Link:</label><br/><input type="text" name="celltitlelinkhere1four"><br/>
<label class='formlabel'>Cell Text:</label><br/><textarea name="celltexthere1four" class="celltexthere1four"></textarea><br/><br/>
</span>
<span style="float:left;">
<h1>Second cell</h1>
<label class='formlabel'>Cell Title:</label><br/><input type="text" name="celltitlehere2four"><br/>
<label class='formlabel'>Cell Title Link:</label><br/><input type="text" name="celltitlelinkhere2four"><br/>
<label class='formlabel'>Cell Text:</label><br/><textarea name="celltexthere2four" class="celltexthere2four"></textarea><br/><br/>
</span>
<span style="float:left;">
<h1>Third cell</h1>
<label class='formlabel'>Cell Title:</label><br/><input type="text" name="celltitlehere3four"><br/>
<label class='formlabel'>Cell Title Link:</label><br/><input type="text" name="celltitlelinkhere3four"><br/>
<label class='formlabel'>Cell Text:</label><br/><textarea name="celltexthere3four" class="celltexthere3four"></textarea><br/><br/>
</span>
<span style="float:left;" class="last">
<h1>Fourth cell</h1>
<label class='formlabel'>Cell Title:</label><br/><input type="text" name="celltitlehere4four"><br/>
<label class='formlabel'>Cell Title Link:</label><br/><input type="text" name="celltitlelinkhere4four"><br/>
<label class='formlabel'>Cell Text:</label><br/><textarea name="celltexthere4four" class="celltexthere4four"></textarea><br/><br/>
</span>
<div class="actionheader"><input type="button" class="close actionbutton" value=""><input type="button" class="resetbutton actionbutton" value="Reset"><input type="button" class="column4submit actionbutton" value="ADD"><p class="actiontitle">Add 4 Columns</p></div>
</div>

<div class="column5action actionspan" style="display:none;position:absolute;top:200px;left:300px;">
<div class="actionhelper"></div>
<span style="float:left;">
<h1>First cell</h1>
<label class='formlabel'>Cell Title:</label><br/><input type="text" name="celltitlehere1five"><br/>
<label class='formlabel'>Cell Title Link:</label><br/><input type="text" name="celltitlelinkhere1five"><br/>
<label class='formlabel'>Cell Text:</label><br/><textarea name="celltexthere1five" class="celltexthere1five"></textarea><br/><br/>
</span>
<span style="float:left;">
<h1>Second cell</h1>
<label class='formlabel'>Cell Title:</label><br/><input type="text" name="celltitlehere2five"><br/>
<label class='formlabel'>Cell Title Link:</label><br/><input type="text" name="celltitlelinkhere2five"><br/>
<label class='formlabel'>Cell Text:</label><br/><textarea name="celltexthere2five" class="celltexthere2five"></textarea><br/><br/>
</span>
<span style="float:left;">
<h1>Third cell</h1>
<label class='formlabel'>Cell Title:</label><br/><input type="text" name="celltitlehere3five"><br/>
<label class='formlabel'>Cell Title Link:</label><br/><input type="text" name="celltitlelinkhere3five"><br/>
<label class='formlabel'>Cell Text:</label><br/><textarea name="celltexthere3five" class="celltexthere3five"></textarea><br/><br/>
</span>
<span style="float:left;">
<h1>fiveth cell</h1>
<label class='formlabel'>Cell Title:</label><br/><input type="text" name="celltitlehere4five"><br/>
<label class='formlabel'>Cell Title Link:</label><br/><input type="text" name="celltitlelinkhere4five"><br/>
<label class='formlabel'>Cell Text:</label><br/><textarea name="celltexthere4five" class="celltexthere4five"></textarea><br/><br/>
</span>
<span style="float:left;" class="last">
<h1>Fifth cell</h1>
<label class='formlabel'>Cell Title:</label><br/><input type="text" name="celltitlehere5five"><br/>
<label class='formlabel'>Cell Title Link:</label><br/><input type="text" name="celltitlelinkhere5five"><br/>
<label class='formlabel'>Cell Text:</label><br/><textarea name="celltexthere5five" class="celltexthere5five"></textarea><br/><br/>
</span>
<div class="actionheader"><input type="button" class="close actionbutton" value=""><input type="button" class="resetbutton actionbutton" value="Reset"><input type="button" class="column5submit actionbutton" value="ADD"><p class="actiontitle">Add 5 Columns</p></div>
</div>

<div class="quoteaction actionspan" style="display:none;position:absolute;top:200px;left:300px;width:700px;">
<div class="actionhelper"></div>
<label class="formlabel">Quoted text:</label>
<textarea name="quotedtext" class="quotedtext" style="margin: 2% 0 0 2% !important;width: 96% !important;height:100px;"></textarea><br/><br/>
<div class="actionheader"><input type="button" class="close actionbutton" value=""><input type="button" class="resetbutton actionbutton" value="Reset"><input type="button" class="quotesubmit actionbutton" value="ADD"><p class="actiontitle">Add Quote</p></div>
</div>

<div class="listaction actionspan" style="display:none;position:absolute;top:200px;left:300px;width:700px;">
<div class="actionhelper"></div>
<label class='formlabel'>List type:</label><br/>
<input class="listtype" rel="ul" type="radio" name="listtype" value="1" checked style="float: left;margin: 10px 5px 0 0!important;width: 15px !important;"><label class='formlabel' style=" float: left;width: 15px !important;"><img src="<?php echo LISTSTYLE  ?>1.png" style="margin: 5px 0 0;"></label>
<input class="listtype" rel="ul" type="radio" name="listtype" value="2" style="float: left;margin: 10px 5px 0 0!important;width: 15px !important;"><label class='formlabel' style=" float: left;width: 15px !important;"><img src="<?php echo LISTSTYLE  ?>2.png" style="margin: 5px 0 0;"></label>
<input class="listtype" rel="ul" type="radio" name="listtype" value="3" style="float: left;margin: 10px 5px 0 0 !important;width: 15px !important;"><label class='formlabel' style=" float: left;width: 15px !important;"><img src="<?php echo LISTSTYLE  ?>3.png" style="margin: 5px 0 0;"></label>
<input class="listtype" rel="ul" type="radio" name="listtype" value="4" style="float: left;margin: 10px 5px 0 0!important;width: 15px !important;"><label class='formlabel' style=" float: left;width: 15px !important;"><img src="<?php echo LISTSTYLE  ?>4.png" style="margin: 5px 0 0;"></label>
<input class="listtype" rel="ol" type="radio" name="listtype" value="ol" style="float: left;margin: 10px 5px 0 0!important;width: 15px !important;"><label class='formlabel' style=" float: left;width: 15px !important;">1.</label>
<br/><br/>
<table style="float:left;clear:both;">
	<tbody>
	<tr class="appendlist"></tr>
	<tr>
	<td style="min-width:200px;">
	<ul class="listtext listul" style="list-style-image:url('<?php echo LISTSTYLE  ?>1.png')!important;float:left;padding:0 0 0 40px;"></ul>	
	<ol class="listtext listol" style="float:left;padding:0 0 0 40px;display:none"></ol>	
	</td>
	<td><form id="formone"><input type="text" name="oneinlist" id="oneinlist"><input type="button" class="addone" value="Add"></form></td>
	</tr>
	</tbody>
	</table>
<div class="actionheader"><input type="button" class="close actionbutton" value=""><input type="button" class="resetbutton actionbutton" value="Reset"><input type="button" class="listsubmit actionbutton" value="ADD"><p class="actiontitle">Add List</p></div>
</div>
<script type="text/javascript">

	jQuery(".listtype").click(function(){
		var type = jQuery(this).val();
		var rel = jQuery(this).attr('rel');
		if(rel == "ol"){
			jQuery('.listul').css('display','none');
			jQuery('.listol').css('display','block');
		}else{
			jQuery('.listul').css('display','block');
			jQuery('.listol').css('display','none');
			jQuery('.listul').attr('style','list-style-image:url(<?php echo LISTSTYLE; ?>'+type+'.png)!important;float:left;padding:0 0 0 40px;');
		}
	});
	jQuery("#formone").bind("keypress", function(e) {
             if (e.keyCode == 13) {
                 var value = jQuery("#oneinlist").val();
                 if(value !== ""){
			jQuery('.appendtip').append("<td>"+jQuery("#oneinlist").val()+"</td>");
			jQuery('.listtext').append("<li><span>"+jQuery("#oneinlist").val()+"</span></li>");
				jQuery("#oneinlist").val('');
                 }
                 return false;
            }
         });
	jQuery(".addone").click(function() {
 		var value = jQuery("#oneinlist").val();
                 if(value !== ""){
			jQuery('.appendtip').append("<td>"+jQuery("#oneinlist").val()+"</td>");
			jQuery('.listtext').append("<li><span>"+jQuery("#oneinlist").val()+"</span></li>");
			jQuery("#oneinlist").val('');
                 }
 	});
</script>

<div class="tabbedction actionspan" style="display:none;position:absolute;top:200px;left:300px;">
<div class="actionhelper"></div>
<span style="float:left;">
<h1>First</h1>
<label class='formlabel'>Tab button:</label><br/><input type="text" name="tabbutton1"><br/>
<label class='formlabel'>Tab Text:</label><br/><textarea name="tabtext1" class="tabtext1"></textarea><br/><br/>
</span>
<span style="float:left;">
<h1>Second</h1>
<label class='formlabel'>Tab button:</label><br/><input type="text" name="tabbutton2"><br/>
<label class='formlabel'>Tab Text:</label><br/><textarea name="tabtext2" class="tabtext2"></textarea><br/><br/>
</span>
<span style="float:left;">
<h1>Third</h1>
<label class='formlabel'>Tab button:</label><br/><input type="text" name="tabbutton3"><br/>
<label class='formlabel'>Tab Text:</label><br/><textarea name="tabtext1" class="tabtext3"></textarea><br/><br/>
</span>
<span style="float:left;" class="last">
<h1>Fourth</h1>
<label class='formlabel'>Tab button:</label><br/><input type="text" name="tabbutton4"><br/>
<label class='formlabel'>Tab Text:</label><br/><textarea name="tabtext4" class="tabtext4"></textarea><br/><br/>
</span>
<div class="actionheader"><input type="button" class="close actionbutton" value=""><input type="button" class="resetbutton actionbutton" value="Reset"><input type="button" class="tabbedsubmit actionbutton" value="ADD"><p class="actiontitle">Add Tabbed Content</p></div>
</div>

<div class="piroboxaction actionspan" style="display:none;position:absolute;top:200px;left:300px;width:500px;">
<div class="actionhelper"></div>
<!--<span style="float:left;">
<h1>First</h1>
<label class='formlabel'>Tab button:</label><br/><input type="text" name="tabbutton1"><br/>
<label class='formlabel'>Tab Text:</label><br/><textarea name="tabtext1" class="tabtext1"></textarea><br/><br/>
</span>-->
<div class="submenu">
<br/>
<input type="button" class="actionbutton video" value="YouTube">
<input type="button" class="actionbutton video" value="Vimeo">
<input type="button" class="actionbutton site" value="Website">
<input type="button" class="actionbutton showpiroimage" value="Image">
</div>
	<div class="piroimagespan subsubmenu">
		<span style="float:left;border:0;width:290px!important;">
			<h1>Insert Image</h1>
			<label class='formlabel'>Image url:</label><br/><input type="text" class="piroimageimageurl" name="piroimageimageurl"><br/>
			<label class='formlabel'>Title:</label><br/><input type="text" class="piroimageimagetitle" name="piroimageimagetitle"><br/>
			<input type="button" class="actionbutton piroimageimage" value="Image as link"> 
			<label class='formlabel'>Element or text:</label><br/><input type="text" name="piroimageelement" class="piroimageelement" value=""><br/>
		</span>
		
		<div class="imageimageaslink" style="background:#DBD9D9!important;float: left;">
		<span style="float:left;border:0;width:290px!important;">
			<h1>Insert Image</h1>
			<label class='formlabel'>Image url:</label><br/><input type="text" class="imageimageurl" name="imageimageurl"><br/>
			<label class='formlabel'>Title:</label><br/><input type="text" class="imageimagetitle" name="imageimagetitle"><br/>
			<label class='formlabel'>Width:</label><br/><input type="text" name="imageimagewidth" value="200"><br/>
			<label class='formlabel'>Height:</label><br/><input type="text" name="imageimageheight" value="200"><br/>
			<label class='formlabel'>Border:</label><br/><label class='formlabel' style=" float: left;width: 30px !important;">Yes</label><input type="radio" name="imageimageborder" value="yes" checked style="float: left;margin: 10px 0 0 !important;width: 30px !important;"><label class='formlabel' style=" float: left;width: 30px !important;">No</label><input type="radio" name="imageimageborder" value="no" style="float: left;margin: 10px 0 0 !important;width: 30px !important;"><br/>
		</span>
		<span  style="float:left;padding:157px 0 0 0;border:0;width:10px!important;">
		<br/>px<br/><br/><br/>px
		</span>
		<span style="float:left;border:0;width:458px !important">
			<div class="image-popup">
					
					
					<?php
					
					$min_width = 0;
					
					global $wpdb;
					$media_images = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_type = 'attachment' order by ID desc");
					
					?>
					
					<ul>
					
						<?php
						foreach($media_images as $image_post){
							
							$img_details = wp_get_attachment_image_src($image_post->ID, 'full');
							
							//If image is big enough for the slider proceed
							if($img_details[1] >= $min_width){
							
								$thumb_src = wp_get_attachment_image_src($image_post->ID, 'jw_100');
								$thumb_src = $thumb_src[0];
								
								if(!empty($active_imgs) && in_array($image_post->ID, $active_imgs)){ $class_attr .= ' class="added"'; } else { $class_attr = ''; }
								
								?>
								<li<?php echo $class_attr; ?>>
									<img src="<?php echo $thumb_src; ?>" title="<?php echo $image_post->post_title; ?>" alt="<?php echo $img_details[0] ?>"  class="small-image-image"/>
									<!--<span class="img-size"><?php echo $img_details[1].'x'.$img_details[2]; ?></span>
									<span class="added-notice"><?php _e('Added', $domain); ?></span>-->
								</li>
								<?php
								
							}
							
						}
						?>
						
					</ul>
					
				</div><!-- .metabox-slider-media -->
				<script type="text/javascript">
					jQuery('.small-image-image').live('click',function(){
						var img = jQuery(this).attr('alt');
						var title = jQuery(this).attr('title');
						jQuery('.imageimageurl').empty().val(img);
						jQuery('.imageimagetitle').empty().val(title);
					});
				</script>
				<input type="button" class="actionbutton addimageImage" value="Add Image">
		</div>
		<span style="float:left;border:0;width:458px !important">
			<div class="image-popup">
					
					
					<?php
					
					$min_width = 0;
					
					global $wpdb;
					$media_images = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_type = 'attachment' order by ID desc");
					
					?>
					
					<ul>
					
						<?php
						foreach($media_images as $image_post){
							
							$img_details = wp_get_attachment_image_src($image_post->ID, 'full');
							
							//If image is big enough for the slider proceed
							if($img_details[1] >= $min_width){
							
								$thumb_src = wp_get_attachment_image_src($image_post->ID, 'jw_100');
								$thumb_src = $thumb_src[0];
								
								if(!empty($active_imgs) && in_array($image_post->ID, $active_imgs)){ $class_attr .= ' class="added"'; } else { $class_attr = ''; }
								
								?>
								<li<?php echo $class_attr; ?>>
									<img src="<?php echo $thumb_src; ?>" title="<?php echo $image_post->post_title; ?>" alt="<?php echo $img_details[0] ?>"  class="small-image-piroimage"/>
									<!--<span class="img-size"><?php echo $img_details[1].'x'.$img_details[2]; ?></span>
									<span class="added-notice"><?php _e('Added', $domain); ?></span>-->
								</li>
								<?php
								
							}
							
						}
						?>
						
					</ul>
					
				</div><!-- .metabox-slider-media -->
				<script type="text/javascript">
					jQuery('.small-image-piroimage').live('click',function(){
						var img = jQuery(this).attr('alt');
						var title = jQuery(this).attr('title');
						jQuery('.piroimageimageurl').empty().val(img);
						jQuery('.piroimageimagetitle').empty().val(title);
					});
				</script>
				
			</div>	
	
	
	
	<div class="sitespan subsubmenu">
		
		<label class='formlabel'>Link:</label><br/><input type="text" name="sitelink"><br/>
		<label class='formlabel'>Title:</label><br/><input type="text" name="sitetitle"><br/>
		<input type="button" class="actionbutton siteimage" value="Image as link"> 
		<label class='formlabel'>Element or text:</label><br/><input type="text" name="siteelement" class="siteelement" value=""><br/>
	<div class="siteimageaslink">
		<span style="float:left;border:0;width:290px!important;">
			<h1>Insert Image</h1>
			<label class='formlabel'>Image url:</label><br/><input type="text" class="siteimageurl" name="siteimageurl"><br/>
			<label class='formlabel'>Title:</label><br/><input type="text" class="siteimagetitle" name="siteimagetitle"><br/>
			<label class='formlabel'>Width:</label><br/><input type="text" name="siteimagewidth" value="200"><br/>
			<label class='formlabel'>Height:</label><br/><input type="text" name="siteimageheight" value="200"><br/>
			<label class='formlabel'>Border:</label><br/><label class='formlabel' style=" float: left;width: 30px !important;">Yes</label><input type="radio" name="siteimageborder" value="yes" checked style="float: left;margin: 10px 0 0 !important;width: 30px !important;"><label class='formlabel' style=" float: left;width: 30px !important;">No</label><input type="radio" name="siteimageborder" value="no" style="float: left;margin: 10px 0 0 !important;width: 30px !important;"><br/>
		</span>
		<span  style="float:left;padding:157px 0 0 0;border:0;width:10px!important;">
		<br/>px<br/><br/><br/>px
		</span>
		<span style="float:left;border:0;width:458px !important">
			<div class="image-popup">
					
					
					<?php
					
					$min_width = 0;
					
					global $wpdb;
					$media_images = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_type = 'attachment' order by ID desc");
					
					?>
					
					<ul>
					
						<?php
						foreach($media_images as $image_post){
							
							$img_details = wp_get_attachment_image_src($image_post->ID, 'full');
							
							//If image is big enough for the slider proceed
							if($img_details[1] >= $min_width){
							
								$thumb_src = wp_get_attachment_image_src($image_post->ID, 'jw_100');
								$thumb_src = $thumb_src[0];
								
								if(!empty($active_imgs) && in_array($image_post->ID, $active_imgs)){ $class_attr .= ' class="added"'; } else { $class_attr = ''; }
								
								?>
								<li<?php echo $class_attr; ?>>
									<img src="<?php echo $thumb_src; ?>" title="<?php echo $image_post->post_title; ?>" alt="<?php echo $img_details[0] ?>"  class="small-image-site"/>
									<!--<span class="img-size"><?php echo $img_details[1].'x'.$img_details[2]; ?></span>
									<span class="added-notice"><?php _e('Added', $domain); ?></span>-->
								</li>
								<?php
								
							}
							
						}
						?>
						
					</ul>
					
				</div><!-- .metabox-slider-media -->
				<script type="text/javascript">
					jQuery('.small-image-site').live('click',function(){
						var img = jQuery(this).attr('alt');
						var title = jQuery(this).attr('title');
						jQuery('.siteimageurl').empty().val(img);
						jQuery('.siteimagetitle').empty().val(title);
					});
				</script>
				<input type="button" class="actionbutton addsiteImage" value="Add Image">
			</div>
	
	</div>
	<div class="videospan subsubmenu">
		<div class="YouTubeHelp helper" style="background:#fff;">
		<code>
		 Link Examples:<br/>
		 http://youtu.be/c00uzdsdG-4<br/>
		 http://www.youtube.com/watch?v=c00uzdsdG-4<br/>
		 http://www.youtube.com/watch?v=c00uzdsdG-4&someotherYoutubeValues
		 </code>
		</div>
		<div class="VimeoHelp helper">
		<code>
		Link Examples:<br/>
		Paste url from address bar.<br/>
		http://vimeo.com/14592941
		</code>
		</div>
		<span style="float:left;width: 96%;">
	<h1>Pirobox - Video</h1>
	<label class='formlabel'>Link:</label><br/><input type="text" name="pirolink"><br/>
	<label class='formlabel'>Title:</label><br/><input type="text" name="pirotitle"><br/>
	<label class='formlabel'>Width:</label><br/><input type="text" name="pirowidth" value="400"><br/>
	<label class='formlabel'>Height:</label><br/><input type="text" name="piroheight" value="300"><br/>
	<input type="button" class="actionbutton piroimage" value="Image as link"> 
	<label class='formlabel'>Element or text:</label><br/><input type="text" name="piroelement" class="piroelement" value=""><br/>
	
	</span>
		
	</div>
	<div class="imageaslink">
		<span style="float:left;border:0;width:290px!important;">
			<h1>Insert Image</h1>
			<label class='formlabel'>Image url:</label><br/><input type="text" class="piroimageurl" name="piroimageurl"><br/>
			<label class='formlabel'>Title:</label><br/><input type="text" class="piroimagetitle" name="piroimagetitle"><br/>
			<label class='formlabel'>Width:</label><br/><input type="text" name="piroimagewidth" value="200"><br/>
			<label class='formlabel'>Height:</label><br/><input type="text" name="piroimageheight" value="200"><br/>
			<label class='formlabel'>Border:</label><br/><label class='formlabel' style=" float: left;width: 30px !important;">Yes</label><input type="radio" name="piroimageborder" value="yes" checked style="float: left;margin: 10px 0 0 !important;width: 30px !important;"><label class='formlabel' style=" float: left;width: 30px !important;">No</label><input type="radio" name="piroimageborder" value="no" style="float: left;margin: 10px 0 0 !important;width: 30px !important;"><br/>
		</span>
		<span  style="float:left;padding:157px 0 0 0;border:0;width:10px!important;">
		<br/>px<br/><br/><br/>px
		</span>
		<span style="float:left;border:0;width:458px !important">
			<div class="image-popup">
					
					
					<?php
					
					$min_width = 0;
					
					global $wpdb;
					$media_images = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_type = 'attachment' order by ID desc");
					
					?>
					
					<ul>
					
						<?php
						foreach($media_images as $image_post){
							
							$img_details = wp_get_attachment_image_src($image_post->ID, 'full');
							
							//If image is big enough for the slider proceed
							if($img_details[1] >= $min_width){
							
								$thumb_src = wp_get_attachment_image_src($image_post->ID, 'jw_100');
								$thumb_src = $thumb_src[0];
								
								if(!empty($active_imgs) && in_array($image_post->ID, $active_imgs)){ $class_attr .= ' class="added"'; } else { $class_attr = ''; }
								
								?>
								<li<?php echo $class_attr; ?>>
									<img src="<?php echo $thumb_src; ?>" title="<?php echo $image_post->post_title; ?>" alt="<?php echo $img_details[0] ?>"  class="small-image-piro"/>
									<!--<span class="img-size"><?php echo $img_details[1].'x'.$img_details[2]; ?></span>
									<span class="added-notice"><?php _e('Added', $domain); ?></span>-->
								</li>
								<?php
								
							}
							
						}
						?>
						
					</ul>
					
				</div><!-- .metabox-slider-media -->
				<script type="text/javascript">
					jQuery('.small-image-piro').live('click',function(){
						var img = jQuery(this).attr('alt');
						var title = jQuery(this).attr('title');
						jQuery('.piroimageurl').empty().val(img);
						jQuery('.piroimagetitle').empty().val(title);
					});
				</script>
				<input type="button" class="actionbutton addPiroImage" value="Add Image">
		</span>
	</div>
<div class="actionheader"><input type="button" class="close actionbutton" value=""><input type="button" class="resetbutton actionbutton" value="Reset"><input type="button" class="piroboxsubmit actionbutton" value="ADD"><p class="actiontitle">Pirobox</p></div>
</div>




<script type="text/javascript">

jQuery(document).ready(function(){
	
	jQuery('.videospan').hide();
	jQuery('.subsubmenu').hide();
	jQuery('.imageaslink').hide();
	jQuery('.imageimageaslink').hide();
	jQuery('.siteimageaslink').hide();
	jQuery('.helper').hide();
	jQuery('.video').click(function(){
		jQuery('.piroboxsubmit').removeClass('sitesubmit');
		jQuery('.piroboxsubmit').removeClass('piroimagesubmit');
		jQuery('.piroboxsubmit').addClass('videosubmit');
		var type = jQuery(this).val();
		jQuery('.submenu').hide();
		jQuery('.subsubmenu').hide();
		jQuery('.helper').hide();
		jQuery('.videospan').show();
		jQuery('.'+type+'Help').show();
	});
	jQuery('.piroimage').click(function(){
		jQuery('.imageaslink').show();
	});
	jQuery('.addPiroImage').click(function(){
		var piroimgurl = jQuery('input[type=text][name=piroimageurl]').val();
		var piroimgtitle = jQuery('input[type=text][name=piroimagetitle]').val();
		var piroimagewidth = jQuery('input[type=text][name=piroimagewidth]').val();
		var piroimageheight = jQuery('input[type=text][name=piroimageheight]').val();
		var piroimageborder = jQuery('input[type="radio"][name=piroimageborder]:checked').val();
		insert = '[imgpirobox border="'+piroimageborder+'" src="'+piroimgurl+'" title="'+piroimgtitle+'" width="'+piroimagewidth+'" height="'+piroimageheight+'"]';
		jQuery('.piroelement').val(insert);
		jQuery('.imageaslink').hide();
	});
	jQuery('.showpiroimage').click(function(){
		jQuery('.imageimageaslink').hide();
		jQuery('.piroboxsubmit').addClass('piroimagesubmit');
		jQuery('.piroboxsubmit').removeClass('sitesubmit');
		jQuery('.piroboxsubmit').removeClass('videosubmit');
		jQuery('.submenu').hide();
		jQuery('.siteimageaslink').hide();
		jQuery('.subsubmenu').hide();
		jQuery('.helper').hide();
		jQuery('.piroimagespan').show();
	});
	jQuery('.piroimageimage').click(function(){
		jQuery('.imageimageaslink').show();
	});
	jQuery('.addimageImage').click(function(){
		var imageimgurl = jQuery('input[type=text][name=imageimageurl]').val();
		var imageimgtitle = jQuery('input[type=text][name=imageimagetitle]').val();
		var imageimagewidth = jQuery('input[type=text][name=imageimagewidth]').val();
		var imageimageheight = jQuery('input[type=text][name=imageimageheight]').val();
		var imageimageborder = jQuery('input[type="radio"][name=imageimageborder]:checked').val();
		insert = '[imgpirobox border="'+imageimageborder+'" src="'+imageimgurl+'" title="'+imageimgtitle+'" width="'+imageimagewidth+'" height="'+imageimageheight+'"]';
		jQuery('.piroimageelement').val(insert);
		jQuery('.imageimageaslink').hide();
	});
	jQuery('.site').click(function(){
		jQuery('.piroboxsubmit').addClass('sitesubmit');
		jQuery('.piroboxsubmit').removeClass('videosubmit');
		jQuery('.piroboxsubmit').removeClass('piroimagesubmit');
		jQuery('.submenu').hide();
		jQuery('.siteimageaslink').hide();
		jQuery('.subsubmenu').hide();
		jQuery('.helper').hide();
		jQuery('.sitespan').show();
	});
	jQuery('.siteimage').click(function(){
		jQuery('.siteimageaslink').show();
	});
	jQuery('.addsiteImage').click(function(){
		var siteimgurl = jQuery('input[type=text][name=siteimageurl]').val();
		var siteimgtitle = jQuery('input[type=text][name=siteimagetitle]').val();
		var siteimagewidth = jQuery('input[type=text][name=siteimagewidth]').val();
		var siteimageheight = jQuery('input[type=text][name=siteimageheight]').val();
		var siteimageborder = jQuery('input[type="radio"][name=siteimageborder]:checked').val();
		insert = '[imgpirobox border="'+siteimageborder+'" src="'+siteimgurl+'" title="'+siteimgtitle+'" width="'+siteimagewidth+'" height="'+siteimageheight+'"]';
		jQuery('.siteelement').val(insert);
		jQuery('.siteimageaslink').hide();
	});
});

jQuery(function($){
jQuery.fn.center = function () {
    this.css("position","absolute");
    var topx = jQuery('#wpbody-content').position();
    this.css("top", ( topx.top + 50 + "px"));
    this.css("left", ( jQuery(window).width() - this.width() ) / 2 + "px");
    return this;
}
});

jQuery.fn.extend({
insertAtCaret: function(myValue){
  return this.each(function(i) {
    if (document.selection) {
      this.focus();
      sel = document.selection.createRange();
      sel.text = myValue;
      this.focus();
    }
    else if (this.selectionStart || this.selectionStart == '0') {
      var startPos = this.selectionStart;
      var endPos = this.selectionEnd;
      var scrollTop = this.scrollTop;
      this.value = this.value.substring(0, startPos)+myValue+this.value.substring(endPos,this.value.length);
      this.focus();
      this.selectionStart = startPos + myValue.length;
      this.selectionEnd = startPos + myValue.length;
      this.scrollTop = scrollTop;
    } else {
      this.value += myValue;
      this.focus();
    }
  })
}
});

jQuery(function($){
	jQuery('.resetbutton').live('click',function(){
		jQuery('input[type=text]','#panel').val('');
		jQuery('textarea','#panel').val('');
                jQuery('.appendtip').empty();
                jQuery('.listtext').empty();
		jQuery("#oneinlist").val('');
                
	});
	jQuery('.column1action').center();
	jQuery('.column2action').center();
	jQuery('.column3action').center();
	jQuery('.column4action').center();
	jQuery('.column5action').center();
	jQuery('.h2action').center();
        jQuery('.h1h2action').center();
	jQuery('.addbuttonaction').center();
	jQuery('.formaction').center();
	jQuery('.tabbedction').center();
	jQuery('.imageaction').center();
	jQuery('.piroboxaction').center();
	jQuery('.quoteaction').center();
	jQuery('.listaction').center();
});

jQuery(document).ready(function($) {
	
	jQuery('.thepreviewbutton').css('background-image','url(<?php echo get_template_directory_uri().'/themesaholic/style/img/button-white.png)'?>').css('background-position','left top').css('display','block');
	
	jQuery('.close').click(function(){
		jQuery('.actionspan').css('display','none');
	})

	//Buttons
	jQuery('.addbutton').click(function(){
		jQuery('.actionhelper').hide();
		jQuery('.addbuttonaction').css('display','block');		
	});
	
	
	jQuery('.buttonsubmit').click(function(){
		
		var buttonurl = jQuery('input[type=text][name=buttonurl]').val();
		var buttonleftmargin = jQuery('input[type=text][name=buttonleftmargin]').val();
		var buttonalign = jQuery('.buttonalign').val();
		var buttonvalue = jQuery('input[type=text][name=buttonvalue]').val();
		var buttoncolor = jQuery('.colorofbutton').val();
		
		if(buttonvalue !== "" && buttonurl !== ""){
		
		
		var insert = '[button url="'+buttonurl+'" ';
		if(buttoncolor !== ""){
			insert = insert + ' color="'+buttoncolor+'" ';			
		}
		if(buttonalign !== ""){
			insert = insert + ' align="'+buttonalign+'" ';			
		}
		if(buttonleftmargin !== ""){
			insert = insert + ' margin="'+buttonleftmargin+'" ';			
		}
		insert = insert + ' color="'+buttoncolor+"'";
		insert = insert + ']'+buttonvalue+'[/button]';
		
		jQuery('#content').insertAtCaret(insert);
		jQuery('.addbuttonaction').css('display','none');
		}else{
			jQuery('.actionhelper','.addbuttonaction').empty().append('You need to insert Button Url and Button Value').slideDown();		
		}
	});
	
	//H2
	jQuery('.addh2').click(function(){
		jQuery('.actionhelper').hide();
		jQuery('.h2action').css('display','block');		
	});
	// H1 H2 H3
        jQuery('.addh1h2').click(function(){
		jQuery('.actionhelper').hide();
		jQuery('.h1h2action').css('display','block');		
	});
        
	
	jQuery('.h2submit').click(function(){
		
		var h2image = jQuery('input[type=text][name=h2image]').val();
		var h2titlehere = jQuery('input[type=text][name=h2titlehere]').val();
		var h2undertitlehere = jQuery('input[type=text][name=h2undertitlehere]').val();
		if(h2titlehere !== ""){
		
		var insert = '[h2_with_sub';
		if(h2image !== ""){
			insert = insert + ' image="'+h2image+'"';
		}
		if(h2undertitlehere !== ""){
			insert = insert + ' subtitle="'+h2undertitlehere+'"';			
		}
		insert = insert + ']'+h2titlehere+'[/h2_with_sub]';
		
		jQuery('#content').insertAtCaret(insert);
		jQuery('.h2action').css('display','none');
		}else{
			
			jQuery('.actionhelper','.h2action').empty().append('You need to insert H2 title').slideDown();			
		}
	});
        
        jQuery('.h1h2submit').click(function(){
		
		var text = jQuery('input[type=text][name=headingtext]').val();
		var type = jQuery('select[name=headingtype]').attr("selected", true).val();
		
		if(text !== ""){
		
		var insert = '[heading type="'+type+'" ]'+text+'[/heading]';
		
			
		jQuery('#content').insertAtCaret(insert);
		jQuery('.h1h2action').css('display','none');
		}else{
			
			jQuery('.actionhelper','.h1h2action').empty().append('You need to insert heading text').slideDown();			
		}
	});


	
	// Break
	jQuery('.break').click(function(){
		jQuery('#content').insertAtCaret('\n[break]\n');
	});
        jQuery('.separator').click(function(){
            jQuery('#content').insertAtCaret('\n[separator]\n');
        });
	jQuery('.line').click(function(){
		jQuery('#content').insertAtCaret('\n[line]\n');
	});
	//Image 
	jQuery('.addimage').click(function(){
		jQuery('.actionhelper').hide();
		jQuery('.imageaction').css('display','block');	
	});
	jQuery('.imagesubmit').click(function(){
		
		var imageurl = jQuery('input[type=text][name=imageurl]').val()
		var imagetitle = jQuery('input[type=text][name=imagetitle]').val()
		var imagewidth = jQuery('input[type=text][name=imagewidth]').val()
		var imageheight = jQuery('input[type=text][name=imageheight]').val()
		var imagealign = jQuery('.imagealign').val();
		var imageborder = jQuery('input[type="radio"][name=imageborder]:checked').val();
		
		jQuery('#content').insertAtCaret('[img border="'+imageborder+'" align="'+imagealign+'" src="'+imageurl+'" title="'+imagetitle+'" width="'+imagewidth+'" height="'+imageheight+'"]');
		jQuery('.imageaction').css('display','none');
	});
	
	//Tabbed
	jQuery('.addtabbed').click(function(){
		jQuery('.actionhelper').hide();
		jQuery('.tabbedction').css('display','block');	
	});
	jQuery('.tabbedsubmit').click(function(){
		var tabbutton1 = jQuery('input[type=text][name=tabbutton1]').val();
		var tabtext1 = jQuery('.tabtext1').val();
		var tabbutton2 = jQuery('input[type=text][name=tabbutton2]').val();
		var tabtext2 = jQuery('.tabtext2').val();
		var tabbutton3 = jQuery('input[type=text][name=tabbutton3]').val();
		var tabtext3 = jQuery('.tabtext3').val();
		var tabbutton4 = jQuery('input[type=text][name=tabbutton4]').val();
		var tabtext4 = jQuery('.tabtext4').val();
		
		insert = '[tabgroup]';
		if(tabbutton1 !== ""){
			insert = insert + '\n[tab title="'+tabbutton1+'" ]\n'+tabtext1+'\n[/tab]';		
		}
		if(tabbutton2 !== ""){
			insert = insert + '\n[tab title="'+tabbutton2+'" ]\n'+tabtext2+'\n[/tab]';		
		}
		if(tabbutton3 !== ""){
			insert = insert + '\n[tab title="'+tabbutton3+'" ]\n'+tabtext3+'\n[/tab]';		
		}
		if(tabbutton4 !== ""){
			insert = insert + '\n[tab title="'+tabbutton4+'" ]\n'+tabtext4+'\n[/tab]';		
		}
		
		insert = insert + "[/tabgroup]"
		jQuery('#content').insertAtCaret(insert);
		jQuery('.actionspan').css('display','none');
	});	
	
	//Pirobox
	jQuery('.addpirobox').click(function(){
		jQuery('.actionhelper').hide();
		jQuery('.helper').hide();
		jQuery('.imageaslink').hide();
		jQuery('.subsubmenu').hide();
		jQuery('.submenu').show();
		jQuery('.piroboxaction').css('display','block');	
	});
	jQuery('.videosubmit').live('click',function(){
		var link = jQuery('input[type=text][name=pirolink]').val();
		var title = jQuery('input[type=text][name=pirotitle]').val();
		var width = jQuery('input[type=text][name=pirowidth]').val();
		var height = jQuery('input[type=text][name=piroheight]').val();
		var element = jQuery('input[type=text][name=piroelement]').val();
		
		
		insert = '[pirobox link="'+link+'" title="'+title+'" width="'+width+'" height="'+height+'"]';
		insert = insert + element;
		insert = insert + "[/pirobox]";
		jQuery('#content').insertAtCaret(insert);
		jQuery('.actionspan').css('display','none');
	});
	
	jQuery('.piroimagesubmit').live('click',function(){
		
		var link = jQuery('input[type=text][name=piroimageimageurl]').val();
		var title = jQuery('input[type=text][name=piroimageimagetitle]').val();
		var element = jQuery('input[type=text][name=piroimageelement]').val();
		
		
		insert = '[pirobox link="'+link+'" title="'+title+'"]';
		insert = insert + element;
		insert = insert + "[/pirobox]";
		jQuery('#content').insertAtCaret(insert);
		jQuery('.actionspan').css('display','none');
		
	});
	jQuery('.sitesubmit').live('click',function(){
		var link = jQuery('input[type=text][name=sitelink]').val();
		var title = jQuery('input[type=text][name=sitetitle]').val();
		var element = jQuery('input[type=text][name=siteelement]').val();
		
		
		insert = '[pirobox link="'+link+'" title="'+title+'" type="site"]';
		insert = insert + element;
		insert = insert + "[/pirobox]";
		jQuery('#content').insertAtCaret(insert);
		jQuery('.actionspan').css('display','none');
	});
	
	//Quote
	
	jQuery('.addquote').click(function(){
		jQuery('.actionhelper').hide();
		jQuery('.quoteaction').css('display','block');
	});
	
	jQuery('.quotesubmit').click(function(){
		var text = jQuery('.quotedtext').val();
		insert = '[quote]'+text+'[/quote]';
		jQuery('#content').insertAtCaret(insert);
		jQuery('.actionspan').css('display','none');
		
	});

	//List
	
	jQuery('.addlist').click(function(){
		jQuery('.actionhelper').hide();
		jQuery('.listaction').css('display','block');
	});
	
	jQuery('.listsubmit').click(function(){
		var text = jQuery('.listtext').html();
		var type = jQuery('input[type=radio][name=listtype]:checked').val();
		insert = '[list type="'+type+'"]'+text+'[/list]';
		jQuery('#content').insertAtCaret(insert);
		jQuery('.actionspan').css('display','none');
		
	});
	
	
	//Form
	jQuery('.addform').click(function(){
		jQuery('.actionhelper').hide();
		jQuery('.formaction').css('display','block');
	});
	jQuery('.addformsubmit').click(function(){
		var x = jQuery('input[type=radio][name=formposition]:checked').val();
		var text = jQuery('.formtext').val();
		var validemail = jQuery('input[type=text][name=insertvalidemail]').val();
		var inputname = jQuery('input[type=text][name=namemustbefilled]').val();
		var insertmessage = jQuery('input[type=text][name=pleaseinsertmessage]').val();
		var messagesent = jQuery('input[type=text][name=messagesent]').val();
		if(x == 'formleft'){
			insert = "\n\n[twothird]\n [form validemail='"+validemail+"' insertname='"+inputname+"' insertmessage='"+insertmessage+"' messagesent='"+messagesent+"'] \n[/twothird]\n\n [onethird_last from='onlyfullwidth']\n"+ text +"\n[/onethird_last]\n\n";
		}else{
			insert = "\n\n[onethird from='onlyfullwidth'] \n" + text + "\n[/onethird] \n\n [twothird_last] \n [form validemail='"+validemail+"' insertname='"+inputname+"' insertmessage='"+insertmessage+"' messagesent='"+messagesent+"'] \n [/twothird_last]\n\n";
		}

		jQuery('#content').insertAtCaret(insert);
		jQuery('.actionspan').css('display','none');
	});

	//column 1
    jQuery('.column1').click(function(){
    	jQuery('.actionhelper').hide();
		 jQuery('.column1action').css('display','block');
		
	});
	
	jQuery('.column1submit').click(function(){
		var cellimagehere1 = jQuery('input[type=text][name=cellimagehere1two1]').val();
		var celltitlehere1 = jQuery('input[type=text][name=celltitlehere1two1]').val();
		var celltitlelinkhere1 = jQuery('input[type=text][name=celltitlelinkhere1two1]').val();
		var cellundertitlehere1 = jQuery('input[type=text][name=cellundertitlehere1two1]').val();
		var celltexthere1 = jQuery('.celltexthere1two1').val();
		if(cellimagehere1 == "undefined"){
                    cellimagehere1 = "";
                }
		var insert = '[fullwidth]\n';
		
		if(celltitlehere1 !== ""){
			insert = insert + '[titles]\n [cell_title ';
		
			if(celltitlelinkhere1 !== ""){
				insert = insert + ' link="'+celltitlelinkhere1+'"';
			}
		
			insert = insert + ']'+celltitlehere1+' [/cell_title]\n';
		}
		
		if(celltitlehere1 !== ""){
			insert = insert + "\n[/titles]";
		}
		if(celltexthere1 !== ""){
			insert = insert + '\n[cell_text]'+celltexthere1+' [/cell_text]\n'
		}
		insert = insert + '\n[/fullwidth]\n';
		
				
		
	jQuery('#content').insertAtCaret(insert);
	jQuery('.column1action').css('display','none');
		
		
	});
	
	// column 2
	jQuery('.column2').click(function(){
    	jQuery('.actionhelper').hide();
		 jQuery('.column2action').css('display','block');
		
	});
	jQuery('.column2submit').click(function(){
		var cellimagehere1 = jQuery('input[type=text][name=cellimagehere1two]').val();
		var cellimagehere2 = jQuery('input[type=text][name=cellimagehere2two]').val();
                if(cellimagehere1 == "undefined"){
                    cellimagehere1 = "";
                }
                if(cellimagehere2 == "undefined"){
                    cellimagehere2 = "";
                }
		var celltitlehere1 = jQuery('input[type=text][name=celltitlehere1two]').val();
		var celltitlehere2 = jQuery('input[type=text][name=celltitlehere2two]').val();
		var celltitlelinkhere1 = jQuery('input[type=text][name=celltitlelinkhere1two]').val();
		var celltitlelinkhere2 = jQuery('input[type=text][name=celltitlelinkhere2two]').val();
		var cellundertitlehere1 = jQuery('input[type=text][name=cellundertitlehere1two]').val();
		var cellundertitlehere2 = jQuery('input[type=text][name=cellundertitlehere2two]').val();
		var celltexthere1 = jQuery('.celltexthere1two').val();
		var celltexthere2 = jQuery('.celltexthere2two').val();
		
		var insert = '[two-columns]\n [onehalf]\n';
		
		if(celltitlehere1 !== ""){
			insert = insert + '[titles]\n [cell_title ';
		
			if(celltitlelinkhere1 !== ""){
				insert = insert + ' link="'+celltitlelinkhere1+'"';
			}
		
			insert = insert + ']'+celltitlehere1+' [/cell_title]\n';
		
		
                
			insert = insert + "\n[/titles]";
                }
		if(celltexthere1 !== ""){
			insert = insert + '\n[cell_text]'+celltexthere1+' [/cell_text]\n'
		}
		insert = insert + '\n[/onehalf]\n\r\n[onehalf_last]\n';
		
		
		if(celltitlehere2 !== ""){
			insert = insert + '[titles]\n [cell_title ';
		
			if(celltitlelinkhere2 !== ""){
				insert = insert + ' link="'+celltitlelinkhere2+'"';
			}
		
			insert = insert + ']'+celltitlehere2+' [/cell_title]\n';
		
		
               
			insert = insert + "\n[/titles]";
                }
		if(celltexthere2 !== ""){
			insert = insert + '\n[cell_text]'+celltexthere2+' [/cell_text]\n ';
		}
		insert = insert + '\n[/onehalf_last]\n\r [/two-columns]\n\r ';
		
		
		
		
	jQuery('#content').insertAtCaret(insert);
	jQuery('.column2action').css('display','none');
		
		
	});
	
	//Column 3
    jQuery('.column3').click(function(){
    	jQuery('.actionhelper').hide();
		 jQuery('.column3action').css('display','block');
		
	});
	jQuery('.column3submit').click(function(){
		var cellimagehere1 = jQuery('input[type=text][name=cellimagehere1]').val();
		var cellimagehere2 = jQuery('input[type=text][name=cellimagehere2]').val();
		var cellimagehere3 = jQuery('input[type=text][name=cellimagehere3]').val();
                if(cellimagehere1 == "undefined"){
                    cellimagehere1 = "";
                }
                if(cellimagehere2 == "undefined"){
                    cellimagehere2 = "";
                }
                if(cellimagehere3 == "undefined"){
                    cellimagehere3 = "";
                }
		var celltitlehere1 = jQuery('input[type=text][name=celltitlehere1]').val();
		var celltitlehere2 = jQuery('input[type=text][name=celltitlehere2]').val();
		var celltitlehere3 = jQuery('input[type=text][name=celltitlehere3]').val();
		var celltitlelinkhere1 = jQuery('input[type=text][name=celltitlelinkhere1]').val();
		var celltitlelinkhere2 = jQuery('input[type=text][name=celltitlelinkhere2]').val();
		var celltitlelinkhere3 = jQuery('input[type=text][name=celltitlelinkhere3]').val();
		var cellundertitlehere1 = jQuery('input[type=text][name=cellundertitlehere1]').val();
		var cellundertitlehere2 = jQuery('input[type=text][name=cellundertitlehere2]').val();
		var cellundertitlehere3 = jQuery('input[type=text][name=cellundertitlehere3]').val();
		var celltexthere1 = jQuery('.celltexthere1').val();
		var celltexthere2 = jQuery('.celltexthere2').val();
		var celltexthere3 = jQuery('.celltexthere3').val();
		
		var insert = '[three-columns]\n [one_cell]\n';
		
		if(celltitlehere1 !== ""){
			insert = insert + '[titles]\n [cell_title ';
		
			if(celltitlelinkhere1 !== ""){
				insert = insert + ' link="'+celltitlelinkhere1+'"';
			}
		
			insert = insert + ']'+celltitlehere1+' [/cell_title]\n';
		
		
                
			insert = insert + "\n[/titles]";
                }
		if(celltexthere1 !== ""){
			insert = insert + '\n[cell_text]'+celltexthere1+' [/cell_text]\n'
		}
		insert = insert + '\n[/one_cell]\n\r\n[one_cell]\n';
		
		
		if(celltitlehere2 !== ""){
			insert = insert + '[titles]\n [cell_title ';
		
			if(celltitlelinkhere2 !== ""){
				insert = insert + ' link="'+celltitlelinkhere2+'"';
			}
		
			insert = insert + ']'+celltitlehere2+' [/cell_title]\n';
		
		
                
			insert = insert + "\n[/titles]";
                }
		if(celltexthere2 !== ""){
			insert = insert + '\n[cell_text]'+celltexthere2+' [/cell_text]\n ';
		}
		insert = insert + '\n[/one_cell]\n\r \n[one_cell_last]\n';
		
		
		if(celltitlehere3 !== ""){
			insert = insert + '[titles]\n [cell_title ';
		
			if(celltitlelinkhere3 !== ""){
			insert = insert + ' link="'+celltitlelinkhere3+'"';
			}
			
			insert = insert + ']'+celltitlehere3+' [/cell_title]\n';
		
		
                
			insert = insert + "\n[/titles]";
                }
		if(celltexthere3 !== ""){
			insert = insert + '\n[cell_text]'+celltexthere3+' [/cell_text]\n';
		}
		insert = insert + '[/one_cell_last]\n\r [/three-columns]\n\r';
		
		
	jQuery('#content').insertAtCaret(insert);
	jQuery('.column3action').css('display','none');
		
		
	});
	
	//Column 4
	jQuery('.column4').click(function(){
		jQuery('.actionhelper').hide();
		 jQuery('.column4action').css('display','block');
	});
	
	jQuery('.column4submit').click(function(){
		var cellimagehere1 = jQuery('input[type=text][name=cellimagehere1four]').val();
		var cellimagehere2 = jQuery('input[type=text][name=cellimagehere2four]').val();
		var cellimagehere3 = jQuery('input[type=text][name=cellimagehere3four]').val();
		var cellimagehere4 = jQuery('input[type=text][name=cellimagehere4four]').val();
                 if(cellimagehere1 == "undefined"){
                    cellimagehere1 = "";
                }
                if(cellimagehere2 == "undefined"){
                    cellimagehere2 = "";
                }
                if(cellimagehere3 == "undefined"){
                    cellimagehere3 = "";
                }
                if(cellimagehere4 == "undefined"){
                    cellimagehere4 = "";
                }
		var celltitlehere1 = jQuery('input[type=text][name=celltitlehere1four]').val();
		var celltitlehere2 = jQuery('input[type=text][name=celltitlehere2four]').val();
		var celltitlehere3 = jQuery('input[type=text][name=celltitlehere3four]').val();
		var celltitlehere4 = jQuery('input[type=text][name=celltitlehere4four]').val();
		var celltitlelinkhere1 = jQuery('input[type=text][name=celltitlelinkhere1four]').val();
		var celltitlelinkhere2 = jQuery('input[type=text][name=celltitlelinkhere2four]').val();
		var celltitlelinkhere3 = jQuery('input[type=text][name=celltitlelinkhere3four]').val();
		var celltitlelinkhere4 = jQuery('input[type=text][name=celltitlelinkhere4four]').val();
		var cellundertitlehere1 = jQuery('input[type=text][name=cellundertitlehere1four]').val();
		var cellundertitlehere2 = jQuery('input[type=text][name=cellundertitlehere2four]').val();
		var cellundertitlehere3 = jQuery('input[type=text][name=cellundertitlehere3four]').val();
		var cellundertitlehere4 = jQuery('input[type=text][name=cellundertitlehere4four]').val();
		var celltexthere1 = jQuery('.celltexthere1four').val();
		var celltexthere2 = jQuery('.celltexthere2four').val();
		var celltexthere3 = jQuery('.celltexthere3four').val();
		var celltexthere4 = jQuery('.celltexthere4four').val();
				
		var insert = '[four-columns]\n [one_cell]\n';
		
		if(celltitlehere1 !== ""){
		insert = insert + '[titles]\n [cell_title ';
		if(celltitlelinkhere1 !== ""){
			insert = insert + ' link="'+celltitlelinkhere1+'"';
			}
			insert = insert + ']'+celltitlehere1+' [/cell_title]\n';
				insert = insert + "\n[/titles]";
			insert = insert + '\n[cell_text]'+celltexthere1+' [/cell_text]';
		}
		insert = insert + '\n [/one_cell]\n\r';

		insert = insert + '[one_cell]\n';
		
		
		if(celltitlehere2 !== ""){
			insert = insert + '[titles]\n [cell_title ';
			if(celltitlelinkhere2 !== ""){
			insert = insert + ' link="'+celltitlelinkhere2+'"';
			}
			insert = insert + ']'+celltitlehere2+' [/cell_title]\n';
			
				insert = insert + "\n[/titles]";
			insert = insert + '\n[cell_text]'+celltexthere2+' [/cell_text]';
		}
		insert = insert +'\n [/one_cell]\n\r';
		
		insert = insert + '[one_cell]\n';
		
		
		if(celltexthere3 !== ""){
			insert = insert + '[titles]\n [cell_title ';
			if(celltitlelinkhere3 !== ""){
			insert = insert + ' link="'+celltitlelinkhere3+'"';
			}
			insert = insert + ']'+celltitlehere3+' [/cell_title]\n';
			
			insert = insert + "\n[/titles]";
			insert = insert + '\n[cell_text]'+celltexthere3+' [/cell_text]';
		}
		insert = insert + '\n [/one_cell]\n\r';
		
		insert = insert + '[one_cell_last]\n';
		
		
		insert = insert + '[titles]\n [cell_title ';
		if(celltitlelinkhere4 !== ""){
		insert = insert + ' link="'+celltitlelinkhere4+'"';
		}
		insert = insert + ']'+celltitlehere4+' [/cell_title]\n';
		
		insert = insert + "\n[/titles]";
		insert = insert + '\n[cell_text]'+celltexthere4+' [/cell_text]';
		
		insert = insert + '\n [/one_cell_last]\n\r [/four-columns]\n\r';
		
		
	jQuery('#content').insertAtCaret(insert);
	jQuery('.column4action').css('display','none');
		
	});


	//Column 5
	jQuery('.column5').click(function(){
		jQuery('.actionhelper').hide();
		 jQuery('.column5action').css('display','block');
	});
	
	jQuery('.column5submit').click(function(){
		var cellimagehere1 = jQuery('input[type=text][name=cellimagehere1five]').val();
		var cellimagehere2 = jQuery('input[type=text][name=cellimagehere2five]').val();
		var cellimagehere3 = jQuery('input[type=text][name=cellimagehere3five]').val();
		var cellimagehere4 = jQuery('input[type=text][name=cellimagehere4five]').val();
		var cellimagehere5 = jQuery('input[type=text][name=cellimagehere5five]').val();
                 if(cellimagehere1 == "undefined"){
                    cellimagehere1 = "";
                }
                if(cellimagehere2 == "undefined"){
                    cellimagehere2 = "";
                }
                if(cellimagehere3 == "undefined"){
                    cellimagehere3 = "";
                }
                if(cellimagehere4 == "undefined"){
                    cellimagehere4 = "";
                }
                if(cellimagehere5 == "undefined"){
                    cellimagehere5 = "";
                }
		var celltitlehere1 = jQuery('input[type=text][name=celltitlehere1five]').val();
		var celltitlehere2 = jQuery('input[type=text][name=celltitlehere2five]').val();
		var celltitlehere3 = jQuery('input[type=text][name=celltitlehere3five]').val();
		var celltitlehere4 = jQuery('input[type=text][name=celltitlehere4five]').val();
		var celltitlehere5 = jQuery('input[type=text][name=celltitlehere5five]').val();
		var celltitlelinkhere1 = jQuery('input[type=text][name=celltitlelinkhere1five]').val();
		var celltitlelinkhere2 = jQuery('input[type=text][name=celltitlelinkhere2five]').val();
		var celltitlelinkhere3 = jQuery('input[type=text][name=celltitlelinkhere3five]').val();
		var celltitlelinkhere4 = jQuery('input[type=text][name=celltitlelinkhere4five]').val();
		var celltitlelinkhere5 = jQuery('input[type=text][name=celltitlelinkhere5five]').val();
		var cellundertitlehere1 = jQuery('input[type=text][name=cellundertitlehere1five]').val();
		var cellundertitlehere2 = jQuery('input[type=text][name=cellundertitlehere2five]').val();
		var cellundertitlehere3 = jQuery('input[type=text][name=cellundertitlehere3five]').val();
		var cellundertitlehere4 = jQuery('input[type=text][name=cellundertitlehere4five]').val();
		var cellundertitlehere5 = jQuery('input[type=text][name=cellundertitlehere5five]').val();
		var celltexthere1 = jQuery('.celltexthere1five').val();
		var celltexthere2 = jQuery('.celltexthere2five').val();
		var celltexthere3 = jQuery('.celltexthere3five').val();
		var celltexthere4 = jQuery('.celltexthere4five').val();
		var celltexthere5 = jQuery('.celltexthere5five').val();
				
		var insert = '[five-columns]\n [one_cell]\n';
		
		if(celltitlehere1 !== ""){
		insert = insert + '[titles]\n [cell_title ';
		if(celltitlelinkhere1 !== ""){
			insert = insert + ' link="'+celltitlelinkhere1+'"';
			}
			insert = insert + ']'+celltitlehere1+' [/cell_title]\n';
			
				insert = insert + "\n[/titles]";
			insert = insert + '\n[cell_text]'+celltexthere1+' [/cell_text]';
		}
		insert = insert + '\n [/one_cell]\n\r';

		insert = insert + '[one_cell]\n';
		
		
		if(celltitlehere2 !== ""){
			insert = insert + '[titles]\n [cell_title ';
			if(celltitlelinkhere2 !== ""){
			insert = insert + ' link="'+celltitlelinkhere2+'"';
			}
			insert = insert + ']'+celltitlehere2+' [/cell_title]\n';
			
				insert = insert + "\n[/titles]";
			insert = insert + '\n[cell_text]'+celltexthere2+' [/cell_text]';
		}
		insert = insert +'\n [/one_cell]\n\r';
		
		insert = insert + '[one_cell]\n';
		
		
		if(celltexthere3 !== ""){
			insert = insert + '[titles]\n [cell_title ';
			if(celltitlelinkhere3 !== ""){
			insert = insert + ' link="'+celltitlelinkhere3+'"';
			}
			insert = insert + ']'+celltitlehere3+' [/cell_title]\n';
			
			insert = insert + "\n[/titles]";
			insert = insert + '\n[cell_text]'+celltexthere3+' [/cell_text]';
		}
		insert = insert + '\n [/one_cell]\n\r';
		
		insert = insert + '[one_cell]\n';
		
		
	
		insert = insert + '[titles]\n [cell_title ';
		if(celltitlelinkhere4 !== ""){
		insert = insert + ' link="'+celltitlelinkhere4+'"';
		}
		insert = insert + ']'+celltitlehere4+' [/cell_title]\n';
		
		insert = insert + "\n[/titles]";
		insert = insert + '\n[cell_text]'+celltexthere4+' [/cell_text]';
		
		insert = insert + '\n [/one_cell]\n';
		
		insert = insert + '[one_cell_last]\n';
		
		
	
		insert = insert + '[titles]\n [cell_title ';
		if(celltitlelinkhere5 !== ""){
		insert = insert + ' link="'+celltitlelinkhere5+'"';
		}
		insert = insert + ']'+celltitlehere5+' [/cell_title]\n';
		
		insert = insert + "\n[/titles]";
		insert = insert + '\n[cell_text]'+celltexthere5+' [/cell_text]';
		
		insert = insert + '\n [/one_cell_last]\n\r [/five-columns]\n\r';
		
		
	jQuery('#content').insertAtCaret(insert);
	jQuery('.column5action').css('display','none');
		
	});
});



</script>
<input type="button" class="break tkbutton" value="Add Break">
<input type="button" class="separator tkbutton" value="Add Separator">
<input type="button" class="line tkbutton" value="Add Line">
<input type="button" class="column1 tkbutton" value="Add Fullwidth">
<input type="button" class="column2 tkbutton" value="Add 2 columns">
<input type="button" class="column3 tkbutton" value="Add 3 columns">
<input type="button" class="column4 tkbutton" value="Add 4 columns">
<input type="button" class="column5 tkbutton" value="Add 5 columns">
<input type="button" class="addimage tkbutton" value="Add Image">
<input type="button" class="addh1h2 tkbutton" value="Add H1 - H2 - H3 - H4 - H5">
<input type="button" class="addbutton tkbutton" value="Button">
<input type="button" class="addform tkbutton" value="Add Contact Form">
<input type="button" class="addtabbed tkbutton" value="Add Tabbed Content">
<input type="button" class="addpirobox tkbutton" value="Add Pirobox">
<input type="button" class="addquote tkbutton" value="Add Quote">
<input type="button" class="addlist tkbutton" value="Add List">
</div>
<script type="text/javascript">
    jQuery(document).ready(function(){
window.setTimeout(function(){
//<![CDATA[

var pluggy_toolbar = document.getElementById("ed_toolbar");


if (pluggy_toolbar) {

  var theDiv = document.createElement('div');
  theDiv.type = 'div';
  theDiv.value = 'Pluggy';

  theDiv.className = 'ed_div';
  theDiv.title = '<?php echo THEME_NAME;?> panel';
  theDiv.id = 'ed_div';
  pluggy_toolbar.appendChild(theDiv);

  var shortcode = document.getElementById("panel");

  theDiv.appendChild(shortcode);

}else {
  var pluggyLink = document.getElementById("pluggy_link");
  var pingBack = document.getElementById("pingback");
  if (pingBack == null)
    var pingBack = document.getElementById("post_pingback");
  if (pingBack == null) {
    var pingBack = document.getElementById("savepage");
    pingBack = pingBack.parentNode;
  }
  pingBack.parentNode.insertBefore(pluggyLink, pingBack);
  pluggyLink.style.display = 'none';
}


// Insert myValue into an editor window
function insertHtml(myValue) {
        if(window.tinyMCE)
                window.opener.tinyMCE.execCommand("mceInsertContent",true,myValue);
        else
                insertAtCursor(window.opener.document.post.content, myValue);
        window.close();
}

// Insert text into the WP regular editor window
function insertAtCursor(myField, myValue) {
        //IE support
        if (document.selection && !window.opera) {
                myField.focus();
                sel = window.opener.document.selection.createRange();
                sel.text = myValue;
        }
        //MOZILLA/NETSCAPE/OPERA support
        else if (myField.selectionStart || myField.selectionStart == '0') {
                var startPos = myField.selectionStart;
                var endPos = myField.selectionEnd;
                myField.value = myField.value.substring(0, startPos)
                + myValue
                + myField.value.substring(endPos, myField.value.length);
        } else {
                myField.value += myValue;
        }
}

function selectedText(input){

var startPos = input.selectionStart;
var endPos = input.selectionEnd;
var doc = document.selection;

if(doc && doc.createRange().text.length != 0){
alert(doc.createRange().text);
}else if (!doc && input.value.substring(startPos,endPos).length != 0){
alert(input.value.substring(startPos,endPos))
}
}




//]]>
},1000);

})
</script>
<?php
    }
}

// Add the javascript-generating footer to all admin pages
add_filter('admin_footer', 'pluggy_quicktag_like_button');