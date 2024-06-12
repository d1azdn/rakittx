@extends('layouts.adminapp')
@section('container')

@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="promo pb-2 border-bottom border-1 d-flex flex-row align-items-center">
    <a href="#" class="text-decoration-none text-black" data-bs-toggle="collapse" data-bs-target="#posts" aria-expanded="false" aria-controls="posts"><h3>Add Sparepart *Clickme</h3></a>
    <span class="bi bi-chevron-right"></span>
</div>

<div class="card p-4 collapse" id="posts">
    <form action="/dashboard/sparepart" method="POST">
        @csrf
        <label for="title" class="form-label">Nama Produk *jangan sama.</label>
        <input class="form-control mb-3" type="text" name="product_name" id="title" autofocus required>

        <label for="Select" class="form-label">Brand Produk</label>
        <select id="Select" class="form-select mb-3" name="brand_id">
          @foreach($brands as $brand)
            <option value="{{ $brand->id }}">{{ $brand->title }}</option>
          @endforeach
        </select>

        <label for="Select" class="form-label">Kategori Produk</label>
        <select id="Select" class="form-select mb-3" name="category_id">
          @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->title }}</option>
          @endforeach
        </select>

        <label for="desc" class="form-label">Deskripsi Produk</label>
        <input class="form-control mb-3" type="text" name="desc" id="desc" required>

        <label for="price" class="form-label">Harga Produk</label>
        <input class="form-control mb-3" type="text" name="price" id="price" required>

        <label for="stock" class="form-label">Stock</label>
        <input class="form-control mb-3" type="text" name="stock" id="stock" required>

        <label for="discount" class="form-label">Diskon</label>
        <input class="form-control mb-3" type="text" name="discount" id="discount" required>
  
        <button type="submit" class="btn btn-primary w-100 mt-2">Submit</button>
    </form>
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Brand</th>
        <th scope="col">Kategori</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Harga</th>
        <th scope="col">Stok</th>
        <th scope="col">Diskon</th>
        <th scope="col">Edit</th>
      </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->brand->title }}</td>
            <td>{{ $product->category->title }}</td>
            <td>{{ $product->desc }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->discount }}%</td>
            <td><button class="btn btn-warning bi bi-pencil-square" data-bs-toggle="collapse" data-bs-target="#{{ $product->id }}" aria-expanded="false" aria-controls="{{ $product->id }}"></button>
              <div class="card p-4 collapse" id="{{ $product->id }}">
                <form action="/dashboard/sparepart/{{ $product->id }}" method="POST">
                    @method('put')
                    @csrf
                    <label for="title" class="form-label">Nama Produk</label>
                    <input class="form-control mb-3" type="text" name="product_name" id="title" autofocus required>
            
                    @php
                      $unique = [];
                    @endphp
            
                    <label for="Select" class="form-label">Brand Produk</label>
                    <select id="Select" class="form-select mb-3" name="brand_id">
                      @foreach($products as $product)
                        @if ($product->brand->title && !in_array($product->brand->title, $unique))
                        <option value="{{ $product->brand->id }}">{{ $product->brand->title }}</option>
                        @php
                          $unique[] = $product->brand->title;
                        @endphp
                        @endif
                      @endforeach
                    </select>
            
                    <label for="Select" class="form-label">Brand Produk</label>
                    <select id="Select" class="form-select mb-3" name="category_id">
                      @foreach($products as $product)
                        @if ($product->category->title && !in_array($product->category->title, $unique))
                        <option value="{{ $product->category->id }}">{{ $product->category->title }}</option>
                        @php
                          $unique[] = $product->category->title;
                        @endphp
                        @endif
                      @endforeach
                    </select>
            
                    <label for="desc" class="form-label">Deskripsi Produk</label>
                    <input class="form-control mb-3" type="text" name="desc" id="desc" required>
            
                    <label for="price" class="form-label">Harga Produk</label>
                    <input class="form-control mb-3" type="text" name="price" id="price" required>
            
                    <label for="stock" class="form-label">Stock</label>
                    <input class="form-control mb-3" type="text" name="stock" id="stock" required>
            
                    <label for="discount" class="form-label">Diskon</label>
                    <input class="form-control mb-3" type="text" name="discount" id="discount" required>
              
                    <button type="submit" class="btn btn-primary w-100 mt-2">Submit</button>
                </form>
              </div>  
                <form action="/dashboard/sparepart/{{ $product->id }}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                <button class="btn btn-danger bi bi-x-lg border-0" onclick="return confirm('Apakah anda yakin?')"></button>
                </form>
            </td>
        </tr>
        @endforeach
    

@endsection