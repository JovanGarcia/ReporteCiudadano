@extends('layouts.layout')

@section('contenido')

<div class="right_col" role="main">
<div class="app-main__inner">
                                   

                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">Ingresa los datos del nuevo usuario</h5>
                                        <div class="row"><label for="examplePassword" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-5"></div>
                                            <div class="col-sm-5" style="text-align: right;"> <label class="card-title"></label></div>
                                        </div>
                                       
                                        <form action="{{ url('/usuarios')}}" class="" method="POST">
                                        {{ csrf_field() }}
                                            <h5 class="card-title">Datos del Usuario</h5>

                                            <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Nombre del usuario</label>
                                                <div class="col-sm-10"><input name="name" id="exampleEmail" placeholder="Nombre" type="text" class="form-control"></div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="examplePassword" class="col-sm-2 col-form-label">Apellidos</label>
                                                <div class="col-sm-5"><input name="apellidopat" id="examplePassword" placeholder="Apellido Paterno" type="text" class="form-control"></div>
                                                <div class="col-sm-5"><input name="apellidomat" id="examplePassword" placeholder="Apellido Materno" type="text" class="form-control"></div>
                                            </div>
                                            
                                            <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">Datos de inicio de sesion</label>
                                                    <div class="col-sm-5"><input type="text" name="email" id="exampleSelectMulti" placeholder="Correo electrónico" class="form-control"></input></div>                                                 
                                                    <div class="col-sm-5"><input type="password" name="password" id="exampleSelectMulti" placeholder="Contraseña" class="form-control"></input></div>
                                            </div>

                                            <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">Tipo de usuario</label>
                                                <div class="col-sm-5"><select type="text" name="categoria" id="exampleSelectMulti" class="form-control">
                                                    <option value="Administrador">Administrador</option>
                                                    <option value="Director">Director</option>
                                                    <option value="Jefe de Departamento">Jefe de Departamento</option>
                                                </select></div>
                                            </div>

                                    
                                            <h5 class="card-title">Datos de Domicilio</h5>
                                            <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">Colonia</label>
                                            <div class="col-sm-10"><input type="text" placeholder="Colonia" name="colonia" id="exampleSelectMulti" class="form-control"></input></div>    
                                            </div>
                                            <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">Calle</label>
                                                <div class="col-sm-10"><input type="text" placeholder="Calle" name="calle" id="exampleSelectMulti" class="form-control"></input></div>
                                            </div>
                                            <div class="position-relative row form-group"><label for="exampleSelectMulti" class="col-sm-2 col-form-label">Codigo postal y No. exterior</label>
                                                <div class="col-sm-5"><input type="number" placeholder="Codigo postal" name="codigopostal" id="exampleSelectMulti" class="form-control"></input></div>
                                                <div class="col-sm-5"><input type="number" placeholder="Numero exterior" name="numerocasa" id="exampleSelectMulti" class="form-control"></input></div>
                                            </div>
                                            
                                            <div class="position-relative row form-group"><label for="exampleText" class="col-sm-12 col-form-label">
                                           
                                            </div>
                                            <div class="position-relative row form-group"><label for="exampleText" class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-5" style="text-align: right;"></div>
                                                <div class="col-sm-5" style="text-align: right;">
                                                    <input type="submit" class="btn btn-primary" value="Enviar">
                                                </div>
                                            </div>
                                                <div class="col-sm-10"><textarea hidden="" name="hidden" id="exampleText" class="form-control"></textarea></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>    
</div>
@endsection