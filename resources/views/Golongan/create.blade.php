@extends('master')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Input Data Golongan</h4>
                </div>
                <div class="card-body">
                <form action="{{url('/golongan')}}" method="post">
                    @csrf
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" autocomplete="off" id="kode" name="kode" placeholder="Kode" required>

                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Golongan</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" autocomplete="off" id="namaGolongan" name="namaGolongan" placeholder="Nama Golongan" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tarif</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="number" class="form-control" autocomplete="off" id="tarif" name="tarif" placeholder="Tarif" required>
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
