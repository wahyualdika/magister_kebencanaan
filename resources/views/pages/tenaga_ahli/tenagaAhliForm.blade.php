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

    <h3 class="page-heading mb-4">Form Kegiatan Tenaga Ahli</h3>
    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Data Kegiatan Tenaga Ahli</h5>
                    <form class="forms-sample" action="{{route('tenagaAhli.kegiatan.store')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleNIP">Nama Tenaga Ahli</label>
                            <input type="text" class="form-control p-input" name="nama" id="SKS">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Nama dan Judul Kegiatan</label>
                            <input type="text" class="form-control p-input" name="kegiatan" id="SKS">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Tahun  Pelaksanaan</label>
                            <input type="number" class="form-control p-input" name="tahun" id="Keterangan">
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