@extends('master')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Input Data Tagihan</h4>
                </div>
                <div class="card-body">
                <form action="{{url('/tagihan')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pelanggan</label>
                        <div class="col-sm-12 col-md-7">
                            {{-- <input type="text" class="form-control" id="namaPelanggan" name="namaPelanggan" placeholder="Nama Pelanggan"> --}}
                            <select class="form-control" placeholder="-- Select Nama Pelanggan --" id="idPelanggan" name="idPelanggan" onchange="setInput(this)"  required>
                                <option value selected="selected">-- Pilih Pelanggan --</option>
                                @foreach ($pelanggan as $plgn)
                                    <option value="{{$plgn->idPelanggan}}">{{$plgn->namaPelanggan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Meter</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="kodeMeter" name="kodeMeter" placeholder="Kode Meter">
                            {{-- <select class="form-control" placeholder="-- Select Kode Meter --" id="idPelanggan" name="idPelanggan"  required>
                                <option value selected="selected">-- Pilih Pelanggan --</option>
                                @foreach ($pelanggan as $plgn)
                                    <option value="{{$plgn->idPelanggan}}">{{$plgn->kodeMeter}}</option>
                                @endforeach
                            </select> --}}
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Golongan</label>
                        <div class="col-sm-12 col-md-7">
                            {{-- <input type="text" class="form-control" id="namaPelanggan" name="namaPelanggan" placeholder="Golongan"> --}}
                            <select class="form-control" placeholder="-- Select Golongan --" id="idGolongan" name="idGolongan"  required>
                                <option value selected="selected">-- Pilih Golongan --</option>
                                @foreach ($golongan as $plgn)
                                    <option value="{{$plgn->idGolongan}}">{{$plgn->namaGolongan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tahun</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="number" class="form-control" autocomplete="off" id="tahun" name="tahun" placeholder="Tahun">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bulan</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" autocomplete="off" id="bulan" name="bulan" placeholder="Bulan">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Catat</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="date" class="form-control" autocomplete="off" id="tanggalCatat" name="tanggalCatat" placeholder="Tanggal Catat">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah Meter Kemarin</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="number" class="form-control" autocomplete="off" id="jumlahMeterKemarin" name="jumlahMeterKemarin" placeholder="Jumlah Meter Kemarin">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah Meter</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="number" class="form-control" autocomplete="off" id="jumlahMeter" name="jumlahMeter" placeholder="Jumlah Meter">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Meteran</label>
                        <div class="col-sm-12 col-md-7">
                            {{-- <input type="text" class="form-control" id="fotoMeteran" name="fotoMeteran" placeholder="Foto Meteran" value="{{ $tagihan->fotoMeteran }}" required> --}}
                            {{-- <img src="" id="profile-img-tag" width="200px" /> --}}
                            <input type="file" name="fotoMeteran" id="fotoMeteran" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pegawai Pencatat</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control" id="idPegawai" name="idPegawai"  required>
                                <option value selected="selected">-- Pilih Pegawai --</option>
                                @foreach ($pegawai as $pgw)
                                    <option value="{{$pgw->idPegawai}}">{{$pgw->namaPegawai}}</option>
                                @endforeach
                            </select>
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
            url: '{{ url('/tagihan/get-data/') }}',
            type: 'POST',
            data: 'idPelanggan=' + value,
            dataType: 'JSON',
            success: function(response){
                $("#kodeMeter").val(response.result.kodeMeter);
                $("#idGolongan").val(response.result.golongan_id).change();
            }
        })
    }
</script>
