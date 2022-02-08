<?php

namespace App\Http\Controllers;

use App\Models\reportes;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use App\Models\Consulta;
use App\Models\Empleado;
use App\Models\Paciente;
use App\Models\Factura;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reporte.index');
    }

    public function consultas(){

        $tipoConsultas = Consulta::selectRaw("tipoConsulta, COUNT(*) as total")->groupBy("tipoConsulta")->get();

        $data = [];
        
        foreach ($tipoConsultas as $key => $tipoConsulta) {
            $data[$tipoConsulta->tipoConsulta] = $tipoConsulta->total;
        }

        return [
            "data" => $data
        ];
    }

    public function general(){
        $data = [
            "consultas" => Consulta::selectRaw("COUNT(*) as total")->get()[0]["total"],
            "empleados" => Empleado::selectRaw("COUNT(*) as total")->get()[0]["total"],
            "pacientes" => Paciente::selectRaw("COUNT(*) as total")->get()[0]["total"],
            "facturas" => Factura::selectRaw("COUNT(*) as total")->get()[0]["total"],
        ];
        
        return [
            "data" => $data
        ];
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
     * @param  \App\Models\reportes  $reportes
     * @return \Illuminate\Http\Response
     */
    public function show(reportes $reportes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reportes  $reportes
     * @return \Illuminate\Http\Response
     */
    public function edit(reportes $reportes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\reportes  $reportes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reportes $reportes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reportes  $reportes
     * @return \Illuminate\Http\Response
     */
    public function destroy(reportes $reportes)
    {
        //
    }
}
