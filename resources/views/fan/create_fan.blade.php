@extends('layout.template_admin')
@section('title', 'Tambah Data Fan')
@section('header', 'Tambah Data Fan')
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
                                <li class="breadcrumb-item"><a href="/data-fan">Fan</a>
                                </li>
                                <li class="breadcrumb-item text-muted active" aria-current="page">Tambah Data Fan</li>
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
                            <h4 class="mb-3">Form Tambah Fan</h4>
                            <form action="/data-fan/store" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- DATA MURID -->
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Nama Fan</label>
                                        <input type="text" class="form-control" name="nama_fan" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Nama Kitab</label>
                                        <input type="text" class="form-control" name="nama_kitab" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Kelas</label>
                                        <select class="form-control" name="kelas" required>
                                            <option value="">-- Pilih --</option>
                                            <option value="shifir_a">Shifir A</option>
                                            <option value="shifir_b">Shifir B</option>
                                            <option value="kelas_1">Kelas 1</option>
                                            <option value="kelas_2">Kelas 2</option>
                                            <option value="kelas_3">Kelas 3</option>
                                            <option value="kelas_4">Kelas 4</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Pengajar</label>
                                        <select class="form-control" name="pengajar_id" required>
                                            <option value="">-- Pilih --</option>
                                            @foreach ($pengajar as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
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
