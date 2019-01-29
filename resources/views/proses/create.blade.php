@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">

    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('proses.store') }}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Titre de la prose</label>
                    <input class="form-control" type="text" placeholder="Le robot en balade" id="title" name="title">
                    <small id="titleHelp" class="form-text text-muted">Le titre de votre prose.</small>
                </div>
                <div class="form-group">
                    <label for="theme">Selectionnez un thème</label>
                    <select class="custom-select custom-select-sm" id="theme" name="theme_id">
                        <option selected>Selectionnez un thème</option>
                        <option value="1">One</option>
                    </select>
                    <small id="themeHelp" class="form-text text-muted">Pour lier à un thème.</small>
                </div>
                <button type="submit" class="btn btn-primary">Créer une prose</button>
            </form>
        </div>
    </div>
</div>
@endsection
