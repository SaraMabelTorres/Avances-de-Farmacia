<?php
require 'db.php'; // Incluye la conexión a la base de datos

$query = "SELECT * FROM clientes";
$stmt = $conn->prepare($query);
$stmt->execute();
$clientes = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - Farmacia Esencia Saludable</title>
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
        <h1>Lista de Clientes</h1>
        <a href="index.php" class="btn btn-regresar">Regresar a Inicio</a>
        <a href="create_cliente.php" class="btn btn-primary mb-3">Agregar Nuevo Cliente</a>

        <div class="table-responsive"> <!-- Añadido para hacer la tabla responsiva -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Género</th>
                        <th>Edad</th>
                        <th>Fecha de Registro</th>
                        <th>Historial de Compras</th>
                        <th>Saldo Pendiente</th>
                        <th>Última Compra</th>
                        <th>Programa de Lealtad</th>
                        <th>Comentarios</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $cliente) : ?>
                    <tr>
                        <td><?= $cliente['id'] ?></td>
                        <td><?= $cliente['nombre'] ?></td>
                        <td><?= $cliente['email'] ?></td>
                        <td><?= $cliente['telefono'] ?></td>
                        <td><?= $cliente['direccion'] ?></td>
                        <td><?= $cliente['genero'] ?></td>
                        <td><?= $cliente['edad'] ?></td>
                        <td><?= $cliente['fecha_registro'] ?></td>
                        <td><?= $cliente['historial_compras'] ?></td>
                        <td><?= $cliente['saldo_pendiente'] ?></td>
                        <td><?= $cliente['ultima_compra'] ?></td>
                        <td><?= $cliente['programa_lealtad'] ?></td>
                        <td><?= $cliente['comentarios'] ?></td>
                        <td><?= $cliente['estado'] == 1 ? 'Activo' : 'Inactivo' ?></td>
                        <td>
                            <a href="edit_cliente.php?id=<?= $cliente['id'] ?>" class="btn btn-warning">Editar</a>
                            <a href="delete_cliente.php?id=<?= $cliente['id'] ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este cliente?')">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
