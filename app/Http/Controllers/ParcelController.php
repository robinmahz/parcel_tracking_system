<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use App\Models\ParcelDetail;
use Illuminate\Http\Request;

class ParcelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parcels = Parcel::all();
        return view('dashboard', compact('parcels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('parcel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Parcel::create($request->all());
        return redirect('/parcelDetails/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Parcel $parcel)
    {
        $parcelDetails = ParcelDetail::where('parcel_id', $parcel->id)->get();
        return view('parcelDetails.index', compact('parcelDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parcel $parcel)
    {
        return view('parcel.edit', compact('parcel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parcel $parcel)
    {
        $parcel->update($request->all());
        return redirect('/parcel');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parcel $parcel)
    {
        $parcel->delete();
        return redirect('/parcel');
    }
}
