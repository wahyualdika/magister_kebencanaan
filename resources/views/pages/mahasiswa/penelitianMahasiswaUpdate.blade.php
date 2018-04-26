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

    <h3 class="page-heading mb-4">Form Update Mahasiswa</h3>
    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Data Mahasiswa</h5>
                    <form class="forms-sample" action="{{route('mahasiswa.penelitian.update',['id' => $data->id])}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleNama">Nama Mahasiswa</label>
                            <select class="select2-multi form-control" name="nama">
                                <option value="{{$data->mahasiswa->id}}">{{$data->mahasiswa->nama}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Judul Penelitian</label>
                            <input type="text" class="form-control p-input" value="{{$data->judul_penelitian}}" name="judulPenelitian" id="judul" placeholder="Judul Penelitian">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Tahun Penelitian</label>
                            <input type="text" class="form-control p-input" value="{{$data->tahun_penelitian}}" name="tahunPenelitian" id="tahun" placeholder="Tahun Penelitian">
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