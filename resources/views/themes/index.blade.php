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
                          <a class="btn btn-success" href="{{ route('themes.create') }}" role="button">Créer</a>
                          <table class="table">
                              <thead class="thead-dark">
                                  <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Nom</th>
                                      <th scope="col">Actions</th>
                                      <th scope="col">Selectionnez</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($themes as $theme)
                                      <tr>
                                          <th scope="row">{{$theme->id}}</th>
                                          <td>
                                                <p>{{$theme->name}}</p>
                                            </td>
                                          <td>
                                              <div class="btn-group btn-group-toggle">
                                                  <a class="btn btn-primary" href="{{ route('themes.edit', ['theme' => $theme->id]) }}" role="button">Editer</a>
                                                  <a class="btn btn-warning" href="{{ route('themes.show', ['theme' => $theme->id]) }}" role="button">Afficher</a>
                                                    <form id="delete-themes-form"
                                                        action="{{ route('themes.destroy', ['theme' => $theme->id]) }}"
                                                        method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                    <button onclick="event.preventDefault();
                                                        document.getElementById('delete-themes-form').submit();"
                                                        class="btn btn-danger">
                                                        Supprimer
                                                    </button>
                                              </div>
                                          </td>
                                          <td><input type="checkbox" name="themes[]" id="theme-{{$theme->id}}"></td>
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
  