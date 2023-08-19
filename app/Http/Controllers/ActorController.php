<?php

namespace App\Http\Controllers;
use DB;

use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actors = DB::table('actors')
            ->orderBy('first_name')
            ->get();

        return view('actors.index', ['actors' => $actors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('actors.add');
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'years' => 'required|integer',
        ]);

        DB::table('actors')->insert([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'years' => $request->years,
            'description' => $request->description,
        ]);

        return redirect()->route('actors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;

        $actors = DB::table('actors')
            ->where('id', $id)
            ->get();

        return view('actors.edit', ['actors' => $actors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'years' => 'required|integer',
        ]);

        $update_query = DB::table('actors')
            ->where('id', $id)
            ->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'years' => $request->years,
                'description' => $request->description,
            ]);

        return redirect()->route('actors');
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

        Actor::destroy($id);

        return redirect()->route('actors');
    }

    public function file_add(Request $request)
    {
        $id = $request->id;

        $actors = Actor::find($id);

        return view('actors.file_add', [
            'id' => $id,
            'actors' => $actors
        ]);
    }

    public function process(Request $request)
    {
        $id = $request->id;

        $actors = Actor::find($id);

        $folder_to_save = Str::replace(' ', '_', $actors->first_name);

        $file = $request->file('file');

        $filename = $actors->id . time() . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs($folder_to_save, $filename);

        return redirect()->route('actors');
    }
}
