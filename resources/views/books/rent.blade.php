@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-10">        
        <div class="md:grid md:grid-cols-3 md:justify-items-start mx-auto md:w-[50rem]">
            <div class="book-cover col-span-1 px-2">
                <x-book-cover/>           
            </div>
            <div class="book-info col-span-2 px-2 mt-3 md:mt-0">
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-100 my-1 rounded-sm md:w-full md:min-w-[410px]">
                    <p class="pr-3 font-semibold col-span-1">Availability</p>
                    <p class="mt-2 md:mt-0 col-span-2">{{ $book['availability'] }}</p>
                </div>
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-100 my-1 rounded-sm md:w-full md:min-w-[410px]">
                    <p class="pr-3 font-semibold col-span-1">Rental Price</p>
                    <p class="mt-2 md:mt-0 col-span-2">{{ $book['rental_price'] }}</p>
                </div>
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-100 my-1 rounded-sm md:w-full md:min-w-[410px]">
                    <p class="pr-3 font-semibold col-span-1">Max Rental Duration</p>
                    <p class="mt-2 md:mt-0 col-span-2">7 Days</p>
                </div>
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-100 my-1 rounded-sm md:w-full md:min-w-[410px]">
                    <p class="pr-3 font-semibold col-span-1">Start Date</p>
                    <p class="mt-2 md:mt-0 col-span-2">{{ date("M d, Y") }}</p>
                </div>
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-100 my-1 rounded-sm md:w-full md:min-w-[410px]">
                    <p class="pr-3 font-semibold col-span-1">Day to take back</p>
                    <p class="mt-2 md:mt-0 col-span-2">{{ date("M d, Y", strtotime('+7 days')) }}</p>
                </div>                
                {{-- if free --}}
                <div class="mt-4">
                    <a href="{{ route('rentBook', $book['id']) }}" class="bg-green-500 rounded-md shadow-xl hover:shadow-2xl transition duration-200 px-5 text-white py-2">Rent</a>
                </div>  
                {{-- if premium --}}
                <div class="">
                    <a href="{{ route('premium') }}" class="flex items-center justify-center px-4 py-2 text-white bg-green-500 rounded-md mt-3 hover:shadow-lg transition duration-150">
                        <img src="/img/premium.png" alt="premium" class="w-6 h-6 mr-2">
                        <span>
                            Upgrade to Premium
                        </span> 
                    </a>
                    <a href="{{ route('premiumBenefit') }}" class="text-sm underline text-blue-700 mt-3">Premium Benefits?</a>
                </div>
            </div>
        </div>
    </div>
@endsection