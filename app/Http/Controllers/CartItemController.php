<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

/**
 * Class CartItemController
 * @package App\Http\Controllers
 */
class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems = CartItem::paginate();

        return view('cart-item.index', compact('cartItems'))
            ->with('i', (request()->input('page', 1) - 1) * $cartItems->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cartItem = new CartItem();
        return view('cart-item.create', compact('cartItem'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CartItem::$rules);

        $cartItem = CartItem::create($request->all());

        return redirect()->route('cart-items.index')
            ->with('success', 'CartItem created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cartItem = CartItem::find($id);

        return view('cart-item.show', compact('cartItem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cartItem = CartItem::find($id);

        return view('cart-item.edit', compact('cartItem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CartItem $cartItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartItem $cartItem)
    {
        request()->validate(CartItem::$rules);

        $cartItem->update($request->all());

        return redirect()->route('cart-items.index')
            ->with('success', 'CartItem updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cartItem = CartItem::find($id)->delete();

        return redirect()->back()
            ->with('success', 'Produk berhasil dihapus!');
    }
}
