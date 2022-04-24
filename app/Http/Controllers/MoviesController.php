<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $popularMovies = Http::withToken(config('services.tmdb.token'))
        //                         ->get('https://api.themoviedb.org/3/movie/popular')
        //                         ->json(); 

        $popularMovies = Http::get('https://api.themoviedb.org/3/movie/popular?api_key='.config('services.tmdb.token'))
                                ->json()['results'];

        $playingMovies = Http::get('https://api.themoviedb.org/3/movie/now_playing?api_key='.config('services.tmdb.token'))
                                ->json()['results'];

        $genresArray = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key='.config('services.tmdb.token').'&language=en-US')
        ->json()['genres'];

        $genres = collect($genresArray)->mapWithKeys(function ($genre){
            return [$genre['id'] => $genre['name']];
        });
        
                        
        // dump($genres);
        return view('index', [
            'popularMovies' => $popularMovies,
            'genres'        => $genres,
            'playingMovies' => $playingMovies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Http::get('https://api.themoviedb.org/3/movie/'.$id.'?api_key='.config('services.tmdb.token').'&append_to_response=credits')
                         ->json();

        $videos = Http::get('https://api.themoviedb.org/3/movie/'.$id.'?api_key='.config('services.tmdb.token').'&append_to_response=videos')
                    ->json()['videos']['results'];
        
        
        $trailer = collect($videos)->filter(function($val){
            return $val['type'] === 'Trailer';
        })->first()['key']; 

        // dd($trailer);
        return view('show', [
            'movie' => $movie, 
            'trailer' => $trailer,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
