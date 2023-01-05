@extends('layouts.app')

@section('content')
<div class="tabs max-w-6xl mx-auto sm:px-6 lg:px-8">
  <div class="tab-container">
  
    <div id="tab2" class="tab">
      <a href="#tab2">Actualizar Problemas</a>
      <div class="tab-content">
        <table>
            <thead>
                <tr>
                    <!-- Agrega aquí las columnas de la tabla -->
                    <th>Columna 1</th>
                    <th>Columna 2</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $fila)
                    <tr>
                        @foreach ($fila as $celda)
                            <td>{{ $celda }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('actualizar') }}" method="post">
              @csrf
              <!-- Campos del formulario para ingresar los datos a editar -->
              <input type="text" name="fila" value="{{ $fila }}">
              <input type="text" name="columna" value="{{ $columna }}">
              <input type="text" name="valor" value="{{ $datos[$fila][$columna] }}">
              <button type="submit">Guardar cambios</button>
        </form>
      </div>
    </div> 
    <div id="tab1" class="tab">
      <a href="#tab1">Creación problema en cliente</a>
      <div class="tab-content">
        <h2></h2>
        <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSfD3xjUULoWqFTpS1lF7u676W6Bybyuiad4a7YP4IlFOy1RKA/viewform?embedded=true" width="100%" height="704" frameborder="0" marginheight="0" marginwidth="0">Cargando…</iframe>
      </div> 
    </div>
  </div>
</div>
@endsection
