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

</body>
</html>
