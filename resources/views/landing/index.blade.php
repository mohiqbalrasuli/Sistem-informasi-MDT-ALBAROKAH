<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="google-site-verification" content="kode_verifikasi_dari_google" />
    <meta name="description"
        content="Membangun generasi Qurani yang berakhlak mulia dan berkarakter
              islami" />
    <meta name="keywords" content="md  ula al-barokah, al-barokah, Batuputih Laok, Batuputih" />
    <meta name="robots" content="index, follow" />
    <title>{{ $profile->nama_madrasah }}</title>
    <link rel="shortcut icon" href="{{ asset('storage/' . $profile->gambar) }}" type="image/x-icon" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('asset/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#home">
                <img src="{{ asset('storage/' . $profile->gambar) }}" alt="Logo MDT Albarokah" class="logo"
                    width="50px" height="50px" />
                <div>
                    <span class="d-block">{{ $profile->nama_madrasah }}</span>
                    <span class="d-block yayasan">Yayasan Nurur Roziqi</span>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#programs">Program</a>
                    </li>
                    <li class="nav-item">
                        <a href="/PMB" class="nav-link">PMB</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ml-0 text-left hero-content">
                    <h1>{{ $profile->nama_madrasah }}</h1>
                    <p class="lead">
                        Membangun generasi Qurani yang berakhlak mulia dan berkarakter
                        islami
                    </p>
                    <a href="#about" class="btn btn-circle">
                        <i class="fa fa-angle-double-down animated"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="section-padding">
        <div class="container">

            <!-- Visi Full Width -->
            <div class="section-title">
                <h2>Tentang Madrasah</h2>
                <p>Mengenal lebih dekat visi, misi, dan nilai-nilai yang kami junjung</p>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <div class="card-custom">
                        <div class="card-body">
                            <div class="card-icon text-center">
                                <i class="fas fa-book-open"></i>
                            </div>
                            <h4 class="text-center mb-3">Visi Kami</h4>
                            <p class="text-center">
                                {{ $visi->visi }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Misi & Tujuan -->
            <div class="row align-items-start">
                <!-- Misi -->
                <div class="col-lg-6">
                    <div class="card-custom">
                        <div class="card-body">
                            <div class="card-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <h4 class="text-center mb-3">Misi Kami</h4>
                            <ul class="list-unstyled">
                                @foreach ($misi as $item)
                                    <li class="mb-2"><i class="fas fa-check text-success me-2"></i>{{ $item->misi }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Tujuan -->
                <div class="col-lg-6">
                    <div class="card-custom">
                        <div class="card-body">
                            <div class="card-icon">
                                <i class="fas fa-bullseye"></i>
                            </div>
                            <h4 class="text-center mb-3">Tujuan</h4>
                            <ul class="list-unstyled">
                                @foreach ($tujuan as $item)
                                    <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>{{ $item->tujuan }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Stats Section -->
    <section class="stats-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-number">{{ $jumlah_murid }}</div>
                        <div class="stat-label">Santri Aktif</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-number">{{ $jumlah_pengajar }}</div>
                        <div class="stat-label">Ustadz/Ustadzah</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-number">{{ $umurBerdiri }}</div>
                        <div class="stat-label">Tahun Berdiri</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-number">{{ $jumlahprogram }}</div>
                        <div class="stat-label">Program Unggulan</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section id="programs" class="section-padding bg-light">
        <div class="container">
            <div class="section-title">
                <h2>Program Unggulan</h2>
                <p>
                    Berbagai program pembelajaran yang dirancang untuk mengembangkan
                    potensi santri
                </p>
            </div>
            <div class="row">
                @foreach ($program as $item)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="program-card">
                            <div class="program-icon">
                                <i class="fas fa-{{ $item->icon }}"></i>
                            </div>
                            <h4>{{ $item->program_unggulan }}</h4>
                            <p>
                                {{ $item->keterangan }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="section-padding">
        <div class="container">
            <div class="section-title">
                <h2>Galeri Kegiatan</h2>
                <p>Dokumentasi berbagai kegiatan dan momen berharga di madrasah</p>
            </div>
            <div class="row">
                @foreach ($galeri as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item">
                            <img src="{{ asset('storage/' . $item->foto) }}" />
                            <div class="gallery-overlay">
                                <span>{{ $item->keterangan }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section-padding bg-light">
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
                            <form>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" required />
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" required />
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subjek</label>
                                    <input type="text" class="form-control" id="subject" />
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Pesan</label>
                                    <textarea class="form-control" id="message" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-custom w-100">
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
                        <a href="https://www.facebook.com/share/1BXrPEgjAE/" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/mdt.al.barokah" class="social-icon">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://wa.me/6287871444469" class="social-icon">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="https://www.tiktok.com/@mdt.albarokah7?_t=ZS-8xfPLBOKVkr&_r=1" class="social-icon">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Menu</h5>
                    <ul class="footer-links">
                        <li><a href="#home">Beranda</a></li>
                        <li><a href="#about">Tentang</a></li>
                        <li><a href="#programs">Program</a></li>
                        <li>
                            <a href="belumdibuka.html">PMB</a>
                        </li>
                        <li><a href="#gallery">Galeri</a></li>
                        <li><a href="#contact">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Program</h5>
                    <ul class="footer-links">
                        <li><a href="#">Baca Kitab Kuning</a></li>
                        <li><a href="#">Fiqih & Akhlak</a></li>
                        <li><a href="#">Metode Qur'ani Sidogiri</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
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
                            mdt-al-barokah.netlify.app
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
                        <a href="https://moh-iqbal-rasuli.netlify.app/" target="_blank"
                            class="text-decoration-none text-light">Moh. Iqbal rasuli</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src={{ asset('js/boostrap/bootstrap.bundle.min.js') }}></script>
    <!-- Custom JS -->
    <script src={{ asset('js/script.js') }}></script>
    <script src={{ asset('js/pesan.js') }}></script>
</body>

</html>
