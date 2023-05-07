@extends('layouts.app')
@section('content')
    <!-- ======= Biografi Section ======= -->
    <section id="about" class="biografi">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Biografi Pimpinan<br>Yayasan Pendidikan Islam Al-Istiqomah Cianjur</h2>
          <p class="nama-tokoh">{{$profil->nama}}</p>
        </div>

        <div class="row gy-3">
          <div class="col-lg-3 text-center">
            <img src="{{ asset('storage/' . $profil->gambar) }}" class="img-fluid rounded-4 mb-4 foto-tokoh" alt="">
            <!-- <h3 class="nama-tokoh">K. H. Aden Ali Abduloh, M.Pd.I.</h3> -->
          </div>
          <div class="col-lg-9">
            <div class="content ps-0 ps-lg-5 biografi-content">
              {!!$profil->deskripsi!!}
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

@endsection