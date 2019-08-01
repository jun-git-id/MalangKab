@extends('admin.app')

@section('content')
    <div class="container-fluid mt-5 mb-5">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah User</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$users -> count()}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Tempat
                                    Usaha
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$tempatusaha -> count()}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-store fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Produk
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$product -> count()}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-boxes fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Kecamatan
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$kecamatan -> count()}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-city fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Desa</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$desa -> count()}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-building fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row ">
            <input type="hidden" id="dataUsahaJan" value="{{$usahaJan -> count()}}">
            <input type="hidden" id="dataUsahaFeb" value="{{$usahaFeb -> count()}}">
            <input type="hidden" id="dataUsahaMar" value="{{$usahaMar -> count()}}">
            <input type="hidden" id="dataUsahaApr" value="{{$usahaApr -> count()}}">
            <input type="hidden" id="dataUsahaMei" value="{{$usahaMei -> count()}}">
            <input type="hidden" id="dataUsahaJun" value="{{$usahaJun -> count()}}">
            <input type="hidden" id="dataUsahaJul" value="{{$usahaJul -> count()}}">
            <input type="hidden" id="dataUsahaAug" value="{{$usahaAug -> count()}}">
            <input type="hidden" id="dataUsahaSep" value="{{$usahaSep -> count()}}">
            <input type="hidden" id="dataUsahaOkt" value="{{$usahaOkt -> count()}}">
            <input type="hidden" id="dataUsahaNov" value="{{$usahaNov -> count()}}">
            <input type="hidden" id="dataUsahaDes" value="{{$usahaDes -> count()}}">

            @foreach($kecamatan as $key => $item)
                <input type="hidden" id="kecamatan[{{$key}}]" value="{{$item->nama_kecamatan}}">
                <input type="hidden" id="dataByKec[{{$key}}]" value="{{$usahaByKec[$key] -> count()}}">
            @endforeach
            <input type="hidden" id="jmlKec" value="{{$kecamatan -> count()}}">

            <!-- Area Chart -->
            {{--<div class="col-xl-8 col-lg-7 ">--}}
                <div class="card shadow mb-4 w-100 mr-3">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                        <h6 class="m-0 font-weight-bold text-primary">Statistik Jumlah Tempat Usaha</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                 aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Filter By:</div>
                                <a class="dropdown-item" href="dashboard">Tahun Sekarang</a>
                                <a class="dropdown-item" href="#">3 Tahun Terakhir</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body ">
                        <div class="chart-area ">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            {{--</div>--}}

            {{--<!-- Pie Chart -->--}}
            {{--<div class="col-xl-4 col-lg-5">--}}
                {{--<div class="card shadow mb-2">--}}
                    {{--<!-- Card Header - Dropdown -->--}}
                    {{--<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">--}}
                        {{--<h6 class="m-0 font-weight-bold text-primary">Data Tempat Usaha By Kecamatan</h6>--}}
                        {{--<div class="dropdown no-arrow">--}}
                            {{--<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"--}}
                               {{--data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                {{--<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>--}}
                            {{--</a>--}}
                            {{--<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"--}}
                                 {{--aria-labelledby="dropdownMenuLink">--}}
                                {{--<div class="dropdown-header">Filter By:</div>--}}
                                {{--<a class="dropdown-item" href="dashboard">Tahun Sekarang</a>--}}
                                {{--<a class="dropdown-item" href="#">3 Tahun Terakhir</a>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- Card Body -->--}}
                    {{--<div class="card-body">--}}
                        {{--<div class="chart-pie">--}}
                            {{--<canvas id="myPieChart"></canvas>--}}
                        {{--</div>--}}
                        {{--<div class="mt-2 text-center small">--}}
                            {{--<p class="text-left">*Jika data 0, maka data tidak ditampilkan pada chart</p>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <!-- Bar Chart -->
            <div class="card shadow mb-4 ml-3 w-100 mr-3">
                <div class="card-header py-3 ">
                    <h6 class="m-0 font-weight-bold text-primary">Data Tempat Usaha By Kecamatan</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myBarChart"></canvas>
                    </div>
                    <hr>

                </div>
            </div>
        </div>



            </div>

    <!-- /.container-fluid -->

@endsection