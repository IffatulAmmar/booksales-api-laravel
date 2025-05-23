<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
                return response()-> json([
            "success" => true,
            "message" => "Get All Authors",
            "data" => $authors
        ],200);
        // return view('authors', ['authors' => $authors]);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'data' => $validator->errors()
            ], 422);
        }

        $author = Author::create([
            'name' => $request->name,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Author: Firstname Lastname',
            'data' => $author
        ], 200);
    }

    function show ($id){
        $author = Author::findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => 'Get Author Detail',
            'data' => $author
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'data' => $validator->errors()
            ], 422);
        }

        if ($request->filled('name')) {
            $author->name = $request->name;
        }

        $author->save();

        return response()->json([
            'success' => true,
            'message' => 'Author Updated',
            'data' => $author
        ], 200);
    }

    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return response()->json([
            'success' => true,
            'message' => 'Author Deleted',
            'data' => $author
        ], 200);
    }

}
