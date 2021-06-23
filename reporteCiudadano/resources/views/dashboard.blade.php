@extends('layouts.layout')

@section('contenido')

<div class="right_col" role="main">
<div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-home">
                                        </i>
                                    </div>
                                    <div>Inicio
                                        <div class="page-title-subheading">Página de Inicio
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>            <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Reportes Totales: </div>
                                            <div class="widget-subheading">Pendientes: {{$reportespend[0]->num}}</div>
                                            <div class="widget-subheading">En proceso: {{$reportesproc[0]->num}}</div>
                                            <div class="widget-subheading">Finalizados: {{$reportesfin[0]->num}}</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>{{$reportes[0]->num}}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Usuarios</div>
                                            <div class="widget-subheading">Administradores {{$nouseradmin[0]->num}}</div>
                                            <div class="widget-subheading">Directores {{$nouserdir[0]->num}}</div>
                                            <div class="widget-subheading">Jefes de Departamento {{$nouserdept[0]->num}}</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>{{$nouser[0]->num}}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                        <div class="row">
                           <!-- <div class="col-md-12 col-lg-6">
                                    
                                    z<div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <h5 class="card-title">Resumen</h5>
                                                <canvas id="chart-area">

                                                </canvas>
                                            </div>
                                    </div>

                            </div>-->
                            <div class="col-md-12 col-lg-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Ultimos reportes</h5>
                                        <table class="mb-0 table table-hover">
                                            <thead>
                                            <tr>
                                                <th><i class="pe-7s-bell"></i></th>
                                                
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($reportesrec)>=1)
                                            <tr>
                                            
                                                <th scope="row">{{$reportesrec[0]->id}}</th>
                                                <td><button class="mb-2 mr-2 btn btn-link">{{$reportesrec[0]->titulo}}
                                        </button></td>
                                            </tr>
                                            @endif
                                            @if(count($reportesrec)>=2)
                                            <tr>
                                                <th scope="row">{{$reportesrec[1]->id}}</th>
                                                <td><button class="mb-2 mr-2 btn btn-link">{{$reportesrec[1]->titulo}}
                                        </button></td>

                                            </tr>
                                            @endif
                                            @if(count($reportesrec)>=3)
                                            <tr>
                                                <th scope="row">{{$reportesrec[2]->id}}</th>
                                                <td><button class="mb-2 mr-2 btn btn-link">{{$reportesrec[2]->titulo}}
                                        </button></td>
                                            </tr>
                                            @endif

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
</div>
@endsection