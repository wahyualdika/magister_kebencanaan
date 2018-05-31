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
                        <th  style="text-align: center">Kode MK</th>
                        <th  style="text-align: center">Semester</th>
                        <th  style="text-align: center">Nama Mata Kuliah Pilihan</th>
                        <th  style="text-align: center">Bobot SKS</th>
                        <th  style="text-align: center">Unit/Jur/Fakultas Penyelenggara</th>
                        <th  style="text-align: center">Aksi</th>
                    </tr>
                    @foreach($mkpilihans as $mkpilihan)
                        <tr>
                            <td style="text-align: center">{!! $mkpilihan->kode_mk !!}</td>
                            <td style="text-align: center">{!! $mkpilihan->semester !!}</td>
                            <td style="text-align: center">{!! $mkpilihan->nama_mk !!}</td>
                            <td style="text-align: center">{!! $mkpilihan->bobot_sks !!}</td>
                            <td style="text-align: center">{!! $mkpilihan->unit_penyelenggara !!}</td>
                            <td>
                                <form class="forms-sample" action="{{--{{route('mataKuliah.struktur.delete',['id'=>$kurikulum->id])}}--}}"  method="post">
                                    {{--{{ csrf_field() }}--}}
                                    <div class="btn-group">
                                        <a href="{{route('mataKuliah.pilihan.formUpdate',['id'=>$mkpilihan->id])}}" class="btn btn-default" style="margin: 0px"><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
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


