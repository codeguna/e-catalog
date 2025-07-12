<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function home(){
        $product    = Product::orderBy('name','ASC')->get();
        return view('frontend.index',compact('product'));
    }
}
