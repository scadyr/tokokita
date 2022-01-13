<?php

namespace App\Http\Controllers\Customer;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailOrder;
use App\Models\Order;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $datacheckout_1 = Cart::where('user_id', Auth::id())->get();
        // cek stok
        foreach($datacheckout_1 as $item){
            if (!Produk::where('id',$item->produk_id)->where('qty','>=',$item->produk_qty)->exists()) {
                $hapusitem = Cart::where('user_id', Auth::id())->where('produk_id',$item->produk_id)->first();
                $hapusitem->delete();
            }
        }
        $datacheckout = Cart::where('user_id', Auth::id())->get();
        return view('customer.checkout', compact('datacheckout'));
    }

    public function order(Request $request)
    {
        $dataorder = new Order();
        $dataorder->nama = $request->input('nama');
        $dataorder->email = $request->input('email');
        $dataorder->alamat = $request->input('alamat');
        $dataorder->no_hp = $request->input('no_hp');
        $dataorder->save();

        $datacart = Cart::where('user_id', Auth::id())->get();
        foreach($datacart as $item){
            DetailOrder::create([
                'order_id' => $dataorder->id,
                'produk_id' => $item->produk->id,
                'qty' => $item->produk_qty,
                'price' => $item->produk->harga_jual,
            ]);
        }

        $datacheckout = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($datacheckout);

        return redirect('/')->with('status','Pesanan berhasil dibuat');
    }
}
