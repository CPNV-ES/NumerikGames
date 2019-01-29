@extends('layouts.app')
@section('content')
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Numerik Games
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs" target="_blank">Documentation</a>
                    <a href="https://github.com/CPNV-ES/NumerikGames" target="_blank">GitHub</a>
                    <a href="{{url('/themes')}}">Themes</a>
                    <a href="{{url('/proses')}}">Proses</a>
                    <a href="{{url('/verses')}}">Verses</a>
                </div>
            </div>
        </div>
@endsection
