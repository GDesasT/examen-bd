<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Empleados y Departamentos</title>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/queries">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/users/create">Crear Empleado</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Listado de Empleados y Departamentos</h2>

        <h3>Query 1: Listar todas las columnas de la tabla empleados</h3>
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

        <h3>Query 4: Identificadores únicos de departamentos de empleados</h3>
        <ul>
            @foreach ($query4 as $departmentId)
                <li>{{ $departmentId }}</li>
            @endforeach
        </ul>

        <h3>Query 5: Nombre y apellidos en una única columna</h3>
        <ul>
            @foreach ($query5 as $employee)
                <li>{{ $employee->full_name }}</li>
            @endforeach
        </ul>

        <h3>Query 6: Identificador de empleados junto al NIF en columnas</h3>
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

        <h3>Query 7: Departamentos y Presupuesto Actual</h3>
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

        <h3>Query 8: Nombres de los departamentos en orden descendente</h3>
        <ul>
            @foreach ($query8 as $department_name)
                <li>{{ $department_name }}</li>
            @endforeach
        </ul>

        <h3>Query 9: Apellidos y nombres de empleados en orden alfabético</h3>
        <ul>
            @foreach ($query9 as $full_name)
                <li>{{ $full_name }}</li>
            @endforeach
        </ul>

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

        <h3>Query 11: 3 Departamentos con menor Presupuesto</h3>
        <table>
            <thead>
                <tr>
                    <th>Departamento</th>
                    <th>Presupuesto Actual</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($query11 as $departamento)
                    <tr>
                        <td>{{ $departamento->name }}</td>
                        <td>{{ number_format($departamento->presupuesto_actual, 2) }} €</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Query 12: 2 Departamentos con mayor Gasto</h3>
        <table>
            <thead>
                <tr>
                    <th>Departamento</th>
                    <th>Gasto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($query12 as $departamento)
                    <tr>
                        <td>{{ $departamento->name }}</td>
                        <td>{{ number_format($departamento->expense, 2) }} €</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Query 13: 2 Departamentos con menor Gasto</h3>
        <table>
            <thead>
                <tr>
                    <th>Departamento</th>
                    <th>Gasto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($query13 as $departamento)
                    <tr>
                        <td>{{ $departamento->name }}</td>
                        <td>{{ number_format($departamento->expense, 2) }} €</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

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

        <h3>Query 15: Nombre del departamento donde trabaja el empleado con NIF 38382980M</h3>
        <p>{{ $query15 }}</p>

        <h3>Query 16: Nombre del departamento donde trabaja Pepe Ruiz Santana</h3>
        <p>{{ $query16 }}</p>

        <h3>Query 17: Empleados que trabajan en el departamento de I+D</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($query17 as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name1 }} {{ $employee->last_name2 }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Query 18: Empleados en Sistemas, Contabilidad o I+D</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($query18 as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name1 }} {{ $employee->last_name2 }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Query 19: Empleados en departamentos fuera del presupuesto 100,000 - 200,000</h3>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($query19 as $employee)
                    <tr>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name1 }} {{ $employee->last_name2 }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Query 20: Todos los empleados con sus departamentos</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Departamento</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($query20 as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name1 }} {{ $employee->last_name2 }}</td>
                        <td>{{ $employee->department->name ?? 'Sin departamento' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
