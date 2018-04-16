@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
    <div>
        <div class="card" style="overflow-x: scroll;white-space: nowrap;">
            <div class="card-body" style=" display: inline-block;">
                <h5 class="card-title mb-4">List Penelitian</h5>
                <table class="table table-hover">
                    <tbody>
                    <th>Tahun</th>
                    <th>Judul Penelitian</th>
                    <th>Nama Dosen Yang Terlibat</th>
                    <th>Sumber Dan Jenis Dana</th>
                    <th>Jumlah Dana</th>
                    <!-- Data -->
                    @php($k=0)
                    @php($total=0)
                    @foreach($penelitians as $penelitian)

                        <tr>
                            <td>{{ $penelitian->tahun_penelitian}}</td>
                            <td>{{ $penelitian->judul }}</td>
                            <td>@foreach($penelitian->dosen as $dosen)
                                    <li class="list-group-item">{{$dosen->nama}}</li>
                            @endforeach
                            <td>{{ $penelitian->sumberDana->nama_sumber}}</td>
                            <td>{{ $penelitian->jumlah_dana }}</td>

                        </tr>
                        @php($k++)
                        @php($total += $penelitian->jumlah_dana)
                    @endforeach
                    <tr>
                        <td colspan="4" style="font-weight: bold;text-align: center">Jumlah</td>
                        <td>{{$total}}</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="font-weight: bold;text-align: center">Rata-Rata per Tahun</td>
                        <td>{{$avg}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


