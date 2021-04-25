@extends('master')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Data Pelanggan</h4>
                </div>
                <div class="card-body">

                <form action="{{url('/user/'.$user->id)}}" method="post">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="id" id="id">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pegawai</label>
                        <div class="col-sm-12 col-md-7">
                            {{-- <input type="text" class="form-control" id="namaPelanggan" name="namaPelanggan" value="{{ $pelanggan->namaPelanggan }}" required> --}}
                            <select class="form-control" placeholder="-- Select Nama Pegawai --" id="idPegawai" name="idPegawai"  required>
                                <option value selected="selected">-- Pilih Nama Pegawai --</option>
                                @foreach ($pegawai as $pgw)
                                    <option value="{{$pgw->idPegawai}}"
                                    @if ($pgw->idPegawai == $user->pegawai_id)
                                        selected
                                    @endif
                                    >{{$pgw->namaPegawai}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ $user->username }}" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="{{ $user->password }}" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                        <a class="on-default edit-row btn btn-danger" href="{{url('/user/')}}"> Kembali</a>
                        <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>

@endsection
