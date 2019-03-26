{{--
-- Index
-- Layout for admin.verses index page
--
-- @author Nicolas Henry
--}}
@extends('layouts.app')
@section('content')
  <div class="flex-center position-ref full-height">
      <div class="content">
          <div class="row">
              <div class="container">
                      Prose : 
                  <h2>{{$prose->title}}</h2>
              </div>
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
                      <a class="btn btn-success" href="{{ route('admin.themes.proses.verses.create', [ 'theme' => $theme, 'prose' => $prose]) }}" role="button">Créer</a>
                      <table class="table">
                          <thead class="thead-dark">
                              <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Content</th>
                                  <th scope="col">Status du vers</th>
                                  <th scope="col">Actions</th>
                                  <th scope="col">Selectionnez</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($verses as $verse)
                                  <tr>
                                      <th scope="row">{{$verse->id}}</th>
                                      <td>{{$verse->content}}</td>
                                      <td>{{ $verse->status == 1 ? 'Affiché aux utilisateurs' : 'Inactif' }}</td>
                                      <td>
                                          <div class="btn-group btn-group-toggle">
                                              <a class="btn btn-primary" href="{{ route('admin.themes.proses.verses.edit', [ 'theme' => $theme, 'prose' => $prose, 'verse' => $verse]) }}" role="button">Editer</a>
                                              <a class="btn btn-warning" href="{{ route('admin.themes.proses.verses.show', [ 'theme' => $theme, 'prose' => $prose, 'verse' => $verse]) }}" role="button">Afficher</a>
                                              
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
                                                              Vous êtes sur le point de supprimer <b>{{$verse->title}}</b>, Veuillez valider votre choix.
                                                          </div>
                                                          <div class="modal-footer">
                                                              <form id="delete-verses-form-{{$verse->id}}"
                                                                  action="{{ route('admin.themes.proses.verses.destroy', ['theme' => $theme, 'prose' => $prose, 'verse' => $verse]) }}"
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
                                      <td><input type="checkbox" name="{{$verse}}" id="verse-{{$verse->id}}"></td>
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
