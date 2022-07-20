<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    {{-- Bootstap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <title>Testing Page</title>
  </head>
  <style>
    .scroll-horizontal {
    white-space: nowrap;
    overflow-x: scroll;
    }
    .scroll-horizontal .item,
    .scroll-horizontal .item-xs,
    .scroll-horizontal > div {
    display: inline-block;
    vertical-align: top;
    white-space: initial;
    margin-right: 5px;
    margin-bottom: 0.3125rem;
    }
    .scroll-horizontal .item-xs {
    width: 72px;
    }
    .scroll-horizontal .product .img-wrap {
    height: 135px;
    }
    .scroll-horizontal .product-book .img-wrap {
    height: 200px;
    }

    ul.row,
    ul.row-sm {
    list-style: none;
    padding: 0;
    margin-bottom: 0;
    }

    a[class*="product"] {
    color: initial;
    }
    a[class*="product"]:hover .title {
    color: #0d6efd;
    }
    [class*="product"] {
    color: initial;
    display: block;
    }
    [class*="product"] .title {
    color: #495057;
    display: block;
    }
    [class*="product"] .badge {
    top: 10px;
    left: 10px;
    position: absolute;
    }
    [class*="product"] .img-wrap {
    background-color: #f2f2f2;
    border: 1px solid #e9ecef;
    position: relative;
    overflow: hidden;
    }
    [class*="product"] .img-wrap img {
    height: 100%;
    width: 100%;
    display: inline-block;
    -o-object-fit: cover;
    object-fit: cover;
    mix-blend-mode: multiply;
    }
    [class*="product"] p {
    margin-bottom: 0;
    }
    [class*="product"]:hover .img-wrap {
    border: 1px solid #ced4da;
    }
    [class*="product"]:active .img-wrap {
    border: 1px solid #ced4da;
    }
    [class*="product"] .price-wrap {
    line-height: 1.2;
    }
    .product .img-wrap {
    height: 165px;
    border-radius: 0.36rem;
    }
    .product .img-wrap.lg {
    height: 210px;
    }
    .product .img-wrap.img-book img {
    mix-blend-mode: normal;
    }
    .product .info-wrap {
    overflow: hidden;
    padding: 1.25rem;
    color: #212529;
    }
    .product .text-wrap {
    padding-top: 0.625rem;
    line-height: 1.25;
    }
    .product .title {
    font-size: 0.875rem;
    }
    .product .price {
    font-weight: 600;
    }
    .product-book .img-wrap {
    height: 220px;
    border-radius: 0.36rem;
    }
    .product-book .img-wrap img {
    mix-blend-mode: normal;
    }
    .product-book .text-wrap {
    padding-top: 0.625rem;
    line-height: 1.25;
    }
    .product-book .price {
    font-size: 0.875rem;
    color: #adb5bd;
    }
    .scroll-horizontal .product .img-wrap {
    height: 135px;
    }
    .scroll-horizontal .product-book .img-wrap {
    height: 200px;
    }
    .product-list {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    }
    .product-list .rating-wrap {
    margin-bottom: 5px;
    }
    .product-list .img-wrap {
    display: block;
    height: 120px;
    width: 130px;
    background-color: #e9ecef;
    border-radius: 0.5rem;
    }
    .product-list .img-wrap img {
    mix-blend-mode: normal;
    }
    .product-list .img-wrap.lg {
    height: 210px;
    }
    .product-list .info-wrap {
    overflow: hidden;
    padding-left: 0.625rem;
    color: #212529;
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: 70%;
    }
  </style>
  <body>

    <div class="container">
        <div class="row mt-1">
            <div class="col-10">
                <input type="text" name="" placeholder="Lagi cari apa nih?" class="form-control" id="">
            </div>
            <div class="col-2 mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
            </div>
        </div>
        <div class="mt-2">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="https://images.tokopedia.net/img/cache/1208/NsjrJu/2022/7/5/65140579-1537-43b2-a88d-4c773b9b7bdb.jpg.webp?ect=3g" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="https://images.tokopedia.net/img/cache/1208/NsjrJu/2022/7/5/34f69665-c953-42f2-b2bd-9b1f5923370a.jpg.webp?ect=3g" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="https://images.tokopedia.net/img/cache/1208/NsjrJu/2022/7/5/34f69665-c953-42f2-b2bd-9b1f5923370a.jpg.webp?ect=3g" alt="Third slide">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
        <section class="">
            <div class="p-2 scroll-horizontal">
                <div class="item-xs">
                    <a href="#" class="item-category-sm">
                        <div class="mt-3 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            <div class="small text-muted"> Eletronika </div>
                        </div>
                    </a>
                </div>
                <div class="item-xs">
                    <a href="#" class="item-category-sm">
                        <div class="mt-3 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            <div class="small text-muted"> Kendaraan </div>
                        </div>
                    </a>
                </div>
                <div class="item-xs">
                    <a href="#" class="item-category-sm">
                        <div class="mt-3 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            <div class="small text-muted"> Properti </div>
                        </div>
                    </a>
                </div>
                <div class="item-xs">
                    <a href="#" class="item-category-sm">
                        <div class="mt-3 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            <div class="small text-muted"> Rumah Tangga </div>
                        </div>
                    </a>
                </div>
                <div class="item-xs">
                    <a href="#" class="item-category-sm">
                        <div class="mt-3 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            <div class="small text-muted"> Kebutuhan Anak </div>
                        </div>
                    </a>
                </div>
                <div class="item-xs">
                    <a href="#" class="item-category-sm">
                        <div class="mt-3 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            <div class="small text-muted"> Kerja Jasa </div>
                        </div>
                    </a>
                </div>
                <div class="item-xs">
                    <a href="#" class="item-category-sm">
                        <div class="mt-3 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            <div class="small text-muted"> Hobby </div>
                        </div>
                    </a>
                </div>
                <div class="item-xs">
                    <a href="#" class="item-category-sm">
                        <div class="mt-3 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            <div class="small text-muted"> Alat Sekolah </div>
                        </div>
                    </a>
                </div>
            </div> <!-- scroll-horizontal.// -->
        
        </section>

        <section>
            <div class="">
                <ul class="row m-0">
                    <li class="col-6 col-sm-4 col-md-3">
                        <a href="#" class="product mb-3">
                            <div class="img-wrap"> <img src="images/items/3.jpg"> </div>
                            <div class="text-wrap">
                                <div class="price">$17.00</div> <!-- price.// -->
                                <p class="title text-truncate">Amazing item name</p>
                            </div>
                        </a>
                    </li> <!-- col.// -->
                    <li class="col-6 col-sm-4 col-md-3">
                        <a href="#" class="product mb-3">
                            <div class="img-wrap"> <img src="images/items/2.jpg"> </div>
                            <div class="text-wrap">
                                <div class="price">$17.00</div> <!-- price.// -->
                                <p class="title text-truncate">Great product name is just here</p>
                            </div>
                        </a>
                    </li> <!-- col.// -->
                    <li class="col-6 col-sm-4 col-md-3">
                        <a href="#" class="product mb-3">
                            <div class="img-wrap"> <img src="images/items/1.jpg"> </div>
                            <div class="text-wrap">
                                <div class="price">$17.00</div> <!-- price.// -->
                                <p class="title text-truncate">Great product name is here</p>
                            </div>
                        </a>
                    </li> <!-- col.// -->
                    <li class="col-6 col-sm-4 col-md-3">
                        <a href="#" class="product mb-3">
                            <div class="img-wrap"> <img src="images/items/2.jpg"> </div>
                            <div class="text-wrap">
                                <div class="price">$17.00</div> <!-- price.// -->
                                <p class="title text-truncate">Name of the item</p>
                            </div>
                        </a>
                    </li> <!-- col.// -->
                    <li class="col-6 col-sm-4 col-md-3">
                        <a href="#" class="product mb-3">
                            <div class="img-wrap"> <img src="images/items/3.jpg"> </div>
                            <div class="text-wrap">
                                <div class="price">$17.00</div> <!-- price.// -->
                                <p class="title text-truncate">Produt name</p>
                            </div>
                        </a>
                    </li> <!-- col.// -->
                    <li class="col-6 col-sm-4 col-md-3">
                        <a href="#" class="product mb-3">
                            <div class="img-wrap"> <img src="images/items/4.jpg"> </div>
                            <div class="text-wrap">
                                <div class="price">$17.00</div> <!-- price.// -->
                                <p class="title text-truncate">Great product name </p>
                            </div>
                        </a>
                    </li> <!-- col.// -->
                    <li class="col-6 col-sm-4 col-md-3">
                        <a href="#" class="product mb-3">
                            <div class="img-wrap"> <img src="images/items/5.jpg"> </div>
                            <div class="text-wrap">
                                <div class="price">$17.00</div> <!-- price.// -->
                                <p class="title text-truncate">Name of the item</p>
                            </div>
                        </a>
                    </li> <!-- col.// -->
                    <li class="col-6 col-sm-4 col-md-3">
                        <a href="#" class="product mb-3">
                            <div class="img-wrap"> <img src="images/items/6.jpg"> </div>
                            <div class="text-wrap">
                                <div class="price">$17.00</div> <!-- price.// -->
                                <p class="title text-truncate">Great product nam</p>
                            </div>
                        </a>
                    </li> <!-- col.// -->
                </ul> <!-- row.// -->
        
            </div>
        </section>

    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  </body>
</html>