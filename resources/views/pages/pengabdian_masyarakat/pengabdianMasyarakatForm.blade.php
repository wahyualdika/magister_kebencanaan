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

    <h3 class="page-heading mb-4">Form Input Pengabdian Masyarakat</h3>
    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Pengabdian Masyarakat</h5>
                    <form class="forms-sample" action="{{route('admin.pengabdian.store')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleNIP">Judul Pengabdian</label>
                            <input type="text" class="form-control p-input" name="judul" id="Judul">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Tahun</label>
                            <input type="number" class="form-control p-input" name="tahun" id="tahun">
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
                            <label for="exampleNIP">Jumlah Dana(Rp)</label>
                            <input type="number" class="form-control p-input" name="jumlahDana" id="JumlahDana">
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