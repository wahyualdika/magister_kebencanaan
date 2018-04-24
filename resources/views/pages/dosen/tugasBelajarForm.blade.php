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

    <h3 class="page-heading mb-4">Form Tugas Belajar Dosen</h3>
    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Tugas Belajar Dosen Tetap</h5>
                    <form class="forms-sample" action="{{route('admin.dosen.tugasBelajarStore')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleS1">Nama Dosen</label>
                            <select class="select2-multi form-control" name="nama">
                                <option value="">Pilih Nama Dosen Tetap</option>
                                @foreach($dosens as $dosen)
                                    <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleS1">Jenjang Pendidikan</label>
                            <select class="select2-multi form-control" name="jenjangPendidikan">
                                    <option value="" disabled="disabled">Jenjang Pendidikan</option>
                                @for ($i = 1; $i <= 3; $i++)
                                    <option value="{{$i}}">S{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                                <label for="exampleNIP">Bidang Studi</label>
                                <input type="text" class="form-control p-input" name="bidangStudi" placeholder="Bidang Studi">
                        </div>
                        <div class="form-group">
                                <label for="exampleNIP">Perguruan Tinggi</label>
                                <input type="text" class="form-control p-input" name="perguruanTinggi" placeholder="Perguruan Tinggi">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Tahun Mulai</label>
                            <input type="text" class="form-control p-input" name="tahun" placeholder="Tahun Mulai">
                        </div>
                        <div class="form-group"><label for="exampleS1">Negara</label>
                            <select class="select2-multi form-control" name="negara">
                                <option value="" disabled="disabled">Negara</option>
                                @foreach($negaras as $negara)
                                    <option value="{{$negara->country_name}}">{{$negara->country_name}}</option>
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