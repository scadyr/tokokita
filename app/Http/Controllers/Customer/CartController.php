<?php

namespace App\Http\Controllers\Customer;

use App\Models\Cart;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_id = $request->input('produk_id');
        $product_qty = $request->input('produk_qty');

        if (Auth::check()) {
            $produk_cek = Produk::where('id',$product_id)->first();

            if($produk_cek){
                if (Cart::where('produk_id',$product_id)->where('user_id',Auth::id())->exists()) {
                    return response()->json(['status' => $produk_cek->nama." sudah ada dalam keranjang"]);
                }else{

                }

                $cartItem = new Cart();
                $cartItem->produk_id = $product_id;
                $cartItem->user_id = Auth::id();
                $cartItem->produk_qty = $product_qty;
                $cartItem->save();
                return response()->json(['status' => $produk_cek->nama." berhasil ditambahkan ke keranjang "]);
            }
        }else{
            return response()->json(['status' => "Silakan login terlebih dulu"]);
        }
    }

    public function viewcart()
    {
        $datacart = Cart::where('user_id', Auth::id())->get();
        return view('customer.cart', compact('datacart'));
    }

    public function deleteProduct(Request $request)
    {
        if (Auth::check()) {
            $product_id = $request->input('prod_id');
            if (Cart::where('produk_id',$product_id)->where('user_id',Auth::id())->exists()) {
                $cartItem = Cart::where('produk_id',$product_id)->where('user_id',Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => "Produk berhasil dihapus"]);
            }
        }else{
            return response()->json(['status' => "Silakan login terlebih dulu"]);
        }
    }
}
