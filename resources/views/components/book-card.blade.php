<div style="width: 140px;height:270px" class="mt-12">
    <img src="/img/{{$book['book_cover_img']}}" alt="cover" style="width: 140px; height: 200px">
    <div>
        <h4>{{ $book['name'] }}</h4>                           
    </div>
    <div class="flex items-center justify-between mt-2">
        <a href="{{ route('bookShow', $book['id']) }}" class="bg-black rounded-sm px-4 py-1 text-center text-white">View</a> 
        <a href="{{ route('rentBook', $book['id']) }}" class="bg-black rounded-sm px-4 py-1 text-center text-white">Rent</a> 
    </div>                
</div>