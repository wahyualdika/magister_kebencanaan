@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
  <div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Data Dosen {{ $dosen->nama }}</h5>
          <div class="row">
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mb-3">
                <div class="card card-statistics">
                  <div class="card-body">
                      <a href="{{ route('admin.dosen.viewData', ['id'=>$dosen->id,'tipe'=>1]) }}">
                    <div class="clearfix">
                        <div class="float-left">
                          <h4 class="text-danger">
                            <i class="fa fa-archive highlight-icon" aria-hidden="true"></i>
                          </h4>
                        </div>
                          <div class="float-right">
                            <h4 class="bold-text">Prestasi</h4>
                          </div>
                    </div>
                      <p class="text-muted">
                        <i class="fa fa-archive mr-1" aria-hidden="true"></i> Lihat Prestasi Dosen Ini
                      </p>
                        </a>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mb-3">
                <div class="card card-statistics">
                  <div class="card-body">
                      <a href="{{ route('admin.dosen.viewData', ['id'=>$dosen->id,'tipe'=>2]) }}">
                    <div class="clearfix">
                      <div class="float-left">
                        <h4 class="text-warning">
                          <i class="fa fa-comments-o highlight-icon" aria-hidden="true"></i>
                        </h4>
                      </div>
                      <div class="float-right">
                        <h4 class="bold-text">Pengalaman</h4>
                      </div>
                    </div>
                    <p class="text-muted">
                      <i class="fa fa-comments-o mr-1" aria-hidden="true"></i> Lihat Pengalaman Dosen Ini
                    </p>
                  </a>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mb-3">
                <div class="card card-statistics">
                  <div class="card-body">
                      <a href="{{ route('admin.dosen.viewData', ['id'=>$dosen->id,'tipe'=>3]) }}">
                    <div class="clearfix">
                      <div class="float-left">
                        <h4 class="text-success">
                          <i class="fa fa-building-o highlight-icon" aria-hidden="true"></i>
                        </h4>
                      </div>
                      <div class="float-right">
                        <h4 class="bold-text">Seminar</h4>
                      </div>
                    </div>
                    <p class="text-muted">
                      <i class="fa fa-building-o mr-1" aria-hidden="true"></i> Lihat Kegiatan Seminar Dosen Ini
                    </p>
                  </a>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mb-3">
                <div class="card card-statistics">
                  <div class="card-body">
                  <a href="{{ route('admin.dosen.viewData', ['id'=>$dosen->id,'tipe'=>4]) }}">
                    <div class="clearfix">
                      <div class="float-left">
                        <h4 class="text-primary">
                          <i class="fa fa-users highlight-icon" aria-hidden="true"></i>
                        </h4>
                      </div>
                      <div class="float-right">
                        <h4 class="bold-text">Aktifitas</h4>
                      </div>
                    </div>
                    <p class="text-muted">
                      <i class="fa fa-users mr-1" aria-hidden="true"></i> Lihat Aktifitas Dosen Ini
                    </p>
                  </a>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 mb-3">
                <div class="card card-statistics">
                  <div class="card-body">
                  <a href="{{ route('admin.dosen.viewData', ['id'=>$dosen->id,'tipe'=>5]) }}">
                    <div class="clearfix">
                      <div class="float-left">
                        <h4 class="text-primary">
                          <i class="fa fa-mortar-board highlight-icon" aria-hidden="true"></i>
                        </h4>
                      </div>
                      <div class="float-right">
                        <h5 class="bold-text">Tugas Belajar</h5>
                      </div>
                    </div>
                    <p class="text-muted">
                         <i class="fa fa-mortar-board mr-1" aria-hidden="true"></i> Lihat Tugas Belajar Dosen Ini
                    </p>
                  </a>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
@endsection
