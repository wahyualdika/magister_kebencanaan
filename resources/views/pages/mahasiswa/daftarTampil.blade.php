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
                            <a href="{{route('admin.mahasiswa.view')}}">
                                <div class="float-left">
                                    <p class="card-text text-dark">Daftar Mahasiswa</p>
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
                            <a href="{{route('mahasiswa.lulusan.view')}}">
                                <div class="float-left">
                                    <p class="card-text text-dark">Daftar Mahasiswa dan Lulusan</p>
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
                            <a href="{{route('mahasiswa.penelitian.view')}}">
                                <div class="float-left">
                                    <p class="card-text text-dark">Daftar Penelitian Mahasiswa</p>
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
                            <a href="{{route('mahasiswa.dana.view')}}">
                                <div class="float-left">
                                    <p class="card-text text-dark">Daftar Mahasiswa dan Dana</p>
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
                            <a href="{{route('evaluasi.lulusan.view')}}">
                                <div class="float-left">
                                    <p class="card-text text-dark">Evaluasi Lulusan</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


