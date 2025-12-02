<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand mb-0 h1" href="/">
      <img src="{{ asset('bootstrap-5.3.5-dist/img/logo unpam.png') }}" alt="" width="60" height="48" class="d-inline-block align-text-center">
      <span class="fw-semibold fs-5">Prodi Sistem Informasi</span>
    </a>
    <ul class="menu"">
      <li><a href="/">Home</a></li>
      <li><a href="/abouts">Abouts</a></li>
      <li><a href="/contact">Contact</a></li>
      <li><a href="/mahasiswa">Mahasiswa</a></li>
      <li><a href="/admin/mahasiswa">CRUD Mahasiswa</a></li>
      <li><a href="/admin/users">CRUD User</a></li>
      <li><a href="/jadwal">Jadwal Kuliah</a></li>
    </ul>
    {{-- <div class="search-bar">
      <form action="{{ route('mahasiswa.search') }}" method="GET" class="d-flex">
      <form action="{{ route('jadwal.search') }}" method="GET" class="d-flex">
        <input type="text" name="keyword" placeholder="apa yang dicari?" class="form-control" />
        <button type="submit" class="btn btn-light">
          <img src="{{ asset('bootstrap-5.3.5-dist/img/15-152459_search-icon-png.png') }}" alt="Cari" width="20">
        </button>
      </form>
    </div> --}}
      <ul class="navbar-nav ms-auto">
        @auth
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li>
              <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
              </form>
            </li>
          </ul>
          
        </li>
        @else
        <li class="nav-item">
          <a href="{{ route('login') }}" class="nav-link">Login</a>
        </li>
        @endauth
      </ul>
  </div>
</nav>
</header>