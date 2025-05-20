<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    public function welcome(){
        $genres = Genre::all();

        return view('welcome', ['genres' => $genres]);
    }
    public function index(){
        $genres = Genre::all();
        return response()-> json([
            "success" => true,
            "message" => "Get All Genres",
            "data" => $genres
        ],200);
        // return view('genres', ['genres' => $genres]);
    }
    public function store(Request $request){
        //validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        //check validator
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'data' => $validator->errors()
            ], 422);
        }

        //insert
        $genre = Genre::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        //response
        return response()->json([
            'success' => true,
            'message' => 'Genre Created',
            'data' => $genre
        ], 200);
    }
}
