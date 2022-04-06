<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Rented;
use App\ViewModels\BackRentBookViewModel;
use App\ViewModels\BooksViewModel;
use App\ViewModels\RentViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function bookIndex(){
        $books = Books::all();
        $viewmodel = new BooksViewModel($books);
        return view('books.index', $viewmodel);
    }

    public function bookShow(Books $book){
        return view('books.show', [
            'book'=> $book,
            'book_img'=>'/img/'.$book->book_cover_img
        ]);
    }
    
    public function rentBook(Books $book){
        // $totRentBook =         
        $viewmodel = new RentViewModel($book);
        return view('books.rent', $viewmodel);
    }

    public function rentBookProcess(Request $request){
        $book = Books::find($request->book);        
        $rent = Auth::user()->rentedBooks()->create([
            'books_id'=>$request->book,
            'rented_date'=>date("Y-m-d"),
            'rented_price'=>$book->rental_price
        ]);
        if($rent){
            return back()->with('success_status', $book->name.' was rented');
        }
        
    }

    public function backBook(Books $book){                
        $viewmodel = new BackRentBookViewModel($book);        
        return view('books.back', $viewmodel);
    }

    public function backBookProcess(Request $request){                
        $rentBook = Auth::user()->rentedBooks->where('books_id', $request->book)->first();
        
        // add total bill and overdue day to renteds table before soft delete
        $rentBook->total_bill = $request->total_bill;        
        $rentBook->overdue_day= $request->overdue_day;
        $rentBook->save();

        // soft delete
        $rentBook->delete();  
              
        return redirect()->route('userSetting')->with('success_status', 'Successfully collected by BookRental. Thank you.');
    }
}
