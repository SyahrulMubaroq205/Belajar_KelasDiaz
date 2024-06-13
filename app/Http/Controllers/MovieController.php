<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $movies = Movie::get();


        return view('movies.index', [
        'movies' => $movies,
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'desc' => ['required', 'string'],
            'image' => ['required', 'image'],
        ]);

        $data['image'] = $request->file('image')->store('movies');

        Movie::create($data);

        return redirect()->route('movies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        return view('movies.show', [
            'movie' => $movie
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit', [
            'movie' => $movie
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'desc' => ['required', 'string'],
            'image' => ['image'],
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($movie->image);
            $data['image'] = $request->file('image')->store('movies');
        }else {
            $data['image'] = $movie->image;
        }

        $movie->update($data);

        return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        Storage::delete($movie->image);

        $movie->delete();

        return redirect()->route('movies.index');
    }
}
