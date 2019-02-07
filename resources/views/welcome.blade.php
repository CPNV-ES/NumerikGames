@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                <h2>Themes page</h2>
            </div>
            <div class="container">
                <div class="row">                   
                    @foreach ($themes as $theme)       
                        <div class="col-sm-3">                
                            <svg class="bd-placeholder-img figure-img img-fluid rounded" width="400" height="300" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: {{$theme->name}}">
                                <title>{{$theme->name}}</title>
                                    <rect fill="#868e96" width="100%" height="100%"></rect>
                                    <text fill="#dee2e6" dy=".3em" x="50%" y="50%">{{$theme->name}}</text>
                            </svg>
                            <a href="{{ route('themes.show', $theme->id) }}">
                                    <button type="submit" class="btn btn-primary">Voir le contenu</button>
                            </a>
                            <a href="{{ route('proses.show', $theme->id) }}">
                                    <button type="submit" class="btn btn-primary">Ajouter un vers</button>
                            </a>
                        </div>
                    @endforeach                   
                </div>
            </div>
        </div>
    </div>
@endsection
