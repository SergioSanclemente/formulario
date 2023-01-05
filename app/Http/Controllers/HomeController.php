<?php

namespace App\Http\Controllers;

use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Obtiene los datos del archivo de Excel
        $datos = app(ExcelController::class)->mostrarDatos();
    
        // Muestra la vista y pasa los datos a la vista
        return view('home', ['datos' => $datos]);
    }
    
}
