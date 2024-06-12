@extends('layouts.app')

@section('content')

    <div class="container mt-4">
        <h5 style="color: orangered;">Popular Movies</h5>
        <div class="row">
            @foreach($popularMovies as $movie)
                <div class="col mt-4">
                    <x-movie-card :movie="$movie" :genres="$genres"/>
                </div>
            @endforeach

        <div class="container mt-4">
        <h5 style="color: orangered;">Now Playing Movies</h5>
        <div class="row">
           
            @foreach($nowPlayingMovies as $movie)
                <div class="col mt-4">
                    <x-movie-card :movie="$movie" :genres="$genres"/>
                </div>
            @endforeach

            
        </div>
    </div>



@endsection
