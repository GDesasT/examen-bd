<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Empleados</title>
    <style>

        body{
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;

            background-color: antiquewhite
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #cb9a9a;
        }
    </style>
</head>

<body>
    <h2>Listado de Empleados</h2>


    {{-- 1 --}}
    <h3>Query 1: Listar todas las columnas de la tabla employees</h3>
    <table>
        <thead>
            <tr>
                @foreach ($query1->first()->getAttributes() as $key => $value)
                    <th>{{ $key }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($query1 as $employee)
                <tr>
                    @foreach ($employee->getAttributes() as $attribute)
                        <td>{{ $attribute }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>


    {{-- 2 --}}
    <h3>Query 2: Listar el nombre y los apellidos de todos los empleados</h3>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($query2 as $employee)
                <tr>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name1 }}</td>
                    <td>{{ $employee->last_name2 }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


    {{-- 3 --}}
    <h3>Query 3: Listar el identificador de los departamentos de los empleados</h3>
    <ul>
        @foreach ($query3 as $departmentId)
            <li>{{ $departmentId }}</li>
        @endforeach
    </ul>


    {{-- 4 --}}
    <h3>Query 4: Listar el identificador de los departamentos de los empleados, eliminando los identificadores que
        aparecen repetidos</h3>
    <ul>
        @foreach ($query4 as $departmentId)
            <li>{{ $departmentId }}</li>
        @endforeach
    </ul>


    {{-- 5 --}}
    <h3>Query 5: Listar el nombre y apellidos de los empleados en una única columna</h3>
    <ul>
        @foreach ($query5 as $employee)
            <li>{{ $employee->full_name }}</li>
        @endforeach
    </ul>


    {{-- 6 --}}
    <h3>Query 6: Listar el identificador de los empleados junto al nif, pero el nif deberá aparecer en dos
        columnas, una mostrará únicamente los dígitos del nif y la otra la letra.
    </h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NIF Digitos</th>
                <th>NIF Letras</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($query6 as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->nif_digitos }}</td>
                    <td>{{ $employee->nif_letra }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- 7 --}}

    <h3>Query 7: Departamentos y Presupuesto Actual</h2>
        <table>
            <thead>
                <tr>
                    <th>Departamento</th>
                    <th>Presupuesto Actual</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($query7 as $departamento)
                    <tr>
                        <td>{{ $departamento->name }}</td>
                        <td>{{ number_format($departamento->presupuesto_actual, 2) }} €</td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        {{-- 8 --}}
        <h3>Query 8: Listar nombre de los departamentos en orden descendiente</h3>
        <ul>
            @foreach ($query8 as $department_name)
                <li>{{ $department_name }}</li>
            @endforeach
        </ul>

        {{-- 9 --}}

        <h3>Query 9: Listar los apellidos y el nombre de todos los empleados, ordenados de forma alfabética</h3>
        <ul>
            @foreach ($query9 as $full_name)
                <li>{{ $full_name }}</li>
            @endforeach
        </ul>


        {{-- 10 --}}

        <h3>Query 10: 3 Departamentos con mayor Presupuesto Actual</h3>
        <table>
            <thead>
                <tr>
                    <th>Departamento</th>
                    <th>Presupuesto Actual</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($query10 as $departamento)
                    <tr>
                        <td>{{ $departamento->name }}</td>
                        <td>{{ number_format($departamento->presupuesto_actual, 2) }} €</td>
                    </tr>
                @endforeach
            </tbody>
        </table>



        {{-- 11 --}}
        <h3>Query 11: Devuelve una lista con el nombre y el presupuesto, de los 3 departamentos que tienen
            menor presupuesto</h3>
        <ul>
            @foreach ($query11 as $department)
                <li>{{ $department->name }} - {{ number_format($department->budget, 2) }} €</li>
            @endforeach
        </ul>


        {{-- 12 --}}
        <h3>Query 12:Devuelve una lista con el nombre y el presupuesto, de los 3 departamentos que tienen
            menor presupuesto.</h3>
        <ul>
            @foreach ($query12 as $department)
                <li>{{ $department->name }} - {{ number_format($department->expense, 2) }} €</li>
            @endforeach
        </ul>


        {{-- 13 --}}
        <h3>Query 13: Devuelve una lista con el nombre y el gasto, de los 2 departamentos que tienen
            menor gasto</h3>
        <ul>
            @foreach ($query13 as $department)
                <li>{{ $department->name }} - {{ number_format($department->expense, 2) }} €</li>
            @endforeach
        </ul>



        {{-- 14 --}}
        <h3>Query 14: Departamentos que tienen empleados y su Presupuesto Actual</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Departamento</th>
                    <th>Presupuesto Actual</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($query14 as $departamento)
                    <tr>
                        <td>{{ $departamento->id }}</td>
                        <td>{{ $departamento->name }}</td>
                        <td>{{ number_format($departamento->presupuesto_actual, 2) }} €</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- 15 --}}
        <h3>Query 15: Nombre del departamento donde trabaja el empleado con NIF 38382980M</h3>
        <p>{{ $query15 }}</p>

        {{-- 16 --}}
        <h3>Query16: Devuelve el nombre del departamento donde trabaja el empleado Pepe Ruiz Santana</h3>
        <p>pepe ruiz trabaja en el departamento:</p>
        <p>{{ $department_name }}</p>


        {{-- 17 --}}
        <h3>Query17: Devuelve un listado con los datos de los empleados que trabajan en el departamento
            de I+D. Ordena el resultado alfabéticamente</h3>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellido(s)</th>
            </tr>
            @foreach ($query17 as $employee)
                <tr>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name1 }} {{ $employee->last_name2 }}</td>
                </tr>
            @endforeach
        </table>

        {{-- 18 --}}
        <h3>Query18: Devuelve un listado con los datos de los empleados que trabajan en el departamento
            de Sistemas, Contabilidad o I+D
        </h3>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellido(s)</th>
                <th>Departamento</th>
            </tr>
            @foreach ($query18 as $employee)
                <tr>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name1 }} {{ $employee->last_name2 }}</td>
                    <td>{{ $employee->department->name }}</td>
                </tr>
            @endforeach
        </table>

        {{-- 19 --}}

        <h3>Query19: Devuelve una lista con el nombre de los empleados que tienen los departamentos que
            no tienen un presupuesto entre 100000 y 200000 euros</h3>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellido(s)</th>
            </tr>
            @foreach ($query19 as $employee)
                <tr>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name1 }} {{ $employee->last_name2 }}</td>
                </tr>
            @endforeach
        </table>

        {{-- 20 --}}

        <h3>Query20: Devuelve un listado con todos los empleados junto con los datos de los
            departamentos donde trabajan </h3>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellido(s)</th>
                <th>NIF</th>
                <th>Departamento</th>
            </tr>
            @foreach ($query20 as $employee)
                <tr>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name1 }} {{ $employee->last_name2 }}</td>
                    <td>{{ $employee->nif }}</td>
                    <td>{{ $employee->department ? $employee->department->name : 'Sin departamento' }}</td>
                </tr>
            @endforeach
        </table>










</body>

</html>
