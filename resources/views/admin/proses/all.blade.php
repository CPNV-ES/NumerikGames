{{--
-- Index
-- Layout for proses admin.index page
--
-- @author Nicolas Henry
--}}
@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="row">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Prose</th>
                                <th scope="col">Thème</th>
                                <th scope="col">Vers dans cette prose</th>
                                <th scope="col">Date de création</th>
                                <th scope="col">Status</th>
                                <th scope="col">Selectionnez</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proses as $prose)
                                <tr>
                                    <th scope="row"><span class="btn" style="background:{{$prose->theme->color}}; color: white;">{{$prose->id}}</span></th>
                                    <td><span class="btn">{{$prose->title}}</span></td>
                                    <td>{{$prose->theme->name}}</td>
                                    <td>{{$prose->verse->count()}}</td>
                                    <td>{{$prose->created_at->toDayDateTimeString()}}</td>
                                    <td>{{$prose->is_projectable ? 'activée' : 'désactivée' }}</td>
                                    <td><input type="checkbox" name="{{$prose}}" id="prose-{{$prose->id}}"></td>
                                    <td><a href="{{ route('admin.themes.proses.verses.index', [ $prose->theme, $prose]) }}" class="btn btn-primary"  style="background:{{$prose->theme->color}}; border: none;">Voir les vers </a></td>
                                </tr>   
                            @endforeach
                        </tbody>
                    </table>
                    <a class="btn btn-dark" href="#" role="button">Désactivez la selection</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
  