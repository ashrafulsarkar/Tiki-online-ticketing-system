<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatBooked extends Model {
	use HasFactory;
	protected $fillable = [ 'user_id', 'trip_id', 'price', 'seat_quantity', 'total_price' ];
}
