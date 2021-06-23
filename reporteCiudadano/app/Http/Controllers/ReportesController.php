<?php

namespace App\Http\Controllers;

use App\Models\Reportes;
use App\Models\Direccion;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reportes=Reportes::all();
        $sql = 'SELECT * FROM direcciones ';
        $direccion = DB::select($sql);
        //return $direccion;
        //$direccion = $direcciones[0];
        // retorna a la vista de usuarios
        return view('reportes.reportes', compact('reportes','direccion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reportes  $reportes
     * @return \Illuminate\Http\Response
     */
    public function show(Reportes $reportes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reportes  $reportes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $reportes = Reportes::find($id);

        $sql = 'SELECT * FROM fotos WHERE id_reporte = '.$id;
        $foto = DB::select($sql);
        $sql2 = 'SELECT * FROM notas WHERE id_reporte = '.$id;
        $notas = DB::select($sql2);
        $sql3 = 'SELECT * FROM direcciones WHERE id = '.$reportes->id_direccion;
        $direcciones = DB::select($sql3);
        $sql4 = 'SELECT * FROM departamentos WHERE id = '.$direcciones[0]->id_departamento;
        $departamentos = DB::select($sql4);
        $user = User::all();
        //return $notas;
        return view('reportes.reportesView', compact('reportes','foto', 'notas','user', 'direcciones', 'departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reportes  $reportes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //Encuentra los datos del usuario seleccionado
        $reporte = Reportes::findOrFail($id);
        //Se le asigna los valores nuevos a las columnas
        $reporte->estado = $request->input('estado');
        
        $reporte->save();
        return redirect('/reportes/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reportes  $reportes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //destruir los datos del usuario con el id de parametro
        $reporte = Reportes::findOrFail($id);
        //$domicilio = Fotos::findOrFail($usuario->id_domicilio);
        $reporte->delete();
        return redirect('/reportes');
    }
}
