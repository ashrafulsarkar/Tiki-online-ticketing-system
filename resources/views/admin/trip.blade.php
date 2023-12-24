@extends('admin.Layout.app')

@section('content')
<div class="container mx-auto">
    <div class="text-right block pt-10">
        <a href="/trip/add" class="bg-indigo-500 rounded-lg inline-block p-3 text-white">Add Trip</a>
    </div>
    <div class="pt-10">
        <table class="border-collapse border border-slate-400 w-full">
            <thead>
                <tr>
                    <th class="border border-slate-300 p-2">SL</th>
                    <th class="border border-slate-300 p-2">Trip Date</th>
                    <th class="border border-slate-300 p-2">From</th>
                    <th class="border border-slate-300 p-2">To</th>
                    <th class="border border-slate-300 p-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;?>
                @if(count($trips)>0)
                @foreach ($trips as $trip)
                <tr>
                    <td class="border border-slate-300 p-2">{{ $i++}}</td>
                    <td class="border border-slate-300 p-2">{{ $trip->trip_date }}</td>
                    <td class="border border-slate-300 p-2">{{ $trip->from_location }}</td>
                    <td class="border border-slate-300 p-2">{{ $trip->to_location }}</td>
                    <td class="border border-slate-300 p-2 text-center">
                        <a href="#" class="text-red-600"
                            onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this trip?')) { document.getElementById('delete-form-{{ $trip->id }}').submit(); }">Delete</a>
                        <form id="delete-form-{{ $trip->id }}" action="/trip" method="POST"
                            style="display: none;">
                            <input type="hidden" name="delete" value="{{$trip->id}}">
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
            </tbody>
        </table>
    </div>
</div>
@endsection