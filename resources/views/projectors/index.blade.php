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
                <h2>projectors</h2>
            </div>
            <div class="container">
                @foreach ($proses as $prose)
                    @if ($prose->verse != '[]') 
                        <h3>{{$prose->title}}</h3>
                        @foreach ($prose->verse as $value)
                            <p>{{$value->content}}</p>
                        @endforeach
                    @else
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
    