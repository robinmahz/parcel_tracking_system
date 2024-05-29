<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParcelDetail extends Model
{
    use HasFactory;

    protected $fillable = ['location', 'remarks', 'date', 'parcel_id'];

    public function parcel()
    {
        return $this->hasOne(Parcel::class);
    }
}
