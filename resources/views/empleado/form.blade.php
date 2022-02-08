<div class=" container text-center ">

   <div class="row justify-content-between">
      <a  class="btn btn-primary col-md-2 offset-md-10" href="{{ url('empleado/') }}">Regresar</a>
      <h1>{{$modo}} empleado</h1>
   </div>

   <div class="container col-5">
      <div class="form-group">
         <label for="codCargo">Cargo:</label>
            <select  @if($modo == "Editar") disabled @endif  name="codCargo" id="codCargo"  value="{{ isset($empleado->codCargo) ? $empleado->codCargo:old('codCargo')}}">
            @foreach ($cargos as $cargo)
                  <option value="{{$cargo->codCargo}}">{{$cargo->nombreCargo}}</option>
            @endforeach
            
            </select>
      </div> 
      <br>
      <div class="form-group">
         <label for="nombreEmpleado">Nombre</label>
         <input type="text" class="form-control" name="nombreEmpleado" id="nombreEmpleado" value="{{ isset($empleado->nombreEmpleado) ? $empleado->nombreEmpleado:old('nombreEmpleado')}}">
      </div>

      <div class="form-group">
         <label for="apellidoEmpleado">Apellido</label>
         <input type="text" class="form-control" name="apellidoEmpleado" id="apellidapellidoEmpleadooPaciente" value="{{ isset($empleado->apellidoEmpleado)?$empleado->apellidoEmpleado:old('apellidoEmpleado')}}">
      </div>

      <div class="form-group">
         <label for="emailEmpleado">Correo</label>
         <input type="text" class="form-control"  name="emailEmpleado" id="emailEmpleado" value="{{ isset($empleado->emailEmpleado)?$empleado->emailEmpleado:old('emailEmpleado')}}">
      </div>
    </div>
    <br>
   <div class=" container form-group">
      <input type="submit"  class="btn btn-success" value="{{ $modo }} empleado">

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
