<section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      @php
        $data = App\ModelHeader::first();
      @endphp
      <!-- @foreach(\App\ModelHeader::all() as $sosmed) -->
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">{{$data->email}}</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{$data->nohp}}</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="{{$data->twiter}}" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="{{$data->facebook}}" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="{{$data->instagram}}" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="{{$data->youtube}}" target="_blank" class="youtube"><i class="bi bi-youtube"></i></a>
        <a href="{{$data->tiktok}}" target="_blank" class="tiktok"><i class="bi bi-tiktok"></i></a>
      </div>
      <!-- @endforeach -->
    </div>
  </section><!-- End Top Bar -->

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="https://i.ibb.co/Yp4tr14/isteq-logo-remake.png" alt="Logo Isteq">
        <h1>Al-Istiqomah<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{url('/')}}">Home</a></li>
          <li class="dropdown"><a href="{{url('/tentang')}}"><span>Tentang Isteq</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li class="dropdown"><a href="{{url('/tentang/selayangpandang')}}"><span>Selayang Pandang</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="{{url('/tentang/selayangpandang/sambutan')}}">Sambutan Kepala Yayasan</a></li>
                  <li><a href="{{url('/tentang/selayangpandang/sejarah')}}">Sejarah</a></li>
                  <li><a href="{{url('/tentang/organisasi/profil')}}">Biografi Pimpinan Yayasan</a></li>
                  <li><a href="{{url('/tentang/selayangpandang/visi')}}">Visi dan Misi Yayasan</a></li>
                  <li><a href="{{url('/tentang/selayangpandang/lokasi')}}">Peta Lokasi</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="{{url('/tentang/organisasi')}}"><span>Organisasi dan Tata Kerja</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="{{url('/tentang/organisasi/struktur')}}">Struktur Organisasi</a></li>
                  <li><a href="{{url('/ra')}}">RA</a></li>
                  <li><a href="{{url('/mts')}}">MTs</a></li>
                  <li><a href="{{url('/sma')}}">SMA</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="{{url('/tentang/divisi')}}"><span>Divisi</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="{{url('/tentang/divisi/media')}}">Media</a></li>
                  <li><a href="{{url('/tentang/divisi/it')}}">IT</a></li>
                </ul>
              </li>
              <li><a href="https://www.youtube.com/@isteqmediachannel5901" target="_blank">Kanal YouTube Isteq</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="{{url('/aksescepat')}}"><span>Akses Cepat</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li class="dropdown"><a href="{{url('/maintenance')}}"><span>Aplikasi</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="{{url('/maintenance')}}">Murid</a></li>
                  <li><a href="{{url('/maintenance')}}">Guru</a></li>
                </ul>
              </li>
              <li><a href="{{url('/unit')}}">Ekskul Siswa & Santri</a></li>
              <li><a href="{{url('/berita')}}">Berita</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="{{url('/pendaftaran')}}"><span>Pendaftaran</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="{{url('/pendaftaran/santri')}}">Santri</a></li>
              <!-- <li><a href="{{url('/pendaftaran/ra')}}">Raudhatul Athfal</a></li> -->
              <li><a href="{{url('/pendaftaran/mts')}}">Madrasah Tsanawiyah</a></li>
              <li><a href="{{url('/pendaftaran/sma')}}">Sekolah Menengah Atas</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="{{url('/sma')}}"><span>SMA</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="{{url('/sma/headmaster')}}">Kepala SMA</a></li>
              <li><a href="{{url('/sma/visimisi')}}">Visi dan Misi</a></li>
              <li><a href="{{url('/sma/struktur')}}">Struktur Organigram</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="{{url('/mts')}}"><span>MTs</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
          <ul>
            <li><a href="{{url('/mts/headmaster')}}">Kepala MTs</a></li>
            <li><a href="{{url('/mts/visimisi')}}">Visi dan Misi</a></li>
            <li><a href="{{url('/mts/struktur')}}">Struktur Organigram</a></li>
          </ul>
          </li>
          <li class="dropdown"><a href="{{url('/ra')}}"><span>RA</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="{{url('/ra/headmaster')}}">Kepala RA</a></li>
              <li><a href="{{url('/ra/visimisi')}}">Visi dan Misi</a></li>
              <li><a href="{{url('/ra/struktur')}}">Struktur Organigram</a></li>
            </ul>
          </li>
          <li><a href="{{url('/contact')}}">Contact Us</a></li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
</header><!-- End Header -->
  <!-- End Header -->