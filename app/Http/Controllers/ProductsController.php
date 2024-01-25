<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index(){
        $products = Product::all();
        $viewData = [];
        $viewData["title"] ="Productos";
        $viewData["subtitle"] = "Listado productos";
        $viewData["products"] = $products;
        return view("home.products")->with("viewData", $viewData);
    }

    public function show($id){
        $product = Product::find($id);
        $viewData = [];
        $viewData["title"] ="Producto ".$id;    
        $viewData["subtitle"] = "Mostrando producto ".$id;
        $viewData["product"] = $product;
        return view("home.product")->with("viewData", $viewData);
    }
}
