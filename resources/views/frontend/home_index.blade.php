@extends('frontend.home_master')
@section('main')

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About</h2>
          <h3>Cari Tau Lagi <span>Tentang Kami</span></h3>
          <p>Siapkan kuas cat! Tembok, pagar, dan barang yang lainnya akan menjadi lebih berwarna seperti kehidupan kamu.</p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <img src="{{ asset('frontend/assets/img/about-2.jpg') }}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <h3>Dunclop cat yang akan membuat rumahmu menjadi lebih indah, dan nyaman.</h3>
            <p class="fst-italic">
              Merk cat yang telah dipercayai lebih dari 10 miliar penududuk bumi bahkan peududuk galaksi.
            </p>
            <ul>
              <li>
                <i class="bx bx-store-alt"></i>
                <div>
                    <h5>Jenis Bahan yang Sangat Kuat</h5>
                    <p>Mengandung 80% zat kalsium yang membuat tembok tidak gampang roboh</p>
                </div>
              </li>
              <li>
                <i class="bx bx-images"></i>
                <div>
                    <h5>Tampilan yang Lebih Indah Tanpa Luntur</h5>
                    <p>Tembok yang gelap akan menjadi lebih berwarna tanpa ragu dengan kelunturan cat</p>
                </div>
              </li>
            </ul>
            <p>
              Memiliki variasi warna yang sangat banyak dengan kemudahan tukang yang akan siap membantu mengecat ruang anda.
              Memiliki pelayanan, "Anda membeli, kami siap melayani + mengecat". Setiap anggota memiliki tingkat mengecat yang
              sangat tinggi, request apapun dari konsumen tukang siap melakukan.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

@endsection
