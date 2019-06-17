{{--
  -- App
  -- The base layout for each pages
  --
  -- @author Nicolas Henry
  --}}

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Numerik Games Festival') }}</title>
    <link href="/favicon.png" rel="icon" data-n-head="true" type="image/png">
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
</head>

<body>
    @include('layouts.header')
    @include('flash-message')
    @yield('content')

</body>

</html>