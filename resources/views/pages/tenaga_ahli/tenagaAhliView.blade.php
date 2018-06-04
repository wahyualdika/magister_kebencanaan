@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
    <div>
        <div class="card" style="overflow-x: scroll;white-space: nowrap;">
            <div class="card-body" style=" display: inline-block;">
                <h5 class="card-title mb-4">List Kegiatan Tenaga Ahli</h5>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table table-hover">
                    <tr>
                        <th  style="text-align: center">Nama Tenaga Ahli</th>
                        <th  style="text-align: center">Nama dan Judul Kegiatan</th>
                        <th  style="text-align: center">Tahun Pelaksanaan</th>
                        <th>Aksi</th>
                    @foreach($kegiatans as $kegiatan)
                        <tr>
                            <td style="text-align: center">{!! $kegiatan->nama !!}</td>
                            <td style="text-align: center">{!! $kegiatan->judul_kegiatan !!}</td>
                            <td style="text-align: center">{!! $kegiatan->tahun !!}</td>
                            <td>
                                <form class="forms-sample" action="{{route('tenagaAhli.kegiatan.delete',['id'=>$kegiatan->id])}}"  method="post">
                                    {{ csrf_field() }}
                                    <div class="btn-group">
                                        <a href="{{route('tenagaAhli.kegiatan.formUpdate',['id'=>$kegiatan->id])}}" class="btn btn-default" style="margin: 0px"><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
                                        <button class="btn btn-link" type="submit"><span class="fa fa-times-circle" style="font-size:24px;margin: 10px"></span></button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection


