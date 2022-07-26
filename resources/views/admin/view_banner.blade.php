@extends('layouts.admin')
@section('app')
<div class="container-fluid px-4">
    <h1 class="mt-4">Banner Images</h1>
    <ol class="breadcrumb mb-4">
        {{-- <li class="breadcrumb-item active"> Category List</li> --}}
    </ol>
    {{-- error  --}}

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {!!session('success')!!}
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {!!session('error')!!}
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="mt-2">
                <h5>Edit Banner</h5>
                <hr>
                <form class="form-group" action="{{url('update_banner/'.$banner_1[0]->id)}}" method="POST" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mt-3">
                                <h6>Banner 1</h6>
                                <div class="mt-2">
                                    <div><input class="form-control" type="file" name="banner" id=""></div>
                                    <div class="mt-2 text-muted">Active : {{$banner_1[0]->banner}}</div>
                                    {{-- <div class="mt-1"><input class="form-control" type="hidden" name="banner_1" id="" value="{{$banners[0]->banner_1}}"></div> --}}
                                    <div class="mt-1"><input class="form-control" type="text" name="banner_text" id="" value="{{$banner_1[0]->banner_text}}"></div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button class="btn btn-primary" type="submit">Save Banner 1</button>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                <form class="form-group" action="{{url('update_banner/'.$banner_2[0]->id)}}" method="POST" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mt-3">
                                <h6>Banner 2</h6>
                                <div class="mt-2">
                                    <div><input class="form-control" type="file" name="banner" id=""></div>
                                    <div class="mt-2 text-muted">Active : {{$banner_2[0]->banner}}</div>
                                    {{-- <div class="mt-1"><input class="form-control" type="hidden" name="banner_1" id="" value="{{$banners[0]->banner_1}}"></div> --}}
                                    <div class="mt-1"><input class="form-control" type="text" name="banner_text" id="" value="{{$banner_2[0]->banner_text}}"></div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button class="btn btn-primary" type="submit">Save Banner 2</button>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                <form class="form-group" action="{{url('update_banner/'.$banner_3[0]->id)}}" method="POST" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mt-3">
                                <h6>Banner 3</h6>
                                <div class="mt-2">
                                    <div><input class="form-control" type="file" name="banner" id=""></div>
                                    <div class="mt-2 text-muted">Active : {{$banner_3[0]->banner}}</div>
                                    {{-- <div class="mt-1"><input class="form-control" type="hidden" name="banner_1" id="" value="{{$banners[0]->banner_1}}"></div> --}}
                                    <div class="mt-1"><input class="form-control" type="text" name="banner_text" id="" value="{{$banner_3[0]->banner_text}}"></div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button class="btn btn-primary" type="submit">Save Banner 3</button>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mt-2">
                <h5>Banner Images Preview</h5>
                <hr>
                    <div class="mt-1">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mt-2">
                                    <div><img class="img-fluid" src="{{url('images/banners/'.$banner_1[0]->banner)}}" alt=""></div>
                                    <div class="mt-4">{{$banner_1[0]->banner_text}} </div>
                                    <hr>
                                </div>
                                <div class="mt-2">
                                    <div><img class="img-fluid" src="{{url('images/banners/'.$banner_2[0]->banner)}}" alt=""></div>
                                    <div class="mt-4">{{$banner_2[0]->banner_text}} </div>
                                    <hr>
                                </div>
                                <div class="mt-2">
                                    <div><img class="img-fluid" src="{{url('images/banners/'.$banner_3[0]->banner)}}" alt=""></div>
                                    <div class="mt-4">{{$banner_3[0]->banner_text}} </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        {{-- <hr> --}}
                    </div>

            </div>
        </div>
    </div>
    
</div>
@endsection