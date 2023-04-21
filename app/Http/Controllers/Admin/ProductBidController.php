<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductBid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductList;
use Inertia\Inertia;
class ProductBidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productBids = ProductBid::with('users','products')->get();
      
        return Inertia::render('ProductBid', compact('productBids')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductBid  $productBid
     * @return \Illuminate\Http\Response
     */
    public function show(ProductBid $productBid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductBid  $productBid
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductBid $productBid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductBid  $productBid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductBid $productBid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductBid  $productBid
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductBid $productBid)
    {
        //
    }
}
