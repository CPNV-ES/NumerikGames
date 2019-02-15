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
                <div class="prose">
                    <div class="scroll">
                        @foreach ($proses as $prose)                        
                            <h3>{{$prose->title}}</h3>
                                @foreach ($prose->verse as $value)
                                    <p>{{$value->content}}</p>
                                @endforeach                        
                        @endforeach 
                    </div>    
                </div>     
            </div>
        </div>
    </div>
@endsection