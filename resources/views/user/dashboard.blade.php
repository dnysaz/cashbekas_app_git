@extends('layouts.app')

@section('app')

<div class="mt-3 text-muted">

    <div class="row mb-5">

        <div class="col-md-4">
            <h3>Profile Anda </h3>
            <hr>
            <div class="row mt-4">

                <div class="col-4">

                    @if($user[0]->photo)
                    <img class="img-thumbnail rounded-circle" src="{{url('images/user_photo/'.$user[0]->photo)}}" alt="photo user">
                    @else
                    <img class="img-thumbnail rounded-circle" src="{{url('images/user_photo/user.png')}}" alt="photo user">
                    @endif

                </div>

                <div class="col-8">

                    <div class="mt-3">
                        <h5>{{$user[0]->name}}
                            <span>@if ($verified) <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="green" class="bi bi-patch-check" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
                              </svg> @endif
                            </span>
                        </h5>
                        @if ($verified) <span class="small text-success">{{$verified}}</span> @endif
                        <hr> 
                    </div>

                </div>

                <div class="mt-5 col-md-12 small">
                    <h4>Informasi Lainnya</h4>
                    <hr>
                    <div><span style="font-weight: 600;">Email</span> : {{$user[0]->email}} </div>
                    <hr>
                    <div><span style="font-weight: 600;">Telephone</span> : {{$user[0]->phone}} </div>
                    <hr>
                    <div><span style="font-weight: 600;">Lokasi</span> : {{$user[0]->location}}</div>
                    <hr>
                    <div><span style="font-weight: 600;">Alamat</span> : {{$user[0]->address}}</div>
                    <hr>
                    <div><span style="font-weight: 600;">Tergabung</span> : {{ date("d-M-Y", strtotime($user[0]->created_at)); }}</div>
                    <hr>
                </div>
            </div>
            <div class="mt-2">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                    <a href="{{url('update_profile/'.$user[0]->user_id)}}" class="btn btn-primary">Update Profile</a>
                    <button type="submit" class="btn btn-danger"><span class="mt-2"> Keluar</span></button>
                </form>
            </div>
        </div>

        <div class="col-md-8 d-none d-md-block d-sm-none" style="border-left: 1px solid #eeefff">

            <h3>Iklan Anda  </h3>

            {{-- error dan notifications  --}}
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
            
            <hr>
            <div class="mt-2">
                @if(count($ads)>0)
                @foreach ($ads as $ad)
                <div class="row p-2 m-1 border rounded">
                    <div class="col-md-2">
                       <a href="{{url($ad->category.'/'.$ad->location.'/'.$ad->link.'/'.$ad->user_id)}}">
                            <img class="img-fluid mt-2" src="{{url('images/file_upload/'.$ad->photo1)}}" alt="{{$ad->ads_id}}" alt="">
                       </a>
                    </div>
                    <div class="col-md-7" style="border-left: 2px solid #eeefff">
                        <a href="{{url($ad->category.'/'.$ad->location.'/'.$ad->link.'/'.$ad->user_id)}}">
                            <div class="small mt-2">{{$ad->title}}</div>
                        </a>
                        <div
                            class="small p-1
                            @if($ad->status == 'rejected') text-light border rounded bg-danger 
                            @elseif($ad->status == 'pending') border rounded bg-warning 
                            @elseif($ad->status == 'stopped') text-light border rounded bg-primary
                            @elseif($ad->status == 'actived') text-light border rounded bg-info 
                            @endif">
                            Status Iklan : {{$ad->status}}
                        </div>
                        @if($ad->status == 'rejected')
                            <div class="small p-1">
                                <div>{{$ad->reason}}</div>
                                <div>{{$ad->detail_reason}}</div>
                            </div>
                        @endif
                        @if($ad->status == 'stopped')
                            <div class="small p-1">
                                <div>{{$ad->stop_reason}}</div>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-3" style="border-left: 2px solid #eeefff">
                        <div class="mt-3">
                            <a
                            href="{{url('edit_ads/'.$ad->ads_id)}}"
                            class="btn btn-sm btn-success"
                            data-toggle="tooltip"
                            data-placement="bottom"
                            title="Edit Iklan">
                            <i class="bi bi-pencil-fill"></i>
                            </a>

                            <button
                            class="btn btn-sm btn-primary"
                            data-toggle="modal"
                            data-placement="bottom"
                            data-target="#modal_stop_{{$ad->ads_id}}"
                            title="Stop Iklan">
                            <i class="bi bi-x-circle-fill"></i>
                            </button>

                            {{-- modal stop ads  --}}
                            <div class="modal fade bd-modal-lg" id="modal_stop_{{$ad->ads_id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body mt-2">
                                            <div class="p-4">
                                                <form class="form-group" action="{{url('stop_ads')}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <h5>Kenapa saya menghentikan iklan ini?</h5>
                                                    <div class="card p-2">
                                                        {{$ad->title}}
                                                    </div>
                                                    <div class="mt-4">
                                                        <textarea class="form-control" name="stop_reason" rows="5" placeholder="Barang yang saya tawarkan sudah terjual ..."></textarea>
                                                    </div>   
                                                    <input type="hidden" name="ads_id" id="" value="{{$ad->ads_id}}">
                                                    <div class="mt-4">
                                                       <button class="btn btn-primary" type="submit">Proses</button>
                                                       <button class="btn btn-danger" type="button" data-dismiss="modal">Batalkan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <button
                            class="btn btn-sm btn-danger"
                            data-toggle="modal"
                            data-placement="bottom"
                            data-target="#modal_delete_{{$ad->ads_id}}"
                            title="Hapus Iklan">
                            <i class="bi bi-trash3-fill"></i>
                            </button>

                            {{-- modal stop ads  --}}
                            <div class="modal fade bd-modal-lg" id="modal_delete_{{$ad->ads_id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body mt-2">
                                            <div class="p-4">
                                                <h5>Hapus iklan ini?</h5>
                                                    <div class="card p-2">
                                                        {{$ad->title}}
                                                    </div>
                                                    <div class="text-danger small">*Iklan yang telah dihapus tidak dapat dipulihkan kembali.</div>
                                                    <div class="mt-4">
                                                      <a class="btn btn-primary" href="{{url('delete_ads/'.$ad->ads_id)}}">Hapus</a>
                                                       <button class="btn btn-danger" type="button" data-dismiss="modal">Batalkan</button>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="mt-4">
                    <h5 class="p-3">Anda belum memiliki iklan Aktif. <a href="{{url('create_ads')}}" class="text-primary">Buat Iklan</a> sekarang. </h5>
                </div>
                @endif
                @if(count($ads))
                <div class="mt-4 text-center">
                    <h5 class="p-3"><a href="{{url('create_ads')}}" class="btn btn-outline-info">Tambah Iklan</a></h5>
                </div>
                @endif
            </div>

        </div>
         
    </div>

</div>

@endsection