<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class ControladorAdminPerfil extends Controller {

    public function index() {
        $titulo = "Panel administrador";
        $currentlyPage = "perfil";
        return view('sistema.perfil', compact('titulo','currentlyPage'));
    }

    

}

?>