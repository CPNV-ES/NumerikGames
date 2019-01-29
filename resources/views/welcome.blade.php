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

                <div class="links">
                    <a href="https://laravel.com/docs" target="_blank">Documentation</a>
                    <a href="https://github.com/CPNV-ES/NumerikGames" target="_blank">GitHub</a>
                    <a href="{{url('/themes')}}" target="_blank">Themes</a>
                    <a href="{{url('/proses')}}" target="_blank">Proses</a>
                    <a href="{{url('/verses')}}" target="_blank">Verses</a>
                </div>
            </div>
        </div>
@endsection
