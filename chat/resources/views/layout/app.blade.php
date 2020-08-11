<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    @yield('meta')
    
    <title>CHAT COMMUNITY</title>
    <link rel="icon" href="{!! asset('/images/icon-titlebar.png') !!}"/>
    
    
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="/js/jquery-min.min.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
  
    
    <style>

        :root {
            --darkblue: #0e1821; 
            --lightblue: #44535e; 
            --gray: #d3dad9; 
        }

        @font-face
        {
            font-family: LatoBlack; 
            src: url("../fonts/Lato-Black.ttf");
        }
    
        @font-face
        {
            font-family: LatoBlackItalic; 
            src: url("../fonts/Lato-BlackItalic.ttf");
        }
    
        @font-face{
            font-family: LatoLight;
            src: url('../fonts/Lato-Light.ttf');
        }

        @font-face{
            font-family: LatoLightItalic;
            src: url('../fonts/Lato-LightItalic.ttf');
        }

        @font-face{
            font-family: Lato;
            src: url('../fonts/Lato-Regular.ttf');
        }

        @font-face{
            font-family: LatoThin;
            src: url('../fonts/Lato-Thin.ttf');
        }

        html, body {
            height: 100%;
            margin: 0;
            font-family: Lato;
        }
    </style>
</head>

<body>
    @yield('content')
    @yield('styles')
    @yield('script')
</body>

</html>