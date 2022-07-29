@extends('layouts.app')

@section('app')

<div class="mt-3 text-muted">

    <div class="row mb-5 justify-content-center">

        <div class="col-md-8">

            <h4>Iklan Saya </h4>

            {{-- error dan notifications  --}}
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {!!session('success')!!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {!!session('error')!!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            
            <hr>
            <div class="mt-2">
                @if(count($ads)>0)
                @foreach ($ads as $ad)
                <div class="row p-2 m-1 border rounded">
                    <div class="col-md-2">
                       <a href="{{url($ad->category.'/'.$ad->location.'/'.$ad->link.'/'.$ad->user_id)}}">
                            <img class="img-fluid mt-2" src="{{url('images/file_upload/'.$ad->photo1)}}" alt="{{$ad->ads_id}}" alt="">
                       </a>
                    </div>
                    <div class="col-md-7" style="border-left: 2px solid #eeefff">
                        <a href="{{url($ad->category.'/'.$ad->location.'/'.$ad->link.'/'.$ad->user_id)}}">
                            <div class="small mt-2">{{$ad->title}}</div>
                        </a>
                        <div
                            class="small p-1
                            @if($ad->status == 'rejected') text-light border rounded bg-danger 
                            @elseif($ad->status == 'pending') border rounded bg-warning 
                            @elseif($ad->status == 'stopped') text-light border rounded bg-primary
                            @elseif($ad->status == 'actived') text-light border rounded bg-info 
                            @endif">
                            Status Iklan : {{$ad->status}}
                        </div>
                        @if($ad->status == 'rejected')
                            <div class="small p-1">
                                <div>{{$ad->reason}}</div>
                                <div>{{$ad->detail_reason}}</div>
                            </div>
                        @endif
                        @if($ad->status == 'stopped')
                            <div class="small p-1">
                                <div>{{$ad->stop_reason}}</div>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-3" style="border-left: 2px solid #eeefff">
                        <div class="mt-3">
                            <a
                            href="{{url('edit_ads/'.$ad->ads_id)}}"
                            class="btn btn-sm btn-success"
                            data-toggle="tooltip"
                            data-placement="bottom"
                            title="Edit Iklan">
                            <i class="bi bi-pencil-fill"></i>
                            </a>

                            <button
                            class="btn btn-sm btn-primary"
                            data-toggle="modal"
                            data-placement="bottom"
                            data-target="#modal_stop_{{$ad->ads_id}}"
                            title="Stop Iklan">
                            <i class="bi bi-x-circle-fill"></i>
                            </button>

                            {{-- modal stop ads  --}}
                            <div class="modal fade bd-modal-lg" id="modal_stop_{{$ad->ads_id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body mt-2">
                                            <div class="p-4">
                                                <form class="form-group" action="{{url('stop_ads')}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <h5>Kenapa saya menghentikan iklan ini?</h5>
                                                    <div class="card p-2">
                                                        {{$ad->title}}
                                                    </div>
                                                    <div class="mt-4">
                                                        <textarea class="form-control" name="stop_reason" rows="5" placeholder="Barang yang saya tawarkan sudah terjual ..."></textarea>
                                                    </div>   
                                                    <input type="hidden" name="ads_id" id="" value="{{$ad->ads_id}}">
                                                    <div class="mt-4">
                                                       <button class="btn btn-primary" type="submit">Proses</button>
                                                       <button class="btn btn-danger" type="button" data-dismiss="modal">Batalkan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <button
                            class="btn btn-sm btn-danger"
                            data-toggle="modal"
                            data-placement="bottom"
                            data-target="#modal_delete_{{$ad->ads_id}}"
                            title="Hapus Iklan">
                            <i class="bi bi-trash3-fill"></i>
                            </button>

                            {{-- modal stop ads  --}}
                            <div class="modal fade bd-modal-lg" id="modal_delete_{{$ad->ads_id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body mt-2">
                                            <div class="p-4">
                                                <h5>Hapus iklan ini?</h5>
                                                    <div class="card p-2">
                                                        {{$ad->title}}
                                                    </div>
                                                    <div class="text-danger small">*Iklan yang telah dihapus tidak dapat dipulihkan kembali.</div>
                                                    <div class="mt-4">
                                                      <a class="btn btn-primary" href="{{url('delete_ads/'.$ad->ads_id)}}">Hapus</a>
                                                       <button class="btn btn-danger" type="button" data-dismiss="modal">Batalkan</button>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="mt-4 text-center">
                    <img class="img-fluid" src="https://img.freepik.com/free-vector/empty-concept-illustration_114360-1253.jpg?w=1060&t=st=1659013519~exp=1659014119~hmac=181194ba0afa52713db2bad804967d9a815bea6dd669473da20b4dde6c9e6a0c" alt="">
                    <h5 class="p-3">Anda belum memiliki iklan Aktif. <br> <a href="{{url('create_m_ads')}}" class="text-primary">Buat Iklan</a> sekarang. </h5>
                </div>
                @endif
                @if(count($ads))
                <div class="mt-4 text-center">
                    <h5 class="p-3"><a href="{{url('create_ads')}}" class="btn btn-outline-info">Tambah Iklan</a></h5>
                </div>
                @endif
            </div>

        </div>
         
    </div>

</div>

@endsection