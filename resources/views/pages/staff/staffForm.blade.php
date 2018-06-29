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

    <h3 class="page-heading mb-4">Form Staff</h3>
    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Data Struktur Staff</h5>
                    <form class="forms-sample" action="{{route('admin.staff.store')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleS1">Jenis Staff</label>
                            <select class="form-control" name="jenisStaff" id="JenisStaff" required>
                                @foreach($jenisstaffs as $jenisstaff)
                                    <option value="{{$jenisstaff->id}}">{{$jenisstaff->jenis}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">S1</label>
                            <input type="number" class="form-control p-input" name="s1" id="S1" placeholder="Banyaknya S1">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">S2</label>
                            <input type="text" class="form-control p-input" name="s2" id="S2" placeholder="Banyaknya S2">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">S3</label>
                            <input type="number" class="form-control p-input" name="s3" id="S3" placeholder="Banyaknya S3">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">D4</label>
                            <input type="number" class="form-control p-input" name="d4" id="D4" placeholder="Banyaknya D4">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">D3</label>
                            <input type="number" class="form-control p-input" name="d3" id="D3" placeholder="Banyaknya D3">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">D2</label>
                            <input type="number" class="form-control p-input" name="d2" id="D2" placeholder="Banyaknya D2">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">D1</label>
                            <input type="number" class="form-control p-input" name="d1" id="D1" placeholder="Banyaknya D1">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">SMA/SMK</label>
                            <input type="number" class="form-control p-input" name="sma" id="SMA" placeholder="Banyaknya SMA/SMK">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Unit Kerja</label>
                            <input type="text" class="form-control p-input" name="unitKerja" id="UnitKerja" placeholder="Unit Kerja">
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
