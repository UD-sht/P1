@extends('citizen.layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .small-box {
            background: #f4f6f9;
            border-radius: 10px;
            position: relative;
            padding: 20px;
            color: #333;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .small-box .inner {
            padding-right: 10px;
            flex-grow: 1;
        }

        .small-box h3 {
            font-size: 2.2em;
            font-weight: bold;
        }

        .small-box p {
            font-size: 1.2em;
        }

        .small-box .icon {
            color: #999;
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 0;
            font-size: 50px;
        }

        .small-box-footer {
            display: block;
            padding: 10px;
            background: rgba(0, 0, 0, 0.1);
            color: #333;
            text-align: center;
            text-decoration: none;
            border-radius: 0 0 10px 10px;
            transition: background 0.3s;
        }

        .small-box-footer:hover {
            background: rgba(0, 0, 0, 0.2);
            color: #fff;
        }

        canvas {
            width: 100% !important;
            height: 150px !important;
        }
        #pendingApprovalsChart{
            width: 60% !important;
        }
     
    </style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <!-- <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">

            </div>
        </div>
    </div> -->
</section>
<!-- Main content -->
<section class="content">
@include('citizen.message')
<script>
        // Hide the success message after 2 seconds (2000 milliseconds)
        setTimeout(function () {
            var successAlert = document.getElementById('success');
            if (successAlert) {
                successAlert.style.display = 'none';
            }
        }, 2000);
        setTimeout(function () {
            var DangerAlter = document.getElementById('error');
            if (DangerAlter) {
                DangerAlter.style.display = 'none';
            }
        }, 2000);
</script>
<div class="container-fluid">
        <div class="row">
            <!-- Submitted Forms -->
            <div class="col-lg-4 col-6">
                <div class="small-box card">
                    <div class="inner">
                        <h4>10</h4>
                        <p>Submitted Forms</p>
                        <canvas id="submittedFormsChart"></canvas>
                    </div>
                    <div class="icon">
                        <i class="ion ion-document"></i>
                    </div>
                    <a href="#" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Pending Approvals -->
            <div class="col-lg-4 col-6">
                <div class="small-box card">
                    <div class="inner">
                        <h4>3</h4>
                        <p>Pending Approvals</p>
                        <canvas id="pendingApprovalsChart"></canvas>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clock"></i>
                    </div>
                    <a href="#" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Upcoming Appointments -->
            <div class="col-lg-4 col-6">
                <div class="small-box card">
                    <div class="inner">
                        <h4>5</h4>
                        <p>Upcoming Appointments</p>
                        <canvas id="upcomingAppointmentsChart"></canvas>
                    </div>
                    <div class="icon">
                        <i class="ion ion-calendar"></i>
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
        document.addEventListener("DOMContentLoaded", function () {
            // Submitted Forms Chart
            var ctx1 = document.getElementById('submittedFormsChart').getContext('2d');
            new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    datasets: [{
                        label: 'Submitted Forms',
                        data: [12, 19, 3, 5, 2, 3, 10],
                        backgroundColor: 'rgba(241, 17, 17, 0.889)',
                        borderColor: 'rgb(32, 237, 9)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Pending Approvals Chart
            var ctx2 = document.getElementById('pendingApprovalsChart').getContext('2d');
new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: ['Pending', 'Approved'],
        datasets: [{
            label: 'Pending Approvals',
            data: [3, 7],
            backgroundColor: [
                'rgba(11, 226, 11, 0.911)',
                'rgba(11, 232, 232, 0.856)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        }]
    }
});

            // Upcoming Appointments Chart
            var ctx3 = document.getElementById('upcomingAppointmentsChart').getContext('2d');
            new Chart(ctx3, {
                type: 'line',
                data: {
                    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                    datasets: [{
                        label: 'Appointments',
                        data: [2, 3, 4, 5],
                        backgroundColor: 'rgb(237, 138, 9)255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

@endsection