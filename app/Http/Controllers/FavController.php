<?php

namespace App\Http\Controllers;

use App\Models\Fav;
use App\Models\Book;
use Illuminate\Http\Request;

class FavController extends Controller
{
    public function index()
    {
        $read_books = Fav::orderBy('id','asc')->get();
        $books = [];
        foreach($read_books as $read_book){
            $book = Book::findOrFail($read_book->book_id);
            array_push($books, $book);
        }
        return response()->json($books);
    }

    public function store(Request $request)
    {
        $book = new Fav();
        $book->book_id = $request->book_id;
        if($book->save()){
            return response()->json(["book is added to Fav List successfully "],200);
        }
    }
    public function destroy($id)
    {
        $book = Fav::findOrFail($id);
        if($book->delete()){
            return response()->json(["book is deleted from Fav List successfully "],200);
        }
    }
}
