@extends('admin.Layout.app')

@section('content')
<div class="pt-10 flex justify-center gap-4">
	<div class="p-6 bg-white rounded-xl shadow-lg items-center space-x-4">
		<div class="">
			<div class="text-xl font-medium text-black">Today</div>
			<p class="text-slate-500">$</p>
		</div>
	</div>
	<div class="p-6 bg-white rounded-xl shadow-lg items-center space-x-4">
		<div class="">
			<div class="text-xl font-medium text-black">Yesterday</div>
			<p class="text-slate-500">$</p>
		</div>
	</div>
	<div class="p-6 bg-white rounded-xl shadow-lg items-center space-x-4">
		<div class="">
			<div class="text-xl font-medium text-black">This month</div>
			<p class="text-slate-500">$</p>
		</div>
	</div>
	<div class="p-6 bg-white rounded-xl shadow-lg items-center space-x-4">
		<div class="">
			<div class="text-xl font-medium text-black">Last month</div>
			<p class="text-slate-500">$</p>
		</div>
	</div>
</div>
@endsection