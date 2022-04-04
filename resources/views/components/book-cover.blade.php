<div class="relative rounded-md">
    <img src="{{ $img }}" alt="cover" class="w-[15rem] h-[21rem] rounded-md hover:opacity-80 transition duration-150">
        
    {{-- free  --}}
    {{-- <div class="flex items-center px-3 py-1 absolute text-gray-300 top-0 bg-emerald-700 rounded-br-lg rounded-tl-md">
        <img src="/img/free.png" alt="free" class="w-6 h-6 mr-2">
        <p>Free</p>
    </div> --}}

    
    {{-- premium --}}
    <div class="flex items-center px-3 py-1 absolute {{ $type == 0 ? 'text-gray-300 top-0 bg-emerald-700' : 'bg-orange-600 text-gray-800 top-0' }} rounded-br-lg rounded-tl-md">            
        <img src="/img/premium_1.png" alt="premium" class="w-6 h-6 mr-2">
        <p>{{ $type == 0 ? 'Free' : 'Premium' }}</p>
    </div>
</div> 