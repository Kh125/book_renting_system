<form method="get">
    <input wire:model="search" type="text" class="w-32 lg:w-64 px-4 py-3 leading-tight text-sm text-gray-700 bg-gray-100 rounded-md placeholder-gray-500 border border-transparent focus:outline-none focus:bg-white focus:shadow-outline focus:border-gray-400" placeholder="Search" aria-label="Search">
    <div wire:loading class="spinner top-0 right-0 mt-4 mr-4">Loading</div>
    <div wire:loading.remove>
        @if (count($books) > 0)
        <div class="w-full shadow-xl bg-white border border-bg-gray-200">
            @foreach ($books as $book)
                <a href="" class="block border-b border-bg-black">{{ $book->name }}</a>            
            @endforeach
        </div>
        @endif 
    </div>   
</form>

