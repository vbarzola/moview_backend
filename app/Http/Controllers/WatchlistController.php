<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Movie;
use App\Models\Watchlist;
use Illuminate\Http\Request;


class WatchlistController extends Controller
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
    public function store($id_movie)
    {
        $id_user = auth()->user()->id;
        $watchlist = Watchlist::create([
            'id_user' => $id_user,
            'id_movie' => $id_movie,
        ]);
        return $watchlist;
    }

    public function getWatchlistOfUser()
    {
        $id_user = auth()->user()->id;
        $result = collect(Watchlist::join('movies', 'watchlists.id_movie', '=', 'movies.id')
            ->where('watchlists.id_user', $id_user)
            ->select('movies.id', 'movies.image_cover')
            ->get());
        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Watchlist  $watchlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Watchlist $watchlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Watchlist  $watchlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Watchlist $watchlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Watchlist  $watchlist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_movie){
        $id_user = auth()->user()->id;
        return Watchlist::where('id_user', $id_user)->where('id_movie', $id_movie)->delete();
    }
}
