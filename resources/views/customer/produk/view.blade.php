@extends('layouts.customer')

@section('title')
    Toko Kita | {{ $produk->nama }}
@endsection

@section('content')
    <div class="container">
        <div class="card shadow mt-3 data_produk">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/produk/'.$produk->image) }}" alt="produk" class="w-50">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $produk->nama }}
                        </h2>

                        <hr>

                        <label for="" class="me-3">Harga : {{ $produk->harga }}</label>
                        <p class="mt-3">
                            {{ $produk->deskripsi_singkat }}
                        </p>

                        <hr>
                        @if ($produk->qty > 0)
                            <label for="" class="badge bg-success">Stok Tersedia</label>
                        @else
                            <label for="" class="badge bg-danger">Stok Tidak Tersedia</label>
                        @endif

                        <div class="row mt-2">
                            <div class="col-md-3">
                                <input type="hidden" name="" value="{{ $produk->id }}" class="produk_id">
                                <label for="">Jumlah</label>
                                <div class="input-group text-center mb-3" style="width:130px">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="jumlah"  class="form-control qty-input text-center" value="1">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <br>
                                @if ($produk->qty > 0)
                                    <button type="button" class="btn btn-success me-3 float-start addCart">Tambah ke Keranjang</button>
                                @endif


                                {{-- <button type="button" class="btn btn-primary me-3 float-start">Tambah ke Keranjang</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


