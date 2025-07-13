<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontEndController extends Controller
{
    public function home()
    {
        $product    = Product::orderBy('name', 'ASC')->get();
        return view('frontend.index', compact('product'));
    }
    public function ProductSatuan()
    {
        $product    = Product::where('type', '=', '1')->orderBy('name', 'ASC')->get();
        $name       = 'Satuan';
        return view('frontend.product', compact('product', 'name'));
    }
    public function ProductPaket()
    {
        $product    = Product::where('type', '=', '2')->orderBy('name', 'ASC')->get();
        $name       = 'Paket';
        return view('frontend.product', compact('product', 'name'));
    }
    public function ProductSekolah()
    {
        $product    = Product::where('type', '=', '3')->orderBy('name', 'ASC')->get();
        $name       = 'Sekolah';
        return view('frontend.product', compact('product', 'name'));
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

        return redirect()->route('myCart')->with('success', 'Produk berhasil ditambahkan');
    }
    public function myCart()
    {
        $myId       = Auth::user()->id;
        $cartList   = CartItem::where('user_id', $myId)->latest()->get();
        return view('frontend.cart', compact('cartList'));
    }

    public function proceed(Request $request)
    {
        $data   = $request->all();
        $amount = array_sum($request->price);        
        $today  = Carbon::now()->format('Y-m-d');
        $myId   = Auth::user()->id;

        //Create Order by User
        $order = Order::create([
            'user_id'       => $myId,
            'order_date'    => $today,
            'total_amount'  => $amount,
            'created_at'    => now()
        ]);

        //Create order items
        $product_id = $data["product_id"];
        $quantity   = $data["quantity"];
        $price      = $data["price"];

         if ($product_id) {
            foreach ($product_id  as $key => $value) {
                $orderItems             = new OrderItem();
                $orderItems->order_id   = $order->id;
                $orderItems->product_id = $product_id[$key];
                $orderItems->quantity   = $quantity[$key];
                $orderItems->price      = $price[$key];
                $orderItems->save();
            }
        }

        //Clear all items on cart
         $cartItems = CartItem::where('user_id','=',$myId)->delete();

        return redirect()->route('myorder');
        
    }

    public function myOrder()
    {
        $myId   = Auth::user()->id;
        $orders = Order::where('user_id','=',$myId)->orderBy('order_date','ASC')->get();
        return view('frontend.my-order',compact('orders'))->with('i');
    }
}
