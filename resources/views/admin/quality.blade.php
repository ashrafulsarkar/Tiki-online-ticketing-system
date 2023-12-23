@extends('admin.Layout.app')

@section('content')
<div class="container mx-auto">
    <div class="text-right block pt-10">
        <a href="/quality/add" class="bg-indigo-500 rounded-lg inline-block p-3 text-white">Add Quality</a>
    </div>
    <div class="pt-10">
        <table class="border-collapse border border-slate-400 w-full">
            <thead>
                <tr>
                    <th class="border border-slate-300 p-2">SL</th>
                    <th class="border border-slate-300 p-2">Quality Name</th>
                    <th class="border border-slate-300 p-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;?>
                @if(count($qualities)>0)
                @foreach ($qualities as $quality)
                <tr>
                    <td class="border border-slate-300 p-2">{{ $i++}}</td>
                    <td class="border border-slate-300 p-2">{{ $quality->quality }}</td>
                    <td class="border border-slate-300 p-2 text-center">
                        <a href="#" class="text-red-600"
                            onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this quality?')) { document.getElementById('delete-form-{{ $quality->id }}').submit(); }">Delete</a>
                        <form id="delete-form-{{ $quality->id }}" action="/quality" method="POST"
                            style="display: none;">
                            <input type="hidden" name="delete" value="{{$quality->id}}">
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