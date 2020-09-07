@extends('layouts.page')

@section('title', 'Home')

@section('page-content')
    <div class="container-fluid p-0">
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3>Room <span id="room-id"><strong>{{$r -> room_id}}</strong></span></h3>
            </div>
            <div class="col-auto ml-auto text-right mt-n1">
                <a href="{{ url('/room/' . $r -> room_id) }}">
                    <button class="btn btn-primary btn-lg"><i data-feather="info"></i> Room Info
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Charts</h4>
                    @isset($error)
                        <div class="alert alert-danger" role="alert" id="erroralert">
                            <div class="alert-message" id="alertmessage">
                                {{ $error }}
                            </div>
                        </div>
                    @else
                        <form>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="dimension">Physical Dimension</label>
                                    <select class="form-control" name="dimension" id="dimension">
                                        @foreach($dimensions as $d)
                                            <option
                                                value="{{ $d['name'] }}">{{ $d['name'] }} [{{ $d['unit']  }}]</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="startdate">Start date</label>
                                    <div class="input-group date" id="startdate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input"
                                               data-target="#startdate" name="start" id="start"
                                               value="{{$startDate}}"/>
                                        <div class="input-group-append" data-target="#startdate"
                                             data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="enddate">End date</label>
                                    <div class="input-group date" id="enddate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input"
                                               data-target="#enddate" name="end" id="end"
                                               value="{{$endDate}}"/>
                                        <div class="input-group-append" data-target="#enddate"
                                             data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="alert alert-danger" style="display: none" role="alert" id="erroralert">
                            <div class="alert-message" id="alertmessage">
                            </div>
                        </div>
                        <canvas id="chart" style="display: none"></canvas>
                    @endisset
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{ asset('js/chart.js') }}"></script>
