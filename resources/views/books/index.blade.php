@extends('layouts.app')

@section('content')
    <div class="container py-10 px-6 md:px-24 lg:px-44 xl:px-56 mx-auto">
        <h4 class="font-semibold text-2xl text-gray-800">
            Famous Books
        </h4>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 md:gap-4 justify-items-center">
            @foreach ($books as $book)
                <x-book-card :book="$book"/>
            @endforeach
        </div>
    </div>
@endsection