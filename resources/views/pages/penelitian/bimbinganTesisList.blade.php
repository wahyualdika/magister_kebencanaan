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
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Nama Dosen Pembimbing Tesis</th>
                        <th rowspan="2">Pendidikan Tertinggi</th>
                        <th rowspan="2">Jabatan Akademik</th>
                        <th style="text-align: center" colspan="2"> Banyaknya Mahasiswa Yang Dibimbing dan Status Pembimbing</th>
                    </tr>
                    <tr>
                        <th>Ketua</th>
                        <th>Anggota</th>
                    </tr>
                    <!-- Data -->
                    @php($k=1)
                    @php($kt = 0)
                    @php($ag = 0)
                    @foreach($bimbingans as $bimbingan)
                        <tr>
                            <td>{{ $k }}</td>
                            <td>{{ $bimbingan->dosen->nama}}</td>
                            <td>S{{ $bimbingan->pendidikan_tertinggi}}</td>
                            <td>{{ $bimbingan->jabatan->nama }}</td>
                            <td>
                            <td>{{ $bimbingan->pembimbing_sbg_ketua }}</td>
                            <td>{{ $bimbingan->pembimbing_sbg_anggota }}</td>
                        </tr>
                        @php($k++)
                        @php($kt += $bimbingan->pembimbing_sbg_ketua)
                        @php($ag += $bimbingan->pembimbing_sbg_anggota)
                    @endforeach
                    </tbody>
                </table>
                <table>
                    <tbody>
                    <tr>
                        <td colspan="2" style="text-align: center">Total</td>
                        <td>Total Dosen S3 : {{$s3}} </td>
                        <td>Total Guru Besar : {{$guru}} , Total Lektor Kepala : {{$kepala}}</td>
                        <td>{{  $kt }}</td>
                        <td>{{  $ag }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


