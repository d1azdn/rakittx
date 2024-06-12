<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RakitTX - Rakit PC pasti lebih mudah!</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Google Font, Inter -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body style="font-family: 'Inter', sans-serif;">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        
    <div class="viewport grid row" style="height: 100vh">
        <div class="col-2 bg-body-secondary py-3 px-4">
            <a href="/logout"><button class="btn btn-primary mb-3"><- Logout</button></a>
            <h5 class="pb-3 border-bottom border-2">Selamat datang, {{ Auth::user()->username }}</h5>
            <ul class="navbar-nav me-auto mb-2 mt-4 mb-lg-0 text-center">
                <li class="nav-item">
                  <a class="nav-link p-1 {{ Request::is('dashboard') ? 'bg-dark-subtle rounded p-1' : '' }}" aria-current="page" href="/dashboard">Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link p-1 {{ Request::is('dashboard/sparepart') ? 'bg-dark-subtle rounded p-1' : '' }}" href="/dashboard/sparepart">Sparepart</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link p-1 {{ Request::is('dashboard/brand') ? 'bg-dark-subtle rounded p-1' : '' }}" href="/dashboard/brand">Brand</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-1 {{ Request::is('dashboard/category') ? 'bg-dark-subtle rounded p-1' : '' }}" href="/dashboard/category">Category</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link p-1 {{ Request::is('dashboard/support') ? 'bg-dark-subtle rounded p-1' : '' }}" href="/dashboard/support">Support</a>
                  </li>
              </ul>
        </div>
        <div class="col-10 p-4">
            @yield('container')
        </div>
    </div>

    </body>
</html>
