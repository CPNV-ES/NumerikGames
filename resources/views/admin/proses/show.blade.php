{{--
-- Show
-- Layout for admin.proses show page
--
-- @author Nicolas Henry
--}}
@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{$prose->title}}</h2>
                </div>
            </div>{{-- .row --}}
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Etat</th>
                                <th scope="col">Projection</th>
                                <th scope="col">Theme de la prose</th>
                                <th scope="col">Action</th>
                                <th scope="col">Informations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$prose->id}}</td>
                                <td>{{$prose->title}}</td>
                                <td>{{$prose->is_full ? 'Pleine' : 'En attente de vers'}}</td>
                                <td>{{$prose->is_projectable ? 'En projection' : 'En attente d\'action'}}</td>
                                <td>{{$prose->theme->name}}</td>
                                <td>
                                    <form id="update-proses-form-{{$prose->id}}"
                                        action="{{ route('admin.themes.proses.update', ['theme' => $prose->theme, 'prose' => $prose]) }}"
                                        method="POST" style="display: none;">
                                        {{ method_field('PUT') }}
                                        {{ csrf_field() }}
                                        <input class="form-control" type="number" id="is_projectable" name="is_projectable" value="{{$prose->is_projectable ? 0 : 1 }}">
                                    </form>
                                    
                                    <button onclick="event.preventDefault();
                                        document.getElementById('update-proses-form-{{$prose->id}}').submit();"
                                        class="btn btn-{{$prose->is_projectable ? 'danger' : 'success' }}">
                                        {{$prose->is_projectable ? 'Ne plus projeter' : 'Projeter' }}
                                    </button>
                                </td>
                                <td>
                                    {{$prose->flagged_verse($prose)}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a class="btn btn-success" href="{{ route('admin.themes.proses.verses.index', ['theme' => $theme, 'prose' => $prose]) }}" role="button">Voir les vers de la prose</a>
                </div>{{-- .col-md-12 --}}
            </div>{{-- .row --}}
        </div>{{-- .container --}}
    </div>{{-- .flex-center position-ref --}}

@endsection
