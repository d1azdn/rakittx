@extends('layouts.adminapp')
@section('container')

@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="promo pb-2 border-bottom border-1 d-flex flex-row align-items-center">
    <a href="#" class="text-decoration-none text-black" data-bs-toggle="collapse" data-bs-target="#posts" aria-expanded="false" aria-controls="posts"><h3>Add Brand *Clickme</h3></a>
    <span class="bi bi-chevron-right"></span>
</div>

<div class="card p-4 collapse" id="posts">
    <form action="/dashboard/brand" method="POST">
        @csrf
        <label for="title" class="form-label">Title</label>
        <input class="form-control mb-3" type="text" name="title" id="title" autofocus required>

        <label for="slug" class="form-label">Slug</label>
        <input class="form-control mb-3" type="text" name="slug" id="slug" required>

        <button type="submit" class="btn btn-primary w-100 mt-2">Submit</button>
    </form>
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">slug</th>
        <th scope="col">Edit</th>
      </tr>
    </thead>
    <tbody>
        @foreach($brands as $brand)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $brand->title }}</td>
            <td>{{ $brand->slug }}</td>
            <td><button class="btn btn-warning bi bi-pencil-square" data-bs-toggle="collapse" data-bs-target="#{{ $brand->id }}" aria-expanded="false" aria-controls="{{ $brand->id }}"></button>
                <div class="card p-4 collapse" id="{{ $brand->id }}">
                    <form action="/dashboard/brand/{{ $brand->id }}" method="POST">
                        @method('put')
                        @csrf
                        <label for="title" class="form-label">Title</label>
                        <input class="form-control mb-3" type="text" name="title" id="title" autofocus required>
                
                        <label for="slug" class="form-label">Slug</label>
                        <input class="form-control mb-3" type="text" name="slug" id="slug" required>
                
                        <button type="submit" class="btn btn-primary w-100 mt-2">Submit</button>
                    </form>
                </div>                
                <form action="/dashboard/brand/{{ $brand->id }}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                <button class="btn btn-danger bi bi-x-lg border-0" onclick="return confirm('Apakah anda yakin?')"></button>
                </form>
            </td>
        </tr>
        @endforeach
    

@endsection