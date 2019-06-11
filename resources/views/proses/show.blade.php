{{--
  -- Show
  -- Layout for proses show page
  --
  -- @author Nicolas Henry
  --}}
@extends('layouts.app')
@section('content')
    <!-- Error -->
    <div id="error">
	    <strong></strong>
    </div>
    <div id="prose-id">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">{{$prose->theme->name}}</h1>
                    <img class="mx-auto d-block"  src="{{ asset($prose->theme->path) }}"/>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @foreach ($versesLast as $key => $verse)
                        <div class="d-inline-block col-1 font-italic"><span id="verseActive">{{$key+1}}</span> / <span id="lastCountVerse">{{$versesCount}}</span> </div>
                        <div class="d-inline-block col-10 text-center font-weight-bold"><h3>{{$verse->content}}</h3></div>
                        <hr>
                    @endforeach
                    <div class="form-group">
                        <div class="mx-auto d-none pb-3" id="count-syllable">Nombre de syllabes : <span></span></div>
                        <input class="form-control form-control-lg" name="content" id="verse" type="text" autofocus placeholder="Une souris verte..." autocomplete="off">
                    </div>
                    <div>
                        <button class="btn btn-outline-success mx-auto d-block pl-5 pr-5" type="submit" name="addVerse" id="addVerse">Ajouter mon texte</button>
                    </div>

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <p> Activer le compteur de syllabes ?</p>
                </div>
                <div class="col-md-6">
                    <div id="switch-container">
                        <div id="switch-selector"></div>
                        <span class="sw-active sw-deactivated sw">Oui</span>
                        <span class="sw-inactive sw">Non</span>
                    </div>
                    <input id="sw-check" type="checkbox" />
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header modal-header-centered">
            <h5 class="modal-title" id="exampleModalLongTitle">Est-ce que ce vers vous convient ?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Annuler">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @foreach ($versesLast as $verse)
                <p class="text-center">{{$verse->content}}</p>
            @endforeach

        <form method="POST" action="{{ route('verses.store', ['prose_id' => $prose ]) }}">
            @csrf
            <p class="text-center font-weight-bold" name="content" id="modalVerse" type="text"></p>
            <input class="form-control form-control-lg" name="content" id="verseModal" type="hidden">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary" name="continue" value="continue" id="continue">Enregistrer et continuer</button>
            <button type="submit" class="btn btn-primary" name="save" value="save">Enregistrer et revenir à l'accueil</button>
        </form>
        </div>
        </div>
    </div>
    </div>

@endsection
