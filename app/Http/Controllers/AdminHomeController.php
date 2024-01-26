<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index(){
        $viewData = [];
        $viewData["title"]="Panel de control";
        $viewData["footer"]="Pie Panel Control";
        return view("admin.index")->with("viewData", $viewData);
    }
}
