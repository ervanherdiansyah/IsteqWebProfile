@extends('layouts.app')
@section('content')
    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row g-5">

                <div class="col-lg-8">

                    <article class="blog-details">

                        <div class="post-img">
                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="" class="img-fluid">
                        </div>

                        <h2 class="title">{{ $berita->judul }}</h2>

                        <div class="meta-top">
                            <ul>
                                {{-- <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html">John Doe</a></li> --}}
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <time
                                        datetime="2020-01-01">{{ $berita->updated_at->isoFormat('D MMMM Y') }}</time></li>
                                {{-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">12 Comments</a></li> --}}
                            </ul>
                        </div><!-- End meta top -->

                        <div class="content">
                            {!! $berita->body !!}

                        </div><!-- End post content -->

                        <div class="meta-bottom">
                            {{-- <i class="bi bi-folder"></i> --}}
                            <ul class="cats">
                                <li>Kategori : {{ $berita->kategori->nama_kategori }}</li>
                            </ul>

                            {{-- <i class="bi bi-tags"></i>
                <ul class="tags">
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul> --}}
                        </div><!-- End meta bottom -->

                    </article><!-- End blog post -->


                </div>

                <div class="col-lg-4">

                    <div class="sidebar">

                        <!-- <div class="sidebar-item search-form">
                    <h3 class="sidebar-title">Search</h3>
                    <form action="" class="mt-3">
                      <input type="text">
                      <button type="submit"><i class="bi bi-search"></i></button>
                    </form>
                  </div>End sidebar search formn -->

                        <!-- <div class="sidebar-item categories">
                    <h3 class="sidebar-title">Categories</h3>
                    <ul class="mt-3">
                      <li><a href="#">General <span>(25)</span></a></li>
                      <li><a href="#">Lifestyle <span>(12)</span></a></li>
                      <li><a href="#">Travel <span>(5)</span></a></li>
                      <li><a href="#">Design <span>(22)</span></a></li>
                      <li><a href="#">Creative <span>(8)</span></a></li>
                      <li><a href="#">Educaion <span>(14)</span></a></li>
                    </ul>
                  </div>End sidebar categories -->

                        <div class="sidebar-item recent-posts">
                            <h3 class="sidebar-title">Recent Posts</h3>

                            <div class="mt-3">

                                @foreach ($recent as $data)
                                    <div class="post-item mt-3">
                                        <img src="{{ asset('storage/' . $data->gambar) }}" alt="">
                                        <div>
                                            <h4><a href="">{{ $data->judul }}</a>
                                            </h4>
                                            <time
                                                datetime="2020-01-01">{{ $data->updated_at->isoFormat('D MMMM Y') }}</time>
                                        </div>
                                    </div><!-- End recent post item-->
                                @endforeach

                            </div>

                        </div><!-- End sidebar recent posts-->

                        <!-- <div class="sidebar-item tags">
                    <h3 class="sidebar-title">Tags</h3>
                    <ul class="mt-3">
                      <li><a href="#">App</a></li>
                      <li><a href="#">IT</a></li>
                      <li><a href="#">Business</a></li>
                      <li><a href="#">Mac</a></li>
                      <li><a href="#">Design</a></li>
                      <li><a href="#">Office</a></li>
                      <li><a href="#">Creative</a></li>
                      <li><a href="#">Studio</a></li>
                      <li><a href="#">Smart</a></li>
                      <li><a href="#">Tips</a></li>
                      <li><a href="#">Marketing</a></li>
                    </ul>
                  </div>End sidebar tags -->

                    </div><!-- End Blog Sidebar -->

                </div>
            </div>

        </div>
    </section><!-- End Blog Details Section -->
@endsection
