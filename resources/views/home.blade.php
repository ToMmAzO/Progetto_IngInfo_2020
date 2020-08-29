@extends('layouts.page')

@section('title', 'Home')

@section('page-content')
    <div class="container-fluid p-0">
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3>Your <strong>Rooms</strong></h3>
            </div>
        </div>
    </div>

    <div class="row">
        @if (count($rooms) === 0)
            <div class="col-sm-12">
                No rooms
            </div>
        @else
            @foreach($rooms as $r)
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Building {{$r -> building_id}}</h5>
                            <h1 class="display-5 mt-1 mb-3"><a
                                    href="{{ url('/room/' . $r -> room_id) }}">Room {{$r -> room_id}}</a></h1>
                            <div class="mb-1">
                                <span class="text-muted">{{$r -> intended_usage}}</span>
                            </div>
                        </div>
                    </div>
                </div>
    @endforeach
    @endif
@endsection
