@extends('layout/app')

@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('styles')
<style>

body {
    min-height: 100vh;
    text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
}

#frame {
    height: 100vh;
    min-height: 100vh;
    max-height: 720px;
    background: #E6EAEA;
}

@media screen and (max-width: 360px) {
    #frame {
        width: 100%;
        height: 100vh;
    }
}

#sidepanel {
    float: left;
    min-width: 280px;
    max-width: 340px;
    width: 40%;
    height: 100%;
    background: var(--darkblue);
    color: white;
    overflow: hidden;
    position: relative;
}


@media screen and (max-width: 360px) {
    #sidepanel {
        width: 40%;
        height: 100vh;
    }
}

/* search area */
#search {
    width: 90%;
    font-weight: 300;
    text-align: center;
    margin-left: 15px;
    margin-top: 65px;
    margin-bottom: 10px;
}



@media screen and (max-width: 735px) {
    body #search label {
        margin-left: 8px;
    }

    #search {
        margin-top: 50px;
        margin-left: 0px;
        font-size: 12px;
        font-weight: 100;
        /* width:90%;  */
    }

    body #search input {
        width: 25px;
        border-radius: 0px;
        padding-left: 25px;
        padding-right: 5px;
    }

    body #search input::placeholder {
        color: transparent;
    }
}

#search label {
    position: absolute;
    margin: 10px 0 0 20px;
}

#search input {
    border-radius: 15px;
    font-family: Lato;
    padding: 10px 15px 10px 46px;
    width: calc(100% - 60px);
    border: none;
    background: #0A1419;
    color: white;
    overflow: hidden;
}

#search input:focus {
    outline: none;
}

#search input::-webkit-input-placeholder {
    color: var(--lightblue);
}

#search input::-moz-placeholder {
    color: var(--lightblue);
}

#search input:-ms-input-placeholder {
    color: var(--lightblue);
}

#search input:-moz-placeholder {
    color: var(--lightblue);
}


/* contacts area */
#contacts {
    height: 440px;
    overflow-y: scroll;
    overflow-x: hidden;
}



@media screen and (max-width: 735px) {
    #contacts {
        height: calc(100% - 60px);
        overflow-y: scroll;
        overflow-x: hidden;
    }

    #contacts::-webkit-scrollbar {
        display: none;
    }
}

#contacts::-webkit-scrollbar {
    width: 8px;
    background: var(--darkblue);
}

#contacts::-webkit-scrollbar-thumb {
    background-color: var(--lightblue);
}

#contacts ul li.contact {
    position: relative;
    padding: 10px 0 15px 0;
    font-size: 0.9em;
    cursor: pointer;
}

@media screen and (max-width: 735px) {
    #contacts ul li.contact {
        padding: 6px 0 46px 8px;
    }
}

/* if a contact is hovered */
#contacts ul li.contact:hover {
    background: var(--lightblue);
}

/* if a contact is clicked */
#contacts ul li.contact.active {
    background: var(--lightblue);
    border-right: 5px solid var(--gray);
}


#contacts ul li.contact.active span.contact-status {
    border: 2px solid var(--lightblue);
     /* !important; */
}

#contacts ul li.contact:hover span.contact-status {
    border: 2px solid var(--lightblue);
     /* !important; */
}

#contacts ul li.contact .wrap {
    width: 88%;
    margin: 0 auto;
    position: relative;
}

@media screen and (max-width: 735px) {
    #contacts ul li.contact .wrap {
        width: 100%;
    }
}

#contacts ul li.contact .wrap span {
    position: absolute;
    left: 30px;
    top: 30px;
    margin: -2px 0 0 -2px;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    border: 2px solid var(--darkblue);
    background: #95a5a6;
}

#contacts ul li.contact .wrap span.online {
    background: #2ecc71;
}

#contacts ul li.contact .wrap span.away {
    background: #f1c40f;
}

#contacts ul li.contact .wrap span.busy {
    background: #e74c3c;
}

#contacts ul li.contact .wrap img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    float: left;
    margin-right: 10px;
}

@media screen and (max-width: 735px) {
    #contacts ul li.contact .wrap img {
        margin-right: 0px;
    }
}

#contacts ul li.contact .wrap .meta {
    padding: 5px 0 0 0;
}

@media screen and (max-width: 735px) {
    #contacts ul li.contact .wrap .meta {
        display: none;
    }
}

#contacts ul li.contact .wrap .meta .name {
    font-weight: 600;
}

#contacts ul li.contact .wrap .meta .preview {
    margin: 5px 0 0 0;
    padding: 0 0 1px;
    font-weight: 400;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    -moz-transition: 1s all ease;
    -o-transition: 1s all ease;
    -webkit-transition: 1s all ease;
    transition: 1s all ease;
    font-family: LatoThin;
}

#contacts ul li.contact .wrap .meta .preview span {
    position: initial;
    border-radius: initial;
    background: none;
    border: none;
    padding: 0 2px 0 0;
    margin: 0 0 0 1px;
    opacity: .5;
}

#contact-list a {
    color: white;
    text-decoration: none;
}

#contact-list a:hover {
    color: white;
    text-decoration: none;
}



/* profile area with action buttons */

#profile {
    width: 90%;
    /* height: 40px;  */
    padding-left: 5%;
    padding-right: 5%;
    padding-top: 3%;
    padding-bottom: 3%;
    background: #0A1419;
}

@media screen and (max-width: 735px) {
    #profile {
        height: 50px;
        width: 100%;
        margin: 0 auto;
        padding: 5px 0 0 0;
        background: #0A1419;
    }
}

@media screen and (max-width: 735px) {
    #sidepanel {
        width: 58px;
        min-width: 58px;
    }
}

#frame #sidepanel #profile .wrap {
    height: 40px;
    line-height: 40px;
    overflow: hidden;
    -moz-transition: 0.3s height ease;
    -o-transition: 0.3s height ease;
    -webkit-transition: 0.3s height ease;
    transition: 0.3s height ease;
}

@media screen and (max-width: 735px) {
    #frame #sidepanel #profile .wrap {
        height: 50px;
    }
}

#profile-img {
    width: 30px;
    border-radius: 50%;
    padding: 3px;
    border: 2px solid #e74c3c;
    height: auto;
    float: left;
    cursor: pointer;
    transition: 0.3s border ease;
}

@media screen and (max-width: 735px) {
    #profile-img {
        width: 30px;
        margin-left: 8px;
        margin-top: 2px;
    }
}

#profile-img.online {
    border: 2px solid #2ecc71;
}

#profile-img.away {
    border: 2px solid #f1c40f;
}

#profile-img.busy {
    border: 2px solid #e74c3c;
}

#profile-img.offline {
    border: 2px solid #95a5a6;
}

#profile-username {
    float: left;
    margin-left: 15px;
    font-family: LatoBlack;
    letter-spacing: .5px;
}

@media screen and (max-width: 735px) {

    #profile-username,
    .status {
        display: none;
    }
}

/* active status */

#status-options {
    position: absolute;
    opacity: 0;
    visibility: hidden;
    width: 150px;
    border-radius: 6px;
    z-index: 99;
    top: 65px;
    left: 10px;
    background: #0A1419;
    -moz-transition: 0.3s all ease;
    -o-transition: 0.3s all ease;
    -webkit-transition: 0.3s all ease;
    transition: 0.3s all ease;
    padding: 5px;
}

@media screen and (max-width: 735px) {
    #status-options {
        left: 0px;
        bottom: 65px;
        width: 50px;
        margin-top: 57px;
    }
}

#status-options.active {
    opacity: 1;
    visibility: visible;
}

@media screen and (max-width: 735px) {
    #status-options.active {
        margin-top: 62px;
    }
}

/* .status-list {
    overflow: hidden;
    border-radius: 6px;
} */

.status {
    padding: 5px 20px 5px 20px;
    display: block;
    cursor: pointer;
}

@media screen and (max-width: 735px) {
    .status {
        padding: 15px 0px 35px 17px;
    }
}

.status:hover, .action:hover {
    /* border-bottom: 2px solid var(--gray); */
    background-color: var(--lightblue); 
    overflow: hidden;
}

.status span.status-circle {
    position: absolute;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    margin: 5px 0 0 0;
}

@media screen and (max-width: 735px) {
    .status span.status-circle {
        width: 14px;
        height: 14px;
    }
}

.status span.status-circle:before {
    content: '';
    position: absolute;
    width: 12px;
    height: 12px;
    margin: -3px 0 0 -3px;
    background: transparent;
    border-radius: 50%;
    z-index: 0;
}

@media screen and (max-width: 735px) {
    .status span.status-circle:before {
        height: 18px;
        width: 18px;
    }
}

#status-options ul li p {
    padding-left: 20px;
    font-size: 15px;
}

@media screen and (max-width: 735px) {
    #status-options ul li p {
        display: none;
    }
}

#status-online span.status-circle {
    background: #2ecc71;
}

#status-online.active span.status-circle:before {
    border: 1px solid #2ecc71;
}

#status-away span.status-circle {
    background: #f1c40f;
}

#status-away.active span.status-circle:before {
    border: 1px solid #f1c40f;
}

#status-busy span.status-circle {
    background: #e74c3c;
}

#status-busy.active span.status-circle:before {
    border: 1px solid #e74c3c;
}

#status-offline span.status-circle {
    background: #95a5a6;
}

#status-offline.active span.status-circle:before {
    border: 1px solid #95a5a6;
}

@media screen and (max-width: 735px) {
    #status-options:before {
        margin-left: 23px;
    }
}



/* action buttons */

#frame #sidepanel #profile-bar {
    position: absolute;
    width: 100%;
    top: 0;
}

#frame #sidepanel #profile-bar button {

    float: right;
    cursor: pointer;
    color: var(--gray);
    background-color: transparent;
    border: 0px;
    font-size: 15px;
    height: 30px;
    width: 30px;
    margin-top: 5px;
}

#frame #sidepanel #profile-bar button:focus {
    outline: none;
}


#frame #sidepanel #profile-bar button:hover {
    background: var(--lightblue);
    border-radius: 5px;
}

/* messages area */
.messages_content{
    float: right;
    width: 60%;
    height: 100%;
    overflow: hidden;
    position: relative;
}

.content {
    float: right;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

/* .content.active{
    visibility: visible; 
    opacity: 1;
} */
@media screen and (max-width: 360px) {
    .messages_content {
        width: calc(100% - 23px);
        min-width: 100px !important; 
    }
}


@media screen and (max-width: 735px) {
    .messages_content {
        width: calc(100% - 58px);
        /* min-width: 300px !important; */
    }
}

@media screen and (min-width: 900px) {
    .messages_content {
        width: calc(100% - 340px);
    }
}

.navbar {
    background-color: var(--darkblue);
    color: white;
    height: 43px;
    font-family: LatoBlackItalic;
    letter-spacing: 1px;
}

@media screen and (max-width: 735px) {
    .navbar {
        height: 37px;
    }
}

.fa-envelope {
    font-style: italic;
}

.title {
    width: 100%;
    text-align: end;
}


.contact-profile {
    width: 100%;
    height: 60px;
    line-height: 60px;
    background: white;
    border-bottom: .5px solid var(--gray); 
}

.contact-profile img {
    width: 40px;
    border-radius: 50%;
    float: left;
    margin: 9px 12px 0 9px;
}


.contact-profile p {
    float: left;
}

#frame .content .messages {
    height: auto;
    background-color: white; 
    
    
    min-height: calc(100% - 145px);
    max-height: calc(100% - 145px);
    overflow-y: scroll;
    overflow-x: hidden;
}

@media screen and (max-width: 735px) {
    #frame .content .messages {
        max-height: calc(100% - 148px);
    }
}

.messages::-webkit-scrollbar {
    width: 8px;
    background: transparent;
}

.messages::-webkit-scrollbar-thumb {
    background-color: var(--lightblue);
}

.messages ul li {
    display: inline-block;
    clear: both;
    /* float: left; */
    margin: 1px 10px 1px 10px;
    width: calc(100% - 25px);
    font-size: 0.9em;
}

.messages ul li:nth-last-child(1) {
    margin-bottom: 22px;
}

.messages ul li img {
    width: 22px;
    border-radius: 50%;
    float: left;
}

.messages ul li p {
    display: inline-block;
    padding: 10px 15px;
    border-radius: 20px;
    max-width: 205px;
    line-height: 130%;
}

@media screen and (min-width: 735px) {
    #frame .content .messages ul li p {
        max-width: 300px;
    }
}

.messages ul .time_received{
    font-family: Lato;
    font-size: 10px; 
    margin-left: 5px; 
}

.messages ul .time_sent{
    float: right;
    font-family: Lato;
    font-size: 10px; 
    margin-top: 15px; 
    margin-right: 5px; 
}

.messages ul li.replies img {
    margin: 6px 8px 0 0;
}

.messages ul li.replies p {
    background: var(--gray);
    color: var(--darkblue);

    word-wrap: break-word; 
}

.messages ul li.sent img {
    float: right;
    margin: 6px 0 0 8px;
}

.messages ul li.sent p {
    background: var(--darkblue);
    color: white;
    float: right;

    word-wrap: break-word; 
}

.message-input {
    position: absolute;
    bottom: 0;
    width: 100%;
    z-index: 99;
    border-top: .5px solid var(--gray); 
}

.message-input .wrap {
    position: relative;
}

.message-input .wrap input {
    font-family: Lato;
    float: left;
    border: none;
    width: calc(100% - 90px);
    padding: 11px 32px 10px 8px;
    font-size: 0.8em;
    color: var(--darkblue);
}

@media screen and (max-width: 735px) {
    .message-input .wrap input {
        padding: 15px 32px 16px 8px;
    }
}

.message-input .wrap input:focus {
    outline: none;
}

.message-input .wrap .attachment {
    position: absolute;
    right: 60px;
    z-index: 4;
    margin-top: 10px;
    font-size: 1.1em;
    color: var(--darkblue);
    opacity: .5;
    cursor: pointer;
}

@media screen and (max-width: 735px) {
    .message-input .wrap .attachment {
        margin-top: 17px;
        right: 65px;
    }
}

.message-input .wrap .attachment:hover {
    opacity: 1;
}

.message-input .wrap button {
    float: right;
    border: none;
    width: 50px;
    padding: 12px 0;
    cursor: pointer;
    background: var(--darkblue);
    color: #f5f5f5;
}

@media screen and (max-width: 735px) {
    .message-input .wrap button {
        padding: 16px 0;
    }
}

.message-input .wrap button:hover {
    background: var(--lightblue);
}

.message-input .wrap button:focus {
    outline: none;
}

@media screen and (max-width: 735px) {
    #chat-category {
        margin-top: 10px;
        height: calc(100% - 100px);
        /* height: 420px;  */
        overflow-y: scroll;
        overflow-x: hidden;
    }

    #chat-category::-webkit-scrollbar {
        display: none;
    }
}

#chat-category input:focus {
    outline: none;
}

.categories {
    display: block;
    display: -webkit-flex;
    display: -moz-flex;
    display: flex;
    -webkit-flex-wrap: wrap;
    -moz-flex-wrap: wrap;
    flex-wrap: wrap;
    margin: 0;
    overflow: hidden;
}

.category-radio-label {
    color: var(--lightblue);
    cursor: pointer;
    display: block;
    font-size: 15px;
    font-family: LatoBlack;
    letter-spacing: .5px;
    /* font-weight: 100px; */
    /* line-height: 1em; */
    padding: 10px 0;
    text-align: center;
}

@media screen and (max-width: 735px) {
    .category-radio-label {
        display: none;
    }
}

.category-radio {
    border-bottom: .5px solid var(--lightblue);
    cursor: pointer;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    display: block;
    width: 100%;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.category-radio:hover,
.category-radio:focus {
    border-bottom: 1px solid white;
}

.category-radio:checked {
    border-bottom: 2px solid white;
}



.category-radio:checked+div {
    opacity: 1;
}

.category-radio+div {
    display: block;
    opacity: 0;
    /* padding: 1px 2px; */
    width: 100%;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.category-list {
    width: 33%;
}

.category-list [type="radio"]+div {
    width: 300%;
    margin-left: 300%;
}

.category-list [type="radio"]:checked+div {
    margin-left: 0;
}

.category-list:nth-child(2) [type="radio"]+div {
    margin-left: 100%;
}

.category-list:nth-child(2) [type="radio"]:checked+div {
    margin-left: -100%;
}

.category-list:last-child [type="radio"]+div {
    margin-left: 200%;
}

.category-list:last-child [type="radio"]:checked+div {
    margin-left: -200%;
}

hr{
    color: var(--gray); 
    margin-top: 5px;
    margin-bottom: 5px;  
    border-top: .5px solid var(--lightblue); 
}

#status-options li .fa{
    padding-left: 20px; 
    margin-top: 5px; 
    margin-bottom: 5px; 
}

#status-options a {
    color: white; 
    text-decoration: none;
}


.messages .date p{
    text-align: center; 
    margin-top: 5px; 
    margin-bottom: 2px; 
    font-size: 10px; 
}


/* add contact modal */

.modal-body{
    padding-left: 2rem; 
    padding-right: 2rem; 
    height: 450px; 
    overflow-y: scroll;
    overflow-x: hidden;
}

#new-contacts::-webkit-scrollbar {
    width: 8px;
    background: transparent;
}

#new-contacts::-webkit-scrollbar-thumb {
    background-color: var(--darkblue);
}

#searchNewContact{
    margin: 0px; 
}

#searchNewContact input{
    border-radius: 15px;
    font-family: Lato;
    padding: 5px 15px 5px 46px;
    width: 200px;
    border: none;
    background: #0A1419;
    color: white;
    overflow: hidden;
}

#searchNewContact input::-webkit-input-placeholder {
    color: white; 
}

#searchNewContact input::-moz-placeholder {
    color: white; 
}

#searchNewContact input:-ms-input-placeholder {
    color: white; 
}

#searchNewContact input:-moz-placeholder {
    color: white; 
}


#searchNewContact label {
    color: white; 
    position: absolute;
    margin: 6px 0 0 20px;
}

.new-contact-img{
    width: 40px;
    border-radius: 50%;
    float: left;
    margin: 5px 12px 0px 9px;
}

.new-contact-username{
    float: left;
    margin-top: 14px; 
}

.add-contact-btn{
    float: right;
    border: 0px; 
    background: var(--darkblue); 
    color: white; 
    margin-top: 14px; 
    height: 25px;
    width: 150px; 
}

#new-contact-list li {
    height:60px; 
}

</style>
@endsection

@section('content')

<div id="frame">
	<div id="sidepanel">
        <div id="status-options">
            <ul>
                <li id="status-online" class="status"><span class="status-circle"></span> <p>Online</p></li>
                <li id="status-away" class="status"><span class="status-circle"></span> <p>Away</p></li>
                <li id="status-busy" class="status"><span class="status-circle"></span> <p>Busy</p></li>
                <li id="status-offline" class="status"><span class="status-circle"></span> <p>Offline</p></li>
                <hr>
                <a href=""><li id="profile-page" class="action"> <i class="fa fa-user" aria-hidden="true"></i><span> Profile</span></li></a>
                <a href="{{ route('logout') }}"><li id="profile-page" class="action"><i class="fa fa-sign-out" aria-hidden="true"></i> <span> Logout</span></li></a>
            </ul>
        </div>

        <div id="profile-bar">
            <div id="profile">
                <div class="wrap ">
                    <img id="profile-img" src="{{URL::asset('/images/luffy1.jpg')}}" class="online" alt="" />
                    <p id="profile-username">
                        {{Session::get('userData')['username']}}
                    </p>

                    <button id="settings"class="fa fa-cog fa-fw" aria-hidden="true"></button>
                    <button id="addcontact" class="fa fa-user-plus fa-fw" aria-hidden="true" type="button" 
                        data-toggle="modal" data-target="#add_contact_modal"></button>
                </div>
            </div>
        </div>
        
		<div id="search">
			<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
			<input type="text" placeholder="Search Contact or Conversation" />
        </div>
        
        <div id="chat-category">
            <div class="categories">
                <div class="category-list">
                    <label for="category-personal" class="category-radio-label personal">Personal</label>
                    <input id="category-personal" class="category-radio" name="category" type="radio" value="personal" checked="checked">
                  
                    <div id="contacts">
                        <ul id="contact-list">
                        </ul>
                    </div>
                </div>

                <div class="category-list">
                    <label for="category-group"  class="category-radio-label">Group</label>
                    <input id="category-group" class="category-radio" name="category" type="radio">
                  
                  <div>
                    <h4>Group Tab</h4>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. A in explicabo, repudiandae possimus nisi, 
                        odio commodi impedit, cupiditate nobis atque 
                        velit dolorem! Odio illum ipsum deleniti similique exercitationem atque quasi.</p>
                  </div>
                </div>

                <div class="category-list">
                    <label for="category-forum" class="category-radio-label">Forum</label>
                    <input id="category-forum"  class="category-radio" name="category" type="radio">
                    
                    <div>
                      <h4>Forum Tab</h4>
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. A in explicabo, repudiandae possimus nisi, 
                        odio commodi impedit, cupiditate nobis atque 
                        velit dolorem! Odio illum ipsum deleniti similique exercitationem atque quasi.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

	<div class="messages_content">
        <nav class="navbar">
            <h5 class="title align-middle ">CHAT COMMUNITY<i class='fa fa-envelope mx-1'></i> </h5>
        </nav>

        <div class="content" id="content">
            
        </div>

        <div class="message-input">
            <form class="form" id="formMessage" method="POST">
                <div class="wrap">
                <input type="text" autocomplete="off" name="message" placeholder="Write your message..." autofocus/>
                <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
                <button class="submit" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                </div>
            </form>
        </div>      
    </div>


    {{-- modal for add contact --}}
    <div id="add_contact_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
      
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
                <div id="searchNewContact">
                    <label><i class="fa fa-search" aria-hidden="true"></i></label>
                    <input type="text" placeholder="Search Contact" />
                </div>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="new-contacts">
                <ul id="new-contact-list">
                </ul>
            </div>
          </div>
      
        </div>
    </div>
    
    
</div>
@endsection

@section('script')
<script src="/js/contacts/contacts.js"></script>
<script src="/js/contacts/addContact.js"></script>
<script src="/js/messages/saveMessage.js"></script>
<script src="/js/messages/displayMessage.js"></script>


<script >
    
    $( document ).ready(function() {
        $(".category-list .personal").css("color", "white");
    });

    $(".messages").animate({ scrollTop: $(document).height() }, "fast");
    
    $("#profile-img").click(function() {
	    $("#status-options").toggleClass("active");
    });

    $("input[name='category']").click(function() {
        $("input[type='radio']:checked").each(function() {
            $('.category-list label').css("color", "#44535e");
            var idVal = $(this).attr("id");
            $("label[for='"+idVal+"']").css("color", "white");
        });
    });


    $("#status-options ul li").click(function() {
        $("#profile-img").removeClass();
        $("#status-online").removeClass("active");
        $("#status-away").removeClass("active");
        $("#status-busy").removeClass("active");
        $("#status-offline").removeClass("active");
        $(this).addClass("active");
        
        if($("#status-online").hasClass("active")) {
            $("#profile-img").addClass("online");
        } else if ($("#status-away").hasClass("active")) {
            $("#profile-img").addClass("away");
        } else if ($("#status-busy").hasClass("active")) {
            $("#profile-img").addClass("busy");
        } else if ($("#status-offline").hasClass("active")) {
            $("#profile-img").addClass("offline");
        } else {
            $("#profile-img").removeClass();
        };
        
        $("#status-options").removeClass("active");
    }).filter(':first').click();

</script>
@endsection