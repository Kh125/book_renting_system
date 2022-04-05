<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Book Rental Service</title>
    <style>
    .scroll-hidden::-webkit-scrollbar {
        height: 0px;
        background: transparent; /* make scrollbar transparent */
    }
    </style>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body>     
    @if (!\Request::is('login') && !\Request::is('register') && !\Request::is('forget-password'))
    <header x-data="{ isOpen: false }" class="bg-white shadow">
        <nav class="container mx-auto px-6 py-3">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <a class="text-gray-800 text-xl font-bold md:text-2xl hover:text-gray-700" @auth
                        href="{{ route('bookIndex') }}"
                        @endauth @guest
                            href="{{ route('index') }}"
                        @endguest>BookRental</a>
                        @auth
                            <!-- Search input on desktop screen -->
                            <div class="mx-10 hidden md:block">
                                {{-- <livewire:search-box /> --}}
                            </div>                            
                        @endauth
                    </div>
            
                    <!-- Mobile menu button -->
                    <div class="flex md:hidden">
                        <button @click="isOpen = !isOpen" type="button" class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600" aria-label="toggle menu">
                            <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                                <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
        
                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div class="md:flex items-center relative" :class="isOpen ? 'block' : 'hidden'">
                    <div class="flex flex-col mt-2 md:flex-row md:mt-0 md:mx-1">
                        @auth
                            <a class="my-1 text-sm text-gray-700 leading-5 hover:text-blue-600 hover:underline md:mx-4 md:my-0" href="{{ route('bookIndex') }}">Home</a>
                            <a class="my-1 text-sm text-gray-700 leading-5 hover:text-blue-600 hover:underline md:mx-4 md:my-0" href="{{ route('about') }}">About</a>
                            <a class="my-1 text-sm text-gray-700 leading-5 hover:text-blue-600 hover:underline md:mx-4 md:my-0" href="{{ route('contact') }}">Contact</a>
                        @endauth
                    </div>
            
                    <div class="flex items-center py-2 -mx-1 md:mx-0">                        
                        @guest
                        <a href="{{ route('login') }}" class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-gray-500 font-medium text-white leading-5 hover:bg-blue-600 md:mx-2 md:w-auto" href="#">Login</a>
                        <a href="{{ route('register') }}" class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-blue-500 font-medium text-white leading-5 hover:bg-blue-600 md:mx-0 md:w-auto" href="#">Register</a>
                        @endguest                        
                    </div>
                    @auth                                            
                    <div class="py-2 -mx-1 md:mx-0">
                        <img src="/img/avatar.png" alt="Profile" class="rounded-full w-8 h-8 hover:ring-1 hover:ring-offset-0 hover:ring-green-600 transition duration-300 hover:p-1" id="img-dd">
                        <div class="dropdown bg-white absolute w-28 shadow-lg md:right-0 md:mt-3 mt-2 border border-gray-100 rounded-sm">
                            <a href="{{ route('userSetting') }}" class="block py-1 px-3 text-center border-b border-gray-300 hover:bg-gray-100 traisition duration-200">Setting</a>
                            <div class="">
                                @auth
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="hover:bg-gray-100 traisition duration-200 py-1 px-3 text-center w-full">Logout</button>                        
                                </form>                    
                                @endauth
                            </div>                            
                        </div>
                    </div>                    
                        <!-- Search input on mobile screen -->
                    <div class="mt-3 md:hidden">
                        <input type="text" class="w-full px-4 py-3 leading-tight text-sm text-gray-700 bg-gray-100 rounded-md placeholder-gray-500 focus:outline-none focus:bg-white focus:shadow-outline" placeholder="Search" aria-label="Search">
                    </div>                        
                    @endauth
                </div>
            </div>        
        </nav>
    </header>     
    @endif  
         
    @if (session('success_status'))
        <div class="text-sm text-green-700">{{ session('success_status') }}</div>
    @endif 
    @if (session('errors_status'))
        <div>{{ session('errors_status') }}</div>
    @endif       
    @if (session('loginErrors'))
        <div>{{ session('loginErrors') }}</div>
    @endif   
    
    @yield('content')
    @yield('script')
    @auth            
    <script>
        const dropDownBox = document.querySelector('.dropdown');
        dropDownBox.style.display = "none";
        let ct = false;
        const imgdd = document.getElementById('img-dd');
        imgdd.addEventListener('click', function(){
            ct = !ct;            
            if(ct === true){
                dropDownBox.style.display = "block";
            }else{
                dropDownBox.style.display = "none";
            }
        });
    </script>
    @endauth
</body>
</html>