@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
    <div>
        <div class="card" style="overflow-x: scroll;white-space: nowrap;">
            <div class="card-body" style=" display: inline-block;">
                <h5 class="card-title mb-4">List Mahasiswa 5 Tahun Terakhir</h5>

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
                    </tr>
                    <tr>
                        <td style="text-align: center">{!! $years[3] !!}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center">{!! $years[2] !!}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center">{!! $years[1] !!}</td>
                    </tr>
                    <tr>
                        <td style="text-align: center">{!! $years[0] !!}</td>
                    </tr>
                    <tr></tr>
                </table>
            </div>
        </div>
    </div>
@endsection


