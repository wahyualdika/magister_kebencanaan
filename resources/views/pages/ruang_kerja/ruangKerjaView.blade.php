@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
    <div>
        <div class="card" style="overflow-x: scroll;white-space: nowrap;">
            <div class="card-body" style=" display: inline-block;">
                <h5 class="card-title mb-4">List Ruang Kerja</h5>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table table-hover">
                    <tbody>
                    <th>Ruang Kerja Dosen</th>
                    <th>Jumlah Ruang</th>
                    <th>Jumlah Luas(m2)</th>
                    <th style="text-align: center">Aksi</th>
                    <!-- Data -->
                    @foreach($ruangs as $ruang)
                        <tr>
                            <td>{{ $ruang->ruangTipe->tipe }}</td>
                            <td>{{ $ruang->jumlah_ruang}}</td>
                            <td>{{ $ruang->luas }}</td>
                            <form class="forms-sample" action="{{route('admin.ruangKerja.delete',['id'=>$ruang->id])}}"  method="post">
                                {{ csrf_field() }}
                                <td style="text-align: center">
                                    <div class="btn-group">
                                        <a href="{{route('admin.ruangKerja.formUpdate',['id'=>$ruang->id])}}" class="btn btn-default" style="margin: 0px"><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
                                        <button class="btn btn-link" type="submit"><span class="fa fa-times-circle" style="font-size:24px;margin: 10px"></span></button>
                                    </div>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2">Total Luas</td>
                        <td>{!! $total !!}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


