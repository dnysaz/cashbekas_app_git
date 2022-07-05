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
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="https://code.jquery.com/jquery-1.5.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
    <script src="{{ asset('js/rupiah.js') }}" defer></script>
    <title>Pasang Iklan Baru - cashbekas.com</title>
  </head>

 <style>
    a{
        text-decoration: none !important;
    }
 </style>

  <body>
    <div class="container">
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
        <hr>

        {{-- error  --}}

        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {!!session('success')!!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {!!session('error')!!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="mt-4 card">
            <h5 class="p-2 mt-1 text-muted">Kategori : {{$category}} <i class="bi bi-chevron-right"></i> {{$sub_category}} <i class="bi bi-chevron-right"></i> <a href="{{url('create_ads')}}">Ubah Kategori</a> </h5>
        </div>

        <form action="{{url('create_ads')}}" onsubmit="return validate()" name="createForm" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row mt-4 mb-5 text-muted justify-content-center">
                <input type="hidden" name="category" value="{{$category}}">
                <input type="hidden" name="sub_category" value="{{$sub_category}}">
                <div class="col-md-8">
                    <h4 class="text-primary">Details Iklan</h4>
                    <span class="text-muted small">Berikan informasi sejelas mungkin tentang barang atau produk yang anda tawarkan.</span>
                    <div class="mt-3"><hr></div>
                    <h5>Pilih Foto Iklan</h5>
                    <div class="small text-muted">Foto wajib diisi 3 foto.</div>
                    <div class="row mt-3">
                        <div class="col-md-4 text-center">
                            <div class="p-3" style="border: 2px solid #eeee; border-radius:20px;">
                                <img class="img-fluid" style="width: 150px;" id="preview_1">
                                <input
                                class="mt-1"
                                type="file"
                                accept="image/*"
                                name="photo1"
                                id="photo1"
                                class="@error('photo1') is-invalid @enderror"
                                onchange="previewImage1(event)"
                                style="color:transparent; width:100px;"/>
                                <div class="mt-2">Foto utama</div>
                                @error('photo1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="p-3" style="border: 2px solid #eeee; border-radius:20px;">
                                <img class="img-fluid" style="width: 150px;" id="preview_2">
                                <input
                                class="mt-1"
                                type="file"
                                accept="image/*"
                                name="photo2"
                                id="photo2"
                                onchange="previewImage2(event)"
                                style="color:transparent; width:105px;"/>
                                <div class="mt-2">Foto 2</div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="p-3" style="border: 2px solid #eeee; border-radius:20px;">
                                <img class="img-fluid" style="width: 150px;" id="preview_3">
                                <input
                                class="mt-1"
                                type="file"
                                accept="image/*"
                                name="photo3"
                                id="photo3"
                                onchange="previewImage3(event)"
                                style="color:transparent; width:105px;"/>
                                <div class="mt-2">Foto 3</div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4"><h5>Judul Iklan</h5></div>
                    <div class="mt-2">
                        <label for="title" class="small text-muted">Berikan judul yang menarik untuk pembeli anda. <span id="charNum" ></span> / 160 karakter.</label>
                        <input
                        type="text"
                        name="title"
                        id="title"
                        value="{{old('title')}}"
                        onkeyup="countChar(this)"
                        class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-4"><h5>Harga</h5></div>
                            <label for="price" class="small text-muted">Berikan harga yang sesuai dengan barang yang anda jual.</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp. </span>
                                </div>
                                <input
                                type="text"
                                name="price"
                                id="price"
                                value="{{old('price')}}"
                                class="form-control @error('price') is-invalid @enderror">
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mt-4"><h5>Kondisi</h5></div>
                            <label for="condition" class="small text-muted">Berikan informasi mengenai kondisi barang yang anda jual.</label>
                             <select name="condition" id="condition" class="form-control @error('condition') is-invalid @enderror"">
                                <option value="">Pilih kondisi</option>
                                <option value="Bekas">Bekas</option>
                                <option value="Bekas Layak Pakai">Bekas Layak Pakai</option>
                                <option value="Bekas Seperti Baru">Bekas Seperti Baru</option>
                                <option value="Baru">Baru</option>
                             </select>
                             @error('condition')
                             <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                             @enderror
                        </div>
                    </div>
                    <div class="mt-4">
                        <div><h5>Deskripsi </h5></div>
                        <label for="desc" class="small text-muted">Berikan detail deskripsi mengenai barang yang anda jual.</label>
                        <textarea
                        name="desc"
                        id="desc"
                        rows="5"
                        value="{{old('desc')}}"
                        class="form-control @error('desc') is-invalid @enderror">{{old('desc')}}</textarea>
                        @error('desc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <h4 class="text-primary mt-5">Identitas Anda</h4>
                    <span class="small text-muted">Berisi informasi mengenai data diri pengiklan, berdasarkan profile anda. <a href="{{url('user_dashboard')}}">Ubah Profile.</a> </span>
                    <div class="mt-2"><hr></div>
                    <div class="mt-4">
                        <div><h5>Lokasi Anda </h5></div>
                        <label for="location" class="small text-muted">Berikan alamat lokasi anda secara tepat dan benar.</label>
                        <select name="location" id="location" class="form-control @error('location') is-invalid @enderror">
                            <option value="">Pilih Lokasi</option>
                            <option value="Denpasar" {{ $user[0]->location == 'Denpasar' ? 'selected' : '' }}>Denpasar</option>
                            <option value="Badung" {{ $user[0]->location == 'Badung' ? 'selected' : '' }}>Badung</option>
                            <option value="Gianyar" {{ $user[0]->location == 'Gianyar' ? 'selected' : '' }}>Gianyar</option>
                            <option value="Klungkung" {{ $user[0]->location == 'Klungkung' ? 'selected' : '' }}>Klungkung</option>
                            <option value="Bangli" {{ $user[0]->location == 'Bangli' ? 'selected' : '' }}>Bangli</option>
                            <option value="Karangasem" {{ $user[0]->location == 'Karangasem' ? 'selected' : '' }}>Karangasem</option>
                            <option value="Singaraja" {{ $user[0]->location == 'Singaraja' ? 'selected' : '' }}>Singaraja</option>
                            <option value="Negara" {{ $user[0]->location == 'Negara' ? 'selected' : '' }}>Negara</option>
                            <option value="Tabanan" {{ $user[0]->location == 'Tabanan' ? 'selected' : '' }}>Tabanan</option>
                            <option value="Nusa-Penida" {{ $user[0]->location == 'Nusa-Penida' ? 'selected' : '' }}>Nusa Penida</option>
                        </select>
                        @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <div><h5>Alamat Anda </h5></div>
                        <label for="address" class="small text-muted">Berikan alamat lokasi anda secara tepat dan benar.</label>
                        <input
                        type="text"
                        name="address"
                        id="address"
                        value="{{$user[0]->address}}"
                        class="form-control @error('address') is-invalid @enderror">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-4">
                                <div><h5>Nama Anda </h5></div>
                                <label for="name" class="small text-muted">Sesuaikan nama anda yang akan tampil diiklan anda.</label>
                                <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{$user[0]->name}}"
                                class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mt-4">
                                <div><h5>Kontak Anda </h5></div>
                                <label for="phone" class="small text-muted">Berikan nomor telepon yang benar.</label>
                                <input
                                type="number"
                                name="phone"
                                id="phone"
                                value="{{$user[0]->phone}}"
                                class="form-control @error('phone') is-invalid @enderror">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="p-3 mt-2">
                            <div><h5>Syarat Dan Ketentuan</h5></div>
                            <input
                            type="checkbox"
                            name="agreement"
                            value="Agree"
                            id="agreement"
                            class="@error('agreement') is-invalid @enderror">
                            <span for="agreement" class="text-muted">Setuju </span>
                            @error('agreement')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <p class="small mt-1">Dengan mengklik setuju mendakan saya telah menerima semua <a href="#">Syarat Dan Ketentuan</a> dalam mengiklankan barang atau jasa yang saya tawarkan.</p> 
                        </div>
                        <div class="p-3 mt-3 mb-5">
                            <input type="checkbox" name="draft" value="draft" id="draft">
                            <span for="draft" class="text-muted">Simpan sebagai draft </span>
                            <br>
                            <button type="submit" class="btn btn-lg btn-outline-primary mt-2">Pasang Iklan</button>
                        </div> 
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        // js for image preview
        const previewImage1 = e => {
           const preview = document.getElementById('preview_1');
           preview.src = URL.createObjectURL(e.target.files[0]);
           preview.onload = () => URL.revokeObjectURL(preview.src);
        };
        const previewImage2 = e => {
           const preview = document.getElementById('preview_2');
           preview.src = URL.createObjectURL(e.target.files[0]);
           preview.onload = () => URL.revokeObjectURL(preview.src);
        };
        const previewImage3 = e => {
           const preview = document.getElementById('preview_3');
           preview.src = URL.createObjectURL(e.target.files[0]);
           preview.onload = () => URL.revokeObjectURL(preview.src);
        };
    </script>
    </textarea>
    <script>
        function countChar(val) {
          var len = val.value.length;
          if (len >= 160) {
            val.value = val.value.substring(0, 500);
          } else {
            $('#charNum').text(160 - len);
          }
        };
    </script>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  </body>
</html>