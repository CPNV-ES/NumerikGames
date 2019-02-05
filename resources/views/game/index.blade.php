@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @foreach ($verses as $verse)
                {{$verse->content}}<br><br>
            @endforeach
        </div>
    </div>
</div>
@endsection
