<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\FollowingUser;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Review::all();
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
        $today = Carbon::now();
        $data = $request->all();
        $score = $data['score'];
        $data["date"] = $today->format("d/m/Y");
        $movie = Movie::findOrFail($data["id_movie"]);
        $review = Review::create($data);
        $rating_numbers = $movie->rating_numbers;
        $avg_score = $movie->avg_score;
        $new_avg = ($rating_numbers * $avg_score + $score) / ($rating_numbers + 1);
        $movie->avg_score = $new_avg;
        $movie->rating_numbers = $rating_numbers + 1;
        $movie->save();
        return $review;
    }

    public function getReviewstOfUser($id_user)
    {
        $result = collect(Review::join('movies', 'reviews.id_movie', '=', 'movies.id')
            ->join('users', 'reviews.id_user', 'users.id')
            ->select(
                'users.name as name_user',
                'users.image as image_user',
                'movies.id as id_movie',
                'movies.name as name_movie',
                'reviews.score',
                'reviews.date',
                'reviews.comment'
            )
            ->where('id_user', $id_user)
            ->get());
        return $result;
    }

    public function getReviewsofFollowing()
    {
        $user = (object) auth()->user();
        return $user->following()->select('id', 'username', 'name')
            ->join('reviews', 'reviews.id_user', '=', 'id')
            ->join('movies', 'movies.id', '=', 'reviews.id_movie')
            ->select(
                'users.id as id_user',
                'users.name as name_user',
                'users.image as image_user',
                'movies.id as id_movie',
                'movies.name as name_movie',
                'reviews.score',
                'reviews.date',
                'reviews.comment'
            )
            ->get();
    }

    public function getReviewsOfMovie($id_movie)
    {
        return Review::join('movies', 'movies.id', '=', 'reviews.id_movie')
            ->join('users', 'reviews.id_user', 'users.id')
            ->where('movies.id', $id_movie)
            ->select(
                'users.name as name_user',
                'users.image as image_user',
                'reviews.score',
                'reviews.date',
                'reviews.comment'
            )->get();;
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id_user, int $id_movie)
    {
        return Review::where(
            ['id_user', '=', $id_user],
            ['id_movie', '=', $id_movie],
        )->delete();
    }
}
