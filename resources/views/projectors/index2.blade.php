{{--
  -- Index
  -- Layout for themes index page
  --
  -- @author Nicolas Henry
  --}}
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="overflow">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Numerik Games Festival') }}</title>
    <link href="/favicon.png" rel="icon" data-n-head="true" type="image/png">
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.0.2/dist/simpleParallax.min.js"></script>

</head>
    <body>
    <div class="row" id="projectors2-index">
        @foreach ($proses as $key => $prose)
            <div class="col-md-12">
                <p class="content-title2 text-center m-5">{{$prose->title}}</p>
            </div>            
            <div class="col-md-6">                 
                <img class="responsive background2 pl-5 pb-5" src="../{{$prose->path}}" alt="{{$prose->title}}">
            </div>
            <div class="col-md-6">         
            @foreach ($prose->verse as $value)
                <p class="content-subtitle2">{{$value->content}}</p>
            @endforeach
            </div>
        @endforeach
    </div>
</body>
</html>
<script src="/js/app.js"></script>
