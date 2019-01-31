{{--
  -- Edit
  -- Layout for themes edit page
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
            <form method="POST" action="{{ route('themes.update', ['theme' => $theme->id]) }}">
                {{ method_field('PUT') }}
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Modifiez votre thème</label>
                    <input class="form-control" type="text" placeholder="{{$theme->name}}" id="name" name="name" value="{{$theme->name}}">
                    <small id="nameHelp" class="form-text text-muted">Changez le titre de votre theme.</small>
                </div>
                <button type="submit" class="btn btn-primary">Mettre à jour <b>{{$theme->name}}</b></button>
            </form>
        </div>
    </div>
</div>
@endsection
