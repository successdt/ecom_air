<?php
	
	
	function showseparator() {
		
    	return '<span class="break shortcode-break"></span><br/><br/>';	
	}
	add_shortcode('separator', 'showseparator');
        
	function showbreak() {
            return '<br/>';	
	}
	add_shortcode('break', 'showbreak');
	
	
	
	
	function showstatusbox($atts, $title = null, $content = null){
		
		extract(shortcode_atts(array(
				'type' => 'warning',
				'title'=>'Default title',
				'text'=>'Default text',
		), $atts));
		
	return '<span class="status-box"><span class="'.$type.'"><p class="warning-title">'.$title.'</p><p>'.$text.'</p></span></span>';
		
	}
	add_shortcode('statusbox','showstatusbox');
	
	
	/*function showPirobox($atts, $content = null){
		extract(shortcode_atts(array(
				'link' => 'warning',
				'title'=>'Default title'				
		), $atts));
		return '<a href="'.$link.'" title="'.$title.'" class="pirobox" rel="gallery">'.do_shortcode($content).'</a>';
	}
	add_shortcode('pirobox','showPirobox');
	*/
	
	function showPirobox($atts, $content = null){
		extract(shortcode_atts(array(
				'link' => '',
				'title'=>'Default title',
				'width'=>'full',
				'height'=>'full',
				'type'=>'',
				'rel' => 'single'								
		), $atts));
		$video = 0;
		if(strpos($link,'youtube') > 0){
			$link = explode('?v=',$link);
			if(strpos($link[1],'&') > 0){
				$newlink = explode('&',$link[1]);
			}else{
				$newlink[0] = $link[1];
			}
			$link = 'http://www.youtube-nocookie.com/v/'.$newlink[0].'&autoplay=1';
			$video = 1;
		}
		if(strpos($link,'youtu.be') > 0){
			$link = explode('youtu.be/',$link);
			$link = 'http://www.youtube-nocookie.com/v/'.$link[1];
			$video = 1;
		}
		if(strpos($link,'vimeo')>0){
			$link = explode('vimeo.com/',$link);
			$link = 'http://player.vimeo.com/video/'.$link[1];
			$video = 1;
		}
		if($type == 'site'){
			return '<a href="'.$link.'" title="'.$title.'" class="pirobox" rel="iframe-'.$width.'-'.$height.'">'.do_shortcode($content).'</a>';
		}else{
		if($video == 1){
			return '<a href="'.$link.'" title="'.$title.'" class="pirobox" rel="iframe-'.$width.'-'.$height.'">'.do_shortcode($content).'</a>';
		}else{
			$return = '<a href="'.$link.'" title="'.$title.'" class="pirobox"';
			if($width !== "full"){$return .= ' rel="iframe-'.$width.'-'.$height.'" ';}else{
				$return .= ' rel="'.$rel.'" ';
			}
			$return .= '>'.do_shortcode($content).'</a>';
			return $return;
		}}
	}
	add_shortcode('pirobox','showPirobox');
	
	
	
	function showList($atts, $content = null){
		extract(shortcode_atts(array(
				'type'=>'1'
		), $atts));
		if($type == "ol"){
			return '<ol class="ullistol">'.$content.'</ol>';
		}else{
			return '<ul class="ullist ultype'.$type.'">'.$content.'</ul>';
		}
	}
	add_shortcode('list','showList');
	
	
	function showQuote($atts, $content = null){
		return '<div class="quote"><div class="quote-image"></div>'.do_shortcode($content).'</div>';
	}
	add_shortcode('quote','showQuote');
	
	
	function showH1($atts, $content = null ) {
		
    	return '<h1>'.$content.'</h1>';	
	}
	add_shortcode('h1', 'showH1');
	
	
	
	
	function showH2($atts, $content = null ) {
		
    	return '<h2 class="shorcode-h2">'.$content.'</h2>';	
	}
	add_shortcode('h2', 'showH2');
	
	
        function showHeading($atts,$content = null){
            extract(shortcode_atts(array(
				'type'=>'h1'
		), $atts));
            return '<'.$type.'>'.$content.'</'.$type.'>';
        }
        add_shortcode('heading','showHeading');
	

	function showli($atts, $content = null ) {
		
    	return '<span class="shortcode-li">'.do_shortcode($content).'</span>';	
	}
	add_shortcode('li', 'showli');
	
	function showfullwidth($atts,$content = null){
		return '<div id="fullwidth-box">'.do_shortcode($content).'</div>';		
	}
	add_shortcode('fullwidth','showfullwidth');
	
	function showthreecolumns($atts, $content = null ) {
		
    	return '<div id="three-columns">'.do_shortcode($content).'</div>';	
	}
	add_shortcode('three-columns', 'showthreecolumns');	
	
	function showtwocolumns($atts, $content = null ) {
		
    	return '<div id="two-columns">'.do_shortcode($content).'</div>';	
	}
	add_shortcode('two-columns', 'showtwocolumns');	
	
	
	
	
	function showfivecolumns($atts, $content = null ) {
		
    	return '<div id="five-columns">'.do_shortcode($content).'</div>';	
	}
	add_shortcode('five-columns', 'showfivecolumns');
	
	
	
	function showfourcolumns($atts, $content = null ) {
		
    	return '<div id="four-columns">'.do_shortcode($content).'</div>';	
	}
	add_shortcode('four-columns', 'showfourcolumns');
	
	
	
	
	function showonecell($atts, $content = null ) {
	    return '<div class="one_cell">'.do_shortcode($content).'</div>';	
	}
	
	add_shortcode('one_cell', 'showonecell');	
	
	
	
	
	function showonecelllast($atts, $content = null ) {
	    return '<div class="one_cell" style="margin: 0pt!important;">'.do_shortcode($content).'</div>';	
	}
	
	add_shortcode('one_cell_last', 'showonecelllast');	
	
	
	
	
	function cellimage($atts, $content = null ) {
		$template_directory = get_template_directory_uri();	 
		extract(shortcode_atts(array(
				'title' => ''
		), $atts));	
          
	    return '<div class="cell_image_front">
		<a title="'.$title.'" rel="single" class="fancybox first last" href="'.do_shortcode($content).'"><img title="'.$title.'" alt="_" src="'.$template_directory.'/script/timthumb.php?src='.do_shortcode($content).'&w=35&h=35&zc=0&q=100"></a>
		</div>';
	    
	}
	add_shortcode('cell_image', 'cellimage');
	
	
	function cellimagesmall($atts, $content = null ) {
		$template_directory = get_template_directory_uri();	 
		extract(shortcode_atts(array(
				'title' => ''
		), $atts));	
	    return '<div class="cell_image_front">
		<a title="'.$title.'" rel="single" class="fancybox first last" href="'.do_shortcode($content).'"><img title="'.$title.'" alt="_" src="'.$template_directory.'/script/timthumb.php?src='.do_shortcode($content).'&w=27&h=27&zc=0&q=100"></a>
		</div>';
	    
	}
	add_shortcode('cell_image_small', 'cellimagesmall');

	
	
	
	function celltextshortcode($atts, $content = null ) {
	    return '<div class="cell_text">'.do_shortcode($content).'</div>';	
	}
	add_shortcode('cell_text', 'celltextshortcode');
		

	
	
	function showtitles($atts,$content = null){
		return '<div class="titles">'.do_shortcode($content).'</div>';
	}
	add_shortcode('titles', 'showtitles');
	
	
	
	
	function celltitle($atts,$content = null){
		extract(shortcode_atts(array(
				'link' => ''
		), $atts));
		if($link <> ""){
			return '<div class="cell_title"><h2><a href="'.$link.'">'.do_shortcode($content).'</a></h2></div>';
		}else{
			return '<div class="cell_title"><h2>'.do_shortcode($content).'</h2></div>';	
		}
	}
	add_shortcode('cell_title', 'celltitle');
	
	
	
	
	function cellsubtitle($atts,$content = null){
		return '<div class="cell_subtitle">'.do_shortcode($content).'</div>';
	}
	add_shortcode('cell_subtitle', 'cellsubtitle');
	
	
	
	
	function cellheadline($atts,$content = null){
		extract(shortcode_atts(array(
				'subtitle' => '',
				'image' => ''
		), $atts));
		
		$return = '<div id="page-section">';
		if(!empty($image)){
                    
				$return .='<div id="h2" style="background: url('.get_template_directory_uri().'/script/timthumb.php?src='.$image.'&w=35&h=35&zc=0&q=100) no-repeat scroll left top transparent;"></div>';
		}
				$return .='<div id="h2-title"';
		if(!empty($subtitle)){
			$return .= ' style="padding-top:0;" ';
		}else{
			$return .= ' style="padding-top:9px;" ';
		}
				$return .= '>'.do_shortcode($content).'<h3 class="big_h2_subtitle">'.$subtitle.'</h3></div>
				</div>
			<div id="horizontal-line" class="header-horizontal-line-closer"></div>';
			return $return;
	
		
	}
	add_shortcode('h2_with_sub', 'cellheadline');

	function callline($atts,$content = null){
		
		return '<div class="line-border"></div>';
		
	}
	add_shortcode('line', 'callline');
	
	
	function showBox($atts, $content = null ) {
		
			extract(shortcode_atts(array(
				'width' => '100',
				'align'=>'left',
		), $atts));
		
		$new_width = $width - 3;
		$new_width .= "%";
		if ($width==50) {
			$new_width = "47%;";
		}
		if ($new_width==30) {
			$new_width = "30.2%;";
		}
		
		if ($width == 100){
			$new_width = "961px";
		}
		
		
    	return '<div class="shortcode-box" id="box" style="width:'.$new_width.';">'.do_shortcode($content).'</div>';	
	}
	add_shortcode('box', 'showBox');
	
	
	
	
	
	
        
        function showButton($atts, $content= null ) {
		
			extract(shortcode_atts(array(
				'url' => '',
				'margin'=>'',
				'align'=>'left',
				'color' => 'red'
		), $atts));
		
		$margin = str_replace('px','',$margin);
		if(!empty($color)) {$new_color = $color;}


		return 	'<div class="shortcode-button'.$new_color.' '.$new_color.'-button " style="float:'.$align.'!important;margin-left:'.$margin.'px;">
					<a href="'.$url.'"><div class="'.$new_color.'-left"></div>
						<div class="'.$new_color.'-center">
							'.$content.'
						</div>
					<div class="'.$new_color.'-right"></div></a>
				</div>';

	}
	add_shortcode('button', 'showButton'); 
        
	function showonethird($atts, $content= null ) {
		
			extract(shortcode_atts(array(
				'url' => '',
				'color'=>'',
				'margin'=>'',
				'align'=>'left',
				'from'=>''
		), $atts));
		
		

		return '<span class="onethird '.$from.'">'.do_shortcode($content).'</span>';
		

	}
	add_shortcode('onethird', 'showonethird');

	function showonethirdlast($atts, $content= null ) {
		
			extract(shortcode_atts(array(
				'url' => '',
				'color'=>'',
				'margin'=>'',
				'align'=>'left',
				'from'=>''
		), $atts));
		
		

		return '<span class="onethird last '.$from.'">'.do_shortcode($content).'</span>';
		

	}
	add_shortcode('onethird_last', 'showonethirdlast');

	function showtwothird($atts, $content= null ) {
		
			extract(shortcode_atts(array(
				'url' => '',
				'color'=>'',
				'margin'=>'',
				'align'=>'left',
                                'from'=>''
		), $atts));
		
		

		return '<span class="twothird '.$from.'">'.do_shortcode($content).'</span>';
		

	}
	add_shortcode('twothird', 'showtwothird');

	function showtwothirdlast($atts, $content= null ) {
		
			extract(shortcode_atts(array(
				'url' => '',
				'color'=>'',
				'margin'=>'',
				'align'=>'left',
                                 'from'=>''
		), $atts));
		
		

		return '<span class="twothird last '.$from.'">'.do_shortcode($content).'</span>';
		

	}
	add_shortcode('twothird_last', 'showtwothirdlast'); 

	function showonehalf($atts, $content= null ) {
		
			extract(shortcode_atts(array(
				'url' => '',
				'color'=>'',
				'margin'=>'',
				'align'=>'left'
		), $atts));
		
		

		return '<span class="onehalf">'.do_shortcode($content).'</span>';
		

	}
	add_shortcode('onehalf', 'showonehalf'); 
	
	function showonehalflast($atts, $content= null ) {
		
			extract(shortcode_atts(array(
				'url' => '',
				'color'=>'',
				'margin'=>'',
				'align'=>'left'
		), $atts));
		
		

		return '<span class="onehalf last">'.do_shortcode($content).'</span>';
		

	}
	add_shortcode('onehalf_last', 'showonehalflast'); 
	
	
	function showimg($atts, $content= null ) {
		
			extract(shortcode_atts(array(
				'src' => '',
				'title' => 'Picture',
				'width' => '400',
				'height' => '240',
				'align' => 'left',
				'border' => 'yes'
				
		), $atts));
		
		if($border == 'no'){
			$padding = '0!important';
			$border = '0px!important';
		}else{
			$padding = "6px";
			$border = '1px';
		}
		
		if($align == "left"){
			$margin = "0 22px 0 0";			
		}else{
			$margin = "0 0 0 22px";
		}
		
		$template_directory = get_template_directory_uri();	 	
	  
		return '<a title="'.$title.'" rel="single" class="fancybox first last" href="'.do_shortcode($src).'" rel="iframe-640-505" rev="0"><span class="shortcodeimg-holder" style="float:'.$align.';margin:'.$margin.';padding:'.$padding.';border-width:'.$border.';"><img title="'.$title.'" alt="_" src="'.$template_directory.'/script/timthumb.php?src='.do_shortcode($src).'&amp;w='.$width.'&amp;h='.$height.'&amp;zc=1&amp;q=100"></span></a>';

		
		

	}
	add_shortcode('img', 'showimg'); 
	
	function showimgpirobox($atts, $content = null){
		
		extract(shortcode_atts(array(
				'src' => '',
				'title' => 'Picture',
				'width' => '400',
				'height' => '240',
				'align' => 'left',
				'border' => 'yes'
				
		), $atts));
		
		if($align == "left"){
			$margin = "0 22px 0 0";			
		}else{
			$margin = "0 0 0 22px";
		}
		
		$template_directory = get_template_directory_uri();	 	
	  
		$return = '<span class="shortcodeimg-holder" style="float:'.$align.';margin:'.$margin.';';
		if($border !== 'yes'){
			$return .= 'border:0!important';
		}
		$return .= '"><img title="'.$title.'" alt="_" src="'.$template_directory.'/script/timthumb.php?src='.do_shortcode($src).'&amp;w='.$width.'&amp;h='.$height.'&amp;zc=1&amp;q=100"></span>';
		return $return;
	}
	add_shortcode('imgpirobox','showimgpirobox');
	
	
	function contactform($atts, $content=null){
		
		extract(shortcode_atts(array(
				'validemail' => 'Please enter valid email',
				'insertname'=>'Your Name must be filled',
				'insertmessage'=>'Please insert the message',
				'messagesent'=>'Your message is sent successfully'
		), $atts));
		if(empty($validemail)){$validemail = 'Please enter valid email';}
		if(empty($insertname)){$insertname = 'Your Name must be filled';}
		if(empty($insertmessage)){$insertmessage = 'Please insert the message';}
		if(empty($messagesent)){$messagesent = 'Your message is sent successfully';}
		// HTML Form
		$form = '
		<div class="form-holder">
		<span class="ajaxmessage"></span>
		
		
					<form action="#" method="post" id="commentform">
						
                    <div class="form-name">
<input type="text"  spellcheck="false" name="author" id="contactname" value="Name *"  tabindex="1" >
<input type="text" spellcheck="false" name="email" class="emailinsert" id="email" value="E-mail *"  tabindex="2">

                    </div><!--/form-name-->

						

			
		    <div class="form-message">
                        <div class="message-left"></div>
                        <div class="message-center"><textarea name="comment" spellcheck="false" id="message" class="input comment-textarea" tabindex="3">Message</textarea></div>
                        <div class="message-right"></div>
                    </div><!--/form-message-->
                    
			
                    <div class="form-button">

                        <div class="send-button">
                                    <div class="send-left"></div>
                                    <div class="send-center">Send</div>
                                    <div class="send-right"></div>
                        </div>
                    </div>
					
					
					</form>	
					</div>
					';
			 
$form .= '			
<script type="text/javascript">		
jQuery(document).ready(function() {
		
	 jQuery(".clear-button").click(function(){ 
                                jQuery("#message").val("Message");
                             jQuery("#contactname").val("Name *");
                             jQuery(".emailinsert").val("E-mail *");
                             
                             });
                            

	jQuery("input[type=text]").addClass("idleField");
		jQuery("input[type=text]").focus(function() {
			jQuery(this).removeClass("idleField").addClass("focusField");
	    if (this.value == this.defaultValue){ 
	    	this.value = "";
		}
		if(this.value != this.defaultValue){
			this.select();
		}
	});
	jQuery("input[type=text]").blur(function() {
		jQuery(this).removeClass("focusField").addClass("idleField");
	    if (jQuery.trim(this.value) == ""){
	    	this.value = (this.defaultValue ? this.defaultValue : "");
		}
	});
	jQuery("textarea").addClass("idleField");
		jQuery("textarea").focus(function() {
			jQuery(this).removeClass("idleField").addClass("focusField");
	    if (this.value == this.defaultValue){ 
	    	this.value = "";
		}
		if(this.value != this.defaultValue){
			this.select();
		}
	});
	jQuery("textarea").blur(function() {
		jQuery(this).removeClass("focusField").addClass("idleField");
	    if (jQuery.trim(this.value) == ""){
	    	this.value = (this.defaultValue ? this.defaultValue : "");
		}
	});

	jQuery(".send-button").click(function(){
 		var error = 0;
 		var msg = "";
 		var contactname = jQuery("#contactname").val();
 		var email = jQuery("#email").val();
 		var message = jQuery("#message").val();
 		if(contactname == "Name (required)" || contactname == "Name *"){
 			error = 1;
                      msg = "<div class=\"error-hello\"><div class=\"error-left\"></div><div class=\"error-center\"><h2>error</h2><p>'.$insertname.'</p></div><div class=\"error-right\"></div></div>";
 			
 		}
 		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
 		
 		 if(reg.test(email) == false) {
 			error = 1;
 			if(msg !== ""){
 				msg = msg+"<br/>";
 			}
 			msg = msg + "<div class=\"error-hello\"><div class=\"error-left\"></div><div class=\"error-center\"><h2>error</h2><p>'.$validemail.'</p></div><div class=\"error-right\"></div></div>";
 			
 		}
 		
 		if(message == "Message"){
 			error = 1;
 			if(msg !== ""){
 				msg = msg+"<br/>";
 			}
 			msg = msg + "<div class=\"error-hello\"><div class=\"error-left\"></div><div class=\"error-center\"><h2>error</h2><p>'.$insertmessage.'</p></div><div class=\"error-right\"></div></div>";
 		
 		}
 		

		if(error==0){
  		jQuery.post("'.get_template_directory_uri().'/contactajax.php'.'", { contactname: jQuery("#contactname").val(), email: jQuery("#email").val(),message: jQuery("#message").val() }, function (data) {
			';
	
		$form .= ' jQuery(\'.ajaxmessage\').empty().append(\'<div class=\"success-hello\"><div class=\"success-left\"></div><div class=\"success-center\"><h2>success</h2><p>'.$messagesent.'</p></div><div class=\"success-right\"></div></div>\');';
		
	$form .= '
		});
  		}else{
  		
  		jQuery(\'.ajaxmessage\').empty().append(msg);
	
  		
	
  		}

		 
 	});
 });
 </script>
			';
				
		return $form;
	}
	add_shortcode('form', 'contactForm'); 
	
	
	// shortcode - tabs

add_shortcode( 'tabgroup', 'etdc_tab_group' );

function etdc_tab_group( $atts, $content ){

$GLOBALS['tab_count'] = 0;
$key = rand(1,1000);
do_shortcode( $content );


if( is_array( $GLOBALS['tabs'] ) ){
	$i=1;
foreach( $GLOBALS['tabs'] as $tab ){
$tabs[] = '<li><a href="#tab-shortcode-'.$i.'">'.$tab['title'].'</a></li>';
$panes[] = '<div class="pane" id="tab-shortcode-'.$i.'">'.$tab['content'].'</div>';
$i++;
}
$return = '<div id="tabs_shortcode" class="tabbed-'.$key.'">'."\n".'<ul class="tabs">'.implode( "\n", $tabs ).'</ul>'."\n".'<div class="clr"></div><div class="panes">'.implode( "\n", $panes ).'</div>'."\n". '</div><script type="text/javascript">
jQuery(function() {
	jQuery(".tabbed-'.$key.'").tabs({ 
    fx: { opacity: "toggle", duration: "300" }
});
	jQuery("#tabs_shortcode li a").click(function(){
		jQuery("#tabs_shortcode li").removeClass("active");
		jQuery(this).parent("li").addClass("active");
	});
});
</script>';

}
$GLOBALS['tabs'] = array();
return $return;


}

add_shortcode( 'tab', 'etdc_tab' );

function etdc_tab( $atts, $content ){
extract(shortcode_atts(array(
'title' => 'Tab %d'
), $atts));



$x = $GLOBALS['tab_count'];
$GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'content' =>  $content );

$GLOBALS['tab_count']++;

}
	
	

	
	
	

?>