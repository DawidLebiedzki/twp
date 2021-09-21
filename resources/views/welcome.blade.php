@extends('layouts.app')

@section('content-path')
    <div class="col-md-3">
        <h2>Welcome</h2>
        <small>You have 42 messages and 6 notifications.</small>
        <ul class="list-group clear-list m-t">
            <li class="list-group-item fist-item">
                <span class="float-right">
                    09:00 pm
                </span>
                <span class="label label-success">1</span> Please contact me
            </li>
            <li class="list-group-item">
                <span class="float-right">
                    10:16 am
                </span>
                <span class="label label-info">2</span> Sign a contract
            </li>
            <li class="list-group-item">
                <span class="float-right">
                    08:22 pm
                </span>
                <span class="label label-primary">3</span> Open new shop
            </li>
            <li class="list-group-item">
                <span class="float-right">
                    11:06 pm
                </span>
                <span class="label label-default">4</span> Call back to Sylvia
            </li>
            <li class="list-group-item">
                <span class="float-right">
                    12:00 am
                </span>
                <span class="label label-primary">5</span> Write a letter to Sandra
            </li>
        </ul>
    </div>
    <div class="col-md-6">
        <div class="flot-chart dashboard-chart">
            <div class="flot-chart-content" id="flot-dashboard-chart"></div>
        </div>
        <div class="row text-left">
            <div class="col">
                <div class=" m-l-md">
                    <span class="h5 font-bold m-t block">$ 406,100</span>
                    <small class="text-muted m-b block">Sales marketing report</small>
                </div>
            </div>
            <div class="col">
                <span class="h5 font-bold m-t block">$ 150,401</span>
                <small class="text-muted m-b block">Annual sales revenue</small>
            </div>
            <div class="col">
                <span class="h5 font-bold m-t block">$ 16,822</span>
                <small class="text-muted m-b block">Half-year revenue margin</small>
            </div>

        </div>
    </div>
    <div class="col-md-3">
        <div class="statistic-box">
            <h4>
                Project Beta progress
            </h4>
            <p>
                You have two project with not compleated task.
            </p>
            <div class="row text-center">
                <div class="col-lg-6">
                    <canvas id="doughnutChart2" width="80" height="80" style="margin: 18px auto 0"></canvas>
                    <h5>Kolter</h5>
                </div>
                <div class="col-lg-6">
                    <canvas id="doughnutChart" width="80" height="80" style="margin: 18px auto 0"></canvas>
                    <h5>Maxtor</h5>
                </div>
            </div>
            <div class="m-t">
                <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
            </div>

        </div>
    </div>


@endsection

@section('content')
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Tillmann liefert weltweit!</h5>
            </div>
            <div class="ibox-content">
                <div id="arc_map"></div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- DataMaps -->
    <script src="{{ asset('js/plugins/typehead/bootstrap3-typeahead.min.js') }}" defer></script>
    <script src="{{ asset('js/plugins/d3/d3.min.js') }}" defer></script>
    <script src="{{ asset('js/plugins/topojson/topojson.js') }}" defer></script>
    <script src="{{ asset('js/plugins/datamaps/datamaps.all.min.js') }}" defer></script>
    <script>
        $(document).ready(function() {





            var arc_map = new Datamap({
                element: document.getElementById("arc_map"),
                responsive: true,
                fills: {
                    defaultFill: "#DBDAD6",
                    active: "#23C6C8",
                    deu: "#1C84C6"
                },
                geographyConfig: {
                    highlightFillColor: '#23C6C8',
                    highlightBorderWidth: 0
                },
                data: {
                    DEU: {
                        fillKey: "deu"
                    },
                    USA: {
                        fillKey: "active"
                    },
                    FRA: {
                        fillKey: "active"
                    },
                    POL: {
                        fillKey: "active"
                    },
                    CHN: {
                        fillKey: "active"
                    },
                    GBR: {
                        fillKey: "active"
                    },
                    HUN: {
                        fillKey: "active"
                    },
                    ITA: {
                        fillKey: "active"
                    },
                    MEX: {
                        fillKey: "active"
                    },
                    CZE: {
                        fillKey: "active"
                    },
                    ROU: {
                        fillKey: "active"
                    },
                    SVK: {
                        fillKey: "active"
                    },
                    AUT: {
                        fillKey: "active"
                    }
                }
            });

            // arc_map.arc(
            //     [{
            //             origin: 'DEU',
            //             destination: 'USA'
            //         },
            //         {
            //             origin: 'DEU',
            //             destination: 'FRA'
            //         },
            //         {
            //             origin: 'DEU',
            //             destination: 'POL'
            //         },
            //         {
            //             origin: 'DEU',
            //             destination: 'GBR'
            //         },
            //         {
            //             origin: 'DEU',
            //             destination: 'CHN'
            //         },
            //         {
            //             origin: 'DEU',
            //             destination: 'HUN'
            //         },
            //         {
            //             origin: 'DEU',
            //             destination: 'ITA'
            //         },
            //          {
            //             origin: 'DEU',
            //             destination: 'MEX'
            //         }
            //     ], {
            //         strokeColor: '#F3A012',
            //         strokeWidth: 1
            //     }
            // );

            //orthographic_map.graticule();

            // Resize map on window resize
            $(window).on('resize', function() {
                setTimeout(function() {
                    basic.resize();
                    selected_map.resize();
                }, 100)
            });


        });
    </script>
@endsection
