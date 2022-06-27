@extends('layouts.page')

@section('app')
        <div class="mt-2">
            @if($ads[0]->status == 'actived') <a class="btn btn-primary" href="{{url('actived_ads')}}">Back</a> @else <a href="{{url('approve_ads/'.$ads[0]->ads_id)}}" class="btn btn-primary">Approve</a> @endif <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modal_reject_{{$ads[0]->ads_id}}">Reject</button>
        </div>

        <div class="modal fade bd-example-modal-lg" id="modal_reject_{{$ads[0]->ads_id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body mt-2">
                        <div class="p-4">
                            <form class="form-group" action="{{url('reject_ads')}}" method="POST">
                                {{ csrf_field() }}
                                <h5>Reasons</h5>
                                <select name="reason" id="reason" required class="form-control">
                                    <option value="Iklan anda belum memenuhi syarat untuk ditampilkan.">Iklan anda belum memenuhi syarat untuk ditampilkan.</option>
                                    <option value="Iklan anda melanggar kebijakan syarat dan ketentuan beriklan di cashbekas.com">Iklan anda melanggar kebijakan syarat dan ketentuan beriklan di cashbekas.com</option>
                                    <option value="Iklan yang sama telah anda buat sebelumnya, dan ini adalah iklan duplikat.">Iklan yang sama telah anda buat sebelumnya, dan ini adalah iklan duplikat.</option>
                                    <option value="Barang atau Jasa yang anda tawarkan tidak sesuai dengan syarat dan ketentuan berlaku di cashbekas.com">Barang atau Jasa yang anda tawarkan tidak sesuai dengan syarat dan ketentuan berlaku di cashbekas.com</option>
                                </select>
                                <div class="mt-4">
                                    <h6>More Details <span class="small">(Optional)</span> </h6>
                                <textarea class="form-control" name="detail_reason" id="reason" rows="5" placeholder="Reasons why this ads is rejected ..."></textarea>
                                </div>
                                <div class="mt-4">
                                   <button class="btn btn-primary" type="submit">Process</button>
                                   <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <hr>
    <div class="row mt-4">
        <div class="col-md-3">
            <img
            class="img-fluid p-1"
            id="zoom"
            style="max-height:300px; border-radius:10px; overflow:hidden;"
            src="{{url('images/file_upload/'.$ads[0]->photo1)}}" alt="{{$ads[0]->ads_id}}"
            data-toggle="modal" 
            data-target="#modal_view_photo">
            <div class="mt-2">
                <img
                class="img-fluid p-1"
                id="zoom"
                style="max-height:50px; border-radius:10px; overflow:hidden;"
                src="{{url('images/file_upload/'.$ads[0]->photo1)}}" alt="{{$ads[0]->ads_id}}"
                data-toggle="modal" 
                data-target="#modal_view_photo">

                <img
                class="img-fluid p-1"
                id="zoom"
                style="max-height:50px; border-radius:10px; overflow:hidden;"
                src="{{url('images/file_upload/'.$ads[0]->photo2)}}" alt="{{$ads[0]->ads_id}}"
                data-toggle="modal" 
                data-target="#modal_view_photo">

                <img
                class="img-fluid p-1"
                id="zoom"
                style="max-height:50px; border-radius:10px; overflow:hidden;"
                src="{{url('images/file_upload/'.$ads[0]->photo3)}}" alt="{{$ads[0]->ads_id}}"
                data-toggle="modal" 
                data-target="#modal_view_photo">
            </div>            
        </div>
        <div class="col-md-6">
            <div class="text-muted mb-5">
                <h2> <span class="text-danger">[ PREVIEW ]</span> {{$ads[0]->title}}</h2>
                <hr>
                <div class="mt-2">
                    <button class="btn btn-outline-secondary"><h5 class="mt-2" style="font-weight: 700;">Rp. {{$ads[0]->price}} </h5></button>
                </div>
                <div class="mt-3">
                    <div><span style="font-weight: 600">Pada</span> : {{ date('d M Y', strtotime($ads[0]->created_at)) }} </div>
                    <div><span style="font-weight: 600">Kondisi</span> : {{$ads[0]->condition}}</div>
                </div>
                <hr>
                <h5>Detail Iklan</h5>
               <div style="white-space: pre-wrap;">{!!$ads[0]->desc!!} </div>
            </div>
            <hr>
            <div class="card p-3 mt-5">
                <div class="small text-primary">PERHATIAN</div>
                <div class="small text-muted">Harap selalu memastikan semua transaksi berlangsung secara aman dan sehat.</div>
                <div class="small text-muted">cashbekas.com hanyalah sebuah platform jual beli, mempertemukan penjual dan pembeli secara online di internet.</div>
                <div class="small text-muted">Segala jenis kerugian yang ditimbulkan saat terjadinya transaki secara offline semua adalah tanggung jawab penjual dan pembeli.</div>
                <div class="small text-muted">Jika anda butuh bantuan untuk memahami syarat dan ketentuan dalam beriklan, harap baca ketentuan panduan pada <a href="{{url('terms_and_conditions')}}">Link ini</a>.</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="text-muted mt-2">
                <h5>Tentang Penjual</h5>
                <hr>
                <a href="{{url('view_user/'.$user[0]->user_id)}}">
                    <div class="row mt-2">
                        <div class="col-4 text-center">
                            @if($user[0]->photo)
                            <img class="img-thumbnail rounded-circle" src="{{url('images/user_photo/'.$user[0]->photo)}}" alt="">
                            @else
                            <img class="img-thumbnail rounded-circle" src="https://img.freepik.com/free-vector/illustration-user-avatar-icon_53876-5907.jpg" alt="">
                            @endif
                        </div>
                        <div class="col-8">
                            <div style="font-weight:700;"> <i class="bi bi-person-circle"></i> {{$ads[0]->name}} </div>
                            @if ($verified) <span class="small text-success">{{$verified}}</span> @endif
                            <div style="font-weight:400;" class="small"> <i class="bi bi-geo-alt-fill"></i> {{$ads[0]->location}} </div>
                        </div>
                    </div>
                </a>
                <hr>
                <div class="mt-2">
                    <div class="small">Kontak Penjual</div>
                    @guest
                    @if (Route::has('login'))  
                    <a href="{{url('view_user/'.$user[0]->user_id)}}">
                        <div style="font-weight:700;" class="text-primary"> <i class="bi bi-telephone-fill"></i> 08xx xxxx xxxx </div>    
                    </a>    
                    @endif            
                    @else
                    <div style="font-weight:700;" class="text-primary"> <i class="bi bi-telephone-fill"></i> {{$ads[0]->phone}} </div>
                    @endguest
                </div>
                <hr>
                <div class="mt-2">
                    <div class="mt-2 text-muted">
                        <h6>Alamat</h6>
                        @guest
                        @if (Route::has('login'))  
                        <div class="small"><a href="{{url('view_user/'.$user[0]->user_id)}}" class="text-primary">Masuk</a> untuk melihat alamat penjual</div>
                        @endif            
                        @else
                        <div> {{$ads[0]->address}} </div>
                        @endguest
                    </div>
                    <hr>
                    <div class="mt-2 text-muted">
                        <h6>Google Maps</h6>
                    </div>
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q={{$ads[0]->location}}+()&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    
    <div class="mt-5"></div>

    {{-- modal view photo  --}}

    <div class="modal fade" id="modal_view_photo" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body bg-dark text-center">
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <img
                            class="img-fluid"
                            id="zoom"
                            style="max-height:500px; border-radius:5px; overflow:hidden;"
                            src="{{url('images/file_upload/'.$ads[0]->photo1)}}" alt="{{$ads[0]->ads_id}}">
                        </div>
                        <div class="col-md-4">
                            <img
                            class="img-fluid"
                            id="zoom"
                            style="max-height:500px; border-radius:5px; overflow:hidden;"
                            src="{{url('images/file_upload/'.$ads[0]->photo2)}}" alt="{{$ads[0]->ads_id}}">
                        </div>
                        <div class="col-md-4">
                            <img
                            class="img-fluid"
                            id="zoom"
                            style="max-height:500px; border-radius:5px; overflow:hidden;"
                            src="{{url('images/file_upload/'.$ads[0]->photo3)}}" alt="{{$ads[0]->ads_id}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection