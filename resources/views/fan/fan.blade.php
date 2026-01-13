@extends('layout.template_admin')
@section('title', 'Data Fan')
@section('header', 'Data Fan')
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
                                <li class="breadcrumb-item text-muted active" aria-current="page">Data Fan</li>
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
                            <div class="d-flex justify-content-between mb-2">
                                <h4 class="card-title">Data Fan
                                    @php
                                        $kelasLabel = [
                                            'shifir_a' => 'Kelas Shifir A',
                                            'shifir_b' => 'Kelas Shifir B',
                                            'kelas_1' => 'Kelas 1',
                                            'kelas_2' => 'Kelas 2',
                                            'kelas_3' => 'Kelas 3',
                                            'kelas_4' => 'Kelas 4',
                                        ];
                                    @endphp

                                    @if (request('kelas'))
                                        - {{ $kelasLabel[request('kelas')] ?? 'Semua Kelas' }}
                                    @else
                                        - Semua Kelas
                                    @endif
                                </h4>
                                <a href="/data-fan/create" class="btn waves-effect waves-light btn-success">Tambah</a>
                            </div>
                            <div class="table-responsive">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Fan</th>
                                            <th>Nama Kitab</th>
                                            <th>Kelas</th>
                                            <th>Nama Pengajar</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fan as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->nama_fan }}</td>
                                                <td>{{ $item->nama_kitab }}</td>
                                                <td>{{ $kelasLabel[$item->kelas] ?? '-' }}</td>
                                                <td>{{ $item->pengajar->nama }}</td>
                                                <td class="text-center">
                                                    <a href="/data-fan/edit/{{ $item->id }}"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="/data-fan/delete/{{ $item->id }}" method="POST"
                                                        class="d-inline" onsubmit="return confirmDelete(event)">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <script>
                                                function confirmDelete(e) {
                                                    e.preventDefault();

                                                    Swal.fire({
                                                        title: 'Yakin hapus?',
                                                        text: 'Data yang dihapus tidak bisa dikembalikan!',
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonText: 'Ya, hapus',
                                                        cancelButtonText: 'Batal'
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            e.target.submit();
                                                        }
                                                    });
                                                }
                                            </script>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
