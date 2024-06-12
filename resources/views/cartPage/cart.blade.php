@extends('layouts.app')

@section('container')
@extends('components.navbar')

<div class="p-4">
<div class="promo pb-2 border-bottom border-1 d-flex flex-row align-items-center">
    <a href="#" class="text-decoration-none text-black" data-bs-toggle="collapse" data-bs-target="#produk-konfirmasi" aria-expanded="false" aria-controls="produk-konfirmasi"><h3>Produk Konfirmasi.</h3></a>
    <span class="bi bi-chevron-right"></span>
</div>

@php
$all = 0;
@endphp

<div class="row g-2 mt-2 content grid justify-content-evenly gap-4" id="produk-konfirmasi">
    @foreach($carts as $cart)

    @if($cart->process == 'waiting')
    <div class="card" style="width: 20vw;">
        <div class="card-body">
            <h5 class="card-title">{{ $cart->product->product_name }}</h5>
            <p class="m-0">Dibeli pada : {{$cart->created_at}}</p>
            <p>Sebanyak : <b>{{ $cart->amount }} Buah</b></p>
            <h4>Total : Rp.{{$cart->total}}</h4>
            <form action="/cart/{{ $cart->id }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
            <button class="btn btn-danger bi bi-x-lg border-0" onclick="return confirm('Apakah anda yakin?')"> Batal</button>
            </form>
        </div>
    </div>

    @php
    $all = $all + ($cart->total);    
    @endphp

    @endif
    @endforeach
    
    <div class="bayar d-flex justify-content-end">
        <div class="total me-3 text-end">
            <p class="m-0">Total semua</p>
            <h3 class="m-0">Rp. {{ $all }}</h3>
        </div>
        <form action="/cart/{{ $carts->count() }}" method="POST" class="d-inline">
            @csrf
            @method('put')
        <button class="btn btn-primary px-4 py-3">Bayar</button>
        </form>
    </div>
</div>

<!-- Produk konfirmasi -->

<div class="promo pb-2 mt-4 border-bottom border-1 d-flex flex-row align-items-center">
    <a href="#" class="text-decoration-none text-black" data-bs-toggle="collapse" data-bs-target="#produk-ongoing" aria-expanded="false" aria-controls="produk-ongoing"><h3>Produk Transaksi ({{ $carts->count() }}).</h3></a>
    <span class="bi bi-chevron-right"></span>
</div>

<div class="row g-2 mt-2 content grid justify-content-evenly gap-4" id="produk-ongoing">
    @foreach($carts as $cart)
    @if($cart->process == 'confirmed' || $cart->process == 'needConfirm')
    <div class="card" style="width: 20vw;">
        <div class="card-body">
            <h5 class="card-title">{{ $cart->product->product_name }}</h5>
            <p class="m-0">Dibeli pada : {{$cart->created_at}}</p>
            <p>Sebanyak : <b>{{ $cart->amount }} Buah</b></p>
            <h6 class="badge bg-warning">Status : {{$cart->process}}</h6>
        </div>
    </div>
    @elseif($cart->process == 'done')
    <div class="card" style="width: 20vw;">
        <div class="card-body">
            <h5 class="card-title">{{ $cart->product->product_name }}</h5>
            <p class="m-0">Dibeli pada : {{$cart->created_at}}</p>
            <p>Sebanyak : <b>{{ $cart->amount }} Buah</b></p>
            <h6 class="bg-success text-break text-white rounded p-2" style="width:100%;">Status : {{$cart->process}} - {{$cart->note}}</h6>
            <form action="/cart/{{ $cart->id }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
            <button class="btn border-danger bi bi-x-lg border-2 text-danger" onclick="return confirm('Apakah anda yakin?')"> Hapus Transaksi</button>
        </div>
    </div>

    @php
    $all = $all + ($cart->total);    
    @endphp
    @endif

    @endforeach
    
</div>

</div>
@endsection