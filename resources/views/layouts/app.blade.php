<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cosmo.css') }}">

    
    @livewireStyles
    @livewireScripts
    <script src="{{asset('js/app.js') }}"></script>
    @stack('scripts')
    @laravelPWA
</head>
<body>
    @include('layouts.navbar')    
    
    @yield('content')

    {{-- firebase --}}
    {{-- <script src="https://www.gstatic.com/firebasejs/8.2.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.2/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.2/firebase-messaging.js"></script>
    <script src="{{asset('js/firebase_custom_data.js') }}"></script> --}}
    {{-- @include('sse::view') --}}
    
</body>
</html>