<html>

<body bgcolor="EE99AEE">
    <h1>Empresa</h1>
    <br>
    <form action="{{route('guardarempr')}}" method='POST' enctype='multipart/form-data'>
        {{csrf_field()}}



        ID EMPRESA <input type='text' name='Id_empresa' value="{{$Id_empresa}}" readonly='readonly'>
        <br>
        
<br>
        NOMBRE DE LA EMPRESA<input type='text' name='Nomb_emp' value="{{old('Nomb_emp')}}">
        <br>
        
        @if($errors->first('Nomb_emp'))
        <i> {{ $errors->first('Nomb_emp') }} </i>
        @endif <br>

        Ubicación<input type='text' name='Ubicacion' value="{{old('Ubicacion')}}">
        <br>
        
        @if($errors->first('Ubicacion'))
        <i> {{ $errors->first('Ubicacion') }} </i>
        @endif <br>

        Codigo Postal<input type='text' name='CP' value="{{old('CP')}}">
        <br>
        
        @if($errors->first('CP'))
        <i> {{ $errors->first('CP') }} </i>
        @endif <br>
        
        Telefono<input type='text' name='Telefono' value="{{old('Telefono')}}">
        <br>
        
        @if($errors->first('Telefono'))
        <i> {{ $errors->first('Telefono') }} </i>
        @endif <br>
  

        
        
        <input type='submit' value='Guardar'>
        <br>
    </form>
</body>

</html>
