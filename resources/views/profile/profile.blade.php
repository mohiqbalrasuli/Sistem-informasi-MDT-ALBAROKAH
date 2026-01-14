@extends('layout.template_admin')
@section('title', 'Profile Madrasah')
@section('header', 'Profile Madrasah')
@section('content')
    <style>
        .profile-container {
            display: flex;
            justify-content: center;
            /* tengah horizontal */
            align-items: center;
            /* tengah vertikal */
        }

        .profile-wrapper {
            position: relative;
            width: 140px;
            height: 140px;
        }

        .profile-img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #eaeaea;
        }

        /* icon pena */
        .edit-btn {
            position: absolute;
            bottom: 8px;
            right: 8px;
            width: 36px;
            height: 36px;
            background: #198754;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border: 2px solid #fff;
            transition: 0.3s;
        }

        .edit-btn:hover {
            background: #157347;
        }

        .underline-only {
            border: none;
            border-bottom: 1px solid #ccc;
            border-radius: 0;
            box-shadow: none;
        }

        .underline-only:focus {
            border-bottom: 2px solid #198754;
            box-shadow: none;
        }

        .nav-pills .nav-link:hover {
            color: #157347
        }

        .nav-pills .nav-link.active {
            color: #fff;
            background-color: #22ca80;
        }
    </style>
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

    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-7 align-self-center">
                    <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Assalamu'Alaikum {{Auth::user()->name}}
                    </h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item text-muted active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- start Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="/profile/update/{{ $profile->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="3">
                                                <div class="profile-container">
                                                    <div class="profile-wrapper">
                                                        <img src="{{ asset('storage/profile/' . $profile->gambar) }}"
                                                            id="fotoPreview" class="profile-img">

                                                        <label for="fotoInput" class="edit-btn">
                                                            <i class="fas fa-pen"></i>
                                                        </label>

                                                        <input type="file" id="fotoInput" name="gambar" accept="image/*"
                                                            hidden>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Nama Madrasah</td>
                                            <td>:</td>
                                            <td><input type="text" class="form-control underline-only"
                                                    placeholder="Nama Madrasah" name="nama_madrasah"
                                                    value="{{ $profile->nama_madrasah }}"></td>
                                        </tr>
                                        <tr>
                                            <td>jenjang Pendidikan</td>
                                            <td>:</td>
                                            <td><input type="text" class="form-control underline-only"
                                                    placeholder="Jenjang Pendidikan" name="tingkat"
                                                    value="{{ $profile->tingkat }}"></td>
                                        </tr>
                                        <tr>
                                            <td>Tahun Berdiri</td>
                                            <td>:</td>
                                            <td><input type="text" class="form-control underline-only"
                                                    placeholder="Tahun Berdiri" name="tahun_berdiri"
                                                    value="{{ $profile->tahun_berdiri }}"></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat Lengkao</td>
                                            <td>:</td>
                                            <td><input type="text" class="form-control underline-only"
                                                    placeholder="Alamat Lengkap" name="alamat"
                                                    value="{{ $profile->alamat }}"></td>
                                        </tr>
                                        <tr>
                                            <td>Desa/kelurahan</td>
                                            <td>:</td>
                                            <td><input type="text" class="form-control underline-only"
                                                    placeholder="Desa/Kelurahan" name="desa"
                                                    value="{{ $profile->desa }}"></td>
                                        </tr>
                                        <tr>
                                            <td>Kecamatan</td>
                                            <td>:</td>
                                            <td><input type="text" class="form-control underline-only"
                                                    placeholder="Kecamatan" name="kecamatan"
                                                    value="{{ $profile->kecamatan }}"></td>
                                        </tr>
                                        <tr>
                                            <td>Kabupaten/Kota</td>
                                            <td>:</td>
                                            <td><input type="text" class="form-control underline-only"
                                                    placeholder="Kabupaten/Kota" name="kabupaten"
                                                    value="{{ $profile->kabupaten }}"></td>
                                        </tr>
                                        <tr>
                                            <td>Provinsi</td>
                                            <td>:</td>
                                            <td><input type="text" class="form-control underline-only"
                                                    placeholder="Provinsi" name="provinsi"
                                                    value="{{ $profile->provinsi }}"></td>
                                        </tr>
                                        <tr>
                                            <td>Kode POS</td>
                                            <td>:</td>
                                            <td><input type="text" class="form-control underline-only"
                                                    placeholder="Kode POS" name="kode_pos"
                                                    value="{{ $profile->kode_pos }}"></td>
                                        </tr>
                                        <tr>
                                            <td>No. Telepon</td>
                                            <td>:</td>
                                            <td><input type="text" class="form-control underline-only"
                                                    placeholder="No. Telepon" name="no_telp"
                                                    value="{{ $profile->no_telp }}"></td>
                                        </tr>
                                        <tr>
                                            <td>Email Madrasah</td>
                                            <td>:</td>
                                            <td><input type="email" class="form-control underline-only"
                                                    placeholder="Email Madrasah" name="email"
                                                    value="{{ $profile->email }}"></td>
                                        </tr>
                                        <tr>
                                            <td>Website Kami</td>
                                            <td>:</td>
                                            <td><input type="text" class="form-control underline-only"
                                                    placeholder="Website Kami" name="web" value="{{ $profile->web }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div class="form-actions">
                                                    <div class="text-right">
                                                        <button type="submit" class="btn btn-success">Simpan
                                                            Perubahan</button>
                                                        <button type="reset" class="btn btn-dark">Reset</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Visi, Misi, dan Tujuan</h4>
                            <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                <li class="nav-item">
                                    <a href="#home1" data-toggle="tab" aria-expanded="false"
                                        class="nav-link rounded-0 active">
                                        <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                        <span class="d-none d-lg-block">Visi</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#profile1" data-toggle="tab" aria-expanded="true"
                                        class="nav-link rounded-0">
                                        <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                        <span class="d-none d-lg-block">Misi</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#settings1" data-toggle="tab" aria-expanded="false"
                                        class="nav-link rounded-0">
                                        <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                                        <span class="d-none d-lg-block">Tujuan</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="home1">
                                    <div class="text-right mb-2">
                                        <button class="btn btn-success" type="button" data-toggle="modal"
                                            data-target="#full-width-modal">Tambah
                                            Visi</button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Visi</th>
                                                    <th scope="col">aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($visi as $key => $item)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $item->visi }}</td>
                                                        <td>
                                                            <button class="btn btn-warning" type="button"
                                                                data-toggle="modal"
                                                                data-target="#full-width-modal-edit-visi{{ $item->id }}">Edit</button>
                                                            <a href="/profile/visi-delete/{{ $item->id }}"
                                                                class="btn btn-danger">Hapus</a>
                                                        </td>
                                                    </tr>
                                                    <div id="full-width-modal-edit-visi{{ $item->id }}"
                                                        class="modal fade" tabindex="-1" role="dialog"
                                                        aria-labelledby="fullWidthModalLabel2" aria-hidden="true">
                                                        <div class="modal-dialog modal-full-width">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="fullWidthModalLabel2">
                                                                        Update Visi</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal">×</button>
                                                                </div>

                                                                <form method="POST"
                                                                    action="/profile/visi-update/{{ $item->id }}">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="mt-4">
                                                                            <div class="form-group">
                                                                                <label for="tujuan"
                                                                                    class="form-label">Visi</label>
                                                                                <input type="text" name="visi"
                                                                                    class="form-control"
                                                                                    value="{{ $item->visi }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light"
                                                                            data-dismiss="modal">Tutup</button>
                                                                        <button type="submit"
                                                                            class="btn btn-success">Simpan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane show" id="profile1">
                                    <div class="text-right mb-2">
                                        <button class="btn btn-success" type="button" data-toggle="modal"
                                            data-target="#full-width-modal1">Tambah
                                            Misi</button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Misi</th>
                                                    <th scope="col">aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($misi as $key => $item)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $item->misi }}</td>
                                                        <td>
                                                            <button class="btn btn-warning" type="button"
                                                                data-toggle="modal"
                                                                data-target="#full-width-modal-edit-misi{{ $item->id }}">Edit</button>
                                                            <a href="/profile/misi-delete/{{ $item->id }}"
                                                                class="btn btn-danger">Hapus</a>
                                                        </td>
                                                    </tr>
                                                    <div id="full-width-modal-edit-misi{{ $item->id }}"
                                                        class="modal fade" tabindex="-1" role="dialog"
                                                        aria-labelledby="fullWidthModalLabel2" aria-hidden="true">
                                                        <div class="modal-dialog modal-full-width">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="fullWidthModalLabel2">
                                                                        Update Misi</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal">×</button>
                                                                </div>

                                                                <form method="POST"
                                                                    action="/profile/misi-update/{{ $item->id }}">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="mt-4">
                                                                            <div class="form-group">
                                                                                <label for="tujuan"
                                                                                    class="form-label">Misi</label>
                                                                                <input type="text" name="misi"
                                                                                    class="form-control"
                                                                                    value="{{ $item->misi }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light"
                                                                            data-dismiss="modal">Tutup</button>
                                                                        <button type="submit"
                                                                            class="btn btn-success">Simpan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings1">
                                    <div class="text-right mb-2">
                                        <button class="btn btn-success" type="button" data-toggle="modal"
                                            data-target="#full-width-modal2">Tambah
                                            Tujuan</button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Tujuan</th>
                                                    <th scope="col">aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tujuan as $key => $item)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $item->tujuan }}</td>
                                                        <td>
                                                        <td>
                                                            <button class="btn btn-warning" type="button"
                                                                data-toggle="modal"
                                                                data-target="#full-width-modal-edit-tujuan{{ $item->id }}">Edit</button>
                                                            <a href="/profile/tujuan-delete/{{ $item->id }}"
                                                                class="btn btn-danger">Hapus</a>
                                                        </td>
                                                    </tr>
                                                    <div id="full-width-modal-edit-tujuan{{ $item->id }}"
                                                        class="modal fade" tabindex="-1" role="dialog"
                                                        aria-labelledby="fullWidthModalLabel2" aria-hidden="true">
                                                        <div class="modal-dialog modal-full-width">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="fullWidthModalLabel2">
                                                                        Update Tujuan</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal">×</button>
                                                                </div>

                                                                <form method="POST"
                                                                    action="/profile/tujuan-update/{{ $item->id }}">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="mt-4">
                                                                            <div class="form-group">
                                                                                <label for="tujuan"
                                                                                    class="form-label">Misi</label>
                                                                                <input type="text" name="tujuan"
                                                                                    class="form-control"
                                                                                    value="{{ $item->tujuan }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light"
                                                                            data-dismiss="modal">Tutup</button>
                                                                        <button type="submit"
                                                                            class="btn btn-success">Simpan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center text-muted">
            All Rights Reserved by Tim IT MD ULA AL-BAROKAH. Designed and Developed by <a href=""
                class="text-success">Moh. Iqbal Rasuli</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    </div>
    {{-- tambah visi --}}
    <div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-full-width">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="fullWidthModalLabel">Tambah Visi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

                <form method='POST' action="/profile/visi-store">
                    @csrf
                    <div class="modal-body">
                        <div class="mt-4">
                            <div class="form-group">
                                <label for="visi" class="form-label">Visi</label>
                                <input type="text" name="visi" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- tambah misi --}}
    <div id="full-width-modal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-full-width">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="fullWidthModalLabel1">Tambah Misi</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <form method="POST" action="/profile/misi-store">
                    @csrf
                    <div class="modal-body">
                        <div class="mt-4">
                            <div class="form-group">
                                <label for="misi" class="form-label">Misi</label>
                                <input type="text" name="misi" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- tambah tujuan --}}
    <div id="full-width-modal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel2"
        aria-hidden="true">
        <div class="modal-dialog modal-full-width">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="fullWidthModalLabel2">Tambah Tujuan</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <form method="POST" action="/profile/tujuan-store">
                    @csrf
                    <div class="modal-body">
                        <div class="mt-4">
                            <div class="form-group">
                                <label for="tujuan" class="form-label">Tujuan</label>
                                <input type="text" name="tujuan" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('fotoInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('fotoPreview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        });
    </script>
@endsection
