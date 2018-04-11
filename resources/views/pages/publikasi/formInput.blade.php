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

    <h3 class="page-heading mb-4">Form Input Publikasi</h3>
    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Publikasi Dosen Tetap</h5>
                    <form class="forms-sample" action="{{route('admin.publikasi.storePublikasi')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleNIP">Judul</label>
                            <input type="text" class="form-control p-input" name="judul" id="Judul" placeholder="Judul">
                        </div>
                        <div class="form-group">
                            <label for="exampleS1">Nama Dosen</label>
                            <select class="select2-multi form-control" name="nama[]" multiple="multiple">
                                <option value="">Nama-nama Dosen</option>
                                @foreach($dosens as $dosen)
                                    <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tempatPublikasi">Dipublikasikan Pada</label>
                            <input type="text" class="form-control p-input" name="tempatPublikasi" id="Tempat" placeholder="Dipublikasikan Pada">
                        </div>
                        <div class="form-group">
                           <label for="exampleNIP">Tahun Publikasi</label>
                           <input type="text" class="form-control p-input" name="tahunPublikasi" id="tahun" placeholder="Tahun Publikasi">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Nama Lembaga Sitasi</label>
                            <input type="text" class="form-control p-input" name="lembagaSitasi" id="lembaga" placeholder="Lembaga Sitasi">
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