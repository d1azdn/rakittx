@if (session('error'))
<div class="text-center">
  <h5>
    {{ session('error') }}
  </h5>
</div>
@endif
<nav class="navbar navbar-expand-lg bg-body-tertiary px-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="/"><b>R</b>akit<b>TX</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link px-3 {{ Request::is('/') ? 'bg-dark-subtle rounded px-3' : '' }}" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-3 {{ Request::is('sparepart') ? 'bg-dark-subtle rounded px-3' : '' }}" href="/sparepart">Sparepart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-3 {{ Request::is('rakitpc') ? 'bg-dark-subtle rounded px-3' : '' }}" href="/rakitpc">RakitPC</a>
          </li>
        </ul>

        @if(Auth::check())
        <ul class="navbar-nav me-2 mb-2 mb-lg-0">
          <li class="nav-item">
              <a class="nav-link px-3 {{ Request::is('support') ? 'bg-dark-subtle rounded px-3' : '' }} text-secondary" href="/support">Support</a>
          </li>
          <li class="nav-item">
            <a class="nav-link px-3 text-primary" href="/cart">
              <span class="bi bi-cart h5 p-2"></span>
            </a>
        </li>
        </ul>
        <span class="navbar-text">
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle me-5" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="bi bi-person-circle h5 p-2"></span>
          </button>
          <ul class="dropdown-menu">
            @if (Auth::user()->isAdmin == 1)
            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
            @endif
            <li><a class="dropdown-item" href="/logout">Logout</a></li>
          </ul>
        </div>
        </span>
        @else
        <span class="navbar-text">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                  <a class="nav-link px-3 {{ Request::is('support') ? 'bg-dark-subtle rounded px-3' : '' }} text-secondary" href="/support">Support</a>
              </li>
              <li class="nav-item">
                <a class="nav-link px-3 text-primary" href="/cart">
                  <span class="bi bi-cart h5 p-2 position-relative"></span>
                </a>
            </li>
              <li class="nav-item">
                <a href="/register" style="text-decoration: none;" class="text-primary"><button type="button" class="btn btn-outline-primary px-3 mx-1">Daftar</button></a>
              </li>
              <li class="nav-item">
                  <a href="/login" style="text-decoration: none;" class="text-white"><button type="button" class="btn btn-primary px-3 mx-1">Login</button></a>
              </li>
            </ul>
          </span>
        @endif
        
      </div>
    </div>
</nav>