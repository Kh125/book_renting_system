<?php

namespace App\Http\Livewire;

use App\Models\Books;
use Livewire\Component;

class SearchBox extends Component
{
    public $search="Rebeka";
    public function render()
    {
        $books = [];
        return view('livewire.search-box', [
            'books'=> Books::query()
            ->where('name', 'LIKE', "%{$this->search}%") 
            ->orWhere('description', 'LIKE', "%{$this->search}%")->get()
        ]);
    }
}
