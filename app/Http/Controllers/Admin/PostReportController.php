<?php

namespace App\Http\Controllers\Admin;

use App\Models\PostReport;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductReports;

class PostReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postReports = ProductReports::with('product_listing','product_listing.product','user','report_type')->get();
        // dd($postReports);
        return Inertia::render('ProductReport', compact('postReports'));
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
     * @param  \App\Models\PostReport  $postReport
     * @return \Illuminate\Http\Response
     */
    public function show(PostReport $postReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostReport  $postReport
     * @return \Illuminate\Http\Response
     */
    public function edit(PostReport $postReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostReport  $postReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostReport $postReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostReport  $postReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostReport $postReport)
    {
        //
    }
}
