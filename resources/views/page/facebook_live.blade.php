<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

        .fb_dialog_content iframe {
            left: {{$setting->locator}}% !important;
            top: {{$setting->locator_top + 10}}% !important;
        }

        /* ***************
         * FB on left side
         ******************/
        /* The following are for the chat box, on display and on hide */
        iframe.fb_customer_chat_bounce_in_v2 {
            @if($setting->locator>50)
                  left: {{$setting->locator-30}}% !important;

            @else
                  left: {{$setting->locator+5}}% !important;

        @endif


        }

        iframe.fb_customer_chat_bounce_out_v2 {
            @if($setting->locator>50)
                  left: {{$setting->locator-30}}% !important;

            @else
                  left: {{$setting->locator+5}}% !important;

        @endif


        }
    </style>
</head>
<body>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>

    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v9.0'
        });
        FB.getLoginStatus(function (response) {
            if (response.status === 'connected') {
                var accessToken = response.authResponse.accessToken;
            }
        });
        //console.log(accessToken);
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
     attribution="setup_tool"
     page_id="{{$page->id_page}}"
     theme_color="{{$setting->theme_color}}"
     greeting_dialog_display="{{$setting->greeting_dialog_display}}"
     greeting_dialog_delay="{{$setting->greeting_dialog_delay}}"
     ref="home"
     logged_in_greeting="{{$setting->logged_in_greeting}}"
     logged_out_greeting="{{$setting->logged_out_greeting}}"
>
</div>

</body>
</html>