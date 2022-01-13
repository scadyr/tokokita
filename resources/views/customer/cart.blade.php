@extends('layouts.customer')

@section('title')
    Keranjang Belanja
@endsection

@section('content')
    <div class="container">
        <div class="card shadow mt-3 data_produk">
            <div class="card-body">
                @php
                    $total = 0;
                @endphp
                @foreach ($datacart as $item)
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{ asset('assets/uploads/produk/'.$item->produk->image) }}" alt="produk" class="w-50">
                        </div>
                        <div class="col-md-4">
                            <h5 class="mb-0">
                                {{ $item->produk->nama }}
                            </h5>
                        </div>
                        <div class="col-md-2">
                            <h5>Rp. {{ $item->produk->harga_jual }}</h5>
                        </div>
                        <div class="col-md-3">
                            <input type="hidden" name="" value="{{ $item->produk->id }}" class="produk_id">
                            @if ($item->produk->qty > $item->produk_qty)
                                <label for="">Jumlah</label>
                                <div class="input-group text-center mb-3" style="width:130px">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="jumlah" class="form-control qty-input text-center" value="{{ $item->produk_qty }}">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                                @php
                                    $total += $item->produk->harga_jual * $item->produk_qty;
                                @endphp
                            @else
                                Stok Habis
                            @endif
                        </div>
                        <div class="col-md-1 mb-3">

                            <button type="button" class="btn btn-danger me-3 float-start delete-item">Hapus</button>
                            {{-- <button type="button" class="btn btn-primary me-3 float-start">Tambah ke Keranjang</button> --}}
                        </div>

                    </div>
                @endforeach
            </div>
            <div class="card-footer">
                <h6>Total Price : Rp {{ $total }}</h6>

                <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end">Checkout</a>
            </div>
        </div>
    </div>
@endsection

