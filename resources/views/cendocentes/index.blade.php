<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

@if(Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
    {{Session::get('Mensaje')}}
    </div>
@endif

</br>   
<a href="{{url('/create')}}" class="btn btn-primary">Agregar CenDocente</a>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th> id </th>
            <th>denominacion </th>
            <th> cif </th>
            <th>dir_postal</th>
            <th> cp</th>
            <th> director_nom </th>
            <th> director_apellido1 </th>
            <th> director_apellido2 </th>
            <th> documento </th> 
            <th> titularidad </th>
        </tr>
    </thead>
    <tbody>
    
    @foreach ($cendocente as $cendocent)
        <tr>
            <td>{{$loop -> iteration}}</td>
           
            <td> {{$cendocent->denominacion}}</td>
            <td> {{$cendocent->cif}}</td>
            <td> {{$cendocent->dir_postal}}</td>
            <td> {{$cendocent->cp}}</td>
            <td> {{$cendocent->director_nom}}</td>
            <td> {{$cendocent->director_apellido1}}</td>
            <td> {{$cendocent->director_apellido2}}</td>
            <td> {{$cendocent->documento}}</td>
            <td> {{$cendocent->titularidad}}</td>
            <td>

            <a class="btn btn-warning" href="{{url('/' .$cendocente->id .'/edit')}}"> Editar </a> 
            </br> </br>
            <form method="post" action="{{url('/' .$cendocente->id)}}">
            {{csrf_field()}}    
            {{method_field('DELETE')}}
            <button type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro de borrar?')">Borrar</button> 
            </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>