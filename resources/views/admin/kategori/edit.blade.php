@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Form Tambah Kategori</h1>
    </div>
    <div class="card-body">
        <form action="{{ url('update-kategori/'.$kategori->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $kategori->name }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" name="slug" value="{{ $kategori->slug }}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" rows="3" class="form-control">{{ $kategori->description }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" {{ $kategori->status == "1" ? "checked" : "" }} name="status">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Popular</label>
                    <input type="checkbox" {{ $kategori->popular == "1" ? "checked" : "" }} name="popular">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ $kategori->mate_title }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3" class="form-control">{{ $kategori->mate_keywords }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control">{{ $kategori->mate_descrip }}</textarea>
                </div>
                @if ($kategori->image)
                    <img src="{{ asset('assets/uploads/kategori/'.$kategori->image) }}" alt="image">
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
