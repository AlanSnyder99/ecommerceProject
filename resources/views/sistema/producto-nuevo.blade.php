@extends('sistema.plantilla')

@section('titulo', $titulo)

@section('contenido')

<form method="POST" enctype="multipart/form-data">
    <div class="row mx-0">
        <div class="col-6">
            <label for="txtOfertado">Ofertado:</label>
            <select class="form-control" name="lstOfertado" id="lstOfertado">
                <option selected disabled value="">Seleccionar</option>
                <option value=1>Sí</option>
                <option value=0>No</option>
            </select>
        </div>
        <div class="col-6">
            <label for="txtPrecio">Precio:</label>
            <input class="form-control" type="text" min="0" id="txtPrecio" name="txtPrecio" placeholder="0,0">
        </div>
    </div>
</form>

@endsection