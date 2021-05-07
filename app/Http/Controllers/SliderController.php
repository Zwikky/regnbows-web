<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function userSlider(){
        $user = Auth::user()->id;

        $sliders = Slider::where('owner', '=', $user)->get();
        $companies = Place::where('owner', '=', $user)->get();

        return view('sliders', [
            'sliders' => $sliders,
            'companies' => $companies
        ]);
    }

    public function userAddSlider(Request $request){
        $slider = new Slider();

        $owner = Auth::user()->id;

        
        if($request->file()) {
            $sliderName = time().'_'.$request->imageUrl->getClientOriginalName();           
            $sliderPath = $request->file('imageUrl')->storeAs('uploads/places/sliders', $sliderName, 'public');


            $slider->title = $request->title;
            $slider->company = $request->company;
            $slider->duration = $request->duration;
            $slider->owner = $owner;
            $slider->imageUrl = '/storage/' . $sliderPath;
            $slider->status = 1;

            $slider->save();

            return back()
                ->with('success', 'Slider Created Succefully');
        } else {
            return back()
                ->with('fail', 'Error Creating Slider, Try Again')
                ->withInput();
        }

    }


    
}