<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Get all posts
    public function index()
    {
        return Products::all();
    }

    // Create a new post
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'article' => 'required',
        ]);

        return Products::create($request->all());
    }

    // Get a single post by ID
    public function show($id)
    {
        return Products::find($id);
    }

    // Update a post by ID
    public function update(Request $request, $id)
    {
        $post = Products::find($id);

        $request->validate([
            'title' => 'string|max:255',
            'author' => 'string|max:255',
            'article' => 'nullable',
        ]);

        $post->update($request->all());

        return $post;
    }

    // Delete a post by ID
    public function destroy($id)
    {
        return Products::destroy($id);
    }
}
