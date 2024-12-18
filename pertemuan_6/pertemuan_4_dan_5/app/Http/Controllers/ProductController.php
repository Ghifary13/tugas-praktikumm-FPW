<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return view('layouts-percobaan.php');  //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("master-data\product-master\create-products");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi data input
    $validasi_data = $request->validate([
        'product_name' => 'required|string|max:255',
        'unit' => 'required|string',
        'type' => 'required|string|max:255',
        'information' => 'nullable|string',
        'qty' => 'required|integer',
        'producer' => 'required|string|max:255',
    ]);

    // Menyimpan data ke database
    Products::create($validasi_data);


    // Redirect dengan pesan sukses
    return redirect()->back()->with('success', 'Product created successfully!');
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
