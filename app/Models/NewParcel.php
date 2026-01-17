<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewParcel extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_name',
        'sender_phone',
        'sender_email',
        'recipient_details',
        'recipient_address',
        'booking_no',
        'reference_no',
        'shipping_received_date',
        'tracking_no',
        'tracking_site',
        'tracking_url',
        'in_transit_date',
        'transit_city',
        'delivery_date',
    ];
}
