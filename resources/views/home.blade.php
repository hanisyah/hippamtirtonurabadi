@extends('master')
@section('content')
<section class="section">
    <div class="card">
        <div class="card-body">
        <nav class="navbar bg-primary">
            <marquee direction="left" scrollamount="4" align="center"
                class="navbar-brand" behavior="alternate">Selamat Datang  {{ Auth::user()->username }}!</marquee>
            {{-- <a class="navbar-brand" href="#">Selamat Datang  {{ Auth::user()->username }}!</a> --}}
        </nav>
        </div>
    </div>
    <div class="row ">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
        <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
            <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                    <h5 class="font-15">Pelanggan</h5>
                    <h2 class="mb-3 font-18">{{ $pelanggan }}</h2>
                    {{-- <p class="mb-0"><span class="col-green">10%</span> Increase</p> --}}
                </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                    <img src="{{ url('otika/assets/img/banner/2.png')}}" alt="">
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
        <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
            <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                    <h5 class="font-15"> Golongan</h5>
                    <h2 class="mb-3 font-18">{{ $golongan }}</h2>
                    {{-- <p class="mb-0"><span class="col-orange">09%</span> Decrease</p> --}}
                </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                    <img src="{{ url('otika/assets/img/banner/3.png')}}" alt="">
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
        <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
            <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                    <h5 class="font-15">Pegawai</h5>
                    <h2 class="mb-3 font-18">{{ $pegawai }}</h2>
                    {{-- <p class="mb-0"><span class="col-green">18%</span>
                    Increase</p> --}}
                </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                    <img src="{{ url('otika/assets/img/banner/1.png')}}" alt="">
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
        <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
            <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                    <h5 class="font-15">Tagihan Air</h5>
                    <h2 class="mb-3 font-18">{{ $tagihan }}</h2>
                    {{-- <p class="mb-0"><span class="col-green">42%</span> Increase</p> --}}
                </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                    <img src="{{ url('otika/assets/img/banner/4.png')}}" alt="">
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
@endsection
