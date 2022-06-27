@extends('layouts.admin')
@section('app')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <hr>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Ads Status</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <a href="{{url('new_ads')}}">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">New Ads</div>
                    <div class="card-footer text-center">
                        <div class="mt-2 display-3">{{$new_ads->total()}}</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-6">
            <a href="{{url('actived_ads')}}">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Actived Ads</div>
                    <div class="card-footer text-center">
                        <div class="mt-2 display-3">{{$actived_ads->total()}}</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-6">
            <a href="{{url('rejected_ads')}}">
                <div class="card bg-warning text-danger mb-4">
                    <div class="card-body">Rejected Ads</div>
                    <div class="card-footer text-center">
                        <div class="mt-2 display-3">{{$rejected_ads->total()}}</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-6">
            <a href="{{url('deleted_ads')}}">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Deleted Ads</div>
                    <div class="card-footer text-center">
                        <div class="mt-2 display-3">{{$deleted_ads->total()}}</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <hr>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Users Status</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <a href="{{url('new_user')}}">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">New User</div>
                    <div class="card-footer text-center">
                        <div class="mt-2 display-3">{{$new_user->total()}}</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-6">
            <a href="{{url('verified_user')}}">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Verified User</div>
                    <div class="card-footer text-center">
                        <div class="mt-2 display-3">
                            @php $verified_user = $all_user->total() - $new_user->total() @endphp
                            @php echo $verified_user @endphp
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-6">
            <a href="{{url('all_user')}}">
                <div class="card bg-warning text-danger mb-4">
                    <div class="card-body">All Users</div>
                    <div class="card-footer text-center">
                        <div class="mt-2 display-3">{{$all_user->total()}}</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-6">
            <a href="">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Administrator</div>
                    <div class="card-footer text-center">
                        <div class="mt-2 display-3">{{$administrator_user->total()}}</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Area Chart Example
                </div>
                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Bar Chart Example
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
    </div>
</div>
@endsection