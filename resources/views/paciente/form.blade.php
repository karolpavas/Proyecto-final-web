<div class=" container text-center ">

   <div class="row justify-content-between">
      <a  class="btn btn-primary col-md-2 offset-md-10" href="{{ url('paciente/') }}">Regresar</a>
      <h1>{{$modo}} paciente</h1>
   </div>

   <div class="container col-5">
      <div class="form-group">
         <label for="cedulaPaciente">Cedula</label>
         <input type="text" class="form-control" name="cedulaPaciente" id="cedulaPaciente" value="{{ isset($paciente->cedulaPaciente) ? $paciente->cedulaPaciente:old('cedulaPaciente')}}">
      </div>

      <div class="form-group">
         <label for="nombrePaciente">Nombre</label>
         <input type="text" class="form-control" name="nombrePaciente" id="nombrePaciente" value="{{ isset($paciente->nombrePaciente) ? $paciente->nombrePaciente:old('nombrePaciente')}}">
      </div>

      <div class="form-group">
         <label for="apellidoPaciente">Apellido</label>
         <input type="text" class="form-control" name="apellidoPaciente" id="apellidoPaciente" value="{{ isset($paciente->apellidoPaciente)?$paciente->apellidoPaciente:old('apellidoPaciente')}}">
      </div>

      <div class="form-group">
         <label for="emailPaciente">Correo</label>
         <input type="text" class="form-control"  name="emailPaciente" id="emailPaciente" value="{{ isset($paciente->emailPaciente)?$paciente->emailPaciente:old('emailPaciente')}}">
      </div>

      <div class="form-group">
         <label for="celularPaciente">Celular</label>
         <input type="text" class="form-control" name="celularPaciente" id="celularPaciente" value="{{ isset($paciente->celularPaciente)?$paciente->celularPaciente:old('celularPaciente')}}">
      </div>
  </div>
   <br>
   <div class=" container form-group">
      <input type="submit"  class="btn btn-success col-3" value="{{ $modo }} paciente">
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

