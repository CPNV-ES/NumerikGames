{{--
  -- Index
  -- Layout for themes index page
  --
  -- @author Nicolas Henry
  --}}
@extends('layouts.app')
@section('content')
    <div id="projectors-index">
        <div class="container">
            <div class="row">
                <div id="title-projectors" class="col-md-12">
                    <h1 class="text-center">Numerik' Games</h1>
                    <hr>
                </div>
                <div class="col-md-12">

                    <div class="prose">
                        @foreach ($proses as $prose)
                        <div class="col-md-12 text-center proses">
                            <h2 class="text-dark">{{$prose->title}}</h2>
                            @foreach ($prose->verse as $value)
                            <p class="text-secondary">{{$value->content}}</p>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection