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

    <h3 class="page-heading mb-4">Form Input Pustaka</h3>
    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Pustaka</h5>
                    <form class="forms-sample" action="{{route('admin.alokasiDana.store')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleS1">Sumber Dana</label>
                            <select class="form-control" name="sumberDana" required>
                                @foreach($sumberdanas as $sumberdana)
                                    <option value="{{ $sumberdana->id }}">{{ $sumberdana->nama_sumber }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleS1">Tahun Akademik</label>
                            <select class="form-control" name="tahun" required>
                                @foreach($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Jenis Dana</label>
                            <input type="text" class="form-control p-input" name="jenis" id="Jenis">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Dana</label>
                            <input type="number" class="form-control p-input" name="jumlah" id="Jumlah" required>
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
