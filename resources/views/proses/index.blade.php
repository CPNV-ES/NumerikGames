{{--
  -- Index
  -- Layout for proses index page
  --
  -- @author Nicolas Henry
  --}}
@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Liste des proses</h1>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    @foreach ($proses as $prose)
                        <div class="col-md-3">
                            <div class="card border-dark mb-3" style="max-width: 18rem;">
                                <div class="card-header">
                                    Thème de la prose : <u>{{$prose->theme->name}}</u>
                                </div>
                                <div class="card-body text-dark">
                                    <h5>Prose : <u>{{$prose->title}}</u></h5>
                                    <ul class="card-text list-unstyled">
                                        @foreach ($prose->verse as $item)
                                            <li class="badge badge-light">{{substr($item->content, 0, 25)}}...</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Cette prose contient : {{count($prose->verse)}} vers</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
@endsection
