@extends('layouts.app')


@section('namePage')
    dashboard
@endsection


@section('nav')
    <li  class="mm-active"><a href="/dashboard" class="ai-icon  mm-active" aria-expanded="false">
            <i class="flaticon-025-dashboard"></i>
            <span class="nav-text">Dashboard</span>
        </a>
    </li>

    <li><a href="/client" class="ai-icon" aria-expanded="false">
            <i class="flaticon-044-menu"></i>
            <span class="nav-text">Client</span>
        </a>
    </li>
    <li><a href="{{ route('milk_reception') }}" class="ai-icon" aria-expanded="false">
            <i class="flaticon-017-clipboard"></i>
            <span class="nav-text">receptions de lait </span>
        </a>
    </li>
    <li ><a href="/historique" class="ai-icon" aria-expanded="false">
            <i class="flaticon-022-copy"></i>
            <span class="nav-text">factur</span>
        </a>
    </li>
    <!--<li><a href="historique" class="ai-icon" aria-expanded="false">
            <i class="flaticon-022-copy"></i>
            <span class="nav-text">Salarié</span>
        </a>
    </li>
    <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
            <i class="flaticon-013-checkmark"></i>
            <span class="nav-text">Partenaire</span>
        </a>
    </li>
    <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
            <i class="fa fa-user"></i>
            <span class="nav-text">Administration</span>
        </a>
    </li>
    <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
            <i class="fa fa-paper-plane"></i>
            <span class="nav-text">Email</span>
        </a>
    </li>
    <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
            <i class="fa fa-desktop" aria-hidden="true"></i>
            <span class="nav-text">Site Web</span>
        </a>
    </li>-->
@endsection
@section('content')
    <div class="row">
        <div class="col-sm">

        </div>
        <div class="col-sm-7">

        </div>
        <div class="col-sm">
            <!-- Button ajouter lait include et modal -->
            {{-- <x-ajouter-lait :clients="$clients" /> --}}
        </div>
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Sales'],
                ['2004', 1000],
                ['2004', 1000],
                ['2004', 1000],
                ['2004', 1000],




            ]);

            var options = {
                title: 'Company Performance',
                curveType: 'function',
                legend: {
                    position: 'bottom'
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
    </script>


    <body>
        <div id="curve_chart" style="width: 900px; height: 500px"></div>
    </body>
@endsection

@section('secript')
@endsection
