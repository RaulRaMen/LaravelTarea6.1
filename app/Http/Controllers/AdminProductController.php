<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Products - Online Store";
        $viewData["products"] = Product::all();
        return view('admin.products')->with("viewData", $viewData);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required'
        ]);

        if($validated){
            $name = $request -> input('name');
            $price = $request -> input('price');
            $description = $request -> input('description');
            
            if($request->hasFile('image')){
                $uuid = Str::uuid()->toString();
                $fileName= $uuid.".".($request -> file('image')->getClientOriginalExtension());
                Storage::disk('public')->put(  
                    $fileName,
                    file_get_contents($request->file('image')->getRealPath())  
                );
            }else{
                $fileName='notYet.jpg';
            }
            
            Product::create(['nombre' => $name,'precio' => $price,'descripcion' => $description,'imagen' => $fileName]);
            $viewData = [];
            $viewData["title"] = "Admin Page - Products - Online Store";
            $viewData["products"] = Product::all();
            return view('admin.products')->with("viewData", $viewData);

        }else{
            $viewData = [];
            $viewData["title"] = "Admin Page - Products - Online Store";
            $viewData["products"] = Product::all();
            return view('admin.products')->with("viewData", $viewData);
        }
    }
}
