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
                <form class="form-group" action="" method="POST" >
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-10">
                            <div class="mt-2">
                                <input class="form-control" type="text" name="category" id="category" placeholder="add new category">
                            </div>
                            <div class="mt-2">
                                <input class="form-control" type="text" name="category-slug" id="category" placeholder="add slug">
                            </div>
                            <div class="mt-4">
                                <button class="btn btn-primary" type="submit">Save Location</button>
                            </div>
                        </div>
                    </div>
        
                </form>
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
                               <div class="mt-4">SIte Logo : <br> <img class="mt-2 img-fluid" src="{{url('images/main_pages/'.$main_pages[0]->sitelogo)}}" alt="{{$main_pages[0]->sitelogo}}"> </div>
                               <hr>
                               <div class="row">
                                    <div class="col-md-6">
                                        <div class="mt-4">Left Image : <br> <img class="mt-2 img-fluid" src="{{url('images/main_pages/'.$main_pages[0]->left_image)}}" alt="{{$main_pages[0]->left_image}}"> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mt-4">Right Image : <br> <img class="mt-2 img-fluid" src="{{url('images/main_pages/'.$main_pages[0]->right_image)}}" alt="{{$main_pages[0]->right_image}}"> </div>
                                    </div>
                               </div>
                               <hr>
                               <div class="mt-4">Body Image : <br> <img class="mt-2 img-fluid" src="{{url('images/main_pages/'.$main_pages[0]->body_image)}}" alt="{{$main_pages[0]->body_image}}"> </div>
                               <hr>
                               <div class="mt-4">Bottom Image : <br> <img class="mt-2 img-fluid" src="{{url('images/main_pages/'.$main_pages[0]->bottom_image)}}" alt="{{$main_pages[0]->bottom_image}}"> </div>
                               <hr>
                            </div>
                        </div>
                        <hr>
                    </div>
            </div>
        </div>
    </div>
    
</div>
@endsection