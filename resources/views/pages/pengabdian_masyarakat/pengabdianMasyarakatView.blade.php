@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
    <div>
        <div class="card" style="overflow-x: scroll;white-space: nowrap;">
            <div class="card-body" style=" display: inline-block;">
                <h5 class="card-title mb-4">List Pengabdian Masyarakat</h5>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table table-hover">
                    <tbody>
                    <th>Tahun</th>
                    <th>Judul Pengabdian/Pelayanan Kepada Masyarakat</th>
                    <th>Sumber Dana</th>
                    <th>Jumlah Dana</th>
                    <th style="text-align: center">Aksi</th>
                    <!-- Data -->
                    @foreach($datas as $data)
                        <tr>
                            <td>{{ $data->tahun }}</td>
                            <td>{{ $data->nama}}</td>
                            <td>{{ $data->sumberDana->nama_sumber }}</td>
                            <td>{{ $data->jumlah }}</td>
                            <form class="forms-sample" action="{{route('admin.pengabdian.delete',['id'=>$data->id])}}"  method="post">
                                {{ csrf_field() }}
                                <td style="text-align: center">
                                    <div class="btn-group">
                                        <a href="{{route('admin.pengabdian.formUpdate',['id'=>$data->id])}}" class="btn btn-default" style="margin: 0px"><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
                                        <button class="btn btn-link" type="submit"><span class="fa fa-times-circle" style="font-size:24px;margin: 10px"></span></button>
                                    </div>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" style="font-weight: bold;text-align: center">Jumlah Dana</td>
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


