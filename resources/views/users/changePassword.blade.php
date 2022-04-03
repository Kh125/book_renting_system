@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="my-10 mx-auto md:w-[20rem] px-6 md:px-0">
        <h4 class="text-lg font-semibold mt-4">Change your password</h4>
        <form action="" method="POST" class="mt-6 password-form" id="password-form">
            @csrf
            <div class="mt-3" id="old_password">
                <label for="name" class="block text-sm text-gray-500">Old Password</label>
                <input type="password" name="old_password" class="old_password mt-1 bg-gray-100 rounded-md shadow-sm focus:outline-none pl-3 py-2 w-full">
                @error('old_password')
                    <div class="error text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-3">
                <label for="name" class="block text-sm text-gray-500">New Password</label>
                <input type="password" name="password" class="mt-1 bg-gray-100 rounded-md shadow-sm focus:outline-none pl-3 py-2 w-full">
                @error('password')
                    <div class="error text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-3">
                <label for="name" class="block text-sm text-gray-500">Confirm Password</label>
                <input type="password" name="password_confirmation" class="mt-1 bg-gray-100 rounded-md shadow-sm focus:outline-none pl-3 py-2 w-full">
            </div>
            <div class="mt-3">
                <button type="submit" class="submit-button mr-6 px-4 py-2 bg-green-500 rounded-md hover:shadow-md transition duration-200">Save</button>
                <a href="{{ route('userSetting') }}" class="text-sm hover:underline text-blue-700">Back</a>
            </div>            
        </form>
    </div>
</div>
@endsection

@section('script')
    <script>
        const submit = document.getElementById('password-form');        
        submit.addEventListener('submit', function(e){
            const old_div = document.querySelector('.old_password_error');
            old_div?.parentNode.removeChild(old_div);
            const old_password = document.querySelector('.old_password').value;
            if(old_password.length === 0){
                const div = document.createElement('div');
                div.style.color = "red";
                div.style.fontSize = "14px";
                const text = document.createTextNode("Password value can't be empty");
                div.appendChild(text);      
                div.classList.add('old_password_error')          
                const current_div = document.getElementById('old_password');
                current_div.append(div);
                e.preventDefault()
            }
            // console.log(old_password);
            
        });        
    </script>
@endsection