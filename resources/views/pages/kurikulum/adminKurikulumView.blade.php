@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
    <div>
        <div class="card" style="overflow-x: scroll;white-space: nowrap;">
            <div class="card-body" style=" display: inline-block;">
                <h5 class="card-title mb-4">Struktur Kurikulum</h5>

                <table class="table table-hover">
                    <tr>
                        <th rowspan="2" style="text-align: center">Kode MK</th>
                        <th rowspan="2" style="text-align: center">Semester</th>
                        <th rowspan="2" style="text-align: center">Nama Mata Kuliah</th>
                        <th rowspan="2" style="text-align: center">Bobot SKS</th>
                        <th colspan="2" style="text-align: center">sks MK dalam kurikulum</th>
                        <th rowspan="2" style="text-align: center">Bobot Tugas</th>
                        <th rowspan="2" style="text-align: center">Kelengkapan</th>
                        <th rowspan="2" style="text-align: center">Unit/Jur/Fakultas Penyelenggara</th>
                        <th rowspan="2" style="text-align: center">Aksi</th>
                    </tr>
                    <tr>
                        <th style="text-align: center">Inti</th>
                        <th style="text-align: center">Intitusional</th>
                    </tr>
                    @foreach($kurikulums as $kurikulum)
                        <tr>
                            <td style="text-align: center">{!! $kurikulum->kode_mk !!}</td>
                            <td style="text-align: center">{!! $kurikulum->semester !!}</td>
                            <td style="text-align: center">{!! $kurikulum->nama_mk !!}</td>
                            <td style="text-align: center">{!! $kurikulum->bobot_sks !!}</td>
                            <td style="text-align: center">{!! $kurikulum->inti !!}</td>
                            <td style="text-align: center">{!! $kurikulum->institusional !!}</td>
                            <td style="text-align: center">{!! $kurikulum->bobot_tugas !!}</td>
                            <td style="text-align: center">
                                @foreach($kurikulum->kelengkapan as $kelengkapan)
                                    <span class="badge badge-success">{!! $kelengkapan->nama !!}</span>
                                @endforeach
                            </td>
                            <td style="text-align: center">{!! $kurikulum->unit_penyelenggara !!}</td>
                             <td>
                                <form class="forms-sample" action="{{route('mataKuliah.struktur.delete',['id'=>$kurikulum->id])}}"  method="post">
                                    {{ csrf_field() }}
                                    <div class="btn-group">
                                        <a href="{{route('mataKuliah.struktur.formUpdate',['id'=>$kurikulum->id])}}" class="btn btn-default" style="margin: 0px"><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
                                        <button class="btn btn-link" type="submit"><span class="fa fa-times-circle" style="font-size:24px;margin: 10px"></span></button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection


