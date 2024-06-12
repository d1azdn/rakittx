@extends('layouts.app')

@section('container')
@extends('components.navbar')
<div class="container d-flex justify-content-center mt-5">
    <div class="product-info card py-4 px-2 row" style="width:90vw;">
        <div class="container-in d-flex flex-row">
            <div class="hero" style="width:90vw;">
                <a href="/support" class="btn btn-primary"><- Back</a>
                <h2 class="mt-3">{{ $data->title }}</h2>
                <p class="pt-2 border-top">{{ $data->text }}</p>
            </div>
        </div>
    </div>
</div>
@endsection