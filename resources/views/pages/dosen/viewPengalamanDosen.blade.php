@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
    <div>
        <div class="card">
            <div class="card-body" style=" display: inline-block;">
                <div class="table-responsive">
                <h5 class="card-title mb-4">List Pengalaman Dosen</h5>
                <table class="table center-aligned-table">
                    <tbody>
                    <th>Nama Dosen</th>
                    <th>Lembaga</th>
                    <th> Tahun Awal</th>
                    <th> Tahun Akhir</th>
                    <th>Tingkat</th>
                    <th style="text-align: center">Aksi</th>
                    <!-- Data -->
                    @foreach($datas as $data)

                        <tr>
                            <td>{{ $data->dosen->nama }}</td>
                            <td>{{ $data->lembaga}}</td>
                            <td>{{ $data->tahun_awal }}</td>
                            <td>{{ $data->tahun_akhir }}</td>
                            <td>{{ $data->tingkat->nama }}</td>
                            <form class="forms-sample" action="{{url('dosen/pengalaman/delete/'.$data->id)}}"  method="post">
                                {{ csrf_field() }}
                                <td style="text-align: center">
                                    <div class="btn-group">
                                        <a href="{{url('dosen/pengalaman/'.$data->id.'/edit')}}" class="btn btn-default" ><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
                                        <button class="btn btn-link" type="submit"><span class="fa fa-times-circle" style="font-size:24px;margin: 10px"></span></button>
                                    </div>
                                </td>
                            </form>
                        </tr>
                     @endforeach
                    <tr>
                        <td>Total Pengalaman Tingkat Nasional: {{ $tingkats[0] }}</td>
                    </tr>
                    <tr>
                        <td>Total Pengalaman Tingkat Internasional : {{ $tingkats[1] }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection


