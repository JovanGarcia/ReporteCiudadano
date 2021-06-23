<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Domicilio;
use App\Models\Reportes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios=User::all();
        // retorna a la vista de usuarios
        return view('usuarios.usuarios', compact('usuarios'));
    }




    public function inicio(){
        //esta funcion retorna todos los registros de la tabla usuarios de la base de datos
        
        //$usuario = User::all();
        //return User::all();
        $sql = 'SELECT count(*) as num FROM users';
        $nouser = DB::select($sql);
        $sql2 = 'SELECT count(*) as num FROM users WHERE categoria = "Administrador"';
        $nouseradmin = DB::select($sql2);
        $sql3 = 'SELECT count(*) as num FROM users WHERE categoria = "Director"';
        $nouserdir = DB::select($sql3);
        $sql4 = 'SELECT count(*) as num FROM users WHERE categoria = "Jefe de Departamento"';
        $nouserdept = DB::select($sql4);
        $sql5 = 'SELECT count(*) as num FROM reportes WHERE estado = "Pendiente"';
        $reportespend = DB::select($sql5);
        $sql6 = 'SELECT count(*) as num FROM reportes WHERE estado = "Finalizado"';
        $reportesfin = DB::select($sql6);
        $sql7 = 'SELECT count(*) as num FROM reportes WHERE estado = "En proceso"';
        $reportesproc = DB::select($sql7);
        $sql8 = 'SELECT count(*) as num FROM reportes';
        $reportes = DB::select($sql8);
        $sql9 = 'SELECT * FROM reportes ORDER BY id DESC LIMIT 3';
        $reportesrec = DB::select($sql9);
        //$usuarios= new User();
        //$numerouser = $usuarios[0];
        //return $nouser[0]->num;
        return view('dashboard', compact('nouser','nouseradmin', 'nouserdir', 'nouserdept', 'reportes','reportespend','reportesfin','reportesproc','reportesrec'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuarios/usuariosForm');

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

        //$datosDomicilio = $request()->except('_token');
        

        //almacena los valores de los formularios enviados como parametro en el componente de alta, en el objeto $producto con los identificadores correspondientes
        /*$usuario = new User();
        $usuario->name = $request->name;
        $usuario->apellidos = $request->apellidos;
        $usuario->email = $request->email;
        $usuario->password =bcrypt($request->password);
        $usuario->sexo = $request->sexo;
        $usuario->telefono = $request->telefono;
        $usuario->tipo = $request->tipo;
        $usuario->id_med = $request->id_med;*/

        $domicilio = new Domicilio();
        $domicilio->municipio = "Victoria";
        $domicilio->colonia = $request->colonia;
        $domicilio->calle = $request->calle;
        $domicilio->numero_casa = $request->numerocasa;
        $domicilio->codigo_postal = $request->codigopostal;

        $domicilio->save();

        //select * from domicilios order by id desc limit 1
        //$producto->created_at = $prods->created_at;

        //se guarda el nuevo registro en la base de datos
        //$usuario->save();
        //$udomicilio="";
        $sql = 'SELECT * FROM domicilios ORDER BY id DESC LIMIT 1';
        $udomicilio = DB::select($sql);
        //retorna a la vista de usuarios
        //return view('usuarios/usuarios');
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->apellido_materno = $request->apellidomat;
        $usuario->apellido_paterno = $request->apellidopat;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->id_domicilio = $udomicilio[0]->id;
        $usuario->categoria = $request->categoria;
        //Hash::make($data['password'])

        $usuario->save();
        return redirect('/usuarios');
        //return $usuario;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $usuarios = User::find($id);

        $sql = 'SELECT * FROM domicilios WHERE id = '.$usuarios->id_domicilio;
        $udomicilio = DB::select($sql);
        $domicilio= new Domicilio();
        $domicilio = $udomicilio[0];
        
        //return $usuario;
        return view('usuarios.usuariosFormEdit', compact('usuarios','domicilio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Encuentra los datos del usuario seleccionado
        $usuario = User::findOrFail($id);
        //Se le asigna los valores nuevos a las columnas
        $usuario->name = $request->input('name');
        $usuario->apellido_materno = $request->input('apellidomat');
        $usuario->apellido_paterno = $request->input('apellidopat');
        $usuario->email = $request->input('email');
        $usuario->password = Hash::make($request->input('password'));
        //$usuario->id_domicilio = $request->input('id_domicilio');
        $usuario->categoria = $request->input('categoria');

        $domicilio = Domicilio::findOrFail($usuario->id_domicilio);

        $domicilio->colonia = $request->input('colonia');
        $domicilio->calle = $request->input('calle');
        $domicilio->codigo_postal = $request->input('codigopostal');
        $domicilio->numero_casa = $request->input('numerocasa');
        
        //se guardan los nuevos valores
        $usuario->save();
        $domicilio->save();
        return redirect('/usuarios');
        //return $domicilio; 
        //return $domicilio;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //destruir los datos del usuario con el id de parametro
        $usuario = User::findOrFail($id);
        $domicilio = Domicilio::findOrFail($usuario->id_domicilio);
        $domicilio->delete();
        return redirect('/usuarios');
    }
}
