@extends('layouts.app')

@section('content')
    <div class="container mx-auto   ">
        <div class="grid grid-cols-4 gap-4">
            @foreach ($books as $book)
                <x-book-card :book="$book"/>
            @endforeach
        </div>
    </div>
@endsection