@extends('layouts.app')
@section('content')
    <!-- ======= Pendaftaran Santri Section ======= -->
    <section id="about" class="daftar">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Pendaftaran Siswa Baru<br>Sekolah Menengah Atas Islam Al-Istiqomah Cianjur</h2>
          <p class="tahun-ajaran">Tahun Ajaran : <span>2023 - 2024</span></p>
        </div>

        <div class="row gy-3">
          <div class="text-center foto-brosur">
            <!-- <h3>Voluptatem dignissimos provident quasi corporis</h3> -->
            <a href="{{ asset('storage/' . $pendaftaran->gambar) }}" download data-><img src="{{ asset('storage/' . $pendaftaran->gambar) }}" class="img-fluid rounded-4 mb-4 foto-tokoh" alt=""></a>
            <!-- <div class="text-center struktur-update">
              <p class="fst-italic">Updated at <span>25 Januari 2023</span></p>
            </div> -->
          </div>
        </div>

      </div>
    </section><!-- End Pendaftaran Santri Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="biaya" class="biaya sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Biaya Pendaftaran</h2>
          <p>Berikut adalah rincian biaya untuk melakukan pendaftaran Santri Pondok Pesantren Salafiyah Al-Istiqomah Cianjur.</p>
        </div>

        <div class="row justify-content-center align-items-center" data-aos="zoom-out" data-aos-delay="100">
          <div class="col-lg-4 col-md-8 col-sm-10">
            <div class="biaya-item">
              <!-- <h3>Business Plan</h3> -->
              <div class="icon">
                <i class="bi bi-cash-coin"></i>
              </div>

              <h4><sup>Rp</sup>{{ $total }}</h4>
              <ul>
                @foreach ($biaya as $data)
                    <li><i class="bi bi-check"></i> {{$data->nama}} : <sup>Rp</sup>{{$data->harga}}</li>
                @endforeach
                {{-- <li><i class="bi bi-check"></i> Bulanan : <sup>Rp</sup>460.000<sub> / bulan</sub></li>
                <li><i class="bi bi-check"></i> Lemari : <sup>Rp</sup>500.000 (Hak Milik)</li> --}}
              </ul>
              <div class="text-center"><a href="#" class="buy-btn">Daftar</a></div>
            </div>
          </div><!-- End Pricing Item -->
        </div>

      </div>
    </section><!-- End Pricing Section -->

@endsection