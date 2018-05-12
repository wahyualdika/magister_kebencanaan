@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
    <div>
        <div class="card" style="overflow-x: scroll;white-space: nowrap;">
            <div class="card-body" style=" display: inline-block;">
                <h5 class="card-title mb-4">List Mahasiswa 5 Tahun Terakhir</h5>

                @php
                       $i = 0;
                       $total = 0;
                       $jumlahdatas = array(0,0,0,0,0);
                @endphp

                @foreach($datas as $data)
                   @php
                   $jumlahdatas[$i] = $data;
                   $i++;
                   /*dd($jumlahdatas);*/
                   @endphp
                @endforeach

                @if($jumlah >= 5)
                <table class="table table-hover">
                    <tr>
                        <th rowspan="2" style="text-align: center">Tahun Masuk</th>
                        <th colspan="5" style="text-align: center">Jumlah Mahasiswa bukan Transfer per Angkatan pada Tahun</th>
                        <th rowspan="2">Jumlah Lulusan s.d. TS</th>
                    </tr>
                    <tr>
                        <th style="text-align: center">{!! $years[4] !!}</th>
                        <th style="text-align: center">{!! $years[3] !!}</th>
                        <th style="text-align: center">{!! $years[2] !!}</th>
                        <th style="text-align: center">{!! $years[1] !!}</th>
                        <th style="text-align: center">{!! $years[0] !!}</th>
                    </tr>
                    <tr>
                        <td style="text-align: center">{!! $years[4] !!}</td>
                        @for($i = 4;$i >= 0;$i--)
                            @if($jumlahdatas[$i] != null)
                                @if($jumlahdatas[$i]->tahun_akademik >= $years[4])
                                    <td style="text-align: center">{!! $jumlahdatas[$i]->total_mhs_bknTransfer !!}</td>
                                    @php($total += $jumlahdatas[$i]->total_mhs_bknTransfer )
                                @else
                                    <td style="text-align: center"></td>
                                @endif
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        @endfor
                        <td>{!! $total !!}</td>
                        @php($total = 0)
                    </tr>

                    <tr>
                        <td style="text-align: center">{!! $years[3] !!}</td>
                        @for($i = 4;$i >= 0;$i--)
                            @if($jumlahdatas[$i] != null)
                                @if($jumlahdatas[$i]->tahun_akademik >= $years[3])
                                    <td style="text-align: center">{!! $jumlahdatas[$i]->total_mhs_bknTransfer !!}</td>
                                    @php($total += $jumlahdatas[$i]->total_mhs_bknTransfer )
                                @else
                                    <td style="text-align: center"></td>
                                @endif
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        @endfor
                        <td>{!! $total !!}</td>
                        @php($total = 0)
                    </tr>
                    <tr>
                        <td style="text-align: center">{!! $years[2] !!}</td>
                        @for($i = 4;$i >= 0;$i--)
                            @if($jumlahdatas[$i] != null)
                                @if($jumlahdatas[$i]->tahun_akademik >= $years[2])
                                    <td style="text-align: center">{!! $jumlahdatas[$i]->total_mhs_bknTransfer !!}</td>
                                    @php($total += $jumlahdatas[$i]->total_mhs_bknTransfer )
                                @else
                                    <td style="text-align: center"></td>
                                @endif
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        @endfor
                        <td>{!! $total !!}</td>
                        @php($total = 0)
                    </tr>
                    <tr>
                        <td style="text-align: center">{!! $years[1] !!}</td>
                        @for($i = 4;$i >= 0;$i--)
                            @if($jumlahdatas[$i] != null)
                                @if($jumlahdatas[$i]->tahun_akademik >= $years[1])
                                    <td style="text-align: center">{!! $jumlahdatas[$i]->total_mhs_bknTransfer !!}</td>
                                    @php($total += $jumlahdatas[$i]->total_mhs_bknTransfer )
                                @else
                                    <td style="text-align: center"></td>
                                @endif
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        @endfor
                        <td>{!! $total !!}</td>
                        @php($total = 0)
                    </tr>
                    <tr>
                        <td style="text-align: center">{!! $years[0] !!}</td>
                        @for($i = 4;$i >= 0;$i--)
                            @if($jumlahdatas[$i] != null)
                                @if($jumlahdatas[$i]->tahun_akademik >= $years[0])
                                    <td style="text-align: center">{!! $jumlahdatas[$i]->total_mhs_bknTransfer !!}</td>
                                    @php($total += $jumlahdatas[$i]->total_mhs_bknTransfer )
                                @else
                                    <td style="text-align: center"></td>
                                @endif
                            @else
                                <td style="text-align: center"></td>
                            @endif
                        @endfor
                        <td>{!! $total !!}</td>
                        @php($total = 0)
                    </tr>
                </table>

                @else
                    <p>Data mahasiswa dan lulusan belum lengkap</p>
                @endif
            </div>
        </div>
    </div>
@endsection


