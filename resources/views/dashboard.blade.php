@extends('layout.template_admin')
@section('title', 'Dashboard')
@section('header', 'Dashboard')
@section('content')
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
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
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                                </li>
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
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- *************************************************************** -->
            <!-- Start First Cards -->
            <!-- *************************************************************** -->
            <div class="card-group">
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">{{ $muridlk }}/{{ $muridpr }}
                                    </h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah Murid L/P
                                </h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{ $pengajar }}</h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah Tenaga
                                    Pengajar
                                </h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="users"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">{{ $fan }}</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah Fan</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="book"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 font-weight-medium">{{ $admin }}</h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Akses Admin</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="user"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- *************************************************************** -->
            <!-- End First Cards -->
            <!-- *************************************************************** -->
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h4 class="card-title">Total Murid Tiap kelas L/P</h4>
                            <canvas id="chartMurid" height="120"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h4 class="card-title">Total Murid Tiap Tahun</h4>
                            <canvas id="chartMuridTahun" height="120"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h4 class="card-title">Total Pengajar</h4>
                            <div style="width:400px; height:400px;">
                                <canvas id="chartPengajar"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h4 class="card-title mb-3">Total Fan</h4>
                            <div style="width:400px; height:400px;">
                                <canvas id="chartFan"></canvas>
                            </div>

                        </div>
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
    {{-- chart jumlah pengajar --}}
    <script>
        fetch("{{ url('/dashboard/data-fan') }}")
            .then(response => response.json())
            .then(data => {

                const ctx = document.getElementById('chartFan').getContext('2d');

                new Chart(ctx, {
                    type: "polarArea",
                    data: {
                        labels: data.kelas,
                        datasets: [{
                            label: 'Jumlah Fan',
                            data: data.jumlah,
                            backgroundColor: [
                                'rgb(0, 178, 59)', // hijau terang
                                'rgb(2, 137, 47)', // hijau tua
                                'rgb(40, 167, 69)', // hijau bootstrap
                                'rgb(25, 135, 84)', // hijau emerald
                                'rgb(72, 201, 176)', // hijau toska
                                'rgb(20, 90, 50)' // hijau gelap
                            ],

                            borderColor: '#ffffff',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            title: {
                                display: true,
                                text: 'Jumlah Fan Berdasarkan Kelas'
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }
                });

            });
    </script>
    {{-- chart jumlah pengajar --}}
    <script>
        fetch("{{ url('/dashboard/data-pengajar') }}")
            .then(response => response.json())
            .then(data => {

                const ctx = document.getElementById('chartPengajar').getContext('2d');

                new Chart(ctx, {
                    type: "doughnut",
                    data: {
                        labels: data.JenisKelamin,
                        datasets: [{
                            label: 'Jumlah Pengajar',
                            data: data.jumlah,
                            backgroundColor: [
                                'rgb(0, 178, 59)',
                                'rgb(2, 137, 47)'
                            ],
                            borderColor: '#ffffff',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            title: {
                                display: true,
                                text: 'Jumlah Pengajar Berdasarkan Jenis Kelamin'
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }
                });

            });
    </script>

    {{-- jumlah murid tiap tahun --}}
    <script>
        fetch("{{ url('/dashboard/data-murid-tahun') }}")
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById('chartMuridTahun').getContext('2d')

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.tahun,
                        datasets: [{
                            data: data.murid,
                            label: 'Jumlah Murid',
                            backgroundColor: 'rgb(0, 178, 59)'
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1,
                                    precision: 0,
                                    callback: value => value
                                }
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: 'Jumlah Murid Tiap Tahun'
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return context.dataset.label + ': ' + parseInt(context.raw);
                                    }
                                }
                            }
                        }
                    },
                });
            });
    </script>
    {{-- script chart untuk jumlah murid LP --}}
    <script>
        fetch("{{ url('/dashboard/data-murid') }}")
            .then(response => response.json())
            .then(data => {

                const ctx = document.getElementById('chartMurid').getContext('2d');

                new Chart(ctx, {
                    data: {
                        labels: data.kelas,
                        datasets: [{
                                type: 'bar',
                                label: 'Laki-laki',
                                data: data.laki,
                                backgroundColor: 'rgb(0, 178, 59)'
                            },
                            {
                                type: 'bar',
                                label: 'Perempuan',
                                data: data.perempuan,
                                backgroundColor: 'rgb(2, 137, 47)'
                            },
                            {
                                type: 'line',
                                label: 'Total Murid',
                                data: data.total,
                                backgroundColor: 'rgb(0, 91, 30)'
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1,
                                    precision: 0,
                                    callback: value => value
                                }
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: 'Jumlah Murid L/P Tiap Kelas'
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return context.dataset.label + ': ' + parseInt(context.raw);
                                    }
                                }
                            }
                        }
                    }
                });

            });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endsection
