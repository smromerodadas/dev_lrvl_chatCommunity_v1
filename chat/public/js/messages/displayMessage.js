$(document).ready(function (){
    $.ajax({
        type: "GET",
        url: "/display_messages",
        dataType: 'json',
        success: function (response) {
           
            var user = response[0]; 
            var contacts = response[1]; 
            var msg = response[2]; 

            var active = ""; 
            var prevDate = ""; 
            var months = ["Jan", "Feb", "March", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"]; 
            
            $.each(msg, function (i) { 
                var date = new Date(msg[i].created_at);
                var time= date.toLocaleTimeString('en-US', {hour: '2-digit', minute:'2-digit'});
                var month = months[date.getMonth()]; 
                var day = date.getDate().toString();
                var year = date.getFullYear().toString();
                var formattedDate =  month+" "+day+" "+year; 

                
                if(msg[i].conversation_participant_id == user.pofsis_user_id ){
                    $.each(contacts, function (j) { 
                        if (msg[i].created_by == contacts[j].user_id){
                            active = contacts[j].nickname; 
                        }
                    }); 

                    $('<p class="date" id="msg-'+msg[i].id+'">'+ formattedDate +'</p><li class="replies"><img src="/images/luffy2.jpg" alt="" /><p>' + msg[i].message + '</p> <span class="time_received">'+time+'</span></li>').appendTo($(".messages."+ active +" ul"));
                    $('.message-input input').val(null);
                    $(".contact."+ active +" .preview").html('<b>'+msg[i].message +'<b>');
                    $(".messages").animate({ scrollTop: $(document).height() }, "fast");
                }

                else if(msg[i].created_by == user.pofsis_user_id ){
                    $.each(contacts, function (j) { 
                        if (msg[i].conversation_participant_id == contacts[j].user_id){
                            active = contacts[j].nickname; 
                        }
                    }); 
                    
                    $('<p class="date" id="msg-'+msg[i].id+'">'+ formattedDate +'</p><li class="sent"><img src="/images/luffy1.jpg" alt="" /><p>' + msg[i].message + '</p><span class="time_sent">'+time+'</span></li>').appendTo($(".messages."+ active +" ul"));
                    $('.message-input input').val(null);
                    $(".contact."+ active +" .preview").html('<span>You: </span>'+msg[i].message);
                    $(".messages").animate({ scrollTop: $(document).height() }, "fast");
                }

                if(prevDate != formattedDate){
                    prevDate = formattedDate; 
                    var msgID = "msg-" + msg[i].id; 
                    var msgDate = document.getElementById(msgID); 
                    msgDate.style.display ="block";
                }
            });
            
        }
    });
    
});