@extends('layouts.app')

@section('container')

@if(session('success'))
<div class="alert alert-success text-center">
    <h3>Item telah masuk ke keranjang.</h3>
</div>
@endif

@extends('components.navbar')
      <div class="searchbar mx-5 my-4">
        <form class="d-flex" action="/sparepart">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}" id="">
            @endif
            <input class="form-control me-2" type="text" placeholder="Cari produkmu disini." aria-label="Search" name="search">
            <button class="btn btn-outline-success me-2" type="submit">Search</button>
        </form>
        <button class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#filter" aria-expanded="false" aria-controls="filter">Filter</button>
        <a href="/sparepart" class="btn border border-secondary">Reset filter</a>
          
          <div class="card px-4 py-2 mt-2 justify-content-between collapse" id="filter">
            @foreach ($categories as $category)
                <a class="nav-link my-1" name="motherboard" href="/sparepart?category={{ $category->title }}">{{ $category->title }}</a>
            @endforeach
            </div>

        </div>

    <div class="content row justify-content-evenly mx-sm-5 pb-5 gap-2">
        @foreach($products as $product)
        <div class="card col-xl" style="width:14rem">
            <img src="{{ $product->category->url }}" class="ms-2 mt-3 rounded" alt="..." style="width:12rem">
            <div class="card-body p-2">
                  <p class="card-title m-0">{{ Str::words($product->product_name, 5,) }}</p>

                  <a href="/sparepart?category={{ $product->category->title }}" style="text-decoration:none;"><p class="bg-light rounded-pill px-3 text-center border text-body" style="cursor: pointer">{{ $product->category->title }}</p></a>
                  
                  <p class="btn btn-danger text-white px-2 py-1">Diskon {{ $product->discount }} %</p>
                  <p class="fs-4 m-0"><b>Rp. {{ $product->price }}</b></p>
                  <p class="fs-6"><s>Rp. {{ ($product->price*(100 + $product->discount) / 100) }}</s></p>
                <a href="/sparepart/{{ urlencode($product->product_name) }}" class="btn btn-primary">Checkout -></a>
            </div>
        </div>
        @endforeach
    </div>

    <div class="links mx-auto d-flex justify-content-center">
        {{ $products->links() }}
    </div>
@endsection
