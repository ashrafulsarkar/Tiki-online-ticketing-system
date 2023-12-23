<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatQuality extends Model
{
    use HasFactory;
    public function busDetails() {
        return $this->hasMany(BusDetail::class);
    }
}
