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

    <h3 class="page-heading mb-4">Form Input Dosen</h3>
    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Data Dosen</h5>
                    <form class="forms-sample" action="{{ route('mahasiswa.dana.update',['id'=>$data->id]) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group"><label for="exampleS1">Tahun Akademik</label>
                            <select class="select2-multi form-control" name="tahunAkademik">
                                <option value="{{$data->tahun_akademik}}">{{$data->tahun_akademik}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Jumlah Mahasiswa</label>
                            <input type="number" class="form-control p-input" value="{{$data->jumlah_mahasiswa}}" name="jumlahMahasiswa" placeholder="Jumlah Mahasiswa">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Jumlah Dana Operasional(Juta Rupiah)</label>
                            <input type="number" class="form-control p-input" value="{{$data->jumlah_dana}}" name="jumlahDana" placeholder="Jumlah Dana">
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