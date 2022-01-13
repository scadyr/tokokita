<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('customer.index',compact('produk'));
    }

    public function kategori()
    {
        $kategori = Kategori::all();
        return view('customer.kategori', compact('kategori'));
    }

    public function showcategory($slug)
    {
        if (Kategori::where('slug',$slug)->exists()) {
            $kategori = Kategori::where('slug',$slug)->first();
            $produk = Produk::where('cate_id',$kategori->id)->get();

            return view('customer.produk.index', compact('kategori','produk'));
        }else{
            return view('/')->with('status','Kategori yang dipilih tidak ada');
        }
    }

    public function detailproduk($cate_slug,$id)
    {
        if (Kategori::where('slug',$cate_slug)->exists()) {
            if (Produk::where('id',$id)->exists()) {
                $produk = Produk::where('id',$id)->first();

                return view('customer.produk.view', compact('produk'));
            }else{
                return view('/')->with('status','Oops, maaf link tidak tersedia');
            }
        }else{
            return view('/')->with('status','Oops, maaf link tidak tersedia');
        }
    }

    public function detailprodukSatuan($id)
    {
        $produk = Produk::where('id',$id)->first();

        return view('customer.produk.view', compact('produk'));
    }
}
