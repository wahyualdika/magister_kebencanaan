@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
    <div>
        <div class="card" style="overflow-x: scroll;white-space: nowrap;">
            <div class="card-body" style=" display: inline-block;">
                <h5 class="card-title mb-4">List Mahasiswa dan Lulusan 5 Tahun Terakhir</h5>

                <table class="table table-hover">
                    <tr>
                        <th rowspan="2" style="text-align: center">Jenis Kemampuan</th>
                        <th colspan="4" style="text-align: center">Tanggapan Pihak Pengguna(%)</th>
                        <th rowspan="2">Pemanfaatan Hasil Pelacakan</th>
                        <th rowspan="2" style="text-align: center">Aksi</th>
                    </tr>
                    <tr>
                        <th style="text-align: center">Sangat Baik</th>
                        <th style="text-align: center">Baik</th>
                        <th style="text-align: center">Cukup</th>
                        <th style="text-align: center">Kurang</th>

                    </tr>
                    @foreach($datas as $data)
                        <tr>
                            <td>{!! $data->jenisKemampuan->jenis_kemampuan !!}</td>
                            <td>{!! $data->sangat_baik !!}</td>
                            <td>{!! $data->baik !!}</td>
                            <td>{!! $data->cukup !!}</td>
                            <td>{!! $data->kurang !!}</td>
                            <td>{!! $data->pelacakan !!}</td>
                            <td>
                                <form class="forms-sample" action="{{route('evaluasi.lulusan.delete',['id'=>$data->id])}}"  method="post">
                                    {{ csrf_field() }}
                                    <div class="btn-group">
                                        <a href="{{route('evaluasi.lulusan.formUpdate',['id'=>$data->id])}}" class="btn btn-default" style="margin: 0px"><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
                                        <button class="btn btn-link" type="submit"><span class="fa fa-times-circle" style="font-size:24px;margin: 10px"></span></button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <table class="table table-hover">
                    <tr>
                        <td colspan="2" style="text-align: center">Total</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                    </tr>
                </table>

                @if($datas->isEmpty())
                    <p>Rata-rata waktu tunggu lulusan mendapatkan pekerjaan pertama = 0 </p>
                    <p>Persentase lulusan yang bekerja pada bidang sesuai keahliannya = 0 </p>
                @else
                    <p>Rata-rata waktu tunggu lulusan mendapatkan pekerjaan pertama = {!! $datalanjutans->waktu_tunggu !!}</p>
                    <p>Persentase lulusan yang bekerja pada bidang sesuai keahliannya = {!! $datalanjutans->persentase !!} </p>
                @endif
            </div>
        </div>
    </div>
@endsection
