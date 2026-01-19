<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="google-site-verification"
      content="kode_verifikasi_dari_google"
    />
    <meta
      name="description"
      content="Membangun generasi Qurani yang berakhlak mulia dan berkarakter
              islami"
    />
    <meta name="keywords" content="PMB MDT Al-Barokah" />
    <title>PMB {{$appprofile->nama_madrasah}}</title>
    <link rel="shortcut icon" href="{{ asset('storage/' . $appprofile->gambar) }}" type="image/x-icon" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('asset/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('asset/css/pmb.css') }}" />
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#home">
          <img
            src="{{ asset('storage/' . $appprofile->gambar) }}"
            alt="Logo MDT Albarokah"
            class="logo"
            width="50px"
            height="50px"
          />
          <div>
            <span class="d-block">{{ $appprofile->nama_madrasah }}</span>
            <span class="d-block yayasan">Yayasan Nurur Roziqi</span>
          </div>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#info">Info PMB</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Kontak</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
   @yield('content')
    <section id="contact" class="section-padding bg-light p-5">
      <div class="container">
        <div class="section-title">
          <h2>Hubungi Kami</h2>
          <p>Silakan hubungi kami untuk informasi lebih lanjut</p>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="card-custom">
              <div class="card-body">
                <h4 class="mb-4">Informasi Kontak</h4>
                <div class="d-flex align-items-center mb-3">
                  <div class="me-3">
                    <i class="fas fa-home text-success fs-4"></i>
                  </div>
                  <div>
                    <h6 class="mb-1">Sekretariat</h6>
                    <p class="mb-0 text-muted">
                      Kantor MDT Al-Barokah Jl. Arya Wiraraja Batuputih Laok
                      Batuputih Sumenep
                    </p>
                  </div>
                </div>
                <div class="d-flex align-items-center mb-3">
                  <div class="me-3">
                    <i class="fas fa-phone text-success fs-4"></i>
                  </div>
                  <div>
                    <h6 class="mb-1">Telepon</h6>
                    <p class="mb-0 text-muted">+62 878 7144 4469</p>
                  </div>
                </div>
                <div class="d-flex align-items-center mb-3">
                  <div class="me-3">
                    <i class="fas fa-envelope text-success fs-4"></i>
                  </div>
                  <div>
                    <h6 class="mb-1">Email</h6>
                    <p class="mb-0 text-muted">mdtalbarokahbalok@gmail.com</p>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <div class="me-3">
                    <i class="fas fa-clock text-success fs-4"></i>
                  </div>
                  <div>
                    <h6 class="mb-1">Jam Operasional</h6>
                    <p class="mb-0 text-muted">
                      Sabtu - Kamis : 14:00 - 16:30 WIB
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card-custom">
              <div class="card-body">
                <h4 class="mb-4">Kirim Pesan</h4>
                <form id="contactForm">
                  <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input
                      type="text"
                      class="form-control"
                      id="name"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                      type="email"
                      class="form-control"
                      id="email"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label for="subject" class="form-label">Subjek</label>
                    <input type="text" class="form-control" id="subject" />
                  </div>
                  <div class="mb-3">
                    <label for="message" class="form-label">Pesan</label>
                    <textarea
                      class="form-control"
                      id="message"
                      rows="5"
                      required
                    ></textarea>
                  </div>
                  <button type="submit" class="btn btn-custom w-100" id="sendMessageBtn">
                    <i class="fas fa-paper-plane me-2"></i>
                    Kirim Pesan
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 mb-4">
            <h5>Madrasah Diniyah Ula Al-Barokah</h5>
            <p>
              Lembaga pendidikan Islam yang berkomitmen mencetak generasi Qurani
              berakhlak mulia dan berkarakter islami.
            </p>
            <div class="social-icons">
              <a
                href="https://www.facebook.com/share/1BXrPEgjAE/"
                class="social-icon"
              >
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="https://wa.me/6287871444469" class="social-icon">
                <i class="fab fa-whatsapp"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <h5>Menu</h5>
            <ul class="footer-links">
              <li><a href="#home">Beranda</a></li>
              <li><a href="#info">Info PMB</a></li>
              <li><a href="#contact">Kontak</a></li>
            </ul>
          </div>
          <div class="col-lg-4 mb-4">
            <h5>Kontak Info</h5>
            <ul class="footer-links">
              <li>
                <i class="fas fa-map-marker-alt me-2"></i>
                Jl. Arya Wiraraja Batuputih Laok Batuputih Sumenep
              </li>
              <li>
                <i class="fas fa-phone me-2"></i>
                +62 878 7144 4469
              </li>
              <li>
                <i class="fas fa-envelope me-2"></i>
                mdtalbarokahbalok@gmail.com
              </li>
              <li>
                <i class="fas fa-globe me-2"></i>
                www.mdtalbarokah.sch.id
              </li>
            </ul>
          </div>
        </div>
        <hr class="my-4" style="border-color: #34495e" />
        <div class="row">
          <div class="col-md-6">
            <p class="mb-0">
              &copy; 2024 Madrasah Diniyah Ula Albarokah. All rights
              reserved.
            </p>
          </div>
          <div class="col-md-6 text-md-end">
            <p class="mb-0">
              Designed by
              <a
                href="https://moh-iqbal-rasuli.netlify.app/"
                target="_blank"
                class="text-decoration-none text-light"
                >Moh. Iqbal rasuli</a
              >
            </p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="{{ asset('asset/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('asset/js/script.js') }}"></script>
    <script src="{{ asset('asset/js/pesan.js') }}"></script>
  </body>
</html>
