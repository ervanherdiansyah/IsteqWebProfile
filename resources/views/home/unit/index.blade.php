@extends('layouts.app')
@section('content')
<section id="services" class="unit sections-bg">
    <div class="container" data-aos="fade-up">

    <div class="section-header">
        <h2>Unit Siswa</h2>
        <p>MTs SA & SMA Islam Al-Istiqomah memiliki berbagai organisasi yang menjadi wadah bagi peserta didiknya untuk mengembangkan diri untuk bisa mencapai potensinya. Diantaranya adalah sebagai berikut :</p>
    </div>

    <div class="unit-header">
        <h2>Ekstrakurikuler SMA Islam Al-Istiqomah</h2>
    </div>

    <div class="row gy-4 justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="100">
        @foreach ($ekskulsma as $data)
            <div class="col-lg-2 col-md-6">
            <div class="unit-item position-relative">
                <div class="logo text-center">
                    <img src="{{ asset('storage/' . $data->gambar) }}" style="height:95px; margin-top:-10px; margin-bottom:10px;">
                </div>
                <h3 style="text-align:center;">{{$data->judul}}</h3>
                <!-- <p>Praja Muda Karana<br>(Golongan Penegak)</p> -->
                <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
        </div><!-- End unit Item -->
        @endforeach
    </div>

    <div class="unit-header" style="margin-top:40px;">
        <h2>Ekstrakurikuler MTs SA Al-Istiqomah</h2>
    </div>

    <div class="row gy-4 justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="100">
        @foreach ($ekskulmts as $data)
            <div class="col-lg-2 col-md-6">
            <div class="unit-item position-relative">
                <div class="logo text-center">
                    <img src="{{ asset('storage/' . $data->gambar) }}" style="height:95px; margin-top:-10px; margin-bottom:10px;">
                </div>
                <h3 style="text-align:center;">{{$data->judul}}</h3>
                <!-- <p>Praja Muda Karana<br>(Golongan Penegak)</p> -->
                <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
        </div><!-- End unit Item -->
        @endforeach
    </div>

    <div class="unit-header" style="margin-top:40px;">
        <h2>Ekstrakurikuler Pondok Pesantren Al-Istiqomah</h2>
    </div>

    <div class="row gy-4 justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="100">
        @foreach ($ekskulsma as $data)
            <div class="col-lg-2 col-md-6">
            <div class="unit-item position-relative">
                <div class="logo text-center">
                    <img src="{{ asset('storage/' . $data->gambar) }}" style="height:95px; margin-top:-10px; margin-bottom:10px;">
                </div>
                <h3 style="text-align:center;">{{$data->judul}}</h3>
                <!-- <p>Praja Muda Karana<br>(Golongan Penegak)</p> -->
                <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
        </div><!-- End unit Item -->
        @endforeach
    </div>

    </div>
</section>

@endsection