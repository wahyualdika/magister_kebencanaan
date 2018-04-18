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
                    <th>Nama-Nama Dosen</th>
                    <th>Pendidikan Tertinggi</th>
                    <th>Jabatan Akademik</th>
                    <th style="text-align: center"> Banyaknya Mahasiswa Yang Dibimbing dan Status Pembimbing
                        <table class="milestone-table">
                            <tr>
                                <td>Ketua</td>
                                <td>Anggota</td>
                            </tr>
                        </table>
                    </th>
                    <!-- Data -->
                    @foreach($datas as $data)

                        <tr>
                            <form class="forms-sample" action="{{url('penelitian/bimbingan/delete/'.$data->id)}}"  method="post">
                                {{ csrf_field() }}
                                <td style="text-align: center">
                                    <div class="btn-group">
                                        <a href="{{url('penelitian/bimbingan/'.$data->id.'/edit')}}" class="btn btn-default" style="margin: 0px"><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
                                        <a href="#" class="btn btn-default" style="margin: 0px"><span class="fa fa-eye" style="font-size:24px;margin: 10px"></span></a>
                                        <button class="btn btn-link" type="submit"><span class="fa fa-times-circle" style="font-size:24px;margin: 10px"></span></button>
                                    </div>
                                </td>
                            </form>
                            <td>{{ $data->dosen->nama}}</td>
                            <td>S{{ $data->pendidikan_tertinggi}}</td>
                            <td>{{ $data->jabatan->nama }}</td>
                            <td>
                                <table class="milestone-table">
                                    <tr>
                                        <td>{{ $data->pembimbing_sbg_ketua }}</td>
                                        <td>{{ $data->pembimbing_sbg_anggota }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


