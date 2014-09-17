/* Handel rating system that has been active in post */
jQuery(function () {
	
	$('.rating-loading').hide();
	$('#your-rating').hide();
	
	jQuery('.rating').mouseenter(function(){
		$('#your-rating').show();
		$('#user-rating').hide();
	}).mouseleave(function() {
		$('#your-rating').hide();
		$('#user-rating').show();
	});
	
	
	
	jQuery(".rating .star").hover(function(){
		var rate= $(this).data('rate');
		var p 	= $(this).parent(1).data('rate');
		if(p){ } else {
			$('#your-rating').find('.will-rate').html(rate);
		}
	});
	
	
	
	jQuery(".rating .star").click(function () {
	
		if( false == $(this).parent().hasClass('rating-view')){
		
			$(this).parent().children('.star').removeClass('active');
			$(this).prev('span.star').addClass('active');
			
			var rate	= $(this).data('rate');
			var post	= $(this).parent('.rating').data('post');
			var rat 	= $(this);
			
			$.ajax({
				type: "POST",
				url: mtcRating.ajaxurl,
				data: { action: "mtc-rating-sys", rate: rate, post:post },
				cache: false,
				async: false,
				beforeSend: function() {
					rat.parent('.rating').hide();
					rat.parent('.rating').prev('.rating-loading').show();
				},
				success: function(result) {
					var dataResult = eval('('+result+')');
					if(dataResult.status == 1){
						rat.parent('.rating').attr('data-rate',true).show();
						rat.parent('.rating').removeClass('rating').addClass('rating-view').prev('.rating-loading').hide();
						
						var n = parseInt($('.user-rate-text').data('count-rate'));
						$('.user-rate-text').find('small.count').html(n+1);
					}
					else{
						alert(dataResult.message);
						rat.parent('.rating').show();
						rat.parent('.rating').prev('.rating-loading').hide();
					}
				},
				error: function(result) {
					console.log(result);
					alert("some error occured, please try again");
				}
			}); 
		
		}
	});
});