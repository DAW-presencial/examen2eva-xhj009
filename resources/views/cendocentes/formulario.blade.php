<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('cendocente.store')}}" method='post'  class="col-md-12 p-3 ">
<h1 class="text-center mb-2"> {{$modo=='crear' ? 'Agregar cendocente' : 'Modificar cendocente'}} </h1> 
 @csrf
  <!-- cendocente -->
   <fieldset class="border p-2">
        <legend></legend>

        <!-- denominacion -->
        <div class="row align-items-start">
            <div class="mb-3 col-6">
                <label for="denominacion" class="form-label">{{__('denominacion')}}</label>
                <input class="form-control {{$errors->has('denominacion')?'is-invalid':''}}  " name="denominacion" value="{{isset($cendocente->denominacion)? $cendocente->denominacion:old('denominacion')}}" id="denominacion">
                <div class="invalid-feedback">{!! $errors->first('denominacion','<small>:message</small>') !!}</div>  
            </div>

              <!-- cif -->
            <div class="row align-items-start">
            <div class="mb-3 col-6">
                <label for="cif" class="form-label">{{__('cif')}}</label>
                <input class="form-control {{$errors->has('cif')?'is-invalid':''}}  " name="cif" value="{{isset($cendocente->cif)? $cendocente->cif:old('cif')}}" id="cif">
                <div class="invalid-feedback">{!! $errors->first('cif','<small>:message</small>') !!}</div>  
            </div>

             <!-- cp -->
            <div class="row align-items-start">
            <div class="mb-3 col-6">
                <label for="cp" class="form-label">{{__('cp')}}</label>
                <input class="form-control {{$errors->has('cp')?'is-invalid':''}}  " name="cp" value="{{isset($cendocente->cp)? $cendocente->cp:old('cp')}}" id="cp">
                <div class="invalid-feedback">{!! $errors->first('cp','<small>:message</small>') !!}</div>  
            </div>

            
             <!-- director_nom -->
            <div class="row align-items-start">
            <div class="mb-3 col-6">
                <label for="director_nom" class="form-label">{{__('director_nom')}}</label>
                <input class="form-control {{$errors->has('director_nom')?'is-invalid':''}}  " name="director_nom" value="{{isset($cendocente->director_nom)? $cendocente->director_nom:old('director_nom')}}" id="director_nom">
                <div class="invalid-feedback">{!! $errors->first('director_nom','<small>:message</small>') !!}</div>  
            </div>

                        
             <!-- director_apellido1 -->
            <div class="row align-items-start">
            <div class="mb-3 col-6">
                <label for="director_apellido1" class="form-label">{{__('director_apellido1')}}</label>
                <input class="form-control {{$errors->has('director_apellido1')?'is-invalid':''}}  " name="director_apellido1" value="{{isset($cendocente->director_apellido1)? $cendocente->director_apellido1:old('director_apellido1')}}" id="director_apellido1">
                <div class="invalid-feedback">{!! $errors->first('director_apellido1','<small>:message</small>') !!}</div>  
            </div>

             <!-- director_apellido2 -->
            <div class="row align-items-start">
            <div class="mb-3 col-6">
                <label for="director_apellido2" class="form-label">{{__('director_apellido2')}}</label>
                <input class="form-control {{$errors->has('director_apellido2')?'is-invalid':''}}  " name="director_apellido2" value="{{isset($cendocente->director_apellido2)? $cendocente->director_apellido2:old('director_apellido2')}}" id="director_apellido2">
                <div class="invalid-feedback">{!! $errors->first('director_apellido2','<small>:message</small>') !!}</div>  
            </div>

                <!-- documento-->
            <div class="mb-3 col-2">
                <label for="documento" class="form-label">@lang('tipo_doc')</label>
                <select class="form-select" name='documento' required id="documento">
                    <option value="dni" @if (old('documento') === 'dni') selected @endif>DNI</option>
                    <option value="nie" @if (old('documento') === 'nie') selected @endif>NIE</option>
                    <option value="pasaporte" @if (old('documento') === 'pasaporte') selected @endif>Pasaporte</option>
                </select>
            </div>

            <!-- titularidad-->
            <div class="mb-3 col-2">
                <label for="titularidad" class="form-label">@lang('titularidad')</label>
                <select class="form-select" name='titularidad' required id="documento">
                    <option value="publica" @if (old('titularidad') === 'publica') selected @endif>publica</option>
                    <option value="concertado" @if (old('titularidad') === 'concertado') selected @endif>concertado</option>
                    <option value="privado" @if (old('titularidad') === 'privado') selected @endif>privado</option>
                </select>
            </div>

        </fieldset>

         </br>
    <input class="btn btn-success" type="submit"  value="{{$modo == 'crear' ? 'agregar':'Modificar'}}" >
    <a class="btn btn-dark" href="{{url('/')}}">Volver</a>
</form>