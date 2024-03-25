<style>

@font-face {
        font-family: "Silka";
        src: url("{{ asset('fonts/Silka.ttf') }}");
        font-weight: normal;
        font-style: normal;
    }

    .glass-effect-nav {
        height: 10vh !important;
        background-color: rgba(68, 180, 176, 0.8) !important;
        backdrop-filter: blur(10px) !important;
        border-bottom: 1px solid rgba(68, 180, 176, 0.9) !important;
        z-index: 10000 !important;
        transition: background-color 0.5s ease, backdrop-filter 0.5s ease, border-bottom 0.5s ease !important;
    }

    .barralink {
      bottom: 3px;
      position: relative;
    color: #ffffff !important;
    text-decoration: none; 
    }

    .barralink.active {
        color: #ffffff !important;
    }

    .barralink::after {
    content: '';
    position: absolute;
    left: 5%;
    bottom: -1.2dvh;
    width: 90%;
    height: 2px; 
    background-color: transparent;
    transition: background-color 0.3s ease; 
}

.barralink:hover::after,
.barralink:focus::after,
.barralink.active::after {
  bottom: -1.2dvh;
    background-color: #ffffff;
}

    .navbar-nav .dropdown-menu {
        background-color: #ffffff !important;
    }

    .navbar-nav .dropdown-menu .dropdown-item {
        color: #3d4145 !important;
    }

    .navbar-nav .dropdown-menu .dropdown-item:hover {
        background-color: #ffffff !important;
        color: #44b4b0 !important;
    }

    .navbar .navbar-nav .dropdown-toggle {
        color: #ffffff !important;
    }

    .navbar .navbar-nav .dropdown-toggle:hover,
    .navbar .navbar-nav .dropdown-toggle:focus {
        color: #ffffff !important;
    }

    a {
        font-size: 2dvh !important;
        visibility: visible;
    }

    .navbar-brand img {
        width: 16dvh !important;
    }

</style>

<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top glass-effect-nav">
  <div class="container-fluid px-5">
    <!-- Logo -->
    <a class="navbar-brand" href="{{ route('dashboard') }}" style="color: #ffffff !important;">
      <img src="{{ asset('img/logowhite.png') }}" alt="Logo">
    </a>

    <!-- Hamburger -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navigation Links -->
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="barralink nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}" href="{{ route('dashboard') }}">{{ __('Home') }}</a>
        </li>
        @if(Auth::user() && Auth::user()->role_id === 2)
          <li class="nav-item">
            <a class="barralink nav-link {{ Route::currentRouteName() == 'booking.index' ? 'active' : '' }}" href="{{ route('booking.index') }}">{{ __('Le mie prenotazioni') }}</a>
          </li>
          <li class="nav-item">
            <a class="barralink nav-link {{ Route::currentRouteName() == 'review.index' ? 'active' : '' }}" href="{{ route('review.index') }}">{{ __('Le mie recensioni') }}</a>
          </li>
            @elseif (Auth::user() && Auth::user()->role_id === 1)
              <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'booking.index' ? 'active' : '' }}" href="{{ route('user.index') }}">{{ __('Utenti') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'booking.index' ? 'active' : '' }}" href="{{ route('book.index') }}">{{ __('Libri') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'booking.index' ? 'active' : '' }}" href="{{ route('author.index') }}">{{ __('Autori') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'booking.index' ? 'active' : '' }}" href="{{ route('genre.index') }}">{{ __('Generi') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'booking.index' ? 'active' : '' }}" href="{{ route('review.index') }}">{{ __('Recensioni') }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'booking.index' ? 'active' : '' }}" href="{{ route('booking.index') }}">{{ __('Prenotazioni') }}</a>
              </li>
            @endif
      </ul>

      <!-- Settings Dropdown -->
      <ul class="navbar-nav">
        @if(Auth::user())
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink" style="background-color: white !important;">
            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
            <li>
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                {{ __('LogOut') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
          </ul>
        </li>
        @else
        <a class="nav-link " href="/login"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{  __('LogIn') }}
          </a>
          <a class="nav-link " href="/register"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{  __('Register') }}
          </a>
        @endif
      </ul>
    </div>
  </div>
</nav>