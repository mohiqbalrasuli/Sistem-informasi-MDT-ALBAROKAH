@extends('layout.template_admin')
@section('title', 'Data Murid Baru')
@section('header', 'Data Murid Baru')
@section('content')
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
                                <li class="breadcrumb-item text-muted active" aria-current="page">Data Murid Baru</li>
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
                            <h4 class="card-title">Data Murid Baru</h4>
                                <div class="table-responsive">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Lengkap</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Tahun Masuk</th>
                                                <th>Alamat</th>
                                                <th>Foto</th>
                                                <th>Akta</th>
                                                <th>KK</th>
                                                <th>Nama Ayah</th>
                                                <th>Pekerjaan Ayah</th>
                                                <th>Nama Ibu</th>
                                                <th>Pekerjaan Ibu</th>
                                                <th>No HP Ortu</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($muridbaru as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->jenis_kelamin }}</td>
                                                    <td>{{ $item->tempat_lahir }}</td>
                                                    <td>{{ $item->tanggal_lahir }}</td>
                                                    <td>{{ $item->alamat }}</td>
                                                    <td>
                                                        <button class="btn btn-info btn-sm" data-toggle="modal"
                                                            data-target="#fotoModal">
                                                            Lihat
                                                        </button>
                                                        <div class="modal fade" id="fotoModal" tabindex="-1">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Foto</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        @if (in_array(pathinfo($item->foto, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                                                            <img src="{{ asset('storage/foto/' . $item->foto) }}"
                                                                                class="img-fluid">
                                                                        @else
                                                                            <iframe
                                                                                src="{{ asset('storage/foto/' . $item->foto) }}"
                                                                                width="100%" height="500"></iframe>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    <td>
                                                        <button class="btn btn-info btn-sm" data-toggle="modal"
                                                            data-target="#aktaModal">
                                                            Lihat
                                                        </button>
                                                        <div class="modal fade" id="aktaModal" tabindex="-1">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Akta Kelahiran</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        @if (in_array(pathinfo($item->akta, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                                                            <img src="{{ asset('storage/akta/' . $item->akta) }}"
                                                                                class="img-fluid">
                                                                        @else
                                                                            <iframe
                                                                                src="{{ asset('storage/akta/' . $item->akta) }}"
                                                                                width="100%" height="500"></iframe>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-info btn-sm" data-toggle="modal"
                                                            data-target="#kkModal">
                                                            Lihat
                                                        </button>
                                                        <div class="modal fade" id="kkModal" tabindex="-1">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Karti Keluarga</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        @if (in_array(pathinfo($item->akta, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                                                            <img src="{{ asset('storage/kk/' . $item->kk) }}"
                                                                                class="img-fluid">
                                                                        @else
                                                                            <iframe
                                                                                src="{{ asset('storage/kk/' . $item->kk) }}"
                                                                                width="100%" height="500"></iframe>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $item->nama_ayah }}</td>
                                                    <td>{{ $item->pekerjaan_ayah }}</td>
                                                    <td>{{ $item->nama_ibu }}</td>
                                                    <td>{{ $item->pekerjaan_ibu }}</td>
                                                    <td>{{ $item->no_tlp }}</td>
                                                    <td class="text-center">
                                                        <a href="/data-murid/edit" class="btn btn-warning btn-sm">Edit</a>
                                                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <!-- data selanjutnya -->
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
    </div>
@endsection
