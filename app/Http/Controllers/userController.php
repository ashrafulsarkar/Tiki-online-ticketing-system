<?php

namespace App\Http\Controllers;

use App\Models\SeatAllocation;
use App\Models\SeatBooked;
use App\Models\Trip;
use App\Models\Location;
use App\Models\BusDetail;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class userController extends Controller {
	public function view() {
		$location = Location::get();
		return view( 'frontend.home', [ 'locations' => $location ] );
	}
	public function ticketShow( Request $request ) {
		$location = Location::get();
		$date     = $request->date;
		if ( $date ) {
			$trip = Trip::with( 'seatallocations' )->where( 'trip_date', $date )->get();
			if ( count( $trip ) > 0 ) {
				$from_location = $request->from_city;
				$to_location   = $request->to_city;
				$bus_details   = BusDetail::with( 'bus' )->where( 'from_location', $from_location )->where( 'to_location', $to_location )->get();
				return view( 'frontend.ticket', [ 'bus_details' => $bus_details, 'locations' => $location, 'trips' => $trip ] );
			} else {
				return view( 'frontend.ticket', [ 'bus_details' => [], 'locations' => $location ] );
			}
		}
		return view( 'frontend.ticket', [ 'bus_details' => [], 'locations' => $location ] );
	}
	public function ticketUserDetails( Request $request ) {
		$data = [ 
			'trip_id'       => $request->trip_id,
			'bus_name'      => $request->bus_name,
			'from_location' => $request->from_location,
			'to_location'   => $request->to_location,
			'seat_quality'  => $request->seat_quality,
			'price'         => $request->price,
			'seat'          => $request->seat,
		];
		return view( 'frontend.ticketuser', [ 'ticket_data' => $data ] );
	}
	public function ticketConfirm( Request $request ) {
		$seat_quantity = $request->seat_quantity;
		$price         = $request->price;
		$seat          = $request->seat;
		$email         = $request->email;

		$userFound = UserDetail::select( 'id' )->where( 'email', $email )->get();
		
		if ( ! count($userFound) ) {
			$userDetails = [ 
				'name'         => $request->name,
				'email'        => $email,
				'phone_number' => $request->phone,
			];

			$userCreate = UserDetail::create( $userDetails );
			$userID     = $userCreate->id;
		}else {
			$userID    = $userFound[0]->id;
		}

		if ( $userID ) {
			$booked       = [ 
				'user_id'       => $userID,
				'trip_id'       => $request->trip_id,
				'price'         => $price,
				'seat_quantity' => $seat_quantity,
				'total_price'   => $price * $seat_quantity,
			];
			$bookedCreate = SeatBooked::create( $booked );

			if ( $bookedCreate->id ) {
				for ( $i = 0; $i < count( $seat ); $i++ ) {
					$seatallocation = [ 
						'seat_booked_id' => $bookedCreate->id,
						'trip_id'        => $request->trip_id,
						'seat_number'    => $seat[ $i ],
					];
					SeatAllocation::create( $seatallocation );
				}
			}
		}
		return view( 'frontend.thankyou' );
	}
}