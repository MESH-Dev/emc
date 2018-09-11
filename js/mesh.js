jQuery(document).ready(function($){

  //Are we loaded?
  console.log('New theme loaded!');

  //Let's do something awesome!


  //  We're setting up the video to play on our image click,
  //  so here, we're trying to get information from the video object,
  //  which is why our selector is referencing an array

  $('.play.desktop-up').click(function(event){
    $matinee = $('.matinee')[0];
    $matinee.play();
    $matinee.controls = true;
    //$matinee.requestFullscreen();
    $('.player-holder').fadeOut('slow');
  });

//Fullscreen not yet working on Firefox
  $('.play.tablet-down').click(function(event){
    $matinee = $('.matinee')[0];
    $matinee.play();
    $matinee.controls = true;
    //$matinee.requestFullscreen();
    $matinee.webkitRequestFullScreen();
    $matinee.mozRequestFullScreen();
    $matinee.msRequestFullScreen();
    $matinee.RequestFullScreen();
    $('.player-holder').fadeOut('slow');
  });

  //  Here, we're trying to obtain information directly from the object,
  //  so we don't need to access the object data
  $('.matinee').on('pause', function(event){
    //console.log('Play Again');
    //$('.player-holder').fadeIn('slow');
  });

  $('#mobileMenuTrigger').sidr({
     // name: 'mobile',
     onOpen: function(){
        $('#mobileMenuTrigger .menu-icon').toggle();
        $('#mobileMenuTrigger .menu-close').toggle();
     },
     onClose: function(){
       $('#mobileMenuTrigger .menu-icon').toggle();
       $('#mobileMenuTrigger .menu-close').toggle();
     },
     displace: false,
     renaming: false,
     side: 'right',
     source: '#header-main, #menu-gateway_nav, #header-social'
 });

 $('.menu-item-has-children > a').after('<div class="after-arrow"></div>');

 $('ul#menu-main_nav li.menu-item-has-children').click(function(){
    $(this).children('.sub-menu').toggleClass('open');
    $(this).children('.after-arrow').toggleClass('open');
 });

//  $('#mobileMenuTrigger').click(function(){
//     $.sidr('toggle', 'mobile');
// });

 // $('.submit').hide();

$('#search').click(function(){
   $('.search-field').toggleClass('open');
   $('.submit').toggleClass('show');
});

$('#tickerClose').click(function(event){
   event.preventDefault();
   $('.ticker').toggle();
});

  //Vmap functionality for homepage

  // This is serializaed data that will be pulled from a variable created by
  // the locations that are entered into the appropriate ACF fields on the homepage

  _pins = { "us" : "\u003ca href=\"#\"\u003e \u003cspan\u003eUSA\u003c/span\u003e \u003ca a/\u003e",//\u003cimg src=\"pk.png\" /\u003e
        	"id" : "\u003ca href=\"#\"\u003e \u003cspan\u003eBRAZIL\u003c/span\u003e \u003ca a/\u003e"}, //\u003cimg src=\"pk.png\" /\u003e

	$('#vmap').vectorMap({
	  map: 'world_en',
	  backgroundColor: 'rgba(255,255, 255, 0)',
	  color: '#F5B996',
	  borderWidth: 3,
	  borderOpacity: 1,
	  borderColor: '#F5B996',
	  hoverColor :'#ff00ff',
	  //hoverOpacity: 1,
	  selectedColor: '#EB742D',
	  enableZoom: false,
	  showTooltip: false,
	  scaleColors: ['#C8EEFF', '#006491'],
	  onRegionLabelShow: function(e, el, code){
	    e.preventDefault();
	  },
	  //values: sample_data,
	  normalizeFunction: 'linear', //polynomial, linear,
	  //Can 'pins' use serialized var? YES
	  pins: _pins,
	  //pins: { "us" : "\u003ca href=\"#\"\u003e \u003cimg src=\"pk.png\" /\u003e \u003cspan\u003eUSA\u003c/span\u003e \u003ca a/\u003e",
	// "id" : "\u003ca href=\"#\"\u003e \u003cimg src=\"pk.png\" /\u003e \u003cspan\u003eIndonesia\u003c/span\u003e \u003ca a/\u003e"},
	  pinMode: 'content'
	});

  var getUrlParameter = function getUrlParameter() { //sParam
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

        console.log(sPageURL);
        var sp = [];

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        sp += sParameterName;
        console.log(sp);
        //We only need this if statement if we are sending the function our
        // if (sParameterName[0] === sParam) {
        //     return sParameterName[1] === undefined ? true : sParameterName[1];
        // }

        return sParameterName;
    }
};

var $parameter = getUrlParameter();
console.log($parameter[0]);

console.log('Parameter = '+getUrlParameter());
console.log('Parameter name = '+getUrlParameter());

// var param = window.location.search;
// var fparam = param.split('&');
// //var cparam = fparam.split('=');
// console.log('Search param = '+fparam);

// Runs the filter query based on the url search
// could be shortened so that we don't have to run a million if statements
// still need one for search
//__If we're running the filter POSTS
if(getUrlParameter != '' && getUrlParameter !== "undefined" && $parameter[0] == 'category'){
  $(window).on('load',function(){
    loadPostsByTopic($parameter[1],'');
  });
  //If we're running the search POSTS
}else if (getUrlParameter != '' && getUrlParameter !== "undefined" && $parameter[0] == 'query'){
  $(window).on('load',function(){
  loadPostsByTopic('',$parameter[1]);
  });
}

	function loadPostsByTopic (postTopic, query) { //*

      //console.log(projectType);
      //console.log(query);  //*
      var is_loading = false;
       if (is_loading == false){
            is_loading = true;

 			$('loader-container').removeClass('hide');
            $('.loader, .loader-container').fadeIn(200);

            var data = {
                action: 'get_post_by_topic',  //Our function from function.php
                postTopic: postTopic, //the return value
                data: "?query=",
                //contentType: contentType,
                query: query //Are we using the search?
            };
            jQuery.post(ajaxurl, data, function(response) {
                // now we have the response, so hide the loader

                //console.log(response);
                //console.log(data);
                //console.log(memberResource);
                //console.log(contentType);
                //console.log(get_member_resources);

               //$('a#load-more-photos').show();
                // append: add the new statments to the existing data
                if(response != 0){

                  $('.post').detach();
                  $('#posts').append(response);
                  //$container.waitForImages(function() {
                  //   $('#loader').hide();
                  // });
 					$('.loader').fadeOut(1000);
 					$('.loader-container').fadeOut(300);
 					$('.member-resource-item').addClass('hide');
 					//$('.projects-nav ul > li').removeClass('selected');
 					//Adds slideinLeft and animated classes to each project tile in order
 					$('.member-resource-item').each(function(i, el){
 						//Show each item in it's turn
 						window.setTimeout(function(){
 						$(el).removeClass('hide').addClass('fadeIn animated');
 						}, 50 * i);
 					});
 					$('.search_form')
 						.removeClass('slideInLeft')
 						.addClass('slideOutLeft');
 					// $('.projects-nav.gallery')
 					// 	.removeClass('slideInLeft')
 					// 	.addClass('slideOutLeft');
                  is_loading = false;
                  //console.log(url);
                //   if(query != '')
                //   	//history.pushState(null, null, '?s='+query);
                }
                else{
                  $('#loader').hide();

                  is_loading = false;
                }


            });
        }
  }

  $('.topic-filter li').click(function(e){
    e.preventDefault;
    $(this).parent().find('li.selected').removeClass('selected');

     $(this).addClass('selected');
    var postTopic = $('.topic-filter li.selected').attr('data-filter');
    // Push the filter that was used to the end of the current URL so that we can use it
    // to run our functions when the user is visiting from a shared link
    // if(postTopic != ''){
    //   history.pushState(null, null, '?category='+postTopic);
    // }else{
    //   history.replaceState(null, null, window.location.pathname);
    // }
    //var cat = getUrlParameter('category');
    //console.log(cat);
    //console.log(postTopic);
    //Run our function above using our topic filter data
    loadPostsByTopic(postTopic,'');
  });



  $('.mr-search-filter form').submit(function(e){
  	e.preventDefault();
  	var $form = $(this);
  	var $input = $form.find('input[name="s"]');
  	var query = $input.val();

    // Push the search query to the end of the current URL so that we can use it to run
    // our functions when a user is visiting from a shared link
    // if(query != ''){
  	 // history.pushState(null, null, '?query='+query);
    // }else{
    //   history.pushState(null, null, window.location.pathname);
    // }

    //Run our AJAX function loadPostsByTopic(topic, query)
  	loadPostsByTopic('',query);

    //Detach all of our original posts so that we can add our results back to the DOM
  	$('.post').detach();

  });

function loadCommunityMembers (query) { //*

      //console.log(projectType);
      //console.log(query);  //*
      var is_loading = false;
       if (is_loading == false){
            is_loading = true;

      $('loader-container').removeClass('hide');
            $('.loader, .loader-container').fadeIn(200);

            var data = {
                action: 'get_community_members',  //Our function from function.php
                //postTopic: postTopic, //the return value
                data: "?query=",
                //contentType: contentType,
                query: query //Are we using the search?
            };
            jQuery.post(ajaxurl, data, function(response) {
                // now we have the response, so hide the loader

                //console.log(response);
                //console.log(data);
                //console.log(memberResource);
                //console.log(contentType);
                //console.log(get_member_resources);

               //$('a#load-more-photos').show();
                // append: add the new statments to the existing data
                if(response != 0){

                  $('.post').detach();
                  $('#posts').append(response);
                  //$container.waitForImages(function() {
                  //   $('#loader').hide();
                  // });
          $('.loader').fadeOut(1000);
          $('.loader-container').fadeOut(300);
          $('.member-resource-item').addClass('hide');
          //$('.projects-nav ul > li').removeClass('selected');
          //Adds slideinLeft and animated classes to each project tile in order
          $('.member-resource-item').each(function(i, el){
            //Show each item in it's turn
            window.setTimeout(function(){
            $(el).removeClass('hide').addClass('fadeIn animated');
            }, 50 * i);
          });
          $('.search_form')
            .removeClass('slideInLeft')
            .addClass('slideOutLeft');
          // $('.projects-nav.gallery')
          //  .removeClass('slideInLeft')
          //  .addClass('slideOutLeft');
                  is_loading = false;
                  //console.log(url);
                //   if(query != '')
                //    //history.pushState(null, null, '?s='+query);
                }
                else{
                  $('#loader').hide();

                  is_loading = false;
                }


            });
        }
  }



$('.cr-search-filter form').submit(function(e){
    e.preventDefault();
    var $form = $(this);
    var $input = $form.find('input[name="s"]');
    var query = $input.val();

    // Push the search query to the end of the current URL so that we can use it to run
    // our functions when a user is visiting from a shared link
    if(query != ''){
     history.pushState(null, null, '?query='+query);
    }else{
      history.pushState(null, null, window.location.pathname);
    }

    //Run our AJAX function loadPostsByTopic(topic, query)
    loadCommunityMembers(query);

    //Detach all of our original posts so that we can add our results back to the DOM
    $('.post').detach();

  });

function loadEvents (eventTopic, eventLocation, query) { //*

      //console.log(projectType);
      //console.log(query);  //*
      var is_loading = false;
       if (is_loading == false){
            is_loading = true;

      $('loader-container').removeClass('hide');
            $('.loader, .loader-container').fadeIn(200);

            var data = {
                action: 'get_events',  //Our function from function.php
                //postTopic: postTopic,
                eventTopic: eventTopic,
                eventLocation: eventLocation, //the return value
                data: "?query=",
                //contentType: contentType,
                query: query //Are we using the search?
            };
            jQuery.post(ajaxurl, data, function(response) {
                // now we have the response, so hide the loader

                //console.log(response);
                //console.log(data);
                //console.log(memberResource);
                //console.log(contentType);
                //console.log(get_member_resources);

               //$('a#load-more-photos').show();
                // append: add the new statments to the existing data
                if(response != 0){

                  $('.card').detach();
                  $('.post-error').detach();
                  $('.row.event-grid').detach();
                  $('#emc-events').append(response);
                  //$container.waitForImages(function() {
                  //   $('#loader').hide();
                  // });
          $('.loader').fadeOut(1000);
          $('.loader-container').fadeOut(300);
          $('.card').addClass('hide');
          //$('.projects-nav ul > li').removeClass('selected');
          //Adds slideinLeft and animated classes to each project tile in order
          $('.card').each(function(i, el){
            //Show each item in it's turn
            window.setTimeout(function(){
            $(el).removeClass('hide').addClass('fadeIn animated');
            }, 50 * i);
          });
          $('.search_form')
            .removeClass('slideInLeft')
            .addClass('slideOutLeft');
          // $('.projects-nav.gallery')
          //  .removeClass('slideInLeft')
          //  .addClass('slideOutLeft');
                  is_loading = false;
                  //console.log(url);
                //   if(query != '')
                //    //history.pushState(null, null, '?s='+query);
                }
                else{
                  $('#loader').hide();

                  is_loading = false;
                }


            });
        }
  }

$('.e-topic-filters li').click(function(e){
    e.preventDefault;
    $(this).parent().parent().find('ul li.selected').removeClass('selected');

     $(this).addClass('selected');
    var eventTopic = $('.e-topic-filters li.selected').attr('data-filter');
    console.log("eventTopic = "+eventTopic);
    // Push the filter that was used to the end of the current URL so that we can use it
    // to run our functions when the user is visiting from a shared link
    if(eventTopic != ''){
      history.pushState(null, null, '?category='+eventTopic);
    }else{
      history.replaceState(null, null, window.location.pathname);
    }
    var cat = getUrlParameter('category');
    //console.log(cat);
    //console.log(postTopic);
    //Run our function above using our topic filter data
    loadEvents(eventTopic,'', '');
  });

$('.e-location-filters li').click(function(e){
    e.preventDefault;
    $(this).parent().parent().find('ul li.selected').removeClass('selected');

     $(this).addClass('selected');
    var eventLocation = $('.e-location-filters li.selected').attr('data-filter');
    //console.log("eventTopic = "+eventTopic);
    // Push the filter that was used to the end of the current URL so that we can use it
    // to run our functions when the user is visiting from a shared link
    if(eventLocation != ''){
      history.pushState(null, null, '?location='+eventLocation);
    }else{
      history.replaceState(null, null, window.location.pathname);
    }
    var loc = getUrlParameter('location');
    //console.log(cat);
    //console.log(postTopic);
    //Run our function above using our topic filter data
    loadEvents('', eventLocation, '');
  });

$('.e-search-filter form').submit(function(e){
    e.preventDefault();
    var $form = $(this);
    var $input = $form.find('input[name="s"]');
    var query = $input.val();

    // Push the search query to the end of the current URL so that we can use it to run
    // our functions when a user is visiting from a shared link
    if(query != ''){
     history.pushState(null, null, '?query='+query);
    }else{
      history.pushState(null, null, window.location.pathname);
    }

    //Run our AJAX function loadPostsByTopic(topic, query)
    loadEvents('','',query);

    //Detach all of our original posts so that we can add our results back to the DOM
    $('.card').detach();

  });

//2nd type of AJAX onclick

// $('.load_more').click(function(){
 
//     var button = $(this),
//         data = {
//       'action': 'loadmore',
//       'query': loadmore_params.posts, // that's how we get params from wp_localize_script() function
//       'page' : loadmore_params.current_page
//     };
 
//     $.ajax({
//       url : loadmore_params.ajaxurl, // AJAX handler
//       data : data,
//       type : 'POST',
//       beforeSend : function ( xhr ) {
//         button.text('Loading...'); // change the button text, you can also add a preloader image
//       },
//       success : function( data ){
//         if( data ) { 
//           button.text( 'More posts' ).prev().before(data); // insert new posts
//           loadmore_params.current_page++;
 
//           if ( loadmore_params.current_page == loadmore_params.max_page ) 
//             button.remove(); // if last page, remove the button
 
//           // you can also fire the "post-load" event here if you use a plugin that requires it
//           // $( document.body ).trigger( 'post-load' );
//         } else {
//           button.remove(); // if no data, remove the button as well
//         }
//       }
//     });
//   });

});
