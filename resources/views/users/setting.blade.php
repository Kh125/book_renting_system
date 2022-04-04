@extends('layouts.app')

@section('content')
    <div class="container mx-auto w-full md:w-[40rem] my-10">
        <h1 class="text-xl font-bold px-4 md:px-0">User Setting</h1>
        <div class="md:grid md:grid-cols-3 md:justify-items-start md:gap-4 mx-auto mt-6 px-4 md:px-0">
            <div class="left-content">
                <img src="/img/avatar.png" alt="Profile" class="rounded-full w-24 h-24 col-span-1">
                <div class="mt-4">
                    <a href="{{ route('changeName') }}" class="text-sm hover:underline text-blue-600">Change Name</a>                    
                </div>
                <div class="mt-2">
                    <a href="{{ route('changePassword') }}" class="text-sm hover:underline text-blue-600">Change Password</a>                    
                </div>
                <div class="mt-2">
                    <a href="{{ route('history') }}" class="text-sm hover:underline text-blue-600">Rent History</a>                    
                </div>
            </div>
            <div class="right-content col-span-2 mt-6 md:mt-0">
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-50 my-1 rounded-md shadow-md md:max-w-[28rem]">
                    <p class="col-span-1 font-semibold md:px-2">Name</p>
                    <p class="md:px-2 col-span-2">{{ Auth::user()->name }}</p>
                </div>
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-50 my-1 rounded-md shadow-md md:max-w-[28rem]">
                    <p class="col-span-1 font-semibold md:px-2">Username</p>
                    <p class="md:px-2 col-span-2">{{ Auth::user()->username }}</p>
                </div>
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-50 my-1 rounded-md shadow-md md:max-w-[28rem]">
                    <p class="col-span-1 font-semibold md:px-2">Email <span class="text-red-500">*</span></p>
                    <p class="md:px-2 col-span-2">{{ Auth::user()->email }}</p>
                </div>
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-50 my-1 rounded-md shadow-md md:max-w-[28rem]">
                    <p class="col-span-1 font-semibold md:px-2">Shelf Capacity</p>
                    <p class="md:px-2 col-span-2">{{ $rentedData->count() }} / {{ Auth::user()->shelf_capacity }} books</p>
                </div>
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-50 my-1 rounded-md shadow-md md:max-w-[28rem]">
                    <p class="col-span-1 font-semibold md:px-2">User Type</p>
                    <p class="md:px-2 col-span-2">
                        {{ Auth::user()->user_type === 0 ? 'Free' : 'Premium' }}
                    </p>
                </div>
                @if (Auth::user()->user_type === 0)
                    <div class="">
                        <a href="{{ route('premium') }}" class="flex items-center justify-center px-4 py-2 text-white bg-green-500 rounded-md mt-3 hover:shadow-lg transition duration-150">
                            <img src="/img/premium.png" alt="premium" class="w-6 h-6 mr-2">
                            <span>
                                Upgrade to Premium
                            </span> 
                        </a>
                        <a href="{{ route('premiumBenefit') }}" class="text-sm underline text-blue-700 mt-3">Premium Benefits?</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="mt-10 px-4 md:px-0">
            <h1 class="text-xl font-bold md:px-0">Rental List</h1>
            <div class="grid grid-cols-5 bg-gray-100 shadow-sm my-2">
                <div class="py-2 px-2 col-span-2">
                    Title
                </div>
                <div class="py-2 px-2 col-span-2">
                    Due Date
                </div>
                <div class="py-2 px-2 col-span-1">
                    Price
                </div>
            </div>
            @foreach ($rentedbooks as $index=>$book)
            <a href="{{ route('backBook', $book->id) }}" class="hover:underline hover:text-blue-600">
                <div class="grid grid-cols-5 bg-gray-100 shadow-sm my-2 hover:shadow-md">
                    <div class="col-span-2 rounded-md py-2 px-2">
                        {{ $book->name }}
                    </div>
                    <div class="col-span-2 rounded-md py-2 px-2">
                        {{ date("M d, Y", strtotime('+7 days', strtotime($rentedData[$index]->rented_date))) }}
                    </div>
                    <div class="col-span-1 rounded-md py-2 px-2">
                        {{ $book->rental_price }} $
                    </div>
                </div>   
            </a>         
            @endforeach
            <div class="grid grid-cols-5 bg-gray-100 shadow-sm my-2">
                <div class="col-span-4 py-2 px-2 font-semibold">
                    Total({{ $rentedbooks->count() }})
                </div>
                <div class="col-span-1 py-2 px-2">
                    {{ $rentedbooks->sum('rental_price') }} $
                </div>
            </div>
        </div>
    </div>
@endsection