<?php

namespace App\Http\Controllers;

use App\Models\BusDetail;
use App\Models\Trip;
use App\Models\Location;
use App\Models\SeatQuality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class tripController extends Controller {
	public function view() {
		$trip = Trip::get(); 
		return view( 'admin.trip', ['trips' => $trip] );
	}
	public function addview() {
		$location = BusDetail::select('from_location','to_location')->get();
		return view( 'admin.addTrip', [ 'locations' => $location ] );
	}
	public function addtrip( Request $request ) {
		$date          = $request->trip_date;
		$from_location = $request->from_location;
		$to_location   = $request->to_location;
		if ( $date ) {
			$trip                = new Trip;
			$trip->trip_date     = $date;
			$trip->from_location = $from_location;
			$trip->to_location   = $to_location;
			$trip->save();
		}
		return Redirect::route( 'trip' );
	}
    public function delete( Request $request ) {
		$id = $request->delete;
		Trip::where( 'id', $id )->delete();
		return Redirect::route( 'trip' );
	}
}
