@extends('layouts.admin')
@section('app')
<div class="container-fluid px-4">
    <h1 class="mt-4">Location</h1>
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
                <h5>Add Location</h5>
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
                <h5>Location List</h5>
                <hr>

                    <div class="mt-1">
                        <div class="row">
                            <div class="col-md-8">
                                <h6>{{$locations[0]->province}} <span style="margin-left:50px;" ></h6>
                                @foreach ($locations as $location)
                                    <li>{{$location->regency}}</li>
                                @endforeach
                            </div>
                            <div class="col-md-4">
                                <div class="mt-2"><a href="{{url('edit_category/'.$locations[0]->province)}}">Edit</a> / <a class="text-danger" href="{{url('delete_category/'.$locations[0]->province)}}">Delete</a></div>
                            </div>
                        </div>
                        <hr>
                    </div>
    
            </div>
        </div>
    </div>
    
</div>
@endsection