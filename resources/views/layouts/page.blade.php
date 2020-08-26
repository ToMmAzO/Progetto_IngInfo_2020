@extends('layouts.app')

@section('content')
    <body style="overflow-y: auto">
    <div class="wrapper">
        @include('layouts.sidebar')

        <div class="main">
            @include('layouts.navbar')
            @yield('page-content')
            @include('layouts.footer')
        </div>
    </div>
    </body>
@endsection
