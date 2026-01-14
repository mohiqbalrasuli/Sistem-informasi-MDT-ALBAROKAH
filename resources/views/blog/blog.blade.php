@extends('layout.template_admin')
@section('title', 'Blog')
@section('header', 'Blog')
@section('content')
    <style>
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
                                <li class="breadcrumb-item text-muted active" aria-current="page">Blog</li>
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
                            <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                <li class="nav-item">
                                    <a href="#home1" data-toggle="tab" aria-expanded="false"
                                        class="nav-link rounded-0 active">
                                        <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                        <span class="d-none d-lg-block">Publish</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#profile1" data-toggle="tab" aria-expanded="true" class="nav-link rounded-0">
                                        <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                        <span class="d-none d-lg-block">Draft</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="home1">
                                    <div class="text-right mb-2">
                                        <a href="/blog/create" class="btn btn-success">Tambah</a>
                                    </div>
                                    <div class="table-responsive">

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Judul</th>
                                                    <th>konten</th>
                                                    <th>Thumbnail</th>
                                                    <th>Status</th>
                                                    <th class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($blog as $key => $item)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $item->judul }}</td>
                                                        <td>{{ $item->konten }}</td>
                                                        <td><button class="btn btn-success" data-toggle="modal"
                                                                data-target="#thumbnailModal{{ $item->id }}">
                                                                Lihat
                                                            </button>
                                                            <div class="modal fade" id="thumbnailModal{{ $item->id }}"
                                                                tabindex="-1">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Thumbnail</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        <div class="modal-body text-center">
                                                                            @if (in_array(pathinfo($item->thumbnail, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                                                                <img src="{{ asset('storage/' . $item->thumbnail) }}"
                                                                                    class="img-fluid">
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ $item->status }}</td>
                                                        <td class="text-center gap-2">
                                                            <form action="/blog/update/{{$item->id}}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="judul" value="{{$item->judul}}">
                                                                <input type="hidden" name="konten" value="{{$item->konten}}">
                                                                <input type="hidden" name="status" value="draft">
                                                                <button type="submit" class="btn btn-secondary btn-sm">UnPublish</button>
                                                            </form>

                                                            <a href="/blog/edit/{{ $item->id }}"
                                                                class="btn btn-warning btn-sm">Edit</a>
                                                            <form action="/blog/delete/{{ $item->id }}" method="POST"
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
                                <div class="tab-pane show" id="profile1">
                                    <div class="table-responsive">

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Judul</th>
                                                    <th>konten</th>
                                                    <th>Thumbnail</th>
                                                    <th>Status</th>
                                                    <th class="text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($draft as $key => $item)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $item->judul }}</td>
                                                        <td>{{ $item->konten }}</td>
                                                        <td><button class="btn btn-success" data-toggle="modal"
                                                                data-target="#thumbnailModal{{ $item->id }}">
                                                                Lihat
                                                            </button>
                                                            <div class="modal fade" id="thumbnailModal{{ $item->id }}"
                                                                tabindex="-1">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Thumbnail</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        <div class="modal-body text-center">
                                                                            @if (in_array(pathinfo($item->thumbnail, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                                                                <img src="{{ asset('storage/' . $item->thumbnail) }}"
                                                                                    class="img-fluid">
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ $item->status }}</td>
                                                        <td class="text-center gap-2">
                                                            <form action="/blog/update/{{$item->id}}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="judul" value="{{$item->judul}}">
                                                                <input type="hidden" name="konten" value="{{$item->konten}}">
                                                                <input type="hidden" name="status" value="publish">
                                                                <button type="submit" class="btn btn-secondary btn-sm">Publish</button>
                                                            </form>

                                                            <a href="/blog/edit/{{ $item->id }}"
                                                                class="btn btn-warning btn-sm">Edit</a>
                                                            <form action="/blog/delete/{{ $item->id }}" method="POST"
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
                            </div> <!-- end card-->
                        </div> <!-- end col -->
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
