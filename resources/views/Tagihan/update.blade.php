@extends('master')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Data Tagihan</h4>
                </div>
                <div class="card-body">

                <form action="{{url('/tagihan/'.$tagihan->idTagihan)}}" method="post">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="idTagihan" id="idTagihan">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Meter</label>
                        <div class="col-sm-12 col-md-7">
                            {{-- <input type="text" class="form-control" id="namaTagihan" name="namaTagihan" value="{{ $pelanggan->namaPelanggan }}" required> --}}
                            <select class="form-control" id="idPelanggan" name="idPelanggan"  required>
                                <option value selected="selected">-- Pilih Kode Meter --</option>
                                @foreach ($pelanggan as $plgn)
                                    <option value="{{$plgn->idPelanggan}}"
                                    @if ($plgn->idPelanggan == $tagihan->pelanggan_id)
                                        selected
                                    @endif
                                    >{{$plgn->kodeMeter}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pelanggan</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control" id="idPelanggan" name="idPelanggan"  required>
                                <option value selected="selected">-- Pilih Nama Pelanggan --</option>
                                @foreach ($pelanggan as $plgn)
                                    <option value="{{$plgn->idPelanggan}}"
                                    @if ($plgn->idPelanggan == $tagihan->pelanggan_id)
                                        selected
                                    @endif
                                    >{{$plgn->namaPelanggan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Golongan</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control" id="idGolongan" name="idGolongan"  required>
                                <option value selected="selected">-- Pilih Golongan --</option>
                                @foreach ($golongan as $gol)
                                    <option value="{{$gol->idGolongan}}"
                                    @if ($gol->idGolongan == $tagihan->golongan_id)
                                        selected
                                    @endif
                                    >{{$gol->namaGolongan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tahun</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun" value="{{ $tagihan->tahun }}" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bulan</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="bulan" name="bulan" placeholder="Bulan" value="{{ $tagihan->bulan }}" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Catat</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="tanggalCatat" name="tanggalCatat" placeholder="Tanggal Catat" value="{{ $tagihan->tanggalCatat }}" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah Meter</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="jumlahMeter" name="jumlahMeter" placeholder="Jumlah Meter" value="{{ $tagihan->jumlahMeter }}" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Meteran</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="fotoMeteran" name="fotoMeteran" placeholder="Foto Meteran" value="{{ $tagihan->fotoMeteran }}" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pegawai Pencatat</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control" id="idPegawai" name="idPegawai"  required>
                                <option value selected="selected">-- Pilih Pegawai --</option>
                                @foreach ($pegawai as $pgw)
                                    <option value="{{$pgw->idPegawai}}"
                                    @if ($pgw->idPegawai == $tagihan->pegawai_id)
                                        selected
                                    @endif
                                    >{{$pgw->namaPegawai}}</option>
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
