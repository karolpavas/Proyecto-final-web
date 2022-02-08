<?php

namespace App\Http\Controllers;

use App\Models\HistoriaClinica;
use App\Models\Paciente;
use App\Models\Empleado;
use Illuminate\Http\Request;

class HistoriaClinicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['historia_clinicas'] = HistoriaClinica::
        join('pacientes', 'historia_clinicas.cedulaPaciente', '=', 'pacientes.cedulaPaciente')->
        join('empleados', 'historia_clinicas.codEmpleado', '=', 'empleados.codEmpleado')->paginate(30);
        return view('historiaClinica.index', $datos);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datosEmpleado["empleados"] = Empleado::paginate(30);
        $datosPaciente["pacientes"] = Paciente::paginate(30);
        return view('historiaClinica.create', $datosEmpleado, $datosPaciente);
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
            //'codHistoria' => 'required|integer',
            'cedulaPaciente' => 'required|string|max:100',
            'codEmpleado' => 'required|string|max:100',
            'fechaCreacion' => 'date',
            'anamnesis' => 'required|string|max:1000',
            'exploracionFisica' => 'required|string|max:1000',
        ];

        $mensaje =  [
            'required' => 'El :attribute es requerido',
        ];

        $this->validate($request,$campos);

        $datosHistoriaClinica = request()->except('_token');
        HistoriaClinica::insert($datosHistoriaClinica);
        return redirect('historiaClinica')->with('mensaje','Historia Clinica agregada con exito');
    }

    public function historiaClinica($cedulaPaciente){
        $paciente = Paciente::findOrFail($cedulaPaciente);

        $datos["historiaClinica"] = HistoriaClinica::where('cedulaPaciente','=', $paciente->cedulaPaciente)
            ->join('empleados', 'historia_clinicas.codEmpleado', '=', 'empleados.codEmpleado')
            ->first();
        $datos["paciente"] = $paciente;
        return view('historiaClinica.show', $datos);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HistoriaClinica  $historiaClinica
     * @return \Illuminate\Http\Response
     */
    public function show(HistoriaClinica $historiaClinica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HistoriaClinica  $historiaClinica
     * @return \Illuminate\Http\Response
     */
    public function edit($cedulaPaciente)
    {
        $paciente = Paciente::findOrFail($cedulaPaciente);

        $datos["historiaClinica"] = HistoriaClinica::where('cedulaPaciente','=', $paciente->cedulaPaciente)->first();

        $datos["pacientes"] = Paciente::paginate(30);
        $datos["empleados"] = Empleado::paginate(30);

        return view('historiaClinica.edit', $datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HistoriaClinica  $historiaClinica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$codHistoria)
    {
        $campos = [
            //'codHistoria' => 'required|integer',
            //'cedulaPaciente' => 'required|string|max:100',
            'codEmpleado' => 'required|string|max:100',
            'fechaCreacion' => 'date',
            'anamnesis' => 'required|string|max:1000',
            'exploracionFisica' => 'required|string|max:1000',
        ];

        $mensaje = ['required' => 'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        $datosHistoriaClinica = request()->except(['_token', '_method']);

        HistoriaClinica::where('codHistoria','=', $codHistoria)->update( $datosHistoriaClinica);

        $historiaClinica = HistoriaClinica::findOrFail($codHistoria);
        
        return redirect('consulta')->with('mensaje','Historia Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HistoriaClinica  $historiaClinica
     * @return \Illuminate\Http\Response
     */
    public function destroy($codHistoria)
    {
        $historiaClinica = HistoriaClinica::findOrFail($codHistoria);
        HistoriaClinica::destroy($codHistoria);
    
        return redirect('historiaClinica')->with('mensaje','Historia Borrada');
    }
}
