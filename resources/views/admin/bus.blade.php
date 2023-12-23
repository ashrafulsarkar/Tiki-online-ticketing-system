@extends('admin.Layout.app')

@section('content')
<div class="container mx-auto">
    <div class="text-right block pt-10">
        <a href="/bus/add" class="bg-indigo-500 rounded-lg inline-block p-3 text-white">Add Bus</a>
    </div>
    <div class="pt-10">
        <table class="border-collapse border border-slate-400 w-full">
            <thead>
                <tr>
                    <th class="border border-slate-300 p-2">SL</th>
                    <th class="border border-slate-300 p-2">Bus Name</th>
                    <th class="border border-slate-300 p-2">Bus Number</th>
                    <th class="border border-slate-300 p-2">Total Seat</th>
                    <th class="border border-slate-300 p-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;?>
                @if(count($buses)>0)
                @foreach ($buses as $bus)
                <tr>
                    <td class="border border-slate-300 p-2">{{ $i++}}</td>
                    <td class="border border-slate-300 p-2">{{ $bus->name }}</td>
                    <td class="border border-slate-300 p-2">{{ $bus->number }}</td>
                    <td class="border border-slate-300 p-2">{{ $bus->total_seat }}</td>
                    <td class="border border-slate-300 p-2 text-center">
                        <a href="/bus/{{$bus->id}}">View</a>
                        <a href="/bus/{{$bus->id}}/edit" class="text-blue-600">Edit</a>
                        <!-- <a href="#" class="text-red-600" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this bus?')) { document.getElementById('delete-form-{{ $bus->id }}').submit(); }">Delete</a>
                        <form id="delete-form-{{ $bus->id }}" action="/bus" method="POST" style="display: none;">
                        <input type="hidden" name="delete" value="{{$bus->id}}">
                            @csrf
                            @method('DELETE')
                        </form> -->
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