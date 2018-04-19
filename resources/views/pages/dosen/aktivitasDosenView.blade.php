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
                            <tr>
                                <td>PT Sendiri</td>
                                <td>PT Lain</td>
                            </tr>
                        </table>
                    </th>
                    <th>Jumlah</th>
                    <!-- Data -->
                    @foreach($datas as $data)
                        <tbody>
                        <tr>
                            <form class="forms-sample" action="{{route('admin.dosen.aktivitasDelete',['id'=>$data->id])}}"  method="post">
                                {{ csrf_field() }}
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('admin.dosen.aktivitasUpdate',['id'=>$data->id])}}" class="btn btn-default" style="margin: 0px"><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
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
                                        <td>{{ $data->sks_ps_lain }}</td>
                                        <td>{{ $data->sks_ps_ptLain }}</td>
                                    </tr>
                                </table>
                            </td>
                            <td>{{ $data->sks_penelitian }}</td>
                            <td>{{ $data->sks_pengabdian_masyarakat}}</td>
                            <td>
                                <table class="milestone-table">
                                    <tr>
                                        <td>{{ $data->sks_manajemen_ptSendiri}}</td>
                                        <td>{{ $data->sks_manajemen_ptLain }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>#</tr>
                        </tbody>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


