@extends('layouts.user')
@section('app')
<div class="row mt-2 text-muted">
    <div class="col-md-9">
        <a href="{{url('/all_page')}}" class="text-decoration-none text-muted"><h5>cash<span class="text-danger">bekas</span>.com</h5></a>
        <h2 class="text-muted">Pasang Iklan</h2>
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
        <h4 class="p-2 mt-1">PILIH KATEGORI IKLAN</h4>
    </div>
    <div class="row mt-4 mb-5">
        <div class="col-md-5 mt-2">
          <div class="list-group" id="list-tab" role="tablist">
            <h5 class="text-muted">Kategori</h5>
            @if(count($categories)>0)
            @foreach ($categories as $category)
                <a class="list-group-item list-group-item-action" id="list-elektronika-list" data-toggle="list" href="#{{$category->slug}}" role="tab" aria-controls="profile">{{$category->category}} <span><i class="bi bi-chevron-right"></i></span> </a>
            @endforeach
            @endif
          </div>
        </div>
        <div class="col-md-7 mt-2">
          <div class="tab-content" id="nav-tabContent">
            <h5 class="text-muted">Sub Kategori</h5>
            @if(count($categories)>0)
            @foreach ($categories as $category)
            <div class="tab-pane fade" id="{{$category->slug}}" role="tabpanel" aria-labelledby="list-elektronika-list">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action" id="list-home-list"  href="{{url('create/'.$category->category.'/'.$category->sub_1)}}" role="tab" aria-controls="home">{{$category->sub_1}} <i class="bi bi-chevron-right"></i></a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"  href="{{url('create/'.$category->category.'/'.$category->sub_2)}}" role="tab" aria-controls="home">{{$category->sub_2}} <i class="bi bi-chevron-right"></i></a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"  href="{{url('create/'.$category->category.'/'.$category->sub_3)}}" role="tab" aria-controls="home">{{$category->sub_3}} <i class="bi bi-chevron-right"></i></a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"  href="{{url('create/'.$category->category.'/'.$category->sub_4)}}" role="tab" aria-controls="home">{{$category->sub_4}} <i class="bi bi-chevron-right"></i></a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"  href="{{url('create/'.$category->category.'/'.$category->sub_5)}}" role="tab" aria-controls="home">{{$category->sub_5}} <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
            @endforeach
            @endif
          </div>
        </div>
    </div>
    <div class="mt-5 mb-5"><br></div>
</div>
@endsection