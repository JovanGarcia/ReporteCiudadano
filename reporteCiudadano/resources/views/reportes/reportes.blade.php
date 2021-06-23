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
                                    <div>Reportes
                                        <div class="page-title-subheading">Página de Administración de Reportes
                                        </div>
                                        <!--<a href="{{ url('reportes/create') }}" class="btn-wide btn btn-success">Crear nuevo Usuario</a>-->
                                    </div>
                                </div>
                            </div>
                        </div>            

                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Reportes registrados
                                    </div>
                                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Busca reporte..">
                                    <div class="table-responsive">
                                        <table id="myTable" class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Titulo</th>
                                                <th class="text-center">Dirección</th>
                                                <th class="text-center">Fecha</th>
                                                <th class="text-center">Estado</th>
                                                <th class="text-center">Opciones</th> 
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($reportes as $reportes)
                                            <tr>
                                                <td class="text-center text-muted">{{$reportes->id}}</td>
                                                <td>
                                                {{$reportes->titulo}}
                                                </td>
                                                <td class="text-center">
                                                <?php
                                                for($i=0;$i<count($direccion);$i++){
                                                    
                                                    if($reportes->id_direccion == $direccion[$i]->id){
                                                                                   
                                                         echo $direccion[$i]->nombre_direccion;

                                                    
                                                    }
                                                }
                                                    ?>

                                               
                                                </td>
                                                <td class="text-center">{{$reportes->fecha}}</td>
                                                <td class="text-center">{{$reportes->estado}}</td>
                                                <td class="text-center">
                                                    <a  href="{{url('reportes/'.$reportes->id)}}" class="mr-2 btn-icon btn-icon-only btn btn-outline-success" ><i class="pe-7s-look btn-icon-wrapper"> </i></a>
                                                    <form action="{{ url('reportes/'.$reportes->id) }}" method="POST">
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

<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
@endsection