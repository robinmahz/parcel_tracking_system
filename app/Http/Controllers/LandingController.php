<?php

namespace App\Http\Controllers;

use App\Mail\Feedback;
use App\Models\Parcel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LandingController extends Controller
{
    public function track(Request $request)
    {
        $parcelDetails = 0;
        $parcel = Parcel::with('parcelDetails')->where('number', $request->number)->where('name', $request->name)->first();
        return view('show', compact('parcel'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parcels = Parcel::all();
        return view('welcome', compact('parcels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Mail::to("directwaycargooffice@gmail.com")->queue(new Feedback($request->all()));
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
