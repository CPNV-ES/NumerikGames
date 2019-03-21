{{--
-- Edit
-- Layout for admin.proses edit page
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
            <form method="POST" action="{{ route('proses.update', ['prose' => $prose->id]) }}">
                {{ method_field('PUT') }}
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Titre de la prose</label>
                    <input class="form-control" type="text" placeholder="{{$prose->title}}" id="title" name="title" value="{{$prose->title}}">
                    <small id="titleHelp" class="form-text text-muted">Changez le titre de votre prose.</small>
                </div>
                <div class="form-group">
                    <label for="theme">Selectionnez un thème</label>
                    <select class="custom-select custom-select-sm" id="theme" name="theme_id">
                        @foreach ($themes as $theme)
                            <option {{$prose->theme_id == $theme->id ? 'selected' : ''}} value="{{$theme->id}}">{{$theme->name}}</option>
                        @endforeach
                    </select>
                    <small id="themeHelp" class="form-text text-muted">Pour la changer de thème.</small>
                </div>
                <button type="submit" class="btn btn-primary">Mettre à jour {{$prose->title}}</button>
            </form>
        </div>
    </div>
</div>
@endsection
