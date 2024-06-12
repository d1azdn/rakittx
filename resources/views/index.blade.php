@extends('layouts.app')

@section('container')
@extends('components.navbar')
      <div class="hero card my-5 mx-5">
        <img src="img/hero.jpg" class="card-img-top object-fit-cover" style="max-height: 400px" alt="...">
      </div>

      <div class="promo mb-4 mx-5 d-flex flex-row align-items-center">
        <a href="/sparepart" class="text-decoration-none text-black"><h3>Produk yang sedang promo</h3></a>
        <span class="bi bi-chevron-right"></span>
      </div>

      <div class="row content mx-5 mb-5 pb-5 border-bottom grid gap-2 justify-content-between">
        @foreach($products as $product)
          <div class="card col-xl" style="width: 14rem;">
              <img src="{{ $product->category->url }}" class="ms-3 mt-3 rounded" style="width: 18vw" alt="...">
              <div class="card-body">
                    <p class="card-title fs-3 mx-0 mt-0 mb-2" style="line-height: 100%">{{ $product->product_name }}</p>
                    <p class="btn btn-danger text-white px-2 py-1">Diskon {{ $product->discount }} %</p>
                    <p class="fs-4 m-0"><b>Rp. {{ $product->price }}</b></p>
                    <p class="fs-6"><s>Rp. {{ ($product->price*(100 + $product->discount) / 100) }}</s></p>
                  <a href="/sparepart/{{ urlencode($product->product_name) }}" class="btn btn-primary">Checkout -></a>
              </div>
          </div>
        @endforeach
      </div>

      <div class="row grid gap-4 contain mx-5 mb-5 justify-content-between">
        <div class="card col-md py-4" style="cursor: pointer;">
            <a href="/sparepart" style="text-decoration: none; color:black">
            <div class="card-body text-center">
              <span class="bi bi-motherboard h1 p-2"></span>
            <p>Sparepart PC</p>
            </div>
          </a>
          </div>
          <div class="card col-md py-4" style="cursor: pointer;">
            <a href="/rakitpc" style="text-decoration: none; color:black">
            <div class="card-body text-center">
              <span class="bi bi-person-plus h1 p-2"></span>
            <p>Jasa Rakit PC</p>
            </div>
          </div>
        </a>
        </div>


      <div class="hero mb-5">
        <img src="img/hero_bottom.jpg" class="card-img-top object-fit-cover" style="max-height: 400px; filter:brightness(80%)" alt="...">
      </div>

      <div class="content pb-5 mx-5 border-bottom">
        <div class="card">
          <div class="card-body text-center">
            <p>Certified by</p>
            <h3><b>BIG BRAND</b></h3>

            <div class="brand d-flex flex-row align-items-center gap-5 justify-content-center">
            <h3 class="bi bi-amd"></h3>
            <h1 class="bi bi-nvidia"></h1>
            <?xml version="1.0" ?><svg width="50px" height="50px" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title/><path d="M7.07 10.8v3.877H5.837V9.804l2.547.002c1.08 0 1.449.764 1.449 1.456v3.415h-1.23v-3.408c0-.291-.149-.469-.513-.469H7.07zm8.389-.058c-.422 0-.748.216-.885.51-.077.167-.117.347-.118.53h1.898c-.023-.53-.263-1.04-.895-1.04zm-1.003 1.88c0 .629.393 1.095 1.094 1.095.544 0 .815-.15 1.131-.466l.762.729c-.487.481-1.001.773-1.902.773-1.18 0-2.31-.643-2.31-2.52 0-1.605.985-2.512 2.281-2.512 1.315 0 2.075 1.063 2.075 2.455v.443h-3.131v.003zm-2.268 2.047c-1.004 0-1.432-.699-1.432-1.391v-4.8h1.232v1.327h.928v.996h-.929v2.4c0 .284.135.44.429.44h.5v1.027h-.728zM4.739 9.131H3.497v-1.18h1.242v1.18zm.003 5.595c-.93-.088-1.246-.651-1.246-1.305V9.806H4.74v4.924l.002-.004zm14.805-.104c-.929-.09-1.243-.652-1.243-1.303V7.784h1.243v6.84-.002zm4.347-6.038C22.769 3.091 12.102 2.743 5.23 6.927v.462c6.865-3.528 16.604-3.508 17.491 1.55.296 1.675-.646 3.418-2.329 4.422v1.311c2.025-.742 4.105-3.147 3.502-6.088zm-12.496 9.61c-4.742.438-9.686-.251-10.377-3.957-.337-1.827.497-3.765 1.598-4.967v-.643C.632 10.37-.446 12.577.175 15.184c.792 3.345 5.035 5.239 11.509 4.609 2.563-.249 5.916-1.074 8.247-2.354v-1.816c-2.116 1.261-5.617 2.302-8.533 2.571zM20.984 8.15c0-.06-.037-.079-.116-.079h-.077v.17l.077.002c.079 0 .116-.025.116-.084V8.15zm.12.423h-.091c-.009 0-.018-.004-.021-.012l-.125-.213c-.003-.005-.013-.01-.019-.01h-.056v.212c0 .012-.009.025-.023.025h-.082c-.011 0-.021-.014-.021-.025v-.533c0-.029.012-.045.038-.048.05-.005.101-.006.152-.006.152 0 .246.046.246.188v.01c0 .09-.046.135-.114.158l.13.219c0 .006.005.012.005.018.002.007-.004.017-.019.017v.002-.002zm-.218-.709c-.226 0-.408.184-.408.41.001.227.186.409.411.408.225 0 .406-.182.409-.406-.002-.226-.185-.411-.412-.412zm0 .907c-.273 0-.495-.222-.495-.495s.222-.495.494-.495h.001c.271 0 .495.224.495.495 0 .274-.224.495-.495.495z"/></svg>
            <?xml version="1.0" ?><svg height="70px" id="形状_2_1_" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="70px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="形状_2"><g><path d="M252.448,235.16v-26.617h-85.785    c-12.663,0-23.368,8.803-26.299,20.593v-20.462H89.159l-17.45,26.475h67.865L252.448,235.16z M283.443,208.676h-26.747v26.473    h26.747V208.676z M366.999,208.676h-26.742v26.473h26.742V208.676z M26.022,304.457h33.085l42.296-65.913l-30.761-1.776    L26.022,304.457z M394.376,208.543c-14.738,0-26.824,11.927-27.09,26.605l118.691,0.012v-26.617H394.376z M458.882,246.43    l-5.065-0.223c-28.724-1.264-57.361-2.711-86.049-4.191c2.232,11.256,11.732,20.628,26.608,22.641l62.534,3.836    c2.575,0,4.676,2.104,4.676,4.675c0,2.571-2.101,4.676-4.676,4.676h-89.911v-35.867l-26.742-1.38v30.677    c0,4.297-3.514,7.805-7.805,7.805h-41.204c-4.297,0-7.805-3.508-7.805-7.805v-33.607l-26.747-1.38v30.409    c-3.057-11.504-13.676-19.797-26.21-19.797l-117.786-7.701v65.261h117.786c13.138,0,24.167-9.474,26.598-21.929    c2.145,12.414,13.002,21.929,25.975,21.929h57.582c12.864,0,23.654-9.361,25.918-21.626v21.626h92.323    c14.902,0,27.096-12.188,27.096-27.096v-3.836C485.978,258.623,473.784,246.43,458.882,246.43z M228.518,277.843h-88.154v-34.461    c2.709,10.64,12.032,19.344,26.299,21.274l61.855,3.836c2.572,0,4.676,2.104,4.676,4.675    C233.194,275.738,231.09,277.843,228.518,277.843z" style="fill-rule:evenodd;clip-rule:evenodd;fill:#1B1B1B;"/></g></g></svg>
            </div>

          </div>
        </div>
      </div>

      <div class="ulasan mt-5 mx-5 d-flex flex-row align-items-center">
        <a href="#" class="text-decoration-none text-black"><h3>Ulasan user</h3></a>
        <span class="bi bi-chevron-right"></span>
      </div>

        <div class="row grid content mt-2 mx-5 gap-4 justify-content-between">
          <div class="card col-sm">
            <div class="card-body">
              <p class="m-0">"Ini sangat keren!"</p>
              <h3>Diazdn</h3>
            </div>
          </div>
          <div class="card col-sm">
            <div class="card-body">
              <p class="m-0">"Ini sangat keren!"</p>
              <h3>Tetua suku</h3>
            </div>
          </div>
          <div class="card col-sm">
            <div class="card-body">
              <p class="m-0">"Ini sangat keren!"</p>
              <h3>Tiga people anonymous</h3>
            </div>
          </div>
        </div>
@endsection