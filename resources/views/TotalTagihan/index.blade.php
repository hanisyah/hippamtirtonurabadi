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
            <h4>Data Total Tagihan</h4>
            </div>

            {{-- <div style="text-align:right; margin-right:10px">
                <a href="/petugas/create" class="on-default btn btn-success" ><i class="fa fa-plus-circle"> Add Data</i> </a>
            </div> --}}

            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                <thead>
                    <tr>
                    <th>No </th>
                    <th>Kode Meteran </th>
                    <th>Nama Pelanggan</th>
                    <th>Tahun</th>
                    <th>Bulan</th>
                    <th>Tarif Golongan</th>
                    <th>Jumlah Meteran Kemarin</th>
                    <th>Jumlah Meteran</th>
                    <th>Sub Total</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($totalTagihan as $tag)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tag->tagihan->pelanggan->kodeMeter }}</td>
                    <td>{{ $tag->tagihan->pelanggan->namaPelanggan }}</td>
                    <td>{{ $tag->tagihan->tahun }}</td>
                    <td>{{ $tag->tagihan->bulan }}</td>
                    <td>{{ $tag->tagihan->golongan->tarif }}</td>
                    <td>{{ $tag->tagihan->jumlahMeterKemarin }}</td>
                    <td>{{ $tag->tagihan->jumlahMeter }}</td>
                    <td>{{ $tag->subTotal }}</td>
                    <td>
                        <a href="{{ url('/totaltagihan-pdf/'.$tag->idTotalTagihan) }}" target="_blank" rel="noopener noreferrer" class="on-default edit-row btn btn-primary" ><i class="fas fa-file-pdf" title="Cetak PDF"></i></a>
                        <a href="{{ url('/tagihanwa/'.$tag->idTotalTagihan) }}" title="Kirim data PDF ke whatsapp" rel="noopener noreferrer" class="on-default edit-row btn btn-success" ><i class="
                            fab fa-whatsapp"></i></a>
                        <form action="{{ url('/totalTagihan/'.$tag->idTotalTagihan) }}" method="get" class="d-inline">

                            <button class="on-default edit-row btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus nya?');" ><i class="fa fa-trash"></i></button>
                        </form>
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
