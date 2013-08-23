jQuery(document).ready(function(){
	
         //WP Recent fix

        $('div[class*="recent-posts"] a').attr('style', 'line-height:20px!important;padding: 7px 0;');


        //Preloader
               jQuery('.menus-loader').hide();
        jQuery('.cat_cell').each(function(){
            jQuery(this).click(function(){
               jQuery('.menus-loader').show();
                           window.setTimeout(function() {
                                            jQuery('.menus-loader').hide();
                                        }, 1000);
            });
 
        });

//Portfolio Images
	
       
//Remove underline from last in submenu
	 //Add css classes to first and last item in the html list
    jQuery('ul.menu li:first-child').addClass('first_item');
    jQuery('ul.menu li:last-child').addClass('last_item');

	jQuery('.last_item').attr('style','background:none!important;height:22px!important;');
	
	
	jQuery('.pirobox').each(function(){
		jQuery('img',this).animate({opacity:1},0);
	});
	
	jQuery('img','.pirobox').hover(function(){
		jQuery(this).stop().animate({opacity:0.4},500);
	},function(){
		jQuery(this).stop().animate({opacity:1},300);
	});
	
	jQuery('.fancybox').each(function(){
		jQuery('img',this).animate({opacity:1},0);
	});
	
	jQuery('img','.fancybox').live("mouseover mouseout", function(event) {
          if ( event.type == "mouseover" ) {
            jQuery(this).stop().animate({opacity:0.4},500);
          } else {
            jQuery(this).stop().animate({opacity:1},300);
          }
        });
	
	
	//testimonials
	jQuery('.group1').show();
	
			
	jQuery('.tagcloud a').each(function(){
           var acont = jQuery(this).html();
           jQuery(this).html('<div class="illustration-button"><div class="illustration-left"></div><div class="illustration-center">'+acont+'</div><div class="illustration-right"></div></div>');
        });			
	
		
	      //Search style


					jQuery(".top-content-title #searchsubmit").remove();
					jQuery(".top-content-title .screen-reader-text").remove();

                    var searchfix2 = $('.sidebar_widget_holder #searchform').html();
                    $('.sidebar_widget_holder #searchform').html('').append('<div class="search-left"></div><div class="search-center">'+searchfix2+'</div><div class="search-right"></div>');
                    jQuery(".search-center div #searchsubmit").remove();
                    jQuery(".search-center div .screen-reader-text").remove();


                                        jQuery(".footer_widget_holder #searchsubmit").remove();
					jQuery(".footer_widget_holder .screen-reader-text").remove();

                    var searchfix3 = $('.footer_widget_holder #searchform').html();
                    $('.footer_widget_holder #searchform').html('').append('<div class="search-left"></div><div class="search-center">'+searchfix3+'</div><div class="search-right"></div>');
                    jQuery(".search-center div #searchsubmit").remove();
                    jQuery(".search-center div .screen-reader-text").remove();



	//Tabbed
	jQuery('.recent_butt').click(function(){
		jQuery('a',this).click();		
	});
	jQuery('.popular_butt').click(function(){
		jQuery('a',this).click();		
	});
	jQuery('.comments_butt').click(function(){
		jQuery('a',this).click();		
	});
        
        //Prevent empty search form submit
	jQuery('#searchsubmit').click(function(e){
		e.preventDefault();
		var value = jQuery('#s').val();
		if(value !== ""){
			jQuery('#searchform').submit();
		}
	});
	
	
	//Adding Classes
        
	jQuery('.search404 #searchform div').addClass('search-center');
       
        
	jQuery('.search404 #searchform').prepend('<div class="search-left"></div>');
	jQuery('.search404 #searchform').append('<div class="search-right"></div>');
	jQuery('.search404 #searchform input').val('To search type and hit enter');
	jQuery('.search404 #searchform input').attr('onblur','if(value=="")value=defaultValue');
	jQuery('.search404 #searchform input').attr('onfocus','if(value==defaultValue)value=""');
        
	jQuery('.search-center','.search404').css('display','inline');
	
        jQuery('.widget-title').each(function(){
           var cont = jQuery(this).html();
           $(this).html('<h2>'+cont+'</h2>');
        });
        
       

                    jQuery("input[name='s']").focus(function(){
                        if (jQuery(this).val() === "To search type and hit enter") {
                            jQuery(this).val("");
                        }
                    }).blur(function(){
                        if (jQuery(this).val() === "") {
                            jQuery(this).val("To search type and hit enter");
                        }
                    }).val("To search type and hit enter");
                           
                               
                    $("#searchform").submit(function() {
                        var value1 = jQuery('.footer_widget_holder #s').val();
                            if (value1 !== "Search" && value1 !== "") {
                                return true;
                                }
                                return false;
                    });
        
        jQuery('.images img').hover(function(){
        jQuery('img',this).stop().animate({opacity:0.4},500);
            },function(){
        jQuery('img',this).stop().animate({opacity:1},300);
        });
        
        
        //Fancy box
	jQuery('.fancybox').fancybox();


        jQuery().piroBox_ext({
	piro_speed : 700,
		bg_alpha : 0.5,
		piro_scroll : true // pirobox always positioned at the center of the page
	});

        	jQuery('.menus-loader').hide();

});