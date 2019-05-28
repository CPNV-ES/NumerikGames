{{--
-- Show
-- Layout for admin.verses show page
--
-- @author Nicolas Henry
--}}
@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Prose : {{$prose->title}}</h2>
                    @if ($verse->word_flag)
                        <span class="badge badge-danger">Ce vers contient un mot suspect.</span>
                    @elseif (!$verse->word_flag && $verse->prose->is_projectable)
                        <span class="badge badge-success">Ce vers est publié.</span>
                    @else
                        <span class="badge badge-primary">Ce vers sera publié si la prose est pleine.</span>
                    @endif
                </div>
            </div>{{-- .row --}}
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Content</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$verse->id}}</td>
                                <td>{{$verse->content}}</td>
                                <td>{{$verse->status}}</td>
                                <td>
                                    <div class="btn-group btn-group-toggle">
                                        <a class="btn btn-danger disabled" href="" role="button">Désactiver</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>{{-- .col-md-12 --}}
            </div>{{-- .row --}}
        </div>{{-- .container --}}
    </div>{{-- .flex-center position-ref --}}

@endsection
