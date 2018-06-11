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
                    <form class="forms-sample" action="{{route('admin.aksesibilitasData.store')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleS1">Jenis Pustaka</label>
                            <select class="form-control" name="jenis" required>
                                <option value="">Jenis</option>
                                @foreach($jenisdatas as $jenisdata)
                                    <option value="{{ $jenisdata->id }}">{{ $jenisdata->jenis }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group" id="checkbox-group"><label for="exampleS1">Sistem Pengolahan</label>
                            <div class="form-check">
                                <label>
                                    <input type="checkbox" class="form-check-input" name="manual" value="1">
                                    Manual
                                </label>
                            </div>
                            <div class="form-check">
                                <label>
                                    <input type="checkbox" class="form-check-input" name="komputer" value="2">
                                    Dengan Komputer Tanpa Jaringan
                                </label>
                            </div>
                            <div class="form-check">
                                <label>
                                    <input type="checkbox" class="form-check-input" name="lan" value="3">
                                    Dengan Komputer Jaringan Lokal(LAN)
                                </label>
                            </div>
                            <div class="form-check">
                                <label>
                                    <input type="checkbox" class="form-check-input" name="wan" value="4">
                                    Dengan Komputer Jaringan Luas (WAN)
                                </label>
                            </div>
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