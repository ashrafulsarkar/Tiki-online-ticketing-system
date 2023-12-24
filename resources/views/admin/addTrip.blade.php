@extends('admin.Layout.app')

@section('content')
<div class="container mx-auto pt-6 pb-6">
    <form action="/trip/add" method="post">
        @csrf
        <div class="space-y-12">
            <div class="border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                        <label for="trip_date" class="block text-sm font-medium leading-6 text-gray-900">Trip
                            Date</label>
                        <div class="mt-2">
                            <input type="date" name="trip_date" id="trip_date" autocomplete="given-trip_date"
                                class="px-1 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>
                <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-3">
                        <div class="col-span-6">
                            <label for="from" class="block text-sm font-medium leading-6 text-gray-900">From</label>
                            <div class="mt-2">
                                <select name="from_location" id="from"
                                    class="px-1 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="" disabled selected>Select One</option>
                                    @foreach ($locations as $location)
                                    <option value="{{$location->from_location}}">{{$location->from_location}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-span-6">
                            <label for="to" class="block text-sm font-medium leading-6 text-gray-900">To</label>
                            <div class="mt-2">
                                <select name="to_location" id="to"
                                    class="px-1 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="" disabled selected>Select One</option>
                                    @foreach ($locations as $location)
                                    <option value="{{$location->to_location}}">{{$location->to_location}}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/trip" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
</div>
@endsection