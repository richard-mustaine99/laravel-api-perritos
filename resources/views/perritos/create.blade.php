@extends('layouts.app')

@section('content')

<div class="container">

    <!-- Mensaje de validación -->
    @if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach
        </ul>
    </div>
    @endif

    Sección para crear perritos

    <form action="{{ url('/perritos')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        @include('perritos.form', ['Modo' => 'crear'])
        
    </form>

</div>
@endsection