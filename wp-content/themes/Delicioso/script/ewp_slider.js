(function($){
    $.fn.ewpSlider = function() {
        var numberSlides = $(this).find('li').length;
        var i = 0;
        var html = '<div class="anythingSlider anythingSlider-default activeSlider" style="height: 625px;">';
        var current = 1;
        
        html += '<div class="slider-wrapper">';
        html += '<ul class="slider">';
        $(this).find('li').each(function(){
            i++;
            console.log($(this).html());
            html += '<li id="slide-' + i + '">' + $(this).html() + '</li>';
        });
        html += '</ul>';
        html += '</div>';
        
        var links = '';
        for(var j = 1; j <= i; j ++){
            links += '<li><a href="#" class="panel1" id="link-' + j + '"><span>' + j + '</span></a></li>';
        }
        
        html += 
            '<div class="anythingControls" style="display:block;">' +
                '<ul class="thumbNav">' +
                    '<li class="anythingControls-left"></li>' +
                    links +
                    '<li class="anythingControls-right"></li>' +
                '</ul>' +
            '</div>' +
            '<div class="bottom-border"></div>';
        html += '</div>';
        
        $(this).closest('div').html(html);

        //tramission
        $('.slider li').not('li#slide-' + current).hide();
        $('#link-' + current).addClass('cur');
        
        setInterval(function(){
            $('ul.slider').attr('style', $('li#slide-' + current + ' > div').attr('style'));
            
            current = (current % i) + 1;
            
            //$('.slider li').not('li#slide-' + current).fadeOut(500);
            $('.slider li').not('li#slide-' + current).hide();
            $('li#slide-' + current).fadeIn(1200);
            
            $('.thumbNav li a').removeClass('cur');
            $('#link-' + current).addClass('cur');
            
        }, 5000);
        
        $('.thumbNav li a').click(function(e){
            e.preventDefault();
            $('.thumbNav li a').removeClass('cur');
            $(this).addClass('cur');
            $('ul.slider').attr('style', $('li#slide-' + current + ' > div').attr('style'));
            
            current = $(this).find('span').html();
            
            $('.slider li').not('li#slide-' + current).hide();
            $('li#slide-' + current).fadeIn(1200);
        })
    }
}(jQuery));