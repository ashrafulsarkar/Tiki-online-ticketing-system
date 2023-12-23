@extends('admin.Layout.app')

@section('content')
<div class="container mx-auto">
    <div class="text-right block pt-10">
        <a href="/location/add" class="bg-indigo-500 rounded-lg inline-block p-3 text-white">Add Location</a>
    </div>
    <div class="pt-10">
        <table class="border-collapse border border-slate-400 w-full">
            <thead>
                <tr>
                    <th class="border border-slate-300 p-2">SL</th>
                    <th class="border border-slate-300 p-2">Location Name</th>
                    <th class="border border-slate-300 p-2">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php $i = 1;?>
                @if(count($locations)>0)
                @foreach ($locations as $location)
                <tr>
                    <td class="border border-slate-300 p-2">{{ $i++}}</td>
                    <td class="border border-slate-300 p-2">{{ $location->location }}</td>
                    <td class="border border-slate-300 p-2 text-center">
                        <a href="#" class="text-red-600"
                            onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this location?')) { document.getElementById('delete-form-{{ $location->id }}').submit(); }">Delete</a>
                        <form id="delete-form-{{ $location->id }}" action="/location" method="POST"
                            style="display: none;">
                            <input type="hidden" name="delete" value="{{$location->id}}">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="3" class="border text-center border-slate-300 p-2">No Data Available.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection