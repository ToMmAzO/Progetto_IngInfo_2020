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
                        <tr>
                            <th scope="row">1</th>
                            <td>Cell</td>
                            <td>Cell</td>
                            <td>Cell</td>
                            <td>Cell</td>
                            <td>Cell</td>
                            <td>Cell</td>
                            <td>Cell</td>
                            <td><i class="align-middle" data-feather="eye"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Cell</td>
                            <td>Cell</td>
                            <td>Cell</td>
                            <td>Cell</td>
                            <td>Cell</td>
                            <td>Cell</td>
                            <td>Cell</td>
                            <td><i class="align-middle" data-feather="eye"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Cell</td>
                            <td>Cell</td>
                            <td>Cell</td>
                            <td>Cell</td>
                            <td>Cell</td>
                            <td>Cell</td>
                            <td>Cell</td>
                            <td><i class="align-middle" data-feather="eye"></i></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
