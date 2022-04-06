<div style="width: 165px" class="mt-12 bg-white shadow-md rounded-md">
    <img src="/img/{{$book['book_cover_img']}}" alt="cover" style="width: 165px; height: 170px" class="rounded-t-md hover:opacity-90 transition duration-200 ease-in">
    <div class="px-2">
        <span class="text-xs font-semibold text-gray-600 -mt-2">Title</span>
        <p class="font-semibold truncate text-ellipsis text-gray-800">{{ $book['name'] }}</p>                                   
    </div>
    <div class="flex items-center justify-center mt-2 border-t border-gray-300">
        <a href="{{ route('bookShow', $book['id']) }}" class="hover:rounded-sm w-1/2 px-4 py-1 text-center text-green-600 hover:underline hover:shadow-md hover:bg-green-600 hover:text-white transition duration-150 ease-in">View</a> 
        <a href="{{ route('rentBook', $book['id']) }}" class="hover:rounded-sm w-1/2 px-4 py-1 text-center text-green-600 hover:underline hover:shadow-md hover:bg-green-600 hover:text-white transition duration-150 ease-in">Rent</a> 
    </div>                
</div>