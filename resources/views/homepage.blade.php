@extends('layouts.page')

@section('app')

<div class="row mt-4 align-item-center">

    <div class="col-md-3 text-center mt-2">
        <img class="img-fluid" style="width: 200px;" src="https://img.freepik.com/free-vector/add-cart-concept-illustration_114360-1445.jpg?t=st=1654780713~exp=1654781313~hmac=d1de1ee8150283bb4a10886bae8802f79cdf043b957ac27be924673711ccf48e&w=740" alt="">
    </div>

    <div class="col-md-6 text-center mt-4">
        <p class="display-4 text-muted"><span class="text-danger" style="font-weight: 700;">Jual</span> dan <span class="text-primary" style="font-weight: 700;">Beli</span> barang bekas jadi lebih mudah.</p>
    </div>

    <div class="col-md-3 text-center mt-2">
        <img class="img-fluid" style="width: 200px;" src="https://img.freepik.com/free-vector/online-wishes-list-concept-illustration_114360-3900.jpg?t=st=1654762207~exp=1654762807~hmac=d6e413950b6c25715a40d93018f60afe228fb8dead70fcb64ea6f00877a3e891&w=740" alt="">
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
                <i class="bi bi-arrow-right"></i>
            </h4>
        
        </a>

    </div>

</div>

<div class="text-center">

    <img class="img-fluid" src="https://img.freepik.com/free-vector/flat-hand-drawn-flea-market-illustration-with-people_23-2148829660.jpg?t=st=1654787786~exp=1654788386~hmac=565385fe67143d7b08ab34de421baba13becf93befb57bdd5c4ebd5c7dfc7bf3&w=826" alt="">

</div>

<div class="row justify-content-center text-muted">

    <div class="col-md-4">

        <div class="text-center">
            <h3>Kategori Iklan</h3>
            <hr>
        </div>
        <ul>
            <li>Kendaraan</li>
            <li>Properti</li>
            <li>Elektronik</li>
            <li>Rumah Tangga</li>
            <li>Keperluan Sekolah</li>
            <li>Hobby</li>
            <li>dll</li>
        </ul>

    </div>

    <div class="col-md-4 text">

       <div class="text-center">
            <h3>Lokasi Iklan</h3>
            <hr>
       </div>
       <ul>
           <li>Denpasar</li>
           <li>Singaraja</li>
           <li>Gianyar</li>
           <li>Karangasem</li>
           <li>Klungkung</li>
           <li>Bangli</li>
           <li>Tabanan</li>
           <li>Badung</li>
           <li>Nusa Penida</li>
       </ul>

    </div>

    <div class="col-md-4">

        <div class="text-center">
            <h3>Informasi</h3>
            <hr>
        </div>
        <ul>
            <li>Tentang Kami</li>
            <li>Kontak Kami</li>
            <li>Syarat Dan Ketentuan</li>
            <li>Perjanjian Privasi</li>
        </ul>

    </div>

</div>

<div class="mt-2 text-center" style="max-height: 250px; overflow:hidden;">

    <img class="img-fluid" src="https://img.freepik.com/free-vector/large-sale-word-with-shopping-cart-gift-boxes-store-map-with-pointer-realistic-style-vector-illustration_548887-126.jpg?t=st=1654849363~exp=1654849963~hmac=3747d56ee9889041c0afea17d6f29005bde37901042d7790b23176d334123efb&w=740" alt="">

</div>

@endsection