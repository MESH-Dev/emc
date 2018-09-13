jQuery(document).ready(function($){

  //Are we loaded?
  console.log('New theme loaded!');

  //Let's do something awesome!



  var videoElement = $('.matinee');
    
  // function toggleFullScreen() {
  //   if (!document.mozFullScreen && !document.webkitFullScreen) {
  //     if (videoElement.mozRequestFullScreen) {
  //       videoElement.mozRequestFullScreen();
  //     } else {
  //       videoElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
  //     }
  //   } else {
  //     if (document.mozCancelFullScreen) {
  //       document.mozCancelFullScreen();
  //     } else {
  //       document.webkitCancelFullScreen();
  //     }
  //   }
  // }
  
  //$('.tablet-down').on("click", function(e) {
    //if (e.keyCode == 13) {
      //toggleFullScreen();
    //}
  //});//, false);

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
    if($matinee.webkitRequestFullScreen){
      $matinee.webkitRequestFullScreen();
    }else if($matinee.mozRequestFullScreen){
      $matinee.mozRequestFullScreen();
    }else if($matinee.msRequestFullScreen){
      $matinee.msRequestFullScreen();
    }else{
      $matinee.RequestFullScreen();
    }
    //$matinee.webkitRequestFullScreen();
    //$matinee.mozRequestFullScreen();
    //$matinee.msRequestFullScreen();
    $matinee.RequestFullScreen();
    $('.player-holder').fadeOut('slow');
  });

  //  Here, we're trying to obtain information directly from the object,
  //  so we don't need to access the object data
  $('.matinee').on('pause', function(event){
    //console.log('Play Again');
    //$('.player-holder').fadeIn('slow');
  });

     //Force divs in homepage grid to be square
//Setup variables to hold our sizes
var gi2, gi3, gi4, gi5, gi6, gi7, cp3, cp4, cp5, cp6, cp7, $wW, hh, mh,wg_w, wg_h;
var $mclk = 0;
//Grab the width of each element
function gi_resize(){
  hh = $('header').height();
  mh = $('.matinee').height();
  wg_w = $('.welcome-gate').width();
  wg_h = $('.welcome-gate').height();
  gi2 = $('.grid-item-width2 ').width();
  gi3 = $('.grid-item-width3 ').width();
  //console.log(gi3);
  gi4 = $('.grid-item-width4 ').width();
  gi5 = $('.grid-item-width5 ').width();
  gi6 = $('.grid-item-width6 ').width();
  gi7 = $('.grid-item-width7 ').width();
  cp3 = $('.grid-item.columns-3').width();
  cp4 = $('.grid-item.columns-4').width();
  cp5 = $('.grid-item.columns-5').width();
  cp6 =  $('.grid-item.columns-6').width();
  //console.log(cp6);
  //cp6_alt = $('.columns-6')
  cp7 = $('.grid-item.columns-7').width();

  $wW = $(window).width();


  //return gi2, gi3, gi4;
}
//Run the function above at document ready and on a window resize event
 $(document).ready(gi_resize(gi2, gi3, gi4, gi5, gi6, gi7, cp3,cp4, cp5, cp6, cp7, $wW, hh, mh,wg_w, wg_h));
 $(window).resize(gi_resize(gi2, gi3, gi4, gi5, gi6, gi7, cp3, cp4, cp5, cp6, cp7, $wW, hh, mh,wg_w, wg_h));

//Apply our widths to the height of selected elements either on load, or on resize
function _resize(){
  gi_resize(gi2, gi3, gi4, gi5, gi6, gi7, cp3, cp4, cp5, cp6, cp7, $wW, hh, mh,wg_w, wg_h);
   $(window).resize(gi_resize(gi2, gi3, gi4, gi5, gi6, gi7, cp3, cp4, cp5, cp6, cp7,$wW,hh, mh,wg_w, wg_h));

 //  console.log("Width 2: "+gi2);
  // console.log("Width 3: "+gi3);
  //  console.log("Width 4: "+gi4);
  //$('.grid-item-width2').css({height: (gi2)});
 // $('.grid-item-width2.nest').css({height: (gi2*2)});
 // $('.grid-item-width2.nest .nested').css({height: gi2});
  //$('.grid-item-width3').css({height: gi3});
  //$('.grid-item-width4').css({height: gi4});
  //$('.grid-item-width5').css({height: gi5})
  //$('.grid-item-width6').css({height: (gi6*.66)});
 // $('.width6-diamond').css({height: (gi6*0.4)});
 // $('.columns-4.child-links').css({height:cp4});
  //$('.columns-6.promo').css({height: (cp6*.5)});
 // $('.columns-6.cpromo').css({height: (cp6*.66)});
  //console.log(cp6*.66);
  //$('.columns-6 .width6-diamond').css({height: (cp6*0.4)});
  //$('.columns-5.event-feed').css({height: (cp5)});
 // $('.columns-7.trip').css({height: cp5});
  //$('.grid-item-width6.nest').css({height: gi2});
 // $('.grid-item-width6.nest .nested').css({height: gi2});
  //$('.grid-item-width7').css({height: (gi5)});
  $('.grid-item.columns-3').css({height:cp3});
  $('.grid-item.columns-4').css({height:cp4});
  $('.welcome-gate.full-video').css({'height':'calc(100vh - ' + hh + 'px)', 'margin-top':hh});
  $('.video-holder').css({height:(wg_h-200), width:(wg_w-300)});
  //$('.matinee').css({height:wg_h, width:wg_w});
  //$('.matinee').css({width:(wg_w-150)});
  if($wW >= 1000){
    $('.grid-item.columns-6').css({height:cp6*0.66});
    $('.grid-item.columns-4.tweener').css({height:cp4});
  }else{
    $('.grid-item.columns-6').css({height:cp6});
    $('.grid-item.columns-4.tweener').css({height:cp6});
  }
  console.log($wW);
  console.log(hh);
  console.log(mh);
  console.log(wg_h);


  if($wW <= 1100){
    //$('.main-navigation').css({'display':'none'});

    //$('.main-navigation ul > li.menu-item-has-children .wrap .content').append(arrow);
    
  }else{
    //$('.main-navigation').css({'display':'inline-block'});
    // if(arrow.length > 0){
    //   $('.main-navigation ul li.menu-item-has-children .wrap .content').remove(arrow);
    // }
    
  }


}

//Run the function on load & on resize
_resize();
$(window).resize(_resize);

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

$('#topicTrigger').click(function(event){
   event.preventDefault();
   $('.panel.topics').slideToggle();
   $('.panel.search-filter').slideUp();
   $('.panel.locations').slideUp();
});

$('#searchTrigger').click(function(event){
   event.preventDefault();
   $('.panel.search-filter').slideToggle();
   $('.panel.topics').slideUp();
   $('.panel.locations').slideUp();
});

$('#locationTrigger').click(function(event){
   event.preventDefault();
   $('.panel.locations').slideToggle();
   $('.panel.topics').slideUp();
   $('.panel.search-filter').slideUp();
});

  //Vmap functionality for homepage

  // This is serializaed data that will be pulled from a variable created by
  // the locations that are entered into the appropriate ACF fields on the homepage

  //_pins = { "us" : "\u003ca href=\"#\"\u003e \u003cspan\u003eUSA\u003c/span\u003e \u003ca a/\u003e",//\u003cimg src=\"pk.png\" /\u003e
        	//"id" : "\u003ca href=\"#\"\u003e \u003cspan\u003eBRAZIL\u003c/span\u003e \u003ca a/\u003e"}; //\u003cimg src=\"pk.png\" /\u003e
  
if($('#vmap').size() > 0){
	$('#vmap').vectorMap({
	  map: 'world_en',
	  backgroundColor: 'rgba(255,255, 255, 0)',
	  color: '#F5B996',
	  borderWidth: 0,
	  borderOpacity: 0,
	  borderColor: '#F5B996',//#F5B996
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
    //pins: { "us" : "pin_for_us", "ru" : "pin_for_ru"},
	  //pins: { "us" : "\u003ca href=\"#\"\u003e \u003cimg src=\"pk.png\" /\u003e \u003cspan\u003eUSA\u003c/span\u003e \u003ca a/\u003e",
	// "id" : "\u003ca href=\"#\"\u003e \u003cimg src=\"pk.png\" /\u003e \u003cspan\u003eIndonesia\u003c/span\u003e \u003ca a/\u003e"},
	  pinMode: 'content'
	});
}

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
