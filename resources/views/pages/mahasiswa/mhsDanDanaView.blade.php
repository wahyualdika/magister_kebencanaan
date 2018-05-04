@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
    <div>
        <div class="card" style="overflow-x: scroll;white-space: nowrap;">
            <div class="card-body" style=" display: inline-block;">
                <h5 class="card-title mb-4">List Jumlah Mahasiswa dan Dana Operasional 3 Tahun Terakhir</h5>

                <table class="table table-hover">
                    <tr>
                        <th style="text-align: center">Aksi</th>
                        <th style="text-align: center">Tahun Akademik</th>
                        <th style="text-align: center">Jumlah Mahasiswa</th>
                        <th style="text-align: center">Jumlah Dana Operasional(Juta Rupiah)</th>
                    </tr>
                    @php
                    $jumlahMhs = 0;
                    $jumlahDana = 0;
                    @endphp
                    @foreach($datas as $data)
                        <tr>
                            <td>
                                <form class="forms-sample" action="{{route('mahasiswa.dana.delete',['id'=>$data->id])}}"  method="post">
                                    {{ csrf_field() }}
                                    <div class="btn-group">
                                        <a href="{{route('mahasiswa.dana.formUpdate',['id'=>$data->id])}}" class="btn btn-default" style="margin: 0px"><span class="fa fa-edit" style="font-size:24px;margin: 0px"></span></a>
                                        <button class="btn btn-link" type="submit"><span class="fa fa-times-circle" style="font-size:24px;margin: 0px"></span></button>
                                    </div>
                                </form>
                            </td>
                            <td style="text-align: center">{!! $data->tahun_akademik !!}</td>
                            <td style="text-align: center">{!! $data->jumlah_mahasiswa !!}</td>
                            @php $jumlahMhs+= $data->jumlah_mahasiswa @endphp
                            <td style="text-align: center">{!! $data->jumlah_dana !!}</td>
                            @php $jumlahDana+= $data->jumlah_dana @endphp
                        </tr>
                    @endforeach
                </table>
                <table>
                    <tr><td>Rata-rata dana operasional per mahasiswa per tahun = {!! round($jumlahDana/$jumlahMhs) !!}</td></tr>
                </table>
            </div>
        </div>
    </div>
@endsection


