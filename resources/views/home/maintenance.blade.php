@extends('layouts.app')
@section('content')
<section>
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
          <h2>Coming Soon :)</h2>
          <p>Mohon maaf atas ketidaknyamanannya. Anda bisa menjelajahi page website ini dalam waktu secepatnya. Mohon kembali lagi di lain waktu. Atau anda bisa kembali lagi ke menu <a href="{{url('/')}}">Home</a>.</p>
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          <img src="{{asset('assets')}}/img/hero-img.svg" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
        </div>
      </div>
    </div>
</section>

@endsection