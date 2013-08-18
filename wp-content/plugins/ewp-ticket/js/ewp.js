var sending = 0;
$(document).ready(function(){
	$('.start-value').click(function(e){
		 e.stopPropagation();
		$('.from-popup').fadeIn();
	});
	$('.finish-value').click(function(e){
		 e.stopPropagation();
		$('.to-popup').fadeIn();
	});
	$("body").click(function() {
	    $('.ticket-popup').fadeOut();
	});
	
	$(".ticket-popup").click(function(e) {
	    e.stopPropagation();
	});
	
	$('.from-popup .popup-content a').click(function(){
		var value = $(this).html();
		$('.start-value').html(value);
		$('input#from').val(value);
		$('.ticket-popup').fadeOut();
		setTimeout(function(){
			$('.finish-value').trigger('click');
		}, 800);
		
	});
	$('.to-popup .popup-content a').click(function(){
		var value = $(this).html();
		$('.finish-value').html(value);
		$('input#to').val(value);
		$('.ticket-popup').fadeOut();
		setTimeout(function(){
			$('select[name*="start-date"]').show();
		}, 800);		
	});
	
	$('.ticket-submit button').click(function(){
		if(!sending && checkValidate()){
			var url = $('input#ajax-url').val();
			sending = 1;
			$.ajax({
				type: 'POST',
				url: url,
				data: {
					action: 'book_ticket',
					from: $('input#from').val(),
					to: $('input#to').val(),
					go_date: $('select[name*="start-date"]').val(),
					go_month: $('select[name*="start-month"]').val(),
					comeback_date: $('select[name*="comeback-date"]').val(),
					comeback_month: $('select[name*="comeback-month"]').val(),
					adult_count: $('select[name*="adult-count"]').val(),
					kid_count: $('select[name*="kid-count"]').val(),
					infant_count: $('select[name*="infant-count"]').val(),
					name:  $('input[name*="name"]').val(),
					phone:  $('input[name*="phone"]').val(),
					email:  $('input[name*="email"]').val(),			
				},
				complete: function(data, textStatus, XMLHttpRequest){
					sending = 0;
				}	
			});			
		}
	});
	
	$('#show-form').fancybox({
	});
});

function checkValidate(){
    var goDate = $('select[name*="start-date"]').val();
    var goMonth = $('select[name*="start-month"]').val();
    var comebackDate = $('select[name*="comeback-date"]').val();
    var comebackMoth = $('select[name*="comeback-month"]').val();
    var comeback = new Date(comebackDate + '/' + comebackMoth);
    var go = new Date(goDate + '/' + goMonth);
    var name = $('input[name*="name"]').val();
	var phone = $('input[name*="phone"]').val();
	var email =  $('input[name*="email"]').val();
    
    if(comebackDate && comebackMoth && (comeback.getTime() < go.getTime())){
        alert('Ngày trở về phải lớn hơn ngày đi');
        return 0;
    }
    if(!name){
        alert('Bạn cần điền tên');
        return 0;
    }
    if(!phone){
        alert('Bạn cần điền số điện thoại');
        return 0;
    }
    if(!email) {
        alert('Bạn cần điền địa chỉ email');
        return 0;
    }
    return 1;
}