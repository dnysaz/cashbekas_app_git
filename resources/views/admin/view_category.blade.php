@extends('layouts.admin')
@section('app')
<div class="container-fluid px-4">
    <h1 class="mt-4">Category</h1>
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
                <h5>Add Category</h5>
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
                                <button class="btn btn-primary" type="submit">Save Category</button>
                            </div>
                        </div>
                    </div>
        
                </form>
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