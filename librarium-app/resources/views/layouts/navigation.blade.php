<style>

@import url('https://fonts.googleapis.com/css2?family=DM+Mono:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap');

.navbar {
  height: 10vh !important;
  transition: box-shadow 0.5s ease;
  background: rgb(68,180,176);
background: linear-gradient(90deg, rgba(68,180,176,1) 35%, rgba(69,149,146,1) 100%);
}

.navbar .navbar-nav .nav-link {
  color: #e0ebf6 !important;
  font-family: 'DM Mono', monospace;
}

.navbar .navbar-nav .nav-link.active {
  color: #ffffff !important;
}

.navbar .navbar-nav .nav-link:hover,
.navbar .navbar-nav .nav-link:focus,
.navbar .navbar-nav .nav-link.active {
  color: #ffffff !important;
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
  color: #e0ebf6 !important;
}

.navbar .navbar-nav .dropdown-toggle:hover,
.navbar .navbar-nav .dropdown-toggle:focus {
  color: #ffffff !important;
}

a {
  font-size: 2dvh !important;
}

</style>

<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
  <div class="container-fluid px-5">
    <!-- Logo -->
    <a class="navbar-brand" href="{{ route('dashboard') }}" style="color: #ffffff !important;">
      <img src="{{ asset('img/logowhite.png') }}" alt="Logo" width="150">
    </a>

    <!-- Hamburger -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navigation Links -->
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}" href="{{ route('dashboard') }}">{{ __('Home') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Route::currentRouteName() == 'booking.index' ? 'active' : '' }}" href="{{ route('booking.index') }}">{{ __('Prenotazioni') }}</a>
        </li>
      </ul>

      <!-- Settings Dropdown -->
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
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
      </ul>
    </div>
  </div>
</nav>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var div = document.querySelector("nav");
    var hero = document.querySelector(".hero");
    div.style.boxShadow = "none";
});

window.onscroll = function() {
    var div = document.querySelector("nav");
    var hero = document.querySelector(".hero");
    if (window.pageYOffset > 0 && window.pageYOffset < hero.offsetHeight) {
        div.style.boxShadow = "0 2px 20px rgba(0, 0, 0, 0.5)";
    } else {
        div.style.boxShadow = "none";
    }
};
</script>

