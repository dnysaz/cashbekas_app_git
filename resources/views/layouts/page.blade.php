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
    <title>Cashbekas.com</title>
  </head>
  <style>
    #zoom:hover {
        -ms-transform: scale(1.2); /* IE 9 */
        -webkit-transform: scale(1.2); /* Safari 3-8 */
        transform: scale(1.2); 
    }
    a{
        color: inherit;
    }
    a:hover{
        text-decoration: none;
        color: inherit;
        opacity: .9;
        color: dodgerblue;
    }

    .form-edit {
        border:none;
        border-bottom: 2px solid #eeeeee;
        font-size: 10pt;
    }
  </style>
  <body>

    <div class="row mt-3">

        <div class="col-md-2 text-center">
            <a class="text-muted text-decoration-none" href="{{url('all_page')}}"><h2>cash<span class="text-danger">bekas</span></h2></a>
        </div>

        <div class="col-md-8">

            <form action="" method="GET" >

                <div class="input-group input-group-lg">

                    <input
                        type="text"
                        class="form-control"
                        @auth
                        placeholder="Halo {{auth()->user()->name}}, lagi cari apa nih?"
                        @else
                        placeholder="Halo, lagi cari apa nih?"
                        @endauth
                        name="search"
                        aria-label="Large"
                        aria-describedby="inputGroup-sizing-sm">
    
                    <div class="input-group-prepend">
                      <button class="btn btn-danger" type="submit"> Cari </button>
                    </div> 
    
                </div>

            </form>

            <div class="row mt-2 text-muted">
                <div class="col-md-4 text-center">
                    <p class="small"><a href="#">Kategori Pencarian</a></p>
                </div>
                <div class="col-md-4 text-center">
                    <p class="small"><a href="#">Kategori Iklan</a></p>
                </div>
                <div class="col-md-4 text-center">
                    <p class="small"><a href="#">Lokasi Iklan</a></p>
                </div>
            </div>

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
    
    <hr>

    <div class="container">

        @yield('app')

    </div>

    <footer class="mt-2 bg-dark text-white">
        
        <div class="row">
            <div class="col-md-4 mt-5 text-muted">
                <p class="p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur fugiat ducimus eligendi quo, architecto perferendis iure veniam nobis mollitia ea, iusto natus numquam, harum modi voluptate delectus. Libero, est inventore.</p>
            </div>
            <div class="col-md-4 mt-5 text-muted">
                <p class="p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur fugiat ducimus eligendi quo, architecto perferendis iure veniam nobis mollitia ea, iusto natus numquam, harum modi voluptate delectus. Libero, est inventore.</p>
            </div>
            <div class="col-md-4 mt-5 text-muted">
                <p class="p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur fugiat ducimus eligendi quo, architecto perferendis iure veniam nobis mollitia ea, iusto natus numquam, harum modi voluptate delectus. Libero, est inventore.</p>
            </div>
        </div>

        <div class="text-center text-muted p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright : <a class="text-white" href="{{url('/')}}">cashbekas.com</a>
        </div>

    </footer>
    

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  </body>
</html>