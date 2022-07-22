@extends('layouts.app')

@section('app')

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