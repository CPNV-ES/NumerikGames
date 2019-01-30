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
                                                  <a class="btn btn-danger disabled" href="" role="button">Supprimer</a>
                                              </div>
                                          </td>
                                          <td><input type="checkbox" name="verses[]" id="verse-{{$verse->id}}"></td>
                                      </tr>   
                                  @endforeach
                              </tbody>
                          </table>
                          <a id="unactive" class="btn btn-dark" href="#" role="button">Désactivez la selection</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  @endsection
  