<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use App\Models\ParcelDetail;
use Illuminate\Http\Request;

class ParcelDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parcels = Parcel::all();
        return view('parcelDetails.create', compact('parcels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ParcelDetail::create($request->all());
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(ParcelDetail $parcelDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ParcelDetail $parcelDetail)
    {
        $parcels = Parcel::all();
        return view('parcelDetails.edit', compact(['parcelDetail', 'parcels']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ParcelDetail $parcelDetail)
    {
        $parcelDetail->update($request->all());
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParcelDetail $parcelDetail)
    {
        $parcelDetail->delete();
        return redirect('/parcel');
    }
}
