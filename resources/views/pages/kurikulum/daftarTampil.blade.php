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
                            <a href="{{route('mataKuliah.struktur.view')}}">
                                <div class="float-left">
                                    <p class="card-text text-dark">Struktur Kurikulum</p>
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
                            <a href="{{route('mataKuliah.pilihan.view')}}">
                                <div class="float-left">
                                    <p class="card-text text-dark">Daftar Mata Kuliah Pilihan</p>
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
                            <a href="{{route('mataKuliah.sksMinimal.view')}}">
                                <div class="float-left">
                                    <p class="card-text text-dark">SKS Minimum PS</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection


