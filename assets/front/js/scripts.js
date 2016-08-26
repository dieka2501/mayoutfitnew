$(document).ready(function () {
  $("#mayoutfit-bighero").owlCarousel({
      //autoPlay : 3000,
      navigation : false,
      slideSpeed : 300,
      navigation : true,
      pagination : true,
      paginationSpeed : 400,
      singleItem : true,
      navigationText: [
                "<i class='ion-ios-arrow-thin-left'></i>",
                "<i class='ion-ios-arrow-thin-right'></i>"
                ],

      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false

      });

});