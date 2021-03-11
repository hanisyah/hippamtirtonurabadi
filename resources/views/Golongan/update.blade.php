@extends('master')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Data Golongan</h4>
                </div>
                <div class="card-body">

                <form action="{{url('/golongan/'.$golongan->idGolongan)}}" method="post">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="idGolongan" id="idGolongan">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">kode</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode" value="{{ $golongan->kode }}" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Golongan</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="namaGolongan" name="namaGolongan" value="{{ $golongan->namaGolongan }}" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tarif</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="number" class="form-control" id="tarif" name="tarif" placeholder="Tarif" value="{{ $golongan->tarif }}" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                        <a class="on-default edit-row btn btn-danger" href="{{url('/golongan/')}}"> Kembali</a>
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
