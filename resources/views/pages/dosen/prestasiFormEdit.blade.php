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
                    <h5 class="card-title mb-4">Data Dosen</h5>
                    <form class="forms-sample" action="{{url('dosen/prestasi/update/'.$data->id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleS1">Nama Dosen</label>
                            <select class="select2-multi form-control" name="nama">
                                <option value="{{ $data->dosen->id }}">{{  $data->dosen->nama }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Prestasi Yang Dicapai</label>
                            <input type="text" class="form-control p-input" value="{{$data->nama_prestasi}}" name="prestasi" id="Prestasi" placeholder="Prestasi">
                        </div>
                        <div class="form-group">
                            <label for="exampleJabatanAkademik">Tahun Pencapaian</label>
                            <input type="text" class="form-control p-input" value="{{$data->tahun_pencapaian}}" name="tahunPencapaian" id="TahunPencapaian" placeholder="Tahun Pencapaian">
                        </div>
                        <div class="form-group"><label for="exampleS1">Tingkat</label>
                            <select class="select2-multi form-control" name="tingkat">
                                <option value="{{ $data->tingkat->id }}" disabled="disabled">{{ $data->tingkat->nama }}</option>
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