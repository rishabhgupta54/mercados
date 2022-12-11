@extends('layout.main')
@section('title', $pageTitle)
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-2">Total Users</h4>
                                <div class="widget-chart-1">
                                    <div class="widget-detail-1">
                                        <h2 class="fw-normal pt-2 mb-1">{{ $totalUsers }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-2">Total Vehicle Per User</h4>
                                <div class="widget-chart-1">
                                    <div class="widget-detail-1">
                                        <h2 class="fw-normal pt-2 mb-1">{{ $totalVehicles }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-2">Max Vehicle Per User</h4>
                                <div class="widget-chart-1">
                                    <div class="widget-detail-1">
                                        <h2 class="fw-normal pt-2 mb-1">{{ $maxVehicle }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-2">Min Vehicle Per User</h4>
                                <div class="widget-chart-1">
                                    <div class="widget-detail-1">
                                        <h2 class="fw-normal pt-2 mb-1">{{ $minVehicle }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-2">Avg. Vehicle</h4>
                                <div class="widget-chart-1">
                                    <div class="widget-detail-1">
                                        <h2 class="fw-normal pt-2 mb-1">{{ $avgVehicle }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <canvas id="users-chart" height="600px"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('header')
    <link href="{{ asset('assets/libs/chart.js/Chart.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@push('footer')
    <script src="{{ asset('assets/libs/chart.js/Chart.min.js') }}"></script>
    <script>
        new Chart(document.getElementById("users-chart"), {
            type: 'line',
            data: {
                labels: {!! $chartLabels !!},
                datasets: [
                    {
                        data: {!! $maleVehicle !!},
                        label: "Male",
                        borderColor: "#3e95cd",
                        fill: false
                    },
                    {
                        data: {!! $femaleVehicle !!},
                        label: "Female",
                        borderColor: "#8e5ea2",
                        fill: false
                    }
                ]
            },
            options: {
                title: {
                    display: true,
                    text: 'Number of Vehicles'
                },
            }
        });
    </script>
@endpush
