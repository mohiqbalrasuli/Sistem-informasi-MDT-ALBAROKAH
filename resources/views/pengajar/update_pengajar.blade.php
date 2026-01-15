@extends('layout.template_admin')
@section('title', 'Update Data Pengajar')
@section('header', 'Update Data Pengajar')
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
                    <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Assalamu'Alaikum {{Auth::user()->name}}
                    </h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="/data-pengajar">Pengajar</a>
                                </li>
                                <li class="breadcrumb-item text-muted active" aria-current="page">Update Data Pengajar</li>
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
                            <h4 class="mb-3">Form Update Pengajar</h4>
                            <form action="/data-pengajar/update/{{$pengajar->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- DATA MURID -->
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" value="{{$pengajar->nama}}" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kelamin" required>
                                            <option value="">-- Pilih --</option>
                                            <option value="Laki-laki"
                                                {{ old('jenis_kelamin', $pengajar->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>
                                                Laki-laki
                                            </option>

                                            <option value="Perempuan"
                                                {{ old('jenis_kelamin', $pengajar->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>
                                                Perempuan
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" class="form-control" value="{{$pengajar->tempat_lahir}}" name="tempat_lahir" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" class="form-control" value="{{$pengajar->tanggal_lahir}}" name="tanggal_lahir" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat" rows="3" required>{{ old('alamat', $pengajar->alamat ?? '') }}</textarea>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>No. Telp</label>
                                        <input type="text" class="form-control" value="{{$pengajar->no_telp}}" name="no_telp" required>
                                    </div>
                                    <div class="col-12 form-group">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-success">
                                                Simpan
                                            </button>
                                            <button type="reset" class="btn btn-secondary">
                                                Reset
                                            </button>
                                        </div>
                                    </div>
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
