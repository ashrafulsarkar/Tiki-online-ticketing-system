<?php

namespace App\Http\Controllers;

use App\Models\SeatQuality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class seatQualityController extends Controller
{
    public function view() {
		$quality = SeatQuality::get();
		return view( 'admin.quality', [ 'qualities' => $quality ] );
	}
	public function addview() {
		return view( 'admin.addQuality' );
	}
	public function addquality( Request $request ) {
		$quality_name = $request->quality;
		if ( $quality_name ) {
			$quality           = new SeatQuality;
			$quality->quality = $quality_name;
			$quality->save();
		}
		return Redirect::route( 'quality' );
	}
	public function delete( Request $request ) {
		$id = $request->delete;
		SeatQuality::where( 'id', $id )->delete();
		return Redirect::route( 'quality' );
	}
}
