@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
    <div>
        <div class="card" style="overflow-x: scroll;white-space: nowrap;">
            <div class="card-body" style=" display: inline-block;">
                <h5 class="card-title mb-4">List Mahasiswa dan Lulusan 5 Tahun Terakhir</h5>
                <table class="table table-hover">
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
                    {{--@foreach($datas as $data)

                        <tr>
                            <form class="forms-sample" action="{!! url('dosen/delete/'.$data->id) !!}"  method="post">
                                {{ csrf_field() }}
                                <td>
                                    <div class="btn-group">
                                        <a href="{!! url('dosen/'.$data->id.'/edit') !!}" class="btn btn-default" style="margin: 0px"><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
                                        <a href="#" class="btn btn-default" style="margin: 0px"><span class="fa fa-eye" style="font-size:24px;margin: 10px"></span></a>
                                        <button class="btn btn-link" type="submit"><span class="fa fa-times-circle" style="font-size:24px;margin: 10px"></span></button>
                                    </div>
                                </td>
                            </form>

                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->nidn}}</td>
                            <td>{{ $data->tanggal_lahir }}</td>
                            <td>{{ $data->jabatanAkademik->nama}}</td>

                            @if($data->sertifikasi === 1)
                                <td>Ada Sertifikasi</td>
                            @endif
                            @if($data->sertifikasi === 0)
                                <td>Tidak Ada Sertifikasi</td>
                            @endif

                            @if($data->status === 0)
                                <td>Tidak Tetap</td>
                            @endif
                            @if($data->status === 1)
                                <td>Tetap</td>
                            @endif
                            <td>
                                <table class="milestone-table">
                                    <tr>
                                        <td>{{ $data->gelar_akademik_s1 }}</td>
                                        <td>{{ $data->asal_pt_s1 }}</td>
                                        <td>{{ $data->bidang_keahlian_s1 }}</td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <table class="milestone-table">
                                    <tr>
                                        <td>{{ $data->gelar_akademik_s2 }}</td>
                                        <td>{{ $data->asal_pt_s2 }}</td>
                                        <td>{{ $data->bidang_keahlian_s2 }}</td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <table class="milestone-table">
                                    <tr>
                                        <td>{{ $data->gelar_akademik_s3 }}</td>
                                        <td>{{ $data->asal_pt_s3 }}</td>
                                        <td>{{ $data->bidang_keahlian_s3 }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        @endforeach--}}
                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


