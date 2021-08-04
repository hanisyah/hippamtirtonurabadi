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
                    <h4>Data Pegawai</h4>
                    </div>

                    <div style="text-align:right; margin-right:10px">
                        <a href="/pegawai/create" class="on-default btn btn-success" ><i class="fa fa-plus-circle"> Tambah Data</i> </a>
                    </div>

                    {{-- <div style="text-align:right; margin:10px">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">Tambah Data Modal</button>
                    </div> --}}

                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Kode Pegawai</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Email</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pegawai as $pgw)
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pgw->kodePegawai }}</td>
                            <td>{{ $pgw->namaPegawai }}</td>
                            <td>{{ $pgw->alamat }}</td>
                            <td>{{ $pgw->noHP }}</td>
                            <td>{{ $pgw->email }}</td>
                            <td>
                                <a href="{{ url('/pegawai/'.$pgw->idPegawai.'/edit') }}" class="on-default edit-row btn btn-warning" ><i class="far fa-edit"></i></a>
                                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal-{{$pgw->idPegawai}}">Edit</button> --}}
                                <a href="#" class="btn btn-danger swal-6" data-id="{{ $pgw->idPegawai }}">
                                    <form action="{{ url('/pegawai/'.$pgw->idPegawai) }}" id="delete{{ $pgw->idPegawai }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                    </form>
                                    <i class="fa fa-trash"></i>
                                </a>
                                {{-- <form action="{{ url('/pegawai/'.$pgw->idPegawai) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="on-default edit-row btn btn-danger" id="swal-6" ><i class="fa fa-trash"></i></button>
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
    </div>
</section>
<!-- tambah modal -->
{{-- <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Data Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form action="{{url('/pegawai')}}" method="post">
            @csrf
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pegawai</label>
                <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" autocomplete="off" id="namaPegawai" name="namaPegawai" placeholder="Nama Pegawai">

                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" autocomplete="off" id="alamat" name="alamat" placeholder="Alamat">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No HP</label>
                <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" autocomplete="off" id="noHP" name="noHP" placeholder="No HP">
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </form>
        </div>
    </div>
    </div>
</div> --}}

{{-- @foreach($pegawai as $pgw) --}}
<!-- edit modal -->
{{-- <div class="modal fade" id="editModal-{{$pgw->idPegawai}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form action="{{url('/pegawai/'.$pgw->idPegawai)}}" method="post">
            @csrf
            @method('patch')
            <input type="hidden" name="idPegawai" id="idPegawai">
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pegawai</label>
                <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" autocomplete="off" id="namaPegawai" name="namaPegawai" value="{{ $pgw->namaPegawai }}" required>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" autocomplete="off" id="alamat" name="alamat" placeholder="Alamat" value="{{ $pgw->alamat }}" required>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No HP</label>
                <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" autocomplete="off" id="noHP" name="noHP" placeholder="No HP" value="{{ $pgw->noHP }}" required>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                <a class="on-default edit-row btn btn-danger" href="{{url('/pegawai/')}}"> Kembali</a>
                <button class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
@endforeach --}}
@endsection

