@extends('layouts.app')

    

@section('content')
    <div class="container mt-4">
        <div class="row mb-5">
            <div class="col">
                <div class="flex-none">
                    <img src="{{ 'https://image.tmdb.org/t/p/w300/'.$movie['poster_path'] }}" alt="">
                </div>
                
            </div>
            <div class="col-8">
                <h2 class="text-white">{{ $movie['title'] }}</h2>
                <div>
                    <span class="ml-1 text-white">{{ $movie['vote_average'] }}</span>
                    <span class="mx-2 text-white">|</span>
                    <span class="text-white">{{ $movie['release_date'] }}</span>
                    <span class="mx-2 text-white">|</span>
                    
                    <span class="text-white">
                        @foreach($movie['genres'] as $genre)
                            {{ $genre['name'] }} @if(!$loop->last), @endif
                        @endforeach
                    </span>
                </div>
                <p class="text-white mt-5">
                    {{ $movie['overview'] }}
                </p>

                <div class="mt-5">
                    <h4 class="text-white text-sm font-semibold">Featured Crew</h4>
                    <div class="d-flex mt-2 gap-3">
                        @foreach($movie['credits']['crew'] as $crew)
                            @if($loop->index < 2)
                                <div class="mt-3">
                                    <div class="text-white">{{ $crew['name'] }}</div>
                                    <div class="text-sm" style="color: gray;">{{ $crew['job'] }}</div>
                                </div>
                            @else
                                @break
                            @endif
                        @endforeach
                       
                    </div>
                </div>

                @if(count($movie['videos']['results']) > 0)
                    <div class="mt-5">
                        <a href="https://youtube.com/watch?v={{ $movie['videos']['results'][0]['key'] }}" class="btn text-white font-semibold" style="background-color: orangered;">
                            Play Trailer
                        </a>
                    </div>
                @endif

                
            </div>
        </div>

        <div class="movie-cast mt-5">
            <h2 class="text-white">Cast</h2>
            <div class="row mt-3">
                @foreach($movie['credits']['cast'] as $cast)
                    @if($loop->index < 5)
                        <div class="col">
                            <a href="{{ route('actors.show', $cast['id']) }}">
                                <img src="{{ 'https://image.tmdb.org/t/p/w200/'.$cast['profile_path'] }}" alt="">
                            </a>
                            <div class="mt-2">
                                <a href="{{ route('actors.show', $cast['id']) }}"> {{ $cast['name'] }} </a>
                                <div class="text-sm" style="color: gray;">
                                    {{ $cast['character'] }}
                                </div>
                            </div>
                        </div>
                    @else
                        @break
                    @endif
                @endforeach
                
            </div>
        </div>


        <div class="movie-images mt-5">
            <h2 class="text-white">Images</h2>
            <div class="row mt-3">
                @foreach($movie['images']['backdrops'] as $image)
                    @if($loop->index < 15)
                        <div class="col mt-4">
                            <a href="">
                                <img src="{{ 'https://image.tmdb.org/t/p/w200/'.$image['file_path'] }}" alt="">
                            </a>
                            <!-- <div class="mt-2">
                                <a href=""> {{ $cast['name'] }} </a>
                                <div class="text-sm" style="color: gray;">
                                    {{ $cast['character'] }}
                                </div>
                            </div> -->
                        </div>
                    @endif
                @endforeach
                
            </div>
        </div>

    </div>
        
               
@endsection
