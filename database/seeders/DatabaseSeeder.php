<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Employee;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Department::create(['name' => 'Development', 'budget' => 120000, 'expense' => 6000]);
        Department::create(['name' => 'Systems', 'budget' => 150000, 'expense' => 5000]);
        Department::create(['name' => 'Human Resources', 'budget' => 280000, 'expense' => 25000]);
        Department::create(['name' => 'Accounting', 'budget' => 300000, 'expense' => 10000]);
        Department::create(['name' => 'Projects', 'budget' => 375000, 'expense' => 380000]);
        Department::create(['name' => 'Advertising', 'budget' => 0, 'expense' => 0]);

        Employee::create(['nif' => '32481596J', 'first_name' => 'Aarón', 'last_name1' => 'Rivero', 'last_name2' => 'Gómez', 'department_id' => 1]);
        Employee::create(['nif' => 'YS575638Z', 'first_name' => 'Adela', 'last_name1' => 'Salas', 'last_name2' => 'Díaz', 'department_id' => 1]);
        Employee::create(['nif' => 'R9705618A', 'first_name' => 'Adrián', 'last_name1' => 'Delgado', 'last_name2' => 'Calvo', 'department_id' => 2]);
        Employee::create(['nif' => '11708236X', 'first_name' => 'Macías', 'last_name1' => 'Loyola', 'last_name2' => 'Méndez', 'department_id' => 4]);
        Employee::create(['nif' => '33882980M', 'first_name' => 'Sara', 'last_name1' => 'Piña', 'last_name2' => 'Hernández', 'department_id' => 3]);
        Employee::create(['nif' => '80756690X', 'first_name' => 'Pilar', 'last_name1' => 'Ruiz', 'last_name2' => null, 'department_id' => 2]);
        Employee::create(['nif' => '71614513Z', 'first_name' => 'Pepe', 'last_name1' => 'Ruiz', 'last_name2' => 'Santana', 'department_id' => 3]);
        Employee::create(['nif' => '56399183D', 'first_name' => 'Juan', 'last_name1' => 'Gómez', 'last_name2' => 'López', 'department_id' => 2]);
        Employee::create(['nif' => '46384486H', 'first_name' => 'Diego', 'last_name1' => 'Flores', 'last_name2' => 'Salas', 'department_id' => 5]);
        Employee::create(['nif' => '6789283A', 'first_name' => 'Marta', 'last_name1' => 'Herrera', 'last_name2' => 'Gil', 'department_id' => null]);
        Employee::create(['nif' => '41284386R', 'first_name' => 'Irene', 'last_name1' => 'Salas', 'last_name2' => 'Flores', 'department_id' => null]);
        Employee::create(['nif' => '82365162B', 'first_name' => 'Juan Antonio', 'last_name1' => 'Sáez', 'last_name2' => 'Guerrero', 'department_id' => null]);
    }
}
