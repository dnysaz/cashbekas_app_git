@extends('layouts.user')

@section('app')
    <div class="mt-3">
        <form action="{{url('search_ads')}}" method="GET" class="form-group">
            {{ csrf_field() }}
            <input type="text" autofocus placeholder="Halo, lagi cari apa nih?" name="search_ads" class="form-control" name="" id="">
            <input type="hidden" name="type_search" value="mobile">
        </form>
    </div>
    <div class="">

        @foreach ($categories as $category)
            <span class="badge badge-secondary m-1 p-1"><a href="{{url('c/'.$category->category)}}">{{$category->category}}</a></span>
        @endforeach
        
        <ul class="row justify-content-center">
            @if(count($ads)>0)
            @foreach ($ads as $ad)
            
            <li class="mt-4 col-6 col-sm-4 col-md-2">
                <a href="{{url($ad->category.'/'.$ad->location.'/'.$ad->link.'/'.$ad->user_id)}}" class="product mb-3">
                    <div class="img-wrap"> <img src="{{url('images/file_upload/'.$ad->photo1)}}"> </div>
                    <div class="text-wrap">
                        <div class="price">{{$ad->price}}</div> <!-- price.// -->
                        <h5 class="title text-truncate mt-2">{{$ad->title}}</h5>
                    </div>
                </a>
                <div class="text-wrap">
                    <a href="#"><div class="small text-muted"> {{$ad->category}} </div></a>
                   <a href="#"> <div class="small text-muted">{{$ad->location}} / {{$ad->created_at->diffForHumans()}}</div></a>
                </div>
            </li>
            
            @endforeach
            
            @else
            <div class="mt-4 text-muted">
                <h4>Belum ada iklan yang dapat ditampilkan</h4>
            </div>
            @endif
        </ul>
    </div>
@endsection