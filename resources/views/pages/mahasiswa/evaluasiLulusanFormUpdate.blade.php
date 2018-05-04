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

    <h3 class="page-heading mb-4">Form Input Evaluasi Lulusan</h3>
    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Data Evaluasi Lulusan</h5>
                    <form class="forms-sample" action="{{ route('evaluasi.lulusan.update',['id'=>$data->id]) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="form-group"><label for="exampleS1">Jenis Kemampuan</label>
                                <select class="form-control" name="jenisKemampuan" id="jenis">
                                    <option value="{{$data->jenisKemampuan->id}}">{{$data->jenisKemampuan->jenis_kemampuan}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleNama">Sangat Baik</label>
                                <input type="number" class="form-control p-input" value="{{$data->sangat_baik}}" name="sgtBaik" id="tipe">
                            </div>
                            <div class="form-group">
                                <label for="exampleNama">Baik</label>
                                <input type="number" class="form-control p-input" value="{{$data->baik}}" name="baik" id="tipe">
                            </div>
                            <div class="form-group">
                                <label for="exampleNama">Cukup</label>
                                <input type="number" class="form-control p-input" value="{{$data->cukup}}" name="cukup" id="tipe">
                            </div>
                            <div class="form-group">
                                <label for="exampleNama">Kurang</label>
                                <input type="number" class="form-control p-input" value="{{$data->kurang}}" name="kurang" id="tipe">
                            </div>
                            <div class="form-group">
                                <label for="exampleNIP">Pemanfaatan Hasil Pelacakan</label>
                                <input type="text" class="form-control p-input" value="{{$data->pelacakan}}" name="pelacakan" id="tipe">
                            </div>
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Rata-rata waktu tunggu lulusan memperoleh pekerjaan(Bulan)</label>
                            <input type="number" step="any" value="{{$lanjutans->waktu_tunggu}}" class="form-control p-input" name="waktuTgu">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Persentase lulusan yang bekerja sesuai bidang ilmu(%)</label>
                            <input type="number" step="any" class="form-control p-input" value="{{$lanjutans->persentase}}" name="persentase">
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