@extends('layouts.auth')

@section('app')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-muted">Verifikasi Akun Anda</div>

                <div class="card-body text-muted">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Request email verifikasi baru sudah dikirimkan.') }}
                        </div>
                    @endif

                    <p>Sebelum melanjutkan untuk menggunakan situs cashbekas.com, harap melakukan verifikasi pada akun anda.</p>
                    <p>Silahkan cek kotak masuk email yang anda gunakan saat mendaftar.</p>
                    <p>Jika tidak menerima email verifikasi, ajukan verifikasi baru melalui link dibawah ini.</p>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary">Minta email verifikasi ulang.</button>
                    </form>
                </div>
                <div class="text-center text-muted">
                   <p> Kembali ke <a href="{{url('/')}}">Home</a> </p>
                </div>
            </div>
            <div class="text-center">
                <img class="img-fluid" src="https://img.freepik.com/free-vector/quality-control-doodle-concept-product-inspection_107791-10787.jpg" alt="">
            </div>
        </div>
    </div>
</div>
@endsection
