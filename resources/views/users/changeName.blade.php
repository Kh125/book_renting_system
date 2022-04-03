@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="my-10 mx-auto md:w-[20rem] px-6 md:px-0">
        <h4 class="text-lg font-semibold mt-4">Change your name</h4>
        <form action="" method="POST" class="mt-6" id="name-form">
            @csrf
            <div class="" id="old_name">
                <label for="name" class="block text-sm">Name</label>
                <input type="text" name="name" value="{{ Auth::user()->name }}" class="old_name mt-1 bg-gray-100 rounded-md shadow-sm focus:outline-none pl-3 py-2 w-full ">
                @error('name')
                    <div class="error text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-3 ">
                <button type="submit" class="mr-6 px-4 py-2 bg-green-500 rounded-md hover:shadow-md transition duration-200">Save</button>
                <a href="{{ route('userSetting') }}" class="text-sm hover:underline text-blue-700">Back</a>
            </div>            
        </form>
    </div>
</div>
@endsection

@section('script')
    <script>
        const submit = document.getElementById('name-form');        
        submit.addEventListener('submit', function(e){            
            const old_div = document.querySelector('.old_name_err');
            old_div?.parentNode.removeChild(old_div);
            const old_name = document.querySelector('.old_name').value;
            if(old_name.length === 0){
                const div = document.createElement('div');
                div.style.color = "red";
                div.style.fontSize = "14px";
                const text = document.createTextNode("Name can't be empty");
                div.appendChild(text);      
                div.classList.add('old_name_err')          
                const current_div = document.getElementById('old_name');
                current_div.append(div);
                // console.log('{{ Auth::user()->name }}');
                e.preventDefault();
            }else if(old_name.toLowerCase() === '{{ Auth::user()->name }}'.toLowerCase()){
                const div = document.createElement('div');
                div.style.color = "red";
                div.style.fontSize = "14px";
                const text = document.createTextNode("No changes have been made.");
                div.appendChild(text);      
                div.classList.add('old_name_err')          
                const current_div = document.getElementById('old_name');
                current_div.append(div);
                e.preventDefault()
            }                    
        });        
    </script>
@endsection