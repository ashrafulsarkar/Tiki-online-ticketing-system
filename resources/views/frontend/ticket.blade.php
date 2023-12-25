@extends('frontend.Layout.app')

@section('frontend')
<div class="mt-20">
    @if(count($bus_details) >0)
    @foreach($trips as $trip)
    <?php
    $bookedSeat = [];
    foreach($trip->seatallocations as $allocation){
        $bookedSeat[] = $allocation->seat_number;
    }
    ?>
    <div>
        @foreach($bus_details as $bus_detail)
        <div class="group block rounded-lg p-6 bg-white ring-1 ring-slate-900/5 shadow-lg space-y-3">
            <div class="flex items-center space-x-3">
                <h3 class="text-slate-900 text-lg font-semibold">{{$bus_detail->bus->name}}
                    ({{$bus_detail->from_location}} - {{$bus_detail->to_location}})</h3>
            </div>
            <p class="text-slate-900 text-base font-semibold">{{$bus_detail->seat_quality}} - ৳{{$bus_detail->price}}
            </p>
            <details class="dark:open:bg-slate-900">
                <summary class="text-sm leading-6 dark:text-white font-semibold">
                    Select Seat Number
                </summary>
                <div class="mt-3">
                    <form action="/ticket/user_details" method="post">
                        @csrf
                        <input type="hidden" name="bus_name" value="{{$bus_detail->bus->name}}">
                        <input type="hidden" name="from_location" value="{{$bus_detail->from_location}}">
                        <input type="hidden" name="to_location" value="{{$bus_detail->to_location}}">
                        <input type="hidden" name="seat_quality" value="{{$bus_detail->seat_quality}}">
                        <input type="hidden" name="price" value="{{$bus_detail->price}}">
                        <input type="hidden" name="trip_id" value="{{$trip->id}}">
                        @for($i = 0; $i < $bus_detail->seat_quantity; $i++)
                            <label class="option_select inline-block cursor-pointer">
                                <input type="checkbox" name="seat[{{$i+1}}]"
                                    class="forced-colors:appearance-auto appearance-none h-0" value="{{$i+1}}" @php
                                    if(in_array($i+1, $bookedSeat)){ echo 'disabled' ;} @endphp />
                                <div
                                    class="forced-colors:hidden h-6 w-6 rounded-full @php if(in_array($i+1, $bookedSeat)){ echo 'bg-gray-200';} else{ echo 'bg-green-200'; } @endphp text-center">
                                    {{$i+1}}</div>
                            </label>
                            @endfor
                            <button class="bg-indigo-500 text-white p-3 mt-4 w-full rounded-md" type="submit">Continue</button>
                    </form>
                </div>
            </details>
        </div>
        @endforeach
    </div>
    @endforeach
    @else
    <h2 class="bg-red-300 w-full p-3 mb-2 border-l-4 border-red-600">Ticket Not Found</h2>
    <form action="/ticket">
        <label class="block">
            <span class="block text-sm font-medium text-slate-700">Journey Data</span>
            <input name="date" type="date"
                class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 " />
        </label>
        <label class="block mt-4">
            <span class="block text-sm font-medium text-slate-700">From</span>
            <select name="from_city"
                class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
                <option selected disabled>Select Station</option>
                @foreach($locations as $location)
                <option value="{{$location->location}}">{{$location->location}}</option>
                @endforeach
            </select>
        </label>
        <label class="block mt-4">
            <span class="block text-sm font-medium text-slate-700">To</span>
            <select name="to_city"
                class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
                <option selected disabled>Select Station</option>
                @foreach($locations as $location)
                <option value="{{$location->location}}">{{$location->location}}</option>
                @endforeach
            </select>
        </label>
        <button type="submit" class="bg-indigo-500 text-white p-3 mt-4 w-full rounded-md">Search Bus</button>
    </form>
    @endif
</div>

@endsection