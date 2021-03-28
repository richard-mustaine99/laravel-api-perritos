{{ $Modo == 'crear' ? 'Agregar perrito' : 'Modificar perrito' }}
<br>
<label for="Nombre">{{'Nombre'}}</label>
<input type="text" name="Nombre" id="Nombre" value="{{isset($perrito->Nombre) ? $perrito->Nombre : '' }}">
<br>

<label for="Color">{{'Color'}}</label>
<input type="text" name="Color" id="Color" value="{{isset($perrito->Color) ? $perrito->Color : '' }}">
<br>

<label for="Raza">{{'Raza'}}</label>
<input type="text" name="Raza" id="Raza" value="{{isset($perrito->Raza) ? $perrito->Raza : '' }}">
<br>

<label for="Foto">{{'Foto'}}</label>
@if(isset($perrito->Foto))
<br>
<img src="{{ asset('storage'). '/'. $perrito->Foto}}" alt="" width="100">
<br>
@endif
<input type="file" name="Foto" id="Foto" value="">
<br>

<input type="submit" value="{{ $Modo == 'crear' ? 'Agregar Perrito' : 'Modificar Perrito' }}">

<a href="{{ url('perritos') }}">Atrás</a>