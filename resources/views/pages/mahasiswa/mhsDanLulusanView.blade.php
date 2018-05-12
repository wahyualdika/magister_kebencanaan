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
                        <th style="text-align: center" rowspan="2">Aksi</th>
                        <th rowspan="2">Tahun Akademik</th>
                        <th rowspan="2">Daya Tampung</th>
                        <th colspan="2" style="text-align: center">Jumlah Calon Mahasiswa</th>
                        <th colspan="2" style="text-align: center">Jumlah Mahasiswa Baru</th>
                        <th colspan="2" style="text-align: center">Jumlah Total Mahasiswa</th>
                        <th colspan="2" style="text-align: center">Jumlah Lulusan</th>
                        <th colspan="3" style="text-align: center">IPK Lulusan Reguler</th>
                        <th colspan="3" style="text-align: center">Jumlah Mahasiswa WNA</th>
                    </tr>
                    <tr>
                        <th style="text-align: center">Ikut Seleksi</th>
                        <th style="text-align: center">Lulus Seleksi</th>
                        <th style="text-align: center">Bukan Transfer</th>
                        <th style="text-align: center">Transfer</th>
                        <th style="text-align: center">Bukan Transfer</th>
                        <th style="text-align: center">Transfer</th>
                        <th style="text-align: center">Bukan Transfer</th>
                        <th style="text-align: center">Transfer</th>
                        <th style="text-align: center">Min</th>
                        <th style="text-align: center">Rat</th>
                        <th style="text-align: center">Mak</th>
                    </tr>
                    @foreach($datas as $data)
                        <tr>
                            <td>
                                <form class="forms-sample" action="{{route('mahasiswa.lulusan.delete',['id'=>$data->id])}}"  method="post">
                                    {{ csrf_field() }}
                                    <div class="btn-group">
                                        <a href="{{route('mahasiswa.lulusan.formUpdate',['id'=>$data->id])}}" class="btn btn-default" style="margin: 0px"><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
                                        <button class="btn btn-link" type="submit"><span class="fa fa-times-circle" style="font-size:24px;margin: 10px"></span></button>
                                    </div>
                                </form>
                            </td>
                            <td>
                                {!! $data->tahun_akademik !!}
                            </td>
                            <td>
                                {!! $data->daya_tampung !!}
                            </td>
                            <td>
                                {!! $data->ikut_seleksi !!}
                            </td>
                            <td>{!! $data->lulus_seleksi !!}</td>
                            <td>{!! $data->mhsbr_bukan_transfer !!}</td>
                            <td>{!! $data->mhsbr_transfer !!}</td>
                            <td>{!! $data->total_mhs_bknTransfer !!}</td>
                            <td>{!! $data->total_mhs_transfer !!}</td>
                            <td>{!! $data->lulusan_transfer !!}</td>
                            <td>{!! $data->lulusan_bkn_transfer !!}</td>
                            <td>{!! $data->ipk_reg_min !!}</td>
                            <td>{!! $data->ipk_reg_rat !!}</td>
                            <td>{!! $data->ipk_reg_mak !!}</td>
                            <td>{!! $data->jumlah_mahasiswa_wna !!}</td>
                        </tr>
                    @endforeach
                </table>
                <table class="table table-hover">
                    <tr>
                        <th>Total</th>
                        <th></th>
                        <th></th>
                        <th colspan="2"></th>
                        @foreach($jumlahs as $jumlah)
                            <th style="text-align: center">{!! $jumlah !!}</th>
                        @endforeach
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection


