@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-10">        
        <a href="{{ route('bookIndex') }}" class="text-sm underline text-blue-700 ml-4 md:ml-16">Back</a>
        <div class="md:grid md:grid-cols-3 md:justify-items-start mx-auto md:w-[50rem] mt-4 md:mt-0">            
            <div class="book-cover col-span-1 px-2">
                <x-book-cover :img="$book['book_cover_img']" :type="$book['book_type']"/>           
            </div>
            <div class="book-info col-span-2 px-2 mt-3 md:mt-0">
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-100 my-1 rounded-sm md:w-full md:min-w-[410px]">
                    <p class="pr-3 font-semibold col-span-1">Title</p>
                    <p class="mt-2 md:mt-0 col-span-2">{{ $book['name'] }}</p>
                </div>
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-100 my-1 rounded-sm md:w-full md:min-w-[410px]">
                    <p class="pr-3 font-semibold col-span-1">Availability</p>
                    <p class="mt-2 md:mt-0 col-span-2">{{ $book['availability'] }}</p>
                </div>
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-100 my-1 rounded-sm md:w-full md:min-w-[410px]">
                    <p class="pr-3 font-semibold col-span-1">Rental Price</p>
                    <p class="mt-2 md:mt-0 col-span-2">{{ $book['rental_price'] }} $</p>
                </div>
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-100 my-1 rounded-sm md:w-full md:min-w-[410px]">
                    <p class="pr-3 font-semibold col-span-1">Max Rental Duration</p>
                    <p class="mt-2 md:mt-0 col-span-2">                       
                    {{ $book['userType'] == 0 ? '7' : '10' }} Days
                    </p>
                </div>
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-100 my-1 rounded-sm md:w-full md:min-w-[410px]">
                    <p class="pr-3 font-semibold col-span-1">Start Date</p>
                    <p class="mt-2 md:mt-0 col-span-2">{{ date("M d, Y") }}</p>
                </div>
                <div class="md:grid md:grid-cols-3 p-3 bg-gray-100 my-1 rounded-sm md:w-full md:min-w-[410px]">
                    <p class="pr-3 font-semibold col-span-1">Day to take back</p>
                    <p class="mt-2 md:mt-0 col-span-2">{{ date("M d, Y", strtotime($book['userType'] == 0 ? '+7 days' : '+10 days')) }}</p>
                </div>      
                
                {{-- if free user and free book --}}
                
                @if ($book['availability'] !== "Out of stock")
                    @if ($book['rented'] === true)
                        <div class="mt-4 text-red-600">
                            You have rented this book.                            
                        </div>                    
                    @endif

                    @if ($book['totRentedBooks'] >= $book['maxCapacity'])
                        <div class="mt-4 text-red-600 bg-gray-50 border border-red-600 shadow-lg rounded-md px-4 py-2 font-semibold">
                            Your books capacity reach to limit!.                          
                        </div>  

                        {{-- premium --}}
                        @if ($book['userType'] == 0)
                            <x-upgradetopremium />                  
                        @endif
                    @endif                            
                    @if($book['rented'] !== true && $book['totRentedBooks'] < $book['maxCapacity'])
                        @if ($book['book_type'] == 1 && $book['userType'] == 0 )
                            <div class="mt-4 text-red-600 bg-gray-50 border border-red-600 shadow-lg rounded-md px-4 py-2 font-semibold">
                                You have to be a premium user to rent this book.                                
                            </div>  
                            <x-upgradetopremium /> 
                        @else
                            <div class="mt-4">
                                <form action="{{ route('rentBook', $book['id']) }}" method="POST">
                                    @csrf                                    
                                    <button class="bg-green-500 rounded-md shadow-xl hover:shadow-2xl transition duration-200 px-5 text-white py-2">Rent</button>
                                </form>                            
                            </div>                                                                   
                        @endif
                    @endif
                @else
                    <div class="mt-4 text-red-600">
                        No books left. Come back later.
                        <a href="{{ route('bookIndex') }}" class="ml-4 underline text-blue-600 text-sm">Back to home</a>
                    </div>
                @endif                              
            </div>
        </div>
    </div>
@endsection