@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-100 px-6 md:px-0 py-10 md:py-0">
    <div class="flex flex-col bg-white shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-xl w-50 max-w-md">
        <div class="font-semibold self-center text-xl sm:text-3xl text-gray-800">
            Change Password
        </div>
        <div class="mt-4 text-center text-xl sm:text-sm text-gray-800">
            Enter new password for your account
        </div>

        <div class="mt-10">
            <form action="{{ route('password.update', $token) }}" method="POST">
                @csrf        
                <input type="hidden" value="{{ $token }}">       
                <div class="flex flex-col mb-5">
                    <label for="email" class="mb-1 text-xs tracking-wide text-gray-600">Email</label>
                    <div class="relative">
                        <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                            <i class="fas fa-at text-blue-500"></i>
                        </div>
                        <input id="email" type="email" name="email" class="text-sm placeholder-gray-500 pl-4 pr-4 rounded-md border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400 " placeholder="Enter your email" value="{{ old('email') }}"/>
                    </div>
                    @error('email')
                        <div class="error text-red-600">
                            {{ $message }}
                        </div>                    
                    @enderror  
                </div>                
                <div class="flex flex-col mb-6">
                    <label for="password" class="mb-1 text-xs tracking-wide text-gray-600" >Password:</label>
                    <div class="relative">
                        <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                            <span>
                            <i class="fas fa-lock text-blue-500"></i>
                            </span>
                        </div>
                        <input id="password" type="password" name="password" class="text-sm placeholder-gray-500 pl-4 pr-4 rounded-md border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400 " placeholder="Enter your password"/>
                        @error('password')
                            <div class="error text-red-600">
                                {{ $message }}
                            </div>                    
                        @enderror  
                    </div>
                </div>
                <div class="flex flex-col mb-5">
                    <label for="password_confirmation" class="mb-1 text-xs tracking-wide text-gray-600">Confirm password:</label>
                    <div class="relative">
                        <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                            <i class="fas fa-at text-blue-500"></i>
                        </div>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="text-sm placeholder-gray-500 pl-4 pr-4 rounded-md border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400 " placeholder="Enter your password_confirmation" value="{{ old('password_confirmation') }}"/>
                    </div>
                    @error('password_confirmation')
                        <div class="error text-red-600">
                            {{ $message }}
                        </div>                    
                    @enderror  
                </div>
                <div class="flex w-full">
                    <button type="submit" class="mt-2 focus:outline-none text-white text-sm sm:text-base bg-blue-500 hover:bg-blue-600 rounded-md py-2 w-full transition duration-150 ease-in">
                        <span class="mr-2 uppercase">Reset</span>                        
                    </button>
                </div>
            </form>
        </div>
    </div>    
    <div class="flex justify-center items-center mt-6">        
        <a href="{{ route('index') }}" class="text-xs ml-2 text-blue-500 font-semibold hover:underline">Back to home</a>       
    </div>
</div>

@endsection