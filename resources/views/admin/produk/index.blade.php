@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Produk Data</h4>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Harga Jual</th>
                    <th>Kategori</th>
                    <th>Gambar</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- @dd($produk) --}}
                @if ($produk == "")
                    <tr>
                        <td colspan="5">{{ $produk }}</td>
                    </tr>
                @else
                    @foreach ($produk as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->harga_jual }}</td>
                            <td>{{ $item->kategori->name }}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/produk/'.$item->image) }}" alt="image" class="kat-img">
                            </td>
                            <td class="text-center">
                                <a href="{{ url('edit-produk/'.$item->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('delete-produk/'.$item->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>
</div>
@endsection
