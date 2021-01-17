<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class Producto extends Model {
    protected $table = 'producto';
    public $timestamps = false;

    protected $fillable = [
        'idproducto',
        'imagen',
        'ofertado',
        'descripcion',
        'precio',
        'precioAnterior',
        'porcentajeDescuento',
        'stock',
        'fkcategoria',
        'fksubCategoria',
        'fkcliente',
        'fkunidadVenta',
    ];

    protected $hidden = [];

    public function obtenerFiltrado() {
        $request = $_REQUEST;
        $columns = array(
            0 => 'P.imagen',
            1 => 'P.descripcion',
            2 => 'C.tipo',
            3 => 'P.precio',
            4 => 'P.stock'
        );
        $sql = "SELECT
                    P.idproducto,
                    P.imagen,
                    P.descripcion,
                    P.precio,
                    P.fkcategoria,
                    C.tipo,
                    P.stock
                FROM producto P
                INNER JOIN categoria C ON C.idcategoria = P.fkcategoria";

        if (!empty($request['search']['value'])) {
            $sql .= " WHERE (P.descripcion LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR C.tipo LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR P.precio LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR P.stock LIKE '%" . $request['search']['value'] . "%' )";
        }
        $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }
}

?>