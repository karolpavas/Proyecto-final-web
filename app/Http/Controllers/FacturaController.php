<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Empleado;
use App\Models\Factura;
use App\Models\Paciente;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['facturas'] = Factura::paginate(30);
        return view('factura.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($codConsulta)
    {
        // $datos["empleado"] = Empleado::paginate(30);
        // $datos["paciente"] = Paciente::paginate(30);
        // $datos["consulta"] = Consulta::paginate(30);

        $datos["consulta"] = Consulta::findOrFail($codConsulta);
        return view('factura.create', $datos);
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

    public function facturar($codConsulta)
    {
        //Obtener la consulta
        $consulta = Consulta::findOrFail($codConsulta);
        
        $factura = Factura::where('codConsulta','=', $consulta->codConsulta)
        ->join('empleados', 'empleados.codEmpleado', '=', 'facturas.codEmpleado')
        ->join('pacientes', 'pacientes.cedulaPaciente', '=', 'facturas.cedulaPaciente')
        ->first();

        if(!isset($factura)){
            //Definir el valor de la factura
            switch ($consulta->tipoConsulta) {
                case '1':
                    $valor = "$40.000";
                    break;
                case '2':
                    $valor = "$60.000";
                    break;
                case '3':
                    $valor = "$50.000";
                    break;
                default:
                    $valor = "$0";
                    break;
            }

            //Crear la factura
            $datosFactura = [
                'codEmpleado' => $consulta->codEmpleado,
                'cedulaPaciente' => $consulta->cedulaPaciente,
                'codConsulta' => $consulta->codConsulta,
                'estado' => 'Pendiente de pago',
                'valor' => $valor
            ];

            Factura::insert($datosFactura);

            $factura = Factura::where('codConsulta','=', $consulta->codConsulta)
            ->join('empleados', 'empleados.codEmpleado', '=', 'facturas.codEmpleado')
            ->join('pacientes', 'pacientes.cedulaPaciente', '=', 'facturas.cedulaPaciente')
            ->first();
        }

        //Pasar la nueva factura a la vista
        $datos["factura"] = $factura;
        $datos["consulta"] = $consulta;
        return view('factura.create', $datos);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show($codConsulta)
    {
        $datos["consulta"] = Consulta::findOrFail($codConsulta);
        return view('empleado.create', $datos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit($codFactura)
    {
        $datos["factura"] = Factura::findOrFail($codFactura);

        return view('factura.edit', $datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $codFactura)
    {
        $campos = [
            'codEmpleado' => 'required|integer',
            'cedulaPaciente' => 'required|string|max:100',
            'apellidoEmpleado' => 'required|string|max:100',
            'estado' => 'required|string',
            'fechaGeneracion' => 'required|string',
            'valor' => 'required|string',
        ];

        $mensaje = ['required' => 'El :attribute es requerido'];

        $this->validate($request,$campos,$mensaje);

        $datosFactura = request()->except(['_token', '_method']);

        Factura::where('codFactura','=', $codFactura)->update($datosFactura);

        $factura = Factura::findOrFail($codFactura);
        
        return redirect('factura')->with('mensaje','Factura Modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy($codFactura)
    {
        $factura = Factura::findOrFail($codFactura);
        Factura::destroy($codFactura);
    
        return redirect('factura')->with('mensaje','Factura Borrada');
    }
}
