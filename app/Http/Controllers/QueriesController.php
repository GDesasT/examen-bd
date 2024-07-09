<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\department;
use App\Models\employee;

class QueriesController extends Controller
{
    public function index(){

        //listar todas las columnas de la tabla empleados
        $query1 = employee::all();

        //Lista el nombre y los apellidos de todos los empleados
        $query2 = employee::select('first_name','last_name1','last_name2')->get();

        // Lista el identificador de los departamentos de los empleados que aparecen en la tabla empleado
        $query3 = employee::pluck('department_id');

        //Lista el identificador de los departamentos de los empleados que aparecen en la tabla empleado, eliminando los identificadores que aparecen repetidos
        $query4 = employee::select('department_id')->distinct()->pluck('department_id');

        //Lista el nombre y apellidos de los empleados en una única columna
        $query5 = employee::selectRaw("CONCAT_WS(' ', first_name, last_name1, last_name2) as full_name")->get();

        return view('index', compact('query1', 'query2', 'query3', 'query4', 'query5'));
    }
}
