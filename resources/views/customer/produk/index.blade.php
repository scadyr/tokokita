@extends('layouts.customer')

@section('title')
    Toko Kita | Produk
@endsection

@section('content')
    <div class="py-4">
        <div class="container">
            <h5>{{ $kategori->name }}</h5>
            <div class="row">
                @foreach ($produk as $item)
                    <div class="col-md-3 mb-3">
                        <a href="{{ url('show-category/'.$kategori->slug.'/'.$item->id) }}">
                        <div class="card">
                            <img src="{{ asset('assets/uploads/produk/'.$item->image) }}" alt="" class="produk-img">
                            <div class="card-body">
                                <h5>{{ $item->nama }}</h5>
                                <p>{{ $item->harga_jual }}</p>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
