{{--
-- Show
-- Layout for themes show page
--
-- @author Nicolas Henry
--}}
@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{$verse->content}}</h2>
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
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{$verse->id}}</th>
                                <td>{{$verse->content}}</td>
                                <td>{{$verse->status}}</td>
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
  