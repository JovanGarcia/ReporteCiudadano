@extends('layouts.layout')

@section('contenido')


<div class="right_col" role="main">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-users">
                                        </i>
                                    </div>
                                    <div>Usuarios
                                        <div class="page-title-subheading">Página de Administración de Usuarios
                                        </div>
                                        <a href="{{ url('usuarios/create') }}" class="btn-wide btn btn-success">Crear nuevo Usuario</a>
                                    </div>
                                </div>
                            </div>
                        </div>            

                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Usuarios Activos
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Nombre</th>
                                                <th class="text-center">Categoria</th>
                                                <th class="text-center">Correo</th>
                                                <th class="text-center">Acciones</th> 
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($usuarios as $usuarios)
                                            <tr>
                                                <td class="text-center text-muted">{{$usuarios->id}}</td>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <div class="widget-content-left">
                                                                    <img width="40" class="rounded-circle" src="assets/images/avatars/1.jpg" alt=""></div>
                                                            </div>
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading">{{$usuarios->name}} {{$usuarios->apellido_paterno}} {{$usuarios->apellido_materno}}</div>
                                                                <div class="widget-subheading opacity-7">Usuario</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">{{$usuarios->categoria}}</td>
                                                <td class="text-center">{{$usuarios->email}}</td>
                                                <td class="text-center">
                                                    <a  href="{{url('usuarios/'.$usuarios->id)}}" class="mr-2 btn-icon btn-icon-only btn btn-outline-warning" ><i class="pe-7s-pen btn-icon-wrapper"> </i></a>
                                                    <form action="{{ url('usuarios/'.$usuarios->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" ><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                            
                                        </table>
                                    </div>
                                    <div class="d-block text-center card-footer">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
</div>
@endsection