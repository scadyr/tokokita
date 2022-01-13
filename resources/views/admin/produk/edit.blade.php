@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Form Tambah Produk</h1>
    </div>
    <div class="card-body">
        <form action="{{ url('update-produk/'.$produk->id ) }}" method="POST" enctype="multipart/form-data">
            <div class="row">
                @csrf
                @method('PUT')
                <div class="col-md-12 mb-3">
                    <select class="form-control">
                        {{-- @foreach ($data_kategori as $kategori) --}}
                            <option value="">{{ $produk->kategori->name }}</option>
                        {{-- @endforeach --}}
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Nama Produk</label>
                    <input type="text" class="form-control" name="nama" value="{{ $produk->nama }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Deskripsi Singkat</label>
                    <input type="text" class="form-control" name="deskripsi_singkat" value="{{ $produk->deskripsi_singkat }}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" class="form-control">{{ $produk->deskripsi }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Harga</label>
                    <input type="number" class="form-control" name="harga" value="{{ $produk->harga }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Harga Jual</label>
                    <input type="number" class="form-control" name="harga_jual" value="{{ $produk->harga_jual }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Jumlah</label>
                    <input type="number" class="form-control" name="qty" value="{{ $produk->qty }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Pajak</label>
                    <input type="number" class="form-control" name="tax" value="{{ $produk->tax }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" {{ $produk->status == "1" ? "checked" : "" }}>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Trending</label>
                    <input type="checkbox" name="trending" {{ $produk->trending == "1" ? "checked" : "" }}>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ $produk->meta_title }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3" class="form-control">{{ $produk->meta_keywords }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control">{{ $produk->meta_description }}</textarea>
                </div>
                @if ($produk->image)
                    <img src="{{ asset('assets/uploads/produk/'.$produk->image) }}" alt="produk image">
                @endif
                <div class="col-md-12 mb-3">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
