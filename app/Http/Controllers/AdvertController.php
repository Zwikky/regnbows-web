<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Place;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function createAdvert(Request $request){

        $advert = new Advert();
        $owner = Auth::user()->id;

        if($request->file()) {
            $fileName = time().'_'.$request->imageUrl->getClientOriginalName();
            $filePath = $request->file('imageUrl')->storeAs('uploads/places/adverts', $fileName, 'public');


        $advert->title = $request->title;
        $advert->start_date = $request->start_date;
        $advert->end_date = $request->end_date;
        $advert->status = "0";
        $advert->owner = $owner;
        $advert->place = $request->place;
        $advert->imageUrl = '/storage/' . $filePath;

        $advert->save();

        // return back()
        //     ->with('success', 'Advert Created Succefully');
        return redirect('/advert/mail');
        } else {
            return back()
            ->with('fail', 'Error Uploading File, Try Again')
            ->withInput();
        }


    }

    public function userAdverts(){
        $user = Auth::user()->id;

        $adverts = Advert::where('owner', '=', $user)->get();
        $companies = Place::where('owner', '=', $user)->get();

        return view('adverts', [
            'adverts' => $adverts,
            'companies' => $companies
        ]);
    }
}