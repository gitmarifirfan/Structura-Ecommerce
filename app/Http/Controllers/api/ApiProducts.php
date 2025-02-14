<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiProducts extends Controller
{

    // TODO : GET ALL
    public function getAllProducts()
    {
        // Ambil semua produk dari database
        $products = product::with('categories')->get();
        // $products = Products::all();

        // Jika data kosong, kirim response khusus
        if ($products->isEmpty()) {
            return response()->json([
                'message' => 'No products found',
                'data' => []
            ], 404);
        }

        return response()->json([
            'message' => 'Fetching all data products',
            'data' => $products
        ], 200);
    }

    // TODO : POST
    public function storeProduct(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'image' => 'required|string',
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Simpan data ke database
        $product = product::create($request->all());

        return response()->json([
            'message' => 'Product created successfully',
            'data' => $product->load('categories')
        ], 201);
    }

    // TODO : GET By ID:
    public function getProductById($id)
    {
        // Cari produk berdasarkan ID
        $product = product::with('categories')->find($id);

        // Jika produk tidak ditemukan
        if (!$product) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Fetching product data',
            'data' => $product
        ], 200);
    }
}
