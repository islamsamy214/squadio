<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::latest()->paginate(config('pagination.default'));
        return view('items.index', compact('items'));
    } // end of index

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    } // end of create

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        try {
            Item::create($request->validated());
        } catch (\Exception $e) {
            return redirect()->route('items.index')->with('error', 'Item created failed.');
        }
        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    } // end of store

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    } // end of edit

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        try {
            $item->update($request->validated());
        } catch (\Exception $e) {
            return redirect()->route('items.index')->with('error', 'Item updated failed.');
        }
        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    } // end of update

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        try {
            $item->delete();
        } catch (\Exception $e) {
            return redirect()->route('items.index')->with('error', 'Item deleted failed.');
        }
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    } // end of destroy
}
