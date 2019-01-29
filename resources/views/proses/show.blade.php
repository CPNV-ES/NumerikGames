@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
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

        <div class="content">
            <div class="title m-b-md">
                Numerik Games
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        {{$prose->title}}
                        {{$prose->created_at}}
                    </div>
                </div>
            </div>

            <div class="links">
                <a href="{{url('/')}}" target="_blank">Accueil</a>
            </div>
        </div>
    </div>
@endsection
