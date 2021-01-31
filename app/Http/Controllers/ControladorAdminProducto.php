<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Producto;

class ControladorAdminProducto extends Controller {

    public function index() {
        $titulo = "Listado de productos";
        $currentlyPage = "productos";
        return view('sistema.producto-listar', compact('titulo', 'currentlyPage'));
    }

    public function nuevo() {
        $titulo = "Registrar producto";
        $currentlyPage = "productos";
        return view('sistema.producto-nuevo', compact('titulo', 'currentlyPage'));
    }

    public function cargarGrilla(Request $request) {
        $request = $_REQUEST;

        $entidad = new Producto();
        $aProductos = $entidad->obtenerFiltrado();

        $data = array();

        $inicio = $request['start'];
        $registros_por_pagina = $request['length'];
        if (count($aProductos) > 0)
            $cont = 0;
        for ($i = $inicio; $i < count($aProductos) && $cont < $registros_por_pagina; $i++) {
            $row = array();
            $row[] = "<img src='/img/photos/productos/".$aProductos[$i]->imagen."'>";
            $row[] = $aProductos[$i]->descripcion;
            $row[] = $aProductos[$i]->tipo;
            $row[] = number_format($aProductos[$i]->precio, "2", ",", ".");
            $row[] = $aProductos[$i]->stock;
            $row[] = "<select class='form-control' name='lstAcciones' onclick='setAccionProducto();'>
                        <option value='' selected disabled>Seleccionar</option>
                        <option value='eliminarProducto(".$aProductos[$i]->idproducto.")'>Eliminar producto</option>
                        <option value='modificarProducto(".$aProductos[$i]->idproducto.")'>Modificar</option>
                    </select>";
            $cont++;
            $data[] = $row;
        }

        $json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => count($aProductos), //cantidad total de registros sin paginar
            "recordsFiltered" => count($aProductos), //cantidad total de registros en la paginacion
            "data" => $data
        );
        return json_encode($json_data);
    }

}

?>