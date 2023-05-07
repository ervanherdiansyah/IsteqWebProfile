@extends('layouts.app')
@section('content')
<section id="services" class="services sections-bg">
    <div class="container" data-aos="fade-up">

    <div class="section-header">
        <h2>Pendaftaran</h2>
        <p>Klik Box di bawah untuk melakukan pendaftaran.</p>
    </div>

    <div class="row gy-4 justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="100">

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="service-item  position-relative">
                <div class="logo text-center">
                    <img src="https://i.ibb.co/Yp4tr14/isteq-logo-remake.png" alt="LOGO-SMA-REMAKE-2-Artboard-1-copy-2" style="height:95px; margin-top:-10px; margin-bottom:10px;">
                </div>
                <h3>Pendaftaran Santri</h3>
                <!-- <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.</p> -->
                <a href="{{url('/pendaftaran/santri')}}" class="readmore stretched-link">Daftar <i class="bi bi-arrow-right"></i></a>
            </div>
        </div><!-- End Service Item -->

        <!-- <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="service-item  position-relative">
                <div class="logo text-center">
                    <img src="https://i.ibb.co/dmNKJmC/LOGO-SMA-REMAKE-2-Artboard-1-copy-2.png" alt="LOGO-SMA-REMAKE-2-Artboard-1-copy-2" style="height:95px; margin-top:-10px; margin-bottom:10px;">
                </div>
                <h3>Pendaftaran RA</h3>
                <a href="{{url('/pendaftaran/ra')}}" class="readmore stretched-link">Daftar <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>End Service Item -->

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="service-item  position-relative">
                <div class="logo text-center">
                    <img src="https://i.ibb.co/LCWw6Wy/MTs-logo.png" alt="MTs-logo" style="height:95px; margin-top:-10px; margin-bottom:10px;">
                </div>
                <h3>Pendaftaran MTs</h3>
                <!-- <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.</p> -->
                <a href="{{url('/pendaftaran/mts')}}" class="readmore stretched-link">Daftar <i class="bi bi-arrow-right"></i></a>
            </div>
        </div><!-- End Service Item -->

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="service-item position-relative">
                <div class="logo text-center">
                    <img src="https://i.ibb.co/dmNKJmC/LOGO-SMA-REMAKE-2-Artboard-1-copy-2.png" alt="LOGO-SMA-REMAKE-2-Artboard-1-copy-2" style="height:95px; margin-top:-10px; margin-bottom:10px;">
                </div>
                <h3>Pendaftaran SMA</h3>
                <!-- <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.</p> -->
                <a href="{{url('/pendaftaran/sma')}}" class="readmore stretched-link">Daftar <i class="bi bi-arrow-right"></i></a>
            </div>
        </div><!-- End Service Item -->

        <!-- <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="service-item  position-relative">
                <div class="logo text-center">
                    <img src="https://i.ibb.co/dmNKJmC/LOGO-SMA-REMAKE-2-Artboard-1-copy-2.png" alt="LOGO-SMA-REMAKE-2-Artboard-1-copy-2" style="height:95px; margin-top:-10px; margin-bottom:10px;">
                </div>
                <h3>Pendaftaran Guru</h3>
                <a href="#" class="readmore stretched-link">Daftar <i class="bi bi-arrow-right"></i></a>
            </div>
        </div> -->

    </div>

    </div>
</section>

@endsection