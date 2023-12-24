@extends('admin.Layout.app')

@section('content')
<div class="container mx-auto pt-6 pb-6">
    <form action="/bus/{{$busid}}/edit" method="post">
        @csrf
        @method('put')
        <div class="space-y-12">
            <div class="border-gray-900/10 pb-12">
                @foreach($buses as $bus)
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Bus Name</label>
                        <div class="mt-2">
                            <input type="text" name="name" id="name" autocomplete="given-name" class="px-1 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{$bus->name}}">
                        </div>
                    </div>
                </div>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                        <label for="number" class="block text-sm font-medium leading-6 text-gray-900">Bus Number</label>
                        <div class="mt-2">
                            <input type="text" name="number" id="number" autocomplete="given-number" class="px-1 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{$bus->number}}">
                        </div>
                    </div>
                </div>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                        <label for="total_seat" class="block text-sm font-medium leading-6 text-gray-900">Total
                            Seat</label>
                        <div class="mt-2">
                            <input type="text" name="total_seat" id="total_seat" autocomplete="given-total_seat" class="px-1 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{$bus->total_seat}}">
                            <input type="hidden" name="id" value="{{$bus->id}}">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/bus" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
</div>
@endsection