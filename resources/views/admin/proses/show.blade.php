{{--
-- Show
-- Layout for admin.proses show page
--
-- @author Nicolas Henry
--}}
@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{$prose->title}}</h2>
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
                                <th scope="col">Titre</th>
                                <th scope="col">Etat</th>
                                <th scope="col">Theme de la prose</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$prose->id}}</td>
                                <td>{{$prose->title}}</td>
                                <td>{{$prose->is_full}}</td>
                                <td>{{$prose->theme->name}}</td>
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

@endsection
  