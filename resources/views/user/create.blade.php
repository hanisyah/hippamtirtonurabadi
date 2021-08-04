@extends('master')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Input Data User</h4>
                </div>
                <div class="card-body">
                <form action="{{url('/user')}}" method="post">
                    @csrf
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pegawai</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control" placeholder="-- Select Nama Pegawai --" id="idPegawai" name="idPegawai" onchange="setInput(this)" value="{{ old('idPegawai') }}">
                                <option value selected="selected">-- Pilih Pegawai --</option>
                                @foreach ($pegawai as $pgw)
                                    <option value="{{$pgw->idPegawai}}" {{ old('idPegawai') == "$pgw->idPegawai" ? "selected" : "" }}>{{$pgw->namaPegawai}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Pegawai</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="kodePegawai" name="kodePegawai" placeholder="Kode Pegawai" value="{{ old('kodePegawai') }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" autocomplete="off" id="username" name="username" placeholder="Username" value="{{ old('username') }}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="password" class="form-control @error('password') is-invalid:'' @enderror" autocomplete="off" id="password" name="password" placeholder="Password" value="{{ old('password') }}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Konfirmasi Password</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="password" class="form-control @error('password') is-invalid:'' @enderror" autocomplete="off" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" value="{{ old('password') }}">
                            @error('password')
                                <span class="text-danger">
                                    Password yang dimasukkan salah
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Level</label>
                        <div class="col-sm-12 col-md-7">
                            <div class="form-select-list">
                            <select id="level" type="text" class="form-control custom-select-value" name="level" value="{{ old('level') }}">
                                <option>-- Pilih Level Admin --</option>
                                <option value="superadmin" {{ old('level') == "superadmin" ? "selected" : "" }}>Super Admin</option>
                                <option value="admin" {{ old('level') == "admin" ? "selected" : "" }}>Admin</option>
                                <option value="pencatat" {{ old('level') == "pencatat" ? "selected" : "" }}>Pencatat</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
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

<script>
    function setInput(result) {
        var value = result.value;

        $.ajax({
            url: '{{ url('/pegawai/get-data/') }}',
            type: 'POST',
            data: 'idPegawai=' + value,
            dataType: 'JSON',
            success: function(response){
                $("#kodePegawai").val(response.result.kodePegawai);
            }
        })
    }
</script>
