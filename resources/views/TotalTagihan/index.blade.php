@extends('master')
@section('content')

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
                    <th>Golongan</th>
                    <th>Jumlah Meteran</th>
                    <th>Foto Meteran</th>
                    <th>Sub Total</th>
                    <th>Pegawai Pencatat</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($totaltagihan as $tag)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tag->kodeMeter }}</td>
                    <td>{{ $tag->namaPelanggan }}</td>
                    <td>{{ $tag->tagihan->tahun }}</td>
                    <td>{{ $tag->tagihan->bulan }}</td>
                    <td>{{ $tag->namaGolongan }}</td>
                    <td>{{ $tag->tagihan->jumlahMeter }}</td>
                    <td>{{ $tag->tagihan->fotoMeteran }}</td>
                    <td>{{ $tag->subTotal }}</td>
                    <td>{{ $tag->namaPegawai }}</td>
                    <td>
                        <a href="{{ url('/totaltagihan-pdf/'.$tag->idTagihan) }}" target="_blank" rel="noopener noreferrer" class="on-default edit-row btn btn-primary" ><i class="fa fa-info"></i></a>

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
