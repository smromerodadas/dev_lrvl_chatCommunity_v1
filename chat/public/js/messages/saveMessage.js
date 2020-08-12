$(function(){
    $('#formMessage').on('submit', function(e){
        e.preventDefault();

        var $message = jQuery.trim($('input[name="message"]').val()); 
        var $activeContact = activeContact;
        
        if ($message == '') {
            console.log('Your message contains nothing');
        }

        else{
            $.ajax({
                type: "POST",
                url: "/save_messages",
                data: { 'message' : $message, 'activeContact' : $activeContact },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    
                success: function (response) {
                    console.log(response); 
                    var date = new Date();
                    var time= date.toLocaleTimeString('en-US', {hour: '2-digit', minute:'2-digit'}); 
                    // document.write(time);

                    $('<li class="sent"><img src="/images/luffy1.jpg" alt="" /><p>' + $message + '</p><span class="time_sent">'+time+'</span></li>').appendTo($(".messages."+ activeContact +" ul"));
                    $('.message-input input').val(null);
                    $('.contact.active .preview').html('<span>You: </span>' + $message);
                    $(".messages").animate({ scrollTop: $(document).height() }, "fast");
                }
            });
        }
    });
});