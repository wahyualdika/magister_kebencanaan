@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
    <div>
        <div class="card" style="overflow-x: scroll;white-space: nowrap;">
            <div class="card-body" style=" display: inline-block;">
                <h5 class="card-title mb-4">Struktur Kurikulum</h5>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table table-hover">
                    <tr>
                        <th  style="text-align: center">Jenis Mata Kuliah</th>
                        <th  style="text-align: center">SKS</th>
                        <th  style="text-align: center">Keterangan</th>
                        <th style="text-align: center">Aksi</th>
                    @foreach($sksmins as $sksmin)
                        <tr>
                            <td style="text-align: center">{!! $sksmin->jenis_mk !!}</td>
                            <td style="text-align: center">{!! $sksmin->sks !!}</td>
                            <td style="text-align: center">{!! $sksmin->keterangan !!}</td>
                            <td>
                                <form class="forms-sample" action="{{route('mataKuliah.sksMinimal.delete',['id'=>$sksmin->id])}}"  method="post">
                                    {{ csrf_field() }}
                                    <div class="btn-group">
                                        <a href="{{route('mataKuliah.sksMinimal.formUpdate',['id'=>$sksmin->id])}}" class="btn btn-default" style="margin: 0px"><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
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


