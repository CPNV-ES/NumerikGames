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
                                    <td>
                                        <form id="update-proses-form-{{$prose->id}}"
                                            action="{{ route('admin.themes.proses.update', ['theme' => $prose->theme, 'prose' => $prose]) }}"
                                            method="POST" style="display: none;">
                                            {{ method_field('PUT') }}
                                            {{ csrf_field() }}
                                            <input class="form-control" type="number" id="is_projectable" name="is_projectable" value="{{$prose->is_projectable ? 0 : 1 }}">
                                        </form>
                                        <button onclick="event.preventDefault();
                                            document.getElementById('update-proses-form-{{$prose->id}}').submit();"
                                            class="btn btn-{{$prose->is_projectable ? 'danger' : 'success' }}">
                                            {{$prose->is_projectable ? 'Ne plus projeter' : 'Valider pour projeter' }}
                                        </button>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.themes.proses.verses.index', [ $prose->theme, $prose]) }}"
                                            class="btn btn-primary"
                                            style="background:{{$prose->theme->color}}; border: none;">
                                            Voir les vers
                                            @if ($prose->verse->where('word_flag', 1)->count() >= 1)
                                                <span class="badge badge-danger">{{$prose->verse->where('word_flag', 1)->count()}} vers douteux</span>
                                            @endif
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <form id="reset-proses" action="{{ route('admin.proses.reset')}}"method="POST">
                        
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="Reset"></input>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
