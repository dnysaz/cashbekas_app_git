@extends('layouts.admin')
@section('app')
<div class="container-fluid px-4">
    <h1 class="mt-4">Verified Users List</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Showing {{$users->total()}} Verified Users List</li>
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
            <th scope="col">User Name</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
        @if (count($users)>0)
        @foreach ($users as $index => $user)
          <tr>
            <th scope="row">{{$index +1}}</th>
            <td>{{$user->username}}</td>
            <td>{{$user->name}} </td>
            <td>{{$user->email}}</td>
            <td><button type="button" data-bs-toggle="modal" data-bs-target="#modal_{{$user->user_id}}" class="btn btn-primary">Actions</button></td>
          </tr>

          {{-- modal area  --}}
            {{-- <div class="modal fade bd-example-modal-lg" id="modal_{{$user->ads_id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body mt-2">
                            <div class="p-4">
                                <h5>ADS ID # {{$user->ads_id}}</h5>
                                <div class="mt-3">
                                    <div class="row">
                                        <div class="col-md-4 text-center">
                                            <img class="img-fluid" src="{{url('images/file_upload/'.$user->photo1)}}" alt="{{$user->ads_id}}" alt="">
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <img class="img-fluid" src="{{url('images/file_upload/'.$user->photo2)}}" alt="{{$user->ads_id}}" alt="">
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <img class="img-fluid" src="{{url('images/file_upload/'.$user->photo3)}}" alt="{{$user->ads_id}}" alt="">
                                        </div>
                                    </div>
                                    <hr>
                                    <div><span style="font-weight: 700">Title :</span> {{$user->title}} </div>
                                    <hr>
                                    <div><span style="font-weight: 700">Description :</span> {{$user->desc}} </div>
                                    <hr>
                                    <div><span style="font-weight: 700">Category :</span> {{$user->category}} / <span style="font-weight: 700">Location :</span> {{$user->location}}  </div>
                                    <hr>
                                    <div><span style="font-weight: 700">Address :</span> {{$user->address}} </div>
                                    <hr>
                                    <div><span style="font-weight: 700">User :</span> {{$user->name}} / <span style="font-weight: 700">Phone :</span> {{$user->phone}} </div>
                                    <hr>
                                    <div><span style="font-weight: 700">Created At :</span> {{$user->created_at}} / <span style="font-weight: 700">Status :</span> {{$user->status}} </div>
                                    <hr>
                                    <div><span style="font-weight: 700">Reject Reason :</span> {{$user->reason}}</div>
                                    <hr>
                                    <div><span style="font-weight: 700">Detail Reject :</span> {{$user->detail_reason}}</div>
                                    <hr>
                                    <div><span style="font-weight: 700">Report Reason :</span> {{$user->report_reason}}</div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <a href="{{url('approve_ads/'.$user->ads_id)}}" class="btn btn-primary">Approve</a>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modal_reject_{{$user->ads_id}}"  class="btn btn-danger">Reject</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- modal reject reason  --}}
            {{-- <div class="modal fade bd-example-modal-lg" id="modal_reject_{{$user->ads_id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                        <input type="hidden" name="ads_id" value="{{$user->ads_id}}">
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
            </div> --}}
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