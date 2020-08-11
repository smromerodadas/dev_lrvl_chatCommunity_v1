@extends('layout/app')

@section('css')
    {{-- <link rel="stylesheet" href="/css/chat.min.css"> --}}
@endsection

@section('styles')
<style>
    body {
        min-height: 100vh;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
    }

    .login-container {
        float: left;
        width: 50%;
        height: 100%;

        max-height: 100%; 

        overflow: hidden;
        position: relative;
    }


    .login-title {
        color: black;
        text-align: center;
        font-family: LatoBlack;
        font-size: 25px; 
    }

    .login-form {
        margin-left: 10%; 
        margin-right: 10%; 
        margin-top: 70px; 
        margin-bottom: 70px; 
        text-align: center;
    }

    @media screen and (max-width: 735px) {
        .login-container{
            width: 100%; 
        }
    }

    

    .login-input {
        margin: auto;
        color: black;
        border: 0px;
        border-bottom: 1px solid gray;
        width: 70%;
    }

    

    .login-btn {
        border: 0px;
        width: 70%;
        height: 35px;
        background-color: var(--lightblue); 
        color: white;
    }

   

    .login-btn:hover {
        opacity: 0.7;
        transition: none; 
    }

    .divider {
        margin: 8%;
        color: black;
    }

    .fa-facebook,
    .fa-google,
    .fa-phone {
        padding: 20px;
        width: 40px;
        font-size: 20px;
        text-align: center;
        border-radius: 50px;
        box-shadow: 0px 0px 2px #888;
        padding: 0.5em 0.6em;
        margin-left: 5%;
        margin-right: 5%;
    }

    /* Add a hover effect if you want */
    .fa:hover {
        opacity: 0.7;
        text-decoration: none;
    }

    .fa-facebook {
        background: #3B5998;
        color: white;
    }

    .fa-google {
        background: #dd4b39;
        color: white;
    }

    .fa-phone {
        background-color: green;
        color: white;
    }

    .signup-redirect {
        margin-top: 10%;
        margin-bottom: 10%;
        color: var(--lightblue);
        font-size: 15px;
    }

    @media screen and (max-width: 735px) {
        .login-container{
            width: 100%; 
        }

        .login-form{
            margin-top: 35px;
        }

        .login-input{
            width: 50%; 
            height: 20px; 
            font-size: 10px; 
        }

        .login-btn{
            width: 50%; 
            height: 25px; 
        }

        .divider{
            margin: 5%; 
            font-size: 10px; 
        }
        
        .fa{
            padding: 10px;
            width: 20px;
            font-size: 10px;
            text-align: center;
            border-radius: 50px;
            box-shadow: 0px 0px 2px #888;
            padding: 0.5em 0.6em;
            margin-left: 3%;
            margin-right:3%;
        }

        .signup-redirect{
            font-size: 10px; 
        }

    }

    .login-status{
        margin: auto; 
        padding: 2%; 
        width: 80%;
        font-size: 12px;
    }

    
    .pofjobs-container {
        width: 50%;
        height: 100%;

        max-height: 100%; 
        display: inline-block;
        background-color: var(--darkblue); 
        background-size: cover;

        font-family: LatoBlack;
        color: white;

        overflow: hidden;
        position: relative;
    }

    .page-title{
        width: 40%; 
        padding: 15%; 
    }


    .pof-title {
        font-size: 80px;
    }


    .landing-redirect {
        font-size: 15px;
        text-align: end;
    }

    @media screen and (max-width: 735px) {
        .pofjobs-container{
            display: none; 
        }
    }

</style>
@endsection

@section('content')
<div class="login-container">
    <div class="login-form">
        <h2 class="login-title">LOGIN</h2>
        <br>

        <p class="login-status" id="login-error-message" style="display: none">
            <strong class="error-status alert alert-danger">Invalid Username or Password</strong>
            <br><br>
        </p>

        

        {{-- {{route('login')}} --}}
        <form class="form" id="formLogin" method="POST">
            @csrf
            <input class="login-input form-control" name="email" type="email" placeholder="Email"
                value="{{ old('email') }}" required autofocus name="email">
            <input class="login-input form-control" name="password" type="password" placeholder="Password" required>
            <br>
            <button class="login-btn">Login</button>
        </form>

        <p class="divider">or</p>

        <a href="#" class="fa fa-phone"></a>
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-google"></a>

        <p class="signup-redirect">
            Don't have an account? <a href="" class="signup-redirect-link">Sign Up</a>
            {{-- {{url('/signup')}} --}}
        </p>

    </div>
</div>

<div class="pofjobs-container">
        <div class="page-title">
            <h1 class="pof-title">Chat</h1>
            <h1 class="pof-title">Community</h1>
            <br>
            {{-- <p class="pof-description">Job Site for Accounting, Audit, Tax, Finance, Systems related professionals.</p> --}}

            <br><br>
            {{-- <p class="landing-redirect">
                Go Back to <a href="" class="landing-redirect-link">Landing Page</a>
                {{url('/')}}
            </p> 
            --}}
        </div>
</div>
@endsection

@section('script')
    <script src="/js/login/login.js"></script>

    {{-- <script>
    $( document ).ready(function() {
        $request->session()->forget('userData');
    });
</script> --}}

@endsection
