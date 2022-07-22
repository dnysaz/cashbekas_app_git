@extends('layouts.app')

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
                {{-- <i class="bi bi-arrow-right"></i> --}}
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

    <img class="img-fluid" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fliburanbali.net%2Fwp-content%2Fuploads%2F2019%2F06%2FHeader-Image-LB.png&f=1&nofb=1" alt="">

</div>

<footer class="mt-3 mb-5  text-muted">
        
    <div class="row">
        <div class="col-md-4 text-muted">
            <p class="p-2 small">Cashbekas.com adalah sebuah platform digital yang membantu anda anda, masyarakat dan penggerak UMKM dalam rangka mempromosikan barang jualan yang masuk kategori "bekas". Kami membantu menjadikan tempat dimana para penjual dan pembeli bertemu secara digital dengan cepat, mudah dan aman.</p>
        </div>
        <div class="col-md-4 text-muted">
            <p class="p-2 small">Fokus kami adalah membantu memasarkan barang-barang "second hand" yang biasa kita kenal dengan barang bekas. Kenapa barang bekas? karena ini adalah barang yang sudah tidak terpakai bagi seseorang dan mungkin akan berguna bagi orang lainya. Makan kami menyediakan tempat dimana bisa mempertemukan itu.</p>
        </div>
        <div class="col-md-4 text-muted">
            <p class="p-2 small">Kami percaya, diera digital ini semua lini akan masuk pada tempat dimana orang-orang akan mudah untuk mencarinya. Baik itu keperluan rumah tangga, elektronika, kendaraan bahkan properti. Kami ingin menjadi bagian dari perjuangan masyarakat dalam mengiklankan barang atau jasa mereka.</p>
        </div>
    </div>

    <div class="text-center mt-2 mb-2">
        <p class="small text-muted"> Untuk saat ini cashbekas.com hanya dapat diakses dan digunakan oleh masyarakat Bali dan sekitarnya. </p>
    </div>

    <div class="text-center text-muted p-3 mb-5">
        © 2020 Copyright : <a class="text-muted" href="{{url('/')}}">cashbekas.com</a>
    </div>

</footer>  

@endsection