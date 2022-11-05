<?php

namespace App\Http\Controllers;

use App\Models\Read;
use App\Models\Book;
use Illuminate\Http\Request;

class ReadController extends Controller
{
    public function index()
    {
        $read_books = Read::orderBy('id','asc')->get();
        $books = [];
        foreach($read_books as $read_book){
            $book = Book::findOrFail($read_book->id);
            array_push($books, $book);
        }
        return response()->json($books);
    }

    public function store(Request $request)
    {
        $book = new Read();
        $book->book_id = $request->book_id;
        if($book->save()){
            return response()->json(["book is added to Read List successfully "],200);
        }
    }
    public function destroy($id)
    {
        $book = Read::findOrFail($id);
        if($book->delete()){
            return response()->json(["book is deleted from Read List successfully "],200);
        }
    }
}
