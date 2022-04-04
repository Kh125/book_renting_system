@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-10">        
        <div class="md:grid md:grid-cols-2 md:justify-items-start mx-auto md:w-[50rem]">            
            <div class="book-info col-span-2 px-2 mt-3 md:mt-0">
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-100 my-1 rounded-sm md:w-full md:min-w-[410px]">
                    <p class="pr-3 font-semibold col-span-1">Rental Period</p>
                    {{-- <p class="mt-2 md:mt-0 col-span-2 text-red-600">*16 Days(overdue)</p> --}}
                    <p class="mt-2 md:mt-0 col-span-2 text-green-600">{{ $day }} Days</p>
                </div>
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-100 my-1 rounded-sm md:w-full md:min-w-[410px]">
                    <p class="pr-3 font-semibold col-span-1">Rental price</p>
                    <p class="mt-2 md:mt-0 col-span-2">{{ $book->rental_price }} $</p>
                </div>
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-100 my-1 rounded-sm md:w-full md:min-w-[410px]">
                    <p class="pr-3 font-semibold col-span-1">Overdue fine</p>
                    {{-- <p class="mt-2 md:mt-0 col-span-2 text-red-600">2$</p> --}}
                    <p class="mt-2 md:mt-0 col-span-2 text-green-600">0$</p>
                </div>
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-100 my-1 rounded-sm md:w-full md:min-w-[410px]">
                    <p class="pr-3 font-semibold col-span-1">Total bills</p>
                    <p class="mt-2 md:mt-0 col-span-2">{{ $book->rental_price }} $</p>
                </div>
                {{-- back book process --}}
                <div class="mt-4">
                    <form action="{{ route('backBook', $book['id']) }}" method="POST">
                        @csrf
                        {{-- <a href="{{ route('rentBook', $book['id']) }}" class="bg-green-500 rounded-md shadow-xl hover:shadow-2xl transition duration-200 px-5 text-white py-2">Rent</a> --}}
                        <button class="bg-green-500 rounded-md shadow-xl hover:shadow-2xl transition duration-200 px-5 text-white py-2">Rent</button>
                    </form>                            
                </div>                 
            </div>
        </div>
    </div>
@endsection