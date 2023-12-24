<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\BusDetail;
use App\Models\Location;
use App\Models\SeatQuality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class busController extends Controller {
	public function view() {
		$bus = Bus::get();
		return view( 'admin.bus', [ 'buses' => $bus ] );
	}
	public function addview() {
		return view( 'admin.addBus' );
	}
	public function addbus( Request $request ) {
		$bus_name   = $request->name;
		$bus_number = $request->number;
		$total_seat = $request->total_seat;
		if ( $bus_name ) {
			$bus             = new Bus;
			$bus->name       = $bus_name;
			$bus->number     = $bus_number;
			$bus->total_seat = $total_seat;
			$bus->save();
		}
		return Redirect::route( 'bus' );
	}
	public function idview( $id ) {
		$bus      = Bus::with('busDetails')->where('id', $id)->get();
		$location = Location::get();
		$quality  = SeatQuality::get();

		return view( 'admin.busidview', [ 'busid'=>$id,'buses' => $bus, 'locations' => $location, 'qualities' => $quality ]);
	}
    public function addbusdetails(Request $request){
        $busid = $request->bus_id;
        $from_location = $request->from_location;
        $to_location = $request->to_location;
        $seat_quality = $request->seat_quality;
        $seat_quantity = $request->seat_quantity;
        $price = $request->price;
        if($busid){
            $busdetails             = new BusDetail;
			$busdetails->bus_id       = $busid;
			$busdetails->from_location     = $from_location;
			$busdetails->to_location = $to_location;
			$busdetails->seat_quality = $seat_quality;
			$busdetails->seat_quantity = $seat_quantity;
			$busdetails->price = $price;
			$busdetails->save();
        }
        return Redirect::route( "bus.details", ['id' => $busid] );
    }
	public function detailsDelete( Request $request ) {
		$busid = $request->busid;
		$id = $request->delete;
		BusDetail::where( 'id', $id )->delete();
		return Redirect::route( "bus.details", ['id' => $busid] );
	}
	public function edit( $id ) {
		$busdata = Bus::where( 'id', $id )->get();
		return view('admin.editBus', ['buses' => $busdata, 'busid' => $id]);
	}
	public function editdb( Request $request ) {
		$busid   = $request->id;
		$bus = Bus::find($busid);
		if ($bus) {
			$bus->name   = $request->name;
			$bus->number = $request->number;
			$bus->total_seat = $request->total_seat;
			$bus->save();
		}
		return Redirect::route( 'bus' );
	}
}