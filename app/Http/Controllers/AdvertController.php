<?php

namespace App\Http\Controllers;

use App\Mail\NewAdvertEmail;
use App\Models\Advert;
use App\Models\Place;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Swift_TransportException;

class AdvertController extends Controller
{
    public function index(){
        $adverts = Advert::all();
        return response()->json($adverts);
    }
    public function list(){
        $adverts = Advert::all();
        $adverts = Advert::join('places', 'places.id', '=', 'adverts.place')
                                ->get();


        $companies = Place::all();

        return view('adverts', [
            'adverts' => $adverts,
            'companies' => $companies
        ]);
    }

    public function createAdvert(Request $request){

        $advert = new Advert();
        $owner = Auth::user()->id;
        $web = env('APP_URL');


        if($request->file()) {
            $fileName = time().'_'.$request->imageUrl->getClientOriginalName();
            $filePath = $request->file('imageUrl')->storeAs('uploads/places/adverts', $fileName, 'public');


        $advert->title = $request->title;
        $advert->start_date = $request->start_date;
        $advert->end_date = $request->end_date;
        $advert->status = "0";
        $advert->owner = $owner;
        $advert->place = $request->place;
        $advert->imageUrl = $web.'/storage/' . $filePath;

        
        

        
        $data = [
            'advert' => $request->title,
            'owner' =>  Auth::user()->name
        ];

                
        try{
            Mail::to('zwikky@gmail.com')->send(new NewAdvertEmail($data));


            $advert->save();
            return back()
                ->with('success', 'Advert Created Succefully, Waiting for Approval');
        
        } catch(Swift_TransportException $e) {
            // echo $e->getMessage();
            return back()
            ->with('fail', 'Error Creating Advert, Try Again')
            ->withInput();
        }

        
        } else {
            return back()
            ->with('fail', 'Error Uploading Advert, Try Again')
            ->withInput();
        }


    }

    public function userAdverts(){
        $user = Auth::user()->id;

        $adverts = Advert::join('places', 'places.id', '=', 'adverts.place')->where('adverts.owner', '=', $user)->get();
        $companies = Place::where('owner', '=', $user)->get();

        return view('adverts', [
            'adverts' => $adverts,
            'companies' => $companies
        ]);
    }
}