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
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Building 1</h5>
                    <h1 class="display-5 mt-1 mb-3">Room 4</h1>
                    <div class="mb-1">
                        <span class="text-muted">Ufficio</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Building 4</h5>
                    <h1 class="display-5 mt-1 mb-3">Room 6</h1>
                    <div class="mb-1">
                        <span class="text-muted">Corridoio</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
