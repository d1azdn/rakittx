@extends('layouts.app')

@section('container')
@extends('components.navbar')

<div class="d-flex justify-content-center">
    <div class="card px-4 pb-2 pt-4 mt-5" style="min-width: 400px;">
        <h3 class="text-center">Register</h3>
        <form action="/register" method="POST">
            @csrf
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username') }}" required>
            @error('username')
            <div class="invalid text-danger">{{ $message }}</div>
            @enderror
            <br>
            <label for="password">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="{{ old('password') }}" required>
            @error('password')
            <div class="invalid text-danger">{{ $message }}</div>
            @enderror
            <br>
            <label for="password">Confirm Password</label>
            <input type="password" class="form-control mb-2 @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password" value="{{ old('password_confirmation') }}" required>
            @error('password_confirmation')
            <div class="invalid text-danger mb-3">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary w-100 mt-2">Submit</button>
        </form>
        <p class="text-center mt-4">Already have an account? <br><a href="/login">Login here.</a></p>
    </div>
</div>
@endsection