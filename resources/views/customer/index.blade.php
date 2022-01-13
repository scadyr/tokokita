@extends('layouts.customer')

@section('title')
    Selamat Datang di Toko Kita
@endsection

@section('content')
    @include('layouts.incl.slider')
    <div class="py-4">
        <div class="container">
            <h4>Produk Kami</h4>
            <div class="row">
                @foreach ($produk as $item)
                    <div class="col-md-3">
                        <a href="{{ url('produk/'.$item->id) }}">
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
