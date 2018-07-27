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
                    <tr>
                    <th rowspan="2">Nama</th>
                    <th colspan="3" style="text-align: center"> sks Penagajaran Pada</th>
                        {{--<table class="milestone-table">
                            <tr>

                            </tr>
                        </table>--}}
                    <th rowspan="2">sks Penelitian</th>
                    <th rowspan="2">sks Pengabdian Masyarakat</th>
                    <th colspan="2" style="text-align: center"> sks Manajemen</th>
                        {{--<table class="milestone-table">

                        </table>--}}
                    <th rowspan="2">Jumlah</th>
                    <th rowspan="2" style="text-align: center">Aksi</th>

                    </tr>
                    <tr>
                        <th>PS Sendiri</th>
                        <th>PS Lain, PT Sendiri</th>
                        <th>PT Lain</th>
                        <th>PT Sendiri</th>
                        <th>PT Lain</th>
                    </tr>
                    <!-- Data -->
                    @php
                        $jumlah = 0;
                        $jumlahPerKolom = array(0,0,0,0,0,0,0,0);
                        $i = 0;
                        $k = 0;
                    @endphp
                    @foreach($data as $data)
                        @php $jumlah = 0; @endphp
                        <tr>
                            <td>{{ $data->dosen->nama }}</td>
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
                            <td>{{ $jumlah }}</td>
                            @php
                                $jumlahPerKolom[7] += $jumlah;
                            @endphp

                            <form class="forms-sample" action="{{route('admin.dosen.aktivitasDelete',['id'=>$data->id])}}"  method="post">
                                {{ csrf_field() }}
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('admin.dosen.aktivitasUpdateForm',['id'=>$data->id])}}" class="btn btn-default" style="margin: 0px"><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
                                        <button class="btn btn-link" type="submit"><span class="fa fa-times-circle" style="font-size:24px;margin: 10px"></span></button>
                                    </div>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                        </tbody>
                        {{-- <div class="pagination">
                              {{ $datas->links('vendor.pagination.bootstrap-4') }}
                        </div> --}}
                </table>
            </div>
        </div>
    </div>
@endsection
