{{--
  -- Index
  -- Layout for proses admin.index page
  --
  -- @author Nicolas Henry
  --}}
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
                        @if (session('bug'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('bug') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <a class="btn btn-success" href="{{ route('admin.themes.proses.create', $theme) }}" role="button">Créer</a>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Titre</th>
                                    <th scope="col">Actions</th>
                                    <th scope="col">Selectionnez</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proses as $prose)
                                    <tr>
                                        <th scope="row">{{$prose->id}}</th>
                                        <td>{{$prose->title}}</td>
                                        <td>
                                            <div class="btn-group btn-group-toggle">
                                                <a class="btn btn-primary" href="{{ route('proses.edit', ['prose' => $prose]) }}" role="button">Editer</a>
                                                <a class="btn btn-warning" href="{{ route('proses.show', ['prose' => $prose]) }}" role="button">Afficher</a>
                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal-{{$prose}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel-{{$prose}}">Attention</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Vous êtes sur le point de supprimer <b>{{$prose->title}}</b>, Veuillez valider votre choix.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form id="delete-proses-form-{{$prose}}"
                                                                    action="{{ route('proses.destroy', ['prose' => $prose]) }}"
                                                                    method="POST" style="display: none;">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}
                                                                </form>
                                                                <button onclick="event.preventDefault();
                                                                    document.getElementById('delete-proses-form-{{$prose}}').submit();"
                                                                    class="btn btn-danger">
                                                                    Supprimer
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Button trigger modal -->
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal-{{$prose}}">Supprimer</button>
                                            </div>
                                        </td>
                                        <td><input type="checkbox" name="{{$prose}}" id="prose-{{$prose}}"></td>
                                    </tr>   
                                @endforeach
                            </tbody>
                        </table>
                        <a class="btn btn-dark" href="#" role="button">Désactivez la selection</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  @endsection
  