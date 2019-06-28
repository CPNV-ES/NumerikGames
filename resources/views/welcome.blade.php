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
                    <h4 class="mb-5 mt-3">Choisissez un thème et une image qui vous inspire et écrivez votre vers...</h4>
                </div>
            </div> <!-- .row -->

            <div class="row">
                @foreach ($themes as $theme)
                    <div class="col-md-{{$size_column}}">
                        <h2 class="mb-3">{{ $theme->name }}</h2>
                    </div> <!-- .col-md- -->
                @endforeach
            </div> <!-- .row -->

            <div class="row">
                @foreach ($themesCollection as $theme)
                    <div class="col-md-{{$size_column}}">
                        @foreach ($theme->take($limit) as $prose)
                        <div class="prose">
                            <a href="{{ route('proses.show', $prose->id) }}">
                                <img class="img-thumbnail" src="{{ asset($prose->path) }}"/>
                            </a>
                        </div>
                        @endforeach
                    </div>
                @endforeach
            </div> <!-- .row -->
        </div>
    </div>
@endsection
