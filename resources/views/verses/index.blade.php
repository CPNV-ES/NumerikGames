{{--
  -- Index
  -- Layout for verses index page
  --
  -- @author Nicolas Henry
  --}}
@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
  
        <div class="content">
            <div class="title m-b-md">
                <h2>Verses page</h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-success" href="{{ route('verses.create') }}" role="button">Créer</a>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Actions</th>
                                    <th scope="col">Selectionnez</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($verses as $verse)
                                    <tr>
                                        <th scope="row">{{$verse->id}}</th>
                                        <td>
                                            <p>{{$verse->content}}</p>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-toggle">
                                                <a class="btn btn-primary" href="{{ route('verses.edit', ['verse' => $verse->id]) }}" role="button">Editer</a>
                                                <a class="btn btn-warning" href="{{ route('verses.show', ['verse' => $verse->id]) }}" role="button">Afficher</a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal-{{$verse->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel-{{$verse->id}}">Attention</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Vous êtes sur le point de supprimer un vers, Veuillez valider votre choix.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form id="delete-verses-form-{{$verse->id}}"
                                                                    action="{{ route('verses.destroy', ['verse' => $verse->id]) }}"
                                                                    method="POST" style="display: none;">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}
                                                                </form>
                                                                <button onclick="event.preventDefault();
                                                                    document.getElementById('delete-verses-form-{{$verse->id}}').submit();"
                                                                    class="btn btn-danger">
                                                                    Supprimer
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Button trigger modal -->
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal-{{$verse->id}}">Supprimer</button>
                                            </div>
                                        </td>
                                        <td><input type="checkbox" name="verses[]" id="verse-{{$verse->id}}"></td>
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
  