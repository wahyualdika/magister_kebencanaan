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

                @php
                  $rataperjenis = 0;
                  $ts           = 0;
                  $ts2          = 0;
                  $ts1          = 0;
                  $totalRata    = 0;
                @endphp

                <table class="table table-hover">
                    <tbody>
                    <tr>
                      <th style="text-align: center" rowspan="2">Sumber Dana</th>
                      <th style="text-align: center" rowspan="2">Jenis Dana</th>
                      <th style="text-align: center" colspan="3">Jumlah Dana(Juta Rupiah)</th>
                      <th style="text-align: center" rowspan="2">Rata-Rata</th>
                      <th style="text-align: center" rowspan="2">Aksi</th>
                    </tr>
                    <tr>
                      <th style="text-align: center">{!! $years[2] !!}</th>
                      <th style="text-align: center">{!! $years[1] !!}</th>
                      <th style="text-align: center">{!! $years[0] !!}</th>
                    </tr>
                    <!-- Data -->
                    @foreach ($alokasis as $key => $alokasi)
                      @php
                        $sumberdana = $key;
                      @endphp
                        @foreach ($alokasi as $key => $jenis)
                        <tr>
                          @if ($key === key($alokasi))
                            <td rowspan="{{ count($alokasi) }}" style="text-align: center">{{ $sumberdana }}</td>
                          @endif
                          <td style="text-align: center">{{ $key }}</td>
                          <td style="text-align: center">{{ !empty($jenis['ts']) ? $jenis['ts'] : '' }}</td>
                          <td style="text-align: center">{{ !empty($jenis['ts1']) ? $jenis['ts1'] : '' }}</td>
                          <td style="text-align: center">{{ !empty($jenis['ts2']) ? $jenis['ts2'] : '' }}</td>
                          <td style="text-align: center"></td>
                          <form class="forms-sample" action="{{route('admin.alokasiDana.delete',['id'=>$jenis['id']])}}"  method="post">
                              {{ csrf_field() }}
                              <td style="text-align: center">
                                  <div class="btn-group">
                                      <a href="{{route('admin.alokasiDana.formUpdate',['id'=>$jenis['id']])}}" class="btn btn-default" style="margin: 0px"><span class="fa fa-edit" style="font-size:24px;margin: 10px"></span></a>
                                      <button class="btn btn-link" type="submit"><span class="fa fa-times-circle" style="font-size:24px;margin: 10px"></span></button>
                                  </div>
                              </td>
                          </form>
                        </tr>
                        @endforeach

                          {{-- @php
                            $rataperjenis = $alokasi->ts2+$alokasi->ts1+$alokasi->ts;
                            $rataperjenis = ceil($rataperjenis/3);
                            $totalRata   += $rataperjenis;
                            $ts  += $alokasi->ts;
                            $ts1 += $alokasi->ts1;
                            $ts2 += $alokasi->ts2;
                          @endphp --}}
                          {{-- <td style="text-align: center">{{ $rataperjenis }}</td> --}}
                      </tr>
                    @endforeach
                    {{-- <tr>
                        <td style="text-align:center" colspan="2">Total</td>
                        <td style="text-align:center">{!! $totalts[2] !!}</td>
                        <td style="text-align:center">{!! $totalts[1] !!}</td>
                        <td style="text-align:center">{!! $totalts[0] !!}</td>
                        <td style="text-align:center">{!! $totalRata !!}</td>
                    </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
