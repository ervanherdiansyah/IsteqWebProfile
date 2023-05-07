@extends('layouts.app')
@section('content')
    <section id="services" class="services sections-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Divisi Al-Istiqomah Cianjur</h2>
            </div>

            <div class="row gy-4 justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="100">
                
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="service-item position-relative text-center">
                        <div class="justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/logo-isteq-media.png') }}"
                                alt="LOGO-SMA-REMAKE-2-Artboard-1-copy-2"
                                style="height:95px; margin-top:-10px; margin-bottom:10px;">
                        </div>
                        <a href="{{ url('/tentang/divisi/media') }}" class="stretched-link">
                            <h3>Divisi Media</h3>
                        </a>
                    </div>
                </div><!-- End Divisi Item -->

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="service-item position-relative text-center">
                        <div class="">
                            <img src="https://cdn3.iconfinder.com/data/icons/luchesa-vol-9/128/Html-512.png"
                                alt="LOGO-SMA-REMAKE-2-Artboard-1-copy-2"
                                style="height:95px; margin-top:-10px; margin-bottom:10px;">
                        </div>
                        <a href="{{ url('/tentang/divisi/it') }}" class="stretched-link">
                            <h3>Divisi IT</h3>
                        </a>
                    </div>
                </div><!-- End Divisi Item -->
            </div>

        </div>
    </section>
@endsection
