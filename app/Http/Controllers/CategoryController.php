<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function show($id){
        $category = Category::findOrFail($id);

        return response()->json($category);
    }

    public function getCategories(){
        $categories = Category::all();

        return view('categories', [
            'categories'=> $categories 
        ]);
    }

    public function addCategory(Request $request){
        $category = new Category();

        if($request->file()) {
            $fileName = time().'_'.$request->imageUrl->getClientOriginalName();
            $filePath = $request->file('imageUrl')->storeAs('uploads/categories', $fileName, 'public');

            $web = env('APP_URL');    
        $category->name = $request->name;
        $category->imageUrl = $web.'/storage/' . $filePath;;
        $category->bgColor = $request->bgColor;
        $category->order = $request->order;

        $category->save();

        return back()
            ->with('success', 'Category Created Succefully');
        }
    }
}