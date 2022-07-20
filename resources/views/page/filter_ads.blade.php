@extends('layouts.page')

@section('app')

    <section>
        {{-- filter ads area  --}}
        <div class="card">
            <div class="row p-2">
                <div class="col-md-6">
                    <h6 class="mt-2">Berdasarkan filter anda <span class="text-primary"> {{$category}}  {{$location}} </h6>
                </div>
                <div class="col-md-6">
                    <form action="{{url('filter_ads')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <select name="category" id="" class="form-control">
                                <option value="">Pilih Kategori</option>
                                @if(count($categories)>0)
                                    @foreach ($categories as $category)
                                        <option value="{{$category->category}}">{{$category->category}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <select name="location" id="" class="form-control">
                                <option value="">Ubah Lokasi</option>
                                <option value="Denpasar">Denpasar</option>
                                <option value="Badung">Badung</option>
                                <option value="Gianyar">Gianyar</option>
                                <option value="Klungkung">Klungkung</option>
                                <option value="Bangli">Bangli</option>
                                <option value="Karangasem">Karangasem</option>
                                <option value="Singaraja">Singaraja</option>
                                <option value="Jembrana">Jembrana</option>
                                <option value="Nusa Penida">Nusa Penida</option>
                            </select>
                            <div class="input-group-prepend">
                                <button class="btn btn-primary" style="submit">Filter</button>
                            </div>
                          </div>
                    </form>
                    @if(session()->has('e'))
                    <div class="alert alert-danger alert-dismissible fade show small mt-2" role="alert">
                        {!!session('e')!!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                </div>
            </div>
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
            <div class="mt-4 text-muted">
                <h4>Belum ada iklan yang dapat ditampilkan</h4>
            </div>
            @endif
        </ul>

    </section>

    <div class="text-center mt-5 mb-5">
        <button class="btn btn-lg btn-secondary">Lihat Lainnya</button>
    </div> 
 
@endsection