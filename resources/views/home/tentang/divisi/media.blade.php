@extends('layouts.app')
@section('content')
    <section id="team" class="team">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Our Media Team</h2>
                <p>Al-Istiqomah Cianjur memiliki divisi khusus yang menangani bidang Pers, Komunikasi, dan Sosial Media.</p>
            </div>

            <div class="row gy-4 justify-content-center align-items-center">
                @foreach ($team as $data)
                  @if ($data->status == 'leader')
                      <div class="col-xl-3 col-md-6 col-sm-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="member">
                            <img src="{{ asset('storage/' . $data->gambar) }}" class="img-fluid" alt="">
                            <h4>{{ $data->nama }}</h4>
                            <span>{{ $data->jabatan }}</span>
                        </div>
                    </div><!-- End Team Member -->
                  @endif
                @endforeach
            </div>
        </div>
    </section>

    <section id="team" class="team portfolio sections-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Anggota Divisi Media</h2>
            </div>

            <div class="row gy-4 justify-content-center align-items-center">

                <div class="row gy-4 justify-content-center align-items-center">
              @if ($team)
                  
              @endif
                @foreach ($team as $data)
                  @if ($data->status == 'member')
                      <div class="col-xl-3 col-md-6 col-sm-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="member">
                            <img src="{{ asset('storage/' . $data->gambar) }}" class="img-fluid" alt="">
                            <h4>{{ $data->nama }}</h4>
                            <span>{{ $data->jabatan }}</span>
                        </div>
                    </div><!-- End Team Member -->
                  @endif
                    
                @endforeach
            </div>
            </div>
        </div>
    </section>

    <!-- ======= Portfolio Section ======= -->
    <!-- <section id="portfolio" class="portfolio sections-bg">
              <div class="container justify-content-center align-items-center" data-aos="fade-up">

                <div class="section-header">
                  <h2>Anggota Divisi Media</h2>
                  <p>Di bawah ini adalah anggota dari Divisi Media Al-Istiqomah Cianjur</p>
                </div>

                <div class="portfolio-isotope justify-content-center align-items-center" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

                  <div>
                    <ul class="portfolio-flters justify-content-center align-items-center">
                      <li data-filter="*" class="filter-active">Semua</li>
                      <li data-filter=".filter-app">Fotografi</li>
                      <li data-filter=".filter-product">Videografi</li>
                      <li data-filter=".filter-branding">Design Grafis</li>
                      <li data-filter=".filter-books">Books</li>
                    </ul>
                  </div>

                  <div class="row gy-4 portfolio-container justify-content-center align-items-center text-center">

                    <div class="col-xl-4 col-md-6 portfolio-item filter-app">
                      <div class="portfolio-wrap">
                        <a href="{{ asset('assets') }}/img/portfolio/app-1.jpg" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset('assets') }}/img/portfolio/app-1.jpg" class="img-fluid" alt=""></a>
                        <div class="portfolio-info text-center">
                          <h4><a href="portfolio-details.html" title="More Details">App 1</a></h4>
                          <p>Lorem ipsum, dolor sit amet consectetur</p>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-4 col-md-6 portfolio-item filter-product">
                      <div class="portfolio-wrap">
                        <a href="{{ asset('assets') }}/img/portfolio/product-1.jpg" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset('assets') }}/img/portfolio/product-1.jpg" class="img-fluid" alt=""></a>
                        <div class="portfolio-info">
                          <h4><a href="portfolio-details.html" title="More Details">Product 1</a></h4>
                          <p>Lorem ipsum, dolor sit amet consectetur</p>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-4 col-md-6 portfolio-item filter-branding">
                      <div class="portfolio-wrap">
                        <a href="{{ asset('assets') }}/img/portfolio/branding-1.jpg" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset('assets') }}/img/portfolio/branding-1.jpg" class="img-fluid" alt=""></a>
                        <div class="portfolio-info">
                          <h4><a href="portfolio-details.html" title="More Details">Branding 1</a></h4>
                          <p>Lorem ipsum, dolor sit amet consectetur</p>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-4 col-md-6 portfolio-item filter-books">
                      <div class="portfolio-wrap">
                        <a href="{{ asset('assets') }}/img/portfolio/books-1.jpg" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset('assets') }}/img/portfolio/books-1.jpg" class="img-fluid" alt=""></a>
                        <div class="portfolio-info">
                          <h4><a href="portfolio-details.html" title="More Details">Books 1</a></h4>
                          <p>Lorem ipsum, dolor sit amet consectetur</p>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-4 col-md-6 portfolio-item filter-app">
                      <div class="portfolio-wrap">
                        <a href="{{ asset('assets') }}/img/portfolio/app-2.jpg" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset('assets') }}/img/portfolio/app-2.jpg" class="img-fluid" alt=""></a>
                        <div class="portfolio-info">
                          <h4><a href="portfolio-details.html" title="More Details">App 2</a></h4>
                          <p>Lorem ipsum, dolor sit amet consectetur</p>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-4 col-md-6 portfolio-item filter-product">
                      <div class="portfolio-wrap">
                        <a href="{{ asset('assets') }}/img/portfolio/product-2.jpg" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset('assets') }}/img/portfolio/product-2.jpg" class="img-fluid" alt=""></a>
                        <div class="portfolio-info">
                          <h4><a href="portfolio-details.html" title="More Details">Product 2</a></h4>
                          <p>Lorem ipsum, dolor sit amet consectetur</p>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-4 col-md-6 portfolio-item filter-branding">
                      <div class="portfolio-wrap">
                        <a href="{{ asset('assets') }}/img/portfolio/branding-2.jpg" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset('assets') }}/img/portfolio/branding-2.jpg" class="img-fluid" alt=""></a>
                        <div class="portfolio-info">
                          <h4><a href="portfolio-details.html" title="More Details">Branding 2</a></h4>
                          <p>Lorem ipsum, dolor sit amet consectetur</p>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-4 col-md-6 portfolio-item filter-books">
                      <div class="portfolio-wrap">
                        <a href="{{ asset('assets') }}/img/portfolio/books-2.jpg" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset('assets') }}/img/portfolio/books-2.jpg" class="img-fluid" alt=""></a>
                        <div class="portfolio-info">
                          <h4><a href="portfolio-details.html" title="More Details">Books 2</a></h4>
                          <p>Lorem ipsum, dolor sit amet consectetur</p>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-4 col-md-6 portfolio-item filter-app">
                      <div class="portfolio-wrap">
                        <a href="{{ asset('assets') }}/img/portfolio/app-3.jpg" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset('assets') }}/img/portfolio/app-3.jpg" class="img-fluid" alt=""></a>
                        <div class="portfolio-info">
                          <h4><a href="portfolio-details.html" title="More Details">App 3</a></h4>
                          <p>Lorem ipsum, dolor sit amet consectetur</p>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-4 col-md-6 portfolio-item filter-product">
                      <div class="portfolio-wrap">
                        <a href="{{ asset('assets') }}/img/portfolio/product-3.jpg" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset('assets') }}/img/portfolio/product-3.jpg" class="img-fluid" alt=""></a>
                        <div class="portfolio-info">
                          <h4><a href="portfolio-details.html" title="More Details">Product 3</a></h4>
                          <p>Lorem ipsum, dolor sit amet consectetur</p>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-4 col-md-6 portfolio-item filter-branding">
                      <div class="portfolio-wrap">
                        <a href="{{ asset('assets') }}/img/portfolio/branding-3.jpg" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset('assets') }}/img/portfolio/branding-3.jpg" class="img-fluid" alt=""></a>
                        <div class="portfolio-info">
                          <h4><a href="portfolio-details.html" title="More Details">Branding 3</a></h4>
                          <p>Lorem ipsum, dolor sit amet consectetur</p>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-4 col-md-6 portfolio-item filter-books">
                      <div class="portfolio-wrap">
                        <a href="{{ asset('assets') }}/img/portfolio/books-3.jpg" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ asset('assets') }}/img/portfolio/books-3.jpg" class="img-fluid" alt=""></a>
                        <div class="portfolio-info">
                          <h4><a href="portfolio-details.html" title="More Details">Books 3</a></h4>
                          <p>Lorem ipsum, dolor sit amet consectetur</p>
                        </div>
                      </div>
                    </div>

                  </div>

                </div>

              </div>
            </section> -->
@endsection
