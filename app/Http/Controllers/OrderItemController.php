<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

/**
 * Class OrderItemController
 * @package App\Http\Controllers
 */
class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderItems = OrderItem::paginate();

        return view('order-item.index', compact('orderItems'))
            ->with('i', (request()->input('page', 1) - 1) * $orderItems->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orderItem = new OrderItem();
        return view('order-item.create', compact('orderItem'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(OrderItem::$rules);

        $orderItem = OrderItem::create($request->all());

        return redirect()->route('order-items.index')
            ->with('success', 'OrderItem created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderItem = OrderItem::find($id);

        return view('order-item.show', compact('orderItem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orderItem = OrderItem::find($id);

        return view('order-item.edit', compact('orderItem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  OrderItem $orderItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderItem $orderItem)
    {
        request()->validate(OrderItem::$rules);

        $orderItem->update($request->all());

        return redirect()->route('order-items.index')
            ->with('success', 'OrderItem updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $orderItem = OrderItem::find($id)->delete();

        return redirect()->route('order-items.index')
            ->with('success', 'OrderItem deleted successfully');
    }
}
