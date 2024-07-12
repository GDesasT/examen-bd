<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Empleado</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-4">Crear Empleado</h2>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('users.create') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nif">NIF</label>
                                <input type="text" class="form-control" id="nif" name="nif" >
                            </div>
                            <div class="form-group">
                                <label for="first_name">Nombre</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" >
                            </div>
                            <div class="form-group">
                                <label for="last_name1">Apellido Paterno</label>
                                <input type="text" class="form-control" id="last_name1" name="last_name1" >
                            </div>
                            <div class="form-group">
                                <label for="last_name2">Apellido Materno</label>
                                <input type="text" class="form-control" id="last_name2" name="last_name2" >
                            </div>
                            <div class="form-group">
                                <label for="department_id">Departamento</label>
                                <select class="form-control" id="department_id" name="department_id" >
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear Empleado</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
