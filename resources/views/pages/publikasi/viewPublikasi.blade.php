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
                    <th>Judul</th>
                    <th>Nama-nama Dosen</th>
                    <th>Dipublikasikan Pada</th>
                    <th>Tahun Publikasi</th>
                    <th>Nama Lembaga Sitasi</th>
                    <th>Tingkat</th>
                    <th style="text-align: center">Aksi</th>
                    <!-- Data -->
                    @foreach($datas as $data)

                        <tr>
                            <td>{{ $data->judul}}</td>
                            <td>@foreach($data->dosen as $dosen)
                                    <li class="list-group-item">{{$dosen->nama}}</li>
                                @endforeach
                            </td>
                            <td>{{ $data->tempat_publikasi }}</td>
                            <td>{{ $data->tahun }}</td>
                            <td>{{ $data->lembaga_sitasi }}</td>
                            <td>{{ $data->tingkat->nama }}</td>
                            <form class="forms-sample" action="{{url('publikasi/delete/'.$data->id)}}"  method="post">
                                {{ csrf_field() }}
                                <td style="text-align: center">
                                    <div class="btn-group">
                                        <a href="{{url('publikasi/update/'.$data->id.'/edit')}}" class="btn btn-default" style="margin: 0px"><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
                                        <button class="btn btn-link" type="submit"><span class="fa fa-times-circle" style="font-size:24px;margin: 10px"></span></button>
                                    </div>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
