<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BookUploadController extends Controller
{
    public function index(){
        return view('upload.index');
    }

    public function process(Request $request){
        $validate = $request->validate([
            'title'=>'required|max:255',
            'description'=>'required',
            'rental_price'=>'required|max:255',
            'book_count'=>'required|max:255'            
        ]);

        if($validate){            
            $book = Books::create([
                'name'=> $request->title,
                'author'=> $request->author == "" ? "Unknown" : $request->author,
                'description'=> $request->description,
                'genres'=> $request->genres == "" ? "Unknown" : $request->genres,
                'isbn_id'=> $request->isbnid == "" ? "Unknown" : $request->isbnid,
                'rental_price'=> (double)$request->rental_price,
                'book_count'=> (int)$request->book_count,
                'book_type'=> $request->book_type == "" ? 0 : (int)$request->book_type,
                'book_cover_img'=> "book" . rand(1,24) . ".jpg"
            ]);
        }
    }
}
