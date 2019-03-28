{{--
  -- Index
  -- Layout for admin.settings index page
  --
  -- @author Nicolas Henry
  --}}
@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Page de paramètres</h2>
                        <p>Attention, cette page contient des informations sensibles, veuillez vous assurez que vous êtes conscient de ce que vous allez faire.</p>
                    </div>
                </div> {{-- .row --}}

                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-success" href="{{ route('admin.settings.create') }}" role="button">Créer</a>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Valeur</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($settings as $setting)
                                    <tr>
                                        <th scope="row">{{$setting->id}}</th>
                                        <td>
                                            <p>{{$setting->name}}</p>
                                        </td>
                                        <td>
                                            <p>{{$setting->value}}</p>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-toggle">
                                                <a class="btn btn-primary" href="{{ route('admin.settings.edit', $setting) }}" role="button">Editer</a>
                                                <a class="btn btn-warning" href="{{ route('admin.settings.show', $setting) }}" role="button">Afficher</a>
                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal-{{$setting->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel-{{$setting->id}}">Attention</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Vous êtes sur le point de supprimer <b>{{$setting->name}}</b>, Veuillez valider votre choix.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form id="delete-settings-form-{{$setting->id}}"
                                                                    action="{{ route('admin.settings.destroy', ['setting' => $setting->id]) }}"
                                                                    method="POST" style="display: none;">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}
                                                                </form>
                                                                <button onclick="event.preventDefault();
                                                                    document.getElementById('delete-settings-form-{{$setting->id}}').submit();"
                                                                    class="btn btn-danger">
                                                                    Supprimer
                                                                </button>
                                                            </div> {{-- .modal-footer --}}
                                                        </div>
                                                    </div>
                                                </div> {{-- .modal .fade --}}

                                                <!-- Button trigger modal -->
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal-{{$setting->id}}">Supprimer</button>
                                            </div>
                                        </td>
                                    </tr>   
                                @endforeach
                            </tbody>
                        </table>
                    </div> {{-- .col-md-12 --}}
                </div> {{-- .row --}}
            </div> {{-- .container --}}
        </div> {{-- .content --}}
    </div> {{-- .flex-center .position-ref .full-height --}}
@endsection