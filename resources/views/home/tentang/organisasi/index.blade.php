@extends('layouts.app')
@section('content')
<section id="services" class="services sections-bg">
    <div class="container" data-aos="fade-up">

    <div class="section-header">
        <h2>Organisasi dan Tata Kerja<br>Al-Istiqomah Cianjur</h2>
    </div>

    <div class="row gy-4 justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="100">

        <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="service-item position-relative">
                <a href="{{url('/tentang/organisasi/struktur')}}" class="stretched-link"><h3>Struktur Organisasi</h3></a>
            </div>
        </div><!-- End Service Item -->
        <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="service-item  position-relative">
                <a href="{{url('/tentang/organisasi/profil')}}" class="stretched-link"><h3>Profil Pimpinan</h3></a>
            </div>
        </div><!-- End Service Item -->
        <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="service-item  position-relative">
                <a href="{{url('/tentang/organisasi/ra')}}" class="stretched-link"><h3>Raudhatul Athfal</h3></a>
            </div>
        </div><!-- End Service Item -->
        <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="service-item  position-relative">
                <a href="{{url('/tentang/organisasi/mts')}}" class="stretched-link"><h3>Madrasah Tsanawiyah</h3></a>
            </div>
        </div><!-- End Service Item -->
        <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="service-item  position-relative">
                <a href="{{url('/tentang/organisasi/sma')}}" class="stretched-link"><h3>Sekolah Menengah Atas</h3></a>
            </div>
        </div><!-- End Service Item -->

    </div>

    </div>
</section>

@endsection