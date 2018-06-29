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

    <h3 class="page-heading mb-4">Form Input Kegiatan Dosen</h3>
    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Data Dosen</h5>
                    <form class="forms-sample" action="{{route('admin.seminar.store')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleNama">Nama Dosen</label>
                            <select class="select2-multi form-control" name="nama">
                                <option value="" disabled="disabled">Pilih Nama Dosen</option>
                                @foreach($datas as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleJenisKegiatan">Jenis Kegiatan</label>
                            <select class="select2-multi form-control" name="jenisKegiatan">
                                <option value="" disabled="disabled">Jenis Kegiatan</option>
                                @foreach($kegiatans as $kegiatan)
                                    <option value="{{ $kegiatan->id }}">{{ $kegiatan->jenis}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleTempat">Tempat</label>
                            <input type="text" class="form-control p-input" name="tempat" id="Tempat" placeholder="Tempat">
                        </div>
                        <div class="form-group">
                            <label for="exampleTahun">Tahun</label>
                            <input type="number" class="form-control p-input" name="tahun" id="Tahun" placeholder="Tahun">
                        </div>
                        <div class="form-group"><label for="sebagai">Sebagai</label>
                            <select class="select2-multi form-control" name="status">
                                <option value="" disabled="disabled">Pilih peran dalam seminar</option>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->status}}</option>
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
