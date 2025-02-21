<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // GET ALL CATEGORIES (Menampilkan Semua Kategori)
    public function index()
    {
        $categories = Category::all();

        return view('clients.category.index', compact('categories'));
    }

    // SHOW CATEGORY FORM (Menampilkan Form Tambah Kategori)
    public function create()
    {
        return view('clients.category.create');
    }

    // STORE CATEGORY (Menyimpan Kategori Baru)
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|string',
            'category_name' => 'required|string|max:255|unique:categories'
        ]);

        Category::create([
            'image' => $request->image,
            'category_name' => $request->category_name
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    // SHOW CATEGORY BY ID (Menampilkan Detail Kategori)
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('clients.category.show', compact('category'));
    }
}
