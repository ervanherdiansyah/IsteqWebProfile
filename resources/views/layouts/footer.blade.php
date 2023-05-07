<footer id="footer" class="footer">

    <div class="container">
      @php
        $data = App\ModelHeader::first();
      @endphp
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 col-sm-12 footer-info">
          <a href="index.html" class="logo d-flex align-items-center">
            <span>Al-Istiqomah</span>
          </a>
          <p class="desc">Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
          <p class="text-center">Terhubung Bersama Kami</p>
          <div class="social-links d-flex mt-4 justify-content-center">
            <a href="{{$data->twiter}}" class="twitter" target="_blank"><i class="bi bi-twitter"></i></a>
            <a href="{{$data->facebook}}" class="facebook" target="_blank"><i class="bi bi-facebook"></i></a>
            <a href="{{$data->instagram}}" class="instagram" target="_blank"><i class="bi bi-instagram"></i></a>
            <a href="{{$data->youtube}}" class="youtube" target="_blank"><i class="bi bi-youtube"></i></a>
            <a href="{{$data->tiktok}}" class="tiktok" target="_blank"><i class="bi bi-tiktok"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-4 col-sm-6 footer-links d-sm-none d-md-block d-lg-block">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('/maintenance')}}">Murid</a></li>
            <li><a href="{{url('/maintenance')}}">Guru</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-4 col-sm-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="{{url('/pendaftaran/santri')}}">Pendaftaran Santri</a></li>
            <li><a href="{{url('/pendaftaran/ra')}}">Pendaftaran RA</a></li>
            <li><a href="{{url('/pendaftaran/mts')}}">Pendaftaran MTs</a></li>
            <li><a href="{{url('/pendaftaran/sma')}}">Pendaftaran SMA</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>
            Kp. Ciheulang, Desa Langensari, <br>
            Kec. Karangtengah, Kab. Cianjur<br>
            Jawa Barat, Indonesia <br><br>
            <strong>Phone :</strong> +62 815-2194-1914<br>
            <strong>Email :</strong> hendrayna55@gmail.com<br>
          </p>

        </div>

      </div>
    </div>

    <div style="background-color:#212529;">
      <div class="copyright">
        2023 &copy; Copyright <strong><span>Isteq</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/impact-bootstrap-business-website-template/ -->
        Designed by <a href="https://www.instagram.com/kenjistore.moba/" target="_blank">Kenjipedia</a>
      </div>
    </div>

</footer><!-- End Footer -->
  <!-- End Footer -->