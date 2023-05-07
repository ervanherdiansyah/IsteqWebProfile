@extends('layouts.app')
@section('content')
    <!-- ======= Visi Misi Section ======= -->
    <section id="about" class="visimisi">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Visi dan Misi<br>Yayasan Pendidikan Islam Al-Istiqomah Cianjur</h2>
                <p class="alamat">Kp. Ciheulang, Desa Langensari, Kec. Karangtengah, Kab. Cianjur, Jawa Barat</p>
            </div>

            <div class="row">
                <div class="text-center">
                    <div class="content visimisi-content">
                        <h3>Visi</h3>
                        <p class="fst-italic text-visimisi text-center">
                            {!! $visimisi->visi !!}
                        </p>

                        <h3>Misi</h3>
                        <p class="fst-italic text-visimisi text-center">
                            {!! $visimisi->misi !!}
                        </p>

                        <!-- <h3>Tujuan</h3>
                        <ol class="text-visimisi">
                          <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Commodi eum ratione harum dolores delectus inventore deleniti quae porro cum. Hic.</li>
                          <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Commodi eum ratione harum dolores delectus inventore deleniti quae porro cum. Hic.</li>
                          <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Commodi eum ratione harum dolores delectus inventore deleniti quae porro cum. Hic.</li>
                        </ol> -->
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->
@endsection
