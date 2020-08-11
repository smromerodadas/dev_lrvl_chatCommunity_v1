$(document).ready(function(){
    $.ajax({
        type: "GET",
        dataType: 'json',
        url: "/user_contacts",
        success: function (response) {
            // console.log(response); 
            var user = response[0]; 
            var contacts = response[1]; 
            
            var my_contacts = $("#contact-list");

            $.each(contacts, function(i){
                $.each(user, function(j){
                    // console.log(user[j].conversation_id); 
                    if(user[j].conversation_id == contacts[i].conversation_id){
                        my_contacts.append(
                            "<li class = 'contact "+contacts[i].nickname+"' >" +
                            "<a href='"+contacts[i].nickname+"'> " +
                            "<div class='wrap'>" + 
                            "<span class='contact-status online'></span>" +
                            "<img src='/images/luffy2.jpg' alt=''/>" +
                            "<div class='meta'" + 
                            "<p class='name'>" + contacts[i].nickname +"</p>" +
                            "<p class='preview'> Start a Conversation</p>" +
                            "</div>" + 
                            "</div>" +
                            "</a>" +
                            "</li>"
                            );
                    }
                });
            }); 

            var my_convo = $("#content");
            $.each(contacts, function(i){
                $.each(user, function(j){
                    // console.log(user[j].conversation_id); 
                    if(user[j].conversation_id == contacts[i].conversation_id){
                        my_convo.append(
                            "<div class='convo content' id="+contacts[i].nickname+">" + 
                            
                            "<div class='contact-profile'>"+
                            "<img src='/images/luffy2.jpg' alt=''/>" +
                            "<p class='name'>" + contacts[i].nickname +"</p>" +
                            "</div>" +
                            "<div class='messages "+contacts[i].nickname+" '>" +
                            "<ul></ul>" +
        
                            "</div>"
                        ); 
                    }
                });
            });


            $('#contact-list').find('a').click(function(e) {
                e.preventDefault();
                $(this.hash).show().siblings().hide();
                $('#contact-list').find('a').parent().removeClass('active');
                $(this).parent().addClass('active');
                // var activeContact = ($(this).parent().attr('class'));
                activeContact = ($(this).parent().attr('class').split(' ')[1]);


                showConvo(activeContact); 
                // sendMessage($activeContact); 
            }).filter(':first').click();


            function showConvo($activeContact){
                // console.log($activeContact);
                var active = document.getElementById($activeContact); 
                // console.log(active); 

                $.each(contacts, function(i){
                    var element = contacts[i].nickname; 
                    var inactive = document.getElementById(element); 
                    inactive.style.display = "none"; 
                });
                
                active.style.display ="inline-block";
            }
        }
    });
}); 