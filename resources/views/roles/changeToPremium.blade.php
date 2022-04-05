@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="my-10 mx-auto md:w-[20rem]">
        <h4 class="text-lg font-semibold mt-4">Upgrade to Premium</h4>
        <div class="md:grid md:grid-cols-3 p-3 bg-gray-50 my-1 rounded-md shadow-md md:max-w-[28rem] mt-6">
            <p class="col-span-1 font-semibold md:px-2">Price</p>
            <p class="md:px-2 col-span-2">30$</p>
        </div>
        @if (Auth::user()->user_type == 1)
            <div class="flex items-center justify-center p-3 bg-green-600 text-white text-center my-1 rounded-md shadow-md md:max-w-[28rem] mt-6">
                <img src="/img/premium.png" alt="premium" class="w-6 h-6 mr-2">
                <p>Already a premium user</p>
            </div>
        @else
            <form action="" method="POST" class="mt-6" id="">
                @csrf            
                <div class="mt-3 ">
                    <button type="submit" class="mr-6 px-4 py-2 bg-green-500 rounded-md hover:shadow-md transition duration-200">Upgrade</button>                
                </div>            
            </form>
        @endif
    </div>
</div>
@endsection

