<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
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
    $movies = Movie::select('id', 'name', 'type', 'year', 'duration', 'image_cover', 'producer', 'avg_score')->with(['categories:id'])->get();
    $movies_to_return = [];
    foreach ($movies as $movie) {
      $id_categories = $movie->categories->pluck('id');
      $movie = $movie->toArray();
      $movie['categories'] =  $id_categories;
      $movies_to_return[] = $movie;
    }
    return $movies_to_return;
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
    foreach ($request->input('platforms') as $platform) {
      $link = $platform['link'];
      $id = $platform['id'];
      $movie->platforms()->attach($id, ['link' => $link]);
    }
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
    $movie = Movie::with(['categories', 'platforms:logo'])->findOrFail($id);
    $name_categories = $movie->categories->pluck('name');
    $platforms = [];
    foreach ($movie->platforms as $platform) {
      $logo = $platform->logo;
      $link = $platform->pivot->link;
      $platforms[] = ['logo' => $logo, 'link' => $link];
    }
    $movie = $movie->toArray();
    $movie['categories'] =  $name_categories;
    $movie['platforms'] =  $platforms;
    return $movie;
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Movie  $movie
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    return Movie::findOrFail($id)->update($request->all());
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
