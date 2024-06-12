@extends('layouts.app')

@section('container')
@extends('components.navbar')
      <div class="searchbar mx-5 my-4">
          <h1 class="text-center mt-5">Frequently Asked Question</h>
        <form class="d-flex mt-5" role="search" action="/support">
            <input class="form-control me-2" type="search" placeholder="Tanyakan seputar layanan kami." name="search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>

    
        <div class="content row justify-content-between mx-4 mx-sm-5 gap-2">
    @foreach ($data as $support)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $support->title }}</h5>
                    <p class="card-text">{{ $support->text }}</p>
                    <a href="/support/{{ $support->slug }}" class="btn btn-primary">Read more -></a>
                </div>
            </div>
    @endforeach
        </div>


@endsection
