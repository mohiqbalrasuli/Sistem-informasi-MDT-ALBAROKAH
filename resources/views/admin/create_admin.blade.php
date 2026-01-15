@extends('layout.template_admin')
@section('title', 'Tambah Data Admin')
@section('header', 'Tambah Data Admin')
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
                    <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Assalamu'Alaikum
                        {{ Auth::user()->name }}
                    </h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="/data-admin">Admin</a>
                                </li>
                                <li class="breadcrumb-item text-muted active" aria-current="page">Tambah Data Admin</li>
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
                            <h4 class="mb-3">Form Tambah Admin</h4>
                            <form action="/data-admin/store" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- DATA MURID -->
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Konfirmasi Password</label>
                                        <input type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                    <small id="msg" style="color:red; display:none;">
                                        Password tidak sama
                                    </small>
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
    <script>
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('password_confirmation');
        const submitBtn = document.getElementById('submitBtn');
        const msg = document.getElementById('msg');

        function checkPassword() {
            if (password.value !== "" && password.value === confirmPassword.value) {
                submitBtn.disabled = false;
                msg.style.display = "none";
            } else {
                submitBtn.disabled = true;
                msg.style.display = "block";
            }
        }

        password.addEventListener('keyup', checkPassword);
        confirmPassword.addEventListener('keyup', checkPassword);
    </script>

@endsection
