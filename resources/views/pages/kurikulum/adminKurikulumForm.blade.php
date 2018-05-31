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

    <h3 class="page-heading mb-4">Form Struktur Kurikulum</h3>
    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Data Struktur Kurikulum</h5>
                    <form class="forms-sample" action="{{route('mataKuliah.struktur.store')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleNama">Nama Mata Kuliah</label>
                            <input type="text" class="form-control p-input" name="nama" id="Nama" aria-describedby="mataKuliah" placeholder="Mata Kuliah">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Semester</label>
                            <input type="number" class="form-control p-input" name="semester" id="Semester" placeholder="Semester">
                        </div>
                        <div class="form-group">
                            <label for="exampleNIP">Kode MK</label>
                            <input type="text" class="form-control p-input" name="kode" id="Kode" placeholder="Kode MK">
                        </div>
                        <div class="form-group">
                            <label for="bobotSks">Bobot sks</label>
                            <input type="number" class="form-control p-input" name="bobotSKS" id="BobotSKS" placeholder="Bobot sks">
                        </div>
                        <div class="form-group">
                            <label for="bobotTugas">Bobot Tugas(%)</label>
                            <input type="number" class="form-control p-input" name="bobotTugas" id="BobotTugas" placeholder="Bobot tugas">
                        </div>
                        <div class="form-group">
                            <label for="unitPenyelenggara">Unit/Jur/Fak Penyelenggara</label>
                            <input type="text" class="form-control p-input" name="penyelenggara" id="Penyelenggara" placeholder="Unit Penyelenggara">
                        </div>
                        <div class="form-group"><label for="exampleS1">SKS MK dalam Kurikulum</label>
                            <div class="form-group">
                                <label for="inti">Inti</label>
                                <input type="number" class="form-control p-input" name="inti" id="Inti" placeholder="Inti">
                                <label for="intitusional">Institusional</label>
                                <input type="number" class="form-control p-input" name="institusional" id="Institusional" placeholder="Institusional">
                            </div>
                        </div>
                        <div class="form-group"><label for="exampleS1">Kelengkapan MT kuliah</label>
                            <div class="form-check">
                                <label>
                                    <input type="checkbox" class="form-check-input" name="deskripsi" value="1">
                                   Diskripsi
                                </label>
                            </div>
                            <div class="form-check">
                                <label>
                                    <input type="checkbox" class="form-check-input" name="silabus" value="2">
                                    Silabus
                                </label>
                            </div>
                            <div class="form-check">
                                <label>
                                    <input type="checkbox" class="form-check-input" name="sap" value="3">
                                    SAP
                                </label>
                            </div>
                        </div>
                        <div class="form-group"><label for="exampleS1">Berikan tanda centang bila MK pilihan</label>
                            <div class="form-check">
                                <label>
                                    <input type="checkbox" class="form-check-input" name="pilihan" value="1">
                                    Pilihan
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