<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\department;
use App\Models\employee;


class QueriesController extends Controller
{
    public function index()
    {
        //listar todas las columnas de la tabla empleados
        $query1 = employee::all();

        //Lista el name y los apellidos de todos los empleados
        $query2 = employee::select('first_name', 'last_name1', 'last_name2')->get();

        // Lista el identificador de los departamentos de los empleados que aparecen en la tabla empleado
        $query3 = employee::pluck('department_id');

        //Lista el identificador de los departamentos de los empleados que aparecen en la tabla empleado, eliminando los identificadores que aparecen repetidos
        $query4 = employee::select('department_id')->distinct()->pluck('department_id');

        //Lista el name y apellidos de los empleados en una única columna
        $query5 = employee::selectRaw("CONCAT_WS(' ', first_name, last_name1, last_name2) as full_name")->get();

        //Lista el identificador de los empleados junto al nif, pero el nif deberá aparecer en dos columnas, una mostrará únicamente los dígitos del nif y la otra la letra
        $query6 = employee::selectRaw("id, CONCAT(SUBSTRING(nif, 1, LENGTH(nif) - 1), '') as nif_digitos, SUBSTRING(nif, -1) as nif_letra")->get();

        //Lista el name de cada departamento y el valor del presupuesto actual del que dispone
        $query7 = department::selectRaw('name, (budget - expense) as presupuesto_actual')->orderBy('name', 'asc')->get();

        //Lista el name de todos los departamentos ordenados de forma desscendente
        $query8 = department::orderBy('name', 'desc')->pluck('name');

        //Lista los apellidos y el name de todos los empleados, ordenados de forma alfabética tendiendo en cuenta en primer lugar sus apellidos y luego su name.
        $query9 = Employee::selectRaw("CONCAT_WS(' ', last_name1, COALESCE(last_name2, ''), first_name) as full_name")->orderBy('full_name', 'asc')->distinct()->pluck('full_name');

        //Devuelve una lista con el name y el presupuesto, de los 3 departamentos que tienen mayor presupuesto
        $query10 = department::selectRaw('name, (budget - expense) as presupuesto_actual')->orderBy('presupuesto_actual', 'desc')->take(3)->get();

        // Lista con el name y el presupuesto, de los 3 departamentos que tienen menor presupuesto
        $query11 = department::select('name', 'budget')
            ->orderBy('budget', 'asc')
            ->limit(3)
            ->get();

        // Lista con el name y el gasto, de los 2 departamentos que tienen mayor gasto
        $query12 = department::select('name', 'expense')
            ->orderBy('expense', 'desc')
            ->limit(2)
            ->get();

        // Lista con el name y el gasto, de los 2 departamentos que tienen menor gasto
        $query13 = department::select('name', 'expense')
            ->orderBy('expense', 'asc')
            ->limit(2)
            ->get();

            //   Devuelve un listado con el identificador, el nombre del departamento y el valor del presupuesto actual de aquellos departamentos que tienen empleados
        $query14 = department::has('employees')->selectRaw('id, name, (budget - expense) as presupuesto_actual')->get();

   
        // Nombre del departamento donde trabaja el empleado que tiene el NIF 38382980M
        $query15 = employee::where('nif', '38382980M')
            ->firstOrFail()
            ->department
            ->name;


        // Nombre del departamento donde trabaja el empleado Pepe Ruiz Santana
        $query16 = employee::where('first_name', 'Pepe')
            ->where('last_name1', 'Ruiz')
            ->where('last_name2', 'Santana')
            ->firstOrFail();

    //  un listado con los datos de los empleados que trabajan en el departamento de I+D, ordenados alfabéticamente
        $query17 = employee::whereHas('department', function($query) {$query->where('name', 'I+D');})->orderBy('first_name')->get();
    
        // Listado con los datos de los empleados que trabajan en el departamento de Sistemas, Contabilidad o I+D. Ordena el resultado alfabéticamente
        $query18 = employee::whereHas('department', function ($query) {
            $query->whereIn('name', ['Sistemas', 'Contabilidad', 'I+D']);
        })
            ->orderBy('first_name', 'asc')
            ->get();

        // Lista con el nombre de los empleados que tienen los departamentos que no tienen un presupuesto entre 100000 y 200000 euros
        $query19 = employee::whereHas('department', function ($query) {
            $query
            ->whereNotBetween('budget', [100000, 200000]);})
            ->get(['first_name', 'last_name1', 'last_name2']);



        // Listado con todos los empleados junto con los datos de los departamentos donde trabajan, incluyendo los empleados que no tienen ningún departamento asociado
        $query20 = employee::with('department')
        ->select('first_name', 'last_name1', 'nif', 'department_id')
        ->get();
    

        return view('index', compact('query1', 'query2', 'query3', 'query4', 'query5', 'query6', 'query7', 'query8',  'query9', 'query10', 'query11', 'query12', 'query13','query14','query15','query16','query17','query18','query19','query20'));
    }
};
