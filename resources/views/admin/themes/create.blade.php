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
        <div class="col-md-12">
            <form method="POST" action="{{ route('admin.themes.store') }}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Titre du thème</label>
                    <input class="form-control" type="text" placeholder="Les robots" id="name" name="name">

                    <label for="path">Image du thème</label>
                    <input class="form-control" type="file" placeholder="Selectionnez un fichier" id="path" name="path">

                    <label for="color">Couleur du thème</label>
                    <input class="form-control" type="color" value="#{{ substr(md5(rand()), 0, 6) }}" id="color" name="color">

                </div>
                <button type="submit" class="btn btn-primary">Créer un thème</button>
            </form>
        </div>
    </div>
</div>
@endsection
