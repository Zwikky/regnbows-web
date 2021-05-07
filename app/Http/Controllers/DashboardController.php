<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function adminIndex(){

        $get_new_adverts = Advert::where("created_at", "<", Carbon::now()->subDays(2))->get();


        $category = Category::all();
        $places  = Place::all();

        return view('dashboard', [
            'categories' => $category,
            'places' => $places,
            'get_adverts' => $get_new_adverts
        ]);
    }

    public function userIndex(){
        $user = Auth::user()->id;

        $get_new_adverts = Advert::where("created_at", ">", Carbon::now()->subDays(2))->get();
        // $get_new_adverts = Advert::where("owner", "=", $user)->get();



        $category = Category::all();
        $places  = Place::where('owner', '=', $user)->get();

        return view('dashboard', [
            'categories' => $category,
            'places' => $places,
            'get_adverts' => $get_new_adverts
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }


    public function listUsers(){
        $users = User::all();

        return view('users', [
            'users' => $users
        ]);
    }

}