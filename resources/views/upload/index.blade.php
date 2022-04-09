@extends('layouts.app')

@section('content')
<div class="px-6 md:px-20 py-10 md:py-0 md:my-20">
    <div class="flex flex-col bg-white shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-xl md:w-[40rem] mx-auto">
        <div class="font-semibold text-xl sm:text-3xl text-gray-800">
            Upload
        </div>
        <div class="mt-4 justify-center text-xl sm:text-sm text-gray-800">
            Upload Sample Books for test.
        </div>

        <div class="mt-10">
            <form action="" method="POST">
                @csrf
                <div class="flex flex-col mb-5">
                    <label for="title" class="mb-1 text-xs tracking-wide text-gray-600">Book Title<span class="text-red-500"> &nbsp;*</span></label>
                    <div class="relative">                        
                        <input id="title" type="title" name="title" class="text-sm placeholder-gray-300 pl-4 pr-4 rounded-md border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400 " placeholder="Enter your title" value="{{ old('title') }}"/>
                    </div>
                    @error('title')
                        <div class="error text-red-600">
                            {{ $message }}
                        </div>                    
                    @enderror  
                </div>    
                
                <div class="flex flex-col mb-5">
                    <label for="author" class="mb-1 text-xs tracking-wide text-gray-600">Author</label>
                    <div class="relative">                        
                        <input id="author" type="author" name="author" class="text-sm placeholder-gray-300 pl-4 pr-4 rounded-md border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400 " placeholder="Author Name" value="{{ old('author') }}"/>
                    </div>
                </div>

                <div class="flex flex-col mb-6">
                    <label for="description" class="mb-1 text-xs tracking-wide text-gray-600">Description<span class="text-red-500"> &nbsp;*</span></label>
                    <div class="relative">                        
                        <textarea name="description" cols="20" rows="5" class="text-sm placeholder-gray-300 pl-4 pr-4 rounded-md border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400 resize-none" placeholder="Description goes here..."></textarea>                         
                    </div>
                </div>
                                        
                <div class="flex flex-col mb-6">
                    <label for="genres" class="mb-1 text-xs tracking-wide text-gray-600" >Genres</label>
                    <div class="relative">                        
                        <input id="genres" type="text" name="genres" class="text-sm placeholder-gray-300 pl-4 pr-4 rounded-md border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400 " placeholder="Love, Mystery, Romance..."/> 
                    </div>
                </div>

                <div class="flex flex-col mb-5">
                    <label for="isbnid" class="mb-1 text-xs tracking-wide text-gray-600">ISBN ID</label>
                    <div class="relative">                        
                        <input id="isbnid" type="text" name="isbnid" class="text-sm placeholder-gray-300 pl-4 pr-4 rounded-md border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400 " placeholder="48703947214739" value="{{ old('isbnid') }}"/>
                    </div>                    
                </div>                                
                <div class="flex flex-col mb-6">
                    <label for="rental_price" class="mb-1 text-xs tracking-wide text-gray-600" >Rental Price<span class="text-red-500"> &nbsp;*</span></label>
                    <div class="relative">                        
                        <input id="rental_price" type="number" name="rental_price" class="text-sm placeholder-gray-300 pl-4 pr-4 rounded-md border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400 " placeholder="3"/>
                        @error('rental_price')
                            <div class="error text-red-600">
                                {{ $message }}
                            </div>                    
                        @enderror  
                    </div>
                </div>

                <div class="flex flex-col mb-5">
                    <label for="book_count" class="mb-1 text-xs tracking-wide text-gray-600">Book Count<span class="text-red-500"> &nbsp;*</span></label>
                    <div class="relative">                        
                        <input id="book_count" type="number" name="book_count" class="text-sm placeholder-gray-300 pl-4 pr-4 rounded-md border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400 " placeholder="2" value="{{ old('book_count') }}"/>
                    </div>
                    @error('book_count')
                        <div class="error text-red-600">
                            {{ $message }}
                        </div>                    
                    @enderror  
                </div>                
                <div class="flex flex-col mb-6">
                    <label for="book_type" class="mb-1 text-xs tracking-wide text-gray-600" >Book Type</label>
                    <div class="relative">                        
                        <select name="book_type"f class="bg-white text-sm pl-2 pr-4 rounded-md border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400 text-gray-600">
                            <option value="">Choose Book Type</option>
                            <option value="0">Free</option>
                            <option value="1">Premium</option>
                        </select>
                    </div>
                </div>
                

                <div class="flex w-full">
                    <button type="submit" class="mt-2 focus:outline-none text-white text-sm sm:text-base bg-blue-500 hover:bg-blue-600 rounded-md py-2 w-full transition duration-150 ease-in">
                        <span class="mr-2 uppercase">Upload</span>                        
                    </button>
                </div>
            </form>
        </div>
    </div>    
</div>

@endsection