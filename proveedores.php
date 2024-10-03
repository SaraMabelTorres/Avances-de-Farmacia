<?php
require 'db.php';

$query = "SELECT * FROM proveedores";
$stmt = $conn->prepare($query);
$stmt->execute();
$proveedores = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores - Farmacia Esencia Saludable</title>
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
        }

        th {
            background-color: #66bb6a; /* Verde claro para encabezados */
            color: black3;
        }

        th, td {
            text-align: center;
        }

        .btn-warning {
            margin-right: 5px; /* Espacio entre botones de acción */
        }

        .table-responsive {
            overflow-x: auto; /* Habilitar desplazamiento horizontal */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Proveedores</h1>
        <a href="index.php" class="btn btn-regresar">Regresar a Inicio</a>
        <a href="create_proveedor.php" class="btn btn-primary mb-3">Agregar Nuevo Proveedor</a>

        <div class="table-responsive"> <!-- Añadido para hacer la tabla responsiva -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Contacto</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Dirección</th>
                        <th>Producto Principal</th>
                        <th>Categoría de Producto</th>
                        <th>Tipo de Empresa</th>
                        <th>Método de Pago Preferido</th>
                        <th>Plazo de Entrega</th>
                        <th>RFC/NIF</th>
                        <th>Volumen de Pedidos</th>
                        <th>Fecha de Registro</th>
                        <th>Sitio Web</th>
                        <th>Calificación</th>
                        <th>Notas</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($proveedores as $proveedor) : ?>
                    <tr>
                        <td><?= $proveedor['id'] ?></td>
                        <td><?= $proveedor['nombre'] ?></td>
                        <td><?= $proveedor['contacto'] ?></td>
                        <td><?= $proveedor['telefono'] ?></td>
                        <td><?= $proveedor['email'] ?></td>
                        <td><?= $proveedor['direccion'] ?></td>
                        <td><?= $proveedor['producto_principal'] ?></td>
                        <td><?= $proveedor['categoria_producto'] ?></td>
                        <td><?= $proveedor['tipo_empresa'] ?></td>
                        <td><?= $proveedor['metodo_pago_preferido'] ?></td>
                        <td><?= $proveedor['plazo_entrega'] ?></td>
                        <td><?= $proveedor['rfc_nif'] ?></td>
                        <td><?= $proveedor['volumen_pedidos'] ?></td>
                        <td><?= $proveedor['fecha_registro'] ?></td>
                        <td><?= $proveedor['sitio_web'] ?></td>
                        <td><?= $proveedor['calificacion'] ?></td>
                        <td><?= $proveedor['notas'] ?></td>
                        <td><?= $proveedor['estado'] == 1 ? 'Activo' : 'Inactivo' ?></td>
                        <td>
                            <a href="edit_proveedor.php?id=<?= $proveedor['id'] ?>" class="btn btn-warning">Editar</a>
                            <a href="delete_proveedor.php?id=<?= $proveedor['id'] ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este proveedor?')">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
