@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
    <div>
        <div class="card" style="overflow-x: scroll;white-space: nowrap;">
            <div class="card-body" style=" display: inline-block;">
                <h5 class="card-title mb-4">List Kegiatan Seminar Dosen</h5>
                <table class="table table-hover">
                    <tbody>
                    <th style="text-align: center">Aksi</th>
                    <th>Nama Dosen</th>
                    <th>Jenis Kegiatan</th>
                    <th>Tempat</th>
                    <th>Tahun</th>
                    <th>Sebagai</th>
                    <!-- Data -->
                    @foreach($datas as $data)

                        <tr>
                            <form class="forms-sample" action="{{url('dosen/seminar/delete/'.$data->id)}}"  method="post">
                                {{ csrf_field() }}
                                <td style="text-align: center">
                                    <div class="btn-group">
                                        <a href="{{route('admin.dosen.seminarUpdateForm',['id'=>$data->id])}}" class="btn btn-default" style="margin: 0px"><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
                                        <a href="#" class="btn btn-default" style="margin: 0px"><span class="fa fa-eye" style="font-size:24px;margin: 10px"></span></a>
                                        <button class="btn btn-link" type="submit"><span class="fa fa-times-circle" style="font-size:24px;margin: 10px"></span></button>
                                    </div>
                                </td>
                            </form>

                            <td>{{ $data->dosen->nama }}</td>
                            <td>{{ $data->jenis->jenis }}</td>
                            <td>{{ $data->tempat }}</td>
                            <td>{{ $data->tahun }}</td>
                            <td>{{ $data->role->status}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td style="font-weight: bold;text-align: center;">Total Dosen Sebagai Penyaji : {{ $rolearr[0] }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;text-align: center;">Total Dosen Sebagai Peserta : {{ $rolearr[1] }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


