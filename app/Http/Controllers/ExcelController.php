<?php

namespace App\Http\Controllers;

use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Http\Controllers\Controller;

class ExcelController extends Controller
{
    // Método que muestra los datos del archivo de Excel en una vista
    public function mostrarDatos()
    {
        // Carga el archivo de Excel
        $reader = IOFactory::createReader('Xlsx');
        $excel = $reader->load(resource_path('archivo.xlsx'));
    
        // Obtiene la hoja de cálculo activa (la primera)
        $hoja = $excel->getActiveSheet();
    
        // Arreglo donde se almacenarán los datos del archivo
        $datos = [];
    
        // Recorre las filas de la hoja de cálculo
        foreach ($hoja->getRowIterator() as $fila) {
            // Obtiene las celdas de la fila
            $celdas = $fila->getCellIterator();
    
            // Arreglo para almacenar los datos de la fila
            $fila_datos = [];
    
            // Recorre las celdas de la fila
            foreach ($celdas as $celda) {
                // Obtiene el valor de la celda
                $valor = $celda->getValue();
    
                // Almacena el valor en el arreglo de la fila
                $fila_datos[] = $valor;
            }
    
            // Almacena la fila en el arreglo principal
            $datos[] = $fila_datos;
        }
    
        // Retorna los datos del archivo
        return $datos;
    }
    
    public function actualizarDatos(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'fila' => 'required|numeric',
            'columna' => 'required|alpha_num',
            'valor' => 'required'
        ]);

        // Carga el archivo de Excel
        $excel = PHPExcel_IOFactory::load(resource_path('archivo.xlsx'));

        // Obtiene la hoja de cálculo activa (la primera)
        $hoja = $excel->getActiveSheet();

        // Obtiene la fila y la columna del formulario
        $fila = $request->input('fila');
        $columna = $request->input('columna');

        // Obtiene la celda a partir de la fila y la columna
        $celda = $hoja->getCell($columna . $fila);

        // Establece el valor de la celda
        $celda->setValue($request->input('valor'));

        // Guarda los cambios en el archivo
        $excel->save(resource_path('archivo.xlsx'));

        // Muestra un mensaje de éxito
        return back()->with('success', 'Los datos han sido actualizados');
    }

    
}
