@extends('layouts.app')
@section('content')
    <!-- ======= Struktur Organisasi Section ======= -->
    <section id="about" class="struktur">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Struktur Organisasi<br>Sekolah Menengah Atas Islam Al-Istiqomah Cianjur</h2>
          <p class="tahun-periode">Tahun Periode : <span>{{$struktur->tahun_periode}}</span></p>
        </div>

        <div class="row gy-3">
          <div class="text-center foto-struktur">
            <!-- <h3>Voluptatem dignissimos provident quasi corporis</h3> -->
            <a href="{{ asset('storage/' . $struktur->gambar) }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{asset('assets')}}/img/breadcrumbs-bg.jpg" class="img-fluid rounded-4 mb-4 foto-tokoh" alt=""></a>
            <div class="text-center struktur-update">
              <p class="fst-italic">Updated at <span>{{$struktur->updated_at->isoFormat('D MMMM Y')}}</span></p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

@endsection