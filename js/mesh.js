jQuery(document).ready(function($){

  //Are we loaded?
  console.log('New theme loaded!');
  th= $('.ticker').height();
  nh=$('.top-nav').height();
   hh = (th + nh);
   console.log(hh);
  //Let's do something awesome!

// $(window).scroll(function(){
//   if($(window).scrollTop() > 150){
//     $('header').addClass('fixed');
//   }else{
//     $('header').removeClass('fixed');
//   }
// })

//FILTER SCROLL--------------------------

// var scrolling = false,
//    filterBars = document.getElementsByClassName('scrollable');
//    // console.log(filterBars);
//
// // for (var i = 0; i < filterBars.length; i++) {
// //    // if (filterBars[i].offsetWidth > filterBars[i].scrollWidth) {
// //    //    $(this).siblings('.arrow-up, .arrow-down').hide();
// //    // }
// //    var thisWidth = filterBars[i].scrollWidth;
// //    console.log(thisWidth);
// // }
//
//     $('.arrow-up, .arrow-down').on('mousedown', function (evt) {
//         scrolling = true;
//         startScrolling($(this).siblings('ul.scrollable'), 5, evt.currentTarget.className);
//     }).on('mouseup', function () {
//         scrolling = false;
//     });
//
//     function startScrolling(obj, spd, btn) {
//         var travel = (btn.indexOf('up') > -1) ? '-=' + spd + 'px' : '+=' + spd + 'px';
//         if (!scrolling) {
//             obj.stop();
//         } else {
//             // recursively call startScrolling while mouse is pressed
//             obj.animate({
//                 "scrollLeft": travel
//             }, 5, function () {
//                 if (scrolling) {
//                     startScrolling(obj, spd, btn);
//                 }
//             });
//         }
//     }

// $(".scroller").smoothDivScroll({
//  // startAtElementId: "starter",
//  // hotSpotScrollingInterval: 33,
//  // touchScrolling: true,
//  // setupComplete: function(){
//  //       $('.panel.topics, .panel.locations, .panel.search-filter').hide();
//  //   }
// });

// $('.panel.topics, .panel.locations, .panel.search-filter').hide();


//FILTER SCROLL--------------------------

function createCookie(name,value,days) {
if (days) {
    var date = new Date();
    date.setTime(date.getTime()+(days*24*60*60*1000));
    var expires = "; expires="+date.toGMTString();
}
else var expires = "";
document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
var nameEQ = name + "=";
var ca = document.cookie.split(';');
for(var i=0;i < ca.length;i++) {
    var c = ca[i];
    while (c.charAt(0)==' ') c = c.substring(1,c.length);
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
}
return null;
}

console.log(readCookie());

function eraseCookie(name) {
createCookie(name,"",-1);
}


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

  $('.play').click(function(event){

    // $('.player-holder').fadeOut('slow');
    // $('.banner-text').fadeOut('slow');
    $('.video-holder').fadeIn('slow');
  });

  $('.play.desktop-up').click(function(event){
    $matinee = $('.matinee')[0];
    $matinee.play();
    $matinee.controls = true;
    //$matinee.requestFullscreen();
    $('.player-holder').fadeOut('slow');
    $('.banner-text').fadeOut('slow');
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

  var i, pp;
 var pp_l = [];
 var pp_r = [];
 var pp_e = [];
 var pp_w = [];
pp = $('.pins .pin');
//console.log(pp.position().left);
  // for(i=0; i < pp.length; i++){
  //   //var pp_v = [];
  //   var r = pp.position().left;
  //   console.log(r);
  //   pp_v.push(r);
  //   console.log(pp_v);
  // }

$('.pins .pin').each(function(){
  var l = parseInt($(this).css('left'));
  var r = parseInt($(this).css('right'));
  var lr = l+r;
  var w = $(this).width();
  var $pin = $(this);
  pp_l.push(l);
  pp_r.push(r);
  pp_w.push(w);
  pp_e.push($pin);

});


     //Force divs in homepage grid to be square
//Setup variables to hold our sizes
var gi2, gi3, gi4, gi5, gi6, gi7, cp3, cp4, cp5, cp6, cp7, $wW, hh, mh,wg_w, wg_h, mi_w, mi_h, pp;
var $mclk = 0;
//Grab the width of each element
function gi_resize(){
 // th= $('.ticker').height();
 // nh=$('.top-nav').height();
 //  hh = (th + nh);
 //  console.log(hh);
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
  mi_w = $('.panel.map').width();
  // mi_h = $('.panel.map').height();
  // mi_w = $('.panel.map img').width();
  // mi_h = $('.panel.map img').height();
  //pp_r = $('.pins .pin.right').position();
  //pp_l = $('.pins .pin.left').position();

  // $('.pins .pin').each(function(){
  //   var pp = $(this).position;
  //   console.log(pp);
  // });

// pp = $('.pins .pin').each(function(){var pp_p = $(this).position().left; console.log($(this).position)});
// console.log(pp);

  //pp_l = pp.left;
  //pp_r = pp.right;
  //console.log(pp);
  //console.log(pp_r);
  //console.log(mi_w);
  //console.log(cp6);
  //cp6_alt = $('.columns-6')
  cp7 = $('.grid-item.columns-7').width();

  $wW = $(window).width();


  //return gi2, gi3, gi4;
}
//Run the function above at document ready and on a window resize event
 $(document).ready(gi_resize(gi2, gi3, gi4, gi5, gi6, gi7, cp3,cp4, cp5, cp6, cp7, $wW, hh, mh,wg_w, wg_h, mi_w, mi_h, pp));
 $(window).resize(gi_resize(gi2, gi3, gi4, gi5, gi6, gi7, cp3, cp4, cp5, cp6, cp7, $wW, hh, mh,wg_w, wg_h, mi_w, mi_h, pp));

//Apply our widths to the height of selected elements either on load, or on resize
function _resize(){
  gi_resize(gi2, gi3, gi4, gi5, gi6, gi7, cp3, cp4, cp5, cp6, cp7, $wW, hh, mh,wg_w, wg_h, mi_w, mi_h, pp);
   $(window).resize(gi_resize(gi2, gi3, gi4, gi5, gi6, gi7, cp3, cp4, cp5, cp6, cp7,$wW,hh, mh,wg_w, wg_h, mi_w, mi_h, pp));

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
  $('.welcome-gate.large').css({'height':'calc(100vh - ' + hh + 'px)', 'margin-top':hh});
  //$('.player-holder').css({'height':'calc(100vh - ' + hh + 'px)'});
  $('.welcome-gate.interior').css({'margin-top':hh});
  //$('.film-single').css({'margin-top':'calc(100vh - ' + hh + 'px)'});
  //$('.video-holder').css({height:(wg_h), width:(wg_w)});
  //$('.map_wrapper').css({height:mi_h, width:mi_w});
  //$('.matinee').css({height:wg_h, width:wg_w});
  //$('.matinee').css({width:(wg_w-150)});
  // if($wW >= 1000){
  //   $('.grid-item.columns-6').css({height:cp6*0.66});
  //   $('.grid-item.columns-4.tweener').css({height:cp4});
  // }else{
  //   $('.grid-item.columns-6').css({height:cp6});
  //   $('.grid-item.columns-4.tweener').css({height:cp6});
  // }
// if(mi_w < 1400){
// $('.pins .pin').each(function(i){
//   pp_e[i].css({left:((pp_l[i]/mi_w)*100)+'%'});
//   //pp_e[i].css({right:(mi_w-(pp_l[i]+pp_r[i]))});
// });
// }

  // for(i=0; i < $('.pins .pin').length; i++){
  //   pp_e[i].css({left:((pp_v[i]/mi_w)*100)+'%'});
  // }


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

 $('.sidr-inner li.menu-item-has-children').click(function(){
    $(this).children('.sub-menu').toggleClass('open');
    $(this).children('.after-arrow').toggleClass('open');
 });

//  $('#mobileMenuTrigger').click(function(){
//     $.sidr('toggle', 'mobile');
// });

 // $('.submit').hide();

//createCookie('ticker','false','');

$('#search').click(function(){
   $('.search-field').toggleClass('open');
   $('.submit').toggleClass('show');
});

$('#tickerClose').click(function(event){
   event.preventDefault();
   $('.ticker').toggle();
   var hh = $('header').height();
   //console.log(hh);
   $('.welcome-gate').css({'margin-top':hh});
   //eraseCookie('ticker');
   createCookie('ticker','true',1);
});

var $ticker = readCookie('ticker');
console.log($ticker);
if($ticker == 'true'){
  $('.ticker').addClass('hide');
  var hh = $('header').height();
  $('.welcome-gate').css({'margin-top':hh});
}

$('#modalOpen').click(function(event){
   event.preventDefault();
   $('.modal').addClass('show');
});

$('#modalClose').click(function(){
   $('.modal').removeClass('show');
});

$('a.filter-trigger').click(function(){
   if ($(this).is('.open')) {
      $(this).removeClass('open');
   }else{
      $('a.filter-trigger').each(function(){
         $(this).removeClass('open');

      });
      $(this).addClass('open');

   }
});

$('#topicTrigger').click(function(event){
   event.preventDefault();
   $('.panel.topics').slideToggle();
   $(".scroller").smoothDivScroll({
    // startAtElementId: "starter",
    // hotSpotScrollingInterval: 33,
    touchScrolling: true
   });
   $('.panel.topics .arrow-up, .panel.topics .arrow-down').slideToggle();
   // var currentFilters = $('.panel.topics').find('.scrollable');
   // console.log(currentFilters);
   // var ulWidth = currentFilters[0].offsetWidth;
   // var filtersWidth = currentFilters[0].scrollWidth;
   // console.log(ulWidth);
   // console.log(filtersWidth);
   // if (currentFilters[0].offsetWidth >= currentFilters[0].scrollWidth) {
   //    $('.panel.topics').find('.arrow-up, .arrow-down').hide();
   //    // console.log('topics buttons hidden');
   // }
   $('.panel.locations .arrow-up, .panel.locations .arrow-down').slideUp();
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
   $(".scroller").smoothDivScroll({
    // startAtElementId: "starter",
    // hotSpotScrollingInterval: 33,
    // autoScrollingMode: "onStart",
   //  mouseOverRightHotSpot: function(){
   //    alert("Moused over right hotspot");
   // }
   touchScrolling: true
   });
   $('.panel.locations .arrow-up, .panel.locations .arrow-down').slideToggle();
   // var currentFilters = $('.panel.locations').find('.scrollable');
   // console.log(currentFilters);
   // console.log(currentFilters[0].scrollWidth);
   // console.log(currentFilters[0].offsetWidth);
   // if (currentFilters[0].scrollWidth <= currentFilters[0].offsetWidth) {
      // $('.panel.locations').find('.arrow-up, .arrow-down').hide();
      // console.log('locations buttons hidden');
   // }
   $('.panel.topics .arrow-up, .panel.topics .arrow-down').slideUp();
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

//Autocomplete
// see https://goodies.pixabay.com/jquery/auto-complete/demo.html for more info

//Search posts
$('input[name="sp"]').autoComplete({
    minChars: 2,
    source: function(term, suggest){
        term = term.toLowerCase();
        //var choices = ['ActionScript', 'AppleScript', 'Asp'];
        var choices = da_choices;
        var matches = [];
        for (i=0; i<choices.length; i++)
            if (~choices[i].toLowerCase().indexOf(term)) matches.push(choices[i]);
        suggest(matches);
    }
});

//Search events
$('input[name="se"]').autoComplete({
    minChars: 2,
    source: function(term, suggest){
        term = term.toLowerCase();
        //var choices = ['ActionScript', 'AppleScript', 'Asp'];
        var choices = ec_choices;
        var matches = [];
        for (i=0; i<choices.length; i++)
            if (~choices[i].toLowerCase().indexOf(term)) matches.push(choices[i]);
        suggest(matches);
    }
});

//Search Community
$('input[name="community-search"]').autoComplete({
    minChars: 2,
    source: function(term, suggest){
        term = term.toLowerCase();
        //var choices = ['ActionScript', 'AppleScript', 'Asp'];
        var choices = da_choices;
        var matches = [];
        for (i=0; i<choices.length; i++)
            if (~choices[i].toLowerCase().indexOf(term)) matches.push(choices[i]);
        suggest(matches);
    }
});

//Search film
$('input[name="sf"]').autoComplete({
    minChars: 2,
    source: function(term, suggest){
        term = term.toLowerCase();
        //var choices = ['ActionScript', 'AppleScript', 'Asp'];
        var choices = fc_choices;
        var matches = [];
        for (i=0; i<choices.length; i++)
            if (~choices[i].toLowerCase().indexOf(term)) matches.push(choices[i]);
        suggest(matches);
    }
});

  var getUrlParameter = function getUrlParameter() { //sParam
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

        //console.log(sPageURL);
        var sp = [];

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        sp += sParameterName;
        //console.log(sp);
        //We only need this if statement if we are sending the function our
        // if (sParameterName[0] === sParam) {
        //     return sParameterName[1] === undefined ? true : sParameterName[1];
        // }

        return sParameterName;
    }
};

var $parameter = getUrlParameter();
//console.log($parameter[0]);

//console.log('Parameter = '+getUrlParameter());
//console.log('Parameter name = '+getUrlParameter());

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
    $('.load_more').hide();

  });
  //If we're running the search POSTS
// }else if (getUrlParameter != '' && getUrlParameter !== "undefined" && $parameter[0] == 'query'){
//   $(window).on('load',function(){
//   loadPostsByTopic('',$parameter[1]);
//   });
}else if(getUrlParameter != '' && getUrlParameter !== "undefined" && $parameter[0] == 'location'){
  $(window).on('load',function(){
  loadEvents('',$parameter[1], '');
  $('.load_more').hide();
  });
}else if(getUrlParameter != '' && getUrlParameter !== "undefined" && $parameter[0] == 'event-topic'){
  $(window).on('load',function(){
  loadEvents($parameter[1],'', '');
  $('.load_more').hide();
  });
}else if(getUrlParameter != '' && getUrlParameter !== "undefined" && $parameter[0] == 'film-topic'){
  $(window).on('load',function(){
  loadFilms($parameter[1], '');
  $('.load_more').hide();
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

    //Hide the load_more nav when the filter is used,
    //show when All posts are shown.
    $('.load_more').hide();
    if(postTopic == ''){
      $('.load_more').show();
    }
  });



  $('.mr-search-filter form').submit(function(e){
  	e.preventDefault();
  	var $form = $(this);
  	var $input = $form.find('input[name="sp"]');
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

    //Hide the load_more nav if the search is used,
    //show if the input is cleared
    $('.load_more').hide();
    if($input == ''){
      $('.load_more').show();
    }

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

                  $('.row.people-row').detach();
                  $('.post-error').detach();
                  $('#emc-community').append(response);
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
    var $input = $form.find('input[name="community-search"]');
    var query = $input.val();
//console.log(query);
    // Push the search query to the end of the current URL so that we can use it to run
    // our functions when a user is visiting from a shared link
    // if(query != ''){
    //  history.pushState(null, null, '?query='+query);
    // }else{
    //   history.pushState(null, null, window.location.pathname);
    // }

    //Run our AJAX function loadPostsByTopic(topic, query)
    loadCommunityMembers(query);

    //Detach all of our original posts so that we can add our results back to the DOM
    $('.row.people-row').detach();
    $('.load_more').hide();
    if(query == ''){
      $('.load_more').show();
    }

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
    //console.log("eventTopic = "+eventTopic);
    // Push the filter that was used to the end of the current URL so that we can use it
    // to run our functions when the user is visiting from a shared link
    if(eventTopic != ''){
      history.pushState(null, null, '?event-topic='+eventTopic);
    }else{
      history.replaceState(null, null, window.location.pathname);
    }
    var cat = getUrlParameter('category');
    //console.log(cat);
    //console.log(postTopic);
    //Run our function above using our topic filter data
    loadEvents(eventTopic,'', '');
    $('.load_more').hide();
    if(eventTopic == ''){
      $('.load_more').show();
    }
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
      history.pushState(null, null, '?event-location='+eventLocation);
    }else{
      history.replaceState(null, null, window.location.pathname);
    }
    var loc = getUrlParameter('location');
    //console.log(cat);
    //console.log(postTopic);
    //Run our function above using our topic filter data
    loadEvents('', eventLocation, '');
    $('.load_more').hide();
    if(eventLocation == ''){
      $('.load_more').show();
    }
  });

$('.e-search-filter form').submit(function(e){
    e.preventDefault();
    var $form = $(this);
    var $input = $form.find('input[name="se"]');
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
    $('.load_more').hide();
    if(query == ''){
      $('.load_more').show();
    }
  });

function loadFilms (filmTopic, query) { //*

      //console.log(projectType);
      //console.log(query);  //*
      //console.log(filmTopic);
      var is_loading = false;
       if (is_loading == false){
            is_loading = true;

      $('.loader-container').removeClass('hide');
            $('.loader, .loader-container').fadeIn(200);

            var data = {
                action: 'get_films',  //Our function from function.php
                //postTopic: postTopic,
                filmTopic: filmTopic,
                //eventLocation: eventLocation, //the return value
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
                  $('.row.listing-row').detach();
                  $('#emc-films').append(response);
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

  $('.f-topic-filters li').click(function(e){
    e.preventDefault;
    $(this).parent().parent().find('ul li.selected').removeClass('selected');
    $('.extra-links li').removeClass('selected');
     $(this).addClass('selected');
    var filmTopic = $('.f-topic-filters li.selected').attr('data-filter');
    //console.log("eventTopic = "+eventTopic);
    // Push the filter that was used to the end of the current URL so that we can use it
    // to run our functions when the user is visiting from a shared link
    if(filmTopic != ''){
      history.pushState(null, null, '?film-topic='+filmTopic);
    }else{
      history.replaceState(null, null, window.location.pathname);
    }
    var cat = getUrlParameter('category');
    //console.log(cat);
    //console.log(postTopic);
    //Run our function above using our topic filter data
    loadFilms(filmTopic, '');
    $('.load_more').hide();
    if(filmTopic == ''){
      $('.load_more').show();
    }
  });

  $('.extra-links ul li').click(function(e){
    e.preventDefault;
    $(this).parent().parent().find('ul li.selected').removeClass('selected');

     $(this).addClass('selected');
      $('.panel.topics').slideUp();
   $('.panel.search-filter').slideUp();
   $('.filter').each(function(){
    $(this).find('a').removeClass('open');
   })
   $('.f-topic-filters li').removeClass('selected');
    var filmTopic = $('.extra-links li.selected').attr('data-filter');
    //console.log("eventTopic = "+eventTopic);
    // Push the filter that was used to the end of the current URL so that we can use it
    // to run our functions when the user is visiting from a shared link
    if(filmTopic != ''){
      history.pushState(null, null, '?film-topic='+filmTopic);
    }else{
      history.replaceState(null, null, window.location.pathname);
    }
    var cat = getUrlParameter('film-topic');
    //console.log(cat);
    //console.log(postTopic);
    //Run our function above using our topic filter data
    loadFilms(filmTopic, '');
    $('.load_more').hide();
    if(filmTopic == ''){
      $('.load_more').show();
    }
  });

  $('.f-search-filter form').submit(function(e){
    e.preventDefault();
    var $form = $(this);
    var $input = $form.find('input[name="sf"]');
    var query = $input.val();
    $('.extra-links li').removeClass('selected');

    // Push the search query to the end of the current URL so that we can use it to run
    // our functions when a user is visiting from a shared link
    if(query != ''){
     history.pushState(null, null, '?query='+query);
    }else{
      history.pushState(null, null, window.location.pathname);
    }

    //Run our AJAX function loadPostsByTopic(topic, query)
    loadFilms('',query);

    //Detach all of our original posts so that we can add our results back to the DOM
    $('.row.listing-row').detach();
    $('.load_more').hide();
    if(query == ''){
      $('.load_more').show();
    }
  });

  function loadResources (resourceTopic, resourceType, query) { //*

      //console.log(projectType);
      //console.log(query);  //*
      //console.log(filmTopic);
      var is_loading = false;
       if (is_loading == false){
            is_loading = true;

      $('.loader-container').removeClass('hide');
            $('.loader, .loader-container').fadeIn(200);

            var data = {
                action: 'get_the_resources',  //Our function from function.php
                //postTopic: postTopic,
                resourceTopic: resourceTopic,
                resourceType: resourceType,
                //eventLocation: eventLocation, //the return value
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

                  //$('.card').detach();
                  $('.post-error').detach();
                  $('.row.event-grid.resource-grid').detach();
                  $('#emc-resources').append(response);
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

  $('.r-topic-filters li').click(function(e){
    e.preventDefault;
    $(this).parent().parent().find('ul li.selected').removeClass('selected');

     $(this).addClass('selected');
    var resourceTopic = $('.r-topic-filters li.selected').attr('data-filter');
    //console.log("eventTopic = "+eventTopic);
    // Push the filter that was used to the end of the current URL so that we can use it
    // to run our functions when the user is visiting from a shared link
    if(resourceTopic != ''){
      history.pushState(null, null, '?resource-topic='+resourceTopic);
    }else{
      history.replaceState(null, null, window.location.pathname);
    }
    var cat = getUrlParameter('category');
    //console.log(cat);
    //console.log(postTopic);
    //Run our function above using our topic filter data
    loadResources(resourceTopic, '', '');
    $('.load_more').hide();
    if(resourceTopic == ''){
      $('.load_more').show();
    }
  });

  $('.r-type-filters li').click(function(e){
    e.preventDefault;
    $(this).parent().parent().find('ul li.selected').removeClass('selected');

     $(this).addClass('selected');
    var resourceType = $('.r-type-filters li.selected').attr('data-filter');
    //console.log("eventTopic = "+eventTopic);
    // Push the filter that was used to the end of the current URL so that we can use it
    // to run our functions when the user is visiting from a shared link
    if(resourceType != ''){
      history.pushState(null, null, '?resource-type='+resourceType);
    }else{
      history.replaceState(null, null, window.location.pathname);
    }
    var cat = getUrlParameter('category');
    //console.log(cat);
    //console.log(postTopic);
    //Run our function above using our topic filter data
    loadResources('', resourceType, '');
    $('.load_more').hide();
    if(resourceType == ''){
      $('.load_more').show();
    }
  });

  $('.r-search-filter form').submit(function(e){
    e.preventDefault();
    var $form = $(this);
    var $input = $form.find('input[name="sf"]');
    var query = $input.val();

    // Push the search query to the end of the current URL so that we can use it to run
    // our functions when a user is visiting from a shared link
    // if(query != ''){
    //  history.pushState(null, null, '?query='+query);
    // }else{
    //   history.pushState(null, null, window.location.pathname);
    // }

    //Run our AJAX function loadPostsByTopic(topic, query)
    loadFilms('',query);

    //Detach all of our original posts so that we can add our results back to the DOM
    //$('.row.listing-row').detach();
    $('.load_more').hide();
    if(query == ''){
      $('.load_more').show();
    }
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

$('.filter-bar .panel').each(function(){
   // duration of scroll animation
   var scrollDuration = 300;
   // paddles
   // var leftPaddle = document.getElementsByClassName('left-paddle');
   var rightPaddle = $(this).find('.scroll');
   var thisFilterbar = $(this).find('.columns-11 ul');
   // console.log(rightPaddle);
   // get items dimensions
   var itemsLength = $(this).find('.columns-11 ul li').length;
   var itemSize = $(this).find('.columns-11 ul li').outerWidth(true);
   // get some relevant size for the paddle triggering point
   var paddleMargin = 20;

   // get wrapper width
   var getMenuWrapperSize = function() {
    return $(thisFilterbar).outerWidth();
   }
   var menuWrapperSize = getMenuWrapperSize();
   // the wrapper is responsive
   $(window).on('resize', function() {
    menuWrapperSize = getMenuWrapperSize();
   });
   // size of the visible part of the menu is equal as the wrapper size
   var menuVisibleSize = menuWrapperSize;

   // get total width of all menu items
   var getMenuSize = function() {
    return itemsLength * itemSize;
   };
   var menuSize = getMenuSize();
   // get how much of menu is invisible
   var menuInvisibleSize = menuSize - menuWrapperSize;

   // get how much have we scrolled to the left
   var getMenuPosition = function() {
    return $(thisFilterbar).scrollLeft();
   };

   // finally, what happens when we are actually scrolling the menu
   $(thisFilterbar).on('scroll', function() {

    // get how much of menu is invisible
    menuInvisibleSize = menuSize - menuWrapperSize;
    // get how much have we scrolled so far
    var menuPosition = getMenuPosition();

    var menuEndOffset = menuInvisibleSize;

    // show & hide the paddles
    // depending on scroll position
   //   if (menuPosition <= paddleMargin) {
   //     $(leftPaddle).addClass('hidden');
   //     $(rightPaddle).removeClass('hidden');
   //   } else if (menuPosition < menuEndOffset) {
   //     // show both paddles in the middle
   //     $(leftPaddle).removeClass('hidden');
   //     $(rightPaddle).removeClass('hidden');
   //   } else if (menuPosition >= menuEndOffset) {
   //     $(leftPaddle).removeClass('hidden');
   //     $(rightPaddle).addClass('hidden');
   // }

    // // print important values
    // $('#print-wrapper-size span').text(menuWrapperSize);
    // $('#print-menu-size span').text(menuSize);
    // $('#print-menu-invisible-size span').text(menuInvisibleSize);
    // $('#print-menu-position span').text(menuPosition);

   });

   // console.log(menuInvisibleSize);
   // var scroll = jQuery.Event("keydown");
   // scroll.which = 39;
   // // scroll to left
   // $(rightPaddle).on('click', function() {
   //    // console.log(thisFilterbar);
   //  // $(thisFilterbar).animate( { scrollLeft: menuInvisibleSize}, scrollDuration);
   //  $(thisFilterbar).focus();
   //  $(thisFilterbar).trigger(scroll);
   //  // console.log(scroll);
   //  $(thisFilterbar).keydown(function(){
   //    console.log("scrolled");
   //  });
   // });

   // $(rightPaddle).bind("mousedown", function(event){
   //    // event.stopPropagation();
   //    $(thisFilterbar).focus();
   //    $(thisFilterbar).trigger($.Event("keydown", {keyCode: 39}));
   // });

   // $(rightPaddle).mousedown(function(event){
   //    // event.stopPropagation();
   //    console.log(event);
   //    $(thisFilterbar).focus();
   //    $(thisFilterbar).trigger($.Event("keydown", {keyCode: 39}));
   // });

   // scroll to right
   // $(leftPaddle).on('click', function() {
   //   $('.menu').animate( { scrollLeft: '0' }, scrollDuration);
   // });

   });

//Ticker

  
  // function tickerWidthCalculate(){
  //   var width = 0;
  //   $('#webticker li').each(function(){
  //     width += $(this).width()+20;
  //   });
  //   return width;
  // }

  // //$(document).ready(function(){
    
  //   var left = 0;
  //   var count = 0;
  //   var tickerWidth = 0;
  //   var originalSlides = $('#webticker li');
    
    
  //   $('#webticker').width(tickerWidthCalculate());
  //   $('#webticker').css('left', left);
    
  //   function startTicker(){
  //     var slidesCount = $('#webticker li').size()/originalSlides.size();
        
      
  //       left -=20;
  //       count +=20;
      
  //       if(count+$('.scroll-ticker').width() >=  $('#webticker').width()){
  //     $('#webticker').append(originalSlides.clone());
  //           $('#webticker').width(tickerWidthCalculate());
  //       }
        
  //       $('#webticker').animate({'left': left},500, 'linear');
  //   }
    
  //   var ticker = setInterval(startTicker,500);
    
  //});
// $.fn.ticker.defaults = {
//   random:        false, // Whether to display ticker items in a random order
//   itemSpeed:     3000,  // The pause on each ticker item before being replaced
//   cursorSpeed:   50,    // Speed at which the characters are typed
//   pauseOnHover:  true,  // Whether to pause when the mouse hovers over the ticker
//   finishOnHover: true,  // Whether or not to complete the ticker item instantly when moused over
//   cursorOne:     '_',   // The symbol for the first part of the cursor
//   cursorTwo:     '-',   // The symbol for the second part of the cursor
//   fade:          true,  // Whether to fade between ticker items or not
//   fadeInSpeed:   600,   // Speed of the fade-in animation
//   fadeOutSpeed:  300    // Speed of the fade-out animation
// };
// $('.scroll-ticker').ticker();
Marquee3k.init({
  selector: 'scroll-ticker',
  pausable: 'true'
});

//Campaign page 3-col popup functionality

$('.grid-item.has_popup').each(function(){
  $('.cta-popup-trigger').click(function(e){
    e.preventDefault();
    $target = $(this).attr('id');
    //$(this).find('.cta-popup').show('fast');
    $('.cta-popup[data-name="'+$target+'"]').fadeIn('fast').css({display:'table'});

    //$('.cta-popup').css({display:'table'});
    $('header').css({position:'initial'});
  });

});

$('.popup-close').click(function(){
  $('.cta-popup').fadeOut('fast');
  //$(this).parent.parent.parent.find('.cta-popup').css({display:'none'});
  $('header').css({position:'fixed'});

});

});
