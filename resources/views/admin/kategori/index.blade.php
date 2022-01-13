@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Kategori Data</h4>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <img src="{{ asset('assets/uploads/kategori/'.$item->image) }}" alt="image" class="kat-img">
                        </td>
                        <td class="text-center">
                            <a href="{{ url('edit-kategori/'.$item->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('delete-kategori/'.$item->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
