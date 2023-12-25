<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatAllocation extends Model {
	use HasFactory;
	protected $fillable = [ 'seat_booked_id', 'trip_id', 'seat_number' ];
	protected $hidden = [
        'id',
        'seat_booked_id',
        'trip_id',
        'created_at',
        'updated_at',
    ];
	public function trip() {
        return $this->belongsTo(Trip::class);
    }
}
