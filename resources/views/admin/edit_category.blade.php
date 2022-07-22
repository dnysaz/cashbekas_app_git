@extends('layouts.admin')
@section('app')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Category</h1>
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
                <h5>Edit : <span class="text-primary" >{{$data_categories[0]->category}}</span> </h5>
                <hr>
                <form class="form-group" action="{{url('update_category/'.$data_categories[0]->slug)}}" method="POST" >
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-10">

                            <div class="mt-2">
                                <label for="">Category Name</label>
                                <input
                                class="form-control"
                                type="text"
                                name="category"
                                id="category" 
                                value="{{$data_categories[0]->category}}"
                                required>
                            </div>

                            <div class="mt-4">
                                <label for="">Sub Category <span class="small text-muted"> ( required 5 ) </span> </label>
                                <input
                                class="form-control"
                                type="text"
                                name="sub_1"
                                id="category"
                                value="{{$data_categories[0]->sub_1}}"
                                required>
                            </div>

                            <div class="mt-2">
                                <input
                                class="form-control"
                                type="text"
                                name="sub_2"
                                id="category"
                                value="{{$data_categories[0]->sub_2}}"
                                required>
                            </div>

                            <div class="mt-2">
                                <input
                                class="form-control"
                                type="text"
                                name="sub_3"
                                id="category"
                                value="{{$data_categories[0]->sub_3}}"
                                required>
                            </div>

                            <div class="mt-2">
                                <input
                                class="form-control"
                                type="text"
                                name="sub_4"
                                id="category"
                                value="{{$data_categories[0]->sub_4}}"
                                required>
                            </div>

                            <div class="mt-2">
                                <input
                                class="form-control"
                                type="text"
                                name="sub_5"
                                id="category"
                                value="{{$data_categories[0]->sub_5}}"
                                required>
                            </div>
                            
                            <div class="mt-4">
                                <button class="btn btn-primary" type="submit">Save Update</button>
                                <a href="{{url('view_category')}}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="mt-4">
                    <h5>Information for updated new Category.</h5>
                    <hr>
                    <ul class="text-muted">
                        <li>String is allowed</li>
                        <li>Number is allowed</li>
                        <li>Don't use special character like : & , %, /, @, * , () , etc is not allowed</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mt-2">
                <h5>Category List</h5>
                <hr>

                @foreach ($categories as $category)
                    <div class="mt-1">
                        <div class="row">
                            <div class="col-md-8">
                                <h6>{{$category->category}} <span style="margin-left:50px;" ></h6>
                                <div class="small text-muted"> <li>{{$category->sub_1}}</li></div>
                                <div class="small text-muted"> <li>{{$category->sub_2}}</li></div>
                                <div class="small text-muted"> <li>{{$category->sub_3}}</li></div>
                                <div class="small text-muted"> <li>{{$category->sub_4}}</li></div>
                                <div class="small text-muted"> <li>{{$category->sub_5}}</li></div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-2"><a href="{{url('edit_category/'.$category->slug)}}">Edit</a> / <a class="text-danger" href="{{url('delete_category/'.$category->slug)}}">Delete</a></div>
                            </div>
                        </div>
                        <hr>
                    </div>
                @endforeach
    
            </div>
        </div>
    </div>
    
</div>
@endsection