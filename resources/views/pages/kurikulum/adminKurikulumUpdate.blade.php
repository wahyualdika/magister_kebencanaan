@extends('pages.master')

@section('stylesheet')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('script_bottom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript">
        $(".select2-multi").select2();
        $(".select2-multi-kelengkapan").select2().val({!! json_encode($kurikulum->kelengkapan()->allRelatedIds()) !!}).trigger('change');
    </script>
@endsection

@section('side-content')

    <h3 class="page-heading mb-4">Form Struktur Kurikulum</h3>
    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Data Struktur Kurikulum</h5>
                    <form class="forms-sample" action="{{route('mataKuliah.struktur.update',['id' => $kurikulum->id])}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleNama">Nama Mata Kuliah</label>
                            <input type="text" class="form-control p-input" name="nama" value="{{$kurikulum->nama_mk}}" id="Nama" aria-describedby="mataKuliah" placeholder="Mata Kuliah">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Semester</label>
                            <input type="number" class="form-control p-input" name="semester" value="{{$kurikulum->semester}}" id="Semester" placeholder="Semester">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Kode MK</label>
                            <input type="text" class="form-control p-input" name="kode" value="{{$kurikulum->kode_mk}}" id="Kode" placeholder="Kode MK">
                        </div>
                        <div class="form-group">
                            <label for="bobotSks">Bobot sks</label>
                            <input type="number" class="form-control p-input" name="bobotSKS" value="{{$kurikulum->bobot_sks}}" id="BobotSKS" placeholder="Bobot sks">
                        </div>
                        <div class="form-group">
                            <label for="bobotTugas">Bobot Tugas(%)</label>
                            <input type="number" class="form-control p-input" name="bobotTugas" value="{{$kurikulum->bobot_tugas}}" id="BobotTugas" placeholder="Bobot tugas">
                        </div>
                        <div class="form-group">
                            <label for="unitPenyelenggara">Unit/Jur/Fak Penyelenggara</label>
                            <input type="text" class="form-control p-input" name="penyelenggara" value="{{$kurikulum->unit_penyelenggara}}" id="Penyelenggara" placeholder="Unit Penyelenggara">
                        </div>
                        <div class="form-group"><label for="exampleS1">SKS MK dalam Kurikulum</label>
                            <div class="form-group">
                                <label for="inti">Inti</label>
                                <input type="number" class="form-control p-input" name="inti" value="{{$kurikulum->inti}}" id="Inti" placeholder="Inti">
                                <label for="intitusional">Institusional</label>
                                <input type="number" class="form-control p-input" name="institusional" value="{{$kurikulum->institusional}}" id="Institusional" placeholder="Institusional">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleS1">Kelengkapan</label>
                            <select class="select2-multi-kelengkapan form-control" name="kelengkapan[]" multiple="multiple">
                                <option value="">Kelengkapan</option>
                                @foreach($kelengkapans as $kelengkapan)
                                    <option value="{{ $kelengkapan->id }}">{{ $kelengkapan->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleS1">Status Mata Kuliah: </label>
                            @if($kurikulum->isPilihan == 1)
                                <span class="badge badge-success">MK pilihan</span>
                            @elseif($kurikulum->isPilihan == 0)
                                <span class="badge badge-danger">MK Utama</span>
                            @endif
                            <select class="select2-multi-kelengkapan form-control" name="pilihan">
                                    <option value="0">MK utama</option>
                                    <option value="1">MK pilihan</option>
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