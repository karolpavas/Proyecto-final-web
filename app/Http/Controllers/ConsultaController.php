<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Empleado;
use App\Models\Paciente;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['consultas'] = Consulta::join('empleados', 'empleados.codEmpleado', '=', 'consultas.codEmpleado')
                                        ->join('pacientes', 'pacientes.cedulaPaciente', '=', 'consultas.cedulaPaciente')
                                        ->paginate(30);
        return view('consulta.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos["pacientes"] = Paciente::paginate(30);
        $datos["empleados"] = Empleado::paginate(30);

        return view('consulta.create', $datos);
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
            'codEmpleado' => 'required|integer',
            'cedulaPaciente' => 'required|string',
            'estado' => 'required|string|max:100',
            'fecha' => 'required|string|max:100',
            'tipoConsulta' => 'required|string|max:100',
        ];

        $mensaje =  [
            'required' => 'El :attribute es requerido',
        ];

        $this->validate($request,$campos);

        $datosConsulta = request()->except('_token');
        Consulta::insert($datosConsulta);
        return redirect('consulta')->with('mensaje','Consulta agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function show(Consulta $consulta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function edit($codConsulta)
    {
        
        $datos["consulta"] = Consulta::findOrFail($codConsulta);

        $datos["pacientes"] = Paciente::paginate(30);
        $datos["empleados"] = Empleado::paginate(30);

        return view('consulta.edit', $datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $codConsulta)
    {
        $campos = [
            'estado' => 'required|string|max:100',
            'fecha' => 'required|string|max:100',
        ];

        $mensaje = ['required' => 'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        $datosConsulta = request()->except(['_token', '_method']);

        Consulta::where('codConsulta','=', $codConsulta)->update($datosConsulta);

        $consulta = Consulta::findOrFail($codConsulta);
        
        return redirect('consulta')->with('mensaje','Consulta Modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function destroy($codConsulta)
    {
        $consulta = Consulta::findOrFail($codConsulta);
        Consulta::destroy($codConsulta);
    
        return redirect('consulta')->with('mensaje','Consulta Borrado');
    }
}
