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
                    <th>Nama Dosen Pembimbing Tesis</th>
                    <th>Pendidikan Tertinggi</th>
                    <th>Jabatan Akademik</th>
                    <th style="text-align: center"> Banyaknya Mahasiswa Yang Dibimbing dan Status Pembimbing
                        <table class="milestone-table">
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Ketua</td>
                                <td></td>
                                <td></td>
                                <td>Anggota</td>
                            </tr>
                        </table>
                    </th>
                    <!-- Data -->
                    @php($k=1)
                    @php($kt = 0)
                    @php($ag = 0)
                    @foreach($bimbingans as $bimbingan)

                        <tr>
                            <td>{{ $k }}</td>
                            <td>{{ $bimbingan->dosen->nama}}</td>
                            <td>{{ $bimbingan->pendidikan_tertinggi}}</td>
                            <td>{{ $bimbingan->jabatan_akademik }}</td>
                            <td>
                                <table class="milestone-table">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>{{ $bimbingan->pembimbing_sbg_ketua }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ $bimbingan->pembimbing_sbg_anggota }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        @php($k++)
                        @php($kt += $bimbingan->pembimbing_sbg_ketua)
                        @php($ag += $bimbingan->pembimbing_sbg_anggota)
                    @endforeach
                    <tr>
                        <td colspan="2" style="text-align: center">Total</td>
                        <td></td>
                        <td></td>
                        <td>{{  $kt }}</td>
                        <td>{{  $ag }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


