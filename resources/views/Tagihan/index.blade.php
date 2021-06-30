@extends('master')
@section('content')

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h4>Data Tagihan</h4>
            </div>

            <div class="card-body">
            <form action="{{url('/tagihan')}}" id="form_range" method="get">
                <div class="form-group">
                    <input type="text" class="form-control" name="dates" />
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                <thead>
                    <tr>
                    <th>No </th>
                    <th>Kode Meteran </th>
                    <th>Nama Pelanggan</th>
                    <th>Golongan</th>
                    <th>Tahun</th>
                    <th>Bulan</th>
                    <th>Tanggal Catat</th>
                    <th>Jumlah Meteran Kemarin</th>
                    <th>Jumlah Meteran</th>
                    <th>Foto Meteran</th>
                    <th>Pegawai Pencatat</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tagihan as $tag)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tag->pelanggan->kodeMeter }}</td>
                    <td>{{ $tag->pelanggan->namaPelanggan }}</td>
                    <td>{{ $tag->golongan->namaGolongan }}</td>
                    <td>{{ $tag->tahun }}</td>
                    <td>{{ $tag->bulan }}</td>
                    <td>{{ Carbon\Carbon::parse($tag->tanggalCatat)->translatedFormat('l, d F Y') }}</td>
                    <td>{{ $tag->jumlahMeterKemarin }}</td>
                    <td>{{ $tag->jumlahMeter }}</td>
                    <td>
                        {{-- <img src="{{ asset ( $tag->fotoMeteran ) }}" width="100"> --}}
                        <a href="{{ asset('img/'. $tag->fotoMeteran) }}" target="_blank" rel="noopener noreferrer">Lihat Meter Air</a>
                    </td>
                    <td>{{ $tag->pegawai->namaPegawai }}</td>
                    <td>
                        <a href="#" class="btn btn-danger swal-6" data-id="{{ $tag->idTagihan }}">
                            <form action="{{ url('/tagihan/'.$tag->idTagihan) }}" id="delete{{ $tag->idTagihan }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                            </form>
                            <i class="fa fa-trash"></i>
                        </a>
                        {{-- <a href="{{ url('/tagihan/'.$tag->idTagihan.'/edit') }}" class="on-default edit-row btn btn-primary" ><i class="fa fa-edit"></i></a> --}}
                        {{-- <form action="{{ url('/tagihan/'.$tag->idTagihan) }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="on-default edit-row btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus nya?');" ><i class="fa fa-trash"></i></button>
                        </form> --}}
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>

$('input[name="dates"]').daterangepicker();
$('input[name="dates"]').on('apply.daterangepicker', function() {
  $('#form_range').submit();
});
</script>
@endsection
