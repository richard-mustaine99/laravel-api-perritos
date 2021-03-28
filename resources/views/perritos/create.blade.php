@extends('layouts.app')

@section('content')

<div class="container">

    Sección para crear perritos

    <form action="{{ url('/perritos')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        @include('perritos.form', ['Modo' => 'crear'])
        
    </form>

</div>
@endsection