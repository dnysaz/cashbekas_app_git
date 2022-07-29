@extends('layouts.user')
@section('app')
    <div class="mt-4 text-muted">
        <h5>Buat Iklan Baru</h5>
        <hr>
        <div class="row mb-5 justify-content-center">
            @foreach ($categories as $category)
                <div class="col-6">
                    <div class="text-center m-2 p-2" data-toggle="modal" data-placement="bottom" data-target="#view_{{$category->slug}}">
                        <img class="img-fluid" style="width: 50px; margin-left:auto; margin-right:auto;" src="{{url('/images/icon/'.$category->icon)}}">
                        <h6 class="mt-2">{{$category->category}}</h6>
                    </div>
                    <hr>
                </div>
                {{-- modal view sub category   --}}
                <div class="modal fade bd-modal-lg" id="view_{{$category->slug}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-body mt-2">
                                <div class="p-2">
                                    <h6>Pilih Sub Kategori</h6>
                                    <div class="card mt-2 m-2 p-1">
                                        <a href="{{url('m_create/'.$category->category.'/'.$category->sub_1)}}"><i class="bi bi-chevron-double-right"></i> {{$category->sub_1}}</a>
                                    </div>
                                    <div class="card m-2 p-1">
                                        <a href="{{url('m_create/'.$category->category.'/'.$category->sub_2)}}"><i class="bi bi-chevron-double-right"></i> {{$category->sub_2}}</a>
                                    </div>
                                    <div class="card m-2 p-1">
                                        <a href="{{url('m_create/'.$category->category.'/'.$category->sub_3)}}"><i class="bi bi-chevron-double-right"></i> {{$category->sub_3}}</a>
                                    </div>
                                    <div class="card m-2 p-1">
                                        <a href="{{url('m_create/'.$category->category.'/'.$category->sub_4)}}"><i class="bi bi-chevron-double-right"></i> {{$category->sub_4}}</a>
                                    </div>
                                    <div class="card m-2 p-1">
                                        <a href="{{url('m_create/'.$category->category.'/'.$category->sub_5)}}"><i class="bi bi-chevron-double-right"></i> {{$category->sub_5}}</a>
                                    </div>
                                    <div class="mt-4">
                                         <button class="btn btn-danger" type="button" data-dismiss="modal"> Tutup </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mb-5 mt-5"><hr></div>
    </div>

@endsection