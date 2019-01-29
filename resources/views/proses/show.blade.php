@extends('layouts.app')
@section('content')
    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="title m-b-md">
                Last 2 Verses of a specific prose
            </div>

            <div><p style="padding-top:50px">
                @foreach ($verses as $key => $verse)

                    {{$verse}}<br>
                @endforeach
                <form method="post" action={{ route('verses.store') }}>
                    @csrf
                    <input type="text" name="verse" id="verse">
                    <input type="submit" name="addVerse" id="addVerse">
                    <input type="hidden" name="proseId" id="proseId" value="{{$proseId}}">
                </form>
                </p>
            </div>
        </div>
    </div>
@endsection
