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
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        $( function() {
            $( "#datepicker" ).datepicker({
                dateFormat: "dd/mm/yy"
            });
        } );
    </script>
@endsection

@section('side-content')

    <h3 class="page-heading mb-4">Form Update Mahasiswa Dan Lulusan</h3>
    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Data Mahasiswa Dan Lulusan</h5>
                    <form class="forms-sample" action="{{ route('mahasiswa.lulusan.update',['id'=>$data->id]) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group"><label for="exampleS1">Tahun Akademik</label>
                            <select class="select2-multi form-control" name="tahunAkademik">
                                    <option value="{{$data->tahun_akademik}}">{{$data->tahun_akademik}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleNama">Daya Tampung</label>
                            <input type="number" class="form-control p-input" value="{{$data->daya_tampung}}" name="dayaTampung" id="DayaTampung" placeholder="Daya Tampung">
                        </div>
                        <div class="form-group"><label for="exampleS1">Jumlah Calon Mahasiswa</label>
                            <div class="form-group">
                                <label for="exampleNIP">Ikut Seleksi</label>
                                <input type="number" class="form-control p-input" value="{{$data->ikut_seleksi}}" name="ikutSeleksi" id="IkutSeleksi" placeholder="Ikut Seleksi">
                                <label for="exampleNIP">Lulus Seleksi</label>
                                <input type="number" class="form-control p-input" value="{{$data->lulus_seleksi}}" name="lulusSeleksi" id="LulusSeleksi" placeholder="Lulus Seleksi">
                            </div>
                        </div>
                        <div class="form-group"><label for="exampleS1">Jumlah Mahasiswa Baru</label>
                            <div class="form-group">
                                <label for="exampleNIP">Bukan Transfer</label>
                                <input type="number" class="form-control p-input" value="{{$data->mhsbr_bukan_transfer}}" name="bukanTransfer" placeholder="Bukan Transfer">
                                <label for="exampleNIP">Transfer</label>
                                <input type="number" class="form-control p-input" value="{{$data->mhsbr_transfer}}" name="transfer" placeholder="Transfer">
                            </div>
                        </div>
                        <div class="form-group"><label for="exampleS1">Jumlah Total Mahasiswa</label>
                            <div class="form-group">
                                <label for="exampleNIP">Total Mahasiswa Bukan Transfer</label>
                                <input type="number" class="form-control p-input" value="{{$data->total_mhs_bknTransfer }}" name="totalBknTransfer" placeholder="Bukan Transfer">
                                <label for="exampleNIP">Total Mahasiswa Transfer</label>
                                <input type="number" class="form-control p-input" value="{{$data->total_mhs_transfer }}" name="totalTransfer" placeholder="Transfer">
                            </div>
                        </div>
                        <div class="form-group"><label for="exampleS1">Jumlah Lulusan</label>
                            <div class="form-group">
                                <label for="exampleNIP">Lulusan Bukan Transfer</label>
                                <input type="number" class="form-control p-input" value="{{$data->lulusan_bkn_transfer}}" name="lulusBknTransfer" placeholder="Bukan Transfer">
                                <label for="exampleNIP">Lulusan Transfer</label>
                                <input type="number" class="form-control p-input" value="{{$data->lulusan_transfer}}" name="lulusTransfer" placeholder="Transfer">
                            </div>
                        </div>
                        <div class="form-group"><label for="exampleS1">IPK Lulusan Reguler</label>
                            <div class="form-group">
                                <label for="exampleNIP">Minimum</label>
                                <input type="number" step="any" class="form-control p-input" value="{{$data->ipk_reg_min}}" name="ipkmin" placeholder="Minimum">
                                <label for="exampleNIP">Rata-Rata</label>
                                <input type="number" step="any" class="form-control p-input" value="{{$data->ipk_reg_rat}}" name="ipkrat" placeholder="Rata-Rata">
                                <label for="exampleNIP">Maksimum</label>
                                <input type="number" step="any" class="form-control p-input" value="{{$data->ipk_reg_mak}}" name="ipkmak" placeholder="Maksimum">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleNama">Jumlah Mahasiswa WNA</label>
                            <input type="number" class="form-control p-input" value="{{$data->jumlah_mahasiswa_wna}}" name="jumlahWNA" placeholder="Jumlah Mahasiswa Asing">
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