@extends('layouts.app')

@section('container')

@if(session('success'))
<div class="alert alert-success text-center">
    <h3>Item telah masuk ke keranjang.</h3>
</div>
@endif

@extends('components.navbar')
      <div class="hero mb-5">
        <img src="img/rakitpc.jpg" class="card-img-top object-fit-cover" style="max-height: 400px; filter:brightness(80%)" alt="...">
      </div>

      <div class="searchbar mx-5 my-4 pb-5">
        <div class="textlog text-center mt-5">
            <p>Udah beli sparepart tapi bingung rakitnya?</p>
            <h1><b>MINTA RAKIT AJA!</b></h>
        </div>
        </div>

    <div class="content row grid justify-content-between mx-4 mx-sm-5 pb-5 gap-5">
        <div class="card col-xl text-center d-flex">
            <div class="card-body">
                <span class="bi bi-person-plus h1 p-2"></span>
                <h5 class="card-title">Premium +1 Hari</h5>
                <p class="card-text">Bundle yang pas untuk bertanya-tanya soal komponen pc serta untuk menyoba kinerja layanan kami.</p>

                <div class="card mb-3 bg-light">
                <ul class="p-2 m-0" style="text-decoration:none; list-style-type:none;">
                    <li><p class="bi bi-check-lg m-0"> Tanya Jawab seputar komputer</p></li>
                    <li><p class="bi bi-check-lg m-0"> Pemulihan data</p></li>
                    <li><p class="bi bi-check-lg m-0"> Optimasisasi sistem</p></li>
                    <br>
                    <li><p class="bi bi-x m-0"> Perbaikan Perangkat Keras (Hardware)</p></li>
                    <li><p class="bi bi-x m-0"> Perbaikan Perangkat Lunak (Software)</p></li>
                    <li><p class="bi bi-x m-0"> Installasi windows (Hardware)</p></li>
                </ul>
                </div>

                <form action="/cart/Premium1" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" value="">
                    <input type="hidden" name="product_id" id="product_id" value="1">
                    <input type="hidden" name="amount" id="amount" value="1">
                    <input type="hidden" name="total" id="total" value="200055">
                    <input type="hidden" name="process" id="process" value="waiting">
                    <button class="btn btn-primary">Masukkan keranjang -></button>
                </form>
            </div>
        </div>

        <div class="card col-xl text-center d-flex">
            <div class="card-body">
                <span class="bi bi-person-plus-fill h1 p-2"></span>
                <h5 class="card-title">Premium +7 Hari</h5>
                <p class="card-text">Bundle yang pas untuk bertanya-tanya soal rakit pc. <br>*Recomended buyer</p>

                <div class="card mb-3 bg-light">
                    <ul class="p-2 m-0" style="text-decoration:none; list-style-type:none;">
                        <li><p class="bi bi-check-lg m-0"> Tanya Jawab seputar komputer</p></li>
                        <li><p class="bi bi-check-lg m-0"> Pemulihan data</p></li>
                        <li><p class="bi bi-check-lg m-0"> Optimasisasi sistem</p></li>
                        <li><p class="bi bi-check-lg m-0"> Pengecekan virus atau malware berbahaya</p></li>
                        <li><p class="bi bi-check-lg m-0"> Perbaikan Perangkat Keras (Hardware)</p></li>
                        <li><p class="bi bi-check-lg m-0"> Perbaikan Perangkat Lunak (Software)</p></li>
                        <li><p class="bi bi-check-lg m-0"> Installasi windows (Hardware)</p></li>
                    </ul>
                </div>

                <form action="/cart/Premium7" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" value="">
                    <input type="hidden" name="product_id" id="product_id" value="2">
                    <input type="hidden" name="amount" id="amount" value="1">
                    <input type="hidden" name="total" id="total" value="400055">
                    <input type="hidden" name="process" id="process" value="waiting">
                    <button class="btn btn-primary">Masukkan keranjang -></button>
                </form>
            </div>
        </div>
    </div>

    <div class="explanation text-center pb-5 mx-4">
        <p>*Semua paket diatas sudah termasuk rakit PC (bila user berkenan). <br>**Customer service mungkin tidak tersedia pada hari libur / tanggal merah.</p>
    </div>
@endsection