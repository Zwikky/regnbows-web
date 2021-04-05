<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    public function index(){
        $adverts = Advert::all();
        return response()->json($adverts);
    }
    public function list(){
        $adverts = Advert::all();

        return view('adverts', [
            'adverts' => $adverts
        ]);
    }
}