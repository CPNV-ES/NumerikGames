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