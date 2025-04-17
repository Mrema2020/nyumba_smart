<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertiesCategory;
use App\Models\PropertiesTypes;
use App\Models\Properties;
use App\Models\Region;

class PropertiesController extends Controller
{
    //
    public function all_properties() {
        $categories = PropertiesCategory::all();
        $types = PropertiesTypes::all();
        $properties = Properties::all();
        return view('properties.all_properties', compact('categories', 'types', 'properties'));
    }

    public function property_categories()
    {
        $categories = PropertiesCategory::all();
        return view('miscellaneous.properties_categories', compact('categories'));
    }

    public function add_category(Request $request)
    {
        $category = new PropertiesCategory;
        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();

        return redirect()->back()->with('message', 'Property category added successfully');
    }

    public function edit_property(Request $request)
    {
        $single_property = PropertiesCategory::find($request->id);
        $single_property->title = $request->title;
        $single_property->description = $request->description;
        $single_property->save();

        return redirect()->back()->with('message', 'Property category edited successfully');
    }

    public function delete_property_category($id)
    {
        $single_property = PropertiesCategory::find($id);
        $single_property->delete();

        return redirect()->back()->with('message', 'Property category deleted successfully');
    }

    public function view_property_type()
    {
        $propertyType =  PropertiesTypes::all();
        return view('miscellaneous.property_type', compact('propertyType'));
    }

    public function add_category_type(Request $request)
    {
        $category_type = new PropertiesTypes();
        $category_type->title = $request->title;
        $category_type->description = $request->description;
        $category_type->save();

        return redirect()->back()->with('message', 'Property type added successfully');
    }

    public function edit_property_type(Request $request)
    {
        $single_property_type = PropertiesTypes::find($request->id);
        $single_property_type->title = $request->title;
        $single_property_type->description = $request->description;
        $single_property_type->save();

        return redirect()->back()->with('message', 'Property type edited successfully');
    }

    public function delete_property_type($id)
    {
        $single_property_type = PropertiesTypes::find($id);
        $single_property_type->delete();

        return redirect()->back()->with('message', 'Property type deleted successfully');
    }

    public function add_property(Request $request){
        $property = new properties();
        $property->title = $request->title;
        $property->description = $request->description;
        $property->price = $request->price;
        $property->type = $request->type;
        $property->category = $request->category;

        $image=$request->image;
        $imageName=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('properties', $imageName);
        $property->image = $imageName;

        $property->save();

        return redirect()->back()->with('message', 'Property successfully Added');
    }

    public function regions(){
        $regions = region::all();
        return view('miscellaneous.region', compact('regions'));
    }
}
