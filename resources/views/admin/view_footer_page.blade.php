@extends('layouts.admin')
@section('app')
<div class="container-fluid px-4">
    <h1 class="mt-4">Footer Page Settings</h1>
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
                <h5>Edit Footer Page</h5>
                <hr>
                <form class="form-group" action="{{url('update_footer_text/'.$footers[0]->id)}}" method="POST" >
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mt-2">
                                <h6>Left Text Footer</h6>
                                <textarea name="left_text" class="form-control" rows="5">{!!$footers[0]->left_text!!}</textarea>
                            </div>
                            <div class="mt-3">
                                <h6>Middle Text Footer</h6>
                                <textarea name="middle_text" class="form-control" rows="5">{!!$footers[0]->middle_text!!}</textarea>
                            </div>
                            <div class="mt-3">
                                <h6>Right Text Footer</h6>
                                <textarea name="right_text" class="form-control" rows="5">{!!$footers[0]->right_text!!}</textarea>
                            </div>
                            <div class="mt-3">
                                <h6>Bottom Text Footer</h6>
                                <textarea name="bottom_text" class="form-control" rows="2">{!!$footers[0]->bottom_text!!}</textarea>
                            </div>
                            <div class="mt-3">
                                <h6>Copyright Text Footer</h6>
                                <textarea name="copyright_text" class="form-control" rows="2">{!!$footers[0]->copyright_text!!}</textarea>
                            </div>
                            <div class="mt-4">
                                <button class="btn btn-primary" type="submit">Save Footer</button>
                            </div>
                        </div>
                    </div>
        
                </form>
            </div>
        </div>
    </div>
    
</div>
@endsection