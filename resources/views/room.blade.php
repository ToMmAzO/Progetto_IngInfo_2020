@extends('layouts.page')

@section('title', 'Home')

@section('page-content')
    <div class="container-fluid p-0">
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3>Room <strong>{{$r -> room_id}}</strong></h3>
            </div>
            <div class="col-auto ml-auto text-right mt-n1">
                <a href="{{ url('/charts/' . $r -> room_id) }}">
                    <button class="btn btn-primary btn-lg"><i data-feather="bar-chart-2"></i> Charts
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Room Info</h4>
                    <h5 class="card-title mb-2">Room ID</h5>
                    <div class="mb-3">
                        <span class="text-muted">{{$r -> room_id}}</span>
                    </div>
                    <h5 class="card-title mb-2">Building ID</h5>
                    <div class="mb-3">
                        <span class="text-muted">{{$r -> building_id}}</span>
                    </div>
                    <h5 class="card-title mb-2">Intended usage</h5>
                    <div class="mb-3">
                        <span class="text-muted">{{$r -> intended_usage}}</span>
                    </div>
                    <h5 class="card-title mb-2">Main Orientation</h5>
                    <div class="mb-3">
                        <span class="text-muted">{{$r -> main_orientation}}</span>
                    </div>
                    <h5 class="card-title mb-2">Location</h5>
                    <div class="mb-3">
                        <span class="text-muted">{{$r -> location}}</span>
                    </div>
                    <h5 class="card-title mb-2">Latitude</h5>
                    <div class="mb-3">
                        <span class="text-muted">{{$r -> latitude}}</span>
                    </div>
                    <h5 class="card-title mb-2">Longitude</h5>
                    <div class="mb-3">
                        <span class="text-muted">{{$r -> longitude}}</span>
                    </div>
                    <h5 class="card-title mb-2">Windows Number</h5>
                    <div>
                        <span class="text-muted">{{$r -> windows_number}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Room Size</h4>
                    <h5 class="card-title mb-2">Width</h5>
                    <div class="mb-3">
                        <span class="text-muted">{{$r -> width}}</span>
                    </div>
                    <h5 class="card-title mb-2">Length</h5>
                    <div class="mb-3">
                        <span class="text-muted">{{$r -> length}}</span>
                    </div>
                    <h5 class="card-title mb-2">Height</h5>
                    <div class="mb-3">
                        <span class="text-muted">{{$r -> height}}</span>
                    </div>
                    <h5 class="card-title mb-2">Area</h5>
                    <div class="mb-3">
                        <span class="text-muted">{{$r -> area}}</span>
                    </div>
                    <h5 class="card-title mb-2">Volume</h5>
                    <div class="mb-3">
                        <span class="text-muted">{{$r -> volume}}</span>
                    </div>
                    <h5 class="card-title mb-2">Total Surface</h5>
                    <div class="mb-3">
                        <span class="text-muted">{{$r -> total_surface}}</span>
                    </div>
                    <h5 class="card-title mb-2">Glazing Surface</h5>
                    <div class="mb-3">
                        <span class="text-muted">{{$r -> glazing_surface}}</span>
                    </div>
                    <h5 class="card-title mb-2">Capacity</h5>
                    <div>
                        <span class="text-muted">{{$r -> capacity}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
