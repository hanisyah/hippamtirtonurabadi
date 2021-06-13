@extends('master')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h4>Data Golongan</h4>
            </div>

            <div style="text-align:right; margin-right:10px">
                <a href="/golongan/create" class="on-default btn btn-success" ><i class="fa fa-plus-circle"> Tambah Data</i> </a>
            </div>

            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                <thead>
                    <tr>
                    <th>No </th>
                    <th>Kode</th>
                    <th>Nama Golongan</th>
                    <th>Tarif</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($golongan as $gol)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $gol->kode }}</td>
                    <td>{{ $gol->namaGolongan }}</td>
                    <td>{{ $gol->tarif }}</td>
                    <td>
                        <a href="{{ url('/golongan/'.$gol->idGolongan.'/edit') }}" class="on-default edit-row btn btn-warning" ><i class="far fa-edit"></i></a>
                        <form action="{{ url('/golongan/'.$gol->idGolongan) }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
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
