@extends('layout.template_admin')
@section('title', 'Update Data Murid')
@section('header', 'Update Data Murid')
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
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-7 align-self-center">
                    <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Assalamu'Alaikum Admin!
                    </h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="/data-murid">Murid</a>
                                </li>
                                <li class="breadcrumb-item text-muted active" aria-current="page">Update Data Murid</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Form Update Murid</h4>
                            <form action="/data-murid/update/{{ $murid->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                {{-- @method('PUT') --}}
                                <!-- DATA MURID -->
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama"
                                            value="{{ $murid->nama }}" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Kelas</label>
                                        <select class="form-control" name="kelas" required>
                                            <option value="">-- Pilih --</option>

                                            <option value="shifir_a"
                                                {{ old('kelas', $murid->kelas ?? '') == 'shifir_a' ? 'selected' : '' }}>
                                                Kelas Shifir A
                                            </option>

                                            <option value="shifir_b"
                                                {{ old('kelas', $murid->kelas ?? '') == 'shifir_b' ? 'selected' : '' }}>
                                                Kelas Shifir B
                                            </option>

                                            <option value="kelas_1"
                                                {{ old('kelas', $murid->kelas ?? '') == 'kelas_1' ? 'selected' : '' }}>
                                                Kelas 1
                                            </option>

                                            <option value="kelas_2"
                                                {{ old('kelas', $murid->kelas ?? '') == 'kelas_2' ? 'selected' : '' }}>
                                                Kelas 2
                                            </option>

                                            <option value="kelas_3"
                                                {{ old('kelas', $murid->kelas ?? '') == 'kelas_3' ? 'selected' : '' }}>
                                                Kelas 3
                                            </option>

                                            <option value="kelas_4"
                                                {{ old('kelas', $murid->kelas ?? '') == 'kelas_4' ? 'selected' : '' }}>
                                                Kelas 4
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kelamin" required>
                                            <option value="">-- Pilih --</option>

                                            <option value="Laki-laki"
                                                {{ old('jenis_kelamin', $murid->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>
                                                Laki-laki
                                            </option>

                                            <option value="Perempuan"
                                                {{ old('jenis_kelamin', $murid->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>
                                                Perempuan
                                            </option>
                                        </select>

                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir"
                                            value="{{ $murid->tempat_lahir }}" required>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tanggal_lahir"
                                            value="{{ $murid->tanggal_lahir }}" required>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label>Tahun Masuk</label>
                                        <input type="text" class="form-control" name="tahun_masuk"
                                            value="{{ $murid->tahun_masuk }}" required>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>Alamat Lengkap</label>
                                        <textarea class="form-control" name="alamat" rows="3" required>{{ old('alamat', $murid->alamat ?? '') }}</textarea>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload Foto</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="foto"
                                                    id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload Akta</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="akta"
                                                    id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload KK</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="kk"
                                                    id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <!-- DATA ORANG TUA -->
                                <h5 class="mb-3">Data Orang Tua</h5>

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Nama Ayah</label>
                                        <input type="text" class="form-control"
                                            name="nama_ayah"value="{{ $murid->nama_ayah }}" required>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label>Pekerjaan Ayah</label>
                                        <input type="text" class="form-control"
                                            name="pekerjaan_ayah"value="{{ $murid->pekerjaan_ayah }}" required>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label>Nama Ibu</label>
                                        <input type="text" class="form-control"
                                            name="nama_ibu"value="{{ $murid->nama_ibu }}" required>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label>Pekerjaan Ibu</label>
                                        <input type="text" class="form-control"
                                            name="pekerjaan_ibu"value="{{ $murid->pekerjaan_ibu }}" required>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label>Nomor HP Orang Tua</label>
                                        <input type="text" class="form-control" name="no_telp"
                                            placeholder="08xxxxxxxxxx" value="{{ $murid->no_telp }}" required>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-success">
                                        Simpan
                                    </button>
                                    <button type="reset" class="btn btn-secondary">
                                        Reset
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
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
@endsection
