{{--
  -- Show
  -- Layout for proses show page
  --
  -- @author Nicolas Henry
  --}}
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
            <a class="btn btn-success" href="{{ route('proses.create') }}" role="button">Créer</a>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Vers</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($verses as $verse)
                    <tr>
                        <th scope="row">{{$verse->id}}</th>
                        <td>{{$verse->content}}</td>
                        <td>
                            <div class="btn-group btn-group-toggle">
                                <a class="btn btn-primary" href="#" role="button">Editer</a>
                                <a class="btn btn-warning" href="#" role="button">Afficher</a>
                                <a class="btn btn-danger disabled" href="#" role="button">Supprimer</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
