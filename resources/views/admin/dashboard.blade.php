@extends('layouts.adminapp')
@section('container')

<div class="p-0">
    <div class="promo pb-2 border-bottom border-1 d-flex flex-row align-items-center">
        <a href="#" class="text-decoration-none text-black" data-bs-toggle="collapse" data-bs-target="#produk-konfirmasi" aria-expanded="false" aria-controls="produk-konfirmasi"><h3>Produk Konfirmasi.</h3></a>
        <span class="bi bi-chevron-right"></span>
    </div>

    @php
    $all = 0;
    @endphp

    <div class="row g-2 mt-2 content grid justify-content-evenly gap-0" id="produk-konfirmasi">
        @foreach($carts as $cart)
        @if($cart->process == 'needConfirm')
        <div class="card" style="width: 20vw;">
            <div class="card-body">
                <h5 class="card-title pb-2 border-bottom">{{ $cart->product->product_name }}</h5>
                <h5 class="">User : <b>{{$cart->user->username}}</b></h5>
                <p class="m-0">Dibeli pada : {{$cart->created_at}}</p>
                <p class="pb-2 border-bottom">Sebanyak : <b>{{ $cart->amount }} Buah</b></p>
                <h4>Total : Rp.{{$cart->total}}</h4>
                <form action="/dashboard/update/{{ $cart->id }}" method="POST" class="d-inline">
                    @csrf
                    @method('put')
                <button class="btn btn-success">Konfirmasi</button>
                </form>
                <form action="/dashboard/{{ $cart->id }}" method="POST" class="d-inline">
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
    </div>

    <!-- Produk konfirmasi -->

    <div class="promo pb-2 mt-4 border-bottom border-1 d-flex flex-row align-items-center">
        <a href="#" class="text-decoration-none text-black" data-bs-toggle="collapse" data-bs-target="#produk-ongoing" aria-expanded="false" aria-controls="produk-ongoing"><h3>Proses Transaksi ({{ $carts->count() }}).</h3></a>
        <span class="bi bi-chevron-right"></span>
    </div>

    <div class="row g-2 mt-2 content grid justify-content-evenly gap-4" id="produk-ongoing">
        @foreach($carts as $cart)
        @if($cart->process == 'confirmed')
        <div class="card" style="width: 20vw;">
            <div class="card-body">
                <h5 class="card-title">{{ $cart->product->product_name }}</h5>
                <p class="m-0">Dibeli pada : {{$cart->created_at}}</p>
                <p class="pb-4 border-2 border-bottom">Sebanyak : <b>{{ $cart->amount }} Buah</b></p>
                <form action="/dashboard/done/{{ $cart->id }}" method="POST" class="d-inline">
                    @csrf
                    @method('put')
                    <label for="note" class="form-label">Kirim pesan.</label>
                    <input class="form-control mb-3" type="text" name="note" id="note" placeholder="Tulis pesan disini." required>
                <button class="btn btn-success">Selesai</button>
                </form>
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