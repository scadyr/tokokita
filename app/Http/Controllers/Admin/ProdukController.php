<?php

namespace App\Http\Controllers\Admin;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();

        return view('admin.produk.index',compact('produk'));
    }

    public function add()
    {
        $data_kategori = Kategori::all();

        return view('admin.produk.add', compact('data_kategori'));
    }

    public function insert(Request $request)
    {
        $produk = new Produk();

        if($request->hasfile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/produk',$filename);
            $produk->image = $filename;
        }

        $produk->cate_id = $request->input('cate_id');
        $produk->nama = $request->input('nama');
        $produk->deskripsi_singkat = $request->input('deskripsi_singkat');
        $produk->deskripsi = $request->input('deskripsi');
        $produk->harga = $request->input('harga');
        $produk->harga_jual = $request->input('harga_jual');
        $produk->qty = $request->input('qty');
        $produk->tax = $request->input('tax');
        $produk->status = $request->input('status') == TRUE ? '1' : '0';
        $produk->trending = $request->input('trending') == TRUE ? '1' : '0';
        $produk->meta_title = $request->input('meta_title');
        $produk->meta_keywords = $request->input('meta_keywords');
        $produk->meta_description = $request->input('meta_description');
        $produk->save();

        return redirect('produk')->with('status','Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $produk = Produk::find($id);

        return view('admin.produk.edit',compact('produk'));
    }

    public function update($id, Request $request)
    {
        $produk = Produk::find($id);

        if($request->hasFile('image')){
            $path = 'asset/uploads/produk/'.$produk->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/produk',$filename);
            $produk->image = $filename;
        }

        $produk->nama = $request->input('nama');
        $produk->deskripsi_singkat = $request->input('deskripsi_singkat');
        $produk->deskripsi = $request->input('deskripsi');
        $produk->harga = $request->input('harga');
        $produk->harga_jual = $request->input('harga_jual');
        $produk->qty = $request->input('qty');
        $produk->tax = $request->input('tax');
        $produk->status = $request->input('status') == TRUE ? '1' : '0';
        $produk->trending = $request->input('trending') == TRUE ? '1' : '0';
        $produk->meta_title = $request->input('meta_title');
        $produk->meta_keywords = $request->input('meta_keywords');
        $produk->meta_description = $request->input('meta_description');
        $produk->update();

        return redirect('produk')->with('status','Produk berhasil diupdate');
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);

        if($produk->image){
            $path = 'assets/uploads/produk/'.$produk->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }

        $produk->delete();

        return redirect('produk')->with('status','Produk berhasil dihapus');
    }
}
