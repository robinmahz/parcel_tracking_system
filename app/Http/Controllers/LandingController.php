<?php

namespace App\Http\Controllers;

use App\Mail\Feedback;
use App\Models\NewParcel;
use App\Models\Parcel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LandingController extends Controller
{
    public function track(Request $request)
    {
        $parcel = NewParcel::where(function ($query) use ($request) {
            $query->where('reference_no', $request->number)
                ->orWhere('booking_no', $request->number);
        })
            ->when($request->name, function ($q) use ($request) {
                $q->where('recipient_details', 'LIKE', $request->name . '%');
            })
            ->first();

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
