{{--
-- Create
-- Layout for admin.proses create page
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
            <form method="POST" action="{{ route('admin.themes.proses.store', $theme) }}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Titre de la prose</label>
                    <input class="form-control" type="text" placeholder="Les robots" id="title" name="title">

                </div>
                <button type="submit" class="btn btn-primary">Créer une prose</button>
            </form>
        </div>
    </div>
</div>
@endsection
