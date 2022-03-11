$(document).ready(function(){
   
   $(".text-message").click(function(){
});





    });



var me = {};
me.avatar = "C:/Users/Ahmed.Ahmed_elbaradey/Desktop/14262822_189434531478812_197061899_n.jpg";

var you = {};
you.avatar = "C:/Users/Ahmed.Ahmed_elbaradey/Desktop/14262822_189434531478812_197061899_n.jpg";

function formatAMPM(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;
    return strTime;
}            

//-- No use time. It is a javaScript effect.
function insertChat(who, text, time){
    if (time === undefined){
        time = 0;
    }
    var control = "";
    var date = formatAMPM(new Date());
    
    if (who == "me"){
        control = '<li style="width:100%">' +
                        '<div class="msj macro">' +
                        '<div class="avatar"><img class="img-circle" style="width:75px;" src="'+ me.avatar +'" /></div>' +
                            '<div class="text text-l">' +
                                '<p>'+ text +'</p>' +
                                '<p><small>'+date+'</small></p>' +
                            '</div>' +
                        '</div>' +
                    '</li>';                    
    }else{
        control = '<li style="width:100%;">' +
                        '<div class="msj-rta macro">' +
                            '<div class="text text-r">' +
                                '<p>'+text+'</p>' +
                                '<p><small>'+date+'</small></p>' +
                            '</div>' +
                        '<div class="avatar" style="padding:0px 0px 0px 10px !important"><img class="img-circle" style="width:100%;" src="'+you.avatar+'" /></div>' +                                
                  '</li>';
    }
    setTimeout(
        function(){                        
            $("#messs").append(control).scrollTop($("#messs").prop('scrollHeight'));
        }, time);
    
}

function resetChat(){
    $("#messs").empty();
}

$(".mytext").on("keydown", function(e){
    if (e.which == 13){
        var text = $(this).val();
       
         if (!text.replace(/\s/g, '').length){
          alert("Write your message ,please!");
        }
         else {
            insertChat("me", text);              
            $(this).val('');
        }


    }
});

$('.send_msg').click(function(){
    $(".mytext").trigger({type: 'keydown', which: 13, keyCode: 13});
})


