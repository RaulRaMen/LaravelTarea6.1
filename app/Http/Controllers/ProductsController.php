<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $products = [["nombre" =>"Tv","descripcion"=>"Es una tele","imagen"=>"/img/game.png","precio"=>"500$"],
    ["nombre" =>"Caja Fuerte","descripcion"=>"Guarda tus cosas","imagen"=>"/img/safe.png","precio"=>"300$"],
    ["nombre" =>"Submarino","descripcion"=>"YELLOW SUBMARIN","imagen"=>"/img/submarine.png","precio"=>"30.000$"]];
    
    public function index(){
        return view("home.products")->with("products", $this->products);
    }
}
