@extends('master')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h4>Data Tagihan</h4>
            </div>

            <div class="card-body">
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
                    <td>{{ $tag->tanggalCatat }}</td>
                    <td>{{ $tag->jumlahMeter }}</td>
                    <td>{{ $tag->fotoMeteran }}</td>
                    <td>{{ $tag->pegawai->namaPegawai }}</td>
                    <td>
                        <a href="{{ url('/tagihan/'.$tag->idTagihan.'/edit') }}" class="on-default edit-row btn btn-primary" ><i class="fa fa-edit"></i></a>
                        {{-- <form action="" method="post" class="d-inline">
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
