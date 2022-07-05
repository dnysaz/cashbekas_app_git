@extends('layouts.user')
@section('app')
<div class="row mt-2 text-muted">
    <div class="col-md-9">
        <a href="{{url('/all_page')}}" class="text-decoration-none text-muted"><h5>cash<span class="text-danger">bekas</span>.com</h5></a>
        <h2>Pasang Iklan</h2>
    </div>
    <div class="col-md-3">
        <div class="row">
            <div class="col-md-5 text-center">
                {{-- <img class="img-thumbnail rounded" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.kindpng.com%2Fpicc%2Fm%2F78-786207_user-avatar-png-user-avatar-icon-png-transparent.png&f=1&nofb=1" alt=""> --}}
            </div>
            <div class="col-md-7 mt-2">
                <div style="font-weight:700;"> <i class="bi bi-person-circle"></i> {{auth()->user()->name}} </div>
                <div style="font-weight:700;"> <a href="{{url('user_dashboard')}}">Dashboard</a></div>
            </div>
        </div>
    </div>
</div>
<div class="mt-4">
    <div class="card text-center text-muted">
        <h3 class="p-2">PILIH KATEGORI IKLAN</h3>
    </div>
    <div class="row mt-4">
        <div class="col-md-5">
          <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-properti-list" data-toggle="list" href="#list-properti" role="tab" aria-controls="home">PROPERTI <i class="bi bi-chevron-right"></i></a>
            <a class="list-group-item list-group-item-action" id="list-elektronika-list" data-toggle="list" href="#list-elektronika" role="tab" aria-controls="profile">ELEKTRONIKA <i class="bi bi-chevron-right"></i></a>
          </div>
        </div>
        <div class="col-md-7">
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-properti" role="tabpanel" aria-labelledby="list-properti-list">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action" id="list-home-list" href="{{url('create/Properti/Sewa-Rumah')}}" role="tab" aria-controls="home">SEWA RUMAH <i class="bi bi-chevron-right"></i></a>
                    <a class="list-group-item list-group-item-action" id="list-profile-list" href="{{url('create/Properti/Jual-Rumah')}}" role="tab" aria-controls="profile">JUAL RUMAH <i class="bi bi-chevron-right"></i></a>
                    <a class="list-group-item list-group-item-action" id="list-messages-list" href="{{url('create/Properti/Sewa-Villa')}}" role="tab" aria-controls="messages">SEWA VILLA <i class="bi bi-chevron-right"></i></a>
                    <a class="list-group-item list-group-item-action" id="list-settings-list" href="{{url('create/Properti/Jual-Villa')}}" role="tab" aria-controls="settings">JUAL VILLA <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
            <div class="tab-pane fade" id="list-elektronika" role="tabpanel" aria-labelledby="list-elektronika-list">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action" id="list-home-list"  href="{{url('create/Eletronika/Komputer')}}" role="tab" aria-controls="home">KOMPUTER <i class="bi bi-chevron-right"></i></a>
                    <a class="list-group-item list-group-item-action" id="list-profile-list" href="{{url('create/Elektronika/Kamera')}}" role="tab" aria-controls="profile">KAMERA <i class="bi bi-chevron-right"></i></a>
                    <a class="list-group-item list-group-item-action" id="list-messages-list" href="{{url('create/Elektronika/Drone')}}" role="tab" aria-controls="messages">DRONE <i class="bi bi-chevron-right"></i></a>
                    <a class="list-group-item list-group-item-action" id="list-settings-list" href="{{url('create/Elektronika/Aksesoris')}}" role="tab" aria-controls="settings">AKSESORIS <i class="bi bi-chevron-right"></i></a>  
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection