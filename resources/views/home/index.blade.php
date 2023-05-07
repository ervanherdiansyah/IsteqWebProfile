<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
    <style>
        .hero {
            width: 100%;
            position: relative;
            background-image: linear-gradient(rgba(50, 168, 37, 0.5), rgba(16, 134, 51, 0.5)), url("{{ asset('storage/' . $background->gambar) }}");
            /* background: var(--color-primary); */
            padding: 60px 0 0 0;
        }
    </style>
</head>

<body>

    <!-- ======= Navbar ======= -->
    @include('layouts.header')

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">
        <div class="container position-relative">
            <div class="row gy-5" data-aos="fade-in">
                <div
                    class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                    <h2>Selamat Datang di<br>{{ $home->judul }}</h2>
                    <p>{!! $home->deskripsi !!}</p>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <!-- <a href="#about" class="btn-get-started">Get Started</a> -->
                        <a href="{{ url('/videoprofil') }}" class="btn-watch-video d-flex align-items-center"><i
                                class="bi bi-play-circle"></i><span>Video Profil</span></a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 justify-content-center align-items-center text-center">
                    <img src="{{ asset('storage/' . $home->gambar) }}" class="img-fluid gambar-depan" alt=""
                        data-aos="zoom-out" data-aos-delay="100">
                </div>
            </div>
        </div>

        <div class="icon-boxes position-relative">
            <div class="container position-relative">
                <div class="row gy-4 mt-5">
                    @foreach ($kotak as $data)
                        <div class="col-xl-3 col-md-6 col-sm-6 d-sm-none d-md-block" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon-box">
                                <div class="icon"><i class="{{ $data->judul1 }}"></i></div>
                                <h4 class="title"><a  class="stretched-link">{{ $data->judul2 }}</a></h4>
                                <p>{{ $data->judul3 }}</p>
                            </div>
                        </div>
                        <!--End Icon Box -->
                    @endforeach
                </div>
            </div>
        </div>

        </div>
    </section>
    <!-- End Hero Section -->

    <main id="main">

        <!-- ======= Sambutan Section ======= -->
        <section id="about" class="sambutan">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Sambutan Kepala<br>Yayasan Pendidikan Islam Al-Istiqomah Cianjur</h2>
                    <!-- <p class="nama-tokoh">K. H. Aden Ali Abduloh, M.Pd.I.</p> -->
                </div>

                <div class="row gy-3">
                    <div class="col-lg-3 text-center">
                        <img src="{{ asset('storage/' . $sambutan->gambar) }}"
                            class="img-fluid rounded-4 mb-4 foto-tokoh" alt="">
                        <h3 class="nama-tokoh">{{ $sambutan->nama }}</h3>
                    </div>
                    <div class="col-lg-9">
                        <div class="content ps-0 ps-lg-5 sambutan-content">
                            <p class="fst-italic">
                                Assalamu'alaikum Wr. Wb.
                            </p>
                            <div style="text-align: justify; margin-bottom: 20px">
                                {!! $sambutan->sambutan !!}
                            </div>
                            <p class="fst-italic">
                                Wassalamu'alaikum Wr. Wb.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- Program Unggulan Section -->
        <section id="faq" class="faq sections-bg">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4">

                    <div class="col-lg-4">
                        <div class="content px-xl-5">
                            <h3><strong style="font-size:30px;">Program Unggulan</strong><br>Al-Istiqomah</h3>
                            <p>
                                Berikut adalah program unggulan yang dimiliki oleh Al-Istiqomah Cianjur
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-8 text-sm">

                        <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($program as $data)
                                <div class="accordion-item">
                                    <h3 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq-content-{{$data->id}}">
                                            <span class="num">{{$no++}}</span>
                                            {{ $data->judul }}
                                        </button>
                                    </h3>
                                    <div id="faq-content-{{$data->id}}" class="accordion-collapse collapse"
                                        data-bs-parent="#faqlist">
                                        <div class="accordion-body">
                                            {!! $data->deskripsi !!}
                                        </div>
                                    </div>
                                </div><!-- # Faq item-->
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Frequently Asked Questions Section -->

        <!-- ======= Stats Counter Section ======= -->
        <section id="stats-counter" class="stats-counter">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Data Peserta Didik<br>Yayasan Pendidikan Islam Al-Istiqomah Cianjur</h2>
                    <!-- <p class="nama-tokoh">K. H. Aden Ali Abduloh, M.Pd.I.</p> -->
                </div>

                <div class="row gy-4 align-items-center">

                    <div class="col-lg-6">
                        <img src="{{ asset('assets') }}/img/stats-img.svg" alt="" class="img-fluid">
                    </div>

                    <div class="col-lg-6">

                        <div class="stats-item d-flex align-items-center">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $pdmts->total }}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Siswa</strong> peserta didik MTs SA Al-Istiqomah</p>
                        </div><!-- End Stats Item -->

                        <div class="stats-item d-flex align-items-center">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $pdsma->total }}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Siswa</strong> peserta didik SMA Islam Al-Istiqomah</p>
                        </div><!-- End Stats Item -->

                        <div class="stats-item d-flex align-items-center">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $pdpesantren->total }}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p><strong>Santri</strong> pondok pesantren salafiyah Al-Istiqomah</p>
                        </div><!-- End Stats Item -->

                    </div>

                </div>

            </div>
        </section><!-- End Stats Counter Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials sections-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Para Alumni</h2>
                    <!-- <p>Voluptatem quibusdam ut ullam perferendis repellat non ut consequuntur est eveniet deleniti fignissimos eos quam</p> -->
                </div>

                <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        @foreach ($alumi as $data)
                            <div class="swiper-slide">
                                <div class="testimonial-wrap">
                                    <div class="testimonial-item">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('storage/' . $data->gambar) }}"
                                                class="testimonial-img flex-shrink-0" alt="">
                                            <div>
                                                <h3>{{ $data->nama }}</h3>
                                                <h4>{{ $data->angkatan }}</h4>
                                                <h4>{{ $data->title }}</h4>
                                            </div>
                                        </div>
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            {!! $data->quotes !!}
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                    </div>
                                </div>
                            </div><!-- End testimonial item -->
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients sections-bg">
            <div class="container" data-aos="zoom-out">

                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        @foreach ($logo as $data)
                            <div class="swiper-slide"><img src="{{ asset('storage/' . $data->gambar) }}"
                                    class="img-fluid" alt=""></div>
                        @endforeach
                    </div>
                </div>

            </div>
        </section><!-- End Clients Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('layouts.footer')

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/aos/aos.js"></script>
    <script src="{{ asset('assets') }}/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{ asset('assets') }}/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets') }}/js/main.js"></script>

</body>

</html>
