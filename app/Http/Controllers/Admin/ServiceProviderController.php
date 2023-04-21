<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SaasAgency;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Inertia\Inertia;
use LDAP\Result;
use League\Glide\Server;

class ServiceProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceProvider = SaasAgency::all();
        return Inertia::render('ServiceProvider', compact('serviceProvider')); //
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

        $serviceProvider = new SaasAgency();
        $serviceProvider->name =  $request->name;
        $serviceProvider->expertise = $request->area_of_expertise;
        $serviceProvider->contact_email = $request->contact_email;
        $serviceProvider->contact_number = $request->number;
        $serviceProvider->notes = $request->notes;
        $serviceProvider->website = $request->website;
        $serviceProvider->save();
        // dd($serviceProvider);
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceProvider $serviceProvider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceProvider $serviceProvider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $serviceProvider = SaasAgency::find($id);
        $serviceProvider->name =  $request->name;
        $serviceProvider->expertise = $request->area_of_expertise;
        $serviceProvider->contact_email = $request->contact_email;
        $serviceProvider->contact_number = $request->contact_number;
        $serviceProvider->notes = $request->notes;
        $serviceProvider->website = $request->website;
        $serviceProvider->save();
        // dd($serviceProvider);
        return redirect()->back();
      
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $product = SaasAgency::destroy($id);

      return redirect()->route('service.provider.index');
    }
}
