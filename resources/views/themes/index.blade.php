{{--
  -- Index
  -- Layout for themes index page
  --
  -- @author Nicolas Henry
  --}}
@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        
        <div class="content">
            <div class="title m-b-md">
                <h2>Themes page</h2>
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

                        @auth
                            <a class="btn btn-success" href="{{ route('themes.create') }}" role="button">Créer</a>
                        @endauth

                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    @auth
                                        <th scope="col">#</th>
                                    @endauth
                                    <th scope="col">Nom</th>
                                    @auth
                                        <th scope="col">Actions</th>
                                        <th scope="col">Selectionnez</th>
                                    @endauth
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($themes as $theme)
                                    <tr>
                                        @auth
                                            <th scope="row">{{$theme->id}}</th>
                                        @endauth
                                        <td>
                                            <p>{{$theme->name}}</p>
                                        </td>
                                        @auth
                                            <td>
                                                <div class="btn-group btn-group-toggle">
                                                    <a class="btn btn-primary" href="{{ route('themes.edit', ['theme' => $theme->id]) }}" role="button">Editer</a>
                                                    <a class="btn btn-warning" href="{{ route('themes.show', ['theme' => $theme->id]) }}" role="button">Afficher</a>
                                                    
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal-{{$theme->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel-{{$theme->id}}">Attention</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Vous êtes sur le point de supprimer <b>{{$theme->name}}</b>, Veuillez valider votre choix.
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form id="delete-themes-form-{{$theme->id}}"
                                                                        action="{{ route('themes.destroy', ['theme' => $theme->id]) }}"
                                                                        method="POST" style="display: none;">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field('DELETE') }}
                                                                    </form>
                                                                    <button onclick="event.preventDefault();
                                                                        document.getElementById('delete-themes-form-{{$theme->id}}').submit();"
                                                                        class="btn btn-danger">
                                                                        Supprimer
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Button trigger modal -->
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal-{{$theme->id}}">Supprimer</button>
                                                </div>
                                            </td>
                                            <td><input type="checkbox" name="themes[]" id="theme-{{$theme->id}}"></td>
                                        @endauth
                                    </tr>   
                                @endforeach
                            </tbody>
                        </table>

                        @auth
                            <a id="unactive" class="btn btn-dark" href="#" role="button">Désactivez la selection</a>
                        @endauth
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
  