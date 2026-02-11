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
        $product = Products::create([
            'product_id' => 78,
            'product_name' => $request->name,
            'supplier_id' => 1,
            'category_id' => 3,
            'quantity_per_unit' => '10 boxes x 30 bags',
            'unit_price' => 18,
            'units_in_stock' => 39,
            'units_on_order' => 0,
            'reorder_level' => 10,
            'discontinued' => 1,
        ]);

        return $product;

        // return Products::create($request->all());
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
