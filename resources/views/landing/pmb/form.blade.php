@extends('landing.pmb.layout.templating')
@section('content')
    @if (session('swal_success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: "{{ session('swal_success') }}",
                timer: 2500,
                showConfirmButton: false
            });
        </script>
    @endif
    @if ($errors->any())
        <script>
            let errorMessage = "";
            @foreach ($errors->all() as $error)
                errorMessage += "• {{ $error }}\n";
            @endforeach

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: errorMessage,
            });
        </script>
    @endif
    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="hero-content">
                        <h1>Penerimaan Murid Baru</h1>
                        <h3>{{ $appprofile->nama_madrasah }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Info PMB Section -->
    <section id="info" class="info-section">
        <div class="container">
            <div class="section-title">
                <h2>Formulir Pendaftaran Murid Baru</h2>
                <p>Lengkapi Data Di bawah ini</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="info-card">
                        <div class="mb-3">
                            <h4>Data Murid</h4>
                        </div>
                        <form method="POST", action="/PMB/daftar/store" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                        required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat Lengkap</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="foto_murid" class="form-label">Upload Foto Murid</label>
                                <input class="form-control" type="file" id="foto_murid" name="foto"
                                    accept="image/*" required>
                                <div class="form-text">Format Nama File: foto_Nama Murid (maksimal 2MB)</div>
                            </div>

                            <div class="mb-4">
                                <label for="foto_akta" class="form-label">Upload Akta Kelahiran</label>
                                <input class="form-control" type="file" id="foto_akta" name="akta" required>
                                <div class="form-text">Format Nama File: Akta_Nama Murid (maksimal 2MB)</div>
                            </div>

                            <div class="mb-4">
                                <label for="foto_kk" class="form-label">Upload Kartu Keluarga</label>
                                <input class="form-control" type="file" id="foto_kk" name="kk" required>
                                <div class="form-text">Format Nama File: KK_Nama Murid (maksimal 2MB)</div>
                            </div>

                            <!-- Data Orang Tua -->
                            <div class="mb-3 pt-5">
                                <h4>Data Orang Tua</h4>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nama_ayah" class="form-label">Nama Ayah</label>
                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                                    <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah"
                                        required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nama_ibu" class="form-label">Nama Ibu</label>
                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                                    <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu"
                                        required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="no_hp_ortu" class="form-label">Nomor HP Orang Tua</label>
                                <input type="tel" class="form-control" id="no_hp_ortu" name="no_telp" required
                                    pattern="[0-9]{10,13}" placeholder="08xxxxxxxxxx">
                                <div class="form-text">Masukkan nomor HP yang valid (10-13 digit)</div>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">
                                    Kirim Pendaftaran
                                </button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
