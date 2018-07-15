<div class="container">
  <a href="{{ url('/front-page') }}"><div class="navbar__img pull-left"></div></a>
  <button class="navbar-btn pull-right">
    <span class="navbar-btn-icon"></span>
    <span class="navbar-btn-icon"></span>
    <span class="navbar-btn-icon"></span>
  </button>
  <ul class="navbar-menu pull-right">
    <li class="navbar-menu-list">
      <a href="{{ url('/front-page') }}" class="navbar-menu-list__link">Program <i class="fa fa-angle-down" aria-hidden="true"></i></a>
      <ul class="navbar-menu-list-dropdown">
        <li><a href="{{ url('/front-page#alur') }}" class="navbar-menu-list-dropdown__link">Alur</a></li>
        <li><a href="{{ url('/front-page#reward') }}" class="navbar-menu-list-dropdown__link">Reward</a></li>
        <li><a href="{{ url('/syarat-ketentuan') }}" class="navbar-menu-list-dropdown__link">Syarat dan Ketentuan</a></li>
        <li class="navbar-submenu-list">
          <a href="#" class="navbar-menu-list-dropdown__link">Form<span class="fa fa-angle-right pull-right" style="margin-right:10px;" aria-hidden="true"></span></a>
          <ul class="navbar-submenu-list-dropdown">
            @if(!Auth::check())
            <li><a href="{{ url('/registration') }}" class="navbar-menu-list-dropdown__link">Registrasi</a></li>
            @endif
            @if(Auth::check() && Auth::user()->role=="member")
            <li><a href="{{ url('/active-customer') }}" class="navbar-menu-list-dropdown__link">Referensi Aktif</a></li>
            <li><a href="{{ url('/passive-customer') }}" class="navbar-menu-list-dropdown__link">Referensi Pasif</a></li>
            @endif
          </ul>
        </li>
        <li><a href="{{ url('/faq') }}" class="navbar-menu-list-dropdown__link">FAQ</a></li>
        <li><a href="{{ url('/kontak') }}" class="navbar-menu-list-dropdown__link">Kontak</a></li>
      </ul>
    </li>
    <li class="navbar-menu-list">
      <a href="{{ url('/wg-products') }}" class="navbar-menu-list__link">Produk</a>
    </li>
    <li class="navbar-menu-list">
      <a href="#" class="navbar-menu-list__link">News <i class="fa fa-angle-down" aria-hidden="true"></i></a>
      <ul class="navbar-menu-list-dropdown">
        <li><a href="{{ url('/quiz') }}" class="navbar-menu-list-dropdown__link">Games & Quiz</a></li>
        <li><a href="{{ url('/artikel') }}" class="navbar-menu-list-dropdown__link">Artikel</a></li>
        <li><a href="{{ url('/event') }}" class="navbar-menu-list-dropdown__link">Event</a></li>
        <li><a href="{{ url('/galeri') }}" class="navbar-menu-list-dropdown__link">Galeri</a></li>
        <li><a href="{{ url('/testimoni') }}" class="navbar-menu-list-dropdown__link">Testimoni</a></li>
      </ul>
    </li>
    <li class="navbar-menu-list">
      @if(!Auth::check())
      <a href="{{ url('/member-login') }}" class="navbar-menu-list__link">Login</a>
      @elseif(Auth::user()->role=="member")
      <a href="{{ url('/member-dashboard') }}" class="navbar-menu-list__link">Dashboard</a>
      @else
      <a href="{{ url('/member-login') }}" class="navbar-menu-list__link">Login</a>
      @endif
    </li>
    <li class="navbar-menu-list">
    @if(!Auth::check())
      <a href="{{ url('/registration') }}" class="navbar-menu-list__link navbar-menu-list__link--cta">Registrasi</a>
    @elseif(Auth::user()->role=="member")
    <a href="{{ url('/member-logout') }}" class="navbar-menu-list__link navbar-menu-list__link--cta">Logout</a>
    @else
      <a href="{{ url('/registration') }}" class="navbar-menu-list__link navbar-menu-list__link--cta">Registrasi</a>
    @endif
    </li>
  </ul>
</div>
