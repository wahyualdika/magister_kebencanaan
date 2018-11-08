@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
    <div>
    <div class="card" style="overflow-x: scroll;white-space: nowrap;">
        <div class="card-body" style=" display: inline-block;">
            <h5 class="card-title mb-4">List Dosen</h5>
            <table class="table table-hover">
                <tbody>
                    <th>Nama</th>
                    <th>NIDN</th>
                    <th>Tanggal Lahir</th>
                    <th>Jabatan Akedemik</th>
                    <th>Sertifikasi</th>
                    <th>Status</th>
                <th style="text-align: center"> S1
                    <table class="milestone-table">
                        <tr>
                            <td>Gelar</td>
                            <td>Asal PT</td>
                            <td>Bidang</td>
                        </tr>
                    </table>
                </th>
                <th style="text-align: center"> S2
                    <table class="milestone-table">
                        <tr>
                            <td>Gelar</td>
                            <td>Asal PT</td>
                            <td>Bidang</td>
                        </tr>
                    </table>
                </th>
                <th style="text-align: center"> S3
                    <table class="milestone-table">
                        <tr>
                            <td>Gelar</td>
                            <td>Asal PT</td>
                            <td>Bidang</td>
                        </tr>
                    </table>
                </th>
                <th style="text-align: center">Aksi</th>
                    <!-- Data -->
                @foreach($datas as $data)
                <tbody>
                <tr>
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
                    <form class="forms-sample" action="{!! url('dosen/delete/'.$data->id) !!}"  method="post">
                        {{ csrf_field() }}
                        <td>
                            <div class="btn-group">
                                <a href="{!! url('dosen/'.$data->id.'/edit') !!}" class="btn btn-default" style="margin: 0px"><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
                                <a href="{!! url('dosen/detail/'.$data->id) !!}" class="btn btn-default" style="margin: 0px"><span class="fa fa-eye" style="font-size:24px;margin: 10px"></span></a>
                                <button class="btn btn-link" type="submit"><span class="fa fa-times-circle" style="font-size:24px;margin: 10px"></span></button>
                            </div>
                        </td>
                    </form>
                </tr>
                </tbody>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination">
          {{ $datas->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
    </div>
@endsection
