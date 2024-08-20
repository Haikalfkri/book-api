<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return Book::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'string|nullable'
        ]);

        $book = Book::create($request->all());

        if($book) {
            return response()->json($book, 201);
        } else {
            return response()->json([
                'status' => 201,
                'messages' => 'Add Book Failder'
            ], 201);
        }
    }

    public function show(Book $book)
    {
        return $book;
    }

    public function update(Request $request, Book $book) 
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'string|nullable',
        ]);

        $book->update($request->all());

        return response()->json($book);
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return response()->json([
            'message' => 'Book Deleted Successfully'
        ]); 
    }
}
