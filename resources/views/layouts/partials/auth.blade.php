<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Assess2023') }}</title>
    <!-- plugins:css -->
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <!-- Plugin css for this page -->
{{--    <link rel="stylesheet" href="{{ asset('vendors/daterangepicker/daterangepicker.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('vendors/chartist/chartist.min.css') }}">--}}

    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
</head>

@yield('styles')

<body data-aos-easing="ease-out-quad" data-aos-duration="700" data-aos-delay="0">
