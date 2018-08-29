jQuery(document).ready(function($){

  //Are we loaded?
  console.log('New theme loaded!');

  //Let's do something awesome!

  //Vmap functionality for homepage

  // This is serializaed data that will be pulled from a variable created by
  // the locations that are entered into the appropriate ACF fields on the homepage

  $('#mobileMenuTrigger').sidr({
     // name: 'mobile',
     // onOpen: function(){
     //    console.log('Opened');
     // },
     displace: false,
     renaming: false,
     side: 'right',
     source: '#header-main, #menu-gateway_nav, #header-social'
 });

//  $('#mobileMenuTrigger').click(function(){
//     $.sidr('toggle', 'mobile');
// });

 // $('.submit').hide();

$('#search').click(function(){
   $('.search-field').toggleClass('open');
   $('.submit').toggleClass('show');
});

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

});
