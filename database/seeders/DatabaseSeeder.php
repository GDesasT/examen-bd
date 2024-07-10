<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Employee;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Department::create(['name' => 'Desarrollo', 'budget' => 120000, 'expense' => 6000]);
        Department::create(['name' => 'Sistemas', 'budget' => 150000, 'expense' => 21000]);
        Department::create(['name' => 'Recursos Humanos', 'budget' => 280000, 'expense' => 25000]);
        Department::create(['name' => 'Contabilidad', 'budget' => 110000, 'expense' => 3000]);
        Department::create(['name' => 'I+D', 'budget' => 375000, 'expense' => 380000]);
        Department::create(['name' => 'Proyectos', 'budget' => 0, 'expense' => 0]);
        Department::create(['name' => 'Publicidad', 'budget' => 0, 'expense' => 1000]);

        //comentario solo para que se actualice el seeder
        Employee::create(['nif' => '32481596F', 'first_name' => 'Aarón', 'last_name1' => 'Rivero', 'last_name2' => 'Gómez', 'department_id' => 1]);
        Employee::create(['nif' => 'Y5575632D', 'first_name' => 'Adela', 'last_name1' => 'Salas', 'last_name2' => 'Díaz', 'department_id' => 2]);
        Employee::create(['nif' => 'R6970642B', 'first_name' => 'Adolfo', 'last_name1' => 'Rubio', 'last_name2' => 'Flores', 'department_id' => 3]);
        Employee::create(['nif' => '77705545E', 'first_name' => 'Adrián', 'last_name1' => 'Suárez', 'last_name2' => null, 'department_id' => 4]);
        Employee::create(['nif' => '17087203C', 'first_name' => 'Marcos', 'last_name1' => 'Loyola', 'last_name2' => 'Méndez', 'department_id' => 5]);
        Employee::create(['nif' => '38382980M', 'first_name' => 'María', 'last_name1' => 'Santana', 'last_name2' => 'Moreno', 'department_id' => 1]);
        Employee::create(['nif' => '80576669X', 'first_name' => 'Pilar', 'last_name1' => 'Ruiz', 'last_name2' => null, 'department_id' => 2]);
        Employee::create(['nif' => '71651431Z', 'first_name' => 'Pepe', 'last_name1' => 'Ruiz', 'last_name2' => 'Santana', 'department_id' => 3]);
        Employee::create(['nif' => '56399183D', 'first_name' => 'Juan', 'last_name1' => 'Gómez', 'last_name2' => 'López', 'department_id' => 2]);
        Employee::create(['nif' => '46384486H', 'first_name' => 'Diego', 'last_name1' => 'Flores', 'last_name2' => 'Salas', 'department_id' => 5]);
        Employee::create(['nif' => '67389283A', 'first_name' => 'Marta', 'last_name1' => 'Herrera', 'last_name2' => 'Gil', 'department_id' => 1]);
        Employee::create(['nif' => '41234836R', 'first_name' => 'Irene', 'last_name1' => 'Salas', 'last_name2' => 'Flores', 'department_id' => null]);
        Employee::create(['nif' => '82635162B', 'first_name' => 'Juan Antonio', 'last_name1' => 'Sáez', 'last_name2' => 'Guerrero', 'department_id' => null]);

    }
}
