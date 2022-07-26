<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('/css/custom.css')}}">
    {{-- Bootstap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <title>cashbekas.com</title>
  </head>
  <style>
   
  </style>
  <body class="container">

    <div class="d-none d-md-block d-sm-none">
        <div class="row mt-3">

            <div class="col-md-2 text-center">
                <a class="text-muted text-decoration-none" href="{{url('all_page')}}"><h2>cash<span class="text-danger">bekas</span></h2></a>
            </div>
    
            <div class="col-md-8">
    
                <form action="{{url('search_ads')}}" method="get" >
                    {{ csrf_field() }}
                    <div class="input-group input-group-lg">
    
                        <input
                            type="text"
                            class="form-control"
                            @auth
                            placeholder="Halo {{auth()->user()->name}}, lagi cari apa nih?"
                            @else
                            placeholder="Halo, lagi cari apa nih?"
                            @endauth
                            name="search_ads"
                            aria-label="Large"
                            autofocus
                            aria-describedby="inputGroup-sizing-sm">
        
                        <div class="input-group-prepend">
                          <button class="btn btn-danger" type="submit"> Cari </button>
                        </div> 
        
                    </div>
    
                </form>
    
            </div>
            <div class="col-md-2 text-center">
                @auth
                    <a href="{{url('user_dashboard')}}" class="text-muted">Dashboard <br/> <i class="bi bi-person-circle"></i> {{auth()->user()->name}}</a>
                @else
                   <div class="mt-2">
                        <a href="{{url('/login')}}" class="text-muted">Login / Register</a>
                   </div>
                @endauth
            </div>
        </div>
    </div>
    <div class="">
        <div class="mt-4">
            <div id="cashbekas_banner_slide" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#cashbekas_banner_slide" data-slide-to="0" class="active"></li>
                  <li data-target="#cashbekas_banner_slide" data-slide-to="1"></li>
                  <li data-target="#cashbekas_banner_slide" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="img-fluid w-100" src="{{url('images/banners/'.$banners[0]->banner_1)}}" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="img-fluid w-100" src="{{url('images/banners/'.$banners[0]->banner_2)}}" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="img-fluid w-100" src="{{url('images/banners/'.$banners[0]->banner_3)}}" alt="Third slide">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#cashbekas_banner_slide" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#cashbekas_banner_slide" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
    
        <div class="p-2 mt-4">
            <div class="row">
                <div class="col-md-6">
                    <h5>Kategori Iklan</h5>
                    <section class="">
                        <div class="p-2 scroll-horizontal">

                            <div class="item-xs">
                                <a href="{{url('all_page')}}" class="item-category-sm">
                                    <div class="mt-3 text-center">
                                        <div style="border: 1px solid #aaafff; border-radius: 20px;" >
                                            <div class="p-2 text-center">
                                                <img class="img-fluid" src="https://cdn-icons-png.flaticon.com/512/7466/7466368.png" alt="" data-toggle="tooltip" data-placement="bottom" title="Semua Kategori">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            @if (count($categories)>0)
                            @foreach ($categories as $category)
                            <div class="item-xs">
                                <a href="{{url('c/'.$category->category)}}" class="item-category-sm">
                                    <div class="mt-3 text-center">
                                        <div style="border: 1px solid #aaafff; border-radius: 20px;" >
                                            <div class="p-3 text-center">
                                                <img class="img-fluid" src="{{url('/images/icon/'.$category->icon)}}" alt="" data-toggle="tooltip" data-placement="bottom" title="{{$category->category}}">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                            @endif
                            
                            <div class="item-xs">
                                <a href="{{url('/')}}" class="item-category-sm">
                                    <div class="mt-3 text-center">
                                        <div style="border: 1px solid #aaafff; border-radius: 20px;" >
                                            <div class="p-3 text-center">
                                                <img class="img-fluid" src="https://cdn-icons-png.flaticon.com/512/25/25794.png" alt="" data-toggle="tooltip" data-placement="bottom" title="Homepage">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div> <!-- scroll-horizontal.// -->
                    
                    </section>
                </div>
                <div class="col-md-6 d-none d-md-block d-sm-none">
                    <h5>Iklan berdasarkan kondisi</h5>
                    <div class="row">
                        <div class="col-3">
                            <div class="card mt-4 text-center" style="height: 75px; border-radius:10px;">
                               <a href="{{url('condition'.'/'.'bekas')}}" style="margin:auto;"> <span class="small">Bekas</span> </a>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card mt-4 text-center" style="height: 75px; border-radius:10px;">
                                <a href="{{url('condition'.'/'.'bekas-layak-pakai')}}" style="margin:auto;"> <span class="small">Bekas Layak Pakai</span> </a>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card mt-4 text-center" style="height: 75px; border-radius:10px;">
                                <a href="{{url('condition'.'/'.'bekas-seperti-baru')}}" style="margin:auto;"> <span class="small">Bekas Seperti Baru</span> </a>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card mt-4 text-center" style="height: 75px; border-radius:10px;">
                                <a href="{{url('condition'.'/'.'baru')}}" style="margin:auto;"> <span class="small">Baru</span> </a>
                            </div>
                        </div>
                    </div>
                </div>
        
            </div>
        </div>
    </div>
    <div class="">

        @yield('app')

    </div>

    <div class="row mt-5 mb-5">

        @foreach ($categories as $category)
            <div class="col-md-3 mt-4">
                <h6 class="text-muted"><a href="{{url('c/'.$category->category)}}">{{$category->category}}</a></h6>
                <a href="{{url('c/'.$category->category)}}">
                    <div class="small text-muted"> <li>{{$category->sub_1}}</li></div>
                    <div class="small text-muted"> <li>{{$category->sub_2}}</li></div>
                    <div class="small text-muted"> <li>{{$category->sub_3}}</li></div>
                    <div class="small text-muted"> <li>{{$category->sub_4}}</li></div>
                    <div class="small text-muted"> <li>{{$category->sub_5}}</li></div>
                </a>
            </div>
        @endforeach
        
    </div>

    <!-- Bottom Navbar for mobile menu -->
    <nav class="navbar navbar-dark bg-primary navbar-expand fixed-bottom d-md-none d-lg-none d-xl-none p-0">
        <ul class="navbar-nav nav-justified w-100">
            <li class="nav-item">
                <a href="{{url('all_page')}}" class="nav-link text-center">
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-house" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                        <path fill-rule="evenodd"
                            d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                    </svg>
                    <span class="small d-block">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('search_page')}}" class="nav-link text-center">
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                        <path fill-rule="evenodd"
                            d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                    </svg>
                    <span class="small d-block">Cari</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('ads_list')}}" class="nav-link text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-bookmark-star" viewBox="0 0 16 16">
                        <path d="M7.84 4.1a.178.178 0 0 1 .32 0l.634 1.285a.178.178 0 0 0 .134.098l1.42.206c.145.021.204.2.098.303L9.42 6.993a.178.178 0 0 0-.051.158l.242 1.414a.178.178 0 0 1-.258.187l-1.27-.668a.178.178 0 0 0-.165 0l-1.27.668a.178.178 0 0 1-.257-.187l.242-1.414a.178.178 0 0 0-.05-.158l-1.03-1.001a.178.178 0 0 1 .098-.303l1.42-.206a.178.178 0 0 0 .134-.098L7.84 4.1z"/>
                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                    </svg>
                    <span class="small d-block">Iklan Saya</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('user_dashboard')}}" class="nav-link text-center">
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                    </svg>
                    <span class="small d-block">Profile</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  </body>
</html>