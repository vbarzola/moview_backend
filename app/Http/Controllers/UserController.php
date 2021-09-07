<?php

namespace App\Http\Controllers;

use Kutia\Larafirebase\Facades\Larafirebase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return User::all();
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
    $encrypted =  crypt::encryptString($request->input('password'));
    $request->merge(['password' => $encrypted]);
    $user = User::create($request->all());
    return $user;
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function show(int $id)
  {
    $user = User::find($id);
    return collect($user->toArray())
      ->only(['username', 'name', 'image'])
      ->all();
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function edit(User $user)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, int $id)
  {
    return User::find($id)->update($request->all());
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function destroy(int $id)
  {
    return User::destroy($id);
  }

  public function followingUser($id_user)
  {
    $user = (object) auth()->user();
    $following = $user->following()->where('follows_user', $id_user)->first();
    return ['following' => !!$following];
  }

  public function followUser($follows_user)
  {
    $user = (object) auth()->user();
    $user->following()->attach($follows_user);
    $device_id = User::find($follows_user)->id_device;
    NotificationController::sendNotificationNewFollower($user, $device_id);
    return [
      "message" => "Ha empezado a seguir a este usuario."
    ];
  }

  public function unfollowUser($follows_user)
  {
    $user = (object) auth()->user();
    $user->following()->detach($follows_user);
    return [
      "message" => "Ha dejado de seguir a este usuario."
    ];
  }
}
