<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'number'];

    public function parcelDetails()
    {
        return $this->hasMany(ParcelDetail::class);
    }
}
