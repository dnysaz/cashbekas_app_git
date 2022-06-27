@extends('layouts.admin')
@section('app')
<div class="container-fluid px-4">
    <h1 class="mt-4">New Ads</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"> {{$new_ads->total()}} New Ads List</li>
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

    <table class="table table-hover text-muted">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">User</th>
            <th scope="col">Ads Title</th>
            <th scope="col">Upload At</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
        @if (count($new_ads)>0)
        @foreach ($new_ads as $index => $new_ad)
          <tr>
            <th scope="row">{{$index +1}}</th>
            <td><a class="text-muted" href="{{url('view_user/'.$new_ad->user_id)}}" target="_blank">{{$new_ad->name}}</a></td>
            <td><a class="text-muted" href="{{url('preview_ads/'.$new_ad->user_id.'/'.$new_ad->ads_id)}}" target="_blank">{{$new_ad->title}}</a></td>
            <td>{{$new_ad->created_at->diffForHumans()}}</td>
            <td><button type="button" data-bs-toggle="modal" data-bs-target="#modal_{{$new_ad->ads_id}}" class="btn btn-primary">Actions</button></td>
          </tr>

          {{-- modal area  --}}
            <div class="modal fade bd-example-modal-lg" id="modal_{{$new_ad->ads_id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body mt-2">
                            <div class="mt-3">
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <img class="img-fluid" src="{{url('images/file_upload/'.$new_ad->photo1)}}" alt="{{$new_ad->ads_id}}" alt="">
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <img class="img-fluid" src="{{url('images/file_upload/'.$new_ad->photo2)}}" alt="{{$new_ad->ads_id}}" alt="">
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <img class="img-fluid" src="{{url('images/file_upload/'.$new_ad->photo3)}}" alt="{{$new_ad->ads_id}}" alt="">
                                    </div>
                                </div>
                                <hr>
                                <div><span style="font-weight: 700">Title :</span> {{$new_ad->title}} </div>
                                <hr>
                                <div><span style="font-weight: 700">Description :</span> {{$new_ad->desc}} </div>
                                <hr>
                                <div><span style="font-weight: 700">Category :</span> {{$new_ad->category}} / <span style="font-weight: 700">Location :</span> {{$new_ad->location}}  </div>
                                <hr>
                                <div><span style="font-weight: 700">Address :</span> {{$new_ad->address}} </div>
                                <hr>
                                <div><span style="font-weight: 700">User :</span> {{$new_ad->name}} / <span style="font-weight: 700">Phone :</span> {{$new_ad->phone}} </div>
                                <hr>
                                <div><span style="font-weight: 700">Created At :</span> {{$new_ad->created_at}} / <span style="font-weight: 700">Status :</span> {{$new_ad->status}} </div>
                                <hr>
                                <div><span style="font-weight: 700">Reject Reason :</span> {{$new_ad->reason}}</div>
                                <hr>
                                <div><span style="font-weight: 700">Detail Reject :</span> {{$new_ad->detail_reason}}</div>
                                <hr>
                                <div><span style="font-weight: 700">Report Reason :</span> {{$new_ad->report_reason}}</div>
                                <hr>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <a href="{{url('approve_ads/'.$new_ad->ads_id)}}" class="btn btn-primary">Approve</a>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modal_reject_{{$new_ad->ads_id}}"  class="btn btn-danger">Reject</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- modal reject reason  --}}
            <div class="modal fade bd-example-modal-lg" id="modal_reject_{{$new_ad->ads_id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body mt-2">
                            <div class="p-4">
                                <form class="form-group" action="{{url('reject_ads')}}" method="POST">
                                    {{ csrf_field() }}
                                    <h5>Reasons</h5>
                                    <select name="reason" id="reason" required class="form-control">
                                        <option value="Iklan anda belum memenuhi syarat untuk ditampilkan.">Iklan anda belum memenuhi syarat untuk ditampilkan.</option>
                                        <option value="Iklan anda melanggar kebijakan syarat dan ketentuan beriklan di cashbekas.com">Iklan anda melanggar kebijakan syarat dan ketentuan beriklan di cashbekas.com</option>
                                        <option value="Iklan yang sama telah anda buat sebelumnya, dan ini adalah iklan duplikat.">Iklan yang sama telah anda buat sebelumnya, dan ini adalah iklan duplikat.</option>
                                        <option value="Barang atau Jasa yang anda tawarkan tidak sesuai dengan syarat dan ketentuan berlaku di cashbekas.com">Barang atau Jasa yang anda tawarkan tidak sesuai dengan syarat dan ketentuan berlaku di cashbekas.com</option>
                                    </select>
                                    <div class="mt-4">
                                        <h6>More Details <span class="small">(Optional)</span> </h6>
                                        <textarea class="form-control" name="detail_reason" id="reason" rows="5" placeholder="Reasons why this ads is rejected ..."></textarea>
                                        <input type="hidden" name="ads_id" value="{{$new_ad->ads_id}}">
                                    </div>
                                    <div class="mt-4">
                                       <button class="btn btn-primary" type="submit">Process</button>
                                       <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @else
            <div class="text-center mb-2 mt-4 bg-danger">
                <h5 class="p-3 text-light">Maaf untuk saat ini database masih kosong. Belum ada data yang dapat ditampilkan.</h5>
            </div>
          @endif
        </tbody>
      </table>
</div>
@endsection