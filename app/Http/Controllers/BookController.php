<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    
    public function index()
    {
        $books = Book::orderBy('year','DESC')->get();
        return response()->json($books);
    }

    public function index_id($id)
    {
        $book = Book::findOrFail($id);
        return response()->json($book);
    }

    public function store(Request $request)
    {
        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->year = $request->year;
        $img = $request->file('image');
        $img_name = 'book_'.$book->title.'.'.$img->getClientOriginalExtension();
        $path = $request->file('image')->move(public_path('/book_images/'),$img_name);
        $book->image = $img_name;
        if($book->save()){
            return response()->json(["book is added successfully "],200);
        }
    }

    public function update(Request $request)
    {
        $book = Book::findOrFail($request->id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->year = $request->year;
        $img = $request->file('image');
        if($img){
            $img_name = 'book_'.$book->title.'.'.$img->getClientOriginalExtension();
            $path = $request->file('image')->move(public_path('/book_images/'),$img_name);
            $book->image = $img_name;
        }
        if($book->save()){
            return response()->json(["book is updated successfully "],200);
        }
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        if($book->delete()){
            return response()->json(["book is deleted successfully "],200);
        }
    }
}
