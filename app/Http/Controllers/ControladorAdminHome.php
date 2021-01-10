<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class ControladorAdminHome extends Controller {

    public function index() {
        $titulo = "Panel administrador";
        $currentlyPage = "home";
        return view('sistema.index', compact('titulo','currentlyPage'));
    }

    

}

?>