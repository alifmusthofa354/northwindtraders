<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Get all posts
    public function index()
    {
        $products = Products::all();

        return response()->json([
            'message' => 'Success',
            'status' => 200,
            'data' => $products,
        ], 200);
    }

    // Create a new post
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|min:3',
        ]);
        $product = Products::create($request->all());

        return response()->json([
            'message' => 'Success',
            'status' => 201,
            'data' => $product,
        ], 201);
    }

    // Get a single post by ID
    public function show(string $id)
    {
        $product = Products::find($id, ['product_id', 'product_name', 'supplier_id', 'category_id']);

        return response()->json([
            'message' => 'Success',
            'status' => 200,
            'data' => $product,
        ], 200);
    }
}
