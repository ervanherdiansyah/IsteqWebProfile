@extends('layouts.app')
@section('content')
<section id="services" class="services sections-bg">
    <div class="container" data-aos="fade-up">

    <div class="section-header">
        <h2>Akses Cepat</h2>
    </div>

    <div class="row gy-4 justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="100">

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="service-item position-relative">
                <a href="{{url('/maintenance')}}" class="stretched-link"><h3>Aplikasi Murid</h3></a>
            </div>
        </div><!-- End Service Item -->
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="service-item  position-relative">
                <a href="{{url('/maintenance')}}" class="stretched-link"><h3>Aplikasi Guru & Staff</h3></a>
            </div>
        </div><!-- End Service Item -->
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="service-item  position-relative">
                <a href="{{url('/unit')}}" class="stretched-link"><h3>Unit Siswa & Santri</h3></a>
            </div>
        </div><!-- End Service Item -->
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="service-item  position-relative">
                <a href="{{url('/pendaftaran')}}" class="stretched-link"><h3>Pendaftaran</h3></a>
            </div>
        </div><!-- End Service Item -->

    </div>

    </div>
</section>

@endsection