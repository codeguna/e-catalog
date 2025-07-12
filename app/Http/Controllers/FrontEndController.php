<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontEndController extends Controller
{
    public function home()
    {
        $product    = Product::orderBy('name', 'ASC')->get();
        return view('frontend.index', compact('product'));
    }

    public function addToCart($id)
    {
        $product  = Product::find($id);

        $myId       = Auth::user()->id;
        $myCart     = CartItem::create(
            [
                'user_id'    =>  $myId,
                'product_id' =>  $product->id,
                'quantity'   =>  1,
                'created_at' => now()
            ]
        );

        return redirect()->route('myCart')->with('success','Produk berhasil ditambahkan');

    }
    public function myCart()
    {
        $myId       = Auth::user()->id;
        $cartList   = CartItem::where('user_id',$myId)->latest()->get();
        return view('frontend.cart', compact('cartList'));
    }
}
