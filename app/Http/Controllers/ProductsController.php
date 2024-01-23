<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $products = [["nombre" =>"Tv","descripcion"=>"Es una tele","imagen"=>"/img/game.png","precio"=>"500$"],
        ["nombre" =>"Caja Fuerte","descripcion"=>"Guarda tus cosas","imagen"=>"/img/safe.png","precio"=>"300$"],
        ["nombre" =>"Submarino","descripcion"=>"YELLOW SUBMARIN","imagen"=>"/img/submarine.png","precio"=>"30.000$"]];
    
    public function index(){
        $viewData = [];
        $viewData["title"] ="Productos";
        $viewData["subtitle"] = "Listado productos";
        $viewData["products"] = $this->products;
        return view("home.products")->with("viewData", $viewData);
    }

    public function show($id){
        $viewData = [];
        $viewData["title"] ="Producto ".$id;    
        $viewData["subtitle"] = "Mostrando producto ".$id;
        $viewData["product"] = $this->products[$id];
        return view("home.product")->with("viewData", $viewData);
    }
}
