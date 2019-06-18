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
            <div class="row">
                <div class="container">
                        Theme : 
                    <h2>{{$theme->name}}</h2>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-success" href="{{ route('admin.themes.proses.create', $theme) }}" role="button">Créer</a>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Titre</th>
                                    <th scope="col">Date de création</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Actions</th>
                                    <th scope="col">Informations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proses as $prose)
                                    <tr>
                                        <th scope="row">{{$prose->id}}</th>
                                        <td>{{$prose->title}}</td>
                                        <td>{{$prose->created_at->toDayDateTimeString()}}</td>
                                        <td><img src="{{asset($prose->path)}}" alt="{{$prose->path}}" width="100"></td>
                                        <td>
                                            <div class="btn-group btn-group-toggle">
                                                <a class="btn btn-primary" href="{{ route('admin.themes.proses.edit', [ $theme, $prose]) }}" role="button">Editer</a>
                                                <a class="btn btn-warning" href="{{ route('admin.themes.proses.show', [ $theme, $prose]) }}" role="button">Afficher</a>
                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal-{{$prose->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel-{{$prose->id}}">Attention</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Vous êtes sur le point de supprimer <b>{{$prose->title}}</b>, Veuillez valider votre choix.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form id="delete-proses-form-{{$prose->id}}"
                                                                    action="{{ route('admin.themes.proses.destroy', ['theme' => $theme, 'prose' => $prose]) }}"
                                                                    method="POST" style="display: none;">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}
                                                                </form>
                                                                <button onclick="event.preventDefault();
                                                                    document.getElementById('delete-proses-form-{{$prose->id}}').submit();"
                                                                    class="btn btn-danger">
                                                                    Supprimer
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Button trigger modal -->
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal-{{$prose->id}}">Supprimer</button>
                                            </div>
                                        </td>
                                        <td>
                                            {{$prose->flagged_verse($prose)}}
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
  