@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-10">     
        <a href="{{ route('bookIndex') }}" class="text-sm underline text-blue-700 ml-4 md:ml-16 md:hidden">Back</a>   
        <div class="md:grid md:grid-cols-3 md:justify-items-start mx-auto md:w-[50rem] mt-4 md:mt-0">
            <div class="book-cover col-span-1 px-2 md:px-0">
                <x-book-cover :img="$book_img" :type="$book->book_type"/>
                <a class="flex items-center rounded-sm bg-gray-50 shadow-md px-4 py-2 text-sm mt-4">
                    <span class="font-semibold mr-4">ISBN13</span> {{ $book->isbn_id }}
                </a>
                {{-- <a class="block rounded-sm bg-gray-50 shadow-md px-4 py-2 text-sm mt-2">ISBN10 : 32947937439</a> --}}
            </div>
            <div class="book-info col-span-2 px-2">
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-50 my-1 rounded-sm shadow-md md:w-full md:min-w-[410px]">
                    <p class="font-semibold col-span-1">Title</p>
                    <p class="mt-2 md:mt-0 col-span-2">{{ $book->name }}</p>
                </div>
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-50 my-1 rounded-sm shadow-md md:w-full md:min-w-[410px]">
                    <p class="font-semibold col-span-1">Author</p>
                    <p class="mt-2 md:mt-0 col-span-2">{{ $book->author }}</p>
                </div>
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-50 my-1 rounded-sm shadow-md md:w-full md:min-w-[410px]">
                    <p class="font-semibold col-span-1">Genres</p>
                    <p class="mt-2 md:mt-0 col-span-2">{{ $book->genres }}</p>
                </div>                
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-50 my-1 rounded-sm shadow-md md:w-full md:min-w-[410px]">
                    <p class="font-semibold col-span-1">Description</p>
                    <p class="mt-2 md:mt-0 col-span-2">
                        {{ $book->description }}
                    </p>
                </div>                
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-50 my-1 rounded-sm shadow-md md:w-full md:min-w-[410px]">
                    <p class="font-semibold col-span-1">Language</p>
                    <p class="mt-2 md:mt-0 col-span-2">en</p>
                </div>
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-50 my-1 rounded-sm shadow-md md:w-full md:min-w-[410px]">
                    <p class="font-semibold col-span-1">Released Date</p>
                    <p class="mt-2 md:mt-0 col-span-2">March 3, 2019</p>
                </div>
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-50 my-1 rounded-sm shadow-md md:w-full md:min-w-[410px]">
                    <p class="font-semibold col-span-1">Production</p>
                    <p class="mt-2 md:mt-0 col-span-2">Piktal.Inc</p>
                </div>
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-50 my-1 rounded-sm shadow-md md:w-full md:min-w-[410px]">
                    <p class="font-semibold col-span-1">Rental Price</p>
                    <p class="mt-2 md:mt-0 col-span-2">{{ $book->rental_price }}</p>
                </div>  

                {{-- if free --}}
                <div class="mt-4 flex items-center justify-between">
                    <a href="{{ route('rentBook', $book->id) }}" class="bg-green-500 rounded-md shadow-xl hover:shadow-2xl transition duration-200 px-5 text-white py-2">Rent</a>
                    <a href="{{ route('bookIndex') }}" class="text-sm underline text-blue-700 ml-4 md:ml-16 hidden md:block">Back</a>
                </div>                              
            </div>
        </div>
    </div>
@endsection