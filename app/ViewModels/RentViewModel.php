<?php

namespace App\ViewModels;

use Illuminate\Support\Facades\Auth;
use Spatie\ViewModels\ViewModel;

class RentViewModel extends ViewModel
{
    public $book;
    public function __construct($book)
    {
        $this->book = $book;
    }

    public function book(){
        $rentBook = Auth::user()->rentedbooks->where('books_id', $this->book->id)->count();
        $totRentedBooks = Auth::user()->rentedbooks->count();
        return collect($this->book)->merge([
            'availability'=> $this->availability(),
            'rented' => $rentBook == 0 ? false : true,
            'totRentedBooks'=> $totRentedBooks,
            'maxCapacity'=> Auth::user()->shelf_capacity,
            'userType'=> Auth::user()->user_type,
            'book_cover_img'=> '/img/' . $this->book->book_cover_img
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
