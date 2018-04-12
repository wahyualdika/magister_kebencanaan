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
                    <form class="forms-sample" action="{{route('admin.penelitian.storeBimbingan')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleS1">Nama Dosen Pembimbing</label>
                            <select class="select2-multi form-control" name="nama">
                                <option value="{{$datas->dosen->id}}">{{$datas->dosen->nama}}</option>
                                @foreach($dosens as $dosen)
                                    <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan Tertinggi</label>
                            <select class="form-control" name="pendidikan">
                                <option value="{{$datas->pendidikan_tertinggi}}">{{$datas->pendidikan_tertinggi}}</option>
                                @for ($i = 1; $i < 4; $i++)
                                    <option value="{{$i}}">S{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Jabatan Akademik</label>
                            <input type="text" class="form-control p-input" value="{{$datas->jabatan_akademik}}" name="jabatan" id="jabatan" placeholder="Jabatan Akademik">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Banyak Mahasiswa Dibimbing Sebagai Ketua</label>
                            <select class="form-control" name="jumlahMahasiswaKT">
                                <option value="{{$datas->pembimbing_sbg_ketua}}">{{$datas->pembimbing_sbg_ketua}}</option>
                                @for ($i = 0; $i < 100; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Banyak Mahasiswa Dibimbing Sebagai Anggota</label>
                            <select class="form-control" name="jumlahMahasiswaAG">
                                <option value="{{$datas->pembimbing_sbg_anggota}}">{{$datas->pembimbing_sbg_anggota}}</option>
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