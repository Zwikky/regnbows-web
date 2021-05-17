<?php

namespace App\Http\Controllers;

use App\Mail\NewBusinessEmail;
use App\Models\Category;
use App\Models\Place;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Swift_TransportException;

class PlaceController extends Controller
{
    public function adminIndex(){
        $categories = Category::all();
        $places = Place::all();

        return view('places', [
            'categories' => $categories,
            'places' => $places,
        ]);
    }

    public function userIndex(){

        $user = Auth::user()->id;

        $category = Category::all();
        $places  = Place::where('owner', '=', $user)->get();

        return view('places', [
            'categories' => $category,
            'places' => $places
        ]);
        
    }

    
    public function addPlace(Request $request){
        $place = new Place();

        $owner = Auth::user()->id;

        
        if($request->file()) {
            $logoFileName = time().'_'.$request->logo->getClientOriginalName();
            $image1FileName = time().'_'.$request->image1->getClientOriginalName();
            $image2FileName = time().'_'.$request->image2->getClientOriginalName();
            $image3FileName = time().'_'.$request->image3->getClientOriginalName();
            $logoPath = $request->file('logo')->storeAs('uploads/places/logos', $logoFileName, 'public');
            $image1FilePath = $request->file('image1')->storeAs('uploads/places/images', $image1FileName, 'public');
            $image2FilePath = $request->file('image2')->storeAs('uploads/places/images', $image2FileName, 'public');
            $image3FilePath = $request->file('image3')->storeAs('uploads/places/images', $image3FileName, 'public');


            $place->name = $request->name;
            $place->address = $request->address;
            $place->details = $request->details;
            $place->category = $request->category;
            $place->owner = $owner;
            $place->logoUrl = '/storage/' . $logoPath;
            $place->image1Url = '/storage/' . $image1FilePath;
            $place->image2Url = '/storage/' . $image2FilePath;
            $place->image3Url = '/storage/' . $image3FilePath;
            $place->email = $request->email;
            $place->website = $request->website;
            $place->tin_number = $request->tin_number;
            $place->longitude = $request->longitude;
            $place->latitude = $request->latitude;
            $place->status = 1;

            $place->save();

            $data = [
                'business' => $request->name,
                'owner' =>  Auth::user()->name
            ];

                    
            try{
                Mail::to('zwikky@gmail.com')->send(new NewBusinessEmail($data));

                return back()
                    ->with('success', 'Business Created Succefully');
            
            } catch(Swift_TransportException $e) {
                echo $e->getMessage();
            }

            
        }

    }

    public function userAddPlace(Request $request){
        $place = new Place();

        $owner = Auth::user()->id;

        
        if($request->file()) {
            $logoFileName = time().'_'.$request->logo->getClientOriginalName();
            $image1FileName = time().'_'.$request->image1->getClientOriginalName();
            $image2FileName = time().'_'.$request->image2->getClientOriginalName();
            $image3FileName = time().'_'.$request->image3->getClientOriginalName();
            $logoPath = $request->file('logo')->storeAs('uploads/places/logos', $logoFileName, 'public');
            $image1FilePath = $request->file('image1')->storeAs('uploads/places/images', $image1FileName, 'public');
            $image2FilePath = $request->file('image2')->storeAs('uploads/places/images', $image2FileName, 'public');
            $image3FilePath = $request->file('image3')->storeAs('uploads/places/images', $image3FileName, 'public');


            $place->name = $request->name;
            $place->address = $request->address;
            $place->details = $request->details;
            $place->category = $request->category;
            $place->owner = $owner;
            $place->logoUrl = '/storage/' . $logoPath;
            $place->image1Url = '/storage/' . $image1FilePath;
            $place->image2Url = '/storage/' . $image2FilePath;
            $place->image3Url = '/storage/' . $image3FilePath;
            $place->email = $request->email;
            $place->website = $request->website;
            $place->tin_number = $request->tin_number;
            $place->longitude = $request->longitude;
            $place->latitude = $request->latitude;
            $place->status = 1;

            $place->save();

            $data = [
                'business' => $request->name,
                'owner' =>  Auth::user()->name
            ];

                    
            try{
                Mail::to('zwikky@gmail.com')->send(new NewBusinessEmail($data));

                return back()
                    ->with('success', 'Business Created Succefully');
            
            } catch(Swift_TransportException $e) {
                echo $e->getMessage();
            }

            
        }

    }

    public function approvePlace($id){
        $place  = Place::find($id);

        $place->status = "1";
        $place->save();

        return back()
            ->with('success','Business Approved Successfully.');
        
    }

    public function viewPlace($id){
        $place = Place::findOrFail($id);
        
        return view('place', [
            'place' => $place
        ]);
    }

    public function userViewPlace($id){
        $user = Auth::user()->id;
        $place = Place::where('id', '=', $id & 'owner', '=', $user);
        
        return view('user-place', [
            'place' => $place
        ]);
    }

    public function placesByCategory($id){
        $places = Place::where('category', $id)->get();

        return response()->json($places);
    }
}