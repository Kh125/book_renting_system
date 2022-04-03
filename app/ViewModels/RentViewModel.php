<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class RentViewModel extends ViewModel
{
    public $book;
    public function __construct($book)
    {
        $this->book = $book;
    }

    public function book(){
        
        return collect($this->book)->merge([
            'availability'=> $this->availability(),
        ]);
    }

    private function availability(){
        $availability = $this->book->book_count - $this->book->rented->count();
        if($availability > 0){
            $out = $availability.' books';
            return $out;
        }else{
            return 'Out of stock';
        }
    }
}
