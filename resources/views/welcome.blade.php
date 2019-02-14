@extends('layouts.app')
@section('content')
    <div id="home"></div>
        <div class="container">
            <div class="col-sm-12">
                <div class="row">
                    <h1>Themes page</h1>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="row">
                    <h4>Vous devez choisir l'un de nos thèmes ci-dessous pour commencer à écrire votre magnifique vers.</h4>
                </div>
            </div>
                <div class="row">                   
                    @foreach ($themes as $theme)       
                        <div class="col-sm">                
                            <div class="card-group">
                                <div class="card">
                                    <svg class="bd-placeholder-img figure-img img-fluid rounded" width="300" height="200" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                                        <a xlink:href="{{ route('proses.show', $theme->id) }}">
                                            <rect fill="#868e96" width="100%" height="100%"></rect>
                                        </a>
                                    </svg>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$theme->name}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach                   
                </div>
         </div>
@endsection
