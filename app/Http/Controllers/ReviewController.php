<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function list(){
        $reviews = Review::all();

        return view('reviews', [
            'reviews' => $reviews
        ]);
    }


    public function userReviews(){
        $user = Auth::user()->id;
        $reviews = Review::join('places', 'reviews.company', '=', 'places.id')->join('users', 'places.owner', '=', $user)->get();

        return view('reviews', [
            'reviews' => $reviews
        ]);
    }
}