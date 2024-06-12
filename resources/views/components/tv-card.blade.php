<a href="{{ route('tv.show', $tvShow['id']) }}">
    <img src="https://image.tmdb.org/t/p/w200/{{ $tvShow['poster_path'] }}" alt="">
</a>
<div class="mt-2">
<a href="{{ route('tv.show', $tvShow['id']) }}">{{ $tvShow['name'] }}</a>
<div class="d-flex align-items-center text-light">
    <span><svg id="stars" style="display: none;" version="1.1">

        <symbol id="stars-full-star" viewBox="0 0 102 18" fill="#D3A81E">
            <path d="M9.5 14.25l-5.584 2.936 1.066-6.218L.465 6.564l6.243-.907L9.5 0l2.792 5.657 6.243.907-4.517 4.404 1.066 6.218" />
        </symbol>
        
        </svg>
    </span>
    <span class="mx-1">{{ $tvShow['vote_average'] * 10 . '%' }}</span>
    <span class="me-2">|</span>
    <span>{{ Carbon\Carbon::parse($tvShow['first_air_date'])->format('M d, Y') }}</span>
</div>
<div class="text-light">
    @foreach($tvShow['genre_ids'] as $genre)
        {{ $genres->get($genre) }} @if(!$loop->last), @endif
    @endforeach
</div>
</div>