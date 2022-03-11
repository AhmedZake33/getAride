$(document).ready(function(){
    $("#search_trip").click(function(){
        $(".trip_body").addClass("apper_post");
     $('html, body').animate({
        scrollTop: $(".trip_post").offset().top
    }, 1500);
    
    });

       $(".read_more").click(function(){
  $(".trip_post").css('overflow','visible');  
    $(".trip_post").css('height','100%');
     $(".trip_post").css('transition','0.5s');      
        $(".read_more").css('display','none');    
 
  
    });



   
    $('.members').fadeIn(5000);

    $("#search_").click(function(){
        
 $(".bb").toggleClass("frem bb");
 $(".d").addClass("apper");
  $(".d").removeClass("frem");


  $('html, body').animate({
        scrollTop: $(".frem").offset().top
    }, 1500);
    
    });

     $("#offer_").click(function(){
        
 $(".apper").toggleClass("frem apper");
 $(".c").addClass("bb");
  $(".c").removeClass("frem");



  $('html, body').animate({
        scrollTop: $(".offer").offset().top
    }, 1500);
    
    });






    });