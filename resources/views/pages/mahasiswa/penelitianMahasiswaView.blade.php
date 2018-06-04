@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
    <div>
        <div class="card" style="overflow-x: scroll;white-space: nowrap;">
            <div class="card-body" style=" display: inline-block;">
                <h5 class="card-title mb-4">List Penelitian Mahasiswa</h5>
                <table class="table table-hover">
                    <tbody>
                    <th>Nama</th>
                    <th>Judul Tesis</th>
                    <th>Tahun</th>
                    <th style="text-align: center">Aksi</th>
                    <!-- Data -->
                    @foreach($datas as $data)

                        <tr>
                            <td>{{ $data->mahasiswa->nama }}</td>
                            <td>{{ $data->judul_penelitian }}</td>
                            <td>{{ $data->tahun_penelitian }}</td>
                            <form class="forms-sample" action="{{route('mahasiswa.penelitian.delete',['id'=>$data->id])}}"  method="post">
                                {{ csrf_field() }}
                                <td style="text-align: center">
                                    <div class="btn-group">
                                        <a href="{{route('mahasiswa.penelitian.formUpdate',['id' => $data->id])}}" class="btn btn-default" style="margin: 0px"><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
                                        <button class="btn btn-link" type="submit"><span class="fa fa-times-circle" style="font-size:24px;margin: 10px"></span></button>
                                    </div>
                                </td>
                            </form>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


