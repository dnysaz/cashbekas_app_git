@extends('layouts.app')

@section('app')

    <section>
        <div class="mt-2">
            <h5 class="text-muted"><a href="{{url('all_page')}}"><span class="text-primary">Semua Iklan</span></a> / <span class="text-primary">{{$category}}</span> </h5>
            @foreach ($categories as $category)
                <a href="{{url('show_ads/'.$category->category.'/'.$category->sub_1)}}"><span class="badge badge-primary p-2 m-1"> {{$category->sub_1}} </span></a>
                <a href="{{url('show_ads/'.$category->category.'/'.$category->sub_2)}}"><span class="badge badge-primary p-2 m-1"> {{$category->sub_2}} </span></a>
                <a href="{{url('show_ads/'.$category->category.'/'.$category->sub_3)}}"><span class="badge badge-primary p-2 m-1"> {{$category->sub_3}} </span></a>
                <a href="{{url('show_ads/'.$category->category.'/'.$category->sub_4)}}"><span class="badge badge-primary p-2 m-1"> {{$category->sub_4}} </span></a>
                <a href="{{url('show_ads/'.$category->category.'/'.$category->sub_5)}}"><span class="badge badge-primary p-2 m-1"> {{$category->sub_5}} </span></a>
            @endforeach
        </div>
    </section>

    <section id="new_ads" class="mt-4">
        {{-- ads show area  --}}

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
            <div class="mt-4 text-muted text-center">
                <h4>Belum ada iklan yang dapat ditampilkan</h4>
            </div>
            @endif
        </ul>

    </section>

    <div class="text-center mt-5 mb-5">
        <button class="btn btn-lg btn-secondary">Lihat Lainnya</button>
    </div> 
 
@endsection