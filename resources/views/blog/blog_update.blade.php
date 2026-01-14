@extends('layout.template_admin')
@section('title', 'Update Blog')
@section('header', 'Update Blog')
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
                                <li class="breadcrumb-item"><a href="/data-fan">Blog</a>
                                </li>
                                <li class="breadcrumb-item text-muted active" aria-current="page">Update Blog/li>
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
                            <h4 class="mb-3">Form Update blog</h4>
                            <form action="/blog/update/{{$blog->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- DATA MURID -->
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label>Judul</label>
                                        <input type="text" class="form-control" name="judul" value="{{$blog->judul}}" required>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label>Konten</label>
                                        <textarea class="form-control" name="konten" rows="3" required>{{ old('kontent', $blog->konten ?? '') }}</textarea>
                                    </div>
                                    <div class="col-12 form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload Thumbnail</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="thumbnail"
                                                    id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status" required>
                                            <option value="publish" {{old('status', $blog->status ?? '') == 'publish' ? 'selected' : ''}}>Publish</option>
                                            <option value="draft" {{old('status', $blog->status ?? '') == 'draft' ? 'selected' : ''}}>Draft</option>
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
