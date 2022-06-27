@extends('layouts.page')

@section('app')

    <section id="category" class="mt-4 text-center">
        {{-- c fot category  --}}
        <span class="badge badge-pill badge-danger p-2"><a href="{{url('/')}}" class="text-light text-decoration-none"><h6 class="mt-2">Home</h6></a></span>

        <span class="badge badge-pill badge-primary p-2"><a href="{{url('c/'.'Properti')}}" class="text-light text-decoration-none"><h6 class="mt-2">Properti</h6></a></span>
        <span class="badge badge-pill badge-danger p-2"><a href="{{url('c/'.'Elektronik')}}" class="text-light text-decoration-none"><h6 class="mt-2">Elektronik</h6></a></span>
        <span class="badge badge-pill badge-success p-2"><a href="{{url('c/'.'Kendaraan')}}" class="text-light text-decoration-none"><h6 class="mt-2">Kendaraan</h6></a></span>
        <span class="badge badge-pill badge-warning p-2"><a href="{{url('c/'.'Alat Sekolah')}}" class="text-light text-decoration-none"><h6 class="mt-2">Alat Sekolah</h6></a></span>
        <span class="badge badge-pill badge-primary p-2"><a href="{{url('c/'.'Rumah Tangga')}}" class="text-light text-decoration-none"><h6 class="mt-2">Rumah Tangga</h6></a></span>
        <span class="badge badge-pill badge-success p-2"><a href="{{url('c/'.'Hobby')}}" class="text-light text-decoration-none"><h6 class="mt-2">Hobby</h6></a></span>
        <span class="badge badge-pill badge-danger p-2"><a href="{{url('c/'.'Keperluan Anak')}}" class="text-light text-decoration-none"><h6 class="mt-2">Keperluan Anak</h6></a></span>
    </section>
    <section id="location" class="mt-2 text-center">
        {{-- l for location  --}}
        <span class="badge badge-pill badge-danger p-2"><a href="{{url('l/'.'Denpasar')}}" class="text-light text-decoration-none"><h6 class="mt-2">Denpasar</h6></a></span>
        <span class="badge badge-pill badge-primary p-2"><a href="{{url('l/'.'Karangasem')}}" class="text-light text-decoration-none"><h6 class="mt-2">Karangasem</h6></a></span>
        <span class="badge badge-pill badge-success p-2"><a href="{{url('l/'.'Klungkung')}}" class="text-light text-decoration-none"><h6 class="mt-2">Klungkung</h6></a></span>
        <span class="badge badge-pill badge-warning p-2"><a href="{{url('l/'.'Gianyar')}}" class="text-light text-decoration-none"><h6 class="mt-2">Gianyar</h6></a></span>
        <span class="badge badge-pill badge-danger p-2"><a href="{{url('l/'.'Singaraja')}}" class="text-light text-decoration-none"><h6 class="mt-2">Singaraja</h6></a></span>
        <span class="badge badge-pill badge-success p-2"><a href="{{url('l/'.'Tabanan')}}" class="text-light text-decoration-none"><h6 class="mt-2">Tabanan</h6></a></span>
        <span class="badge badge-pill badge-primary p-2"><a href="{{url('l/'.'Bangli')}}" class="text-light text-decoration-none"><h6 class="mt-2">Bangli</h6></a></span>
        <span class="badge badge-pill badge-success p-2"><a href="{{url('l/'.'Badung')}}" class="text-light text-decoration-none"><h6 class="mt-2">Badung</h6></a></span>
        <span class="badge badge-pill badge-warning p-2"><a href="{{url('l/'.'Nusa Penida')}}" class="text-light text-decoration-none"><h6 class="mt-2">Nusa Penida</h6></a></span>

        <span class="badge badge-pill badge-danger p-2"><a href="{{url('create_ads')}}" class="text-light text-decoration-none"><h6 class="mt-2">+ Pasang Iklan</h6></a></span>
    </section>
    <section id="new_ads" class="mt-4">
        <div class="mt-2">
            <h5 class="text-muted">Anda tinggal di {{$location}} ? temukan kebutuhan anda disini. </h5>
            <hr>
        </div>
        <div class="row mt-2 justify-content-center">
            @if(count($ads)>0)
            @foreach ($ads as $ad)
            <div class="col-md-3 p-2">
                <a href="{{url($ad->category.'/'.$ad->location.'/'.$ad->link.'/'.$ad->user_id)}}" class="text-decoration-none">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <img class="img-fluid p-1" style="max-height:200px; border-radius:10px; overflow:hidden;" src="{{url('images/file_upload/'.$ad->photo1)}}" alt="{{$ad->ads_id}}">
                            </div>
                            <div style="font-weight:700;">Rp. {{$ad->price}}</div>
                            <div class="text-dark small">{{$ad->title}}</div>
                            <div class="text-primary small mt-1"><i class="bi bi-geo-alt-fill"></i> {{$ad->location}} / {{$ad->created_at->diffForHumans()}}</div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @else
            <div class="mt-4 text-muted">
                <h4>Belum ada iklan yang dapat ditampilkan</h4>
            </div>
            @endif
        </div>
    <div class="text-center mt-5 mb-5">
        <button class="btn btn-lg btn-secondary">Lihat Lainnya</button>
    </div> 
 
@endsection