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
        $query4 = employee::select('department_id')->pluck('department_id');

        //Lista el nombre y apellidos de los empleados en una única columna
        $query5 = employee::selectRaw("CONCAT_WS(' ', first_name, last_name1, last_name2) as full_name")->get();

        //Lista el identificador de los empleados junto al nif, pero el nif deberá aparecer en dos columnas, una mostrará únicamente los dígitos del nif y la otra la letra
        $query6 = employee::selectRaw("id, CONCAT(SUBSTRING(nif, 1, LENGTH(nif) - 1), '') as nif_digitos, SUBSTRING(nif, -1) as nif_letra")->get();

        //Lista el nombre de cada departamento y el valor del presupuesto actual del que dispone
        $query7 = department::selectRaw('name, (budget - expense) as presupuesto_actual')->orderBy('name', 'asc')->get();

        //Lista el nombre de todos los departamentos ordenados de forma desscendente
        $query8 = department::orderBy('name', 'desc')->pluck('name');

        //Lista los apellidos y el nombre de todos los empleados, ordenados de forma alfabética tendiendo en cuenta en primer lugar sus apellidos y luego su nombre.
        $query9 = Employee::selectRaw("CONCAT_WS(' ', last_name1, COALESCE(last_name2, ''), first_name) as full_name")->orderBy('full_name', 'asc')->distinct()->pluck('full_name');

        //Devuelve una lista con el nombre y el presupuesto, de los 3 departamentos que tienen mayor presupuesto
        $query10 = department::selectRaw('name, (budget - expense) as presupuesto_actual')->orderBy('presupuesto_actual', 'desc')->take(3)->get();

        return view('index', compact('query1', 'query2', 'query3', 'query4', 'query5', 'query6', 'query7', 'query8',  'query9', 'query10'));
    }
}
