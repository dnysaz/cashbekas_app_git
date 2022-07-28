@extends('layouts.app')

@section('app')

<div class="row mt-4 align-item-center">

    <div class="col-md-3 text-center mt-2">
        <img class="img-fluid" style="width: 200px;" src="{{url('images/main_pages/'.$main_pages[0]->left_image)}}" alt="">
    </div>

    <div class="col-md-6 text-center mt-4">
        <p class="display-4 text-muted">{!!$main_pages[0]->header_text!!}</p>
    </div>

    <div class="col-md-3 text-center mt-2">
        <img class="img-fluid" style="width: 200px;" src="{{url('images/main_pages/'.$main_pages[0]->right_image)}}" alt="">
    </div>

</div>

<div class="row mt-5 justify-content-center">

    <div class="col-md-3 text-center">

        <a href="{{url('create_ads')}}" class="text-decoration-none btn btn-primary">
            
            <h4 class="mt-1">Pasang Iklan</h4>
        
        </a>

        <div class="p-2 text-muted">Atau</div>

        <a href="{{url('all_page')}}" class="text-decoration-none">
            
            <h4 class="text-muted p-2" style="border:2px solid grey; border-radius:5px;">Mau lihat-lihat dulu 
                {{-- <i class="bi bi-arrow-right"></i> --}}
            </h4>
        
        </a>

    </div>

</div>

<div class="text-center">

    <img class="img-fluid" src="{{url('images/main_pages/'.$main_pages[0]->body_image)}}" alt="">

</div>

<div class="row justify-content-center text-muted">

    <div class="col-md-4">

        <div class="text-center">
            <h3>Kategori Iklan</h3>
            <hr>
        </div>
        <ul>
            @foreach( $categories as $category)
                <li><a href="{{url('c/'.$category->category)}}">{{$category->category}}</a></li>
            @endforeach
        </ul>

    </div>

    <div class="col-md-4 text">

       <div class="text-center">
            <h3>Lokasi Iklan</h3>
            <hr>
       </div>
       <ul>
           @foreach ($locations as $location)
               <li><a href="{{url('l/'.$location->regency)}}">{{$location->regency}}</a></li>
           @endforeach
       </ul>

    </div>

    <div class="col-md-4">

        <div class="text-center">
            <h3>Informasi</h3>
            <hr>
        </div>
        <ul>
            <li><a href="#">Tentang Kami</a></li>
            <li><a href="#">Kontak Kami</a></li>
            <li><a href="#">Syarat Dan Ketentuan</a></li>
            <li><a href="#">Perjanjian Privasi</a></li>
        </ul>

    </div>

</div>

<div class="mt-2 text-center" style="max-height: 550px; overflow:hidden;">

    <img class="img-fluid" src="{{url('images/main_pages/'.$main_pages[0]->bottom_image)}}" alt="">

</div>

<footer class="mt-3 mb-5  text-muted">
        
    <div class="row">
        <div class="col-md-4 text-muted">
            <p class="p-2 small">{!!$footers[0]->left_text!!}</p>
        </div>
        <div class="col-md-4 text-muted">
            <p class="p-2 small">{!!$footers[0]->middle_text!!}</p>
        </div>
        <div class="col-md-4 text-muted">
            <p class="p-2 small">{!!$footers[0]->right_text!!}</p>
        </div>
    </div>

    <div class="text-center mt-2 mb-2">
        <p class="small text-muted">{!!$footers[0]->bottom_text!!}</p>
    </div>

    <div class="text-center text-muted p-3 mb-5">{!!$footers[0]->copyright_text!!}</div>

</footer>  

@endsection