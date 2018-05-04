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
        $(document).ready(function(){
            $("select").change(function(){
                $("input").show();
            });
        });
    </script>
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
                    <form class="forms-sample" action="{{ route('evaluasi.lulusan.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="form-group"><label for="exampleS1">Jenis Kemampuan</label>
                                <select class="form-control" name="jenisKemampuan" id="jenis">
                                    <option>Pilih Jenis Kemampuan</option>
                                    @foreach($kemampuans as $kemampuan)
                                        <option value="{{$kemampuan->id}}">{{$kemampuan->jenis_kemampuan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleNama">Sangat Baik</label>
                                <input type="number" style="display: none" class="form-control p-input" name="sgtBaik" id="tipe">
                            </div>
                            <div class="form-group">
                                <label for="exampleNama">Baik</label>
                                <input type="number"style="display: none" class="form-control p-input" name="baik" id="tipe">
                            </div>
                            <div class="form-group">
                                <label for="exampleNama">Cukup</label>
                                <input type="number" style="display: none" class="form-control p-input" name="cukup" id="tipe">
                            </div>
                            <div class="form-group">
                                <label for="exampleNama">Kurang</label>
                                <input type="number" style="display: none" class="form-control p-input" name="kurang" id="tipe">
                            </div>
                            <div class="form-group">
                                <label for="exampleNIP">Pemanfaatan Hasil Pelacakan</label>
                                <input type="text" style="display: none" class="form-control p-input" name="pelacakan" id="tipe">
                            </div>
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Rata-rata waktu tunggu lulusan memperoleh pekerjaan(Bulan)</label>
                            <input type="number" step="any" class="form-control p-input" name="waktuTgu">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Persentase lulusan yang bekerja sesuai bidang ilmu(%)</label>
                            <input type="number" step="any" class="form-control p-input" name="persentase">
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