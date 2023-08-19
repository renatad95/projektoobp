<?php

namespace App\Http\Controllers;
use DB;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = DB::table('movies')->get();

        return view('movies.index', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actors = DB::table('actors')->get();
        $movie_periods = DB::table('movie_periods')->get();
        $genres = DB::table('genres')->get();

        return view('movies.add', [
            'actors' => $actors,
            'movie_periods' => $movie_periods,
            'genres' => $genres
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DB::table('movies')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'grade' => $request->grade,
            'actor' => $request->actor,
            'genre' => $request->genre,
            'movie_period' => $request->movie_period,
        ]);

        return redirect()->route('movies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function show(Workout $workout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;

        $movies = DB::table('movies')
            ->where('id', $id)
            ->get();

        $actors = DB::table('actors')->get();
        $movie_periods = DB::table('movie_periods')->get();
        $genres = DB::table('genres')->get();

        return view('movies.edit', [
            'movies' => $movies,
            'actors' => $actors,
            'movie_periods' => $movie_periods,
            'genres' => $genres
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Workout  $workout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $update_query = DB::table('movies')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'grade' => $request->grade,
                'actor' => $request->actor,
                'genre' => $request->genre,
                'movie_period' => $request->movie_period,
            ]);

        return redirect()->route('movies');
    }

    /**
     * Remove the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id = $request->id;

        Movie::destroy($id);

        return redirect()->route('movies');
    }
}
