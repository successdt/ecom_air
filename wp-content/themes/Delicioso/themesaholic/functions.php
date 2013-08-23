<?php
	
	function recent_tweets($username, $limit=1){
    if(!is_numeric($limit)){$limit = 1;}
	    $xml = simplexml_load_file('http://search.twitter.com/search.atom?q=from:'.urlencode($username).'&rpp=1');
	    $items_count= count($xml->entry);
	    if($items_count < $limit){$limit = $items_count;}
	    $i = 0;
	   
	    while($i < $limit){
	        $return = $xml->entry[$i]->content;
	
	
	        $i++;
	    }
	   
	    return $return;
	}
	
	function get_page_meta($page_id, $key, $single = false) {
		return get_metadata('page', $page_id, $key, $single);
	}
	
	
	function mytheme_comment($comment, $args, $depth) {
	   $GLOBALS['comment'] = $comment; ?>
				   
<div class="comment-start-one">
                        <div class="comment-images"> <?php echo get_avatar($comment,$size='49',$default='<path_to_url>' ); ?> </div><!--/comment-images-->
                        <div class="comment-start-title">
                            <h3><?php printf(__('%s'), comment_author()) ?></h3>
                            <h5>On: <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
					 <?php printf(__('%1$s'), get_comment_date()) ?>
				</a>
                                &CenterDot; <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?> <?php if(is_admin()){ ?> &CenterDot; <?php edit_comment_link(__('Edit'),'  ',''); }?></h5>
                        </div><!--/comment-start-title-->
                        <div class="comment-start-text">
                            <?php comment_text() ?>
                        </div><!--/comment-start-text-->
                    </div><!--/comment-start-one-->


			<?php if ($comment->comment_approved == '0') : ?>
			        <span class="commentmetadata-waiting" style="float:left;"><?php echo ('Your comment is awaiting moderation.') ?></span>
			<?php endif; ?> 

		  
			 
		<!-- close comment--> 
            
	<?php }

	function comments_popup( $zero = false, $one = false, $more = false, $css_class = '', $none = false ) {
		global $id, $wpcommentspopupfile, $wpcommentsjavascript;
	
	    if ( false === $zero ) $zero = __( 'No Comments',THEME_NAME );
	    if ( false === $one ) $one = __( '1 Comment',THEME_NAME );
	    if ( false === $more ) $more = __( '% Comments',THEME_NAME );
	    if ( false === $none ) $none = __( 'Comments Off',THEME_NAME );
	
		echo "<span class='comments-blog'><h1>";
	    $number = get_comments_number( $id );
	
		if ( 0 == $number && !comments_open() && !pings_open() ) {
			echo '<span' . ((!empty($css_class)) ? ' class="' . esc_attr( $css_class ) . '"' : '') . '>' . $none . '</span>';
			return;
		}
	
		if ( post_password_required() ) {
			echo __('Enter your password to view comments.',THEME_NAME);
			return;
		}
		
		comments_number( $zero, $one, $more );
		echo "</h1></span>";
		echo "<span class='comment_popup_border'></span>";
	}
	//Themesaholic Pagination
	//Version 1.0
	function tk_pagination($first=1,$last=5,$middle=3,$baseURL=false,$wp_query=false ) {
		
       if(!$wp_query)global $wp_query;
       $page = $wp_query->query_vars["paged"];
       
       if ( !$page ) $page = 1;
       $qs = $_SERVER["QUERY_STRING"] ? "?".$_SERVER["QUERY_STRING"] : "";
       if ( $wp_query->found_posts > $wp_query->query_vars["posts_per_page"] ) {// Only necessary if there's more posts than posts-per-page
               echo '<div class="pagination">';
               if($page !== 1) {
                     echo '<a href="'.$baseURL.''.$qs.'"><div class="pagination-prev"><div class="pagination-left"></div><div class="pagination-center-t">First</div><div class="pagination-right"></div></div></a>';
               }
               if ( $page > 1 ) { // Previous link?
                       echo '<a href="'.$baseURL.(($page>=2)?('page/'.($page-1).'/'):'').$qs.'"><div class="pagination-prev"><div class="pagination-left"></div><div class="pagination-center-t"><div class="prev-img"></div></div><div class="pagination-right"></div></div></a>';
               }
               $dots=false;

                if($page == 1 || $page == 2){
                       $firstinline = 1;
                   }else{
                       $firstinline = $page - 1;
                   }
                   $lastinline = $firstinline + $middle;
               for ( $i=1; $i <= $wp_query->max_num_pages; $i++ ){ // Loop through pages
                   
                   if($i>=$firstinline && $i< $lastinline){
                        if ( $i == $page ) { // Current page or linked page?
                                      echo '<div class="pagination-prev active"><div class="pagination-left"></div><div class="pagination-center-n">'.$i.'</div><div class="pagination-right"></div></div>';
                               } else {
                                      echo '<a href="'.$baseURL.(($i!=1)?('page/'.$i.'/'):'').$qs.'"><div class="pagination-prev"><div class="pagination-left"></div><div class="pagination-center-n">'.$i.'</div><div class="pagination-right"></div></div></a>';
                               }
                   }
                  
                   
                   
               }
               
               if ( $page < $wp_query->max_num_pages ) { // Next link?
                     echo '<a href="'.$baseURL.'page/'.($page+1).'/'.$qs.'"><div class="pagination-prev"><div class="pagination-left"></div><div class="pagination-center-t"><div class="next-img"></div></div><div class="pagination-right"></div></div></a>';
                     
               }
               if ( $page < $wp_query->max_num_pages ) {
               		  echo '<a href="'.$baseURL.'page/'.$wp_query->max_num_pages.'/'.$qs.'"><div class="pagination-prev"><div class="pagination-left"></div><div class="pagination-center-t">Last</div><div class="pagination-right"></div></div></a>';
               }
               echo '</div>';
       	}
	}

	
	function twitter_script($unique_id,$username,$limit) { ?>
	<script type="text/javascript">
	<!--//--><![CDATA[//><!--
	
	    function twitterCallback2(twitters) {
	      var statusHTML = [];
	      for (var i=0; i<twitters.length; i++){
	        var username = twitters[i].user.screen_name;
	        var status = twitters[i].text.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url) {
	          return '<a href="'+url+'">'+url+'</a>';
	        }).replace(/\B@([_a-z0-9]+)/ig, function(reply) {
	          return  reply.charAt(0)+'<a href="http://twitter.com/'+reply.substring(1)+'">'+reply.substring(1)+'</a>';
	        });
                
                status = status.replace('&ndash;','');
	        statusHTML.push('<li><div class="box-twitter-top"></div><div class="box-twitter-center"><span>'+status+'</span></div><div class="box-twitter-bottom"></div><a href="http://twitter.com/'+username+'/statuses/'+twitters[i].id+'"><div class="twitter-links-t"></div></a><p>'+relative_time(twitters[i].created_at)+'</p></li>');
	      }
	      document.getElementById('twitter_update_list_<?php echo $unique_id; ?>').innerHTML = statusHTML.join('');
	    }
	    
	    function relative_time(time_value) {
	      var values = time_value.split(" ");
	      time_value = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
	      var parsed_date = Date.parse(time_value);
	      var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
	      var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
	      delta = delta + (relative_to.getTimezoneOffset() * 60);
	    
	      if (delta < 60) {
	        return 'less than a minute ago';
	      } else if(delta < 120) {
	        return 'about a minute ago';
	      } else if(delta < (60*60)) {
	        return (parseInt(delta / 60)).toString() + ' minutes ago';
	      } else if(delta < (120*60)) {
	        return 'about an hour ago';
	      } else if(delta < (24*60*60)) {
	        return 'about ' + (parseInt(delta / 3600)).toString() + ' hours ago';
	      } else if(delta < (48*60*60)) {
	        return '1 day ago';
	      } else {
	        return (parseInt(delta / 86400)).toString() + ' days ago';
	      }
	    }
	//-->!]]>
	</script>
	<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo $username; ?>.json?callback=twitterCallback2&amp;count=<?php echo $limit; ?>"></script>
<?php }

function get_cat_slug($cat_id) {
	$cat_id = (int) $cat_id;
	$category = &get_category($cat_id);
	return $category->slug;
}
function get_page_slug($page_id){
	$page_id = (int) $page_id;
	$page = &get_page($page_id);
	return $page->post_name;
	
}
	
function get_post_slug($post_id){
	$post_id = (int) $post_id;
	$post = &get_post($post_id);
	return $post->post_name;
}
function get_mypage_meta($post_id, $key, $single = false) {
	return get_metadata('page', $post_id, $key, $single);
}

function get_page_url(){
	
	$pageURL = 'http';
	if (isset($_SERVER["HTTPS"])) {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
	
}

function get_ID_by_slug($page_slug) {
					    $page = get_page_by_path($page_slug);
					    if ($page) {
					        return $page->ID;
					    } else {
					        return null;
					    }
					}

				
function xml2array($contents, $get_attributes=1, $priority = 'tag') {
    if(!$contents) return array();

    if(!function_exists('xml_parser_create')) {
        //print "'xml_parser_create()' function not found!";
        return array();
    }

    //Get the XML parser of PHP - PHP must have this module for the parser to work
    $parser = xml_parser_create('');
    xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, "UTF-8"); # http://minutillo.com/steve/weblog/2004/6/17/php-xml-and-character-encodings-a-tale-of-sadness-rage-and-data-loss
    xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
    xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
    xml_parse_into_struct($parser, trim($contents), $xml_values);
    xml_parser_free($parser);

    if(!$xml_values) return;//Hmm...

    //Initializations
    $xml_array = array();
    $parents = array();
    $opened_tags = array();
    $arr = array();

    $current = &$xml_array; //Refference

    //Go through the tags.
    $repeated_tag_index = array();//Multiple tags with same name will be turned into an array
    foreach($xml_values as $data) {
        unset($attributes,$value);//Remove existing values, or there will be trouble

        //This command will extract these variables into the foreach scope
        // tag(string), type(string), level(int), attributes(array).
        extract($data);//We could use the array by itself, but this cooler.

        $results = array();
        $attributes_data = array();

        if(isset($value)) {
            if($priority == 'tag') $results = $value;
            else $results['value'] = $value; //Put the value in a assoc array if we are in the 'Attribute' mode
        }

        //Set the attributes too.
        if(isset($attributes) and $get_attributes) {
            foreach($attributes as $attr => $val) {
                if($priority == 'tag') $attributes_data[$attr] = $val;
                else $results['attr'][$attr] = $val; //Set all the attributes in a array called 'attr'
            }
        }

        //See tag status and do the needed.
        if($type == "open") {//The starting of the tag ''
            $parent[$level-1] = &$current;
            if(!is_array($current) or (!in_array($tag, array_keys($current)))) { //Insert New tag
                $current[$tag] = $results;
                if($attributes_data) $current[$tag. '_attr'] = $attributes_data;
                $repeated_tag_index[$tag.'_'.$level] = 1;

                $current = &$current[$tag];

            } else { //There was another element with the same tag name

                if(isset($current[$tag][0])) {//If there is a 0th element it is already an array
                    $current[$tag][$repeated_tag_index[$tag.'_'.$level]] = $results;
                    $repeated_tag_index[$tag.'_'.$level]++;
                } else {//This section will make the value an array if multiple tags with the same name appear together
                    $current[$tag] = array($current[$tag],$results);//This will combine the existing item and the new item together to make an array
                    $repeated_tag_index[$tag.'_'.$level] = 2;

                    if(isset($current[$tag.'_attr'])) { //The attribute of the last(0th) tag must be moved as well
                        $current[$tag]['0_attr'] = $current[$tag.'_attr'];
                        unset($current[$tag.'_attr']);
                    }

                }
                $last_item_index = $repeated_tag_index[$tag.'_'.$level]-1;
                $current = &$current[$tag][$last_item_index];
            }

        } elseif($type == "complete") { //Tags that ends in 1 line ''
            //See if the key is already taken.
            if(!isset($current[$tag])) { //New Key
                $current[$tag] = $results;
                $repeated_tag_index[$tag.'_'.$level] = 1;
                if($priority == 'tag' and $attributes_data) $current[$tag. '_attr'] = $attributes_data;

            } else { //If taken, put all things inside a list(array)
                if(isset($current[$tag][0]) and is_array($current[$tag])) {//If it is already an array...

                    // ...push the new element into that array.
                    $current[$tag][$repeated_tag_index[$tag.'_'.$level]] = $results;

                    if($priority == 'tag' and $get_attributes and $attributes_data) {
                        $current[$tag][$repeated_tag_index[$tag.'_'.$level] . '_attr'] = $attributes_data;
                    }
                    $repeated_tag_index[$tag.'_'.$level]++;

                } else { //If it is not an array...
                    $current[$tag] = array($current[$tag],$results); //...Make it an array using using the existing value and the new value
                    $repeated_tag_index[$tag.'_'.$level] = 1;
                    if($priority == 'tag' and $get_attributes) {
                        if(isset($current[$tag.'_attr'])) { //The attribute of the last(0th) tag must be moved as well

                            $current[$tag]['0_attr'] = $current[$tag.'_attr'];
                            unset($current[$tag.'_attr']);
                        }

                        if($attributes_data) {
                            $current[$tag][$repeated_tag_index[$tag.'_'.$level] . '_attr'] = $attributes_data;
                        }
                    }
                    $repeated_tag_index[$tag.'_'.$level]++; //0 and 1 index is already taken
                }
            }

        } elseif($type == 'close') { //End of tag ''
            $current = &$parent[$level-1];
        }
    }

    return($xml_array);
}
// Check if sidebar have widgets
function is_sidebar_active( $index ){
  global $wp_registered_sidebars;
  
  foreach($wp_registered_sidebars as $registered){
      
      if($registered['name'] == $index){
          $id = $registered['id'];
      }
  }

  $widgetcolums = wp_get_sidebars_widgets();

  if ($widgetcolums[$id]) return true;
 
    return false;
} 
	
function theme_start(){
    
    $setupname = 'default';
		
		
			update_option(THEME_NAME.'-body-bgcolor-'.$setupname,'ededed');
		
			update_option(THEME_NAME.'-body-pattern-'.$setupname,'p1');
		
			update_option(THEME_NAME.'-horizontal-line-'.$setupname,'horizontal-line');
		
			update_option(THEME_NAME.'-fonts-color-'.$setupname,'2d7fe3');
		
			update_option(THEME_NAME.'-fonts-family-'.$setupname,'Droid Serif');
		
			update_option(THEME_NAME.'-body-type-'.$setupname,'pattern');
		
			update_option(THEME_NAME.'-body-image-'.$setupname,'1');
		
    
}


add_action ( 'publish_page', 'saveBlogId' );

   function saveBlogId($post_ID)  {
   	global $wp_query;
       $the_title =  get_the_title($post_ID);
  $template_name = get_post_meta( $post_ID, '_wp_page_template', true );
 if($template_name == "_blog.php"){
     update_option('id_blog_page',$post_ID);
     update_option('title_blog_page',$the_title);
 }
	
   $oldblog = get_option('id_blog_page');
   	if($post_ID == $oldblog){
   		  if($template_name <> "_blog.php"){
   		  		update_option('id_blog_page','');
   		  }
   	}
   }