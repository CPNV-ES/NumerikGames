{{--
-- Create
-- Layout for admin.verses create page
--
-- @author Nicolas Henry
--}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">

    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('admin.themes.proses.verses.store', ['theme' => $theme, 'prose' => $prose] ) }}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="content">Ajoutez un nouveau vers</label>
                    <input class="form-control" type="text" placeholder="Je suis mon cher ami, très heureux de te voir." id="content" name="content" autofocus>
                    <small id="contentHelp" class="form-text text-muted">Le contenu du vers.</small>
                </div>
                <div class="form-group">
                    <label for="prose">Selectionnez une prose</label>
                    <select class="custom-select custom-select-sm" id="prose" name="prose_id">
                        @foreach ($proses as $prose_option)
                            <option value="{{$prose_option->id}}" {{$prose_option->id == $prose->id ? 'selected' : ''}}>{{$prose_option->title}}</option>
                        @endforeach
                    </select>
                    <small id="proseHelp" class="form-text text-muted">Pour lier à un thème.</small>
                </div>
                <div class="form-group">
                    <label for="status">Selectionnez un status</label>
                    <select class="custom-select custom-select-sm" id="status" name="status">
                        <option value="1">Actif</option>
                        <option value="0">Inactif</option>
                    </select>
                    <small id="statusHelp" class="form-text text-muted">Statut de votre vers.</small>
                </div>
                <button type="submit" class="btn btn-primary">Créer un vers</button>
            </form>
        </div>
    </div>
</div>
@endsection
