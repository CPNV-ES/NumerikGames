{{--
  -- Show
  -- Layout for verses show page
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
            <form method="POST" action="{{ route('verses.update', ['verse' => $verse->id]) }}">
                {{ method_field('PUT') }}
                {{csrf_field()}}
                <div class="form-group">
                    <label for="content">Entrez votre vers</label>
                    <input class="form-control" type="text" placeholder="{{$verse->content}}" id="content" name="content" value="{{$verse->content}}">
                    <small id="contentHelp" class="form-text text-muted">Changez le titre de votre verse.</small>
                </div>
                <div class="form-group">
                    <label for="prose">Selectionnez un thème</label>
                    <select class="custom-select custom-select-sm" id="prose" name="prose_id">
                        @foreach ($proses as $prose)
                            <option {{$verse->prose_id == $prose->id ? 'selected' : ''}} value="{{$prose->id}}">{{$prose->title}}</option>
                        @endforeach
                    </select>
                    <small id="proseHelp" class="form-text text-muted">Pour la changer de thème.</small>
                </div>
                <div class="form-group">
                    <label for="status">Selectionnez un status</label>
                    <select class="custom-select custom-select-sm" id="status" name="status">
                        <option {{$verse->status == 1 ? 'selected' : ''}} value="1">Actif</option>
                        <option {{$verse->status == 0 ? 'selected' : ''}} value="0">Inactif</option>
                    </select>
                    <small id="statusHelp" class="form-text text-muted">Statut de votre vers.</small>
                </div>
                <button type="submit" class="btn btn-primary">Mettre à jour ce vers</button>
            </form>
        </div>
    </div>
</div>
@endsection
