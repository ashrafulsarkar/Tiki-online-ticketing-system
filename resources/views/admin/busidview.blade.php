@extends('admin.Layout.app')

@section('content')
<div class="container mx-auto">
    <div class="pt-10">
        <h3 class="text-3xl pb-4">Bus Info</h3>
        @if(count($buses)>0)
        @foreach ($buses as $bus)
        <p>Bus Name: {{ $bus->name }}</p>
        <p>Bus Number: {{ $bus->number }}</p>
        <p>Total Seat: {{ $bus->total_seat }}</p>
        @endforeach
        @endif
        <h3 class="text-3xl pb-4 pt-4">Bus Details</h3>
        <table class="border-collapse border border-slate-400 w-full">
            <thead>
                <tr>
                    <th class="border border-slate-300 p-2">SL</th>
                    <th class="border border-slate-300 p-2">From</th>
                    <th class="border border-slate-300 p-2">To</th>
                    <th class="border border-slate-300 p-2">Quality</th>
                    <th class="border border-slate-300 p-2">Quantity</th>
                    <th class="border border-slate-300 p-2">Price</th>
                    <th class="border border-slate-300 p-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($buses as $bus)
                @if(count($bus->busDetails)>0)
                @foreach ($bus->busDetails as $details)
                <tr>
                    <td class="border border-slate-300 p-2">{{ $i++}}</td>
                    <td class="border border-slate-300 p-2">{{ $details->from_location }}</td>
                    <td class="border border-slate-300 p-2">{{ $details->to_location }}</td>
                    <td class="border border-slate-300 p-2">{{ $details->seat_quality }}</td>
                    <td class="border border-slate-300 p-2">{{ $details->seat_quantity }}</td>
                    <td class="border border-slate-300 p-2">{{ $details->price }}</td>
                    <td class="border border-slate-300 p-2 text-center">
                        <a href="#" class="text-red-600"
                            onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this bus?')) { document.getElementById('delete-form-{{$busid}}').submit(); }">Delete</a>
                        <form id="delete-form-{{$busid}}" action="/bus/{{$busid}}" method="POST" style="display: none;">
                            <input type="hidden" name="busid" value="{{$busid}}">
                            <input type="hidden" name="delete" value="{{$details->id}}">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5" class="border text-center border-slate-300 p-2">No Data Available.</td>
                </tr>
                @endif
                @endforeach

            </tbody>
        </table>
        <h3 class="text-3xl pt-4">Add Details</h3>
        <form action="/bus/{{$busid}}" method="post" class="pb-5">
            @csrf
            <div class="space-y-12">
                <div class="border-gray-900/10 pb-12">
                    <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-1">
                            <label for="from" class="block text-sm font-medium leading-6 text-gray-900">From</label>
                            <div class="mt-2">
                                <select name="from_location" id="from"
                                    class="px-1 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="" disabled selected>Select One</option>
                                    @foreach ($locations as $location)
                                    <option value="{{$location->location}}">{{$location->location}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label for="to" class="block text-sm font-medium leading-6 text-gray-900">To</label>
                            <div class="mt-2">
                                <select name="to_location" id="to"
                                    class="px-1 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="" disabled selected>Select One</option>
                                    @foreach ($locations as $location)
                                    <option value="{{$location->location}}">{{$location->location}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="quality"
                                class="block text-sm font-medium leading-6 text-gray-900">Quality</label>
                            <div class="mt-2">
                                <select name="seat_quality" id="quality"
                                    class="px-1 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="" disabled selected>Select One</option>
                                    @foreach ($qualities as $quality)
                                    <option value="{{$quality->quality}}">{{$quality->quality}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label for="quantity"
                                class="block text-sm font-medium leading-6 text-gray-900">Quantity</label>
                            <div class="mt-2">
                                <input type="text" name="seat_quantity" id="quantity" autocomplete="given-quantity"
                                    class="px-1 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price</label>
                            <div class="mt-2">
                                <input type="text" name="price" id="price" autocomplete="given-price"
                                    class="px-1 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <input type="hidden" name="bus_id" value={{$busid}}>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-2 flex justify-end">
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add</button>
            </div>
        </form>
    </div>
</div>
@endsection