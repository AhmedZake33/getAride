$(document).ready(function(){
  $(".owl-carousel").owlCarousel({

    navigation:true,
    slideSpeed :300,
    paginationSpeed : 400,
    items: 1,
        loop: true,
            singleItem: true,
            autoplay:true,
autoplayTimeout:5000


  });


  

  


  $("#sign_in").click(function(){
    $("#apper").toggleClass("apper ");
     $("#sign-up").removeClass("signup_apper");
});

   $("#signup").click(function(){
    $("#sign-up").toggleClass("signup_apper");
     $("#apper").removeClass("apper ");
});

   $("#closeup").click(function(){
    $("#sign-up").toggleClass("signup_apper");
});

  $("#close").click(function(){
    $("#apper").toggleClass("apper");
});
  
});
