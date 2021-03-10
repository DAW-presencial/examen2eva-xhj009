<?php

namespace App\Http\Controllers;

use App\Models\cendocente;
use Illuminate\Http\Request;

class CendocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //
        $datos['cendocente']=cendocente::paginate();
        return view('cendocentes.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cendocentes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validar campos
       $campos=[
        'denominacion' => 'required  | String | max:50',
        'cif'=> 'required  | String | max:20',
        'dir_postal'  => 'required  | String | max:100',
        'cp ' => 'required  | Char | max:5',
        'director_nom'  => 'required  | String | max:20',
        'pais_documento' => 'required  | String | max:100',
        'director_apellido1'  => 'required  | String | max:20',
        'director_apellido2'  => 'required  | String | max:20',
        'documento' => 'required',
        'titularidad' => 'required'
    ];
        $mensaje=["required" => 'El :attribute es requerido'];
        $this->validate($request,$campos,$mensaje);


        $datoscenDocentes = request()->except('_token');
        cendocente::insert($datoscenDocentes);
        return redirect('/')->with('Mensaje','CenDocente agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cendocente  $cendocente
     * @return \Illuminate\Http\Response
     */
    public function show(cendocente $cendocente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cendocente  $cendocente
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //Validar campos
       $campos=[
        'denominacion' => 'required  | String | max:50',
        'cif'=> 'required  | String | max:20',
        'dir_postal'  => 'required  | String | max:100',
        'cp ' => 'required  | Char | max:5',
        'director_nom'  => 'required  | String | max:20',
        'pais_documento' => 'required  | String | max:100',
        'director_apellido1'  => 'required  | String | max:20',
        'director_apellido2'  => 'required  | String | max:20',
        'documento' => 'required',
        'titularidad' => 'required'
    ];
        $mensaje=["required" => 'El :attribute es requerido'];
        $this->validate($request,$campos,$mensaje);

        $cendocente = cendocente::findOrFail($id);
        return view('cendocentes.edit',compact('cendocente'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cendocente  $cendocente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datoscenDocente = request()->except(['_token','_method']);
        cendocente::where('id','=',$id) -> update($datoscenDocente);
        return redirect('/')->with('Mensaje','Cendocente modificado exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cendocente  $cendocente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        cendocente::destroy($id);
        return redirect('/')->with('Mensaje','CenDocente eliminado exitosamente');
    }
}
