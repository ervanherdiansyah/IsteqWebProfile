@extends('layouts.app')
@section('content')
<section id="services" class="services sections-bg">
    <div class="container" data-aos="fade-up">

    <div class="section-header">
        <h2>Tentang Al-Istiqomah Cianjur</h2>
    </div>

    <div class="row gy-4 justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="100">

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="service-item position-relative">
                <a href="{{url('/tentang/selayangpandang')}}" class="stretched-link"><h3>Selayang Pandang</h3></a>
            </div>
        </div><!-- End Service Item -->
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="service-item  position-relative">
                <a href="{{url('/tentang/organisasi')}}" class="stretched-link"><h3>Organisasi & Tata Kerja</h3></a>
            </div>
        </div><!-- End Service Item -->
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="service-item  position-relative">
                <a href="{{url('/tentang/divisi')}}" class="stretched-link"><h3>Divisi</h3></a>
            </div>
        </div><!-- End Service Item -->
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="service-item  position-relative">
                <a href="https://www.youtube.com/@isteqmediachannel5901" class="stretched-link" target="_blank"><h3>YouTube Isteq</h3></a>
            </div>
        </div><!-- End Service Item -->

    </div>

    </div>
</section>

@endsection