@extends('layouts.app')

@section('content')

<div class="container">

    @if(Session::has('Mensaje')){{
        Session::get('Mensaje')
    }}
    @endif

    <a href="{{ url('perritos/create') }}">Agregar perrito</a>
    <table class="table table-dark">
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
                    <img src="{{ asset('storage'). '/'. $perrito->Foto}}" alt="" width="100">
                </td>
                <td>{{$perrito->Nombre}}</td>
                <td>{{$perrito->Color}}</td>
                <td>{{$perrito->Raza}}</td>
                <td>
                    
                <a href="{{ url('/perritos/'.$perrito->id.'/edit')}}">
                    Editar
                </a>

                <form method="post" action="{{ url('/perritos/'.$perrito->id) }}">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <button type="submit" onclick="return confirm('Desea borrar el registro?')">Eliminar</button>
                </form>
                
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection