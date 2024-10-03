<?php
require 'db.php';

$query = "SELECT * FROM empleados";
$stmt = $conn->prepare($query);
$stmt->execute();
$empleados = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados - Farmacia Esencia Saludable</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e8f5e9; /* Color de fondo verde muy claro */
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 1000px; /* Aumentar el ancho del contenedor para mejor visualización */
            margin-top: 50px;
            padding: 30px;
            background-color: #ffffff; /* Fondo blanco para el contenedor */
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        h1 {
            font-weight: 700;
            text-align: center;
            color: #388e3c; /* Verde vibrante */
            margin-bottom: 30px;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
        }

        .btn-regresar {
            background-color: #2196f3; /* Azul claro */
            color: white;
            border-radius: 10px;
            margin-bottom: 20px;
            transition: background-color 0.3s;
            width: 100%; /* Botón ocupa todo el ancho */
        }

        .btn-regresar:hover {
            background-color: #1976d2; /* Azul más oscuro al pasar el mouse */
        }

        table {
            width: 100%;
            margin-top: 20px;
            overflow-x: auto; /* Habilitar desplazamiento horizontal */
        }

        th {
            background-color: #66bb6a; /* Verde claro para encabezados */
            color: black;
        }

        th, td {
            text-align: center;
        }

        .btn-warning {
            margin-right: 5px; /* Espacio entre botones de acción */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Empleados</h1>
        <a href="index.php" class="btn btn-regresar">Regresar a Inicio</a>
        <a href="create_empleado.php" class="btn btn-primary mb-3">Agregar Nuevo Empleado</a>

        <div class="table-responsive"> <!-- Añadido para hacer la tabla responsiva -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Posición</th>
                        <th>Departamento</th>
                        <th>Salario</th>
                        <th>Fecha de Contratación</th>
                        <th>Género</th>
                        <th>Edad</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($empleados as $empleado) : ?>
                    <tr>
                        <td><?= $empleado['id'] ?></td>
                        <td><?= $empleado['nombre'] ?></td>
                        <td><?= $empleado['posicion'] ?></td>
                        <td><?= $empleado['departamento'] ?></td>
                        <td><?= $empleado['salario'] ?></td>
                        <td><?= $empleado['fecha_contratacion'] ?></td>
                        <td><?= $empleado['genero'] ?></td>
                        <td><?= $empleado['edad'] ?></td>
                        <td><?= $empleado['telefono'] ?></td>
                        <td><?= $empleado['email'] ?></td>
                        <td><?= $empleado['estado'] == 1 ? 'Activo' : 'Inactivo' ?></td>
                        <td>
                            <a href="edit_empleado.php?id=<?= $empleado['id'] ?>" class="btn btn-warning">Editar</a>
                            <a href="delete_empleado.php?id=<?= $empleado['id'] ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este empleado?')">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
