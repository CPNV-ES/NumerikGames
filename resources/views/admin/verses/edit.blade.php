{{--
-- Edit
-- Layout for admin.verses edit page
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
            <form method="POST" action="{{ route('admin.themes.proses.verses.update', ['theme' => $theme, 'prose' => $prose, 'verse' => $verse]) }}">
                {{ method_field('PUT') }}
                {{csrf_field()}}
                <div class="form-group">
                    <label for="content">Vers <b>{{$verse->content}}</b></label>
                    <input class="form-control" type="text" placeholder="{{$verse->content}}" id="content" name="content" value="{{$verse->content}}">
                    <small id="contentHelp" class="form-text text-muted">Changez le contenu du vers.</small>
                </div>
                <div class="form-group">
                    <label for="status">Status du vers</label>
                    <select class="custom-select custom-select-sm" id="status" name="status">
                        <option {{ $verse->status == 0 ? 'selected' : '' }} value="0">Inactif</option>
                        <option {{ $verse->status == 1 ? 'selected' : '' }} value="1">Actif</option>
                    </select>
                    <small id="statusHelp" class="form-text text-muted">Pour la changer le status.</small>
                </div>
                <button type="submit" class="btn btn-primary">Mettre à jour {{$verse->content}}</button>
            </form>
        </div>
    </div>
</div>
@endsection
