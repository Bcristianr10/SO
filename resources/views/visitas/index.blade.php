@extends('layouts.master')

@section('title') Visitas @endsection
@section('css')

    <!-- DataTables -->
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('title') Visitas  @endslot
        @slot('title_li') Bienvenido a Organizacion sin Fronteras   @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-10 offset-md-1">
            @include('plantilla.error')
            <div class="card">
                <div class="card-body">
                    
                    
                        
                    <form action="{{route('buscar.visitas')}}" method="POST" role="form" autocomplete="off" >
                        <div class="row">
                            <h4 class="card-title col-sm-2">Visitas</h4>
                            @csrf
                            <div class="col-sm-2 offset-sm-3">
                                
                                <select class="form-control" aria-label="Default select example" name='txtAno'>
                                    @foreach ($anos as $item)
                                        <option>{{$item->ano}}</option>
                                    @endforeach
                                    
                                    
                                </select> 
                                

                            </div>
                            <div class="col-sm-4 ">
                            
                                <select class="form-control" aria-label="Default select example" name='txtMes'>
                                    
                                    <option value="00" selected>Todos los Meses</option>
                                    <option value="01">Enero</option>
                                    <option value="02">Febrero</option>
                                    <option value="03">Marzo</option>
                                    <option value="04">Abril</option>
                                    <option value="05">Mayo</option>
                                    <option value="06">Junio</option>
                                    <option value="07">Julio</option>
                                    <option value="08">Agosto</option>
                                    <option value="09">Septiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                    
                                    
                                </select> 
                                

                            </div>
                            <div class="col-sm-1 ">
                                
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    <i class="fa fa-search"></i> 
                                </button>
                                
                                

                            </div>
                        </div>
                    </form>

                        
                    
                    <br><br>
                    
                    <div>
                        <div id="line_chart_datalabel" class="apex-charts" dir="ltr"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>

    
@endsection

@section('script')

    <!-- Required datatable js -->
    <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>

    <script src="{{ URL::asset('/libs/tinymce/tinymce.min.js')}}"></script>

<!-- init js -->
    <script src="{{ URL::asset('/js/pages/form-editor.init.js')}}"></script>

    <script src="{{ URL::asset('/libs/apexcharts/apexcharts.min.js')}}"></script>

    <!-- apexcharts init -->
    <script type="text/javascript">

        var options = {
        chart: {
            height: 380,
            type: 'line',
            zoom: {
            enabled: false
            },
            toolbar: {
            show: false
            }
        },
        colors: ['#3b5de7', '#eeb902'],
        dataLabels: {
            enabled: true
        },
        stroke: {
            width: [3, 3],
            curve: 'straight'
        },
        series: [{
            name: "2022",
            data: @json($totales)
        }],
        title: {
            text: 'Cantidad de visitas por Mes',
            align: 'left'
        },
        grid: {
            row: {
            colors: ['transparent', 'transparent'],
            // takes an array which will be repeated on columns
            opacity: 0.2
            },
            borderColor: '#f1f1f1'
        },
        markers: {
            style: 'inverted',
            size: 6
        },
        xaxis: {
            categories: @json($meses),
            title: {
            text: 'Meses'
            }
        },
        yaxis: {
            title: {
            text: 'Visitas'
            },
            min: @json($minimo),
            max: @json($maximo)
        },
        legend: {
            position: 'top',
            horizontalAlign: 'right',
            floating: true,
            offsetY: -25,
            offsetX: -5
        },
        responsive: [{
            breakpoint: 600,
            options: {
            chart: {
                toolbar: {
                show: false
                }
            },
            legend: {
                show: false
            }
            }
        }]
        };
        var chart = new ApexCharts(document.querySelector("#line_chart_datalabel"), options);
        chart.render(); //  line chart datalabel

    </script>

@endsection