<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Supplier;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil semua produk
        $query = Products::with('supplier');


        // Cek apakah ada parameter 'search' di request
        if ($request->has('search') && $request->search != '') {


            // Melakukan pencarian berdasarkan nama produk atau informasi
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('product_name', 'like', '%' . $search . '%');
            });
        }


        // Ambil produk dengan paginasi
        $products = $query->paginate(2);
        //return $products;

        return view("master-data.product-master.index-product", compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::all();
        return view("master-data.product-master.create-products", compact('suppliers'));
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
            'supplier_id' => 'required|exists:suppliers,id',
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
        $product = Products::findorfail($id);
        return view('master-data.product-master.detail-product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Products::findOrFail($id);
        $suppliers = Supplier::all(); // Ambil semua supplier
        return view('master-data.product-master.edit-product', compact('product', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'information' => 'nullable|string',
            'qty' => 'required|integer|min:1',
            'producer' => 'required|string|max:255',
            'supplier_id' => 'required|exists:suppliers,id', // Validasi supplier_id
        ]);

        $product = Products::findOrFail($id);

        $product->update([
            'product_name' => $request->product_name,
            'unit' => $request->unit,
            'type' => $request->type,
            'information' => $request->information,
            'qty' => $request->qty,
            'producer' => $request->producer,
            'supplier_id' => $request->supplier_id, // Update supplier_id
        ]);

        return redirect()->route('product-index')->with('success', 'Product updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Products::find($id);
        if ($product) {
            $product->delete();
            return redirect()->route('product')->with('success', 'product berhasil dihapus.');
        }
        return redirect()->route('product')->with('error', 'product tidak ditemukan.');
    }

    public function exportExcel()
    {
        return Excel::download(new ProductsExport, 'product.xlsx');
    }

    public function exportPDF()
    {
        $products = Products::all(); // Ambil semua data produk
        $pdf = Pdf::loadView('exports.products-pdf', compact('products'));
        return $pdf->download('products.pdf'); // Unduh file PDF
    }
}