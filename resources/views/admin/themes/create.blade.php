{{--
  -- Create
  -- Layout for admin.themes create page
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
            <form method="POST" action="{{ route('admin.themes.store') }}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Titre du thème</label>
                    <input class="form-control" type="text" placeholder="Les robots" id="name" name="name">
                </div>
                <button type="submit" class="btn btn-primary">Créer un thème</button>
            </form>
        </div>
    </div>
</div>
@endsection
