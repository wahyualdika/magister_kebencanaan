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
                            <a href="{{route('admin.penelitian.daftar')}}">
                                <div class="float-left">
                                    <h4 class="text-danger">
                                        <i class="fa fa fa-user-o highlight-icon" aria-hidden="true"></i>
                                    </h4>
                                </div>
                                <div class="float-right">
                                    <p class="card-text text-dark">Daftar Penelitian</p>
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
                            <a href="{{route('penelitian.tampil.dosenTetap')}}">
                                <div class="float-left">
                                    <h4 class="text-danger">
                                        <i class="fa fa fa-user-o highlight-icon" aria-hidden="true"></i>
                                    </h4>
                                </div>
                                <div class="float-right">
                                    <p class="card-text text-dark">Penelitian Dosen Tetap</p>
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
                            <a href="{{route('penelitian.tampil.jumlahDanaPenelitian')}}">
                                <div class="float-left">
                                    <h4 class="text-danger">
                                        <i class="fa fa fa-user-o highlight-icon" aria-hidden="true"></i>
                                    </h4>
                                </div>
                                <div class="float-right">
                                    <p class="card-text text-dark">Jumlah Dana Penelitian</p>
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
                            <a href="{{route('penelitian.tampil.bimbinganTesis')}}">
                                <div class="float-left">
                                    <h4 class="text-danger">
                                        <i class="fa fa fa-user-o highlight-icon" aria-hidden="true"></i>
                                    </h4>
                                </div>
                                <div style="text-align: center">
                                    <p class="card-text text-dark">Penelitian Tesis</p>
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
                            <a href="{{route('penelitian.tampil.penelitianDgnMhs')}}">
                                <div class="float-left">
                                    <h4 class="text-danger">
                                        <i class="fa fa fa-user-o highlight-icon" aria-hidden="true"></i>
                                    </h4>
                                </div>
                                <div style="text-align: center">
                                    <p class="card-text text-dark">Penelitian Dengan Melibatkan Mahasiswa</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


