<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Employee;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Insert departments
        Department::create(['name' => 'Development', 'budget' => 120000, 'expense' => 6000]);
        Department::create(['name' => 'Systems', 'budget' => 150000, 'expense' => 5000]);
        Department::create(['name' => 'Human Resources', 'budget' => 280000, 'expense' => 25000]);
        Department::create(['name' => 'Accounting', 'budget' => 300000, 'expense' => 10000]);
        Department::create(['name' => 'Projects', 'budget' => 375000, 'expense' => 380000]);
        Department::create(['name' => 'Advertising', 'budget' => 0, 'expense' => 0]);

        // Insert employees
        Employee::create(['nif' => '32481596J', 'first_name' => 'Aarón', 'last_name1' => 'Rivero', 'last_name2' => 'Gómez', 'department_id' => 1]);
        Employee::create(['nif' => 'YS575638Z', 'first_name' => 'Adela', 'last_name1' => 'Salas', 'last_name2' => 'Díaz', 'department_id' => 1]);
        Employee::create(['nif' => 'R9705618A', 'first_name' => 'Adrián', 'last_name1' => 'Delgado', 'last_name2' => 'Calvo', 'department_id' => 2]);
        Employee::create(['nif' => '11708236X', 'first_name' => 'Macías', 'last_name1' => 'Loyola', 'last_name2' => 'Méndez', 'department_id' => 4]);
        Employee::create(['nif' => '33882980M', 'first_name' => 'Sara', 'last_name1' => 'Piña', 'last_name2' => 'Hernández', 'department_id' => 3]);
        Employee::create(['nif' => '80756690X', 'first_name' => 'Pilar', 'last_name1' => 'Ruiz', 'last_name2' => null, 'department_id' => 2]);
        Employee::create(['nif' => '71614513Z', 'first_name' => 'Pepe', 'last_name1' => 'Ruiz', 'last_name2' => 'Santana', 'department_id' => 3]);
    }
}
