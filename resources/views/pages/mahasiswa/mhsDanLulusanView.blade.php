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
                                <form class="forms-sample" action="#"  method="post">
                                    {{ csrf_field() }}
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-default" style="margin: 0px"><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
                                        <a href="#" class="btn btn-default" style="margin: 0px"><span class="fa fa-eye" style="font-size:24px;margin: 10px"></span></a>
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
                {{--<table class="table table-hover">
                    <tbody>
                    <th style="text-align: center">Aksi</th>
                    <th>Tahun Akademik</th>
                    <th>Daya Tampung</th>
                    <th style="text-align: center"> Jumlah Calon Mahasiswa
                        <table class="milestone-table">
                            <tr>
                                <td>Ikut Seleksi</td>
                                <td>Lulus Seleksi</td>
                            </tr>
                        </table>
                    </th>
                    <th style="text-align: center"> Jumlah Mahasiswa Baru
                        <table class="milestone-table">
                            <tr>
                                <td>Bukan Transfer</td>
                                <td>Transfer</td>
                            </tr>
                        </table>
                    </th>
                    <th style="text-align: center"> Jumlah Total Mahasiswa
                        <table class="milestone-table">
                            <tr>
                                <td>Bukan Transfer</td>
                                <td>Transfer</td>
                            </tr>
                        </table>
                    </th>
                    <th style="text-align: center"> Jumlah Lulusan
                        <table class="milestone-table">
                            <tr>
                                <td>Bukan Transfer</td>
                                <td>Transfer</td>
                            </tr>
                        </table>
                    </th>
                    <th style="text-align: center"> IPK Lulusan Reguler
                        <table class="milestone-table">
                            <tr>
                                <td>Min</td>
                                <td>Rat</td>
                                <td>Mak</td>
                            </tr>
                        </table>
                    </th>

                    <!-- Data -->
                    @foreach($datas as $data)

                        <tr>
                            <form class="forms-sample" action="#"  method="post">
                                {{ csrf_field() }}
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-default" style="margin: 0px"><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
                                        <a href="#" class="btn btn-default" style="margin: 0px"><span class="fa fa-eye" style="font-size:24px;margin: 10px"></span></a>
                                        <button class="btn btn-link" type="submit"><span class="fa fa-times-circle" style="font-size:24px;margin: 10px"></span></button>
                                    </div>
                                </td>
                            </form>

                            <td>{{ $data->tahun_akademik }}</td>
                            <td>{{ $data->daya_tampung}}</td>
                            <td>
                                --}}{{--<table class="milestone-table">--}}{{--
                                    <tr>
                                        <td>{{ $data->ikut_seleksi }}</td>
                                        <td>{{ $data->lulus_seleksi}}</td>
                                    </tr>
                                --}}{{--</table>--}}{{--
                            </td>

                            <td>
                                --}}{{--<table class="milestone-table">--}}{{--
                                    <tr>
                                        <td>{{ $data->gelar_akademik_s1 }}</td>
                                        <td>{{ $data->asal_pt_s1 }}</td>
                                    </tr>
                                --}}{{--</table>--}}{{--
                            </td>
                            <td>
                                --}}{{--<table class="milestone-table">--}}{{--
                                    <tr>
                                        <td>{{ $data->mhsbr_bukan_transfer }}</td>
                                        <td>{{ $data->mhsbr_transfer }}</td>
                                    </tr>
                                --}}{{--</table>--}}{{--
                            </td>
                            <td>
                                --}}{{--<table class="milestone-table">--}}{{--
                                    <tr>
                                        <td>{{ $data->total_mhs_bknTransfer }}</td>
                                        <td>{{ $data->total_mhs_transfer }}</td>
                                    </tr>
                                --}}{{--</table>--}}{{--
                            </td>
                            <td>
                                <table class="milestone-table">
                                    <tr>
                                        <td>{{ $data->lulusan_bkn_transfer }}</td>
                                        <td>{{ $data->lulusan_transfer }}</td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <table class="milestone-table">
                                    <tr>
                                        <td>{{ $data->ipk_reg_min }}</td>
                                        <td>{{ $data->ipk_reg_rat }}</td>
                                        <td>{{ $data->ipk_reg_mak }}</td>
                                    </tr>
                                </table>
                            </td>
                            <td>{{ $data->jumlah_mahasiswa_wna}}</td>
                        </tr>

                        @endforeach
                        </tbody>
                </table>--}}
            </div>
        </div>
    </div>
@endsection


