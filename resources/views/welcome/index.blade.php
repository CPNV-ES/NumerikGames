@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Bienvenue au Kadaversky's bot</h1>
                    <hr class="my-4">
                    <p class="lead">Ecrivons ensemble des poèmes - ou des textes libres - sur la thématique « <span class="font-weight-bold">Moi, un robot ?</span> » </p>
                    <p class="lead">Ce soir, les productions seront projetées, accompagnées d'une performance musicale sur le thème du... robot.</p>
                    <a class="btn btn-primary mt-5" href="{{ route('choice') }}" role="button">Je participe</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
