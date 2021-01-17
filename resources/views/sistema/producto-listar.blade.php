@extends('sistema.plantilla')
@section('titulo', $titulo)

@section('scripts')
    <link href="{{ asset('/css/datatables.min.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/datatables.min.js') }}"></script>
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/home">Inicio</a></li>
    <li class="breadcrumb-item active">Productos</a></li>
</ol>
<ul class="nav nav-pills">
    <li class="nav-item"><a title="Nuevo" href="/admin/producto/nuevo" class="fa fa-plus-circle nav-link" aria-hidden="true"><span>Nuevo</span></a></li>
    <li class="nav-item"><a title="Recargar" href="#" class="fas fa-sync-alt nav-link" aria-hidden="true" onclick='window.location.replace("/admin/productos");'><span>Recargar</span></a></li>
</ul>
@endsection

@section('contenido')
<table id="grilla" class="display">
    <thead>
        <tr>
            <th>Imagen</th>
            <th>Descripción</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Accion</th>
        </tr>
    </thead>
</table> 
<script>
	var dataTable = $('#grilla').DataTable({
	    "processing": true,
        "serverSide": true,
	    "bFilter": true,
	    "bInfo": true,
	    "bSearchable": true,
        "pageLength": 25,
        "order": [[ 2, "asc" ]],
	    "ajax": "{{ route('productos.cargarGrilla') }}"
    });
</script>
@endsection