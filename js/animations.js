//Landing & Scroll Animations
var welcomeAnim = new TimelineMax(),
   footerAnim = new TimelineMax(),
   controller = new ScrollMagic.Controller(),
   calloutPanels = document.getElementsByClassName('panel callout'),
   twoUpPanels = document.getElementsByClassName('panel offset-text'),
   splitPanels = document.getElementsByClassName('panel img-and-wysiwyg'),
   imgPanels = document.getElementsByClassName('panel half-img-callout');

if (calloutPanels) {
   for (var i = 0; i < calloutPanels.length; i++) {
      var theIntro = calloutPanels[i].getElementsByClassName('intro')[0],
         theDesc = calloutPanels[i].getElementsByClassName('heading6')[0],
         calloutPanelAnim = new TimelineMax();

      //Define Animations
      calloutPanelAnim.set(theIntro, {css:{transform:"translateY(-30px)", opacity:0}})
         .set(theDesc, {css:{transform:"translateY(-30px)", opacity:0}})
         .to(theIntro, 0.4, {css:{transform:"translateY(0px)", opacity:1}, ease: Power2.easeInOut})
         .to(theDesc, 0.4, {css:{transform:"translateY(0px)", opacity:1}, ease: Power2.easeInOut});

      //Trigger Animations
      var calloutScene = new ScrollMagic.Scene({triggerElement: calloutPanels[i], reverse: false, triggerHook: 'onEnter'})
         .setTween(calloutPanelAnim)
         .addTo(controller);
   };
};

if (twoUpPanels) {
   for (var i = 0; i < twoUpPanels.length; i++) {
      var theMain = twoUpPanels[i].getElementsByClassName('main-col')[0],
         theDesc = twoUpPanels[i].getElementsByClassName('desc-col')[0],
         twoUpPanelAnim = new TimelineMax();

      //Define Animations
      twoUpPanelAnim.set(theMain, {css:{transform:"translateX(-30px)", opacity:0}})
         .set(theDesc, {css:{transform:"translateX(-30px)", opacity:0}})
         .to(theMain, 0.4, {css:{transform:"translateX(0px)", opacity:1}, ease: Power2.easeInOut})
         .to(theDesc, 0.4, {css:{transform:"translateX(0px)", opacity:1}, ease: Power2.easeInOut});

      //Trigger Animations
      var twoUpScene = new ScrollMagic.Scene({triggerElement: twoUpPanels[i], reverse: false})
         .setTween(twoUpPanelAnim)
         .addTo(controller);
   };
};

if (splitPanels) {
   for (var i = 0; i < splitPanels.length; i++) {
      var leftCol = splitPanels[i].getElementsByClassName('left-col')[0],
         rightCol = splitPanels[i].getElementsByClassName('right-col')[0],
         splitPanelAnim = new TimelineMax();

      //Define Animations
      splitPanelAnim.set(leftCol, {css:{transform:"translateX(-30px)", opacity:0}})
         .set(rightCol, {css:{transform:"translateX(30px)", opacity:0}})
         .to(leftCol, 0.4, {css:{transform:"translateX(0px)", opacity:1}, ease: Power2.easeInOut})
         .to(rightCol, 0.4, {css:{transform:"translateX(0px)", opacity:1}, ease: Power2.easeInOut});

      //Trigger Animations
      var splitPanelScene = new ScrollMagic.Scene({triggerElement: splitPanels[i], reverse: false})
         .setTween(splitPanelAnim)
         .addTo(controller);
   };
};

if (imgPanels) {
   for (var i = 0; i < imgPanels.length; i++) {
      var theRow = imgPanels[i].getElementsByClassName('row')[0],
         imgPanelAnim = new TimelineMax();

      //Define Animations
      imgPanelAnim.set(theRow, {css:{opacity:0}})
         .to(theRow, 0.4, {css:{opacity:1}, ease: Power2.easeInOut});

      //Trigger Animations
      var imgPanelScene = new ScrollMagic.Scene({triggerElement: imgPanels[i], reverse: false})
         .setTween(imgPanelAnim)
         .addTo(controller);
   };
};
