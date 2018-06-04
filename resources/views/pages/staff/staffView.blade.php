@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
    <div>
        <div class="card" style="overflow-x: scroll;white-space: nowrap;">
            <div class="card-body" style=" display: inline-block;">
                <h5 class="card-title mb-4">Struktur Kurikulum</h5>
                @if (session('status'))
                    <div class="alert alert-warning">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table table-hover">
                    <tr>
                        <th rowspan="2" style="text-align: center">Jenis Tenaga</th>
                        <th colspan="8" style="text-align: center">Jumlah Tenaga Kependidikan dengan</th>
                        <th rowspan="2" style="text-align: center">Unit Kerja</th>
                        <th rowspan="2" style="text-align: center">Aksi</th>
                    </tr>
                    <tr>
                        <th style="text-align: center">S3</th>
                        <th style="text-align: center">S2</th>
                        <th style="text-align: center">S1</th>
                        <th style="text-align: center">D4</th>
                        <th style="text-align: center">D3</th>
                        <th style="text-align: center">D2</th>
                        <th style="text-align: center">D1</th>
                        <th style="text-align: center">SMA/SMK</th>
                    </tr>
                    @foreach($staffs as $staff)
                        <tr>
                            <td style="text-align: center">{!! $staff->jenisStaff->jenis !!}</td>
                            <td style="text-align: center">{!! $staff->jumlah_s3 !!}</td>
                            <td style="text-align: center">{!! $staff->jumlah_s2 !!}</td>
                            <td style="text-align: center">{!! $staff->jumlah_s1 !!}</td>
                            <td style="text-align: center">{!! $staff->jumlah_d4 !!}</td>
                            <td style="text-align: center">{!! $staff->jumlah_d3 !!}</td>
                            <td style="text-align: center">{!! $staff->jumlah_d2 !!}</td>
                            <td style="text-align: center">{!! $staff->jumlah_d1 !!}</td>
                            <td style="text-align: center">{!! $staff->jumlah_sma !!}</td>
                            <td style="text-align: center">{!! $staff->unit_kerja !!}</td>

                            <td>
                                <form class="forms-sample" action="{{route('admin.staff.delete',['id'=>$staff->id])}}"  method="post">
                                    {{ csrf_field() }}
                                    <div class="btn-group">
                                        <a href="{{route('admin.staff.formUpdate',['id'=>$staff->id])}}" class="btn btn-default" style="margin: 0px"><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
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


