<div>
    <input type="text" wire:model.live.debounce.500ms="search" placeholder="Search" class="rounded-5 px-3 bg-dark focus-ring" style="border: none;">
    @if(strlen($search) > 2)
        <div class="mt-3 text-sm rounded bg-dark" style="position: absolute; width: 205px;">
            @if($searchResults->count()>0)
                <ul class="list-group">
                    @foreach($searchResults as $result)
                        <li class="list-group-item bg-dark" style="border-color: gray;">
                            <a href="{{ route('movies.show', $result['id']) }}" class="block d-flex gap-2">
                                @if($result['poster_path'])
                                    <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster" style="width: 30px;">
                                @endif
                               
                                <span>{{ $result['title'] }}</span> 
                                

                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="px-3 py-3 text-white">No results for "{{ $search }}"</div>
            @endif
        </div>
    @endif
    
</div>
 
