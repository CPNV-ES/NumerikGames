@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>{{$prose->title}}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @foreach ($verses as $verse)
            {{$verse->content}}<br>
            @endforeach
        </div>
    </div>
</div>
@endsection
