@extends('layouts.app')

@section('container')
@extends('components.navbar')

@if(session('loginerror'))
    <div class="alert alert-danger" role="alert">
        Username atau password anda salah.
        </div>
    @endif

<div class="d-flex justify-content-center">
    <div class="card px-4 pb-2 pt-4 mt-5" style="min-width: 400px;">
        <h3 class="text-center">Login</h3>
        <form action="/login" method="POST">
            @csrf
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" autofocus>
            @error('username')
            <div class="invalid text-danger">{{ $message }}</div>
            @enderror
            <br>
            <label for="password">Password</label>
            <input type="password" class="form-control mb-2 @error('password') is-invalid @enderror" name="password" id="password">
            @error('password')
            <div class="invalid text-danger mb-3">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary w-100 mt-2">Submit</button>
        </form>
        <p class="text-center mt-4">Do not have an account? <br><a href="/register">Register here.</a></p>
    </div>
</div>
@endsection