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
@endsection

@section('side-content')

    <h3 class="page-heading mb-4">Form Update Ruang Kerja</h3>
    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Ruang Kerja Dosen</h5>
                    <form class="forms-sample" action="{{route('admin.ruangKerja.update',['id'=>$rkerja->id])}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleS1">Tipe Ruang</label>
                            <select class="select2-multi form-control" name="tipe">
                                    <option value="{{ $rkerja->ruangTipe->id }}">{{ $rkerja->ruangTipe->tipe }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Jumlah Ruang</label>
                            <input type="number" class="form-control p-input" value="{!! $rkerja->jumlah_ruang !!}" name="jumlah" id="Jumlah">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Jumlah Luas(m2)</label>
                            <input type="number" class="form-control p-input" value="{!! $rkerja->luas !!}" name="luas" id="Luas">
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