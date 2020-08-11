$(function(){
    $('#formLogin').on('submit', function(e){
        e.preventDefault();

        var $username = jQuery.trim($('input[name="email"]').val()); 
        var $password = jQuery.trim($('input[name="password"]').val()); 

        if ($username == '') {
            alert('Must fill email');
        }
        else if ($password  == ''){
            alert('Must fill password');
        }

        else{
            $.ajax({
                type: "POST",
                url: "/user_login",
                data: $('#formLogin').serializeArray(),
                success: function (response) {
                    console.log(response); 
                    
                    //get data from response
                    if(response == 1){
                        location.href = "/chat";
                    }

                    if(response == 0){
                        console.log("Invalid Username or Password"); 
                        $('#login-error-message').show();
                    }
                    
                }
            });
        }
    });
});