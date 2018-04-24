@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
    <div>
        <div class="card" style="overflow-x: scroll;white-space: nowrap;">
            <div class="card-body" style=" display: inline-block;">
                <h5 class="card-title mb-4">List Aktivitas Dosen</h5>
                <table class="table table-hover">
                    <tbody>
                    <th style="text-align: center">Aksi</th>
                    <th>Nama</th>
                    <th style="text-align: center"> sks Penagajaran Pada
                        <table class="milestone-table">
                            <tr>
                                <td>PS Sendiri</td>
                                <td>PS Lain, PT Sendiri</td>
                                <td>PT Lain</td>
                            </tr>
                        </table>
                    </th>
                    <th>sks Penelitian</th>
                    <th>sks Pengabdian Masyarakat</th>
                    <th style="text-align: center"> sks Manajemen
                        <table class="milestone-table">
                                <th>PT Sendiri</th>
                                <th>PT Lain</th>
                        </table>
                    </th>
                    <th>Jumlah</th>
                    <!-- Data -->
                    @php
                        $jumlah = 0;
                        $jumlahPerKolom = array(0,0,0,0,0,0,0,0);
                        $i = 0;
                        $k = 0;
                    @endphp
                    @foreach($datas as $data)
                        @php $jumlah = 0; @endphp
                        <tr>
                            <form class="forms-sample" action="{{route('admin.dosen.aktivitasDelete',['id'=>$data->id])}}"  method="post">
                                {{ csrf_field() }}
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('admin.dosen.aktivitasUpdateForm',['id'=>$data->id])}}" class="btn btn-default" style="margin: 0px"><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
                                        <a href="#" class="btn btn-default" style="margin: 0px"><span class="fa fa-eye" style="font-size:24px;margin: 10px"></span></a>
                                        <button class="btn btn-link" type="submit"><span class="fa fa-times-circle" style="font-size:24px;margin: 10px"></span></button>
                                    </div>
                                </td>
                            </form>

                            <td>{{ $data->dosen->nama }}</td>
                            <td>
                                <table class="milestone-table">
                                    <tr>
                                        <td>{{ $data->sks_ps_sendiri }}</td>
                                            @php
                                                $jumlah += $data->sks_ps_sendiri;
                                                $jumlahPerKolom[0] += $data->sks_ps_sendiri;
                                            @endphp
                                        <td>{{ $data->sks_ps_lain }}</td>
                                            @php
                                                $jumlah += $data->sks_ps_lain;
                                                $jumlahPerKolom[1] += $data->sks_ps_lain;
                                            @endphp
                                        <td>{{ $data->sks_ps_ptLain }}</td>
                                            @php
                                                $jumlah += $data->sks_ps_ptLain;
                                                $jumlahPerKolom[2] += $data->sks_ps_ptLain;
                                            @endphp
                                    </tr>
                                </table>
                            </td>
                            <td>{{ $data->sks_penelitian }}</td>
                                @php
                                    $jumlah += $data->sks_penelitian;
                                    $jumlahPerKolom[3] += $data->sks_penelitian;
                                @endphp
                            <td>{{ $data->sks_pengabdian_masyarakat}}</td>
                                @php
                                    $jumlah += $data->sks_pengabdian_masyarakat;
                                    $jumlahPerKolom[4] += $data->sks_pengabdian_masyarakat;
                                @endphp
                            <td>
                                <table class="milestone-table">
                                    <tr>
                                        <td>{{ $data->sks_manajemen_ptSendiri}}</td>
                                            @php
                                                $jumlah += $data->sks_manajemen_ptSendiri;
                                                $jumlahPerKolom[5] += $data->sks_manajemen_ptSendiri;
                                            @endphp
                                        <td>{{ $data->sks_manajemen_ptLain }}</td>
                                            @php
                                                $jumlah += $data->sks_manajemen_ptLain;
                                                $jumlahPerKolom[6] += $data->sks_manajemen_ptLain;
                                            @endphp
                                    </tr>
                                </table>
                            </td>
                            <td>{{ $jumlah }}</td>
                            @php
                                $jumlahPerKolom[7] += $jumlah;
                            @endphp
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2">Total</td>
                        <td>{{$jumlahPerKolom[0]}}</td>
                        <td>{{$jumlahPerKolom[1]}}</td>
                        <td>{{$jumlahPerKolom[2]}}</td>
                        <td>{{$jumlahPerKolom[3]}}</td>
                        <td>{{$jumlahPerKolom[4]}}</td>
                        <td>{{$jumlahPerKolom[5]}}</td>
                        <td>{{$jumlahPerKolom[6]}}</td>
                        <td>{{$jumlahPerKolom[7]}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Rata-Rata</td>
                        <td>{{$jumlahPerKolom[0]/$amount}}</td>
                        <td>{{$jumlahPerKolom[1]/$amount}}</td>
                        <td>{{$jumlahPerKolom[2]/$amount}}</td>
                        <td>{{$jumlahPerKolom[3]/$amount}}</td>
                        <td>{{$jumlahPerKolom[4]/$amount}}</td>
                        <td>{{$jumlahPerKolom[5]/$amount}}</td>
                        <td>{{$jumlahPerKolom[6]/$amount}}</td>
                        <td>{{$jumlahPerKolom[7]/$amount}}</td>
                    </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


