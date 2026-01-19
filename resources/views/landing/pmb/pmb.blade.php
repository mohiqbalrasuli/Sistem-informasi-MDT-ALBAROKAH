@extends('landing.pmb.layout.templating')
@section('content')
 <!-- Hero Section -->
    <section id="home" class="hero">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="hero-content">
              <div class="pmb-badge pulse">PMB {{ $tahunIni }} {{$status}}!</div>
              <h1>Bergabunglah dengan Keluarga Besar {{ $appprofile->nama_madrasah }}</h1>
              <p class="lead">
                Wujudkan impian menjadi generasi Qurani yang berakhlak mulia dan
                berkarakter islami. Daftar sekarang dan raih kesempatan emas
                ini!
              </p>
              <div class="cta-buttons">
                <a href="/PMB/daftar" class="btn btn-primary-custom btn-lg">
                  <i class="fas fa-edit me-2"></i>
                  Daftar Sekarang
                </a>
                <a href="#info" class="btn btn-outline-custom btn-lg">
                  <i class="fas fa-info-circle me-2"></i>
                  Info Selengkapnya
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
     <!-- Info PMB Section -->
    <section id="info" class="info-section">
      <div class="container">
        <div class="section-title">
          <h2>Informasi Penerimaan Murid Baru</h2>
          <p>
            Ketahui semua yang perlu Anda tahu tentang pendaftaran di {{ $appprofile->nama_madrasah }}
          </p>
        </div>
        <div class="row g-4 d-flex justify-content-around">
          <div class="col-lg-4 col-md-6">
            <div class="info-card">
              <div class="info-icon">
                <i class="fas fa-graduation-cap"></i>
              </div>
              <h4>Syarat Pendaftaran</h4>
              <ul class="list-unstyled">
                <li>
                  <i class="fas fa-check text-success me-2"></i>Fotokopi KTP
                  Orang Tua
                </li>
                <li>
                  <i class="fas fa-check text-success me-2"></i>Fotokopi Kartu
                  Keluarga
                </li>
                <li>
                  <i class="fas fa-check text-success me-2"></i>Pas Foto 3x4 (3
                  lembar)
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="info-card">
              <div class="info-icon">
                <i class="fas fa-money-bill-wave"></i>
              </div>
              <h4>Biaya Pendidikan</h4>
              <ul class="list-unstyled">
                <li>
                  <i class="fas fa-tag text-success me-2"></i>Uang Pendaftaran:
                  <strong>Rp 50.000</strong>
                </li>
                <li>
                  <i class="fas fa-tag text-success me-2"></i>SPP Bulanan:
                  <strong>Rp 20.000</strong>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
