@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Bienvenue au Kadaversky's bot</h1>
                    <hr class="my-4">
                    <p class="lead">Le jeu se déroule de la manière suivate : </p>
                    <ol>
                        <li>Choisissez votre thème</li>
                        <li>Ajoutez votre texte aux autres</li>
                        <li>Validez votre choix</li>
                        <li>Retrouvez vos créations à 17h au stand du Centre Professionnel du Nord Vaudois</li>
                    </ol>
                    <a class="btn btn-primary" href="{{ route('choice') }}" role="button">J'ai compris</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    