@extends('layouts.master')

@section('title') Dashboard @endsection

@section('content')

    @component('common-components.breadcrumb')
         @slot('title') Dashboard  @endslot
         @slot('li_1') Charts  @endslot
     @endcomponent

                   

                    <div class="row">
                        
                        
                        
                        
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Adultos Inscritos por Pais</h4>

                                    <div id="adultosXpais" class="apex-charts" dir="ltr"></div>
                                </div>
                            </div>
                            <!--end card-->
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Niños Inscritos por Pais</h4>

                                    <div id="ninosXpais" class="apex-charts" dir="ltr"></div>
                                </div>
                            </div>
                            <!--end card-->
                        </div>

                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Adultos Hombres Inscritos por Pais</h4>

                                    <div id="adultosHXpais" class="apex-charts" dir="ltr"></div>
                                </div>
                            </div>
                            <!--end card-->
                        </div>

                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Adultos Mujeres Inscritos por Pais</h4>

                                    <div id="adultosMXpais" class="apex-charts" dir="ltr"></div>
                                </div>
                            </div>
                            <!--end card-->
                        </div>

                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Niños Inscritos por Pais</h4>

                                    <div id="ninosHXpais" class="apex-charts" dir="ltr"></div>
                                </div>
                            </div>
                            <!--end card-->
                        </div>

                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Niñas Inscritos por Pais</h4>

                                    <div id="ninosMXpais" class="apex-charts" dir="ltr"></div>
                                </div>
                            </div>
                            <!--end card-->
                        </div>
                        
                    </div>
                    <!-- end row -->


@endsection

@section('script')

    <!-- apexcharts -->
    <script src="{{URL::asset('/libs/apexcharts/apexcharts.min.js')}}"></script>

    <!-- apexcharts init -->
    {{-- <script src="{{URL::asset('/js/pages/apexcharts.init.js')}}"></script> --}}
    <script type="text/javascript">

        var options = {
            chart: {
            height: 400,
            type: 'bar',
            toolbar: {
                show: false
            }
            },
            plotOptions: {
            bar: {
                horizontal: true
            }
            },
            dataLabels: {
            enabled: false
            },
            series: [{
            data:  @json($totales1)
                
            }],
            colors: ['#3b5998'],
            grid: {
            borderColor: '#f1f1f1'
            },
            xaxis: {
            categories:  @json($paises1)
            }
        };
        var chart = new ApexCharts(document.querySelector("#adultosXpais"), options);
        chart.render(); 

        
        var options = {
            chart: {
            height: 400,
            type: 'bar',
            toolbar: {
                show: false
            }
            },
            plotOptions: {
            bar: {
                horizontal: true
            }
            },
            dataLabels: {
            enabled: false
            },
            series: [{
            data:  @json($totales2)
                
            }],
            colors: ['#c4302b'],
            grid: {
            borderColor: '#f1f1f1'
            },
            xaxis: {
            categories:  @json($paises2)
            }
        };
        var chart = new ApexCharts(document.querySelector("#ninosXpais"), options);
        chart.render(); 
       

        var options = {
            chart: {
            height: 400,
            type: 'bar',
            toolbar: {
                show: false
            }
            },
            plotOptions: {
            bar: {
                horizontal: false
            }
            },
            dataLabels: {
            enabled: false
            },
            series: [{
            data:  @json($totales3)
                
            }],
            colors: ['#3b5998'],
            grid: {
            borderColor: '#f1f1f1'
            },
            xaxis: {
            categories:  @json($paises3)
            }
        };
        var chart = new ApexCharts(document.querySelector("#adultosHXpais"), options);
        chart.render(); 

        var options = {
            chart: {
            height: 400,
            type: 'bar',
            toolbar: {
                show: false
            }
            },
            plotOptions: {
            bar: {
                horizontal: false
            }
            },
            dataLabels: {
            enabled: false
            },
            series: [{
            data:  @json($totales4)
                
            }],
            colors: ['#c4302b'],
            grid: {
            borderColor: '#f1f1f1'
            },
            xaxis: {
            categories:  @json($paises4)
            }
        };
        var chart = new ApexCharts(document.querySelector("#adultosMXpais"), options);
        chart.render(); 

        var options = {
            chart: {
            height: 400,
            type: 'bar',
            toolbar: {
                show: false
            }
            },
            plotOptions: {
            bar: {
                horizontal: false
            }
            },
            dataLabels: {
            enabled: false
            },
            series: [{
            data:  @json($totales5)
                
            }],
            colors: ['#00AAE4'],
            grid: {
            borderColor: '#f1f1f1'
            },
            xaxis: {
            categories:  @json($paises5)
            }
        };
        var chart = new ApexCharts(document.querySelector("#ninosHXpais"), options);
        chart.render(); 

        var options = {
            chart: {
            height: 400,
            type: 'bar',
            toolbar: {
                show: false
            }
            },
            plotOptions: {
            bar: {
                horizontal: false
            }
            },
            dataLabels: {
            enabled: false
            },
            series: [{
            data:  @json($totales6)
                
            }],
            colors: ['#e41c78'],
            grid: {
            borderColor: '#f1f1f1'
            },
            xaxis: {
            categories:  @json($paises6)
            }
        };
        var chart = new ApexCharts(document.querySelector("#ninosMXpais"), options);
        chart.render(); 

    </script>
@endsection