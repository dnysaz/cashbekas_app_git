@extends('layouts.admin')
@section('app')
<div class="container-fluid px-4">
    <h1 class="mt-4">Main Page Settings</h1>
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
                <h5>Edit Main Page</h5>
                <hr>
                    <div class="mt-4">
                        <form class="form-group" method="POST" action="{{url('update_mainpage'.'/'.'sitename')}}">
                            {{ csrf_field() }}
                            <h6>Update Site Name</h6>
                            <div class="mt-2">
                                <input type="text"  name="sitename" value='{!!$main_pages[0]->sitename!!}' class="form-control bg-dark text-success" id="sitename">
                                <div class="small text-muted">tag HTML required for styling</div>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-primary" type="submit"> Update Site Name </button>
                            </div>
                        </form>
                    </div>
                <hr>
                    <div class="mt-4">
                        <form class="form-group"  method="POST" action="{{url('update_mainpage'.'/'.'header_text')}}">
                            {{ csrf_field() }}
                            <h6>Update Header Text</h6>
                            <div class="mt-2">
                                <textarea name="header_text" class="form-control bg-dark text-success" id="" rows="4">{!!$main_pages[0]->header_text!!}</textarea>
                                <div class="small text-muted">tag HTML required for styling</div>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-primary" type="submit"> Update Header Text </button>
                            </div>
                        </form>
                    </div>
                <hr>
                    <div class="mt-4">
                        <form class="form-group"  method="POST" action="{{url('update_mainpage'.'/'.'sitelogo')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <h6>Update Site Logo</h6>
                            <div class="mt-2">
                                <input type="file" accept=".*" class="form-control" name="sitelogo" id="sitelogo">
                            </div>
                            <div class="mt-4">
                                <button class="btn btn-primary" type="submit"> Update Site Logo </button>
                            </div>
                        </form>
                    </div>
                <hr>
                    <div class="mt-4">
                        <form class="form-group"  method="POST" action="{{url('update_mainpage'.'/'.'left_image')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <h6>Update Left Image</h6>
                            <div class="mt-2">
                                <input type="file" class="form-control" name="left_image" id="left_image">
                            </div>
                            <div class="mt-4">
                                <button class="btn btn-primary" type="submit"> Update Left Image </button>
                            </div>
                        </form>
                    </div>
                <hr>
                    <div class="mt-4">
                        <form class="form-group"  method="POST" action="{{url('update_mainpage'.'/'.'right_image')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <h6>Update Right Image</h6>
                            <div class="mt-2">
                                <input type="file" class="form-control" name="right_image" id="right_image">
                            </div>
                            <div class="mt-4">
                                <button class="btn btn-primary" type="submit"> Update Right Image </button>
                            </div>
                        </form>
                    </div>
                <hr>
                    <div class="mt-4">
                        <form class="form-group"  method="POST" action="{{url('update_mainpage'.'/'.'body_image')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <h6>Update Body Image</h6>
                            <div class="mt-2">
                                <input type="file" class="form-control" name="body_image" id="body_image">
                            </div>
                            <div class="mt-4">
                                <button class="btn btn-primary" type="submit"> Update Body Image </button>
                            </div>
                        </form>
                    </div>
                <hr>
                    <div class="mt-4">
                        <form class="form-group"  method="POST" action="{{url('update_mainpage'.'/'.'bottom_image')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <h6>Update Bottom Image</h6>
                            <div class="mt-2">
                                <input type="file" class="form-control" name="bottom_image" id="bottom_image">
                            </div>
                            <div class="mt-4">
                                <button class="btn btn-primary" type="submit"> Update Bottom Image </button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mt-2">
                <h5>Main Page View</h5>
                <hr>
                    <div class="mt-1">
                        <div class="row">
                            <div class="col-md-12">
                               <div class="mt-4">Site Name : {!!$main_pages[0]->sitename!!}</div>
                               <hr>
                               <div class="mt-4">Header Text : {!!$main_pages[0]->header_text!!}</div>
                               <hr>
                               <div class="mt-4">SIte Logo : <br> <img loading="lazy" class="mt-2 img-fluid" src="{{url('images/main_pages/'.$main_pages[0]->sitelogo)}}" alt="{{$main_pages[0]->sitelogo}}"> </div>
                               <hr>
                               <div class="row">
                                    <div class="col-md-6">
                                        <div class="mt-4">Left Image : <br> <img loading="lazy" class="mt-2 img-fluid" src="{{url('images/main_pages/'.$main_pages[0]->left_image)}}" alt="{{$main_pages[0]->left_image}}"> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mt-4">Right Image : <br> <img  loading="lazy" class="mt-2 img-fluid" src="{{url('images/main_pages/'.$main_pages[0]->right_image)}}" alt="{{$main_pages[0]->right_image}}"> </div>
                                    </div>
                               </div>
                               <hr>
                               <div class="mt-4">Body Image : <br> <img loading="lazy" class="mt-2 img-fluid" src="{{url('images/main_pages/'.$main_pages[0]->body_image)}}" alt="{{$main_pages[0]->body_image}}"> </div>
                               <hr>
                               <div class="mt-4">Bottom Image : <br> <img loading="lazy" class="mt-2 img-fluid" src="{{url('images/main_pages/'.$main_pages[0]->bottom_image)}}" alt="{{$main_pages[0]->bottom_image}}"> </div>
                            </div>
                        </div>
                        <hr>
                    </div>
            </div>
        </div>
    </div>
    
</div>
@endsection