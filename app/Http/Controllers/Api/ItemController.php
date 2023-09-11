<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::latest()->paginate(config('pagination.default'));
        return apiResponse('success', $items);
    } // end of index

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Item::find($id);
        if (!$item) return apiResponse('fail', null, 404, 'Item not found');
        return apiResponse('success', $item);
    } // end of show

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|unique:items',
            'price' => 'required|numeric',
            'seller' => 'required|string',
        ];
        $validator = apiValidateRequest($request->all(), $rules);
        if ($validator) return $validator;
        $item = Item::create($request->all());
        return apiResponse('success', $item, 201);
    } // end of store

    /**
     * return the monthly items total price and the average price.
     */
    public function statistics()
    {
        $monthly_items_total_price = Item::whereMonth('created_at', date('m'))->sum('price');
        $average_price = Item::avg('price');

        $statistics = [
            'monthly_items_total_price' => $monthly_items_total_price,
            'average_price' => $average_price,
        ];
        return apiResponse('success', $statistics);
    } // end of statistics
}
