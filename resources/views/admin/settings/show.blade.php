{{--
  -- Show
  -- Layout for admin.settings show page
  --
  -- @author Nicolas Henry
  --}}
@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{$setting->name}}</h2>
                </div>
            </div>{{-- .row --}}
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Vers</th>
                                <th scope="col">Valeur</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{$setting->id}}</th>
                                <td>{{$setting->name}}</td>
                                <td>{{$setting->value}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a class="btn btn-success" href="{{ URL::previous() }}" role="button">Retour</a>
                </div>{{-- .col-md-12 --}}
            </div>{{-- .row --}}
        </div>{{-- .container --}}
    </div>{{-- .flex-center position-ref --}}
@endsection