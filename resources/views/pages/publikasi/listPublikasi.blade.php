@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
    <div>
        <div class="card" style="overflow-x: scroll;white-space: nowrap;">
            <div class="card-body" style=" display: inline-block;">
                <h5 class="card-title mb-4">List Publikasi</h5>
                <table class="table table-hover">
                    <tbody>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Nama-nama Dosen</th>
                    <th>Dipublikasikan Pada</th>
                    <th>Tahun Publikasi</th>
                    <th>Nama Lembaga Sitasi</th>
                    <th>Tingkat</th>
                    <!-- Data -->
                    @php($k=1)
                    @foreach($publikasis as $publikasi)
                        <tr>
                            <td>{{ $k }}</td>
                            <td>{{ $publikasi->judul}}</td>
                            <td>@foreach($publikasi->dosen as $dosen)
                                    <li class="list-group-item">{{$dosen->nama}}</li>
                                @endforeach
                            </td>
                            <td>{{ $publikasi->tempat_publikasi }}</td>
                            <td>{{ $publikasi->tahun }}</td>
                            <td>{{ $publikasi->lembaga_sitasi }}</td>
                            <td>{{ $publikasi->tingkat->nama }}</td>
                        </tr>
                        @php($k++)
                    @endforeach
                    <tr>
                        <td style="font-weight: bold">Total Tingkat Lokal : {{ $tingkat[0] }}</td>
                    </tr>
                    <tr> <td style="font-weight: bold">Total Tingkat Nasional : {{ $tingkat[1] }}</td> </tr>
                    <tr> <td style="font-weight: bold">Total Tingkat Internasional : {{ $tingkat[2] }}</td> </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


