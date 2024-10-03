<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $contacto = $_POST['contacto'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $producto_principal = $_POST['producto_principal'];
    $categoria_producto = $_POST['categoria_producto'];
    $tipo_empresa = $_POST['tipo_empresa'];
    $metodo_pago_preferido = $_POST['metodo_pago_preferido'];
    $plazo_entrega = $_POST['plazo_entrega'];
    $rfc_nif = $_POST['rfc_nif'];
    $volumen_pedidos = $_POST['volumen_pedidos'];
    $fecha_registro = $_POST['fecha_registro'];
    $sitio_web = $_POST['sitio_web'];
    $calificacion = $_POST['calificacion'];
    $notas = $_POST['notas'];
    $estado = $_POST['estado'];

    $query = "INSERT INTO proveedores (nombre, contacto, telefono, email, direccion, producto_principal, 
              categoria_producto, tipo_empresa, metodo_pago_preferido, plazo_entrega, rfc_nif, 
              volumen_pedidos, fecha_registro, sitio_web, calificacion, notas, estado) 
              VALUES (:nombre, :contacto, :telefono, :email, :direccion, :producto_principal, 
              :categoria_producto, :tipo_empresa, :metodo_pago_preferido, :plazo_entrega, 
              :rfc_nif, :volumen_pedidos, :fecha_registro, :sitio_web, :calificacion, :notas, :estado)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':contacto', $contacto);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':producto_principal', $producto_principal);
    $stmt->bindParam(':categoria_producto', $categoria_producto);
    $stmt->bindParam(':tipo_empresa', $tipo_empresa);
    $stmt->bindParam(':metodo_pago_preferido', $metodo_pago_preferido);
    $stmt->bindParam(':plazo_entrega', $plazo_entrega);
    $stmt->bindParam(':rfc_nif', $rfc_nif);
    $stmt->bindParam(':volumen_pedidos', $volumen_pedidos);
    $stmt->bindParam(':fecha_registro', $fecha_registro);
    $stmt->bindParam(':sitio_web', $sitio_web);
    $stmt->bindParam(':calificacion', $calificacion);
    $stmt->bindParam(':notas', $notas);
    $stmt->bindParam(':estado', $estado);

    if ($stmt->execute()) {
        header('Location: proveedores.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Proveedor - Farmacia Esencia Saludable</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e8f5e9; /* Color de fondo verde muy claro */
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 600px;
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

        label {
            font-weight: bold;
            color: #2e7d32; /* Verde oscuro */
        }

        input, select, textarea {
            margin-bottom: 20px;
            background: #f1f8e9; /* Fondo verde claro para los campos */
            border: 2px solid #66bb6a; /* Bordes verde claro */
            border-radius: 10px;
            padding: 10px;
            width: 100%;
            transition: all 0.3s ease;
        }

        input:focus, select:focus, textarea:focus {
            border: 2px solid #d32f2f; /* Rojo al enfocar */
            outline: none;
            background-color: #ffffff; /* Fondo blanco al enfocar */
        }

        button {
            width: 100%;
            background-color: #4caf50; /* Verde pastel */
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            color: white;
            font-size: 18px;
            font-weight: 600;
            padding: 12px 0;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: #388e3c; /* Verde más oscuro al pasar el mouse */
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);
        }

        /* Estilo adicional para el área de notas */
        textarea {
            background-color: #e8f5e9; /* Fondo verde muy claro */
        }

        /* Estilo para las opciones de selección */
        select {
            background: linear-gradient(135deg, #a5d6a7, #81c784); /* Gradiente de verde pastel */
            color: white;
        }

        .btn-regresar {
            background-color: #2196f3; /* Azul claro */
            color: white;
            border-radius: 10px;
            margin-bottom: 20px;
            transition: background-color 0.3s;
        }

        .btn-regresar:hover {
            background-color: #1976d2; /* Azul más oscuro al pasar el mouse */
        }

        .logo {
            display: block;
            margin: 0 auto 20px auto; /* Centrar el logo y añadir margen inferior */
            width: 150px; /* Ajusta el tamaño según sea necesario */
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="logo.png" alt="Logo Farmacia Esencia Saludable" class="logo"> <!-- Cambia "logo.png" por la ruta de tu logo -->
        <a href="index.php" class="btn btn-regresar">Regresar a Inicio</a>
        <h1>Agregar Nuevo Proveedor</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="contacto" class="form-label">Contacto</label>
                <input type="text" class="form-control" id="contacto" name="contacto" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>
            <div class="mb-3">
                <label for="producto_principal" class="form-label">Producto Principal</label>
                <input type="text" class="form-control" id="producto_principal" name="producto_principal" required>
            </div>
            <div class="mb-3">
                <label for="categoria_producto" class="form-label">Categoría de Producto</label>
                <input type="text" class="form-control" id="categoria_producto" name="categoria_producto" required>
            </div>
            <div class="mb-3">
                <label for="tipo_empresa" class="form-label">Tipo de Empresa</label>
                <input type="text" class="form-control" id="tipo_empresa" name="tipo_empresa" required>
            </div>
            <div class="mb-3">
                <label for="metodo_pago_preferido" class="form-label">Método de Pago Preferido</label>
                <input type="text" class="form-control" id="metodo_pago_preferido" name="metodo_pago_preferido" required>
            </div>
            <div class="mb-3">
                <label for="plazo_entrega" class="form-label">Plazo de Entrega</label>
                <input type="text" class="form-control" id="plazo_entrega" name="plazo_entrega" required>
            </div>
            <div class="mb-3">
                <label for="rfc_nif" class="form-label">RFC/NIF</label>
                <input type="text" class="form-control" id="rfc_nif" name="rfc_nif" required>
            </div>
            <div class="mb-3">
                <label for="volumen_pedidos" class="form-label">Volumen de Pedidos</label>
                <input type="number" class="form-control" id="volumen_pedidos" name="volumen_pedidos" required>
            </div>
            <div class="mb-3">
                <label for="fecha_registro" class="form-label">Fecha de Registro</label>
                <input type="date" class="form-control" id="fecha_registro" name="fecha_registro" required>
            </div>
            <div class="mb-3">
                <label for="sitio_web" class="form-label">Sitio Web</label>
                <input type="text" class="form-control" id="sitio_web" name="sitio_web">
            </div>
            <div class="mb-3">
                <label for="calificacion" class="form-label">Calificación</label>
                <input type="number" class="form-control" id="calificacion" name="calificacion" min="1" max="5">
            </div>
            <div class="mb-3">
                <label for="notas" class="form-label">Notas</label>
                <textarea class="form-control" id="notas" name="notas"></textarea>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Proveedor</button>
        </form>
    </div>
</body>
</html>
