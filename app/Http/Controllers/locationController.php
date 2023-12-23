<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class locationController extends Controller {
	public function view() {
		$location = Location::get();
		return view( 'admin.location', [ 'locations' => $location ] );
	}
	public function addview() {
		return view( 'admin.addLocation' );
	}
	public function addlocation( Request $request ) {
		$location_name = $request->location;
		if ( $location_name ) {
			$location           = new Location;
			$location->location = $location_name;
			$location->save();
		}
		return Redirect::route( 'location' );
	}
	public function delete( Request $request ) {
		$id = $request->delete;
		Location::where( 'id', $id )->delete();
		return Redirect::route( 'location' );
	}
}