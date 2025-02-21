<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\CartProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartProductController extends Controller
{
    // GET: Ambil semua produk dalam cart berdasarkan user_id
    public function index()
    {
        $user_id = Auth::id(); // Menggunakan Auth::id() untuk user login

        $cartItems = CartProduct::where('user_id', $user_id)->with(['product', 'user'])->get();

        return view('clients.cart', compact('cartItems'));
    }

    // POST: Tambah produk ke cart
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user_id = Auth::id();

        // Cek apakah produk sudah ada di cart user ini
        $cartItem = CartProduct::where('user_id', $user_id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            $cartItem->increment('qty', $request->qty);
        } else {
            CartProduct::create([
                'user_id' => $user_id,
                'product_id' => $request->product_id,
                'qty' => $request->qty
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart');
    }

    // PUT: Update item dalam cart
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'qty' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $cartItem = CartProduct::find($id);

        if (!$cartItem) {
            return redirect()->route('cart.index')->with('error', 'Cart item not found');
        }

        $cartItem->update(['qty' => $request->qty]);

        return redirect()->route('cart.index')->with('success', 'Cart item updated successfully');
    }

    // DELETE: Hapus item dari cart
    public function destroy($id)
    {
        $cartItem = CartProduct::find($id);

        if (!$cartItem) {
            return redirect()->route('cart.index')->with('error', 'Cart item not found');
        }

        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Cart item deleted successfully');
    }
}
