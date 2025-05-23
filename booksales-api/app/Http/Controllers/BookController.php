<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'genre'])->get();
            return response()-> json([
            "success" => true,
            "message" => "Get All Books",
            "data" => $books
        ],200);
        // return view('books', compact('books'));

    }
    public function store(Request $request){
        //1. validator
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id',
        ]);
        //2. check validator error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'data' => $validator->errors()
            ], 422);
        }
        //3. upload image
        $image=$request->file('cover_photo');
        $image->store('books', 'public');

        //4. insert data
        $book = Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'cover_photo' => $image->hashName(),
            'genre_id' => $request->genre_id,
            'author_id' => $request->author_id
        ]);
        //5. response
        return response()->json([
            'success' => true,
            'message' => 'Book Created',
            'data' => $book
        ], 200);
    }

    public function show($id){
        $book = Book::with(['author', 'genre'])->findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => 'Get Book Detail',
            'data' => $book
        ], 200);
    }

public function update(Request $request, $id)
{
    $book = Book::findOrFail($id);

    $validator = Validator::make($request->all(), [
        'title' => 'sometimes|required|string|max:255',
        'description' => 'sometimes|required|string',
        'price' => 'sometimes|required|numeric',
        'stock' => 'sometimes|required|integer',
        'cover_photo' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'genre_id' => 'sometimes|required|exists:genres,id',
        'author_id' => 'sometimes|required|exists:authors,id',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => 'Validation Error',
            'data' => $validator->errors()
        ], 422);
    }

    $data = $request->only([
        'title',
        'description',
        'price',
        'stock',
        'genre_id',
        'author_id',
    ]);

    if ($request->hasFile('cover_photo')) {
        Log::info('File detected: ' . $request->file('cover_photo')->getClientOriginalName());

        // Delete old file jika ada
        if ($book->cover_photo && Storage::disk('public')->exists('books/' . $book->cover_photo)) {
            Storage::disk('public')->delete('books/' . $book->cover_photo);
        }

        $image = $request->file('cover_photo');
        $image->store('books', 'public');
        $data['cover_photo'] = $image->hashName();
    } else {
        Log::info('No file detected on cover_photo input.');
    }

    $book->update($data);

    $book->refresh();

    return response()->json([
        'success' => true,
        'message' => 'Book Updated',
        'data' => $book
    ], 200);
}





    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        // delete image file
        Storage::disk('public')->delete('books/' . $book->cover_photo);

        // delete record
        $book->delete();

        return response()->json([
            'success' => true,
            'message' => 'Book Deleted',
            'data' => $book
        ], 200);
    }

}
