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

                <form action="{{url('/pelanggan/'.$pelanggan->idPelanggan)}}" method="post">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="idPelanggan" id="idPelanggan">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pelanggan</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="namaPelanggan" name="namaPelanggan" value="{{ $pelanggan->namaPelanggan }}" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="{{ $pelanggan->alamat }}" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No HP</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="noHP" name="noHP" placeholder="No HP" value="{{ $pelanggan->noHP }}" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Pasang</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="date" class="form-control" id="tanggalPasang" name="tanggalPasang" value="{{ $pelanggan->tanggalPasang }}" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Meteran</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="kodeMeter" name="kodeMeter" placeholder="Kode Meteran" value="{{ $pelanggan->kodeMeter }}" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Golongan</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control" id="idGolongan" name="idGolongan"  required>
                                <option value selected="selected">-- Pilih Golongan --</option>
                                @foreach ($golongan as $gol)
                                    <option value="{{$gol->idGolongan}}"
                                    @if ($gol->idGolongan == $pelanggan->golongan_id)
                                        selected
                                    @endif
                                    >{{$gol->namaGolongan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                        <a class="on-default edit-row btn btn-danger" href="{{url('/pelanggan/')}}"> Kembali</a>
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
