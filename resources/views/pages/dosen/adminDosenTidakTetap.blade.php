@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
    <div>
        <div class="card" style="overflow-x: scroll;white-space: nowrap;">
            <div class="card-body" style=" display: inline-block;">
                <h5 class="card-title mb-4">List Dosen Tidak Tetap</h5>
                <table class="table table-hover">
                    <tbody>
                    <th>Nama</th>
                    <th>NIDN</th>
                    <th>Jabatan Akedemik</th>
                    <th>Sertifikasi</th>
                    <th>Pendidikan Terakhir</th>
                    <th>Bidang Keahlian</th>
                    <!-- Data -->
                    @foreach($datas as $data)
                        <tbody>
                        <tr>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->nidn}}</td>
                            <td>{{ $data->jabatan_akademik }}</td>
                            @if($data->sertifikasi === 1)
                                <td>Ada Sertifikasi</td>
                            @endif
                            @if($data->sertifikasi === 0)
                                <td>Tidak Ada Sertifikasi</td>
                            @endif

                            @if(isset($data->gelar_akademik_s3))
                                <td>S3</td>
                                <td>{{$data->bidang_keahlian_s3}}</td>
                            @elseif(isset($data->gelar_akademik_s2))
                                <td>S2</td>
                                <td>{{$data->bidang_keahlian_s2}}</td>
                            @elseif(isset($data->gelar_akademik_s1))
                                <td>S1</td>
                                <td>{{$data->bidang_keahlian_s1}}</td>
                            @endif

                        </tr>
                        </tbody>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


