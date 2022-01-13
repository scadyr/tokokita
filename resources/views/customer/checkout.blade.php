@extends('layouts.customer')

@section('title')
    Checkout
@endsection

@section('content')
    <div class="container">
        <form action="{{ url('order') }}" method="POST">
            {{ csrf_field() }}
            <div class="row mt-3">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Detail</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Email</label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">No. HP</label>
                                    <input type="text" name="no_hp" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Alamat</label>
                                    <input type="text" name="alamat" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">

                            <h6> Detail Pesanan</h6>
                            <hr>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datacheckout as $item )
                                    <tr>
                                        <td>{{ $item->produk->nama }}</td>
                                        <td>{{ $item->produk_qty }}</td>
                                        <td>{{ $item->produk->harga_jual }}</td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>

                            <button class="btn btn-primary float-end">Pesan Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
