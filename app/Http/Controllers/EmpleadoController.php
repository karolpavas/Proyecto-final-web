<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Cargo;

use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['empleados'] = Empleado::join('cargos', 'empleados.codCargo', '=', 'cargos.codCargo')->paginate(4);
        return view('empleado.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos["cargos"] = Cargo::paginate(30);
        return view('empleado.create', $datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'codCargo' => 'required|integer',
            'nombreEmpleado' => 'required|string|max:100',
            'apellidoEmpleado' => 'required|string|max:100',
            'emailEmpleado' => 'required|email',
        ];

        $mensaje =  [
            'required' => 'El :attribute es requerido',
        ];

        $this->validate($request,$campos);

        $datosEmpleado = request()->except('_token');
        Empleado::insert($datosEmpleado);
        return redirect('empleado')->with('mensaje','Empleado agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($codEmpleado)
    {
        $datos["empleado"] = Empleado::findOrFail($codEmpleado);
        $datos["cargos"] = Cargo::paginate(30);

        return view('empleado.edit', $datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $codEmpleado)
    {
        $campos = [
            'nombreEmpleado' => 'required|string|max:100',
            'apellidoEmpleado' => 'required|string|max:100',
            'emailEmpleado' => 'required|email',
        ];

        $mensaje = ['required' => 'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        $datosEmpleado = request()->except(['_token', '_method']);

        Empleado::where('codEmpleado','=', $codEmpleado)->update($datosEmpleado);

        $empleado = Empleado::findOrFail($codEmpleado);
        
        return redirect('empleado')->with('mensaje','Empleado Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($codEmpleado)
    {
        $empleado = Empleado::findOrFail($codEmpleado);
        Empleado::destroy($codEmpleado);
    
        return redirect('empleado')->with('mensaje','Empleado Borrado');
    }
}
