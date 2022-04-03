@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="my-10 mx-auto md:w-[20rem]">
        <h4 class="text-lg font-semibold mt-4">Change your name</h4>
        <form action="" method="POST" class="mt-6" id="name-form">
            @csrf
            <div class="" id="old_name">
                <label for="name" class="block text-sm">Name</label>
                
            </div>
            <div class="mt-3 ">
                <button type="submit" class="mr-6 px-4 py-2 bg-green-500 rounded-md hover:shadow-md transition duration-200">Save</button>
                <a href="{{ route('userSetting') }}" class="text-sm hover:underline text-blue-700">Back</a>
            </div>            
        </form>
    </div>
</div>
@endsection

