@extends('layouts.app')

@section('content')

    <div class="container mt-4">
        <h5 style="color: orangered;">Popular TV Shows</h5>
        <div class="row">
            @foreach($popularTv as $show)
                <div class="col mt-4">
                    <x-tv-card :tvShow="$show" :genres="$genres"/>
                </div>
            @endforeach

        <div class="container mt-4">
        <h5 style="color: orangered;">Top Rated Shows</h5>
        <div class="row">
           
            @foreach($topRatedTv as $show)
                <div class="col mt-4">
                    <x-tv-card :tvShow="$show" :genres="$genres"/>
                </div>
            @endforeach

            
        </div>
    </div>



@endsection
