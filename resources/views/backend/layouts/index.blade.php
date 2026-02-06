@extends('backend.app')
@section('title', 'Dashboard')
@section('page-content')
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <div class="flex-wrap container-fluid d-flex flex-stack flex-sm-nowrap">
            <!--begin::Info-->
            <div class="flex-wrap d-flex flex-column align-items-start justify-content-center me-2">
                <!--begin::Title-->
                <h1 class="text-dark fw-bold fs-2">
                    @yield('title' ?? 'Dashboard') <small class="text-muted fs-6 fw-normal ms-1"></small>
                </h1>
                <!--end::Title-->

                <!--begin::Breadcrumb-->
                <ul class="breadcrumb fw-semibold fs-base" style="padding: 0 0 0 6px;">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">
                            Home </a>
                    </li>

                    <li class="breadcrumb-item text-muted">
                        @yield('title' ?? 'Dashboard') </li>

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Toolbar-->

    <section>
        <div class="container-fluid">
            <!-- Stats Cards -->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="text-white card mini-stat bg-primary">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="float-start mini-stat-img me-4">
                                    <i class="bx bx-cube-alt font-size-24"></i>
                                </div>
                                <h5 class="font-size-16 text-uppercase text-white-50">Orders</h5>
                                <h4 class="fw-medium font-size-24">1,685</h4>
                                <div class="mini-stat-label bg-success">
                                    <p class="mb-0">+ 12%</p>
                                </div>
                            </div>
                            <div class="pt-2">
                                <div class="float-end">
                                    <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                                </div>
                                <p class="mt-1 mb-0 text-white-50">Since last month</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="text-white card mini-stat bg-success">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="float-start mini-stat-img me-4">
                                    <i class="bx bx-dollar font-size-24"></i>
                                </div>
                                <h5 class="font-size-16 text-uppercase text-white-50">Revenue</h5>
                                <h4 class="fw-medium font-size-24">$52,368</h4>
                                <div class="mini-stat-label bg-danger">
                                    <p class="mb-0">- 28%</p>
                                </div>
                            </div>
                            <div class="pt-2">
                                <div class="float-end">
                                    <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                                </div>
                                <p class="mt-1 mb-0 text-white-50">Since last month</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="text-white card mini-stat bg-warning">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="float-start mini-stat-img me-4">
                                    <i class="bx bx-user font-size-24"></i>
                                </div>
                                <h5 class="font-size-16 text-uppercase text-white-50">Customers</h5>
                                <h4 class="fw-medium font-size-24">15.4k</h4>
                                <div class="mini-stat-label bg-primary">
                                    <p class="mb-0">+ 05%</p>
                                </div>
                            </div>
                            <div class="pt-2">
                                <div class="float-end">
                                    <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                                </div>
                                <p class="mt-1 mb-0 text-white-50">Since last month</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="text-white card mini-stat bg-info">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="float-start mini-stat-img me-4">
                                    <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                </div>
                                <h5 class="font-size-16 text-uppercase text-white-50">Services</h5>
                                <h4 class="fw-medium font-size-24">12</h4>
                                <div class="mini-stat-label bg-warning">
                                    <p class="mb-0">+ 02%</p>
                                </div>
                            </div>
                            <div class="pt-2">
                                <div class="float-end">
                                    <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                                </div>
                                <p class="mt-1 mb-0 text-white-50">Since last month</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Realtime Chart Row -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-4 card-title">Live System Monitor (Real-time)</h4>
                            <div id="realtime-chart" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-4 card-title">Monthly Revenue & Orders</h4>
                            <div id="revenue-chart" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-4 card-title">Order Status</h4>
                            <div id="order-status-chart" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div>
                </div>
            </div>

             <!-- Recent Activity & Top Services -->
             <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-4 card-title">Top Selling Services</h4>
                            <div class="table-responsive">
                                <table class="table mb-0 table-hover table-centered table-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">Service Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Orders</th>
                                            <th scope="col" class="text-end">Revenue</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div>
                                                    <h5 class="text-truncate font-size-14">Dry Cleaning</h5>
                                                    <p class="mb-0 text-muted">Premium Wash</p>
                                                </div>
                                            </td>
                                            <td>$ 15.00</td>
                                            <td>125</td>
                                            <td class="text-end">$ 1,875</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div>
                                                    <h5 class="text-truncate font-size-14">Wash & Fold</h5>
                                                    <p class="mb-0 text-muted">Standard Service</p>
                                                </div>
                                            </td>
                                            <td>$ 10.00</td>
                                            <td>112</td>
                                            <td class="text-end">$ 1,120</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div>
                                                    <h5 class="text-truncate font-size-14">Ironing</h5>
                                                    <p class="mb-0 text-muted">Steam Press</p>
                                                </div>
                                            </td>
                                            <td>$ 8.00</td>
                                            <td>94</td>
                                            <td class="text-end">$ 752</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div>
                                                    <h5 class="text-truncate font-size-14">Carpet Cleaning</h5>
                                                    <p class="mb-0 text-muted">Deep Clean</p>
                                                </div>
                                            </td>
                                            <td>$ 45.00</td>
                                            <td>24</td>
                                            <td class="text-end">$ 1,080</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                     <div class="card">
                        <div class="card-body">
                            <h4 class="mb-4 card-title">Customer Satisfaction</h4>
                            <div id="customer-satisfaction-chart" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        $(document).ready(function() {
            // Revenue Chart
            var options = {
                series: [{
                    name: 'Revenue',
                    data: [31, 40, 28, 51, 42, 109, 100, 120, 80, 95, 110, 130]
                }, {
                    name: 'Orders',
                    data: [11, 32, 45, 32, 34, 52, 41, 60, 45, 55, 65, 70]
                }],
                chart: {
                    height: 350,
                    type: 'area',
                    toolbar: {
                        show: false
                    }
                },
                colors: ['#556ee6', '#34c38f'],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 2
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        inverseColors: false,
                        opacityFrom: 0.45,
                        opacityTo: 0.05,
                        stops: [20, 100, 100, 100]
                    },
                },
                xaxis: {
                    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
                },
                markers: {
                    size: 0
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right'
                },
            };
            var chart = new ApexCharts(document.querySelector("#revenue-chart"), options);
            chart.render();

            // Order Status Chart (Donut)
            var options2 = {
                series: [44, 55, 13, 33],
                chart: {
                    width: 380,
                    type: 'donut',
                },
                labels: ['Completed', 'Processing', 'Cancelled', 'Pending'],
                colors: ['#34c38f', '#556ee6', '#f46a6a', '#f1b44c'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };
            var chart2 = new ApexCharts(document.querySelector("#order-status-chart"), options2);
            chart2.render();

             // Customer Satisfaction Chart (RadialBar)
             var options3 = {
                series: [76],
                chart: {
                    height: 350,
                    type: 'radialBar',
                    offsetY: -10
                },
                plotOptions: {
                    radialBar: {
                        startAngle: -135,
                        endAngle: 135,
                        dataLabels: {
                            name: {
                                fontSize: '16px',
                                color: undefined,
                                offsetY: 120
                            },
                            value: {
                                offset: 0,
                                fontSize: '22px',
                                color: undefined,
                                formatter: function(val) {
                                    return val + "%";
                                }
                            }
                        }
                    }
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'dark',
                        shadeIntensity: 0.15,
                        inverseColors: false,
                        opacityFrom: 1,
                        opacityTo: 1,
                        stops: [0, 50, 65, 91]
                    },
                },
                stroke: {
                    dashArray: 4
                },
                labels: ['Positive Reviews'],
                colors: ['#556ee6']
            };
            var chart3 = new ApexCharts(document.querySelector("#customer-satisfaction-chart"), options3);
            chart3.render();

            // Real-time Chart
            var lastDate = 0;
            var data = [];
            var TICKINTERVAL = 86400000;
            let XAXISRANGE = 777600000;

            function getDayWiseTimeSeries(baseval, count, yrange) {
                var i = 0;
                while (i < count) {
                    var x = baseval;
                    var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

                    data.push({
                        x,
                        y
                    });
                    lastDate = baseval;
                    baseval += TICKINTERVAL;
                    i++;
                }
            }

            getDayWiseTimeSeries(new Date('11 Feb 2017 GMT').getTime(), 10, {
                min: 10,
                max: 90
            });

            function getNewSeries(baseval, yrange) {
                var newDate = baseval + TICKINTERVAL;
                lastDate = newDate;

                for (var i = 0; i < data.length - 10; i++) {
                    // IMPORTANT
                    // we reset the x and y of the data which is out of drawing area
                    // to prevent memory leaks
                    data[i].x = newDate - XAXISRANGE - TICKINTERVAL;
                    data[i].y = 0;
                }

                data.push({
                    x: newDate,
                    y: Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min
                })
            }

            function resetData() {
                // Alternatively, you can also reset the data at certain intervals to prevent creating a huge series 
                data = data.slice(data.length - 10, data.length);
            }

            var options4 = {
                series: [{
                    data: data.slice()
                }],
                chart: {
                    id: 'realtime',
                    height: 350,
                    type: 'line',
                    animations: {
                        enabled: true,
                        easing: 'linear',
                        dynamicAnimation: {
                            speed: 1000
                        }
                    },
                    toolbar: {
                        show: false
                    },
                    zoom: {
                        enabled: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                title: {
                    text: 'Live Traffic Updates',
                    align: 'left'
                },
                markers: {
                    size: 0
                },
                xaxis: {
                    type: 'datetime',
                    range: XAXISRANGE,
                },
                yaxis: {
                    max: 100
                },
                legend: {
                    show: false
                },
            };

            var chart4 = new ApexCharts(document.querySelector("#realtime-chart"), options4);
            chart4.render();

            window.setInterval(function() {
                getNewSeries(lastDate, {
                    min: 10,
                    max: 90
                })

                chart4.updateSeries([{
                    data: data
                }])
            }, 1000)

        });
    </script>
@endpush
