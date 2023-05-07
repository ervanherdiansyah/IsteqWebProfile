@extends('layouts.app')
@section('content')
    <!-- ======= Sambutan Section ======= -->
    <section id="about" class="sambutan">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Sambutan Kepala<br>Sekolah Menengah Atas Islam Al-Istiqomah Cianjur</h2>
          <!-- <p class="nama-tokoh">K. H. Aden Ali Abduloh, M.Pd.I.</p> -->
        </div>

        <div class="row gy-3">
                <div class="col-lg-3 text-center">
                    <img src="{{ asset('storage/' . $sambutan->gambar) }}" class="img-fluid rounded-4 mb-4 foto-tokoh"
                        alt="">
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

@endsection