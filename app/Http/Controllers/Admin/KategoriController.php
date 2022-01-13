<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();

        return view('admin.kategori.index', compact('kategori'));
    }

    public function add()
    {
        return view('admin.kategori.add');
    }

    public function insert(Request $request)
    {
        $kategori = new Kategori();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/kategori',$filename);
            $kategori->image = $filename;
        }

        $kategori->name = $request->input('name');
        $kategori->slug = $request->input('slug');
        $kategori->description = $request->input('description');
        $kategori->status = $request->input('status') == TRUE ? '1' : '0';
        $kategori->popular = $request->input('popular') == TRUE ? '1' : '0';
        $kategori->mate_title = $request->input('meta_title');
        $kategori->mate_descrip = $request->input('meta_description');
        $kategori->mate_keywords = $request->input('meta_keywords');
        $kategori->save();

        return redirect('kategori')->with('status',"Kategori berhasil ditambahkan");
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);

        return view('admin.kategori.edit',compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);

        if($request->hasFile('image')){
            $path = 'asset/uploads/kategori/'.$kategori->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/kategori',$filename);
            $kategori->image = $filename;

        }

        $kategori->name = $request->input('name');
        $kategori->slug = $request->input('slug');
        $kategori->description = $request->input('description');
        $kategori->status = $request->input('status') == TRUE ? '1' : '0';
        $kategori->popular = $request->input('popular') == TRUE ? '1' : '0';
        $kategori->mate_title = $request->input('meta_title');
        $kategori->mate_descrip = $request->input('meta_description');
        $kategori->mate_keywords = $request->input('meta_keywords');
        $kategori->update();

        return redirect('kategori')->with('status',"Kategori berhasil diupdate");
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);

        if($kategori->image){
            $path = 'asset/uploads/kategori/'.$kategori->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }

        $kategori->delete();

        return redirect('kategori')->with('status',"Kategori berhasil dihapus");
    }
}
