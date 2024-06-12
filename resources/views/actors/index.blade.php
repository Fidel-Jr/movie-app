@extends('layouts.app')

@section('content')

    <div class="container mt-4">
        <h5 style="color: orangered;">Popular Actors</h5>
        <div class="row">
           @foreach($popularActors as $actor)
                
                <div class="col mt-4">
                    <a href="{{ route('actors.show', $actor['id']) }}">
                        <img src="https://image.tmdb.org/t/p/w200/{{ $actor['profile_path'] }}" alt="">
                    </a>
                    <div class="mt-2">
                        <a href="{{ route('actors.show', $actor['id']) }}" class="text-lg">
                           {{ $actor['name'] }}
                        </a>
                        <div class="text-sm text-truncate" style="max-width: 200px;">
                            @foreach($actor['known_for'] as $movie) 
                                @if(isset($movie['title'])) 
                                    {{ $movie['title'] }}
                                    @if(!$loop->last), @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

        <div class="d-flex justify-content-center mt-5">

            <nav aria-label="Page navigation example">
                <p class="">{{ $popularActors->links() }}</p>   
            
                <!-- <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link text-dark" href="" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link text-dark" href="#">1</a></li>
                    <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
                    <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
                    <li class="page-item">
                    <a class="page-link text-dark" href="" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                    </li>
                </ul> -->
            </nav>
        </div>
        
    </div>



@endsection
