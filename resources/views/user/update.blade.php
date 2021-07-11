@extends('master')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Data User</h4>
                </div>
                <div class="card-body">

                <form action="{{url('/user/'.$user->id)}}" method="post">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="id" id="id">
                    <div class="form-group row mb-4">
                        <input type="hidden" name="pegawai_id" value="{{$user->pegawai->idPegawai}}">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pegawai</label>
                        <div class="col-sm-12 col-md-7">
                            <input class="form-control" id="name" name="nama_pegawai" disabled placeholder="Nama user" value="{{$user->pegawai->namaPegawai}}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" autocomplete="off" id="username" name="username" placeholder="Username" value="{{ $user->username }}" >
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ganti Password (opsional)</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" autocomplete="off" id="name" name="name" placeholder="Nama" value="{{ $user->name }}" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Level</label>
                            <div class="col-sm-12 col-md-7">
                                <select id="level" type="text" class="form-control custom-select-value" name="level"> <option value="{{ $user->level}}"> {{ $user->level }}</option>
                                    <option value="superadmin">Super Admin</option>
                                    <option value="admin">Admin</option>
                                    <option value="pencatat">Pencatat</option>
                                </select>
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
