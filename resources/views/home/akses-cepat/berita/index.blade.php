@extends('layouts.app')
@section('content')
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Berita</h2>
                <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id
                    nobis omnis tiledo stran delop</p>
            </div>

            <div class="row gy-4 posts-list justify-content-center">

              @foreach ($berita as $data)
                <div class="col-xl-4 col-md-6">

                  <article>

                            <div class="post-img">
                                <img src="{{ asset('storage/' . $data->gambar) }}" alt="" class="img-fluid">
                            </div>

                            <p class="post-category">{{ $data->kategori->nama_kategori }}</p>

                            <h2 class="title">
                                <a href="{{ url('/berita/detail/'.$data->id) }}">{{ $data->judul }}</a>
                            </h2>

                            {{-- <div class="d-flex align-items-center">
                                <img src="{{ asset('storage/' . $data->gambar) }}" alt=""
                                    class="img-fluid post-author-img flex-shrink-0">
                                <div class="post-meta">
                                    <p class="post-author-list">{{ $data->judul }}</p>
                                    <p class="post-date">
                                        <time datetime="2022-01-01">{{ $data->updated_at->isoFormat('D MMMM Y') }}</time>
                                    </p>
                                </div>
                            </div> --}}

                          </article>
                        </div><!-- End post list item -->
                        @endforeach

                

            </div><!-- End blog posts list -->

            {{-- <div class="blog-pagination">
                <ul class="justify-content-center">
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                </ul>
            </div> <!-- End blog pagination --> --}}

        </div>
    </section><!-- End Blog Section -->

    <!-- ======= About Us Section ======= -->
    <!-- <section id="about" class="about">
              <div class="container" data-aos="fade-up">

                <div class="row gy-4">
                  <div class="col-lg-6">
                    <h3>Voluptatem dignissimos provident quasi corporis</h3>
                    <img src="{{ asset('assets') }}/img/about.jpg" class="img-fluid rounded-4 mb-4" alt="">
                    <p>Ut fugiat ut sunt quia veniam. Voluptate perferendis perspiciatis quod nisi et. Placeat debitis quia recusandae odit et consequatur voluptatem. Dignissimos pariatur consectetur fugiat voluptas ea.</p>
                    <p>Temporibus nihil enim deserunt sed ea. Provident sit expedita aut cupiditate nihil vitae quo officia vel. Blanditiis eligendi possimus et in cum. Quidem eos ut sint rem veniam qui. Ut ut repellendus nobis tempore doloribus debitis explicabo similique sit. Accusantium sed ut omnis beatae neque deleniti repellendus.</p>
                  </div>
                  <div class="col-lg-6">
                    <div class="content ps-0 ps-lg-5">
                      <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua.
                      </p>
                      <ul>
                        <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                      </ul>
                      <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident
                      </p>

                      <div class="position-relative mt-4">
                        <img src="{{ asset('assets') }}/img/about-2.jpg" class="img-fluid rounded-4" alt="">
                        <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </section> -->
    <!-- End About Us Section -->

    <!-- ======= Recent Blog Posts Section ======= -->
@endsection
