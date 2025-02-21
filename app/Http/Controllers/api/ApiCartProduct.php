<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\CartProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiCartProduct extends Controller
{
    // TODO : GET Ambil semua produk dalam cart berdasarkan user_id
    public function getUserCart()
{
    $user_id = auth()->id();

    $cartItems = CartProduct::where('user_id', $user_id)->with(['product', 'user'])->get();

    if ($cartItems->isEmpty()) {
        return response()->json([
            'message' => 'Cart is empty',
            'data' => []
        ], 404);
    }

    return response()->json([
        'message' => 'Fetching user cart',
        'data' => $cartItems
    ], 200);
}

    // TODO POST: Tambah produk ke cart
    public function addToCart(Request $request)
    {
        // Validasi request
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Cek apakah produk sudah ada di cart user ini
        $cartItem = CartProduct::where('user_id', $request->user_id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            // Jika sudah ada, update qty
            $cartItem->increment('qty', $request->qty);
        } else {
            // Jika belum ada, buat cart baru
            $cartItem = CartProduct::create([
                'user_id' => $request->user_id,
                'product_id' => $request->product_id,
                'qty' => $request->qty
            ]);
        }

        return response()->json([
            'message' => 'Product added to cart',
            'data' => $cartItem
        ], 201);
    }

    // TODO PUT: update
    public function updateCartItem(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'qty' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Cari item di cart
        $cartItem = CartProduct::find($id);

        if (!$cartItem) {
            return response()->json([
                'message' => 'Cart item not found'
            ], 404);
        }

        // Update jumlah barang (qty)
        $cartItem->update(['qty' => $request->qty]);

        return response()->json([
            'message' => 'Cart item updated successfully',
            'data' => $cartItem
        ], 200);
    }

    // TODO : DELETE
    public function deleteCartItem($id)
    {
        // Cari item di cart
        $cartItem = CartProduct::find($id);

        if (!$cartItem) {
            return response()->json([
                'message' => 'Cart item not found'
            ], 404);
        }

        // Hapus item dari cart
        $cartItem->delete();

        return response()->json([
            'message' => 'Cart item deleted successfully'
        ], 200);
    }
}
