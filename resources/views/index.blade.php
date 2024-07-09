<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Empleados</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Listado de Empleados</h2>

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

    <h3>Query 3: Listar el identificador de los departamentos de los empleados</h3>
    <ul>
        @foreach ($query3 as $departmentId)
            <li>{{ $departmentId }}</li>
        @endforeach
    </ul>

    <h3>Query 4: Listar el identificador de los departamentos de los empleados, eliminando los identificadores que aparecen repetidos</h3>
    <ul>
        @foreach ($query4 as $departmentId)
            <li>{{ $departmentId }}</li>
        @endforeach
    </ul>

    <h3>Query 5: Listar el nombre y apellidos de los empleados en una única columna</h3>
    <ul>
        @foreach ($query5 as $employee)
            <li>{{ $employee->full_name }}</li>
        @endforeach
    </ul>

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
                    <td>{{$employee->id}}</td>
                    <td>{{$employee->nif_digitos}}</td>
                    <td>{{$employee->nif_letra}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

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

    <h3>Query 8: Listar nombre de los departamentos en orden descendiente</h3>
    <ul>
        @foreach ($query8 as $department_name)
        <li>{{ $department_name}}</li>
        @endforeach
    </ul>

    <h3>Query 9: Listar los apellidos y el nombre de todos los empleados, ordenados de forma alfabética</h3>
    <ul>
        @foreach ($query9 as $full_name)
        <li>{{ $full_name}}</li>
        @endforeach
    </ul>

    <h3>Query 10: 3 Departamentos con mayor Presupuesto Actual</h2>
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

</body>
</html>
