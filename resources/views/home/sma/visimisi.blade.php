@extends('layouts.app')
@section('content')
    <!-- ======= Visi Misi Sekolah Section ======= -->
    <section id="about" class="visimisi-sekolah">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Visi, Misi, dan Tujuan<br>Sekolah Menengah Atas Islam (SMA-I) Al-Istiqomah Cianjur</h2>
                <p class="alamat">Kp. Ciheulang, Desa Langensari, Kec. Karangtengah, Kab. Cianjur, Jawa Barat</p>
            </div>

            <div class="d-flex justify-content-center flex-nowrap">
                <div class="row content col-lg-7 col-sm-12">

                    <div class="col-12 text-center teks-visi">
                        <h3>Visi</h3>
                        {!! $visimisi->visi !!}
                    </div>

                    <div class="col-12 text-center teks-misi">
                        <h3>Misi</h3>
                        {!! $visimisi->misi !!}
                    </div>

                    <div class="col-12 text-center teks-tujuan">
                        <h3>Tujuan</h3>
                        {!! $visimisi->tujuan !!}
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End About Us Section -->
@endsection
