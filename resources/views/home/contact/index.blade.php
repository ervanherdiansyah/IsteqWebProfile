@extends('layouts.app')
@section('content')

    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Hubungi Kami</h2>
          <p>Jika ada pertanyaan mengenai Yayasan Pendidikan Islam Al-Istiqomah Cianjur dan lembaga yang dinaungi oleh kami, hubungi kontak di bawah ini</p>
        </div>

        <div class="row justify-content-center">
          <div class="card col-lg-5">
            <h5 class="card-header text-center">Call Center / Narahubung</h5>
            <div class="card-body">
              <table class="table">
                <tbody>
                  @foreach($contacts as $data)
                  <tr>
                    <th class="text-sm">{{$data->nama}}</th>
                    <td class="text-sm">:</td>
                    <td class="text-sm"><a href="https://wa.me/{{$data->nomor}}" target="_blank">+{{$data->nomor}}</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Contact Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-4">
            <div class="content px-xl-5">
              <h3>Frequently Asked <strong>Questions</strong></h3>
              <p>
                Berikut adalah pertanyaan yang sering ditanyakan mengenai Pondok Pesantren Al-Istiqomah Cianjur
              </p>
            </div>
          </div>

          <div class="col-lg-8">

            <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">
              @php
              $nomor = 1;
              @endphp
              @foreach($faqs as $faq)
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-{{$faq->id}}">
                    <span class="num">{{$nomor++}}</span>
                    {{$faq->judul}}
                  </button>
                </h3>
                <div id="faq-content-{{$faq->id}}" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    {!!$faq->deskripsi!!}
                  </div>
                </div>
              </div><!-- # Faq item-->
              @endforeach

            </div>

          </div>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

@endsection