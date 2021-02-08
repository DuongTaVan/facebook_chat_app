<!DOCTYPE html>

<html lang="en">

<head>

    <title>{{ config('shopify-app.app_name') }}</title>

    <meta charset="UTF-8">

    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">-->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link href="{{ secure_asset('/css/backend/v2/main.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('/css/backend/styles.css') }}" rel="stylesheet">
{{--    <link href="{{ secure_asset('/css/backend/v2/ndn_setting.css') }}" rel="stylesheet">--}}
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>


