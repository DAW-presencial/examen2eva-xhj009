<form method="post" action="{{url('/'.$cendocente->id)}}" >
    {{csrf_field()}}
    {{method_field('PATCH')}}

  @include('cendocentes.formulario', ['modo'=>'editar'])
</form>