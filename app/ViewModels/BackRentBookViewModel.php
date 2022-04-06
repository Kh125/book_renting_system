<?php

namespace App\ViewModels;

use Illuminate\Support\Facades\Auth;
use Spatie\ViewModels\ViewModel;

class BackRentBookViewModel extends ViewModel
{
    public $book;
    public function __construct($book)
    {
        $this->book = $book;
    }

    public function rent(){
        $overdueDay = 0.0;
        $rentData =  Auth::user()->rentedBooks->where('books_id', $this->book->id)->last();
        $curDate = strtotime(date("Y-m-d"));
        $rentDate = strtotime($rentData->rented_date);        
        $day = ($curDate-$rentDate)/86400;
        $overdueFine = $this->overdueFine($day);
        return collect($this->book)->merge([
            'overdue_day'=> $this->overdueDay($day),
            'day' => $day,            
            'total_bill'=> $overdueFine + $this->book->rental_price,
            'book_cover_img'=> '/img/' . $this->book->book_cover_img,
            'overdue_fine'=> $overdueFine,
        ]);
    }

    private function overdueFine($day){
        $overdueFine = 0.0;
        $rentDay = Auth::user()->user_type == 0 ? 5 : 12;
        $finePerDay = 0.2;

        if($day > $rentDay){
            $overdueDay = $day - $rentDay;
            $overdueFine = $overdueDay * $finePerDay;
        }

        return $overdueFine;
    }

    private function overdueDay($day){
        return $day - (Auth::user()->user_type == 0 ? 5 : 12);
    }
}
