<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'genre'])->get();
            return response()-> json([
            "success" => true,
            "message" => "Get All Genres",
            "data" => $books
        ],200);
        // return view('books', compact('books'));

    }

}
