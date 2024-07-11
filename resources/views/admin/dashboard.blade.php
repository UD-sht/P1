@extends('admin.layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">

            </div>
        </div>
    </div>
</section>
<!-- Main content -->
<section class="content">

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-6">
            <div class="small-box card">
                <div class="chart-container">
                    <canvas id="newApplicationsChart"></canvas>
                </div>
                <div class="icon">
                    <i class="ion ion-document-text"></i>
                </div>
                <a href="#" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <div class="small-box card">
                <div class="chart-container">
                    <canvas id="pendingApprovalsChart"></canvas>
                </div>
                <div class="icon">
                    <i class="ion ion-clock"></i>
                </div>
                <a href="#" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <div class="small-box card">
                <div class="chart-container">
                    <canvas id="activeUsersChart"></canvas>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href="javascript:void(0);" class="small-box-footer">&nbsp;</a>
            </div>
        </div>
    </div>
</div>
 
</section>
<!-- /.content -->

@endsection

@section('customJs')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Chart data
        var newApplicationsData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: 'New Applications',
                data: [50, 60, 45, 70, 55, 75],
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        var pendingApprovalsData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: 'Pending Approvals',
                data: [20, 30, 25, 40, 35, 45],
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };

        var activeUsersData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: 'Active Users',
                data: [100, 110, 95, 120, 105, 125],
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        // Chart options
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        };

        // Render charts
        var newApplicationsChart = new Chart(document.getElementById('newApplicationsChart').getContext('2d'), {
            type: 'bar',
            data: newApplicationsData,
            options: options
        });

        var pendingApprovalsChart = new Chart(document.getElementById('pendingApprovalsChart').getContext('2d'), {
            type: 'pie',
            data: pendingApprovalsData,
            options: options
        });

        var activeUsersChart = new Chart(document.getElementById('activeUsersChart').getContext('2d'), {
            type: 'line',
            data: activeUsersData,
            options: options
        });
    });
</script>




@endsection