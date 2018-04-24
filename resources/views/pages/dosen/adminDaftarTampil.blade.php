@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
    <div>
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{route('admin.dosen.index')}}">
                            <div class="float-left">
                                <h4 class="text-danger">
                                    <i class="fa fa fa-user-o highlight-icon" aria-hidden="true"></i>
                                </h4>
                            </div>
                            <div class="float-right">
                                <p class="card-text text-dark">Daftar Semua Dosen</p>
                                <h4 class="bold-text">Jumlah Dosen</h4>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{route('admin.dosen.tetap')}}">
                                <div class="float-left">
                                    <h4 class="text-danger">
                                        <i class="fa fa fa-user-o highlight-icon" aria-hidden="true"></i>
                                    </h4>
                                </div>
                                <div class="float-right">
                                    <p class="card-text text-dark">Daftar Dosen Tetap</p>
                                    <h4 class="bold-text">Jumlah Dosen</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{route('admin.dosen.tidakTetap')}}">
                                <div class="float-left">
                                    <h4 class="text-danger">
                                        <i class="fa fa fa-user-o highlight-icon" aria-hidden="true"></i>
                                    </h4>
                                </div>
                                <div class="float-right">
                                    <p class="card-text text-dark">Daftar Dosen Tidak Tetap</p>
                                    <h4 class="bold-text">Jumlah Dosen</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{route('admin.dosenPrestasi.view')}}">
                                <div class="float-left">
                                    <h4 class="text-danger">
                                        <i class="fa fa fa-user-o highlight-icon" aria-hidden="true"></i>
                                    </h4>
                                </div>
                                <div class="float-right">
                                    <p class="card-text text-dark">Daftar Prestasi Dosen</p>
                                    <h4 class="bold-text">Jumlah Dosen</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{route('admin.dosenPengalaman.view')}}">
                                <div class="float-left">
                                    <h4 class="text-danger">
                                        <i class="fa fa fa-user-o highlight-icon" aria-hidden="true"></i>
                                    </h4>
                                </div>
                                <div class="float-right">
                                    <p class="card-text text-dark">Daftar Pengalaman Dosen</p>
                                    <h4 class="bold-text">Jumlah Dosen</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{route('admin.dosenSeminar.view')}}">
                                <div class="float-left">
                                    <h4 class="text-danger">
                                        <i class="fa fa fa-user-o highlight-icon" aria-hidden="true"></i>
                                    </h4>
                                </div>
                                <div class="float-right">
                                    <p class="card-text text-dark">Daftar Kegiatan Seminar</p>
                                    <h4 class="bold-text">Jumlah Dosen</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{route('admin.dosen.aktivitasView')}}">
                                <div class="float-left">
                                    <h4 class="text-danger">
                                        <i class="fa fa fa-user-o highlight-icon" aria-hidden="true"></i>
                                    </h4>
                                </div>
                                <div class="float-right">
                                    <p class="card-text text-dark">Daftar Aktivitas Dosen</p>
                                    <h4 class="bold-text">Jumlah</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{route('admin.dosen.tugasBelajarView')}}">
                                <div class="float-left">
                                    <h4 class="text-danger">
                                        <i class="fa fa fa-user-o highlight-icon" aria-hidden="true"></i>
                                    </h4>
                                </div>
                                <div class="float-right">
                                    <p class="card-text text-dark">Daftar Tugas Belajar</p>
                                    <h4 class="bold-text">Jumlah</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


