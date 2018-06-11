@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
    <div>
        <div class="card" style="overflow-x: scroll;white-space: nowrap;">
            <div class="card-body" style=" display: inline-block;">
                <h5 class="card-title mb-4">List Aksesibilitas Data</h5>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table table-hover">
                    <tbody>
                    <tr>
                    <th style="text-align: center" >Jenis Data</th>
                    <th style="text-align: center" >Sistem Pengolahan Data</th>
                    <th style="text-align: center">Aksi</th>
                    </tr>
                    <!-- Data -->
                    @foreach($aksesdatas as $aksesdata)
                        <tr>
                            <td style="text-align: center">{{ $aksesdata->jenisData->jenis}}</td>
                            <td style="text-align: center">@foreach($aksesdata->pengolahan as $pengolahan)
                                    @if($pengolahan->id == 1)
                                        <span class="badge badge-warning">{!! $pengolahan->nama !!}</span>
                                    @elseif($pengolahan->id == 2)
                                        <span class="badge badge-danger">{!!  $pengolahan->nama !!}</span>
                                    @elseif($pengolahan->id == 3)
                                        <span class="badge badge-success">{!! $pengolahan->nama !!}</span>
                                    @elseif($pengolahan->id == 4)
                                        <span class="badge badge-primary">{!! $pengolahan->nama !!}</span>
                                    @endif
                                @endforeach
                            </td>
                            <form class="forms-sample" action="{{route('admin.aksesibilitasData.delete',['id'=>$aksesdata->id])}}"  method="post">
                                {{ csrf_field() }}
                                <td style="text-align: center">
                                    <div class="btn-group">
                                        <a href="{{route('admin.aksesibilitasData.formUpdate',['id'=>$aksesdata->id])}}" class="btn btn-default" style="margin: 0px"><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
                                        <button class="btn btn-link" type="submit"><span class="fa fa-times-circle" style="font-size:24px;margin: 10px"></span></button>
                                    </div>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <table class="table table-hover">
                  <tr>
                      <th style="font-weight: bold">Total </th>
                  </tr>
                  <tr>
                      <th style="font-weight: bold">Pengolahan Manual : {!! $totalmanual !!}</th>
                  </tr>
                  <tr>
                      <th style="font-weight: bold">Pengolahan Komputer tanpa jaringan : {!! $totalkomputer !!}</th>
                  </tr>
                  <tr>
                      <th style="font-weight: bold">Pengolahan Komputer LAN : {!! $totallan !!}</th>
                  </tr>
                  <tr>
                      <th style="font-weight: bold">Pengolahan Komputer WAN : {!! $totalwan !!}</th>
                  </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
