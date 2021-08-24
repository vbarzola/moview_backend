<?php

namespace App\Http\Controllers;

use App\Models\FollowingUser;
use Illuminate\Http\Request;

class FollowingUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $relation = FollowingUser::create($request->all());
        return $relation;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FollowingUser  $followingUser
     * @return \Illuminate\Http\Response
     */
    public function show(FollowingUser $followingUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FollowingUser  $followingUser
     * @return \Illuminate\Http\Response
     */
    public function edit(FollowingUser $followingUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FollowingUser  $followingUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FollowingUser $followingUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FollowingUser  $followingUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(FollowingUser $followingUser)
    {
        //
    }
}
