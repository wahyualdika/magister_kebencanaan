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

    <h3 class="page-heading mb-4">Form Input Penelitian</h3>
    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Penelitian Dosen</h5>
                    <form class="forms-sample" action="{{route('admin.penelitian.storePenelitian')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleNIP">Judul Penelitian</label>
                            <input type="text" class="form-control p-input" name="judul" id="Judul" placeholder="Judul">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Tahun Penelitian</label>
                            <input type="text" class="form-control p-input" name="tahunPenelitian" id="tahun" placeholder="Tahun Penelitian">
                        </div>
                        <div class="form-group">
                            <label for="exampleS1">Nama Dosen Terlibat</label>
                            <select class="select2-multi form-control" name="nama[]" multiple="multiple">
                                <option value="">Nama-nama Dosen</option>
                                @foreach($dosens as $dosen)
                                    <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleS1">Sumber dan Jenis Dana</label>
                            <select class="select2-multi form-control" name="sumberDana">
                                <option value="">Sumber Dana</option>
                                 @foreach($sdanas as $sdana)
                                     <option value="{{ $sdana->id }}">{{ $sdana->nama_sumber }}</option>
                                 @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Jumlah Dana</label>
                            <input type="text" class="form-control p-input" name="jumlahDana" id="tahun" placeholder="Jumlah Dana">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Mahasiswa Terlibat</label>
                            <select class="form-control" name="jumlahMahasiswa">
                                <option value="">Jumlah Mahasiswa</option>
                                @for ($i = 0; $i < 100; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
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