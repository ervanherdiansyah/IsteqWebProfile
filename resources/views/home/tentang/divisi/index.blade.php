@extends('layouts.app')
@section('content')
    <section id="services" class="services sections-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Divisi Al-Istiqomah Cianjur</h2>
            </div>

            <div class="row gy-4 justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="100">
                @foreach ($divisi as $data)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="service-item position-relative text-center">
                            <div class="justify-content-center align-items-center">
                                <img src="{{ asset('storage/' . $data->gambar) }}"
                                    alt="LOGO-SMA-REMAKE-2-Artboard-1-copy-2"
                                    style="height:95px; margin-top:-10px; margin-bottom:10px;">
                            </div>
                            <a href="{{ url('/tentang/divisi/'.$data->id) }}" class="stretched-link">
                                <h3>{{ $data->nama }}</h3>
                            </a>
                        </div>
                    </div><!-- End Divisi Item -->
                @endforeach
            </div>
        </div>
    </section>
@endsection
