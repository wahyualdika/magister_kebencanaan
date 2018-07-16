@extends('pages.master')
@section('script_bottom')
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
          $(document).ready(function(){
              $("#shakeDosen").mouseenter(function(){
                $("#shakeDosen").effect("shake");
              });
              $("#shakePenelitian").mouseenter(function(){
                $("#shakePenelitian").effect("shake");
              });
              $("#shakeMahasiswa").mouseenter(function(){
                $("#shakeMahasiswa").effect("shake");
              });
              $("#shakePublikasi").mouseenter(function(){
                $("#shakePublikasi").effect("shake");
              });
              $("#shakePustaka").mouseenter(function(){
                $("#shakePustaka").effect("shake");
              });
              $("#shakePengabdian").mouseenter(function(){
                $("#shakePengabdian").effect("shake");
              });
              $("#shakeAhli").mouseenter(function(){
                $("#shakeAhli").effect("shake");
              });
              $("#shakeDana").mouseenter(function(){
                $("#shakeDana").effect("shake");
              });
              $("#shakeKurikulum").mouseenter(function(){
                $("#shakeKurikulum").effect("shake");
              });
              $("#shakeRuang").mouseenter(function(){
                $("#shakeRuang").effect("shake");
              });
              $("#shakeStaff").mouseenter(function(){
                $("#shakeStaff").effect("shake");
              });
              $("#shakeData").mouseenter(function(){
                $("#shakeData").effect("shake");
              });
          });
</script>
@endsection

@section('side-content')
    <div>

        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                <div class="card card-statistics" id="shakeDosen">
                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{ route('admin.dosen.daftar') }}">
                                <div class="float-left">
                                    <p class="card-text text-dark">Dosen</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                <div class="card card-statistics" id="shakeMahasiswa">
                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{route('admin.mahasiswa.daftar')}}">
                                <div class="float-left">
                                    <p class="card-text text-dark">Mahasiswa</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                <div class="card card-statistics" id="shakePenelitian">
                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{route('admin.penelitian.daftar')}}">
                                <div class="float-left">
                                    <p class="card-text text-dark">Penelitian</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                <div class="card card-statistics" id="shakePublikasi">
                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{ route('admin.publikasi.daftar') }}">
                                <div class="float-left">
                                    <p class="card-text text-dark">Publikasi</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                <div class="card card-statistics" id="shakeKurikulum">
                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{ route('mataKuliah.daftarTampil.view') }}">
                                <div class="float-left">
                                    <p class="card-text text-dark">Kurikulum</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                <div class="card card-statistics" id="shakeData">
                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{route('admin.aksesibilitasData.view')}}">
                                <div class="float-left">
                                    <p class="card-text text-dark">Aksesibilitas Data</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                <div class="card card-statistics" id="shakeDana">
                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{route('admin.alokasiDana.view')}}">
                                <div class="float-left">
                                    <p class="card-text text-dark">Alokasi Dana</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                <div class="card card-statistics" id="shakePustaka">
                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{ route('admin.pustaka.view')}}">
                                <div class="float-left">
                                    <p class="card-text text-dark">Pustaka</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                <div class="card card-statistics" id="shakePengabdian">
                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{route('admin.pengabdian.daftarTampil')}}">
                                <div class="float-left">
                                    <p class="card-text text-dark">Pengabdian Masyarakat</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                <div class="card card-statistics" id="shakeStaff">
                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{route('admin.staff.view')}}">
                                <div class="float-left">
                                    <p class="card-text text-dark">Staff</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                <div class="card card-statistics" id="shakeRuang">
                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{route('admin.ruangKerja.view')}}">
                                <div class="float-left">
                                    <p class="card-text text-dark">Ruang Kerja Dosen</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                <div class="card card-statistics" id="shakeAhli">
                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{route('tenagaAhli.kegiatan.view')}}">
                                <div class="float-left">
                                    <p class="card-text text-dark">Tenaga Ahli</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
          </div>
    </div>
@endsection
