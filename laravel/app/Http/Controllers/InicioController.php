<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class InicioController extends Controller
{
    public function index() {
        return view('inicio', ["user" => "Aldo"]);
    }
}
?>