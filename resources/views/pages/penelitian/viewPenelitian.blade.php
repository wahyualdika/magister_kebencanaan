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
                    <th style="text-align: center">Aksi</th>
                    <th>Judul</th>
                    <th>Nama-Nama Dosen</th>
                    <th>Tahun Penelitian</th>
                    <th>Sumber Dana</th>
                    <th>Jumlah Dana</th>
                    <th>Jumlah Mahasiswa Terlibat</th>
                    <!-- Data -->
                    @foreach($datas as $data)

                        <tr>
                            <form class="forms-sample" action="{{url('penelitian/delete/'.$data->id)}}"  method="post">
                                {{ csrf_field() }}
                                <td style="text-align: center">
                                    <div class="btn-group">
                                        <a href="{{url('penelitian/update/'.$data->id.'/edit')}}" class="btn btn-default" style="margin: 0px"><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
                                        <a href="#" class="btn btn-default" style="margin: 0px"><span class="fa fa-eye" style="font-size:24px;margin: 10px"></span></a>
                                        <button class="btn btn-link" type="submit"><span class="fa fa-times-circle" style="font-size:24px;margin: 10px"></span></button>
                                    </div>
                                </td>
                            </form>

                            <td>{{ $data->judul}}</td>
                            <td>@foreach($data->dosen as $dosen)
                                    <li class="list-group-item">{{$dosen->nama}}</li>
                                @endforeach
                            </td>
                            <td>{{ $data->tahun_penelitian }}</td>
                            <td>{{ $data->sumberDana->nama_sumber }}</td>
                            <td>{{ $data->jumlah_dana }}</td>
                            <td>{{ $data->jumlah_mahasiswa}}</td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


