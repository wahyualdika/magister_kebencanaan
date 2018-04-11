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

    <h3 class="page-heading mb-4">Form Input Dosen</h3>
    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Pengalaman Dosen Tetap</h5>
                    <form class="forms-sample" action="{{route('admin.pengalaman.store')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleS1">Nama Dosen</label>
                            <select class="select2-multi form-control" name="nama">
                                <option value="">Pilih Nama Dosen Tetap</option>
                                @foreach($datas as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Nama Lembaga</label>
                            <input type="text" class="form-control p-input" name="lembaga" id="Lembaga" placeholder="Nama Lembaga">
                        </div>
                        <div class="form-group"><label for="exampleNIP">Kurun Waktu</label>
                        <div class="form-group">
                            <label for="exampleNIP">Tahun Awal</label>
                            <input type="text" class="form-control p-input" name="tahunAwal" id="Tahun Awal" placeholder="Tahun Awal">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Tahun Akhir</label>
                            <input type="text" class="form-control p-input" name="tahunAkhir" id="Tahun Akhir" placeholder="Tahun Akhir">
                        </div>
                        </div>
                        <div class="form-group"><label for="exampleS1">Tingkat</label>
                            <select class="select2-multi form-control" name="tingkat">
                                <option value="" disabled="disabled">Pilih Tingkat</option>
                                @foreach($tingkats as $tingkat)
                                    <option value="{{$tingkat->id}}">{{$tingkat->nama}}</option>
                                @endforeach
                            </select>
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