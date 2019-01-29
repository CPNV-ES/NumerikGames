@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="title m-b-md">
                <h2>Proses page</h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-success" href="{{ route('proses.create') }}" role="button">Créer</a>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Titre</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proses as $prose)
                                    <tr>
                                        <th scope="row">{{$prose->id}}</th>
                                        <td>{{$prose->title}}</td>
                                        <td>
                                            <div class="btn-group btn-group-toggle">
                                                <a class="btn btn-primary" href="{{ route('proses.edit', ['prose' => $prose->id]) }}" role="button">Editer</a>
                                                <a class="btn btn-warning" href="{{ route('proses.show', ['prose' => $prose->id]) }}" role="button">Afficher</a>
                                                <a class="btn btn-danger" href="#" role="button">Supprimer</a>
                                            </div>
                                        </td>
                                    </tr>   
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
