@extends('layouts.app')

@section('content')
    <div class="container mx-auto w-full md:w-[40rem] my-10">
        <div class="flex justify-between">
            <h1 class="text-xl font-bold px-4 md:px-0">Rental History</h1>
            <a href="{{ route('userSetting') }}" class="mt-1 mr-4 md:mr-2 text-sm hover:underline text-blue-700">Back</a>
        </div>
        <div class="mt-10 px-4 md:px-0">            
            <div class="grid grid-cols-5 bg-gray-100 shadow-sm my-2">
                <div class="py-2 px-2 col-span-2">
                    Title
                </div>
                <div class="py-2 px-2 col-span-2">
                    Repayment Date
                </div>
                <div class="py-2 px-2 col-span-1">
                    Bill
                </div>
            </div>
            @foreach ($rentedBooks as $index=>$book)            
                <div class="grid grid-cols-5 bg-gray-100 shadow-sm my-2 hover:shadow-md">
                    <div class="col-span-2 rounded-md py-2 px-2">
                        {{ $book->name }}
                    </div>
                    <div class="col-span-2 rounded-md py-2 px-2">
                        {{ date("M d, Y", $book->deleted_at) }}
                    </div>
                    <div class="col-span-1 rounded-md py-2 px-2">
                        {{ $deletedRentedBooks[$index]->total_bill }} $
                    </div>
                </div>               
            @endforeach
            <div class="grid grid-cols-5 bg-gray-100 shadow-sm my-2">
                <div class="col-span-4 py-2 px-2 font-semibold">
                    Total({{ $rentedBooks->count() }})
                </div>
                <div class="col-span-1 py-2 px-2">
                    {{ $deletedRentedBooks->sum('total_bill') }} $
                </div>
            </div>            
        </div>
    </div>
@endsection