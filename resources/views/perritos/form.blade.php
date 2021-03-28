{{ $Modo == 'crear' ? 'Agregar perrito' : 'Modificar perrito' }}

<!-- Nombre -->
<div class="form-group">
    <label for="Nombre" class="control-label">{{'Nombre'}}</label>
    <input type="text" class="form-control {{$errors->has('Nombre') ? 'is-invalid' : ''}} " name="Nombre" id="Nombre" value="{{isset($perrito->Nombre) ? $perrito->Nombre : old('Nombre') }}">
    
    {!! $errors->first('Nombre', '<div class="invalid-feedback">:message</div>') !!}

</div>

<!-- Color -->
<div class="form-group">
    <label for="Color" class="control-label">{{'Color'}}</label>
    <input type="text" class="form-control {{$errors->has('Color') ? 'is-invalid' : ''}}" name="Color" id="Color" value="{{isset($perrito->Color) ? $perrito->Color : old('Color') }}">
    
    {!! $errors->first('Color', '<div class="invalid-feedback">:message</div>') !!}
    
</div>

<!-- Raza -->
<div class="form-group">
    <label for="Raza" class="control-label">{{'Raza'}}</label>
    <input type="text" class="form-control {{$errors->has('Raza') ? 'is-invalid' : ''}}" name="Raza" id="Raza" value="{{isset($perrito->Raza) ? $perrito->Raza : old('Raza') }}">
    
    {!! $errors->first('Raza', '<div class="invalid-feedback">:message</div>') !!}

</div>

<!-- Foto -->
<div class="form-group">
    <label for="Foto" class="control-label">{{'Foto'}}</label>
    @if(isset($perrito->Foto))
    <br>
    <img src="{{ asset('storage'). '/'. $perrito->Foto}}" class="img-thumbnail img-fluid" alt="" width="100">
    <br>
    @endif
    <input type="file" class="form-control {{$errors->has('Foto') ? 'is-invalid' : ''}}" name="Foto" id="Foto" value="">
    
    {!! $errors->first('Foto', '<div class="invalid-feedback">:message</div>') !!}

    <br>
</div>

<input type="submit" class="btn btn-success" value="{{ $Modo == 'crear' ? 'Agregar Perrito' : 'Modificar Perrito' }}">

<a href="{{ url('perritos') }}" class="btn btn-secondary">Atrás</a>

