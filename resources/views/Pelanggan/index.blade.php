@extends('master')
@section('content')

@if (session('success'))
<!-- MAKA TAMPILKAN ALERT SUCCESS -->
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- KETIKA ADA SESSION ERROR  -->
@if (session('error'))
<!-- MAKA TAMPILKAN ALERT DANGER -->
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Data Pelanggan</h4>
                    </div>

                    <div style="text-align:right; margin-right:10px">
                        <a href="/pelanggan/create" class="on-default btn btn-success" ><i class="fa fa-plus-circle"> Add Data</i> </a>
                    </div>

                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Tanggal Pasang</th>
                            <th>Kode Meteran</th>
                            <th>Golongan</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pelanggan as $plgn)
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $plgn->namaPelanggan }}</td>
                            <td>{{ $plgn->alamat }}</td>
                            <td>{{ $plgn->noHP }}</td>
                            <td>{{ Carbon\Carbon::parse($plgn->tanggalPasang)->translatedFormat('l, d F Y') }}</td>
                            <td>{{ $plgn->kodeMeter }}</td>
                            <td>{{ $plgn->golongan->namaGolongan }}</td>
                            <td>
                                <a href="{{ url('/pelanggan/'.$plgn->idPelanggan.'/edit') }}" class="on-default edit-row btn btn-warning" ><i class="far fa-edit"></i></a>
                                <form action="{{ url('/pelanggan/'.$plgn->idPelanggan) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="on-default edit-row btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus nya?');" ><i class="fa fa-trash"></i></button>
                                </form>
                                <a href="{{ url('https://api.qrserver.com/v1/create-qr-code/?size=150x150&data='.$plgn->idPelanggan) }}" target="_blank" rel="noopener noreferrer" class="on-default edit-row btn btn-info" ><i class="far fa-newspaper"></i></a>
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
    </div>
</section>
@endsection
