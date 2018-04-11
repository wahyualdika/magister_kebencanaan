@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
    <div>
        <div class="card" style="overflow-x: scroll;white-space: nowrap;">
            <div class="card-body" style=" display: inline-block;">
                <h5 class="card-title mb-4">List Prestasi Dosen</h5>
                <table class="table table-hover">
                    <tbody>
                                <th style="text-align: center">Aksi</th>
                                <th>Nama Prestasi</th>
                                <th>Tahun Pencapaian</th>
                                <th>Dosen Penerima</th>
                                <th>Tingkat</th>
                    <!-- Data -->
                    @foreach($datas as $data)

                        <tr>
                            <form class="forms-sample" action="{!! url('dosen/prestasi/delete/'.$data->id) !!}"  method="post">
                                {{ csrf_field() }}
                                <td style="text-align: center">
                                    <div class="btn-group">
                                        <a href="{{url('dosen/prestasi/'.$data->id.'/edit')}}" class="btn btn-default" style="margin: 0px"><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
                                        <a href="#" class="btn btn-default" style="margin: 0px"><span class="fa fa-eye" style="font-size:24px;margin: 10px"></span></a>
                                        <button class="btn btn-link" type="submit"><span class="fa fa-times-circle" style="font-size:24px;margin: 10px"></span></button>
                                    </div>
                                </td>
                            </form>

                            <td>{{ $data->nama_prestasi}}</td>
                            <td>{{ $data->tahun_pencapaian }}</td>
                            <td>{{ $data->dosen->nama }}</td>
                            <td>{{ $data->tingkat->nama }}</td>
                        </tr>

                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


