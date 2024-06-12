@extends('layouts.app')
@section('container')
@extends('components.navbar')
<div class="container d-flex flex-column flex-md-row justify-content-center gap-5 mt-5">
    <div class="product-info card p-4 mx-auto" style="width:70vw;">
        <div class="container-in d-flex flex-column col-sm-12" >
            <img src="{{ $product->category->url }}" class="object-fit-cover ms-3 rounded mb-4" style="max-height: 200px; max-width:200px" alt="...">
            <div class="container">
                <h3>{{ $product->product_name }}</h3>
                <h2 class="mt-3"><b>Rp. {{ $product->price }}</b></h2>
                <h2 class="badge bg-danger p-2">{{ $product->discount }}% OFF!</h2>
                <p class="text-secondary" style="text-decoration: line-through;">Rp. {{ $product->price * (100+$product->discount) / 100 }}</p>
            </div>
        </div>
            <div class="detail mt-3">
                <h4>Detail Produk</h4>
                <p class="pt-2 border-top">{{ $product->desc }}</p>
                <br>
                <h3>Brand : {{ $product->brand->title }}</h3>
            </div>
        </div>
    <div class="cart-section card col-sm-3 px-2 py-4 mx-auto" style="min-width:30vw; max-width:70vw;">
        <div class="container">
            <h5 class="pb-3 border-bottom border-2">Atur Jumlah dan Catatan</h5>

            <form action="/cart/{{ urlencode($product->product_name) }}" method="post">
                
                @csrf
                <input type="hidden" name="user_id" value={{ Auth::user()->id }}>
                <input type="hidden" name="product_id" value="{{ urlencode($product->id) }}">
            
            <label for="amount" class="form-label">Jumlah barang</label>
            <input class="form-control mb-3" type="text" name="amount" id="amount" value="1" autofocus required>

            <label for="note" class="form-label">Catatan</label>
            <input class="form-control mb-3" type="text" name="note" id="note" value="Makasih mas.">

            <div class="harga d-flex flex-column">
                <p class="m-0">Subtotal</p>
                <div class="price d-flex flex-row">
                    <h3>Rp. </h3>
                    <h3 id="price">{{ $product->price }}</h3>
                    </div>
            </div>
            <a class="btn btn-primary mt-3" style="width: 100%;" data-bs-toggle="collapse" data-bs-target="#keranjang" aria-expanded="false" aria-controls="keranjang" onclick="changePrice()">+ Hitung</a>

            <input type="hidden" name="total" id="total">
            <input type="hidden" name="process" value="waiting">

            <button class="btn btn-success mt-3 collapse" style="width: 100%;" id="keranjang">+ Keranjang</button>
            </form>
        </div>
    </div>
</div>

<script>
    var jumlah = document.getElementById('amount').value;

    var harga = document.getElementById('price').innerHTML;

    function changePrice(){
        var jumlah = document.getElementById('amount').value;

        document.getElementById('price').innerHTML = (harga * jumlah)

        document.getElementById('total').value = (harga * jumlah)
    }
</script>

@endsection