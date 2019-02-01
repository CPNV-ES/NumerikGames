@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                <h2>Themes page</h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @foreach ($themes as $theme)
                            {{$theme->name}}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
