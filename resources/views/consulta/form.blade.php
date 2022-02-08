<div class=" container text-center ">

   <div class="row justify-content-between">
      <a  class="btn btn-primary col-md-2 offset-md-10" href="{{ url('consulta/') }}">Regresar</a>
      <h1>{{$modo}} consulta</h1>
   </div>

   <div class="container col-3">
      <div class="form-group">
         <label for="codEmpleado">Empleado:</label>
            <select  @if($modo == "Editar") disabled @endif  name="codEmpleado" id="codEmpleado"  value="{{ isset($consulta->codEmpleado) ? $consulta->codEmpleado:old('codEmpleado')}}">
            @foreach ($empleados as $empleado)
                  <option value="{{$empleado->codEmpleado}}">{{$empleado->nombreEmpleado}}</option>
            @endforeach
            
            </select>
      </div> 
      <br>
      <div class="form-group">
         <label for="cedulaPaciente">Paciente:</label>
            <select  @if($modo == "Editar") disabled @endif  name="cedulaPaciente" id="cedulaPaciente"  value="{{ isset($consulta->cedulaPaciente) ? $consulta->cedulaPaciente:old('cedulaPaciente')}}">
            @foreach ($pacientes as $paciente)
                  <option value="{{$paciente->cedulaPaciente}}">{{$paciente->cedulaPaciente}}</option>
            @endforeach
            
            </select>
      </div> 
      <br>
      <div class="form-group">
         <label for="tipoConsulta">Tipo Consulta</label>
         <select  @if($modo == "Editar") disabled @endif  name="tipoConsulta" id="tipoConsulta"  value="{{ isset($consulta->tipoConsulta) ? $consulta->tipoConsulta:old('tipoConsulta')}}">
            <option value="1">Cita Psicologica</option>
            <option value="2">Terapia Cognitiva</option>
            <option value="3">Control Psiquiatria</option>
         </select>
      </div>
      <br>
      <div class="form-group">
         <label for="estado">Estado</label>
         <input type="text" class="form-control" name="estado" id="estado" value="{{ isset($consulta->estado) ? $consulta->estado:old('estado')}}">
      </div>

      <div class="form-group">
         <label for="fecha">Fecha</label>
         <input type="date" class="form-control"  name="fecha" id="fecha" value="{{ isset($consulta->fecha)?$consulta->fecha:old('fecha')}}">
      </div>
   </div>
   <br>
   <div class=" container form-group">
      <input type="submit"  class="btn btn-success" value="{{ $modo }} consulta">
   </div>

   @if (count($errors)>0)
   <div class="alert alert-danger" role="alert">
      <ul>
         @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
         @endforeach 
      </ul>
   </div>
   @endif
</div>
