@extends('layouts.auth')

@section('app')

    <div class="row justify-content-center mt-5">

        <div class="col-md-4 mt-5">

            <h3 class="text-center">REGISTER</h3>

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

            <div class="mt-4">

                <form action="{{url('register')}}" method="POST" class="form-group">

                    {{ csrf_field() }}

                    <div class="mt-2">

                        <input
                        type="text" 
                        name="name" 
                        id="name" 
                        class="form-control @error('name') is-invalid @enderror" 
                        value="{{old('name')}}"
                        placeholder="Name">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="mt-2">

                        <input
                        type="text" 
                        name="username" 
                        id="username" 
                        class="form-control @error('username') is-invalid @enderror"
                        value="{{old('username')}}"
                        placeholder="Username">

                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="mt-2">

                        <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{old('email')}}"
                        placeholder="Email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="mt-2">

                        <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="mt-2">

                        <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        placeholder="Password Confirmation">

                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="mt-5">

                        <input
                        type="submit"
                        name=""
                        id="submit"
                        class="form-control btn btn-primary"
                        value="Register">

                    </div>

                    <div class="mt-4 text-muted">

                        <p>Sudah punya akun ? <a href="{{url('login')}}">Masuk</a> </p>

                    </div>

                </form>

            </div>

        </div>

        <div class="col-md-8 text-center">

            <img class="img-fluid" style="width: 90%;" src="https://img.freepik.com/free-vector/mobile-login-concept-illustration_114360-135.jpg?t=st=1654754198~exp=1654754798~hmac=fdff84ac0d4d90eaf824b00b0add1daeec8ca19da17438236e79939d0e6dc5d2&w=740" alt="gambar">

        </div>

    </div>

@endsection