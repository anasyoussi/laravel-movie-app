@extends('layouts.main') 
@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movie">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-somibold">Popular Movies</h2>
            <div class="grid grid-cold-1 sm:grid-cold-2 md:grid-cols-3 lg:grid-cols-5 gap-8"> 
                @foreach ($popularMovies as $movie)
                    <x-movie-card :movie="$movie" :genres="$genres"/>
                @endforeach
            </div>
        </div>
        <!-- End Popular movies -->
        <div class="playing-movie">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-somibold mt-11">Playing Movies</h2>
            <div class="grid grid-cold-1 sm:grid-cold-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($playingMovies as $movie)
                    <x-movie-card :movie="$movie" :genres="$genres"/>
                @endforeach
            </div>
        </div>
        <!-- End of playing movies -->
    </div>
@endsection