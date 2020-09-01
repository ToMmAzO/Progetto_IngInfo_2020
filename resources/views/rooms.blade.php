@extends('layouts.page')

@section('title', 'Home')

@section('page-content')
    <div class="container-fluid p-0">
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3>Rooms <strong>List</strong></h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @if (count($rooms) === 0)
                No rooms
            @else
                <div class="card">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Building</th>
                                <th scope="col">Usage</th>
                                <th scope="col">Location</th>
                                <th scope="col">Area</th>
                                <th scope="col">Volume</th>
                                <th scope="col">Latitude</th>
                                <th scope="col">Longitude</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rooms as $r)
                                <tr>
                                    <th scope="row">{{$r -> room_id}}</th>
                                    <td>{{$r -> building_id}}</td>
                                    <td>{{$r -> intended_usage}}</td>
                                    <td>{{$r -> location}}</td>
                                    <td>{{$r -> area}}</td>
                                    <td>{{$r -> volume}}</td>
                                    <td>{{$r -> latitude}}</td>
                                    <td>{{$r -> longitude}}</td>
                                    <td><a href="{{ url('/room/' . $r -> room_id) }}"><i class="align-middle"
                                                                                         data-feather="eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
