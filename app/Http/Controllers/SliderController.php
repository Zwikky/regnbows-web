<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function index(){
        $sliders = Slider::all();
        return response()->json($sliders);
    }

    public function list(){
        $sliders = Slider::all();

        return view('sliders', [
            'sliders' => $sliders
        ]);
    }

    
}