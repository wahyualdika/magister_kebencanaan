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
                            <a href="{{route('admin.publikasi.view')}}">
                                <div class="float-left">
                                    <h4 class="text-danger">
                                        <i class="fa fa fa-user-o highlight-icon" aria-hidden="true"></i>
                                    </h4>
                                </div>
                                <div class="float-right">
                                    <p class="card-text text-dark">Daftar Publikasi Karya Tulis</p>
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


