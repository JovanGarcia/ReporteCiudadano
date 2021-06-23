@extends('layouts.layout')

@section('contenido')

<div class="right_col" role="main">
<div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-file">
                                        </i>
                                    </div>
                                    <div>Reporte
                                        <div class="page-title-subheading">Detalles del reporte
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>           <!-- <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Reportes Totales: </div>
                                            <div class="widget-subheading">Pendientes: </div>
                                            <div class="widget-subheading">En proceso: </div>
                                            <div class="widget-subheading">Finalizados: </div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Usuarios</div>
                                            <div class="widget-subheading">Administradores </div>
                                            <div class="widget-subheading">Directore </div>
                                            <div class="widget-subheading">Jefes de Departamento </div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>-->
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
                                    <div class="card-body"><h5 class="card-title">#{{$reportes->id}} {{$reportes->titulo}}</h5>
                                        <table class="mb-0 table table-hover">
                                            <thead>
                                                
                                            <tr>
                                                <!--<th><i class="pe-7s-bell"></i></th>-->
                                                {{$reportes->descripcion}}
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td scope="row">Dirección: {{$direcciones[0]->nombre_direccion}}</td>
                                                <td scope="row">Departamento: {{$departamentos[0]->nombre_dpto}}</td>
                                                
                                            </tr>
                                            <tr>
                                                <td scope="row">Fecha: {{$reportes->fecha}}</td>
                                                <td scope="row">Estado actual: {{$reportes->estado}}</td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Registrado por:</td>
                                                <td scope="row">
                                                    <?php

use Illuminate\Support\Facades\Auth;

for($i=0;$i<count($user);$i++){
                                                        if($reportes->id_usuario == $user[$i]->id){     
                                                            echo $user[$i]->name." ".$user[$i]->apellido_paterno." ".$user[$i]->apellido_materno;
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                            </tr>

                                            <tr>
                                            
                                            </tr>

                                            </tbody>
                                            <tfoot>

                                            <tr>
                                                <td>
                                                <form action="{{ url('/reportes/'. $reportes->id)}}" class="" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PUT') }} 
                                                <select type="text" name="estado" id="exampleSelectMulti" class="form-control">
                                                    <option value="Pendiente">Pendiente</option>
                                                    <option value="En proceso">En proceso</option>
                                                    <option value="Finalizado">Finalizado</option>
                                                    <option value="Rechazado">Rechazado</option>
                                                </select>
                                                </td>
                                                <td>
                                                    <input type="submit" class="btn btn-warning" value="Cambiar estado de reporte">
                                                </td>
                                                </form>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Foto</h5>
                                        <table class="mb-0 table table-hover">
                                            <thead>
                                            <tr>
                                                <center>
                                                <!--<th><i class="pe-7s-bell"></i></th>-->
                                                <img width="400px" height="350px" src="{{$foto[0]->direccion}}">
                                                </center>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">Nombre</th>
                                                <td>{{$foto[0]->nombre}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Ubicación</th>
                                                <td>{{$reportes->ubicacion}}</td>
                                            </tr>
                                            

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach($notas as $notas)
                        <div class="row">
                        <div class="col-md-12 col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">
                                    <?php
                                                for($i=0;$i<count($user);$i++){
                                                    
                                                    if($notas->id_usuario == $user[$i]->id){     
                                                         echo $user[$i]->name." ".$user[$i]->apellido_paterno." ".$user[$i]->apellido_materno;
                                                    }
                                                }

                                                if(Auth::user()->id == $notas->id_usuario){
                                                    ?>
                                                    
                                                    <div class="col-sm-12" style="text-align: right;">
                                                        <form action="{{ url('notas/'.$notas->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" ><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                                                        </form>
                                                    </div>
                                                    <?php
                                                }
                                                    ?>
                                    </h5>
                                    
                                        <table class="mb-0 table table-hover">
                                            <thead>
                                            <tr>
                                                <!--<th><i class="pe-7s-bell"></i></th>-->
                                                <h3>{{$notas->asunto}}</h3>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                            {{$notas->comentario}}
                                            </tr>
                                            </tbody>
                                            <tfoot>

                                            
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
@endforeach
<div class="row">
                        <div class="col-md-12 col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h3>Deja tu comentario</h3>
                                    <form action="{{ url('/notas/'. $reportes->id)}}" method="post" id="commentform">
                                    {{ csrf_field() }}
                                    <div class="position-relative row form-group">
                                        <div class="col-sm-12"><input name="asunto" value="" id="exampleEmail" placeholder="Asunto" type="text" class="form-control"></div>
                                    </div>
                                    <div class="position-relative row form-group">
                                        <div class="col-sm-12"><textarea name="comentario" value="" id="exampleEmail" placeholder="Comentario..." type="text" class="form-control"></textarea></div>
                                    </div>
                                    <div class="position-relative row form-group"><label for="exampleText" class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-5" style="text-align: right;"></div>
                                                <div class="col-sm-5" style="text-align: right;">
                                                    <input type="submit" class="btn btn-primary" value="Agregar nuevo comentario">
                                                </div>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
</div>
@endsection