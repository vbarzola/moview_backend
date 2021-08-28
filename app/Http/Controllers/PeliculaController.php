<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return Pelicula::all();
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
    return Pelicula::create($request->all());
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Pelicula  $pelicula
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    return Pelicula::findOrFail($id);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Pelicula  $pelicula
   * @return \Illuminate\Http\Response
   */
  public function edit(Pelicula $pelicula)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Pelicula  $pelicula
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    return Pelicula::findOrFail($id)->update($request->all());
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Pelicula  $pelicula
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    return Pelicula::destroy($id);
  }
}
