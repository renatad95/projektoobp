<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // UPIT 1: Ispis glumca koji je glumio u najviše filmova.
        $actor_with_most_movies = DB::table('actors')
            ->select('actors.id', 'actors.first_name', 'actors.last_name', DB::raw('count(*) as brojac'))
            ->groupBy('actors.id', 'actors.first_name', 'actors.last_name')
            ->join('movies', 'actors.id', '=', 'movies.actor')
            ->orderByRaw('COUNT(*) DESC')
            ->get();

        // UPIT 2: Ispis najstarijeg glumca koji je glumio u filmu.
        $oldest_actors = DB::table('actors')
            ->select('actors.years', DB::raw('count(*) as brojac'))
            ->groupBy('actors.id', 'actors.years')
            ->join('movies', 'actors.id', '=', 'movies.actor')
            ->orderByRaw('COUNT(*) DESC')
            ->get();

        // UPIT 3: Ispis termina u kojem se može pogledati najviše filmova.
        $period_with_most_movies = DB::table('movie_periods')
            ->select('movie_periods.*', DB::raw('count(*) as brojac'))
            ->groupBy('movie_periods.id', 'movie_periods.period')
            ->join('movies', 'movie_periods.id', '=', 'movies.movie_period')
            ->orderByRaw('COUNT(*) DESC')
            ->get();

        // UPIT 4: Ispis žanra od kojeg je najviše filmova u kinu.
        $genre_with_most_movies = DB::table('genres')
            ->select('genres.name', DB::raw('count(*) as brojac'))
            ->groupBy('genres.id', 'genres.name')
            ->join('movies', 'genres.id', '=', 'movies.genre')
            ->orderByRaw('COUNT(*) DESC')
            ->get();

        // UPIT 5: Ispis žanra filma u kojem je glumio glumac Donald Walker Dickens.
        $genre_with_specific_actor = DB::table('genres')
            ->select('genres.*')
            ->groupBy('genres.id', 'genres.name', 'genres.description', 'genres.created_at', 'genres.updated_at')
            ->join('movies', 'genres.id', '=', 'movies.genre')
            ->join('actors', 'movies.actor', '=', 'actors.id')
            ->where('actors.first_name', 'Donald Walker')
            ->where('actors.last_name', 'Dickens')
            ->orderByRaw('COUNT(*) DESC')
            ->get();

        return view('dashboard', [
            'actor_with_most_movies' => $actor_with_most_movies,
            'oldest_actors' => $oldest_actors,
            'period_with_most_movies' => $period_with_most_movies,
            'genre_with_most_movies' => $genre_with_most_movies,
            'genre_with_specific_actor' => $genre_with_specific_actor
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
        //
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

