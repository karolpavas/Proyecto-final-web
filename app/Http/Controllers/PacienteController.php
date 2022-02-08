<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['pacientes']= Paciente::paginate(30);
        return view('paciente.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paciente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'cedulaPaciente' => 'required|string',
            'nombrePaciente' => 'required|string|max:100',
            'apellidoPaciente' => 'required|string|max:100',
            'emailPaciente' => 'required|email',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $this->validate($request,$campos);

        $datosPacientes = request()->except('_token');
        Paciente::insert($datosPacientes);
        return redirect('paciente')->with('mensaje','Paciente agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit($cedulaPaciente)
    {
        $paciente= Paciente::findOrFail($cedulaPaciente);
        return view('paciente.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cedulaPaciente)
    {
        $campos=[
            'cedulaPaciente' => 'required|string',
            'nombrePaciente' => 'required|string|max:100',
            'apellidoPaciente' => 'required|string|max:100',
            'emailPaciente' => 'required|email',
        ];

        $mensaje=['required'=>'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        $datosPaciente = request()->except(['_token', '_method']);

        Paciente::where('cedulaPaciente','=',$cedulaPaciente)->update($datosPaciente);

        $paciente= Paciente::findOrFail($cedulaPaciente);
        return redirect('paciente')->with('mensaje','paciente Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy($cedulaPaciente)
    {
        $paciente= Paciente::findOrFail($cedulaPaciente);
        Paciente::destroy($cedulaPaciente);
    
        return redirect('paciente')->with('mensaje','Paciente Borrado');
    }
}

