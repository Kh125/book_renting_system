@extends('layouts.app')

@section('content')   
<div class="container mx-auto py-10 h-[41rem] flex items-center justify-center">     
    <div class="hero-content px-6 md:px-0">
        <h4 class="uppercase font-bold text-2xl md:text-4xl text-green-500 sm:text-center">
            Welcome from BOOKRENTAL
        </h4>
        <h1 class="md:text-sm sm:text-center mt-2">
            Pick up what you want with affordable price and best service
        </h1>
    </div>            
</div>  

{{-- sample-book-section --}}
<div class="book container py-10 px-6 md:px-24 lg:px-44 xl:px-56 mx-auto">
    <h4 class="font-semibold text-xl text-gray-600">
        BOOKS FOR YOU
    </h4>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 md:gap-4 justify-items-center">
        <a href="{{ route('bookIndex') }}" class="book-card">
            <div style="width: 140px;" class="mt-12 relative rounded-md">
                <img src="/img/book1.jpg" alt="cover" style="width: 140px; height:200px" class="rounded-md">
                <div class="book-info absolute bottom-0 bg-white text-gray-400 font-semibold w-full shadow-md px-2 py-2 rounded-b-md">
                    <h4>In my Eyes</h4>                           
                </div>                
            </div>
        </a>
        <a href="{{ route('bookIndex') }}" class="book-card">
            <div style="width: 140px;" class="mt-12 relative rounded-md">
                <img src="/img/book5.jpg" alt="cover" style="width: 140px; height:200px" class="rounded-md">
                <div class="book-info absolute bottom-0 bg-white text-gray-400 font-semibold w-full shadow-md px-2 py-2 rounded-b-md">
                    <h4>Sunset</h4>                           
                </div>                
            </div>
        </a>
        <a href="{{ route('bookIndex') }}" class="book-card">
            <div style="width: 140px;" class="mt-12 relative rounded-md">
                <img src="/img/book12.jpg" alt="cover" style="width: 140px; height:200px" class="rounded-md">
                <div class="book-info absolute bottom-0 bg-white text-gray-400 font-semibold w-full shadow-md px-2 py-2 rounded-b-md">
                    <h4>Back to You</h4>                           
                </div>                
            </div>
        </a>
        <a href="{{ route('bookIndex') }}" class="book-card">
            <div style="width: 140px;" class="mt-12 relative rounded-md">
                <img src="/img/book8.jpg" alt="cover" style="width: 140px; height:200px" class="rounded-md">
                <div class="book-info absolute bottom-0 bg-white text-gray-400 font-semibold w-full shadow-md px-2 py-2 rounded-b-md">
                    <h4>She</h4>                           
                </div>                
            </div>
        </a>
    </div>
</div>


{{-- pricing --}}
<div class="pricing container py-10 px-6 md:px-24 lg:px-44 xl:px-56 mx-auto">
    <h4 class="uppercase font-semibold text-xl text-gray-600">
        Subscription
    </h4>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 md:gap-4 sm:justify-items-center">
        <div class="free w-52 shadow-md bg-orange-300 rounded-md mt-12">
            <div class="w-full text-white text-center py-3 border-b border-gray-400 font-bold text-2xl">
                Free
            </div>
            <div class="w-full text-white text-center border-b border-gray-400 font-semibold">
                <h4 class="text-center font-bold text-2xl border-b border-gray-400 py-3">
                    0$
                </h4>
                <div class="capacity py-3">
                    <h4 class="text-center font-bold text-xl">
                        10
                    </h4>
                    <h2 class="text-center text-xs font-light text-gray-50">Shelf Capacity</h2>
                </div>
                <div class="capacity py-3">
                    <h4 class="text-center font-bold text-xl">
                        5 Days
                    </h4>
                    <h2 class="text-center text-xs font-light text-gray-50">Rental Period</h2>
                </div>
            </div>
            <div class="w-full text-orange-300 bg-white text-center py-3 rounded-b-md font-semibold">
                1 MONTH
            </div>
        </div>

        <div class="free w-52 shadow-md bg-green-300 rounded-md mt-12">
            <div class="w-full text-white text-center py-3 border-b border-gray-400 font-bold text-2xl">
                Premium
            </div>
            <div class="w-full text-white text-center border-b border-gray-400 font-semibold">
                <h4 class="text-center font-bold text-2xl border-b border-gray-400 py-3">
                    35$
                </h4>
                <div class="capacity py-3">
                    <h4 class="text-center font-bold text-xl">
                        50
                    </h4>
                    <h2 class="text-center text-xs font-light text-gray-50">Shelf Capacity</h2>
                </div>
                <div class="capacity py-3">
                    <h4 class="text-center font-bold text-xl">
                        12 Days
                    </h4>
                    <h2 class="text-center text-xs font-light text-gray-50">Rental Period</h2>
                </div>
            </div>
            <div class="w-full text-green-300 bg-white text-center py-3 rounded-b-md font-semibold">
                1 MONTH
            </div>
        </div>

        <div class="free w-52 shadow-md bg-green-300 rounded-md mt-12">
            <div class="w-full text-white text-center py-3 border-b border-gray-400 font-bold text-2xl">
                Premium
            </div>
            <div class="w-full text-white text-center border-b border-gray-400 font-semibold">
                <h4 class="text-center font-bold text-2xl border-b border-gray-400 py-3">
                    90$
                </h4>
                <div class="capacity py-3">
                    <h4 class="text-center font-bold text-xl">
                        50
                    </h4>
                    <h2 class="text-center text-xs font-light text-gray-50">Shelf Capacity</h2>
                </div>
                <div class="capacity py-3">
                    <h4 class="text-center font-bold text-xl">
                        15 Days
                    </h4>
                    <h2 class="text-center text-xs font-light text-gray-50">Rental Period</h2>
                </div>
            </div>
            <div class="w-full text-green-300 bg-white text-center py-3 rounded-b-md font-semibold">
                3 MONTH
            </div>
        </div>
    </div>
</div>

{{-- footer --}}
<!-- component -->
<div class="footer bg-gray-50 shadow-md p-8 text-center w-full">
    <h4>&copy; 2022 BOOKRENTAL. All rights reserved.</h4>
</div>
@endsection