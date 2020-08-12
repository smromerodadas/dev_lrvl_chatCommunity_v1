$(document).ready(function(){
    $.ajax({
        type: "GET",
        dataType: 'json',
        url: "/add_contact",
        success: function (response) {
            var userContactsID = response[0]; 
            var allUsersID = response[1]; 
            var allUsers = response[2]; 
            // console.log(userContactsID); 
            // console.log(allUsersID); 
            // console.log(allUsers); 

            let newContactIDs = allUsersID.filter(x => !userContactsID.includes(x));
            console.log(newContactIDs); 

            var new_contacts = $("#new-contact-list");
            $.each(allUsers, function (i) { 
                $.each(newContactIDs, function(j){
                    // console.log(user[j].conversation_id); 
                    if(allUsers[i].company_id == newContactIDs[j] ){
                        new_contacts.append(
                            "<li class = 'new-contact "+allUsers[i].username+"' >" +
                            "<img  class='new-contact-img' src='/images/luffy2.jpg' alt=''/>" +
                            "<p class='new-contact-username'> "+allUsers[i].username+" </p>" +
                            "<button class='add-contact-btn'>Add Contact</button>"

                        ); 
                        console.log(allUsers[i]); 
                    }
                });
                
            });

        }
    });
}); 
