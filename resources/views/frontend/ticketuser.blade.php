@extends('frontend.Layout.app')

@section('frontend')

@if(count($ticket_data)>0)

<div class="mt-20">
    <form action="/ticket/confirmed" method="post">
        @csrf
        <div class="flex">
            <div class="w-[60%] mr-4">
                <h2 class="text-center text-xl font-medium">User Info</h2>
                <label class="block">
                    <span class="block text-sm font-medium text-slate-700">Name</span>
                    <input name="name" type="text"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 " />
                </label>
                <label class="block">
                    <span class="block text-sm font-medium text-slate-700">Email</span>
                    <input name="email" type="email"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 " />
                </label>
                <label class="block">
                    <span class="block text-sm font-medium text-slate-700">Mobile Number</span>
                    <input name="phone" type="number"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 " />
                </label>
                <input type="hidden" name="trip_id" value="{{$ticket_data['trip_id']}}">
                <input type="hidden" name="seat_quantity" value="{{count($ticket_data['seat'])}}">
                <input type="hidden" name="price" value="{{$ticket_data['price']}}">
                @foreach($ticket_data['seat'] as $value)
                <input type="hidden" name="seat[]" value="{{$value}}">
                @endforeach
                <button type="submit" class="bg-indigo-500 text-white p-3 mt-4 w-full rounded-md">Purchase</button>
            </div>
            <div class="w-[40%]">
                <div class="p-4 rounded-lg bg-white ring-1 ring-slate-900/5 shadow-lg">
                    <h2 class="text-center text-xl font-medium">Ticket Info</h2>
                    <p>Bus Name: {{$ticket_data['bus_name']}}</p>
                    <p>From: {{$ticket_data['from_location']}}</p>
                    <p>To: {{$ticket_data['to_location']}}</p>
                    <p>Class: {{$ticket_data['seat_quality']}}</p>
                    <p>Price: ৳{{$ticket_data['price']}}</p>
                    <div>Selected Seat:
                        @foreach($ticket_data['seat'] as $value)
                        <div class="h-6 w-6 rounded-full bg-green-200 text-center inline-block">{{$value}}</div>
                        @endforeach
                    </div>
                    <p>Total Price: ৳{{$ticket_data['price']}} x {{count($ticket_data['seat'])}} = ৳{{$ticket_data['price']*count($ticket_data['seat'])}}</p>
                </div>
            </div>
        </div>
    </form>
</div>
@else

@endif


@endsection