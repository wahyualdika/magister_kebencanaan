@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
    <div>
        <div class="card">
            <div class="card-body" style=" display: inline-block;">
                <div class="table-responsive">
                    <h5 class="card-title mb-4">List Pengalaman</h5>
                    <table class="table center-aligned-table">
                        <tbody>
                        <th>Nama Dosen Tetap</th>
                        <th>Jenjang Pendidikan Lanjut</th>
                        <th>Bidang Studi</th>
                        <th>Perguruan Tinggi</th>
                        <th>Negara</th>
                        <th>Tanggal Mulai Studi</th>
                        <th style="text-align: center">Aksi</th>
                        <!-- Data -->
                        @foreach($data as $data)

                            <tr>
                                <td>{{ $data->dosen->nama }}</td>
                                <td>{{ $data->jenjang_pendidikan_lanjut}}</td>
                                <td>{{ $data->bidang_studi }}</td>
                                <td>{{ $data->perguruan_tinggi }}</td>
                                <td>{{ $data->negara }}</td>
                                <td>{{ $data->tahun_mulai_studi}}</td>
                                <form class="forms-sample" action="{{route('admin.dosen.tugasBelajarDelete',['id'=>$data->id])}}"  method="post">
                                    {{ csrf_field() }}
                                    <td style="text-align: center">
                                        <div class="btn-group">
                                            <a href="{{route('admin.dosen.tugasBelajarUpdateForm',['id'=>$data->id])}}" class="btn btn-default" ><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
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
    </div>
@endsection
