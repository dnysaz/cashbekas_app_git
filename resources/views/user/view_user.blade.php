@extends('layouts.app')

@section('app')

<div class="mt-5 text-muted">

    <div class="row mb-5">

        <div class="col-md-4">
            <h4>Profile <span class="text-primary">{{$user[0]->name}}</span> </h4>
            <hr>
            <div class="row mt-4">

                <div class="col-md-4">

                    @if($user[0]->photo)
                    <img class="img-thumbnail rounded-circle" src="{{url('images/user_photo/'.$user[0]->photo)}}" alt="photo user">
                    @else
                    <img class="img-thumbnail rounded-circle" src="{{url('images/user_photo/user.png')}}" alt="photo user">
                    @endif

                </div>

                <div class="col-md-8">

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

                <div class="mt-2 col-md-12 small">
                    <hr>
                    <div><span style="font-weight: 600;">Telephone</span> : {{$user[0]->phone}} </div>
                    <hr>
                    <div><span style="font-weight: 600;">Lokasi</span> : {{$user[0]->location}}</div>
                    <hr>
                    <div><span style="font-weight: 600;">Alamat</span> : {{$user[0]->address}}</div>
                    <hr>
                    {{-- <div><span style="font-weight: 600;">Jenis Kelamin</span> : {{$user[0]->gender}}</div> --}}
                    <div><span style="font-weight: 600;">Tergabung</span> : {{ date("d-M-Y", strtotime($user[0]->created_at)); }}</div>
                    <hr>
                </div>
            </div>
        </div>

        <div class="col-md-8" style="border-left: 1px solid #eeefff">

            <h4>Iklan yang ditayangkan oleh {{$user[0]->name}}  </h4>
            <hr>
            @if(count($ads)>0)
                <h5>{{$user[0]->name}} memiliki {{$ads->total()}} iklan aktif yang sedang ditayangkan.</h5>
                <hr>
            @endif
            <div class="row">
                @if(count($ads)>0)
                @foreach ($ads as $ad)
                    <div class="col-md-4 p-2">
                        <a href="{{url($ad->category.'/'.$ad->location.'/'.$ad->link.'/'.$ad->user_id)}}">
                            <div class="card">
                                <div class="card-body">
                                    <img class="img-fluid" src="{{url('images/file_upload/'.$ad->photo1)}}" alt="{{$ad->ads_id}}">
                                    <div class="mt-3" style="font-weight: 600;" >Rp. {{$ad->price}}</div>
                                    <div class="small">{{$ad->title}}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                @else
                <div class="mt-4">
                    <h5 class="p-3">{{$user[0]->name}} belum memiliki iklan aktif yang ditayangkan.</h5>
                </div>
                @endif
            </div>

        </div>
         
    </div>

</div>

@endsection