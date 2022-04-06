@extends('layouts.app')

@section('content')
    <div class="container mx-auto w-full md:w-[40rem] my-10 px-6 md:px-0">
        <h4 class="font-bold text-4xl text-gray-400">Premium Benefits</h4>
        <div class="premium-benefits-content mt-10">
            <h4 class="font-semibold text-lg text-gray-600 mb-4">Premium User</h4>
            <div class="grid grid-cols-3 px-4 py-2 bg-green-600 text-white rounded-sm shadow-sm">
                <div class="font-semibold col-span-1">Shelf Capacity</div>
                <div class="col-span-2">50</div>
            </div>
            <div class="grid grid-cols-3 px-4 py-2 bg-green-600 text-white rounded-sm shadow-sm mt-2">
                <div class="font-semibold col-span-1">Rental Period</div>
                <div class="col-span-2">Up to 10 days</div>
            </div>
            <div class="grid grid-cols-3 px-4 py-2 bg-green-600 text-white rounded-sm shadow-sm mt-2">
                <div class="font-semibold col-span-1">Book Type</div>
                <div class="col-span-2">Free/Premium</div>
            </div>
        </div>
        <div class="free-benefits-content mt-10">
            <h4 class="font-semibold text-lg text-gray-600 mb-4">Free User</h4>
            <div class="grid grid-cols-3 px-4 py-2 bg-green-600 text-white rounded-sm shadow-sm">
                <div class="font-semibold col-span-1">Shelf Capacity</div>
                <div class="col-span-2">10</div>
            </div>
            <div class="grid grid-cols-3 px-4 py-2 bg-green-600 text-white rounded-sm shadow-sm mt-2">
                <div class="font-semibold col-span-1">Rental Period</div>
                <div class="col-span-2">Up to 5 days</div>
            </div>
            <div class="grid grid-cols-3 px-4 py-2 bg-green-600 text-white rounded-sm shadow-sm mt-2">
                <div class="font-semibold col-span-1">Book Type</div>
                <div class="col-span-2">Free</div>
            </div>
        </div>
    </div>
@endsection