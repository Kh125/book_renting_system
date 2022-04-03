<?php

namespace App\Http\Controllers;

use App\Models\Books;
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
            'book'=> $book
        ]);
    }
    
    public function rentBook(Books $book){
        $viewmodel = new RentViewModel($book);
        return view('books.rent', $viewmodel);
    }

    public function rentBookProcess(){
        return 'Rentbook Process';
    }
}
