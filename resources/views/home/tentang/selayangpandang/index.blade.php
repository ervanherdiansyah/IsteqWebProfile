@extends('layouts.app')
@section('content')
<section id="services" class="services sections-bg">
    <div class="container" data-aos="fade-up">

    <div class="section-header">
        <h2>Selayang Pandang Al-Istiqomah Cianjur</h2>
    </div>

    <div class="row gy-4 justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="100">

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="service-item position-relative">
                <a href="{{url('/tentang/selayangpandang/sambutan')}}" class="stretched-link"><h3>Sambutan Kepala Yayasan</h3></a>
            </div>
        </div><!-- End Service Item -->
        
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="service-item  position-relative">
                <a href="{{url('/tentang/selayangpandang/visi')}}" class="stretched-link"><h3>Visi, Misi, dan Tujuan</h3></a>
            </div>
        </div><!-- End Service Item -->

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="service-item  position-relative">
                <a href="{{url('/tentang/selayangpandang/sejarah')}}" class="stretched-link"><h3>Sejarah</h3></a>
            </div>
        </div><!-- End Service Item -->
        
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="service-item  position-relative">
                <a href="{{url('/tentang/selayangpandang/lokasi')}}" class="stretched-link"><h3>Peta Lokasi</h3></a>
            </div>
        </div><!-- End Service Item -->

    </div>

    </div>
</section>

@endsection