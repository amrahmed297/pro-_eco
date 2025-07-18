<?php

namespace App\Http\Controllers;
use App\Models\cat;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */


public function index(Request $request)
{
    $categoryId = $request->query('category');

    $categories = Cat::all();

    $products = Product::when($categoryId, function ($query, $categoryId) {
        return $query->where('category_id', $categoryId);
    })->paginate(6);

    return view('cat', compact('products', 'categories', 'categoryId'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
