@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css"
    crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

<style>
    body {
        background: #d9d9d9;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        /* overflow-x: hidden; */
    }

    .card-heading {}

    #dashboard-heading {
        font-size: 30px;
        font-weight: 500;
    }

    #admin-dashboard {
        /* margin: 20px; */
        background: #E6E6E6;
        box-shadow: 0px 0px 15px -3px;
    }



    #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -15rem;
        -webkit-transition: margin .25s ease-out;
        -moz-transition: margin .25s ease-out;
        -o-transition: margin .25s ease-out;
        transition: margin .25s ease-out;
    }

    #sidebar-wrapper .sidebar-heading {
        padding: 0.875rem 1.25rem;
        font-size: 1.2rem;
    }

    #sidebar-wrapper .list-group {
        width: 15rem;
    }

    #page-content-wrapper {
        min-width: 100vw;
    }

    #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
    }

    @media (min-width: 768px) {
        #sidebar-wrapper {
            margin-left: 0;
        }

        #page-content-wrapper {
            min-width: 0;
            width: 100%;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: -15rem;
        }
    }
</style>



<div class="container">
        <div id="dashboard-heading">
                Dashboard
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card" id="admin-dashboard">
                        <div class="card-heading">Dashboard</div>

                        <div class="panel-body">
                            <canvas id="myChart" width="400" height="400"></canvas>
                            @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                            @endif

                            You are logged in! As Admin

                            <a href="/Event/create" class="btn btn-primay">Add event</a>
                            <a href="/Event" class="btn btn-primay">Show event</a>
                        </div>
                    </div>
                </div>
            </div>
</div>

<script>
    function a() {
        document.getElementById('wrapper').classList.toggle("toggled")
    }
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

@endsection