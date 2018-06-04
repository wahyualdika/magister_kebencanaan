@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
    <div>
        <div class="card" style="overflow-x: scroll;white-space: nowrap;">
            <div class="card-body" style=" display: inline-block;">
                <h5 class="card-title mb-4">List Pustaka</h5>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table table-hover">
                    <tbody>
                    <th>Jenis Pustaka</th>
                    <th>Jumlah Judul</th>
                    <th>Jumlah Copy</th>
                    <th style="text-align: center">Aksi</th>
                    <!-- Data -->
                    @foreach($pustakas as $pustaka)
                        <tr>
                            <td>{{ $pustaka->jenisPustaka->jenis}}</td>
                            <td>{{ $pustaka->jumlah_judul}}</td>
                            <td>{{ $pustaka->jumlah_copy }}</td>
                            <form class="forms-sample" action="{{route('admin.pustaka.delete',['id'=>$pustaka->id])}}"  method="post">
                                {{ csrf_field() }}
                                <td style="text-align: center">
                                    <div class="btn-group">
                                        <a href="{{route('admin.pustaka.formUpdate',['id'=>$pustaka->id])}}" class="btn btn-default" style="margin: 0px"><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
                                        <button class="btn btn-link" type="submit"><span class="fa fa-times-circle" style="font-size:24px;margin: 10px"></span></button>
                                    </div>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                    <tr>
                        <td style="font-weight: bold">Total </td>
                        <td style="font-weight: bold">{!! $totaljudul !!}</td>
                        <td style="font-weight: bold">{!! $totalcopy !!}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


