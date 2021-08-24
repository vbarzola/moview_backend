<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
    $movies = Movie::all();
    return $movies;
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $movie = Movie::create($request->all());
    $movie->categories()->attach($request->input('categories'));
    $movie->platforms()->attach($request->input('platforms'));
    return $movie;
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Movie  $movie
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $movie = Movie::with(['categories', 'platforms'])->findOrFail($id);
    $name_categories = $movie->categories->pluck('name', 'id', 'icon');
    $movie = $movie->toArray();
    $movie['categories'] =  $name_categories;
    return $movie;
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Movie  $movie
   * @return \Illuminate\Http\Response
   */
  public function edit(Movie $movie)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Movie  $movie
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Movie $movie)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Movie  $movie
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    return Movie::destroy($id);
  }
}
