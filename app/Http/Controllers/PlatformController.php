<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return Platform::all();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    return Platform::create($request->all());
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Platform  $platform
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    return Platform::findOrFail($id);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Platform  $platform
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    return Platform::findOrFail($id)->update($request->all());
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    return Platform::destroy($id);
  }
}
