@extends('pages.master')
@section('script_bottom')
@endsection

@section('side-content')
    <div>
        <div class="card" style="overflow-x: scroll;white-space: nowrap;">
            <div class="card-body" style=" display: inline-block;">
                <h5 class="card-title mb-4">Penelitian Dosen Tetap</h5>
                <table class="table table-hover">
                    <tbody>
                    <th>Sumber Pembiayaan</th>
                    <th>TS</th>
                    <th>TS-1</th>
                    <th>TS-2</th>
                    <th>Jumlah</th>
                    <!-- Data -->
                    @php($k=0)
                    @foreach($danas as $dana)

                        <tr>
                            <td>{{ $dana->nama_sumber}}</td>
                            <td>{{ $biaya[$k][0] }}</td>
                            <td>{{ $biaya[$k][1] }}</td>
                            <td>{{ $biaya[$k][2] }}</td>
                            <td>{{ $jumlah[$k] }}</td>
                        </tr>
                        @php($k++)
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


