<?php

namespace App\Http\Controllers;

use App\Mail\NewSliderEmail;
use App\Models\Place;
use App\Models\Slider;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Swift_TransportException;

class SliderController extends Controller
{

    public function index(){
        $sliders = Slider::all();
        return response()->json($sliders);
    }

    public function list(){
        //  = Slider::all();

        $companies = Place::all();
        $sliders = Slider::join('places', 'places.id', '=', 'sliders.company')
                                ->get();

        return view('sliders', [
            'sliders' => $sliders,
            'companies' => $companies
        ]);
    }

    public function userSlider(){
        $user = Auth::user()->id;

        
        $sliders = Slider::join('places', 'places.id', '=', 'sliders.company')->where('sliders.owner', '=', $user)->get();

        $companies = Place::where('owner', '=', $user)->get();

        return view('users.sliders', [
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

            $web = env('APP_URL');


            $slider->title = $request->title;
            $slider->company = $request->company;
            $slider->duration = $request->duration;
            $slider->owner = $owner;
            $slider->imageUrl = $web.'/storage/' . $sliderPath;
            $slider->status = 1;

            $data = [
                'slider' => $request->title,
                'owner' =>  Auth::user()->name
            ];

                    
            try{
                Mail::to('zwikky@gmail.com')->send(new NewSliderEmail($data));


                
            $slider->save();
                return back()
                    ->with('success', 'Slider Created Succefully, Waiting for Approval');
            
            } catch(Swift_TransportException $e) {
                // echo $e->getMessage();
                return back()
                ->with('fail', 'Error Creating Slider, Try Again')
                ->withInput();
            }


        } else {
            return back()
                ->with('fail', 'Error Creating Slider, Try Again')
                ->withInput();
        }

    }


    
}