<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title ?? 'Admin' }}</title>
    <link rel="stylesheet" href="/css/app.css" />
    <style>
      .section1{
       
        padding: 100px;
      }
    </style>
</head>
<body>
    <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">Furniturerama</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/admin">Dashboard</a>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Tables
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/admin/furniture/view">Furniture</a>
              <a class="dropdown-item" href="/admin/user/view">Users</a>
              <a class="dropdown-item" href="/admin/order/view">Orders</a>
              <a class="dropdown-item" href="/admin/material/view">Materials</a>
              <a class="dropdown-item" href="/admin/manufacturer/view">Manufacturers</a>
              <a class="dropdown-item" href="/admin/tax/view">Taxes</a>
              <a class="dropdown-item" href="/admin/promotion/view">Promotions</a>
              <a class="dropdown-item" href="/admin/transaction/view">Transactions</a>
              <a class="dropdown-item" href="/admin/review/view">Reviews</a>
              <a class="dropdown-item" href="/admin/category/view">Categories</a>
             
        </div>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}</a>
                                      </li>
       <!--  Authentication links -->
       @guest
       <li class="nav-item"><a class="nav-link" href = "{{ route('login') }}">{{ __('Login') }}</a></li>
      
        @else
  
          <li class="nav-item">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }} <span class="caret"></span></a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
               

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                  </form>
              </div>
          </li>
        @endguest
      </ul>
    </nav>

     @include('partials/flash')

    
    <section class="section1" style='padding-top: 50px'>
        @yield('content')  
    </section>

    <div class="col"></div>
  </div>
    <footer class="footer navbar-fixed-bottom py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Furniturerama 2020</p>
    </div>
    <!-- /.container -->
  </footer>

<script src="/js/app.js"></script>
    
</body>
</html>