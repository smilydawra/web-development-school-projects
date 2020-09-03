<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Furniturerama' }}</title>
    <link rel='stylesheet' href='/css/app.css'>
    <!--favorite icon on tab-->
    <link rel="icon" href="/images/logo_small.svg" type="image/x-icon">
</head>
    <body class='bg'>
        <header>
            <nav class="navbar custom navbar-expand-lg navbar-light scrolling-navbar fixed-top">
              <div class='container tshadow2'>

                  <a class="navbar-brand logo" href="/"><img src="/images/logo.svg"></a>
                  <button id="mobile_button" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse justify-content-start" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto pt-3 ">
                      <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/furniture">Furniture</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                      </li>
                      @guest
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('login') }}">{{ __('Log in') }}</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                      @else
                      @if(Auth::user()->admin)
                        <li class="nav-item">
                              <a class="nav-link" href="/admin">Admin Dashboard</a>
                        </li>
                      @endif
                      <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->userFirstName }} {{ Auth::user()->userLastName }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('user.profile') }}"
                                    >
                                        {{ __('Profile') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    @endguest
                    </ul>

                    <div id="icons" >
                  <!--log in-->
                  <a href="user/profile"><i class="fa fa-user text-muted" aria-hidden="true" style="font-size: 1.7em !important;"></i></a>

                  <!--cart-->
                  <a href="/cart" style="text-decoration: none">
                    <i class="fa fa-shopping-cart text-muted" style="font-size: 2em !important;" aria-hidden="true"></i>

                    <span class="badge badge-warning d-inline-block" style="margin-left: -10px; background-color: #ffba26;">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                  </a>

                  <!--search-->
                  <i class="fa fa-search text-muted" style="font-size: 1.7em !important;" aria-hidden="true" id="search_button"></i>
                  </div>
                  <!--/. icons -->
                  <form id="search_form" action="/search" method="GET" style="display:none;">
                    <input type="text" class="form-control" name="s" id="s" maxlength="255" value="{{ request()->input('s') }}" style="height:25px; width: 170px;  border: 2px solid #ff9521; border-radius: 10px"/>
                  </form>

                  </div>

                </div>
                </nav>
        @include('partials/flash')
        </header>
        <main>
            <div class='container-fluid'>
                <div class="d-flex justify-content-center align-items-center banner">
                    <div class="tshadow" class="col-7">
                        <p class='add'>50%</br>OFF</p>
                        <p class='add2'>FREE Shipping on order over $500</p>
                        <p class='add2'>Only $50 Shipping on orders under $500</p>
                        <a href="/furniture"><button class="rounded btn yel_button text-uppercase">click to view</button></a>
                    </div>
                </div>
            </div>
            <div class='container'>
                <div class='shopbycollection mb-3 mt-5'>
                    <h2 class="font-weight-bold mb-3">Shop by collection</h2>
                    <div class="d-flex justify-content-center mb-3">
                        <div class='top row align-items-center'>
                            <div class='d-flex justify-content-start one col-2 font-weight-bold'>FINAL SALE</div>
                            <div class=' col-4 font-weight-bold'>Now up to 70% off</div>
                            <div class='d-flex justify-content-end col-5 font-weight-bold'><a href="furniture/category/MarkDown"><div type="button" class=" rounded btn btn-light">Shop Now</div></a></div>
                        </div>
                    </div>
                    <div class='row d-flex justify-content-center mb-5'>

                        <div class="d-flex justify-content-center col" data-aos="fade-up" data-aos-duration="1500" data-aos-easing="ease-in-quad" data-aos-anchor-placement="top-bottom">
                            <div class='ls col'>
                                <div class="col-7">
                                    <p class="font-weight-bold mt-5">Dining Room</p>
                                    <h3 class="font-weight-bold">MODERN CHAIRS</h3>
                                    <a href="furniture/category/Chair"><button class="rounded btn mt-2 yel_button">SHOP NOW</button></a>
                                </div>
                            </div>
                        </div>

                        <div class="col" data-aos="fade-right" data-aos-duration="1500" data-aos-easing="ease-in-quad" data-aos-anchor-placement="top-bottom">
                            <div class='item1 mb-3'>
                                <div class="col-7">
                                    <p class="font-weight-bold pt-5">Living Room</p>
                                    <h3 class="font-weight-bold">COZY SOFAS</h3>
                                    <a href="furniture/category/Sofa"><button class="rounded btn yel_button mt-2">SHOP NOW</button></a>
                                </div>
                            </div>

                            <div class='item2'>
                                <div class="col-7">
                                    <p class="font-weight-bold pt-5">Home Organization</p>
                                    <h3 class="font-weight-bold">CONSOLE TABLES</h3>
                                    <a href="search?s=console"><button class="rounded btn yel_button mt-2">SHOP NOW</button></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class='newarrivals d-flex align-items-center mb-5 responsive-parent'>
                    <div class="d-flex justify-content-end responsive-object" style='' data-aos="zoom-in" data-aos-duration="1500" data-aos-anchor-placement="top-bottom">
                        <div class='col-5 bg-light responsive-object' style=''>
                            <div class="py-5 px-5 responsive-object">
                                <h2 class="font-weight-bold">New arrivals</h2>
                                <p class="text-muted">Our latest collections bring relaxed beauty to every room with natural hues, rich textures and rustic details.</p>
                                <div><a href="/furniture"><button class="rounded btn yel_button">CLICK TO VIEW</button></a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <h2 class='fp font-weight-bold mb-3'>Featured Products</h2>
                <div class="row mx-0 d-flex align-items-center mb-5" data-aos="zoom-in" data-aos-duration="1500" data-aos-anchor-placement="top-bottom">
                    @foreach($furnitures as $furniture)
                    <div class="shadow-sm bg-white col-sm pl-0 pr-0 up mx-1">
                        <a href="/furnitures/{{ $furniture->id }}/detail"><img class='f-img' src='{{ $furniture->image }}' alt='{{ $furniture->name }}' class="img-fluid"></a>
                        <p class="product_h6 font-weight-bold pl-3 pt-2"><a href="/furnitures/{{ $furniture->id }}/detail" class="text-dark">{{ $furniture->name }}</a></p>
                        <div class="price font-weight-bold pl-3">
                            <span>Buy at</span><br/>
                            <span class="text-danger">${{ $furniture->cost }}</span>
                        </div>
                        <div>
                            <a href="/cart/{{ $furniture->id }}" class="text-white font-weight-bold btn btn-lg btn-block btn-sm" style="text-decoration: none; background-color: #ffba26; border: 1px solid #ffba26; font-size:1em;">Add to Cart</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class='row mb-5 mx-0'>
                    <div class="col-7 pl-0 pr-0">
                        <div class="sale-img"></div>
                    </div>
                    <div class="sale col w-auto d-flex align-items-center justify-content-center pl-0 pr-0">
                        <div class='sale-txt'>
                            <h2 class="font-weight-bold">Sale</h2>
                            <p class="font-weight-bold">up to 30% off</p>
                            <a href="furniture/category/MarkDown"><button class="rounded btn btn-dark">CLICK TO VIEW</button></a>
                        </div>
                    </div>
                </div>
                <h2 class='fp font-weight-bold mb-3'>Sale Products</h2>
                <div class="row mx-0 d-flex align-items-center mb-5" data-aos="zoom-in" data-aos-duration="1500" data-aos-anchor-placement="top-bottom">
                    @foreach($furnitures2 as $furniture)
                    <div class="shadow-sm bg-white col-sm pl-0 pr-0 up mx-1">
                        <a href="/furnitures/{{ $furniture->id }}/detail"><img class='f-img' src='{{ $furniture->image }}' alt='{{ $furniture->name }}' class="img-fluid"></a>
                        <p class="product_h6 font-weight-bold pl-3 pt-2"><a href="/furnitures/{{ $furniture->id }}/detail" class="text-dark">{{ $furniture->name }}</a></p>
                        <div class="price font-weight-bold pl-3">
                            <span>was </span><span class="cut_price">${{ $furniture->price }}</span><br/>
                            <span>now </span><span class="text-danger">${{ $furniture->cost }}</span>
                        </div>
                        <div>
                            <a href="/cart/{{ $furniture->id }}" class="text-white font-weight-bold btn btn-lg btn-block btn-sm" style="text-decoration: none; background-color: #ffba26; border: 1px solid #ffba26; font-size:1em;">Add to Cart</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <h2 class='fp mb-5 font-weight-bold'>Why should you choose us?</h2>
                <div class='row whyus  mx-0 mb-5'>
                    <div class='col-md-3 why'>
                        <img src='images/shipping2.png' class="mb-3" alt='Shipping Logo'>
                        <h3>Free Shipping</h3>
                        <p class="text-muted" style="margin: 0px;">Free Shipping on orders over $500.</p>
                        <p class="text-muted">Flat Rate Shipping on orders under $500.</p>
                    </div>
                    <div class='col-md-3 why'>
                        <img src='images/payment.png' class="mb-3" alt='Shipping Logo'>
                        <h3>Easy Payment</h3>
                        <p class="text-muted" style="margin: 0px;">Accepting multiple forms of paymeent online using: Visa, Mastardcard & Amex.</p>
                    </div>
                    <div class='col-md-3 why'>
                        <img src='images/shipping.png' class="mb-3" alt='Shipping Logo'>
                        <h3>24/hr Shipping</h3>
                        <p class="text-muted">Recieve shipping confirmation within 24 hours, once your payment has been processed.</p>
                    </div>
                    <div class='col-md-3 why'>
                        <img src='images/gurantee.png' class="mb-3" alt='Shipping Logo'>
                        <h3>100% Gurantee</h3>
                        <p class="text-muted" style="margin: 0px;">Satisfaction Guranteed, we will personally look into any issues you may have with your order.</p>
                    </div>
                </div>
            </div>
        </main>
        @include('partials/footer')
        <script src="/js/app.js"></script>
    </body>

</html>
