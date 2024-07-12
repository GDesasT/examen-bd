<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\department;
use Illuminate\Support\Facades\DB;
use App\Models\employee;

class QueriesController extends Controller
{
    public function showCreateForm()
{
    $departments = department::all();
    return view('create', compact('departments'));
}

    public function createUser(Request $request)
    {
        try {
            DB::beginTransaction();
    
            $validatedData = $request->validate([
                'nif' => 'required|string|max:9',
                'first_name' => 'required|string|max:255',
                'last_name1' => 'required|string|max:255',
                'last_name2' => 'required|string|max:255',
                'department_id' => 'required|int|max:1',
            ]);
            
            $user = new Employee($validatedData);
            $user->save();
            
            DB::commit();
    
            return redirect()->back()->with('success', 'Usuario creado exitosamente');
        } catch (\Exception $e) {
            DB::rollback();
    
            return redirect()->back()->with('error', 'Hubo un error al crear el usuario: ' . $e->getMessage());
        }
}

    public function index() {
        // Query 1: Listar todas las columnas de la tabla empleados
        $query1 = employee::all();
    
        // Query 2: Lista el nombre y los apellidos de todos los empleados
        $query2 = employee::select('first_name', 'last_name1', 'last_name2')->get();
    
        // Query 3: Lista el identificador de los departamentos de los empleados que aparecen en la tabla empleado
        $query3 = employee::pluck('department_id');
    
        // Query 4: Lista el identificador de los departamentos de los empleados que aparecen en la tabla empleado, eliminando los identificadores que aparecen repetidos
        $query4 = employee::select('department_id')->distinct()->pluck('department_id');
    
        // Query 5: Lista el nombre y apellidos de los empleados en una única columna
        $query5 = employee::selectRaw("CONCAT_WS(' ', first_name, last_name1, last_name2) as full_name")->get();
    
        // Query 6: Lista el identificador de los empleados junto al nif, pero el nif deberá aparecer en dos columnas, una mostrará únicamente los dígitos del nif y la otra la letra
        $query6 = employee::selectRaw("id, CONCAT(SUBSTRING(nif, 1, LENGTH(nif) - 1), '') as nif_digitos, SUBSTRING(nif, -1) as nif_letra")->get();
    
        // Query 7: Lista el nombre de cada departamento y el valor del presupuesto actual del que dispone
        $query7 = department::selectRaw('name, (budget - expense) as presupuesto_actual')->orderBy('name', 'asc')->get();
    
        // Query 8: Lista los nombres de todos los departamentos ordenados de forma descendente
        $query8 = department::orderBy('name', 'desc')->pluck('name');
    
        // Query 9: Lista los apellidos y el nombre de todos los empleados, ordenados de forma alfabética
        $query9 = employee::selectRaw("CONCAT_WS(' ', last_name1, COALESCE(last_name2, ''), first_name) as full_name")->orderBy('full_name', 'asc')->distinct()->pluck('full_name');
    
        // Query 10: Devuelve una lista con el nombre y el presupuesto de los 3 departamentos que tienen mayor presupuesto
        $query10 = department::selectRaw('name, (budget - expense) as presupuesto_actual')->orderBy('presupuesto_actual', 'desc')->take(3)->get();
    
        // Query 11: Devuelve una lista con el nombre y el presupuesto de los 3 departamentos que tienen menor presupuesto
        $query11 = department::selectRaw('name, (budget - expense) as presupuesto_actual')
->orderBy('presupuesto_actual', 'asc')->take(3)->get();
    
        // Query 12: Devuelve una lista con el nombre y el gasto de los 2 departamentos que tienen mayor gasto
        $query12 = department::selectRaw('name, expense')->orderBy('expense', 'desc')->take(2)->get();
    
        // Query 13: Devuelve una lista con el nombre y el gasto de los 2 departamentos que tienen menor gasto
        $query13 = department::selectRaw('name, expense')->orderBy('expense', 'asc')->take(2)->get();
    
        // Query 14: Devuelve un listado con el identificador, el nombre del departamento y el valor del presupuesto actual de aquellos departamentos que tienen empleados
        $query14 = department::has('employees')->selectRaw('id, name, (budget - expense) as presupuesto_actual')->get();
    
        // Query 15: Devuelve el nombre del departamento donde trabaja el empleado que tiene el NIF 38382980M
        $query15 = employee::where('nif', '38382980M')->with('department')->first()->department->name ?? null;
    
        // Query 16: Devuelve el nombre del departamento donde trabaja el empleado Pepe Ruiz Santana
        $query16 = employee::where('first_name', 'Pepe')->where('last_name1', 'Ruiz')->where('last_name2', 'Santana')->with('department')->first()->department->name ?? null;
    
        // Query 17: Devuelve un listado con los datos de los empleados que trabajan en el departamento de I+D, ordenados alfabéticamente
        $query17 = employee::whereHas('department', function($query) {$query->where('name', 'I+D');})->orderBy('first_name')->get();
    
        // Query 18: Devuelve un listado con los datos de los empleados que trabajan en los departamentos de Sistemas, Contabilidad o I+D, ordenados alfabéticamente
        $query18 = employee::whereHas('department', function($query) {$query->whereIn('name', ['Sistemas', 'Contabilidad', 'I+D']);})->orderBy('first_name')->get();
    
        // Query 19: Devuelve una lista con el nombre de los empleados que tienen departamentos que no tienen un presupuesto entre 100,000 y 200,000 euros
        $query19 = employee::whereHas('department', function($query) {$query->whereNotBetween('budget', [100000, 200000]);})->get(['first_name', 'last_name1', 'last_name2']);
    
        // Query 20: Devuelve un listado con todos los empleados junto con los datos de los departamentos donde trabajan, incluyendo empleados sin departamento asociado
        $query20 = employee::with('department')->get();
    
        return view('index', compact('query1', 'query2', 'query3', 'query4', 'query5', 'query6', 'query7', 'query8', 'query9', 'query10', 'query11', 'query12', 'query13', 'query14', 'query15', 'query16', 'query17', 'query18', 'query19', 'query20'));
    }
}
