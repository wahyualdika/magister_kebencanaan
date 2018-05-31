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
    <script type="text/javascript">
        $(document).ready(function(){
            $("select").change(function(){
                var input = $( "#mkpilihan" ).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.post("{!! route('mataKuliah.pilihan.updateAjaxMk') !!}",
                    {
                       kode : input
                    }, function(data, status){
                    console.log(data.semester);
                        $("input").show();
                        $("#Nama").val(data.nama_mk);
                        $("#Semester").val(data.semester);
                        $("#BobotSKS").val(data.bobot_sks);
                        $("#Penyelenggara").val(data.unit_penyelenggara);
                    });
            });
        });
    </script>
@endsection

@section('side-content')

    <h3 class="page-heading mb-4">Form Mata Kuliah Pilihan</h3>
    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Data Mata Kuliah Pilihan</h5>
                    <form class="forms-sample" action="{{route('mataKuliah.pilihan.store')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleS1">Kode MK Pilihan</label>
                            <select class="form-control" name="kode" id="mkpilihan">
                                <option value="">Pilih Kode MK</option>
                                @foreach($matakuliahs as $mk)
                                    <option value="{{ $mk->kode_mk }}">{{ $mk->kode_mk }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleNama">Nama Mata Kuliah</label>
                            <input style="display: none" type="text" class="form-control p-input" name="nama" id="Nama" placeholder="Mata Kuliah">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Semester</label>
                            <input style="display: none" type="number" class="form-control p-input" name="semester" id="Semester" placeholder="Semester">
                        </div>
                        <div class="form-group">
                            <label for="bobotSks">Bobot sks</label>
                            <input style="display: none" type="number" class="form-control p-input" name="bobotSKS" id="BobotSKS" placeholder="Bobot sks">
                        </div>
                        <div class="form-group">
                            <label for="unitPenyelenggara">Unit/Jur/Fak Penyelenggara</label>
                            <input style="display: none" type="text" class="form-control p-input" name="penyelenggara" id="Penyelenggara" placeholder="Unit Penyelenggara">
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