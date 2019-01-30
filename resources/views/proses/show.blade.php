{{--
  -- Show
  -- Layout for proses show page
  --
  -- @author Nicolas Henry
  --}}
@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="title m-b-md">
                Last 2 Verses of a specific prose
            </div>

            <div style="padding-top:50px">
                @foreach ($versesLast as $verse)

                    {{$verse->content}}<br>
                @endforeach
                <form method="post" action={{ route('verses.store') }}>
                    @csrf
                    <input type="text" name="content" id="verse">
                    <input type="submit" name="addVerse" id="addVerse">
                    <input type="hidden" name="prose_id" id="prose_id" value="{{$prose->id}}">
                </form>
            </div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>{{$prose->title}}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Vers activés</h3>
        </div>
        <div class="col-md-12">
            <a class="btn btn-success" href="{{ route('verses.create') }}" role="button">Créer</a>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Vers</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                        <th scope="col">Selectionnez</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($verses as $verse)
                    <tr>
                            <th scope="row">{{$verse->id}}</th>
                            <td>{{$verse->content}}</td>
                            <td>{{$verse->status}}</td>
                            <td>
                                <div class="btn-group btn-group-toggle">
                                    <a class="btn btn-primary" href="{{ route('verses.edit', ['verse' => $verse->id]) }}" role="button">Editer</a>
                                    <a class="btn btn-warning" href="{{ route('verses.show', ['verse' => $verse->id]) }}" role="button">Afficher</a>
                                    <a class="btn btn-danger disabled" href="" role="button">Supprimer</a>
                                </div>
                            </td>
                            <td><input type="checkbox" name="{{$verse->id}}" id="verse-{{$verse->id}}"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a class="btn btn-dark" href="#" role="button">Désactivez la selection</a>
        </div>
        <div class="col-md-12">
            <h3>Vers désactivé</h3>
        </div>
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Vers</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                        <th scope="col">Selectionnez</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inactivateVerses as $verse)
                    <tr>
                            <th scope="row">{{$verse->id}}</th>
                            <td>{{$verse->content}}</td>
                            <td>{{$verse->status}}</td>
                            <td>
                                <div class="btn-group btn-group-toggle">
                                    <a class="btn btn-primary" href="{{ route('verses.edit', ['verse' => $verse->id]) }}" role="button">Editer</a>
                                    <a class="btn btn-warning" href="{{ route('verses.show', ['verse' => $verse->id]) }}" role="button">Afficher</a>
                                    <a class="btn btn-danger disabled" href="" role="button">Supprimer</a>
                                </div>
                            </td>
                            <td><input type="checkbox" name="{{$verse->id}}" id="verse-{{$verse->id}}"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a class="btn btn-dark" href="#" role="button">Activez la selection</a>
        </div>
    </div>
</div>
@endsection
