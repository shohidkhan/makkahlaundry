<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset($systemSetting->favicon ?? 'frontend/images/logo.svg') }}">
    @include('frontend.partials.style')
</head>

<body>

    @yield('content')

    @include('frontend.partials.script')

</body>

</html>




<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="author" content="Laun">
    <meta name="description" content="ML makkha laundry service">
    <meta name="keywords" content="ML makkha laundry service">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" href="assets//img//favicon.png" sizes="96x96">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    @include('frontend.partials.style')
</head>

<body>

    @include('frontend.partials.menu')

    @yield('main-content')

    @include('frontend.partials.script')
</body>

</html>
