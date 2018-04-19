@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
    <div>
        <div class="card" style="overflow-x: scroll;white-space: nowrap;">
            <div class="card-body" style=" display: inline-block;">
                <h5 class="card-title mb-4">Penelitian Tesis</h5>
                <table class="table table-hover">
                    <tbody>
                    <th>No</th>
                    <th>Nama Dosen</th>
                    <th>Topik Penelitian</th>
                    <th>Jumlah Mahasiswa yang Terlibat</th>
                    <!-- Data -->
                    @php($k=1)
                    @php($terlibat = 0)
                    @php($tkterlibat = 0)
                    @php($total = 0)
                    @foreach($datas as $data)

                        <tr>
                            <td>{{ $k }}</td>
                            <td>@foreach($data->dosen as $dosen)
                                    <li class="list-group-item">{{$dosen->nama}}</li>
                                @endforeach
                            </td>
                            <td>{{ $data->judul}}</td>
                            <td>{{ $data->jumlah_mahasiswa }}</td>
                        </tr>
                        @php($k++)
                        @php($terlibat += $data->mhs_terkait)
                        @php($tkterlibat += $data->mhs_tdk_terkait)
                    @endforeach
                    <tr>
                        <td>Total Mahasiswa Terkait Tesisnya Dengan Penelitian Dosen: {{ $terlibat }}</td>
                    </tr>
                    <tr>
                        <td>Total Mahasiswa Tidak Terkait Tesisnya Dengan Penelitian Dosen: {{ $tkterlibat }}</td>
                    </tr>
                    <tr>
                        <td>#</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


