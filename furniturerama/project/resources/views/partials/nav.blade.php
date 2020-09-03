<nav class="navbar custom navbar-expand-lg navbar-light bg-light">
<div class='container tshadow2'>
  <a class="navbar-brand admin logo mt-2" href="/"><img src="/images/logo.svg" alt="Furniturerama Logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mx-auto pt-3">
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
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
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
    </div> <!--/.navbarSupportedContent-->

  </div>
</nav>
