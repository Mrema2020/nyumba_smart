<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertiesCategory;
use App\Models\Properties;

class PropertiesController extends Controller
{
    //
    public function all_properties(){

    }

    public function property_categories(){
        $categories = PropertiesCategory::all();
        return view('miscellaneous.properties_categories', compact('categories'));
    }

    public function add_category(Request $request){
        $category = new PropertiesCategory;
        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();

        return redirect()->back();
    }
}
