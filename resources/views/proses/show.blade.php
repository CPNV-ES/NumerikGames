{{--
  -- Show
  -- Layout for proses show page
  --
  -- @author Nicolas Henry
  --}}
@extends('layouts.app')
@section('content')
    <div id="prose-id">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @if (session('status'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="col-md-12">
                    <h1 class="text-center">Rajoutez une prose</h1>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @foreach ($versesLast as $verse)
                        <div>
                            <p class="text-center">{{$verse->content}}</p>
                        </div>
                    @endforeach
                    <form method="post" action={{ route('verses.store') }}>
                        @csrf

                        <div class="form-group">
                            <input class="form-control form-control-lg" name="content" id="verse" type="text" placeholder="Une souris verte...">
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="prose_id" id="prose_id" value="{{$prose->id}}">
                        </div>

                        <div>
                            <button class="btn btn-outline-success btn-lg btn-block" type="submit" name="addVerse" id="addVerse">Ajouter mon texte</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
