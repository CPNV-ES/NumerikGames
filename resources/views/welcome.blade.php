@extends('layouts.app')
@section('content')
    <div id="home">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Meet Kadaversky's bot !</h1>
                </div>
            </div> <!-- .row -->
            <div class="row">
                <div class="col-sm-12">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="col-sm-12">
                    <h4>Vous devez choisir l'un de nos thèmes ci-dessous pour commencer à écrire votre magnifique vers.</h4>
                </div>
            </div> <!-- .row -->

            <div class="row">
                @foreach ($themes as $theme)
                    <div class="col-md-{{$size_column}}">
                        <h2>{{ $theme->name }}</h2>
                    </div> <!-- .col-md- -->
                @endforeach
            </div> <!-- .row -->
            
            <div class="row">
                @foreach ($themesCollection as $theme)
                    <div class="col-md-{{$size_column}}">
                        @foreach ($theme->take(3) as $prose)
                        <div class="prose">
                            <a href="{{ route('proses.show', $prose->id) }}">
                                <img class="thumbnail" src="{{ asset('storage/'. $prose->path) }}"/>
                            </a>
                        </div>
                        @endforeach
                    </div>
                @endforeach
            </div> <!-- .row -->
            
            <div id="link-all-proses" class="row">
                <div class="col-md-12">
                    <a href="{{route('proses.index')}}" class="btn btn-outline-dark" role="button" aria-pressed="true">Voir toutes les proses</a>
                </div>
            </div> <!-- .row -->
        </div>
    </div>
@endsection
    