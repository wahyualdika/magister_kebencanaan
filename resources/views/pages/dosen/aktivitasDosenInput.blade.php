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

    <h3 class="page-heading mb-4">Form Input Aktifitas Dosen</h3>
    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Data Dosen</h5>
                    <form class="forms-sample" action="{{route('admin.dosen.aktivitasStore')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleS1">Nama Dosen</label>
                            <select class="select2-multi form-control" name="nama">
                                <option value="" disabled="disabled">Pilih Nama Dosen</option>
                                @foreach($dosens as $dosen)
                                    <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label >SKS PS Sendiri</label>
                            <input type="number" class="form-control p-input" name="pengajaranPsSendiri" placeholder="SKS PS Sendiri">
                        </div>
                        <div class="form-group">
                            <label>SKS PS Lain, PT Sendiri</label>
                            <input type="number" class="form-control p-input" name="pengajaranPsLain" placeholder="SKS PS Lain">
                        </div>
                        <div class="form-group">
                            <label>SKS PS Lain, PT Sendiri</label>
                            <input type="number" class="form-control p-input" name="pengajaranPtLain" placeholder="SKS PS Lain">
                        </div>
                        <div class="form-group">
                            <label>SKS Penelitian Dosen</label>
                            <input type="number" class="form-control p-input" name="sksPenelitian" placeholder="SKS Penelitian">
                        </div>
                        <div class="form-group">
                            <label>SKS Pengabdian Dosen</label>
                            <input type="number" class="form-control p-input" name="sksPengabdian" placeholder="SKS Pengabdian">
                        </div>
                        <div class="form-group">
                            <label>SKS Manajemen PT Sendiri</label>
                            <input type="number" class="form-control p-input" name="manajemenPtSendiri" placeholder="Manajemene PT Sendiri">
                        </div>
                        <div class="form-group">
                            <label>SKS Manajemen PT Lain</label>
                            <input type="number" class="form-control p-input" name="manajemenPtLain" placeholder="Manajemene PT Lain">
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
