{{--
  -- Create
  -- Layout for admin.settings create page
  --
  -- @author Nicolas Henry
  --}}
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('admin.settings.store') }}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Nom de votre paramètre</label>
                        <input class="form-control" type="text" placeholder="prose_limit" id="name" name="name">

                        <label for="value">Valeur de votre paramètre</label>
                        <input class="form-control" type="number" placeholder="30" id="value" name="value">
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter un paramètre</button>
                </form>
            </div>
        </div>
    </div>
@endsection