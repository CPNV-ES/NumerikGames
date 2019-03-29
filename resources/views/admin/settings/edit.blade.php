{{--
  -- Edit
  -- Layout for admin.settings edit page
  --
  -- @author Nicolas Henry
  --}}
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('admin.settings.update', $setting) }}">
                    {{ method_field('PUT') }}
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Modifiez votre paramètre</label>
                        <input class="form-control" type="text" placeholder="{{$setting->name}}" id="name" name="name" value="{{$setting->name}}">
                        <small id="nameHelp" class="form-text text-muted">Changez le titre de votre setting.</small>

                        <label for="value">Modifiez votre paramètre</label>
                        <input class="form-control" type="text" placeholder="{{$setting->value}}" id="value" name="value" value="{{$setting->value}}">
                        <small id="valueHelp" class="form-text text-muted">Changez le titre de votre setting.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Mettre à jour <b>{{$setting->name}}</b></button>
                </form>
            </div>
        </div>
    </div>
@endsection