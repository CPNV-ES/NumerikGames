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
  
      <title>{{ config('app.name', 'Numerik Games') }}</title>
      <link href="/favicon.png" rel="icon" data-n-head="true" type="image/png">
      <script src="/js/app.js"></script>
      <link rel="stylesheet" href="/css/app.css">
  </head>
  
  <body>
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
      @yield('content')
  
  </body>
  
  </html>