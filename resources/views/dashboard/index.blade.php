@extends('layouts.master')

@section('title') Dashboard @endsection

@section('content')

    @component('common-components.breadcrumb')
         @slot('title') Dashboard  @endslot
         @slot('li_1') Charts  @endslot
     @endcomponent

                   

                    <div class="row">
                        
                        <div class="col-xl-3">
                            
                            @component('common-components.dashboard-widget')
                            
                                @slot('title') Nuevos Adulto @endslot
                                @slot('iconClass') fa fa-male  @endslot
                                @slot('price') {{$nuevosAdultos}}  @endslot
                                @slot('percentage') {{$porcentajeAdultos}}%   @endslot
                                @slot('pClass') progress-bar bg-primary   @endslot
                                @slot('pValue') {{$porcentajeAdultos}}   @endslot
                                
                            @endcomponent
                            
                            @component('common-components.dashboard-widget')
                            
                                @slot('title') Nuevos Niños  @endslot
                                @slot('iconClass') fa fa-child  @endslot
                                @slot('price') {{$nuevosHijos}}  @endslot
                                @slot('percentage') {{$porcentajeHijos}}%   @endslot
                                @slot('pClass') progress-bar bg-pink  @endslot
                                @slot('pValue') {{$porcentajeHijos}}  @endslot
                                
                            @endcomponent
        
                        </div>
                        
                        
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Niños Inscritos por Corregimiento</h4>

                                    <div id="niñosInscritos" class="apex-charts" dir="ltr"></div>
                                </div>
                            </div>
                            <!--end card-->
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Adultos Por Sexo</h4>

                                    <div id="adultoSexo" class="apex-charts" dir="ltr"></div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Niños Por Sexo</h4>

                                    <div id="hijoSexo" class="apex-charts" dir="ltr"></div>
                                </div>
                            </div>
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
            data:  @json($totales)
                
            }],
            colors: ['#293E92'],
            grid: {
            borderColor: '#f1f1f1'
            },
            xaxis: {
            categories:  @json($corregimientos)
            }
        };
        var chart = new ApexCharts(document.querySelector("#niñosInscritos"), options);
        chart.render(); 

        var options = {
            chart: {
                height: 180,
                type: 'pie'
            },
            series: @json($adultosXSexo),
            labels: ["Masculinos", "Femeninos"],
            colors: ["#1B42E0", "#E41C78"],
            legend: {
                show: true,
                position: 'bottom',
                horizontalAlign: 'center',
                verticalAlign: 'middle',
                floating: false,
                fontSize: '14px',
                offsetX: 0
            },
            responsive: [{
                breakpoint: 600,
                options: {
                chart: {
                    height: 240
                },
                legend: {
                    show: false
                }
                }
            }]
            };
        var chart = new ApexCharts(document.querySelector("#adultoSexo"), options);
        chart.render();

        var options = {
            chart: {
                height: 180,
                type: 'pie'
            },
            series: @json($hijosXSexo),
            labels: ["Masculinos", "Femeninos"],
            colors: ["#1B42E0", "#E41C78"],
            legend: {
                show: true,
                position: 'bottom',
                horizontalAlign: 'center',
                verticalAlign: 'middle',
                floating: false,
                fontSize: '14px',
                offsetX: 0
            },
            responsive: [{
                breakpoint: 600,
                options: {
                chart: {
                    height: 240
                },
                legend: {
                    show: false
                }
                }
            }]
            };
        var chart = new ApexCharts(document.querySelector("#hijoSexo"), options);
        chart.render();

    </script>
@endsection