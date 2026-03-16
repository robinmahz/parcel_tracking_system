<?php

namespace App\Http\Controllers;

use App\Mail\SendMailNotification;
use App\Models\NewParcel;
use Illuminate\Http\Request;
use Mail;

class NewParcelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parcels = NewParcel::query();
        if (request()->has('search')) {
            $search = request()->input('search');
            $parcels->where(function ($query) use ($search) {
                $query->where('sender_name', 'like', "%{$search}%")
                    ->orWhere('recipient_details', 'like', "%{$search}%")
                    ->orWhere('tracking_no', 'like', "%{$search}%")
                    ->orWhere('sender_phone', 'like', "%{$search}%")
                    ->orWhere('booking_no', 'like', "%{$search}%");
            });
        } else {
            if (request()->has('type')) {
                $status = request()->input('type');
                if ($status === 'in_transit') {
                    $parcels->whereNotNull('tracking_no')->whereNull('delivery_date');
                } elseif ($status === 'delivered') {
                    $parcels->whereNotNull('delivery_date');
                } elseif ($status === 'received') {
                    $parcels->whereNotNull('shipping_received_date')->whereNull('tracking_no');
                }
            } else {
                $parcels->whereNotNull('shipping_received_date')->whereNull('tracking_no');
            }
        }
        $parcels = $parcels->orderBy('created_at', 'desc')->get();
        return view('dashboard', compact('parcels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('newParcel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        NewParcel::create($request->all());
        return redirect()->route('dashboard')->with('success', 'New parcel created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(NewParcel $newParcel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewParcel $newParcel)
    {
        return view('newParcel.edit', compact('newParcel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewParcel $newParcel)
    {
        $text = 'Receiver: ' . $newParcel->recipient_details . 'Country: ' . $newParcel->recipient_address . ' Tracking No: ' . $request->input('tracking_no') . '. Tracking Site: ' . $request->tracking_site . ' Tracking url: ' . $request->input('tracking_url') . ' - Direct Way Cargo';
        if (!$newParcel->tracking_no && $request->input('tracking_no')) {
            if ($newParcel->sender_phone) {
                $args = http_build_query(array(
                    'auth_token' => config('services.sms.secret'),
                    'from' => '31001',
                    'to' => $newParcel->sender_phone,
                    'text' => $text,
                ));
                # Make the call using API.
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, config('services.sms.url'));
                curl_setopt($ch, CURLOPT_POST, 1); ///
                curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                // Response
                $response = curl_exec($ch);
                curl_close($ch);
            }
        }

        if (!$newParcel->tracking_no && $request->input('tracking_no')) {
            if ($newParcel->sender_email) {
                $emailData = [
                    'tracking_no' => $request->input('tracking_no'),
                    'tracking_site' => $request->tracking_site,
                    'tracking_url' => $request->input('tracking_url'),
                    'sender_name' => $newParcel->sender_name,
                    'recipient_details' => $newParcel->recipient_details,
                ];
                Mail::to($newParcel->sender_email)->queue(new SendMailNotification($emailData));
            }
        }

        $newParcel->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Parcel updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewParcel $newParcel)
    {
        $newParcel->delete();
        return redirect()->route('dashboard')->with('success', 'Parcel deleted successfully.');
    }
}
