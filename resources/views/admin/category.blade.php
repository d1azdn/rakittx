@extends('layouts.adminapp')
@section('container')

@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="promo pb-2 border-bottom border-1 d-flex flex-row align-items-center">
    <a href="#" class="text-decoration-none text-black" data-bs-toggle="collapse" data-bs-target="#posts" aria-expanded="false" aria-controls="posts"><h3>Add Category *Clickme</h3></a>
    <span class="bi bi-chevron-right"></span>
</div>

<div class="card p-4 collapse" id="posts">
    <form action="/dashboard/category" method="POST">
        @csrf
        <label for="title" class="form-label">Title</label>
        <input class="form-control mb-3" type="text" name="title" id="title" autofocus required>

        <label for="slug" class="form-label">Slug</label>
        <input class="form-control mb-3" type="text" name="slug" id="slug" required>

        <label for="url" class="form-label">Url (amazon-aws or other.)</label>
        <input class="form-control mb-3" type="text" name="url" id="url" required>

        <button type="submit" class="btn btn-primary w-100 mt-2">Submit</button>
    </form>
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">slug</th>
        <th scope="col">url</th>
        <th scope="col">Edit</th>
      </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $category->title }}</td>
            <td>{{ $category->slug }}</td>
            <td>{{ $category->url }}</td>
            <td><button class="btn btn-warning bi bi-pencil-square" data-bs-toggle="collapse" data-bs-target="#{{ $category->id }}" aria-expanded="false" aria-controls="{{ $category->id }}"></button>
                <div class="card p-4 collapse" id="{{ $category->id }}">
                    <form action="/dashboard/category/{{ $category->id }}" method="POST">
                        @method('put')
                        @csrf
                        <label for="title" class="form-label">Title</label>
                        <input class="form-control mb-3" type="text" name="title" id="title" autofocus required>
                
                        <label for="slug" class="form-label">Slug</label>
                        <input class="form-control mb-3" type="text" name="slug" id="slug" required>

                        <label for="url" class="form-label">Url (amazon-aws or other.)</label>
                        <input class="form-control mb-3" type="text" name="url" id="url" required>
                
                        <button type="submit" class="btn btn-primary w-100 mt-2">Submit</button>
                    </form>
                </div>
                <form action="/dashboard/category/{{ $category->id }}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                <button class="btn btn-danger bi bi-x-lg border-0" onclick="return confirm('Apakah anda yakin?')"></button>
                </form>
            </td>
        </tr>
        @endforeach
    

@endsection