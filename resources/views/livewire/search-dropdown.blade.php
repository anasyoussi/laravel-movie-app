<div class="relative">
    <input wire:model.debounce.500ms="search" type="text" class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 
    focus:border-blue-500 " placeholder="Search">
    <div class="absolute top-0">
        <!-- Search icon SVG Here -->
        <!-- class="fill-current text-gray-500 w-4 mt-2 ml-2" -->
    </div>
    <div wire:loading class="spinner"></div>
    @if(strlen($search) >= 2)
    <div class="absolute bg-gray-800 rounded w-64 mt-4">
        <ul>
           @if ($searchResults->count() > 0)
                @foreach ($searchResults as $result)
                        <li class="border-b border-gray-700 flex">
                            <img src="https://image.tmdb.org/t/p/original/{{$result['poster_path']}}" alt="" class="w-10">
                            <a href="{{ url('/movie/'. $result['id']) }}" class="block hover:bg-gray-700 px-3 py-3 basis-full">{{ $result['title'] }}</a>
                        </li> 
                @endforeach 
            @else
                        <div class="px-3 py-3">No Results for "{{ $search }}"</div>
           @endif
        </ul>
    </div>
    @endif
</div> 