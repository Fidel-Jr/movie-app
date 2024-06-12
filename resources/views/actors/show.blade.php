@extends('layouts.app')

    

@section('content')
    <div class="container mt-4">
        <div class="row mb-5">
            <div class="col">
                <div class="flex-none">
                    <img src="{{ 'https://image.tmdb.org/t/p/w300/'.$actor['profile_path'] }}" alt="">
                    <ul class="d-flex gap-2">
                        <li class="nav-link">
                            @if(isset($social['facebook_id']))
                                <a href="{{ $social['facebook_id'] }}" title="Facebook"><i class="fa-brands fa-facebook"></i></a>
                            @endif
                        </li>
                        <li class="nav-link">
                            @if(isset($social['instagram_id']))
                                <a href="{{ $social['instagram_id'] }}" title="Ingstagram"><i class="fa-brands fa-instagram"></i></a>
                            @endif
                        </li>
                        <li class="nav-link">
                            @if(isset($social['twitter_id']))
                                <a href="{{ $social['twitter_id'] }}" title="Twitter"><i class="fa-brands fa-twitter"></i></a>
                            @endif
                        </li>
                    </ul>
                </div>
                
            </div>
            <div class="col-8">
                <h2 class="text-white">{{ $actor['name'] }}</h2>
                <div>
                    <span class="ml-1 text-white">{{ Carbon\Carbon::parse($actor['birthday'])->format('M d, Y') }} ({{ Carbon\Carbon::parse($actor['birthday'])->age}} years old) {{ $actor['place_of_birth'] }} </span>
                </div>
                <p class="text-white mt-4">
                    {{ $actor['biography'] }}
                </p>

                <div class="row mt-4">
                    <h4 class="text-white">Known For</h4>
                    @foreach($filteredKnownFor as $credit)
                        <div class="col">
                            @if($credit['media_type'] == 'movie')
                           <a href="{{ route('movies.show', $credit['id']) }}">
                                <img src="{{ 'https://image.tmdb.org/t/p/w92/'.$credit['poster_path'] }}" alt="">
                           </a>
                           @else
                            <a href="{{ route('tv.show', $credit['id']) }}">
                                    <img src="{{ 'https://image.tmdb.org/t/p/w92/'.$credit['poster_path'] }}" alt="">
                            </a>
                           @endif
                            <div class="text-white">
                                @if(isset($credit['title']))
                                    {{ $credit['title'] }}
                                @else
                                    {{ $credit['name'] }}
                                @endif
                            </div>
                            
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>

        <div class="credits mt-5">
            <h2 class="text-white">Credits</h2>
            <ul>
                @foreach($filteredCredits as $credit)
                    @if(isset($credit['title']) && isset($credit['character']))
                        <li class="text-white">
                            {{ Carbon\Carbon::parse($credit['release_date'])->format('Y') }} - <strong>{{ $credit['title'] }}</strong> as {{ $credit['character'] }}
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>

    </div>
        
               
@endsection
