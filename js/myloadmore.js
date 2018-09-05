jQuery(document).ready(function($){
		var data = {
			'action': 'loadmore',
			'query': loadmore_params.posts,
			'page' : loadmore_params.current_page
		};
		console.log(data);
		$('.load_more').click(function(){
			console.log('AJAAAAAAX');
			$.ajax({
				url : loadmore_params.ajaxurl,
				data:data,
				type:'POST',
				beforeSend: function( xhr ){
					// you can also add your own preloader here
					// you see, the AJAX call is in process, we shouldn't run it again until complete
					canBeLoaded = false; 
				},
				success:function(data){
					//console.log('AJAAAAAAX');
					if( data ) {
						$('main').find('.posts article.post:last-of-type').after( data ); // where to insert posts
						//_resize();
						//$(window).resize(_resize);
						$('.post').each(function(i, el){
 						//Show each item in it's turn
 						window.setTimeout(function(){
 						$(el).removeClass('hide').addClass('fadeIn');
 							}, 25 * i);
 						});
						canBeLoaded = true; // the ajax is completed, now we can run it again
						loadmore_params.current_page++;
					}
				}
			});
		});
	});