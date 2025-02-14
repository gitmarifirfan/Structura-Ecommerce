<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiCategory extends Controller
{
    // TODO : GET ALL
    public function getAllCategories()
    {
        $categories = category::all();

        if ($categories->isEmpty()) {
            return response()->json([
                'message' => 'No categories found',
                'data' => []
            ], 404);
        }

        return response()->json([
            'message' => 'Fetching all categories',
            'data' => $categories
        ], 200);
    }

    // TODO : POST
    public function storeCategory(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'image' => 'required|string',
            'category_name' => 'required|string|max:255|unique:categories'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Simpan kategori baru
        $category = category::create([
            'image' => $request->image,
            'category_name' => $request->category_name
        ]);

        return response()->json([
            'message' => 'Category created successfully',
            'data' => $category
        ], 201);
    }

    // TODO : GET By ID
    public function getCategoryById($id)
    {
        // Cari kategori berdasarkan ID
        $category = Category::find($id);

        // Jika kategori tidak ditemukan
        if (!$category) {
            return response()->json([
                'message' => 'Category not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Fetching category data',
            'data' => $category
        ], 200);
    }
}
