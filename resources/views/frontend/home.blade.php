@extends('frontend.Layout.app')

@section('frontend')
<div class="mt-20">
    <form action="/ticket">
        <label class="block">
            <span class="block text-sm font-medium text-slate-700">Journey Data</span>
            <input name="date" type="date" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 " />
        </label>
        <label class="block mt-4">
            <span class="block text-sm font-medium text-slate-700">From</span>
            <select name="from_city" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
                <option selected disabled>Select Station</option>
                @foreach($locations as $location)
                <option value="{{$location->location}}">{{$location->location}}</option>
                @endforeach
            </select>
        </label>
        <label class="block mt-4">
            <span class="block text-sm font-medium text-slate-700">To</span>
            <select name="to_city" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
                <option selected disabled>Select Station</option>
                @foreach($locations as $location)
                <option value="{{$location->location}}">{{$location->location}}</option>
                @endforeach
            </select>
        </label>
        <button type="submit" class="bg-indigo-500 text-white p-3 mt-4 w-full rounded-md">Search Bus</button>
    </form>
</div>

@endsection