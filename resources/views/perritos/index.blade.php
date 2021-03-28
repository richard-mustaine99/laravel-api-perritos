@extends('layouts.app')

@section('content')

<div class="container">

    @if(Session::has('Mensaje'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('Mensaje') }}
    </div>
    @endif

    <a href="{{ url('perritos/create') }}" class="btn btn-success">Agregar perrito</a>
    <br><br>
    
    <table class="table table-light table-hover">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Color</th>
                <th>Raza</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($perritos as $perrito)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    <img src="{{ asset('storage'). '/'. $perrito->Foto}}" class="img-thumbnail img-fluid" alt="" width="100">
                </td>
                <td>{{$perrito->Nombre}}</td>
                <td>{{$perrito->Color}}</td>
                <td>{{$perrito->Raza}}</td>
                <td>
                    
                <a href="{{ url('/perritos/'.$perrito->id.'/edit')}}" class="btn btn-primary">
                    Editar
                </a>

                <form method="post" action="{{ url('/perritos/'.$perrito->id) }}" style="display:inline;">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Desea borrar el registro?')">Eliminar</button>
                </form>
                
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $perritos->links() }}
    
</div>
@endsection