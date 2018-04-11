@extends('pages.master')

@section('stylesheet')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('script_bottom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript">
        $(".select2-multi").select2();
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        $( function() {
            $( "#datepicker" ).datepicker({
                dateFormat: "dd/mm/yy"
            });
        } );
    </script>
@endsection

@section('side-content')

    <h3 class="page-heading mb-4">Form Edit Dosen</h3>
    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Data Dosen</h5>
                    <form class="forms-sample" action="{{url('dosen/update/'.$data->id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleNama">Nama</label>
                            <input type="text" class="form-control p-input" value="{{ $data->nama }}" name="nama" id="Nama" aria-describedby="emailHelp" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">NIDN</label>
                            <input type="text" class="form-control p-input" value="{{ $data->nidn }}" name="nidn" id="NIDN" placeholder="NIDN">
                        </div>
                        <div class="form-group">
                            <label for='exampleInputTanggal'>Tanggal Lahir</label>
                            <div class='input-group date'>
                                <input type="text"  value="{{date('d/m/Y',strtotime($data->tanggal_lahir))}}" name="tanggalLahir" class="form-control" id="datepicker">
                                <div class='input-group-addon'>
                                    <span class='fa fa-calendar'></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleJabatanAkademik">Jabatan Akademik</label>
                            <input type="text" class="form-control p-input" value="{{ $data->jabatan_akademik }}" name="jabatanAkademik" id="exampleInputJabatanAkademik" placeholder="Jabatan Akademik">
                        </div>
                        <div class="form-group"><label for="exampleS1">Data S1</label>
                            <div class="form-group">
                                <label for="exampleNIP">Gelar Akedemik S1</label>
                                <input type="text" class="form-control p-input" value="{{$data->gelar_akademik_s1}}" name="gelars1" id="S1" placeholder="Gelar Akedemik">
                                <label for="exampleNIP">Asal Perguruan Tinggi S1</label>
                                <input type="text" class="form-control p-input" value="{{$data->asal_pt_s1}}" name="asals1" id="S1" placeholder="Asal Perguruan Tinggi">
                                <label for="exampleNIP">Bidang Keahlian S1</label>
                                <input type="text" class="form-control p-input" value="{{$data->bidang_keahlian_s1}}" name="keahlians1" id="S1" placeholder="Bidang Keahlian">
                            </div>
                        </div>
                        <div class="form-group"><label for="exampleS1">Data S2</label>
                            <div class="form-group">
                                <label for="exampleNIP">Gelar Akedemik S2</label>
                                <input type="text" class="form-control p-input" value="{{$data->gelar_akademik_s2}}" name="gelars2" id="S2" placeholder="Gelar Akedemik">
                                <label for="exampleNIP">Asal Perguruan Tinggi S2</label>
                                <input type="text" class="form-control p-input" value="{{$data->asal_pt_s2}}" name="asals2" id="S2" placeholder="Asal Perguruan Tinggi">
                                <label for="exampleNIP">Bidang Keahlian S2</label>
                                <input type="text" class="form-control p-input" value="{{$data->bidang_keahlian_s2}}" name="keahlians2" id="S2" placeholder="Bidang Keahlian">
                            </div>
                            <div class="form-group"><label for="exampleS1">Status Dosen</label>
                                <select class="select2-multi form-control" name="status">
                                    @if($data->status === 1)
                                        <option value="1">Tetap</option>
                                    @endif
                                    @if($data->status === 0)
                                        <option value="0">Tidak Tetap</option>
                                    @endif
                                    <option value="1">Tetap</option>
                                    <option value="0">Tidak Tetap</option>
                                </select>
                            </div>
                            <div class="form-group"><label for="exampleS1">Sertifikasi Dosen</label>
                                <select class="select2-multi form-control" name="sertifikasi">
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><label for="exampleS1">Data S3</label>
                            <div class="form-group">
                                <label for="exampleNIP">Gelar Akedemik S3</label>
                                <input type="text" class="form-control p-input" value="{{$data->gelar_akademik_s3}}" name="gelars3" id="S3" placeholder="Gelar Akedemik">
                                <label for="exampleNIP">Asal Perguruan Tinggi S3</label>
                                <input type="text" class="form-control p-input" value="{{$data->asal_pt_s3}}" name="asals3" id="S3" placeholder="Asal Perguruan Tinggi">
                                <label for="exampleNIP">Bidang Keahlian S3</label>
                                <input type="text" class="form-control p-input" value="{{$data->bidang_keahlian_s3}}" name="keahlians3" id="S3" placeholder="Bidang Keahlian">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection