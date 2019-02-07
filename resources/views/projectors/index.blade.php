{{--
  -- Index
  -- Layout for themes index page
  --
  -- @author Nicolas Henry
  --}}
@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        
        <div class="content">
            <div class="title m-b-md">
                <h2>tutu</h2>
            </div>
            <div class="container">
                @foreach ($proses as $prose)
                    <h2>{{$prose->title}}</h2><br>
                    @foreach ($verses as $vers)
                        {{$vers->content}}<br>
                    @endforeach
                    <br>
                @endforeach
            </div>
        </div>
    </div>
@endsection
    