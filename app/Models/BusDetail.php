<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusDetail extends Model
{
    use HasFactory;
    protected $hidden = [
        'bus_id',
        'created_at',
        'updated_at',
    ];
    public function bus() {
        return $this->belongsTo(Bus::class);
    }
}
