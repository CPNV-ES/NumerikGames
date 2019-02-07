{{--
-- Show
-- Layout for themes show page
--
-- @author Nicolas Henry
--}}
@extends('layouts.app')
@section('content')
@auth
    <div class="flex-center position-ref full-height">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{$theme->name}}</h2>
                </div>
            </div>{{-- .row --}}
            <div class="row">
                <div class="col-md-12">
                    <h3>Vers activés</h3>
                </div>{{-- .col-md-12 --}}
                <div class="col-md-12">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Vers</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{$theme->id}}</th>
                                <td>{{$theme->name}}</td>
                                <td>
                                    <div class="btn-group btn-group-toggle">
                                        <a class="btn btn-danger disabled" href="" role="button">Désactiver</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a class="btn btn-dark" href="#" role="button">Désactivez la selection</a>
                </div>{{-- .col-md-12 --}}
            </div>{{-- .row --}}
        </div>{{-- .container --}}
    </div>{{-- .flex-center position-ref --}}
@endauth
<div class="flex-center position-ref full-height">
    <div class="container">
        <div class="row">
            @foreach ($proses as $key => $prose)
            <div class="col-sm-3">
                <h3>{{$prose->title}}</h3>
                <p>{{$prose->verse[$key]->content}}</p>
                <p>Créé le : {{$prose->verse[$key]->created_at->format('d.m.Y')}}</p>
            </div>
            @endforeach
        </div>
    </div>

@endsection
  