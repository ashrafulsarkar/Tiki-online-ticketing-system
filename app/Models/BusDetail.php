<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusDetail extends Model
{
    use HasFactory;
    protected $hidden = [
        'id',
        'bus_id',
        'created_at',
        'updated_at',
    ];
    public function bus() {
        return $this->belongsTo(Bus::class);
    }
    // public function location(){
    //     return $this->belongsTo(Location::class);
    // }
    // public function seatQuality(){
    //     return $this->belongsTo(SeatQuality::class);
    // }
}
