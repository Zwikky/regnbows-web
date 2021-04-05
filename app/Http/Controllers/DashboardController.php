<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function adminIndex(){
        $category = Category::all();
        $places  = Place::all();

        return view('dashboard', [
            'categories' => $category,
            'places' => $places
        ]);
    }

    public function userIndex(){
        return view('dashboard');
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