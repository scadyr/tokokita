@extends('layouts.customer')

@section('title')
    Toko Kita | Kategori
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h5>Semua Kategori</h5>
                    <div class="row">
                        @foreach ($kategori as $item_k)
                            <div class="col-md-3 mb-3">
                                <a href="{{ url('show-category/'.$item_k->slug) }}">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{ asset('assets/uploads/kategori/'.$item_k->image) }}" alt="item" class="kat-img mb-2">
                                        <h5>{{ $item_k->name }}</h5>
                                        <p>
                                            {{ $item_k->description }}
                                        </p>
                                    </div>
                                </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
